<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\AboutImage;
use App\Models\RecapImage;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    // About Section
    public function about()
    {
        $settings = [];
        $keys = ['about_title', 'about_text', 'about_visi', 'about_misi', 'about_komunitas_intro', 'about_komunitas'];
        foreach ($keys as $key) {
            $settings[$key] = Setting::get($key, '');
        }

        $images = AboutImage::ordered()->get();

        return view('admin.content.about', compact('settings', 'images'));
    }

    public function aboutUpdate(Request $request)
    {
        $validated = $request->validate([
            'about_title' => 'nullable|string',
            'about_text' => 'nullable|string',
            'about_visi' => 'nullable|string',
            'about_misi' => 'nullable|string',
            'about_komunitas_intro' => 'nullable|string|max:500',
            'about_komunitas' => 'nullable|string',
        ]);

        foreach ($validated as $key => $value) {
            Setting::set($key, $value ?? '');
        }

        return redirect()->route('admin.content.about')->with('success', 'About content updated successfully.');
    }

    // Recap Section
    public function recap()
    {
        $settings = [];
        $keys = [
            'recap_title',
            'recap_description',
            'recap_highlights',
            'recap_button_text',
            'recap_button_link',
            'recap_story',
            'recap_winners',
            'recap_best_fades',
            'recap_impacts'
        ];

        foreach ($keys as $key) {
            $value = Setting::get($key, '');
            // Attempt to decode JSON if possible, otherwise keep string
            $decoded = json_decode($value, true);
            $settings[$key] = (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) ? $decoded : $value;
        }

        $images = RecapImage::ordered()->get();

        return view('admin.content.recap', compact('settings', 'images'));
    }

    public function recapUpdate(Request $request)
    {
        $validated = $request->validate([
            'recap_title' => 'nullable|string|max:255',
            'recap_description' => 'nullable|string',
            'recap_highlights' => 'nullable|string',
            'recap_button_text' => 'nullable|string|max:255',
            'recap_button_link' => 'nullable|string|max:500',
            'recap_story' => 'nullable|string',
            'recap_winners' => 'nullable|array',
            'recap_best_fades' => 'nullable|array',
            'recap_impacts' => 'nullable|array',
        ]);

        $winnersData = is_array($validated['recap_winners'] ?? null) ? $validated['recap_winners'] : [];
        $fadesData = is_array($validated['recap_best_fades'] ?? null) ? $validated['recap_best_fades'] : [];

        // Handle Winner Photos
        foreach ($winnersData as $index => &$winner) {
            $photoUrls = [];
            // Keep existing photos if requested
            if (!empty($winner['existing_photos'])) {
                $photoUrls = array_merge($photoUrls, $winner['existing_photos']);
            }
            // Add newly uploaded photos
            if ($request->hasFile("recap_winners.{$index}.images")) {
                foreach ($request->file("recap_winners.{$index}.images") as $file) {
                    $path = $file->store('recap_portraits', 'public');
                    \App\Models\RecapPhoto::create([
                        'entity_type' => 'winner',
                        'entity_index' => $index,
                        'image_path' => $path
                    ]);
                    $photoUrls[] = '/storage/' . $path; // Or whatever full path structure you prefer
                }
            }
            $winner['photo'] = implode(',', $photoUrls);
            unset($winner['existing_photos'], $winner['images']);
        }

        // Handle Best Fades Photos
        foreach ($fadesData as $index => &$fade) {
            $photoUrls = [];
            // Keep existing photos if requested
            if (!empty($fade['existing_photos'])) {
                $photoUrls = array_merge($photoUrls, $fade['existing_photos']);
            }
            // Add newly uploaded photos
            if ($request->hasFile("recap_best_fades.{$index}.images")) {
                foreach ($request->file("recap_best_fades.{$index}.images") as $file) {
                    $path = $file->store('recap_portraits', 'public');
                    \App\Models\RecapPhoto::create([
                        'entity_type' => 'best_fade',
                        'entity_index' => $index,
                        'image_path' => $path
                    ]);
                    $photoUrls[] = '/storage/' . $path;
                }
            }
            $fade['photo'] = implode(',', $photoUrls);
            unset($fade['existing_photos'], $fade['images']);
        }

        $validated['recap_winners'] = $winnersData;
        $validated['recap_best_fades'] = $fadesData;

        foreach ($validated as $key => $value) {
            $saveValue = is_array($value) ? json_encode($value) : ($value ?? '');
            Setting::set($key, $saveValue);
        }

        return redirect()->route('admin.content.recap')->with('success', 'Recap content updated successfully.');
    }
}
