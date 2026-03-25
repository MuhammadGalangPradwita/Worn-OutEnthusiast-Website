<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timeline;

class TimelineSeeder extends Seeder
{
    public function run(): void
    {
        $milestones = [
            ['title' => 'Open Registration', 'date' => 'March 1, 2026', 'is_active' => true, 'sort_order' => 1],
            ['title' => 'Submission Deadline', 'date' => 'June 30, 2026', 'is_active' => true, 'sort_order' => 2],
            ['title' => 'Finalist Announcement', 'date' => 'August 15, 2026', 'is_active' => false, 'sort_order' => 3],
            ['title' => 'Awarding Night', 'date' => 'September 20, 2026', 'is_active' => false, 'sort_order' => 4],
        ];

        foreach ($milestones as $milestone) {
            Timeline::create($milestone);
        }
    }
}
