<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\Users\App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        if (User::all()->count() === 0)
        {

            if ($request->email == "admin" && $request->password="admin")
            {

                $password = "admin";
                $password_confirmation = "admin";
                $user = User::create([
                    'name' => 'admin' ,
                    'email' => "admin@gmail.com",
                    "password" => ($password),
                    "password_confirmation" => ($password_confirmation)
                ]);

                Auth::login($user);

                return redirect()->intended(RouteServiceProvider::HOME)->with('swal-warning', 'این یک کاربر موقت است . هرچه زودتر یک کاربر جدید ساخته و کاربر فعلی را حذف کنید');
            }

        }
        else
        {
            $request->validate([
                'email' => ['required', 'string' , 'email'],
                'password' => ['required', 'string'],
            ]);
            $request->authenticate();
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
