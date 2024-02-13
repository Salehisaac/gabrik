<?php

namespace Modules\Posts\App\Models;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Posts\Database\Factories\PostFactory;
use Modules\Users\App\Models\User;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return[
            'slug' =>[
                'source' => 'title'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];
    protected $fillable = [
        'title',
        'content',
        'image',
        'gallery',
        'slug',
        'user_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Content\Comment', 'commentable');
    }

    protected static function newFactory()
    {
        return new PostFactory();
    }


}
