<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            ['title' => 'Indigo Waves Collection', 'image' => 'placeholder', 'category_id' => 1, 'is_featured' => true, 'sort_order' => 1],
            ['title' => 'Heritage Selvedge Jacket', 'image' => 'placeholder', 'category_id' => 1, 'is_featured' => false, 'sort_order' => 2],
            ['title' => 'Patchwork Revival Dress', 'image' => 'placeholder', 'category_id' => 2, 'is_featured' => true, 'sort_order' => 3],
            ['title' => 'Urban Denim Bomber', 'image' => 'placeholder', 'category_id' => 3, 'is_featured' => true, 'sort_order' => 4],
            ['title' => 'Street Fade Ensemble', 'image' => 'placeholder', 'category_id' => 3, 'is_featured' => false, 'sort_order' => 5],
            ['title' => 'Hand-Woven Indigo Tapestry', 'image' => 'placeholder', 'category_id' => 4, 'is_featured' => true, 'sort_order' => 6],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
