<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Category\App\Models\Category;
use Modules\Posts\App\Models\Post;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $postCategories = Post::where(['category_id' => $category->id , 'type' => 'project'])->get();
        return view('categories.index' , compact('category', 'postCategories'));
    }
}
