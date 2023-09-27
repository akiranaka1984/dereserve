<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pages;
use App\Models\Companion;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Price;

use Session;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('user.register');
    }

    public function save(Request $request)
    {
        $token = "6432932571:AAEiMdF3P7zigjt9rdHw2_KWLRNgDeUyXB8";

        echo '<pre>';
        print_r($request->all());
        exit;

    }

}
