<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    protected $fillable = ['name', 'title', 'photo', 'bio', 'instagram', 'linkedin', 'sort_order'];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
