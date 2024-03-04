<?php

namespace Modules\FAQ\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\FAQ\App\Http\Requests\FAQRequest;
use Modules\FAQ\App\Models\Faq;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('faq::index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faq::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQRequest $request)
    {
        $inputs = $request->all();
        $faq = Faq::create($inputs);
        return redirect()->route('admin.content.faq.index')->with('swal-success', 'سوال جدید شما با موفقیت ثبت شد  ');
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
    public function edit(Faq $faq)
    {
        return view('faq::edit', compact('faq'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FAQRequest $request, Faq $faq)
    {
        $inputs = $request->all();
        $faq->update($inputs);
        return redirect()->route('admin.content.faq.index')->with('swal-success', 'سوال جدید شما با موفقیت ویرایش شد  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $result = $faq->delete();
        return redirect()->route('admin.content.faq.index')->with('swal-success', 'سوال  شما با موفقیت حذف شد  ');
    }

    public function status(Faq $faq)
    {
        $faq->status = $faq->status == 0 ? 1 : 0;
        $result = $faq->save();
        if ($result)
        {
            if ($faq->status ==0)
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
