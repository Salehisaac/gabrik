<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\ImageGallery;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    public function index()
    {
        $galleries = ImageGallery::all();
        return view('admin.gallery.index' , compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request , ImageService $imageService)
    {
        $request->validate(
            [
                'gallery.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gallery' => 'required|array|size:9',
                'description' => 'required|string|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹يء.,><\/;\n\r& ]+$/u',
            ]
        );
        $inputs = $request->all();
        $inputs['uploaded_by'] = 9;


        if ($request->hasAny('gallery'))
        {

            $result = [];

            foreach ($request->gallery as $gallery)
            {
                array_push($result , $imageService->save($gallery , 'gallery')) ;

            }


            if($result === false)
            {

                return redirect()->route('admin.gallery.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }

            $inputs['gallery'] = json_encode($result);

        }

        $result = ImageGallery::create($inputs);
        return redirect()->route('admin.gallery.index')->with('swal-error', 'گالری شما با موفقیت اضافه شد');
    }

    public function status(ImageGallery $imageGallery)
    {
        ImageGallery::where('id', '!=', $imageGallery->id)->update(['status' => '0']);
        $imageGallery->status = '1';

        $result = $imageGallery->save();
        if ($result)
        {
            if ($imageGallery->status ==0)
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

    public function edit(ImageGallery $imageGallery)
    {
        return view('admin.gallery.edit' , compact('imageGallery'));
    }

    public function update( Request $request ,ImageGallery $imageGallery , ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasAny('gallery'))
        {

            $result = [];

            foreach ($request->gallery as $gallery)
            {
                array_push($result , $imageService->save($gallery , 'gallery')) ;

            }


            if($result === false)
            {

                return redirect()->route('admin.gallery.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }

            $inputs['gallery'] = json_encode($result);

        }




        $imageGallery->update($inputs);
        return redirect()->route('admin.gallery.index')->with('swal-error', 'گالری شما با موفقیت ویرایش شد');

    }

    public function destroy(ImageGallery $imageGallery)
    {
        $result = $imageGallery->delete();
        return redirect()->route('admin.gallery.index')->with('swal-success', 'گالری  شما با موفقیت حذف شد  ');
    }
}
