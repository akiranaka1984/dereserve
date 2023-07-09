<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    
    public function index(Request $request)
    {
        return view('admin.reception.list');
    }

    public function interview(Request $request)
    {
        return view('admin.interview.list');
    }

}
