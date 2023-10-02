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

        if (Auth::attempt(['username'=>$request->id, 'password'=>$password, 'status' => 1])) {
            return redirect()->route('user.web.reservation')->with('success', __('Save Changes'));
        }

        return redirect()->route('user.register',['comp_id'=>$request->comp_id])->with('error', __('Registration details are not valid!'));
    }

    public function web_reservation(Request $request)
    {
        $today = date('Y-m-d');
        $time = date('H:i:s');
        $prices = Price::join('categories','categories.id','=','prices.category_id')->selectRaw('*, prices.id')->get();
        
        $users = User::where(['id' =>Auth::id()])->first();
        return view('user.web_reservation', compact('today', 'time', 'prices','users'));
    }

    public function web_reservation_save(Request $request)
    {
       
        $webReservation = WebReservation::create([
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
            $user = User::where(['id'=>Auth::id()])->first();
            $telegramCred = TelegramCred::where(['id'=>1])->first();
            $blogPost = BlogPost::where(['id'=>5])->first();
            $content = $blogPost->content;
            $sender_name = $blogPost->sender_name;
            $sender_address = $blogPost->sender_address;

            $content = str_replace('%reserve_name%', $webReservation->name, $content);
            $content = str_replace('%reserve_tel%', $webReservation->tel, $content);
            $content = str_replace('%reserve_tel1%', $webReservation->tel, $content);
            $content = str_replace('%reserve_mail%', $webReservation->mail, $content);
            $content = str_replace('%reserve_cmnt%', $webReservation->cmnt, $content);
            $content = str_replace('%rec_cmnt%', $webReservation->cmnt, $content);
            $content = str_replace('%reserve_date%', date('Y-m-d', strtotime($webReservation->created_at)), $content);

            $content = str_replace('%common_mail%', $sender_address, $content);
            $content = str_replace('%shop_name%', $sender_name, $content);
            $content = str_replace('%shop_tel%', "03-6868-5149", $content);
            $content = str_replace('%shop_open%', "12:00", $content);
            $content = str_replace('%shop_finish%', "05:00", $content);
            $content = str_replace('%shop_url%', "https://club-firenze.net", $content);
            $content = strip_tags($content);
            
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.telegram.org/bot'.$telegramCred->token.'/sendmessage?chat_id='.$user->username.'&text='.urlencode($content),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            
            $response = curl_exec($curl);
            curl_close($curl);

            return redirect(route('user.dashbord'));
        }

        return redirect()->back()->with('error', __('Web regervation are not valid!'));

    }

}
