<?php

namespace Modules\Category\App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Services\Image\ImageService;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Category\App\Models\Category;

class CategoryController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */




    public function index()
    {

         Auth::user();
        $categories= Category::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('category::index', compact('categories'));

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
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request , ImageService $imageService )
    {
        $inputs = $request->all();

        if ($request->hasFile('image'))
        {

            /*$result = $imageService->save($request->file('image'));*/

            /* $result = $imageService->fitAndSave($request->file('image'), 600,150);
             exit();*/

            $result = $imageService->save($request->file('image') , 'categories');



            if($result === false)
            {

                return redirect()->route('posts.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }


        }
        $inputs['image'] = $result;
        $category = Category::create($inputs);
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
    public function edit(Category $category)
    {
        return view('category::edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category , ImageService $imageService)
    {

        $inputs = $request->all();

        if ($request->hasFile('image'))
        {

            /*$result = $imageService->save($request->file('image'));*/

            /* $result = $imageService->fitAndSave($request->file('image'), 600,150);
             exit();*/

            $result = $imageService->save($request->file('image') , 'categories');



            if($result === false)
            {
                return redirect()->route('posts.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }

            $inputs['image'] = $result;
        }


        $category->update($inputs);
        return redirect()->route('admin.content.category.index')->with('swal-success', 'دسته بندی  شما با موفقیت ویرایش شد  ');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $result = $category->delete();
        return redirect()->route('admin.content.category.index')->with('swal-success', 'دسته بندی  شما با موفقیت حذف شد');
    }

    public function status(Category $category)
    {
        $category->status = $category->status == '0' ? '1' : '0';
        $result = $category->save();
        if ($result)
        {
            if ($category->status ==0)
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
