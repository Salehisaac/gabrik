<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'main_cross_images';
    protected $fillable = [
        'title',
        'status',
        'image',
        'description',
        'url'
    ];
    protected $casts = ['image' => 'array'];
}
