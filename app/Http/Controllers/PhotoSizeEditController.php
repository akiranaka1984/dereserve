<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoSizeEditController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.photo_size.edit');
    }
}
