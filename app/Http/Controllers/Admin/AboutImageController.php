<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutImageController extends Controller
{
    public function index()
    {
        $images = AboutImage::ordered()->get();
        return view('admin.about-images.index', compact('images'));
    }

    public function create()
    {
        return view('admin.about-images.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'caption' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $path = $request->file('image')->store('about-images', 'public');

        AboutImage::create([
            'image_path' => $path,
            'caption' => $validated['caption'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.content.about')->with('success', 'Image uploaded successfully.');
    }

    public function edit(AboutImage $about_image)
    {
        return view('admin.about-images.edit', compact('about_image'));
    }

    public function update(Request $request, AboutImage $about_image)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'caption' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($about_image->image_path);
            $about_image->image_path = $request->file('image')->store('about-images', 'public');
        }

        $about_image->caption = $validated['caption'] ?? null;
        $about_image->sort_order = $validated['sort_order'] ?? 0;
        $about_image->save();

        return redirect()->route('admin.about-images.index')->with('success', 'Image updated successfully.');
    }

    public function destroy(AboutImage $about_image)
    {
        Storage::disk('public')->delete($about_image->image_path);
        $about_image->delete();
        return redirect()->route('admin.content.about')->with('success', 'Image deleted successfully.');
    }
}
