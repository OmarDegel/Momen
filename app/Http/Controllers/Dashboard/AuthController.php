<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('admin.auth.login');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended(route('dashboard.home.index'));
        }

        return redirect()->back()->withErrors(['email' => __('auth.failed')]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('dashboard.login.view');
    }
}
