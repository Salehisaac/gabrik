<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\CommentRequest;
use App\Models\Content\Comment;
use App\Models\Content\Menu;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $unSeenComments = Comment::where('commentable_type' , 'App\Models\Content\Post')->where('seen', 0)->get();

        foreach ($unSeenComments as $unSeenComment)
        {
            $unSeenComment->seen = 1;
            $result = $unSeenComment->save();
        }
        $comments = Comment::orderBy('created_at', 'desc')->where('commentable_type' , 'App\Models\Content\Post')->paginate(10);
        return view('admin.content.comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {

        return view('admin.content.comment.show', compact('comment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status(Comment $comment)
    {
        $comment->status = $comment->status == 0 ? 1 : 0;
        $result = $comment->save();
        if ($result)
        {
            if ($comment->status ==0)
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

    public function approved(Comment $comment)
    {
        $comment->approved = $comment->approved == 0 ? 1 : 0;
        $result = $comment->save();
        return redirect()->route('admin.content.comment.index')->with('swal-success', 'وضعیت نظر  شما با موفقیت تغییر شد ');
    }

    public function answer( Comment $comment, CommentRequest $request)
    {
        if ($comment->parent_id ==NULL)
        {
            $inputs = $request->all();
            $inputs['parent_id'] = $comment->id;
            $inputs['author_id'] = 1;
            $inputs['status'] = 1;
            $inputs['approved'] = 1;
            $inputs['commentable_id'] = $comment->commentable_id;
            $inputs['commentable_type'] = $comment->commentable_type;
            $comment = Comment::create($inputs);
            return redirect()->route('admin.content.comment.index')->with('swal-success', 'پاسخ شما با موفقیت ثبت شد ');
        }
        else
        {
            return redirect()->route('admin.content.comment.index')->with('swal-error', 'امکان پاسخ دهی به ادمین وجود ندارد ');
        }

    }
}
