<?php

namespace App\Http\Controllers;

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
        $brand = $request->input('brand');
        $category = $request->input('category');

        $products = Product::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->when($brand, function ($query) use ($brand) {
                $query->whereHas('brand', function ($query) use ($brand) {
                    $query->where('name', 'like', "%{$brand}%");
                });
            })
            ->when($category, function ($query) use ($category) {
                $query->whereHas('category', function ($query) use ($category) {
                    $query->where('name', 'like', "%{$category}%");
                });
            })
            ->orderBy('id', 'asc')
            ->with('images', 'category', 'brand') // Eager load product images, categories, and brands
            ->paginate(10);

        // Fetch available brands and categories for filter dropdowns
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'brands', 'categories'));
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
            'front_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'back_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'side_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $product = Product::create($validated);

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
            'details' => 'Created user: ' . $product->name,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }


    // Show form to edit a product
    public function edit($id)
    {
        $product = Product::with('images', 'category', 'brand')->findOrFail($id);
        $categories = Category::all(); // Fetch all categories
        $brands = Brand::all(); // Fetch all brands
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }


    // Update a product
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'front_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'back_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'side_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $product->update($validated);

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
            'quantity' => $validated['stock'],
            'updated_at' => now(),
        ]);

        // Log the creation action
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => 'update',
            'details' => 'Update Product: ' . $product->name,
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
