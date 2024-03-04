<?php

namespace App\Http\Controllers;

use App\Models\ImageGallery;
use App\Models\Video;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Modules\Posts\App\Models\Post;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $projects = Post::where('type' , 'project')->orderBy('created_at', 'desc')->limit(8)->get();
        $galleries = ImageGallery::where('status' , '1')->limit(1)->get();
        $video = Video::where('status' , '1')->limit(1)->get();
        return view('home' , compact('projects' , 'galleries' , 'video'));
    }
}
