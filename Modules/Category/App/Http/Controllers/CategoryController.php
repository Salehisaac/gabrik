<?php

namespace Modules\Category\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use App\Http\Services\Image\ImageCacheService;
use App\Http\Services\Image\FileService;
use App\Models\Content\Copan;
use App\Models\Content\OfflinePayment;
use App\Models\Content\PostCategory;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    function __construct()
    {

        $this->middleware('can:read');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */




    public function index()
    {

        $user = Auth::user();



        /*if ($user->can('see'))*/


        $postCategories= PostCategory::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.content.category.index', compact('postCategories'));

        /*else
        {
            abort('403');
        }*/


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostCategoryRequest $request , FileService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image'))
        {

            $imageService->setExclusiveDirectory('admin-assets/images' . DIRECTORY_SEPARATOR . 'post-category');

            /*$result = $imageService->save($request->file('image'));*/

            /* $result = $imageService->fitAndSave($request->file('image'), 600,150);
             exit();*/

            $result = $imageService->createIndexAndSave($request->file('image'));

        }

        if($result === false)
        {
            return redirect()->route('admin.content.category.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد  ');
        }
        $inputs['image'] = $result;

        $postCategory = PostCategory::create($inputs);
        return redirect()->route('admin.content.category.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد  ');
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
    public function edit(PostCategory $postCategory)
    {

        return view('admin.content.category.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategoryRequest $request, PostCategory $postCategory, FileService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image'))
        {
            if (!empty($postCategory->image))
            {
                $imageService->deleteDirectoryAndFiles($postCategory->image['directory']);
            }
            $imageService->setExclusiveDirectory('admin-assets/images' . DIRECTORY_SEPARATOR . 'post-category');

            /*$result = $imageService->save($request->file('image'));*/

            /* $result = $imageService->fitAndSave($request->file('image'), 600,150);
             exit();*/

            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false)
            {
                return redirect()->route('admin.content.category.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد  ');
            }

            $inputs['image'] = $result;

        }

        else
        {
            if (isset($inputs['currentImage']) && !empty($postCategory->image))
            {
                $image = $postCategory->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }



        $postCategory ->update($inputs);
        return redirect()->route('admin.content.category.index')->with('swal-success', 'دسته بندی  شما با موفقیت ویرایش شد  ');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        $result = $postCategory->delete();
        return redirect()->route('admin.content.category.index')->with('swal-success', 'دسته بندی  شما با موفقیت حذف شد  ');
    }

    public function status(PostCategory $postCategory)
    {
        $postCategory->status = $postCategory->status == 0 ? 1 : 0;
        $result = $postCategory->save();
        if ($result)
        {
            if ($postCategory->status ==0)
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
}
