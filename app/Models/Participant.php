<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participant extends Model
{
    protected $fillable = [
        'name',
        'age',
        'gender',
        'shirt_size',
        'instagram',
        'telegram',
        'address',
        'category_id',
        'denim_brand',
        'denim_cut',
        'denim_weight',
        'gdrive_link',
        'photo_front',
        'photo_back',
        'payment_proof',
        'status',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }
}
