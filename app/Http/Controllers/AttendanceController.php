<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.attendance.list');
    }

    public function bulk(Request $request)
    {
        return view('admin.attendance.bulk');
    }


}
