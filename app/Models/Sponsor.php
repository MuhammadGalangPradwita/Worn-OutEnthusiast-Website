<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = ['name', 'logo_path', 'website_url', 'tier', 'sort_order', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public static function tierLabel($tier)
    {
        return match ($tier) {
            'platinum' => 'Platinum',
            'gold' => 'Gold',
            'silver' => 'Silver',
            'partner' => 'Partner',
            default => $tier,
        };
    }
}
