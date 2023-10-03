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
use App\Models\BlogPost;

use App\Jobs\WebReservationToCustomerJob;
use App\Jobs\WebReservationToStoreJob;
use App\Jobs\MembershipToCustomerJob;
use App\Jobs\MembershipToStoreJob;

use Session;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $telegramCred = TelegramCred::where(['id'=>1])->first();
        return view('user.register', ['telegramCred'=>$telegramCred]);
    }

    public function save(Request $request)
    {
        $user = User::where(['username' => $request->id])->first();
        if($user == null){
            $user = User::create([
                'username' => $request->id,
                'name' => $request->lastname.' '.$request->firstname,
                'email' => $request->email,
                'email_verify_status' => 1,
                'password' => bcrypt($request->password),
                'profile_pics' => (!empty($request->photo_url) ? $request->photo_url : ""),
                "tel" => $request->tel,
                "lineid" => $request->lineid,
                'city'=>'jp',
                'role'=>'user'
            ]);

            dispatch(new MembershipToCustomerJob(['user'=>$user, 'comp_id'=>$request->comp_id]));
            dispatch(new MembershipToStoreJob(['user'=>$user, 'comp_id'=>$request->comp_id]));

        }else{
            User::where([
                'username' => $request->id
            ])->update([
                'name' => $request->lastname.' '.$request->firstname,
                'email' => $request->email,
                'email_verify_status' => 1,
                'password' => bcrypt($request->password),
                'profile_pics' => (!empty($request->photo_url) ? $request->photo_url : ""),
                "tel" => $request->tel,
                "lineid" => $request->lineid,
                'city'=>'jp',
                'role'=>'user'
            ]);
        }

        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'status' => 1])) {
            return redirect()->route('user.web.reservation')->with('success', __('Save Changes'));
        }

        return redirect()->route('user.register')->with('error', __('Registration details are not valid!'));
    }

    public function web_reservation(Request $request)
    {
        if (Auth::check()) {
            $today = date('Y-m-d');
            $time = date('H:i:s');
            $month=date('m');
            $day = date('d');
            $header = Pages::where(['name'=>'header'])->first();
            $footer = Pages::where(['name'=>'footer'])->first();
            $prices = Price::join('categories','categories.id','=','prices.category_id')->selectRaw('*, prices.id')->get();
            
            $users = User::where(['id' =>Auth::id()])->first();
            return view('user.web_reservation', compact('header', 'footer', 'month', 'day', 'today', 'time', 'prices','users'));
        }
        return redirect()->route('user.login',['wbr'=>1]);
    }

    public function web_reservation_save(Request $request)
    {
        $request->validate([ 
            'reserve_name' => 'required',
            'reserve_mail' => 'required',
            'reserve_tel' => 'required',
            'reserve_lady1' => 'required','reserve_lady2' => 'required','reserve_lady3' => 'required',
            'reserve_month1' => 'required','reserve_day1' => 'required','reserve_hour1' => 'required','reserve_minut1' => 'required',
            'reserve_month2' => 'required','reserve_day2' => 'required','reserve_hour2' => 'required','reserve_minut2' => 'required',
            'reserve_month3' => 'required','reserve_day3' => 'required','reserve_hour3' => 'required','reserve_minut3' => 'required',
            'reserve_cource' => 'required'
        ]);

        $webReservation = WebReservation::create([
            'user_id' => $request->frm_user_id,
            'name' => $request->reserve_name,
            'mail' => $request->reserve_mail,
            'tel' => $request->reserve_tel,
            'lineid' => $request->reserve_lineid,
            'lady1' => $request->reserve_lady1,'lady2' => $request->reserve_lady2,'lady3' => $request->reserve_lady3,
            'month1' => $request->reserve_month1,'day1' => $request->reserve_day1,'hour1' => $request->reserve_hour1,'minut1' => $request->reserve_minut1,
            'month2' => $request->reserve_month2,'day2' => $request->reserve_day2,'hour2' => $request->reserve_hour2,'minut2' => $request->reserve_minut2,
            'month3' => $request->reserve_month3,'day3' => $request->reserve_day3,'hour3' => $request->reserve_hour3,'minut3' => $request->reserve_minut3,
            'cource' => $request->reserve_cource,
            'place' => $request->reserve_place,
            'pay' => $request->reserve_pay,
            'contact' => $request->reserve_contact,
            'cmnt' => $request->reserve_cmnt
        ]);

        User::where(['id' => $request->frm_user_id])->update([
            'cource' => $request->reserve_cource,
            'pay' => $request->reserve_pay,
            'contact' => $request->reserve_contact,
            'cmnt' => $request->reserve_cmnt
        ]);

        if (Auth::check()) {
            dispatch(new WebReservationToCustomerJob(['webReservation'=>$webReservation]));
            dispatch(new WebReservationToStoreJob(['webReservation'=>$webReservation]));
            return redirect(route('user.reception.list'));
        }

        return redirect()->back()->with('error', __('Web regervation are not valid!'));

    }

}
