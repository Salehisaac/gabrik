<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Posts\App\Models\Post;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $randomPosts = Post::whereNotIn('id', [$post->id])
            ->inRandomOrder()
            ->take(3)
            ->get();
        return view('posts.index' , compact('post' , 'randomPosts'));
    }
}
