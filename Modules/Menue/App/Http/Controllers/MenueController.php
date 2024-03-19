<?php

namespace Modules\Menue\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Category\App\Models\Category;
use Modules\Menue\App\Http\Requests\MenuRequest;
use Modules\Menue\App\Models\Menu;

class MenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus= Menu::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('menue::index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::where('parent_id', 0)->orWhere('parent_id', NULL)->get();
        $categories = Category::all();
        return view('menue::create', compact('menus' , 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request )
    {
        $inputs = $request->all();

        if ($inputs['url'] === null)
        {
            $inputs['url'] = $inputs['url_select'];
        }
        $menu = Menu::create($inputs);
        return redirect()->route('admin.content.menu.index')->with('swal-success', 'منوی جدید شما با موفقیت ثبت شد  ');
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
    public function edit(Menu $menu)
    {
        $parent_menus = Menu::where('parent_id', 0)->orWhere('parent_id', NULL)->get()->except($menu->id);
        return view('menue::edit', compact('menu', 'parent_menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $inputs = $request->all();

        $menu ->update($inputs);
        return redirect()->route('admin.content.menu.index')->with('swal-success', 'منوی  شما با موفقیت ویرایش شد  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $result = $menu->delete();
        return redirect()->route('admin.content.menu.index')->with('swal-success', 'منوی  شما با موفقیت حذف شد  ');
    }

    public function status(Menu $menu)
    {
        $menu->status = $menu->status == 0 ? 1 : 0;
        $result = $menu->save();
        if ($result)
        {
            if ($menu->status ==0)
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
