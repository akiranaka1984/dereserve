<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\BlogPost;
use App\Models\TelegramCred;

class BlogPostController extends Controller
{
    public function index(Request $request)
    {   
        $telegramCred = TelegramCred::where(['id'=>1])->first();
        return view('admin.blog_post.list', compact('telegramCred'));
    }

    public function create(Request $request)
    {
        $mid = $request->id;
        $blogPost = null;
        if(!empty($request->id)){
            $blogPost = BlogPost::where(['template_name' => $request->id])->first();
        }
        return view('admin.blog_post.create', compact('blogPost', 'mid'));
    }

    public function save(Request $request)
    {  
        $request->validate([ 
            'template_name' => 'required', 
            'sender_name' => 'required', 
            'sender_address' => 'required', 
            'subject' => 'required', 
            'content' => 'required'
        ]);

        BlogPost::updateOrCreate([
            'template_name' => $request->template_name
        ],[
            'sender_name' => $request->sender_name,
            'sender_address' => $request->sender_address,
            'subject' => $request->subject,
            'content' => $request->content
        ]);
        
        return redirect()->route('admin.blog_post.create',['id'=>$request->template_name])->with('success', __('Save Changes'));

    }

    public function telegram(Request $request)
    {
        TelegramCred::updateOrCreate([
            'id'=>1
        ],[
            'botname'=>$request->frm_name,
            'token'=>$request->frm_token
        ]);

        return redirect()->back()->with('success', __('Save Changes'));
    }
    

}
