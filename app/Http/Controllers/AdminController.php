<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;

class AdminController extends Controller
{   
    public function index(Request $request)
    {}

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    

}   
