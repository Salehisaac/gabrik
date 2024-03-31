<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\File\FileService;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.video.index' , compact('videos'));
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function store(Request $request , FileService $fileService)
    {
        $inputs = $request->all();
        $inputs['uploaded_by'] = Auth::id();


        if ($request->hasAny('video'))
        {

            $result = $fileService->moveToPublic($request->file('video'));
            if($result === false)
            {

                return redirect()->route('admin.video.index')->with('swal-error', 'آپلود ویدئو با خطا مواجه شد');
            }
            $inputs['video'] = $result;
        }

        $result = Video::create($inputs);
        return redirect()->route('admin.video.index')->with('swal-error', 'ویدیو شما با موفقیت اضافه شد');
    }

    public function status(Video $video)
    {
        Video::where('id', '!=', $video->id)->update(['status' => '0']);
        $video->status = '1';

        $result = $video->save();
        if ($result)
        {
            if ($video->status ==0)
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

    public function edit(Video $video)
    {
        return view('admin.video.edit' , compact('video'));
    }

    public function update( Request $request ,Video $video , FileService $fileService)
    {
        $inputs = $request->all();


        if ($request->hasFile('video'))
        {

            $result = $fileService->moveToPublic($request->file('video'));
            if($result === false)
            {

                return redirect()->route('admin.video.index')->with('swal-error', 'آپلود ویدئو با خطا مواجه شد');
            }
            $inputs['video'] = $result;
        }

        $video->update($inputs);
        return redirect()->route('admin.video.index')->with('swal-error', 'ویدیو شما با موفقیت ویرایش شد');

    }

    public function destroy(Video $video)
    {
        $result = $video->delete();
        return redirect()->route('admin.video.index')->with('swal-success', 'ویدیو  شما با موفقیت حذف شد  ');
    }
}
