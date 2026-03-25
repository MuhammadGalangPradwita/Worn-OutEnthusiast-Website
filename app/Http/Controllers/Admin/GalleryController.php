<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('category')->ordered()->get();
        $categories = Category::ordered()->get();
        return view('admin.galleries.index', compact('galleries', 'categories'));
    }

    public function show(Gallery $gallery)
    {
        return redirect()->route('admin.galleries.edit', $gallery);
    }

    public function create()
    {
        $categories = Category::ordered()->get();
        return view('admin.galleries.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->hashName();
            $path = 'galleries/' . $filename;
            
            // Resize and compress using Intervention Image
            $img = \Intervention\Image\Laravel\Facades\Image::read($file);
            $img->scale(width: 1200); // Max width 1200px
            \Illuminate\Support\Facades\Storage::disk('public')->put($path, (string) $img->toWebp(75)); // Convert to WebP, 75% quality
            
            $validated['image'] = $path;
        }

        $validated['is_featured'] = $request->has('is_featured');

        Gallery::create($validated);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item created successfully.');
    }

    public function edit(Gallery $gallery)
    {
        $categories = Category::ordered()->get();
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('galleries', 'public');
        }

        $validated['is_featured'] = $request->has('is_featured');

        $gallery->update($validated);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item deleted successfully.');
    }
}
