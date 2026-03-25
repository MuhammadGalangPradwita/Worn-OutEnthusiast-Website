<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecapImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecapImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'caption' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('recap-images', 'public');

        RecapImage::create([
            'image_path' => $path,
            'caption' => $request->caption,
            'sort_order' => RecapImage::max('sort_order') + 1,
        ]);

        return redirect()->route('admin.content.recap')->with('success', 'Image uploaded.');
    }

    public function destroy(RecapImage $recap_image)
    {
        Storage::disk('public')->delete($recap_image->image_path);
        $recap_image->delete();
        return redirect()->route('admin.content.recap')->with('success', 'Image deleted.');
    }
}
