<?php

namespace Modules\Posts\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\File\FileService;
use App\Http\Services\Image\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\App\Models\Category;
use Modules\Posts\App\Http\Requests\PostsRequest;
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
    public function store(PostsRequest $request , ImageService $imageService , FileService $fileService): RedirectResponse
    {



        $inputs = $request->all();
        $inputs['user_id'] = 9;

        if ($request->hasFile('image'))
        {

            $result = $imageService->save($request->file('image') , 'posts');

            if($result === false)
            {

                return redirect()->route('posts.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }

            $inputs['image'] = $result;

        }


        if ($request->hasAny('gallery'))
        {

            $result = [];

            foreach ($request->gallery as $gallery)
            {
                array_push($result , $imageService->save($gallery , 'posts/gallery')) ;
            }


            if($result === false)
            {

                return redirect()->route('posts.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }

            $inputs['gallery'] = json_encode($result);

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

    public function gallery(Post $post)
    {
        return view('posts::gallery' , compact('post' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Post $post , ImageService $imageService , FileService $fileService ): RedirectResponse
    {
        $inputs = $request->all();

        if ($request->hasFile('image'))
        {

            /*$result = $imageService->save($request->file('image'));*/

            /* $result = $imageService->fitAndSave($request->file('image'), 600,150);
             exit();*/

            $result = $imageService->save($request->file('image') , 'posts');



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
        $post->update($inputs);
        return redirect()->route('posts.index')->with('swal-success', 'پست جدید شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $result = $post->delete();
        return redirect()->route('posts.index')->with('swal-success', 'پست  شما با موفقیت حذف شد  ');
    }

    public function status(Post $post)
    {
        $post->status = $post->status == '0' ? '1' : '0';
        $result = $post->save();
        if ($result)
        {
            if ($post->status ==0)
            {
                return \response()->json(['status' => true, 'checked' => false]);
            }
            else
            {
                return \response()->json(['status' => true, 'checked' => true]);
            }
        }
        else
        {
            return response()->json(['status' => false, 'message' => 'Something went wrong, Please try again']);
        }
    }

    public function commentable(Post $post)
    {
        $post->commentable = $post->commentable == '0' ? '1' : '0';
        $result = $post->save();
        if ($result)
        {
            if ($post->commentable ==0)
            {
                return \response()->json(['commentable' => true, 'checked' => false]);
            }
            else
            {
                return \response()->json(['commentable' => true, 'checked' => true]);
            }
        }
        else
        {
            return response()->json(['commentable' => false, 'message' => 'Something went wrong, Please try again']);
        }
    }


    public function updateGallery(Request $request ,Post $post , ImageService $imageService)
    {
        $inputs = $request->all();
        $request->validate(
            [
                'gallery.*' => 'required'
            ]
        );

        if ($request->hasAny('gallery'))
        {


            $result = [];

            foreach ($request->gallery as $gallery)
            {
                array_push($result , $imageService->save($gallery , 'posts/gallery')) ;

            }





            if($result === false)
            {

                return redirect()->route('posts.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }

            $inputs['gallery'] = json_encode($result);

        }

        $post->update($inputs);
        return redirect()->route('posts.gallery' , $post->id)->with('swal-success', 'گالری پست شما با موفقیت ویرایش شد');


    }

    public function deleteGallery(Post $post)
    {
        $inputs['gallery'] =[];
        $post->update($inputs);
        return redirect()->route('posts.gallery' , $post->id)->with('swal-success', 'گالری پست شما با موفقیت ویرایش شد');
    }
}
