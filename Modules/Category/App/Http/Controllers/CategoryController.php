<?php

namespace Modules\Category\App\Http\Controllers;

use App\Http\Controllers\Controller;

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
        $Categories= Category::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('category::index', compact('Categories'));

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
    public function store(Request $request )
    {
        $inputs = $request->all();
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
    public function update(Request $request, Category $category)
    {
        $inputs = $request->all();

        $category ->update($inputs);
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
