<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CustomerRequest;
use App\Http\Services\Image\ImageService;
use App\Models\User;
use App\Notifications\NewUserRegisterd;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::where('user_type', 0)->get();
        return view('admin.user.customer.index', compact('customers') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('profile_photo_path'))
        {

            $imageService->setExclusiveDirectory('admin-assets/images' . DIRECTORY_SEPARATOR . 'admin-users');

            /*$result = $imageService->save($request->file('image'));*/

            /* $result = $imageService->fitAndSave($request->file('image'), 600,150);
             exit();*/

            $result = $imageService->save($request->file('profile_photo_path'));
            $inputs['profile_photo_path'] = $result;

            if($result === false)
            {
                return redirect()->route('admin.user.customer.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد  ');
            }

        }

        $inputs['password'] = bcrypt($inputs['password']);
        $inputs['status'] = 1;
        $inputs['user_type'] = 0;






        $customer = User::create($inputs);

        $details = [
          'message' => 'یک کاربر جدید در سایت ثبت نام کرد ' ,
        ];

        $adminUser = User::find(1);

        $adminUser->notify(new NewUserRegisterd($details));

        return redirect()->route('admin.user.customer.index')->with('swal-success', 'مشتری جدید شما با موفقیت ثبت شد  ');
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
    public function edit(User $user)
    {
        return view('admin.user.customer.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, User $user , ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('profile_photo_path'))
        {

            if (!empty($user->profile_photo_path))
            {
                $imageService->deleteImage($user->profile_photo_path);
            }

            $imageService->setExclusiveDirectory('admin-assets/images' . DIRECTORY_SEPARATOR . 'admin-users');

            /*$result = $imageService->save($request->file('image'));*/

            /* $result = $imageService->fitAndSave($request->file('image'), 600,150);
             exit();*/

            $result = $imageService->save($request->file('profile_photo_path'));
            $inputs['profile_photo_path'] = $result;

            if($result === false)
            {
                return redirect()->route('admin.user.customer.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد  ');
            }

        }

        $inputs['status'] = 1;
        $inputs['user_type'] = 0;






        $user->update($inputs);
        return redirect()->route('admin.user.customer.index')->with('swal-success', 'تغییرات شما با موفقیت ثبت شد  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $result = $user->forceDelete();
        return redirect()->route('admin.user.customer.index')->with('swal-success', 'مشتری  شما با موفقیت حذف شد  ');
    }

    public function status(User $user)
    {
        $user->status = $user->status == 0 ? 1 : 0;
        $result = $user->save();
        if ($result)
        {
            if ($user->status ==0)
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

    public function activation(User $user)
    {
        $user->activation = $user->activation == 0 ? 1 : 0;
        $result = $user->save();
        if ($result)
        {
            if ($user->activation ==0)
            {
                return \response()->json(['activation' => true, 'checked' => false]);
            }
            else
            {
                return \response()->json(['activation' => true, 'checked' => true]);
            }
        }
        else
        {
            return response()->json(['activation' => false, 'message' => 'Something went wrong, Please try again']);
        }
    }
}
