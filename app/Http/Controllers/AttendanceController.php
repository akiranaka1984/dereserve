<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Companion;
use App\Models\Attendance;


class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $companionLists = Companion::select('id','name','age')->where(['status'=>1])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
        return view('admin.attendance.list', compact('companionLists'));
    }
    
    public function api(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $attendance = Attendance::selectRaw('date, count(id) AS count')
        ->where('date','>=',$startDate)
        ->where('date','<=',$endDate)
        ->groupBy('date')
        ->get();

        return response()->json($attendance);
    }

    public function details(Request $request)
    {
        $attendance = Attendance::with(['companion'])
        ->where('date','=',$request->selectedDate)
        ->orderBy('position', 'ASC')
        ->orderBy('id', 'ASC')
        ->get();
        
        return response()->json($attendance);
    }

    public function save(Request $request)
    {

        $undetermined_hours = !empty($request->undetermined_hours) ? 1 : 0;
        $hidden_hours = !empty($request->hidden_hours) ? 1 : 0;
        $without_end_time_display = !empty($request->without_end_time_display) ? 1 : 0;

        $count = Attendance::max('position');
        Attendance::updateOrInsert([
            'companion_id' => $request->companion_id,
            'date' => $request->selected_date,
        ],[
            'start_time' => $request->start_time,
            'end_time'  => $request->end_time,
            'undetermined_hours' => $undetermined_hours,
            'hidden_hours' => $hidden_hours,
            'without_end_time_display' => $without_end_time_display,
            'message' =>  $request->message,
            'position' => ($count + 1)
        ]);

        return redirect()->back()->with('success', __('Save Changes'));

    }

    public function delete(Request $request)
    {
        Attendance::where(['id' => $request->id])->delete();
        return response()->json(['status'=>1,'message'=>__('Save Changes')]);
    }
    
    public function position(Request $request)
    {
        Attendance::where('date','=', $request->date)->update(['position'=>0]);
        foreach($request->data as $key => $data){
            Attendance::where(['id'=>$key])->update(['position'=>$data]);
        }

        return response()->json(['status' => 1, 'message' => 'success']);
    }

    public function bulk(Request $request)
    {

        $jadays = array('日','月','火','水','木','金','土');

        $xdates['today'] = date('Y-m-d');
        $xdates['next1'] = date('Y-m-d', strtotime($xdates['today']. ' + 1 days'));
        $xdates['next2'] = date('Y-m-d', strtotime($xdates['today']. ' + 2 days'));
        $xdates['next3'] = date('Y-m-d', strtotime($xdates['today']. ' + 3 days'));
        $xdates['next4'] = date('Y-m-d', strtotime($xdates['today']. ' + 4 days'));
        $xdates['next5'] = date('Y-m-d', strtotime($xdates['today']. ' + 5 days'));
        $xdates['next6'] = date('Y-m-d', strtotime($xdates['today']. ' + 6 days'));
        $xdates['next7'] = date('Y-m-d', strtotime($xdates['today']. ' + 7 days'));


        $jadates['today'] = date('m/d').'('.$jadays[date('N')-1].')';
        $jadates['next1'] = date('m/d', strtotime($xdates['next1'])).'('.$jadays[date('N', strtotime($xdates['next1']))-1].')';
        $jadates['next2'] = date('m/d', strtotime($xdates['next2'])).'('.$jadays[date('N', strtotime($xdates['next2']))-1].')';
        $jadates['next3'] = date('m/d', strtotime($xdates['next3'])).'('.$jadays[date('N', strtotime($xdates['next3']))-1].')';
        $jadates['next4'] = date('m/d', strtotime($xdates['next4'])).'('.$jadays[date('N', strtotime($xdates['next4']))-1].')';
        $jadates['next5'] = date('m/d', strtotime($xdates['next5'])).'('.$jadays[date('N', strtotime($xdates['next5']))-1].')';
        $jadates['next6'] = date('m/d', strtotime($xdates['next6'])).'('.$jadays[date('N', strtotime($xdates['next6']))-1].')';
        $jadates['next7'] = date('m/d', strtotime($xdates['next7'])).'('.$jadays[date('N', strtotime($xdates['next7']))-1].')';

        $companions = Companion::with(['home_image','attendances'])->where(['status'=>1])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->paginate(5)->appends(request()->query());

        return view('admin.attendance.bulk', compact('xdates','jadates','companions'));
    }


    public function bulk_save(Request $request)
    {

        $undetermined_hours = ($request->undetermined_hours == true) ? 1 : 0;
        $hidden_hours = ($request->hidden_hours == true) ? 1 : 0;
        $without_end_time_display = ($request->without_end_time_display == true) ? 1 : 0;

        Attendance::updateOrInsert([
            'companion_id' => $request->companion,
            'date' => $request->date,
        ],[
            'start_time' => $request->start_date,
            'end_time'  => $request->end_date,
            'undetermined_hours' => $undetermined_hours,
            'hidden_hours' => $hidden_hours,
            'without_end_time_display' => $without_end_time_display
        ]);

        $attendance = Attendance::where(['companion_id' => $request->companion,'date' => $request->date])->first();
        if($attendance->position == 0){
            $attendance->position = ((Attendance::where(['date' => $request->date])->max('position'))+1);
            $attendance->save();
        }
        
        return response()->json(['status' => 1, 'message' => __('Save Changes')]);
    }

}
