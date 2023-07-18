<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Companion;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $companionLists = Companion::select('id','name','age')->where(['status'=>1])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
        
        if(!empty($request->is_hidden) && $request->is_hidden == 1){
            $is_hidden = 1;
            $newsLists = News::orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
            return view('admin.news.list', compact('companionLists', 'newsLists', 'is_hidden'));
        }else{
            $is_hidden = 0;
            $newsLists = News::where(['status'=>1])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
            return view('admin.news.list', compact('companionLists', 'newsLists', 'is_hidden'));
        }
    }

    public function save(Request $request)
    {
        $count = News::max('position');
        News::create([
            'companion_id' => $request->companion_id,
            'title' => $request->frm_title,
            'text' => $request->frm_text,
            'position' => ($count + 1),
            'status' => 1
        ]);

        return redirect()->back()->with('success', __('Save Changes'));
    }

    public function delete(Request $request)
    {
        News::where(['id'=>$request->id])->update(['status'=>0]);
        return redirect()->back()->with('success', __('Save Changes'));
    }

    public function position(Request $request)
    {
        News::where('id','>',0)->where(['status'=>1])->update(['position'=>0]);
        foreach($request->data as $key => $data){
            News::where(['id'=>$key])->update(['position'=>$data]);
        }

        return response()->json(['status' => 1, 'message' => 'success']);
    }

}
