<?php

namespace Modules\Posts\App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\App\Models\Category;
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

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            // Delete all comments associated with this post
            $post->comments()->delete();
        });
    }

    protected $casts = ['image' => 'array'];
    protected $fillable = [
        'title',
        'content',
        'image',
        'video',
        'gallery',
        'slug',
        'user_id',
        'category_id',
        'type',
        'summary',
        'tags',
        'commentable',
        'status',
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
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    protected static function newFactory()
    {
        return new PostFactory();
    }


}
