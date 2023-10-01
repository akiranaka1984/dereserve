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
use App\Models\WebReservation;
use App\Models\TelegramCred;
use Session;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $telegramCred = TelegramCred::where(['id'=>1])->first();
        return view('user.register', ['comp_id'=>$request->comp_id, 'telegramCred'=>$telegramCred]);
    }

    public function save(Request $request)
    {
        $token = "6432932571:AAEiMdF3P7zigjt9rdHw2_KWLRNgDeUyXB8";

        $password = '9988776655';
        User::updateOrCreate([
            'username' => $request->id,
        ],[
            'name' => $request->lastname.' '.$request->firstname,
            'email' => $request->email,
            'email_verify_status' => 1,
            'password' => bcrypt($password),
            'profile_pics' => (!empty($request->photo_url) ? $request->photo_url : ""),
            "tel" => $request->tel,
            "lineid" => $request->lineid,
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
        return view('user.web_reservation', compact('comp_id', 'today', 'time', 'prices','users'));
    }

    public function web_reservation_save(Request $request)
    {
        WebReservation::create([
            'user_id' => $request->frm_user_id,
            'comp_id' => $request->frm_comp_id,
            'name' => $request->frm_name,
            'mail' => $request->frm_email,
            'tel' => $request->frm_tel,
            'lineid' => $request->frm_line_id,
            'lady1' => $request->frm_lady1,
                'month1' => date('m', strtotime($request->frm_date1)),
                'day1' => date('d', strtotime($request->frm_date1)),
                'hour1' => date('H', strtotime($request->frm_time1)),
                'minut1' => date('i', strtotime($request->frm_time1)),
            'lady2'=> $request->frm_lady2,
                'month2' => date('m', strtotime($request->frm_date2)),
                'day2' => date('d', strtotime($request->frm_date2)),
                'hour2' => date('H', strtotime($request->frm_time2)),
                'minut2' => date('i', strtotime($request->frm_time2)),
            'lady3'=> $request->frm_lady3,
                'month3' => date('m', strtotime($request->frm_date3)),
                'day3' => date('d', strtotime($request->frm_date3)),
                'hour3' => date('H', strtotime($request->frm_time3)),
                'minut3' => date('i', strtotime($request->frm_time3)),
            'cource' => $request->frm_course,
            'place' => $request->frm_place,
            'pay' => $request->frm_payment_method,
            'contact' => 'LINE',
            'cmnt' => $request->frm_cmnt
        ]);

        if (Auth::check()) {
            return redirect(route('user.dashbord'));
        }

        return redirect()->back()->with('error', __('Web regervation are not valid!'));

    }

}
