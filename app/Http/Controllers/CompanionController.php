<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanionController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.companion.list');
    }

    public function add(Request $request)
    {
        return view('admin.companion.add');
    }

    public function edit(Request $request)
    {
        return view('admin.companion.edit');
    }

}
