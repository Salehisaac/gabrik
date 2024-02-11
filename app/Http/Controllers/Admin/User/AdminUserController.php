<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostRequest;
use App\Http\Requests\Admin\User\AdminUserRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Access\Permission;
use App\Models\Access\Role;
use App\Models\Content\Post;
use App\Models\User;
use Illuminate\Http\Request;

use function Illuminate\Events\queueable;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('user_type', 1)->get();

        return  view('admin.user.admin-user.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.user.admin-user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request, ImageService $imageService)
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
                return redirect()->route('admin.user.admin-user.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد  ');
            }

        }

        $inputs['password'] = bcrypt($inputs['password']);
        $inputs['status'] = 1;
        $inputs['user_type'] = 1;






        $admin = User::create($inputs);
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'ادمین جدید شما با موفقیت ثبت شد  ');

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
        return view('admin.user.admin-user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserRequest $request, User $user , ImageService $imageService)
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
                return redirect()->route('admin.user.admin-user.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد  ');
            }

        }

        $inputs['status'] = 1;
        $inputs['user_type'] = 1;






        $user->update($inputs);
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'تغییرات شما با موفقیت ثبت شد  ');
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
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'ادمین  شما با موفقیت حذف شد  ');
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

    public function roles(User $admin)
    {
        $roles = Role::all();
        return view('admin.user.admin-user.roles', compact('roles', 'admin'));
    }

    public function rolesStore(Request $request, User $admin)
    {
            $validated = $request->validate([
                'roles' => 'exists:roles,id|array',
            ]);

            $admin->roles()->sync($request->roles);
            return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'نقش  شما با موفقیت ویرایش شد  ');
    }

    public function permissions(User $admin)
    {
        $permissions = Permission::all();
        return view('admin.user.admin-user.permissions', compact('permissions', 'admin'));
    }

    public function permissionsStore(Request $request, User $admin)
    {

        $validated = $request->validate([
            'permissions' => 'exists:permissions,id|array',
        ]);

        $admin->permissions()->sync($request->permissions);
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'سطوح دسترسی  شما با موفقیت ویرایش شد  ');
    }


}
