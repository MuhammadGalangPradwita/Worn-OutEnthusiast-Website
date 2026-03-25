<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    protected $fillable = [
        'participant_name',
        'image_path',
        'category',
        'month_label',
        'rank',
        'description',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('rank');
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public static function categoryLabel($category)
    {
        return match ($category) {
            'top_monthly' => 'Top Peserta Bulan Ini',
            'top_fade' => 'Top Fade Ranking',
            'best_story' => 'Best Story',
            default => $category,
        };
    }
}
