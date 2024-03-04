<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Users\App\Models\User;

class Video extends Model
{
    protected $table = 'video';
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'description',
      'video',
      'uploaded_by',
      'status',
    ];

    public function user()
    {
       return $this->belongsTo(User::class , 'uploaded_by');
    }
}
