<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'countdown_deadline' => '2026-06-30 23:59:59',
            'about_title' => 'The World\'s Premier Denim Competition',
            'about_text' => 'WORN-OUT ENTHUSIAST is an international competition celebrating the artistry, innovation, and craftsmanship of denim. From raw selvedge to sustainable upcycled creations, we showcase the finest denim work from designers and artisans around the globe.',
            'about_vision' => 'Our vision is to elevate denim from everyday fabric to high art, fostering a global community of creators who push the boundaries of what denim can be. We believe in sustainability, craftsmanship, and the timeless appeal of indigo.',
            'prize_total' => '$50,000',
            'site_name' => 'WORN-OUT ENTHUSIAST',
            'site_tagline' => 'Where Craftsmanship Meets Innovation',
            'hero_subtitle' => 'International Denim Design Competition 2026',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
