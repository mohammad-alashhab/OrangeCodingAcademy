<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Brand;
use App\Models\AuditLog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display all products
    public function index(Request $request)
    {
        $search = $request->input('search');

        $products = Product::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('brand', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            })
            ->orderBy('id', 'asc')
            ->with('images', 'category', 'brand') // Eager load product images, categories, and brands
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }



    // Show form to create a product
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        $brands = Brand::all(); // Fetch all brands
        return view('admin.products.create', compact('categories', 'brands'));
    }

    // Store a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'front_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'back_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'side_img' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        // Save original price before discount
        $product = Product::create($validated);

        // Set original price (before discount)
        $product->update(['original_price' => $product->price]);

        // Handle images
        $imageData = ['product_id' => $product->id];
        foreach (['front_img', 'back_img', 'side_img'] as $key) {
            if ($request->hasFile($key)) {
                $imageData[$key] = $request->file($key)->storeAs(
                        'product_images',
                        time() . '_' . $request->file($key)->getClientOriginalName(),
                        'public'
                    );
            }
        }

        ProductImage::create($imageData);

        // Link the stock with the inventory table
        DB::table('inventory')->insert([
            'product_id' => $product->id,
            'quantity' => $validated['stock'],
            'updated_at' => now(),
        ]);

        // Log the creation action
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => 'create',
            'details' => 'Created product: ' . $product->name,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }


    // Show form to edit a product
    public function edit($id)
    {
        // Fetch the product with its associated images, category, and brand
        $product = Product::with('images', 'category', 'brand', 'discounts')->findOrFail($id);

        // Fetch all categories and brands for the dropdown selection
        $categories = Category::all();
        $brands = Brand::all();

        // Check if the product has an active discount
        $activeDiscount = $product->discounts()->where('is_active', true)->exists();

        // Pass the product data and activeDiscount flag to the view
        return view('admin.products.edit', compact('product', 'categories', 'brands', 'activeDiscount'));
    }



    public function update(Request $request, Product $product)
    {
        // Check if discount is active, and handle accordingly
        $isDiscountActive = $product->discounts()->where('is_active', true)->exists();

        // Validate request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => $isDiscountActive ? 'nullable|numeric' : 'required|numeric',
            'stock' => 'required|integer', // Ensure stock is validated
            'front_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'back_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'side_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // If the price has changed and no discount is applied
        if ($product->price != $validated['price']) {
            // If discount is not applied, update original_price
            if (!$request->has('discount')) {
                $product->update(['original_price' => $validated['price']]);
            } else {
                // Keep the original price unchanged
                $validated['price'] = $product->original_price - ($product->original_price * $request->input('discount') / 100);
            }
        }

        // Update product information
        $product->update($validated);

        // Handle images
        $imageData = $product->images ? $product->images->toArray() : [];
        foreach (['front_img', 'back_img', 'side_img'] as $key) {
            if ($request->hasFile($key)) {
                if (isset($imageData[$key])) {
                    Storage::delete($imageData[$key]); // Remove old image
                }
                $imageData[$key] = $request->file($key)->storeAs(
                    'product_images',
                    time() . '_' . $request->file($key)->getClientOriginalName(),
                    'public'
                );
            }
        }

        ProductImage::updateOrCreate(['product_id' => $product->id], $imageData);

        // Update the inventory table
        DB::table('inventory')
            ->where('product_id', $product->id)
            ->update([
                'quantity' => $validated['stock'],  // Ensure stock is updated
                'updated_at' => now(),
            ]);

        // Log the update action
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => 'update',
            'details' => 'Updated product: ' . $product->name,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }





    // Delete a product
    public function destroy(Product $product)
    {
        // Check if the product has associated images
        if ($product->images) {
            foreach ($product->images as $image) { // Loop through the collection
                foreach (['front_img', 'back_img', 'side_img'] as $key) {
                    if (!empty($image->$key)) { // Check if the image exists
                        Storage::delete($image->$key); // Delete the image file
                    }
                }
                $product->images->delete(); // Delete the image record from the database
            }
        }

        // Delete the inventory record
        DB::table('inventory')->where('product_id', $product->id)->delete();

        $product->delete(); // Delete the product itself

        // Log the creation action
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => 'delete',
            'details' => 'Deleted Product: ' . $product->name,
        ]);

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    public function show($id)
    {
        $product = Product::with(['category', 'brand', 'images'])->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

}
