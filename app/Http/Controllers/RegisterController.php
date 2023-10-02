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
        User::updateOrCreate([
            'username' => $request->id,
        ],[
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

        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'status' => 1])) {
            return redirect()->route('user.web.reservation')->with('success', __('Save Changes'));
        }

        return redirect()->route('user.register',['comp_id'=>$request->comp_id])->with('error', __('Registration details are not valid!'));
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



        if (Auth::check()) {
            // $user = User::where(['id'=>Auth::id()])->first();
            // $telegramCred = TelegramCred::where(['id'=>1])->first();
            // $blogPost = BlogPost::where(['id'=>5])->first();
            // $content = $blogPost->content;
            // $sender_name = $blogPost->sender_name;
            // $sender_address = $blogPost->sender_address;

            // $content = str_replace('%reserve_name%', $webReservation->name, $content);
            // $content = str_replace('%reserve_tel%', $webReservation->tel, $content);
            // $content = str_replace('%reserve_tel1%', $webReservation->tel, $content);
            // $content = str_replace('%reserve_mail%', $webReservation->mail, $content);
            // $content = str_replace('%reserve_cmnt%', $webReservation->cmnt, $content);
            // $content = str_replace('%rec_cmnt%', $webReservation->cmnt, $content);
            // $content = str_replace('%reserve_date%', date('Y-m-d', strtotime($webReservation->created_at)), $content);

            // $content = str_replace('%common_mail%', $sender_address, $content);
            // $content = str_replace('%shop_name%', $sender_name, $content);
            // $content = str_replace('%shop_tel%', "03-6868-5149", $content);
            // $content = str_replace('%shop_open%', "12:00", $content);
            // $content = str_replace('%shop_finish%', "05:00", $content);
            // $content = str_replace('%shop_url%', "https://club-firenze.net", $content);
            // $content = strip_tags($content);
            
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => 'https://api.telegram.org/bot'.$telegramCred->token.'/sendmessage?chat_id='.$user->username.'&text='.urlencode($content),
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => '',
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 0,
            //     CURLOPT_FOLLOWLOCATION => true,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => 'GET',
            // ));
            
            // $response = curl_exec($curl);
            // curl_close($curl);

            return redirect(route('user.dashbord'));
        }

        return redirect()->back()->with('error', __('Web regervation are not valid!'));

    }

}
