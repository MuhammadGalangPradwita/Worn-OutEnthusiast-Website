<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Raw Denim',
                'description' => 'Celebrate the beauty of unwashed, untreated denim. Show us your best raw selvedge designs that honor traditional craftsmanship.',
                'prize' => '$15,000',
                'sort_order' => 1,
            ],
            [
                'name' => 'Upcycled Denim',
                'description' => 'Transform pre-loved denim into stunning new creations. Sustainability meets creativity in this eco-conscious category.',
                'prize' => '$12,000',
                'sort_order' => 2,
            ],
            [
                'name' => 'Streetwear Fusion',
                'description' => 'Blend denim with urban streetwear aesthetics. Push boundaries with bold silhouettes, graphics, and contemporary styling.',
                'prize' => '$12,000',
                'sort_order' => 3,
            ],
            [
                'name' => 'Artisanal Craft',
                'description' => 'Hand-stitched, hand-dyed, hand-woven — showcase the pinnacle of artisanal denim techniques and heritage methods.',
                'prize' => '$11,000',
                'sort_order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
