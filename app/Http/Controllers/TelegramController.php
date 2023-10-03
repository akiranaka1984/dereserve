<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\Telegram;

class TelegramController extends Controller
{
    public function index(Request $request)
    {
        $template_data = Telegram::all();
        return view('admin.telegram.list',compact('template_data'));
    }

    public function create(Request $request)
    {
        return view('admin.telegram.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
        ]);

        Telegram::create([
            'template_name' => $request->post_title,
            'content' => $request->post_content
        ]);
        
        return redirect()->route('admin.telegram.list')->with('success', __('Save Changes'));
    }

    public function edit(Request $request)
    {
        $data = Telegram::where([ 'id'=>$request->id ])->first();
        return view('admin.telegram.edit',compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'post_title' => 'required',
            'post_content' => 'required',
        ]);

        Telegram::where([ 'id'=>$request->id ])->update([
            'template_name' => $request->post_title,
            'content' => $request->post_content
        ]);

        return redirect()->route('admin.telegram.list')->with('success', __('Save Changes'));
  
    }

    public function delete(Request $request)
    {
        Telegram::where(['id'=>$request->id])->delete();
        return redirect()->back()->with('success', __('Save Changes'));
    }

    public function sent(Request $request)
    {

    }

}
