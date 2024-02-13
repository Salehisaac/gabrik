<?php

namespace Modules\Users\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Users\App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->simplePaginate(100);
        return view('users::index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $inputs = $request->all();
        $result = User::create($inputs);
        return redirect()->route('users.index')->with('swal-success', 'کاربر جدید شما با موفقیت ثبت شد');
    }

    /**
     * Show the specified resource.
     */
    public function show(User $user)
    {
        return view('users::show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users::edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $inputs = $request->all();
        $user->update($inputs);
        return redirect()->route('users.index')->with('swal-success', 'کاربر جدید شما با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $result = $user->delete();
        return redirect()->route('users.index')->with('swal-success', 'کاربر جدید شما با موفقیت حذف شد');
    }
}
