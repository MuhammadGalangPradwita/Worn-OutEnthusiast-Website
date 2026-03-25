<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::ordered()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return redirect()->route('admin.categories.edit', $category);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prize' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->hashName();
            $path = 'categories/' . $filename;
            
            // Resize and compress using Intervention Image
            $img = \Intervention\Image\Laravel\Facades\Image::read($file);
            $img->scale(width: 800); 
            \Illuminate\Support\Facades\Storage::disk('public')->put($path, (string) $img->toWebp(75)); 
            
            $validated['image'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');

        Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prize' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->hashName();
            $path = 'categories/' . $filename;
            
            // Resize and compress using Intervention Image
            $img = \Intervention\Image\Laravel\Facades\Image::read($file);
            $img->scale(width: 800); 
            \Illuminate\Support\Facades\Storage::disk('public')->put($path, (string) $img->toWebp(75)); 
            
            $validated['image'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');

        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
