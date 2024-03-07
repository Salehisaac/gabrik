<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Users\App\Models\User;

class ImageGallery extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'description',
        'gallery',
        'uploaded_by',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'uploaded_by');
    }
}
