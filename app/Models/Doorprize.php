<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doorprize extends Model
{
    protected $fillable = ['rank', 'name', 'description', 'image_path', 'prize_amount', 'sponsored_by', 'sort_order', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
        'prize_amount' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('rank');
    }
}
