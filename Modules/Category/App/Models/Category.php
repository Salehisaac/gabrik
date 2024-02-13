<?php

namespace Modules\Category\App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Database\Factories\CategoryFactory;
use Modules\Posts\App\Models\Post;

class Category extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return[
            'slug' => [
                'source'=>'name'
            ]
        ];
    }

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
    protected static function newFactory()
    {
        return new CategoryFactory();
    }

    public function posts()
    {
        return $this->hasMany(Post::class , 'category_id');
    }
}
