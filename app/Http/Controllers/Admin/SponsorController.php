<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::ordered()->get();
        return view('admin.content.sponsors', compact('sponsors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $data = [
            'name' => 'Sponsor-' . now()->timestamp,
            'tier' => 'partner',
            'sort_order' => Sponsor::max('sort_order') + 1,
            'is_active' => true,
        ];

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->hashName();
            $path = 'sponsors/' . $filename;
            
            // Resize and compress using Intervention Image
            $img = \Intervention\Image\Laravel\Facades\Image::read($file);
            $img->scale(width: 400); // Sponsor logos don't need to be huge
            \Illuminate\Support\Facades\Storage::disk('public')->put($path, (string) $img->toWebp(80)); 
            
            $data['logo_path'] = $path;
        }

        Sponsor::create($data);

        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor logo added.');
    }

    public function destroy(Sponsor $sponsor)
    {
        if ($sponsor->logo_path) {
            Storage::disk('public')->delete($sponsor->logo_path);
        }
        $sponsor->delete();
        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor deleted.');
    }
}
