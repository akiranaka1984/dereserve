<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\BlogPost;


class BlogPostController extends Controller
{
    public function index(Request $request)
    {   

        $status_q = 0;
        $search_q = '';
        if(!empty($request->q)){
            $search_q = $request->q;
            $api = BlogPost::where(function ($query) use ($search_q){
                $query->where('title', 'like', '%'.$search_q.'%')
                    ->orWhere('details', 'like', '%'.$search_q.'%')
                    ->orWhere('category', 'like', '%'.$search_q.'%')
                    ->orWhere(function ($query) use ($request) {
                        $search_q_date = "";
                        if (preg_match('/((19|20)[0-9]{2})[-\/]([1-9]|0[1-9]|1[012])[-\/]([1-9]|0[1-9]|[12][0-9]|3[01])/', $search_q)) {
                            $search_q_date = date('Y-m-d', strtotime( str_replace('/','-', $search_q) ));
                        }else if (preg_match('/((19|20)[0-9]{2})[-\/]([1-9]|0[1-9]|1[012])/', $search_q)) {
                            $search_q_date = date('Y-m', strtotime(str_replace('/','-', $search_q)));
                        }else if (preg_match('/(19|20)[0-9]{2}/', $search_q)) {
                            $search_q_date = date('Y', strtotime(str_replace('/','-', $search_q)));
                        }
        
                        if($search_q_date != ""){
                            $query->where('publish_date','LIKE', '%'.$search_q_date.'%');
                        }
                    });
            });
              
            if($request->status != 0){
                $status_q = $request->status;
                $api->where(['status'=>$request->status]);
            }

            $blog_posts = $api->orderBy('id', 'DESC')->paginate(15)->appends(request()->query());
            return view('admin.blog_post.list', compact('blog_posts', 'search_q'. 'status_q'));
        }else{
            if($request->status != 0){
                $status_q = $request->status;
                $blog_posts = BlogPost::where(['status'=>$request->status])->orderBy('id', 'DESC')->paginate(15)->appends(request()->query());
                return view('admin.blog_post.list', compact('blog_posts', 'search_q', 'status_q'));
            }else{
                $blog_posts = BlogPost::orderBy('id', 'DESC')->paginate(15)->appends(request()->query());
                return view('admin.blog_post.list', compact('blog_posts', 'search_q', 'status_q'));
            }
        }
        
    }

    public function create(Request $request)
    {
        return view('admin.blog_post.create');
    }

    public function save(Request $request)
    {  

        $request->validate([ 
            'post_title' => 'required', 
            'post_content' => 'required', 
            'categories' => 'required', 
            'post_date' => 'required', 
            'post_status' => 'required',
            'post_image' => 'required|image|max:10240'
        ]);

        if($request->hasfile('post_image')){ 
            
            $image = $request->file('post_image');
            $ext = $image->getClientOriginalExtension();
            $imageName = rand('1111','9999').time().'.'.$ext;
            Storage::disk('public')->put('photos/banners/'.$imageName, file_get_contents($image), 'public');

            BlogPost::create([
                'title' => $request->post_title,
                'details' => $request->post_content,
                'image' => $imageName,
                'category' => json_encode($request->categories),
                'publish_date' => $request->post_date,
                'status' => $request->post_status
            ]);

            return redirect()->route('admin.blog_post.list')->with('success', __('Save Changes'));
        }else{
            return redirect()->back()->with('error', __('Something went to wrong.'));
        }
    }

    public function edit(Request $request)
    {
        $blog_post = BlogPost::where(['id'=>$request->id])->first();
        return view('admin.blog_post.edit', compact('blog_post'));
    }

    public function update(Request $request)
    { 
        $request->validate([ 
            'post_title' => 'required', 
            'post_content' => 'required', 
            'categories' => 'required', 
            'post_date' => 'required', 
            'post_status' => 'required',
        ]);

        if($request->hasfile('post_image')){ 
            $request->validate(['post_image' => 'required|image|max:10240']);
            $image = $request->file('post_image');
            $ext = $image->getClientOriginalExtension();
            $imageName = rand('1111','9999').time().'.'.$ext;
            Storage::disk('public')->put('photos/banners/'.$imageName, file_get_contents($image), 'public');

            BlogPost::where(['id'=>$request->post_id])->update([
                'title' => $request->post_title,
                'details' => $request->post_content,
                'image' => $imageName,
                'category' => json_encode($request->categories),
                'publish_date' => $request->post_date,
                'status' => $request->post_status
            ]);

            return redirect()->route('admin.blog_post.list')->with('success', __('Save Changes'));

        }else{
            BlogPost::where(['id'=>$request->post_id])->update([
                'title' => $request->post_title,
                'details' => $request->post_content,
                'category' => json_encode($request->categories),
                'publish_date' => $request->post_date,
                'status' => $request->post_status
            ]);

            return redirect()->route('admin.blog_post.list')->with('success', __('Save Changes'));
        }

    }

    public function delete(Request $request)
    { 
        BlogPost::where(['id'=>$request->id])->delete();
        return redirect()->route('admin.blog_post.list')->with('success', __('Save Changes'));
    }

}
