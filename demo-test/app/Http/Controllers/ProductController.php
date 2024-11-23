<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Brand;
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
        return view('admin.products.create', compact( 'categories', 'brands'));
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

        $productImages = new ProductImage();
        $productImages->product_id = $product->id;

        if ($request->hasFile('front_img')) {
            $productImages->front_img = $request->file('front_img')->store('product_images');
        }

        if ($request->hasFile('back_img')) {
            $productImages->back_img = $request->file('back_img')->store('product_images');
        }

        if ($request->hasFile('side_img')) {
            $productImages->side_img = $request->file('side_img')->store('product_images');
        }

        $productImages->save();

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

        $productImages = $product->images;

        if ($request->hasFile('front_img')) {
            $productImages->front_img = $request->file('front_img')->store('product_images');
        }

        if ($request->hasFile('back_img')) {
            $productImages->back_img = $request->file('back_img')->store('product_images');
        }

        if ($request->hasFile('side_img')) {
            $productImages->side_img = $request->file('side_img')->store('product_images');
        }

        $productImages->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Delete a product
    public function destroy(Product $product)
    {
        $product->images->delete(); // Delete associated images
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

}
