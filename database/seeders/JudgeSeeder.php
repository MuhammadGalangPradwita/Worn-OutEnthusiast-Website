<?php

namespace Database\Seeders;

use App\Models\Judge;
use Illuminate\Database\Seeder;

class JudgeSeeder extends Seeder
{
    public function run(): void
    {
        $judges = [
            [
                'name' => 'Hiroshi Tanaka',
                'title' => 'Master Denim Artisan',
                'bio' => 'With over 30 years of experience in Japanese selvedge denim production, Hiroshi brings unparalleled expertise in traditional weaving and dyeing techniques.',
                'instagram' => 'https://instagram.com/hiroshi_denim',
                'linkedin' => 'https://linkedin.com/in/hiroshi-tanaka',
                'sort_order' => 1,
            ],
            [
                'name' => 'Isabella Romano',
                'title' => 'Fashion Design Director',
                'bio' => 'Former creative director at Milan\'s top fashion houses, Isabella pioneered the luxury denim movement and continues to shape global denim trends.',
                'instagram' => 'https://instagram.com/isabella_romano',
                'linkedin' => 'https://linkedin.com/in/isabella-romano',
                'sort_order' => 2,
            ],
            [
                'name' => 'Marcus Chen',
                'title' => 'Sustainable Fashion Advocate',
                'bio' => 'Award-winning designer and sustainability expert, Marcus leads the charge in eco-friendly denim innovation and circular fashion practices.',
                'instagram' => 'https://instagram.com/marcuschen_eco',
                'linkedin' => 'https://linkedin.com/in/marcus-chen',
                'sort_order' => 3,
            ],
        ];

        foreach ($judges as $judge) {
            Judge::create($judge);
        }
    }
}
