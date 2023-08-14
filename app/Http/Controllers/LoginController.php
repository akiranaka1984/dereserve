<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pages;
use App\Models\Companion;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Price;

use Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role'=>'user', 'status' => 1])) {
                return redirect(route('user.dashbord'));
            }
            return redirect()->back()->with('error', __('Your account has been temporarily suspended!'));
        }
        return redirect()->back()->with('error', __('Login details are not valid!'));
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('user.login');
    }

}
