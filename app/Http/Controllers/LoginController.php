<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pages;
use App\Models\Companion;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Price;
use App\Models\User;
use App\Models\TelegramCred;

use Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.dashbord'));
        }
        $telegramCred = TelegramCred::where(['id'=>1])->first();
        return view('user.login', ['telegramCred'=>$telegramCred]);
    }

    public function login(Request $request)
    {
        $user = User::where(['username' => $request->id])->first();
        $password = '9988776655';
        if($user != null){
            if (Auth::attempt(['username'=>$request->id, 'password'=>$password, 'status' => 1])) {
                return redirect(route('user.dashbord'));
            }
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
