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
        if ($_POST['auth_date'] && $_POST['hash']) {
            $data_check = $_POST['auth_date'] . $_POST['first_name'] . $_POST['id'] . $_POST['photo_url'] . $_POST['username'];
            $secret_key = hash('sha256', $token, true);
            $hash = hash_hmac('sha256', $data_check, $secret_key);
            if ($hash === $_POST['hash']) {
                $user_id = $_POST['id'];
                $phone_number = $_POST['phone'];
                
                echo '<pre>';
                print_r($phone_number);
                exit;

            }
        }


    }

}
