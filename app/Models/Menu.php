<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name', 'url', 'slug', 'parent_id', 'status'
    ];


    public function parent()
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }



}
