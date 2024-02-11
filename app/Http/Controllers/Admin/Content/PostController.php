<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use App\Http\Requests\Admin\Content\PostRequest;

use App\Http\Services\Image\ImageService;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts= Post::orderBy('created_at', 'desc')->get();

        return view('admin.content.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postCategories= PostCategory::orderBy('created_at', 'desc')->get();
        return view('admin.content.post.create', compact('postCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, ImageService $imageService)
    {

        $inputs = $request->all();
        $inputs['author_id'] = auth()->user()->id;
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTimestampStart);

        if ($request->hasFile('image'))
        {

            $imageService->setExclusiveDirectory('admin-assets/images' . DIRECTORY_SEPARATOR . 'post');

            /*$result = $imageService->save($request->file('image'));*/

            /* $result = $imageService->fitAndSave($request->file('image'), 600,150);
             exit();*/

            $result = $imageService->createIndexAndSave($request->file('image'));

            if($result === false)
            {
                return redirect()->route('admin.content.post.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد  ');
            }

        }



        $inputs['image'] = $result;
        $post = Post::create($inputs);
        return redirect()->route('admin.content.post.index')->with('swal-success', 'پست جدید شما با موفقیت ثبت شد  ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $postCategories= PostCategory::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.content.post.edit', compact('post', 'postCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post, ImageService $imageService)
    {

      /*  if (!Gate::allows('update-post', $post))
        {
            abort(403);
        }*/

        /*if (Gate::forUser($user)->allows('update-post', $post)) // checks a user beside of the login one  */


        /*if (Gate::any(['update-post', 'delete-post'])*/ //checks multiply gates

        /*if (Gate::none(['update-post', 'delete-post'])*/ //the user is not allow if he has these alowneses


        /*Gate::authorize('update-post', $post);*/ //returns true or false (is he allowed ?)

      /*  $response = Gate::inspect('update-post', $post);

        if ($response->allowed())
        {
            dd('mitoni');
        }
        else
        {
            dd($response->message());
        }*/
        $inputs = $request->all();

        if (!empty($request->published_at))
        {
            $realTimestampStart = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTimestampStart);
        }

        if ($request->hasFile('image'))
        {
            if (!empty($post->image))
            {
                $imageService->deleteDirectoryAndFiles($post->image['directory']);
            }
            $imageService->setExclusiveDirectory('admin-assets/images' . DIRECTORY_SEPARATOR . 'post');

            /*$result = $imageService->save($request->file('image'));*/

            /* $result = $imageService->fitAndSave($request->file('image'), 600,150);
             exit();*/

            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false)
            {
                return redirect()->route('admin.content.post.index')->with('swal-error', 'آپلود عکس با خطا  شد  ');
            }

            $inputs['image'] = $result;

        }

        else
        {
            if (isset($inputs['currentImage']) && !empty($post->image))
            {
                $image = $post->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }


        $post ->update($inputs);



        return redirect()->route('admin.content.post.index')->with('swal-success', 'پست شما با موفقیت ویرایش شد  ');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $result = $post->delete();
        return redirect()->route('admin.content.post.index')->with('swal-success', 'پست  شما با موفقیت حذف شد  ');
    }

    public function status(Post $post)
    {
        $post->status = $post->status == 0 ? 1 : 0;
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
        $post->commentable = $post->commentable == 0 ? 1 : 0;
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
}
