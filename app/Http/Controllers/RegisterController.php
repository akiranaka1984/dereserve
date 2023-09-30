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
use Session;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('user.register', ['comp_id'=>$request->comp_id]);
    }

    public function save(Request $request)
    {
        $token = "6432932571:AAEiMdF3P7zigjt9rdHw2_KWLRNgDeUyXB8";

        $password = rand('1111','9999').rand('1111','9999');
        User::updateOrCreate([
            'username' => $request->id,
        ],[
            'name' => $request->lastname.' '.$request->firstname,
            'email' => $request->email,
            'email_verify_status' => 1,
            'password' => bcrypt($password),
            'profile_pics' => (!empty($request->photo_url) ? $request->photo_url : ""),
            'city'=>'jp',
            'role'=>'user'
        ]);

        if (Auth::attempt(['username'=>$request->id, 'password'=>$password, 'status' => 1])) {
            return redirect()->route('user.web.reservation',[ 'comp_id'=>$request->comp_id])->with('success', __('Save Changes'));
        }

        return redirect()->route('user.register',['comp_id'=>$request->comp_id])->with('error', __('Registration details are not valid!'));
    }

    public function web_reservation(Request $request)
    {
        $today = date('Y-m-d');
        $time = date('H:i:s');
        $comp_id = $request->comp_id;
        $prices = Price::join('categories','categories.id','=','prices.category_id')->selectRaw('*, prices.id')->get();
        
        $users = User::where(['id' =>Auth::id()])->first();

        echo '<pre>';
        print_r($users);
        exit;

        return view('user.web_reservation', compact('comp_id', 'today', 'time', 'prices'));
    }

}
