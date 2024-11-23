<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // Display all brands
    public function index(Request $request)
    {
        $search = $request->input('search');

        $brands = Brand::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('admin.brands.index', compact('brands'));
    }

    // Show form to create a brand
    public function create()
    {
        return view('admin.brands.create');
    }

    // Store a new brand in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Brand::create($validated);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully!');
    }

    // Show form to edit a brand
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    // Update a brand in the database
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand->update($validated);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully!');
    }

    // Delete a brand
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully!');
    }
}
