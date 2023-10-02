<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Pages;
use App\Models\Companion;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Price;
use App\Models\AttendanceNotice;
use App\Models\MailMagazine;
use App\Models\WebReservation;
use App\Models\Interview;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $footer = Pages::where(['name'=>'footer'])->first();
        return view('page.index', compact('footer'));
    }

    public function main(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $main = Pages::where(['name'=>'main'])->first();
        $new_companions = Companion::with(['home_image', 'category'])->where(['status'=>1])->orderBy('id', 'DESC')->take(6)->get();


        $today_attendances = Attendance::with(['companion'])->where(['date'=>date('Y-m-d')])->where(function ($query) {
            $query->where('end_time', '=', null)
                  ->orWhere('end_time', '>', date('H:i'));
        })->get();

        $tomorrow_attendances = Attendance::with(['companion'])->where(['date'=>date('Y-m-d', strtotime('+1 days'))])->get();
        return view('page.main', compact('header','footer','main', 'new_companions', 'today_attendances', 'tomorrow_attendances'));
    }

    public function details(Request $request)
    {

        $schedule_dates = $this->weekly_dates();
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $companion = Companion::with(['category','home_image', 'all_images', 'attendances'])->where([ 'id'=>$request->id ])->first();
        return view('page.details', compact('header','footer', 'schedule_dates', 'companion'));
    }

    public function attendance_sheet(Request $request)
    {
        $schedule_dates = $this->weekly_dates();
        $req_date = !empty($request->date) ? $request->date : date('Y-m-d');
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $attendance_sheet = Pages::where(['name'=>'attendance_sheet'])->first();
        $today_attendances = Attendance::with(['companion'])->where(['date'=> $req_date])->get();
        return view('page.attendance_sheet', compact('header','footer','attendance_sheet','schedule_dates','today_attendances'));
    }

    public function enrollment_table(Request $request)
    {

        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $enrollment_table = Pages::where(['name'=>'enrollment_table'])->first();
        
        $all_records = array();
        $categories = Category::where(['status'=>1])->get();
        foreach($categories as $category){
            $sql = Companion::with(['category','home_image'])->where([ 'category_id'=>$category->id ]);

            $sql->where(function ($query) use ($request){
                if(!empty($request->search_av)){
                    $query->orWhere(['option_av_chk'=>1]);
                }
                if(!empty($request->search_newface)){
                    $query->orWhere(['option_newface_chk'=>1]);
                }
            });
            
            $sql->where(function ($query) use ($request){
                if(!empty($request->search_age18)){
                    $query->orWhere(function ($query1){
                        $query1->where('age', '>=', 18);
                        $query1->where('age', '<=', 19);
                    });
                }
                if(!empty($request->search_age20)){
                    $query->orWhere(function ($query1){
                        $query1->where('age', '>=', 20);
                        $query1->where('age', '<=', 24);
                    });
                }
                if(!empty($request->search_age25)){
                    $query->orWhere(function ($query1){
                        $query1->where('age', '>=', 25);
                        $query1->where('age', '<=', 29);
                    });
                }
                if(!empty($request->search_age30)){
                    $query->orWhere('age', '>=', 30);
                }
            });


            $sql->where(function ($query) use ($request){
                if(!empty($request->search_height149)){
                    $query->orWhere('height', '<=', 149);
                }
                if(!empty($request->search_height150)){
                    $query->orWhere(function ($query1){
                        $query1->where('height', '>=', 150);
                        $query1->where('height', '<=', 154);
                    });
                }
                if(!empty($request->search_height155)){
                    $query->orWhere(function ($query1){
                        $query1->where('height', '>=', 155);
                        $query1->where('height', '<=', 159);
                    });
                }
                if(!empty($request->search_height160)){
                    $query->orWhere(function ($query1){
                        $query1->where('height', '>=', 160);
                        $query1->where('height', '<=', 164);
                    });
                }
                if(!empty($request->search_height165)){
                    $query->orWhere(function ($query1){
                        $query1->where('height', '>=', 165);
                        $query1->where('height', '<=', 169);
                    });
                }
                if(!empty($request->search_height170)){
                    $query->orWhere('height', '>=', 170);
                }
            });
            
            $sql->where(function ($query) use ($request){
                if(!empty($request->search_bust_a)){
                    $query->orWhere('cup', '=', 'A');
                }
                if(!empty($request->search_bust_b)){
                    $query->orWhere('cup', '=', 'B');
                }
                if(!empty($request->search_bust_c)){
                    $query->orWhere('cup', '=', 'C');
                }
                if(!empty($request->search_bust_d)){
                    $query->orWhere('cup', '=', 'D');
                }
                if(!empty($request->search_bust_e)){
                    $query->orWhere('cup', '=', 'E');
                }
                if(!empty($request->search_bust_f)){
                    $query->orWhere('cup', '=', 'F');
                }
                if(!empty($request->search_bust_g)){
                    $query->orWhere('cup', '=', 'G');
                }
                if(!empty($request->search_bust_h)){
                    $query->orWhere('cup', '=', 'H');
                }
            });

            if(!empty($request->girls_search_text)){
                $sql->where('name', 'like', '%'.$request->girls_search_text.'%');
            }
            $all_records[$category->name] = $sql->get();
        }

        $search_param = (object) $request->all();
        return view('page.enrollment_table', compact('header','footer','search_param','enrollment_table','all_records'));

    }

    function weekly_dates()
    {
        $schedule_dates = array();
        for ($i=0; $i < 7; $i++) {
            $days = date('l', strtotime('+'.$i.' days'));
            $dayname="";
            if ($days == "Sunday") {
                $dayname = "日";
            }else if ($days == "Monday") {
                $dayname = "月";
            }else  if ($days == "Tuesday") {
                $dayname = "火";
            }else if ($days == "Wednesday") {
                $dayname = "水";
            }else  if ($days == "Thursday") {
                $dayname = "木";
            }else  if ($days == "Friday") {
                $dayname = "金";
            } else {
                $dayname = "土";
            }
            if($i == 0){
                $schedule_dates[date('Y-m-d', strtotime('+'.$i.' days'))] = "本(".$dayname.")";
            }else{
                $schedule_dates[date('Y-m-d', strtotime('+'.$i.' days'))] = date('m月d日', strtotime('+'.$i.' days'))."(".$dayname.")";
            }
        }

        return $schedule_dates;
    }

    public function movie(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $movie = Pages::where(['name'=>'movie'])->first();
        $companions = Companion::with(['home_image', 'category'])->where(['status'=>1])->orderBy('id', 'DESC')->take(6)->get();
        return view('page.movie', compact('header','footer','movie','companions'));
    }

    public function ranking(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $ranking = Pages::where(['name'=>'ranking'])->first();

        $all_records = array();
        $categories = Category::where(['status'=>1])->get();;
        foreach($categories as $category){
            $all_records[$category->name] = Companion::with(['category','home_image'])->where([ 'category_id'=>$category->id ])->orderBy('position')->take(6)->get();
        }

        return view('page.ranking', compact('header','footer','ranking','all_records'));
    }

    public function av(Request $request)
    {

        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $avs = Pages::where(['name'=>'av'])->first();
        
        $all_records = array();
        $categories = Category::where(['status'=>1])->get();
        foreach($categories as $category){
            $sql = Companion::with(['category','home_image'])->where([ 'category_id'=>$category->id, 'option_av_chk'=>1 ]);

            $sql->where(function ($query) use ($request){
                if(!empty($request->search_newface)){
                    $query->orWhere(['option_newface_chk'=>1]);
                }
            });
            
            $sql->where(function ($query) use ($request){
                if(!empty($request->search_age18)){
                    $query->orWhere(function ($query1){
                        $query1->where('age', '>=', 18);
                        $query1->where('age', '<=', 19);
                    });
                }
                if(!empty($request->search_age20)){
                    $query->orWhere(function ($query1){
                        $query1->where('age', '>=', 20);
                        $query1->where('age', '<=', 24);
                    });
                }
                if(!empty($request->search_age25)){
                    $query->orWhere(function ($query1){
                        $query1->where('age', '>=', 25);
                        $query1->where('age', '<=', 29);
                    });
                }
                if(!empty($request->search_age30)){
                    $query->orWhere('age', '>=', 30);
                }
            });


            $sql->where(function ($query) use ($request){
                if(!empty($request->search_height149)){
                    $query->orWhere('height', '<=', 149);
                }
                if(!empty($request->search_height150)){
                    $query->orWhere(function ($query1){
                        $query1->where('height', '>=', 150);
                        $query1->where('height', '<=', 154);
                    });
                }
                if(!empty($request->search_height155)){
                    $query->orWhere(function ($query1){
                        $query1->where('height', '>=', 155);
                        $query1->where('height', '<=', 159);
                    });
                }
                if(!empty($request->search_height160)){
                    $query->orWhere(function ($query1){
                        $query1->where('height', '>=', 160);
                        $query1->where('height', '<=', 164);
                    });
                }
                if(!empty($request->search_height165)){
                    $query->orWhere(function ($query1){
                        $query1->where('height', '>=', 165);
                        $query1->where('height', '<=', 169);
                    });
                }
                if(!empty($request->search_height170)){
                    $query->orWhere('height', '>=', 170);
                }
            });
            
            $sql->where(function ($query) use ($request){
                if(!empty($request->search_bust_a)){
                    $query->orWhere('cup', '=', 'A');
                }
                if(!empty($request->search_bust_b)){
                    $query->orWhere('cup', '=', 'B');
                }
                if(!empty($request->search_bust_c)){
                    $query->orWhere('cup', '=', 'C');
                }
                if(!empty($request->search_bust_d)){
                    $query->orWhere('cup', '=', 'D');
                }
                if(!empty($request->search_bust_e)){
                    $query->orWhere('cup', '=', 'E');
                }
                if(!empty($request->search_bust_f)){
                    $query->orWhere('cup', '=', 'F');
                }
                if(!empty($request->search_bust_g)){
                    $query->orWhere('cup', '=', 'G');
                }
                if(!empty($request->search_bust_h)){
                    $query->orWhere('cup', '=', 'H');
                }
            });

            if(!empty($request->girls_search_text)){
                $sql->where('name', 'like', '%'.$request->girls_search_text.'%');
            }
            $all_records[$category->name] = $sql->get();
        }

        $search_param = (object) $request->all();
        return view('page.av', compact('header','footer','search_param','avs','all_records'));

    }

    public function price(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();

        $categories = Category::with(['prices'])->where(['status'=>1])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
        return view('page.price', compact('header','footer', 'categories'));
    }
    
    public function privacy_policy(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $privacy_policy = Pages::where(['name'=>'privacy_policy'])->first();
        return view('page.privacy_policy', compact('header','footer', 'privacy_policy'));
    }

    public function event(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $event = Pages::where(['name'=>'event'])->first();
        return view('page.event', compact('header','footer', 'event'));
    }

    public function magazine(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        return view('page.magazine', compact('header','footer'));
    }
    
    public function reservation(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $month=date('m');
        $day = date('d');
        $prices = Price::join('categories','categories.id','=','prices.category_id')->selectRaw('*, prices.id')->get();
        return view('page.reservation', compact('header','footer', 'month', 'day', 'prices'));
    }
    
    public function reservation_save(Request $request)
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

        WebReservation::create([
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

        return redirect()->back()->with('success', __('Save Changes'));

    }

    public function attendance_notices(Request $request)
    {
        if(!empty($request->castsyukkinmail_add)){
            AttendanceNotice::updateOrInsert(['email' => $request->mail_addr],['name'=>$request->name, 'mail_actors'=>$request->mail_actors, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
            return redirect()->back()->with('success', __('Save Changes'));
        }else{
            AttendanceNotice::where(['email' => $request->mail_addr])->delete();
            return redirect()->back()->with('success', __('Successfully deleted'));
        }
    }

    public function magazine_save(Request $request)
    {
        if(!empty($request->castsyukkinmail_add)){
            MailMagazine::updateOrInsert(['email' => $request->mail_addr],['name'=>$request->name, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
            return redirect()->back()->with('success', __('Save Changes'));
        }else{
            MailMagazine::where(['email' => $request->mail_addr])->delete();
            return redirect()->back()->with('success', __('Successfully deleted'));
        }
    }

    public function recruit(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        return view('page.recruit', compact('header','footer'));
    }

    public function summary(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $summary = Pages::where(['name'=>'summary'])->first();
        return view('page.summary', compact('header','footer', 'summary'));
    }

    public function entry(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $entry = Pages::where(['name'=>'entry'])->first();
        $month=date('m');
        $day = date('d');
        return view('page.entry', compact('header','footer', 'entry', 'month', 'day'));
    }

    public function entry_save(Request $request)
    {
        $request->validate([ 
            'rec_name' => 'required',
            'rec_mail' => 'required',
            'rec_tel' => 'required',
            'rec_require' => 'required',
            'rec_age' => 'required'
        ]);

        $imageName = "";
        if($request->hasfile('rec_photo')){ 
            $request->validate(['rec_photo' => 'required|image|max:10240']);
            $image = $request->file('rec_photo');
            $ext = $image->getClientOriginalExtension();
            $imageName = rand('1111','9999').time().'.'.$ext;
            Storage::disk('public')->put('images/'.$imageName, file_get_contents($image), 'public');
        }

        Interview::updateOrCreate([
            'mail' => $request->rec_mail,
        ],[
            'name' => $request->rec_name,
            'tel'  => $request->rec_tel,
            'line_id' => $request->rec_lineid,
            'inquiry' => $request->rec_require,
            'age' => $request->rec_age,
            'height' => $request->rec_height,
            'weight' => $request->rec_weight,
            'bust' => $request->rec_bust,
            'tattoo' => $request->biko,
            'interview_date'=> date('Y').'-'.$request->rec_interview1_m.'-'.$request->rec_interview1_d.' '.$request->rec_interview1_h.':'.$request->rec_interview1_min,
            'experience' => $request->tattoo,
            'appealing_points' => '',
            'other_message' => '',
            'photo' => $imageName,
            'compatible' => 0,
            'status' => 1
        ]);

        return redirect()->back()->with('success', __('Save Changes'));


    }

    public function terms(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.web.reservation',['comp_id'=>$request->comp_id]));
        }
        return view('user.terms');
    }

}
