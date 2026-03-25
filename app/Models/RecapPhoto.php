<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecapPhoto extends Model
{
    protected $fillable = ['entity_type', 'entity_index', 'image_path'];
}
