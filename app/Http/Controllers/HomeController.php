<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Pages;
use App\Models\Companion;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Price;
use App\Models\AttendanceNotice;
use App\Models\MailMagazine;
use App\Models\WebReservation;
use App\Models\Interview;

use App\Jobs\RecruitmentToApplicantJob;
use App\Jobs\RecruitmentToStoreJob;
use App\Models\Contact;
use App\Models\News;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $main = Pages::where(['name'=>'main'])->first();
        $campaign = Pages::where(['name'=>'campaign'])->first();
        $new_companions = Companion::with(['today_attendances','home_image', 'category'])->where(['status'=>1])->orderBy('id', 'DESC')->take(6)->get();
        $today_attendances = Attendance::with(['companion'])->where(['date'=>date('Y-m-d')])->get();
        $tomorrow_attendances = Attendance::with(['companion'])->where(['date'=>date('Y-m-d', strtotime('+1 days'))])->get();
        $recent_news = News::orderBy('id', 'DESC')->take(5)->get();
        return view('page.index', compact('header','footer','main', 'new_companions', 'today_attendances', 'tomorrow_attendances', 'recent_news', 'campaign'));
    }

    public function concept(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $concept = Pages::where(['name'=>'concept'])->first();
        return view('page.concept', compact('header','footer','concept'));
    }

    public function details(Request $request)
    {
        $schedule_dates = $this->weekly_dates();
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $companion = Companion::with(['category','home_image', 'all_images', 'attendances'])->where(['id'=>$request->id ])->first();
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
        return view('page.attendance_sheet', compact('header','footer','req_date','attendance_sheet','schedule_dates','today_attendances'));
    }

    public function enrollmentTable()
{
    return view('enrollment_table');
}


    public function enrollment_table(Request $request)
    {

        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $enrollment_table = Pages::where(['name'=>'enrollment_table'])->first();

        $all_records = array();
        $categories = Category::where(['status'=>1])->get();
        foreach($categories as $category){
            $sql = Companion::with(['today_attendances','category','home_image'])->where([ 'category_id'=>$category->id ])->where(['status' => 1]);

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

    public function price(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $priceData = Pages::where(['name'=>'price'])->first();
        // dd($price->text_data2);
        $categories = Category::with(['prices'])->where(['status'=>1])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
        return view('page.price', compact('header','footer', 'priceData', 'categories'));
    }

    public function news(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $event = Pages::where(['name'=>'event'])->first();
        if ($request->year) {
            $news_data = News::whereYear('created_at', $request->year)->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $news_data = News::orderBy('created_at', 'desc')->paginate(10);
        }
        $years = News::selectRaw('YEAR(created_at) as year')->groupBy('year')->orderBy('year', 'desc')->get();
        return view('page.news', compact('header','footer', 'event', 'news_data', 'years'));
    }

    public function news_details(Request $request, $slug)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $event = Pages::where(['name'=>'event'])->first();
        $news_detail = News::where('slug', $slug)->first();
        return view('page.news-details', compact('header','footer', 'event', 'news_detail'));
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
                $schedule_dates[date('Y-m-d', strtotime('+'.$i.' days'))] = "本日 ".date('m月d日', strtotime('+'.$i.' days'))."(".$dayname.")";
            }else{
                $schedule_dates[date('Y-m-d', strtotime('+'.$i.' days'))] = date('m月d日', strtotime('+'.$i.' days'))."(".$dayname.")";
            }
        }

        return $schedule_dates;
    }

    public function privacy_policy(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $privacy_policy = Pages::where(['name'=>'privacy_policy'])->first();
        return view('page.privacy_policy', compact('header','footer', 'privacy_policy'));
    }

    public function magazine(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        return view('page.magazine', compact('header','footer'));
    }

    public function magazine_save(Request $request)
    {
        if(!empty($request->castsyukkinmail_add)){
            MailMagazine::updateOrInsert(
                [
                    'email' => $request->email
                ],
                [
                    'name'=>$request->name,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
            return redirect()->back()->with('success', __('Save Changes'));
        }else{
            MailMagazine::where(['email' => $request->email])->delete();
            return redirect()->back()->with('success', __('Successfully deleted'));
        }
    }

    public function contact(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        return view('page.contact', compact('header','footer'));
    }

    public function contact_save(Request $request)
    {
        Contact::create([
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message
        ]);
        return redirect()->back()->with('success', __('Save Changes'));
    }

    public function recruit(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $recruit = Pages::where(['name'=>'entry'])->first();
        $month=date('m');
        $day = date('d');
        return view('page.recruit', compact('header','footer', 'recruit', 'month', 'day'));
    }

    public function recruit_save(Request $request)
    {
        $imageName = "";
        if($request->hasfile('attach')){
            $request->validate(['attach' => 'required|image|max:10240']);
            $image = $request->file('attach');
            $ext = $image->getClientOriginalExtension();
            $imageName = rand('1111','9999').time().'.'.$ext;
            Storage::disk('public')->put('images/'.$imageName, file_get_contents($image), 'public');
        }

        $interview = Interview::updateOrCreate([
            'mail' => $request->mail,
        ],[
            'name' => $request->name,
            'tel'  => $request->tel,
            'line_id' => $request->lineid,
            'age' => $request->age,
            'height' => $request->height,
            'weight' => $request->weight,
            'bust' => $request->bust,
            'tattoo' => $request->tatto,
            'photo' => $imageName,
            'interview_date'=> date('Y').'-'.$request->interview_month.'-'.$request->interview_date.' '.$request->interview_hour.':'.$request->interview_minute,
            'inquiry' => $request->require,
            'other_message' => $request->inquiry,
            'appealing_points' => '',
        ]);

        dispatch(new RecruitmentToApplicantJob(['interview'=>$interview]));
        dispatch(new RecruitmentToStoreJob(['interview'=>$interview]));

        return redirect()->back()->with('success', __('Save Changes'));

    }

    public function reservation(Request $request)
    {
        $header = Pages::where(['name'=>'header'])->first();
        $footer = Pages::where(['name'=>'footer'])->first();
        $month=date('m');
        $day = date('d');
        $prices = Price::join('categories','categories.id','=','prices.category_id')->selectRaw('*, prices.id')->get();
        $companions = Companion::where('status', 1)->get();
        return view('page.reservation', compact('header','footer', 'month', 'day', 'prices', 'companions'));
    }

    public function reservation_save(Request $request)
    {
        $request->validate([
            'reserve_name' => 'required',
            'reserve_mail' => 'required',
            'reserve_tel' => 'required',
            'reserve_lady1' => 'required','reserve_lady2' => 'required','reserve_lady3' => 'required',
            'reserve_date1' => 'required','reserve_date2' => 'required','reserve_date3' => 'required',
        ]);

        WebReservation::create([
            'user_id' => Auth::id(),
            'name' => $request->reserve_name,
            'mail' => $request->reserve_mail,
            'tel' => $request->reserve_tel,
            'lineid' => $request->reserve_lineid,
            'lady1' => $request->reserve_lady1,'lady2' => $request->reserve_lady2,'lady3' => $request->reserve_lady3,
            'date1' => $request->reserve_date1,'date2' => $request->reserve_date2,'date3' => $request->reserve_date3,
            'cource' => $request->reserve_cource,
            'place' => $request->reserve_place,
            'pay' => $request->reserve_pay,
            'contact' => $request->reserve_contact,
            'cmnt' => $request->reserve_cmnt
        ]);

        return redirect()->back()->with('success', __('Save Changes'));
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
            $all_records[$category->name] = Companion::with(['category','home_image'])->where([ 'category_id'=>$category->id ])->where(['status' => 1])->orderBy('position')->take(6)->get();
        }

        return view('page.ranking', compact('header','footer','ranking','all_records'));
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

        $interview = Interview::updateOrCreate([
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
            'tattoo' => $request->rec_biko,
            'interview_date'=> date('Y').'-'.$request->rec_interview1_m.'-'.$request->rec_interview1_d.' '.$request->rec_interview1_h.':'.$request->rec_interview1_min,
            'experience' => $request->tattoo,
            'appealing_points' => '',
            'other_message' => $request->rec_cmnt,
            'photo' => $imageName,
            'compatible' => 0,
            'status' => 1
        ]);

       dispatch(new RecruitmentToApplicantJob(['interview'=>$interview]));
       dispatch(new RecruitmentToStoreJob(['interview'=>$interview]));


        return redirect()->back()->with('success', __('Save Changes'));


    }

    public function terms(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.web.reservation'));
        }
        return view('user.terms');
    }

}
