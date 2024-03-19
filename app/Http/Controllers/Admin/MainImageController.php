<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\MainImage;
use Illuminate\Http\Request;
use Modules\Category\App\Models\Category;
use Modules\Menue\App\Models\Menu;

class MainImageController extends Controller
{
    public function index()
    {
        $mainImages = MainImage::all();
        return view('admin.mainImage.index' , compact('mainImages'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.mainImage.create' , compact('categories') );
    }

    public function edit(MainImage $mainImage)
    {
        $categories = Category::all();
        return view('admin.mainImage.edit' , compact('mainImage','categories') );
    }

    public function update(Request $request , MainImage $mainImage , ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image'))
        {
            $result = $imageService->save($request->file('image') , 'main_images');

            if($result === false)
            {
                return redirect()->route('admin.main_image.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }

            $inputs['image'] = $result;
        }

        if ($inputs['url'] === null)
        {
            $inputs['url'] = $inputs['url_select'];
        }

        $mainImage->update($inputs);
        return redirect()->route('admin.main_image.index')->with('swal-success', 'عکس جدید شما با موفقیت ویرایش شد');


    }

    public function store(Request $request, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image'))
        {
            $result = $imageService->save($request->file('image') , 'main_images');

            if($result === false)
            {

                return redirect()->route('admin.main_image.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }

            $inputs['image'] = $result;
        }

        if ($inputs['url'] === null)
        {
            $inputs['url'] = $inputs['url_select'];
        }

        $mainImage = MainImage::create($inputs);
        return redirect()->route('admin.main_image.index')->with('swal-success', 'عکس جدید شما با موفقیت ثبت شد');

    }

    public function status(MainImage $mainImage)
    {
        $mainImage->status = $mainImage->status == '0' ? '1' : '0';
        $result = $mainImage->save();
        if ($result)
        {
            if ($mainImage->status ==0)
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

    public function destroy(MainImage $mainImage)
    {
        $result = $mainImage->delete();
        return redirect()->route('admin.main_image.index')->with('swal-success', 'منوی  شما با موفقیت حذف شد  ');
    }
}
