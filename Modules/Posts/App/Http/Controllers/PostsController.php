<?php

namespace Modules\Posts\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\File\FileService;
use App\Http\Services\Image\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\App\Models\Category;
use Modules\Posts\App\Models\Post;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(100);
        return view('posts::index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts::create' , compact('categories') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , ImageService $imageService , FileService $fileService): RedirectResponse
    {


        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;

        if ($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('admin-assets/images' . DIRECTORY_SEPARATOR . 'post');

            /*$result = $imageService->save($request->file('image'));*/

            /* $result = $imageService->fitAndSave($request->file('image'), 600,150);
             exit();*/

            $result = $imageService->createIndexAndSave($request->file('image'));


            if($result === false)
            {

                return redirect()->route('posts.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;

        }

        if ($request->hasFile('video'))
        {
            $result = $fileService->moveToPublic($request->file('video'));
            if($result === false)
            {

                return redirect()->route('posts.index')->with('swal-error', 'آپلود ویدئو با خطا مواجه شد');
            }
            $inputs['video'] = $result;
        }







        $post = Post::create($inputs);
        return redirect()->route('posts.index')->with('swal-success', 'پست جدید شما با موفقیت ثبت شد');
    }

    /**
     * Show the specified resource.
     */
    public function show(Post $post)
    {
         return view('posts::show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts::edit' , compact('post' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
