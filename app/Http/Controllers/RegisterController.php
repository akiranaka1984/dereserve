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

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('user.register');
    }

    public function save(Request $request)
    {
        $token = "6432932571:AAEiMdF3P7zigjt9rdHw2_KWLRNgDeUyXB8";

        $password = rand('1111','9999').rand('1111','9999');
        User::create([
            'name' => $request->lastname.' '.$request->firstname,
            'username' => $request->id,
            'email' => $request->email,
            'email_verify_status' => 1,
            'password' => bcrypt($password),
            'profile_pics' => (!empty($request->photo_url) ? $request->photo_url : ""),
            'city'=>'jp',
            'role'=>'user'
        ]);

        return redirect()->route('user.register')->with('success', __('Save Changes'));

    }

}
