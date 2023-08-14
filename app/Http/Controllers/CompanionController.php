<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\Category;
use App\Models\Companion;
use App\Models\PhotoSizeSetting;
use App\Models\CompanionPhoto;
use Intervention\Image\ImageManagerStatic as Image;

class CompanionController extends Controller
{
    public function index(Request $request)
    { 
        $sql = Companion::with(['home_image', 'category']);
        if(!empty($request->q)){
            $search_q =  $request->q;
            
            $categories_ids = array();
            $categories = Category::where(['status'=>1])->get();
            foreach($categories as $category){
                if (strpos(strtolower($category->name), strtolower($search_q)) !== false || strpos(strtolower($search_q), strtolower($category->name)) !== false) {
                    $categories_ids[] = $category->id;
                }
            }

            if(!empty($categories_ids)){
                $sql->whereIn('category_id', $categories_ids);
            }else{
                $sql->where(function ($query) use ($search_q){
                    $query->where('name', 'like', '%'.$search_q.'%')
                        ->orWhere('kana', 'like', '%'.$search_q.'%')
                        ->orWhere('celebrities_who_look_alike', 'like', '%'.$search_q.'%');
                });
            }
            
            $companions = $sql->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
            return view('admin.companion.list', compact('companions', 'search_q'));
        }else{
            $search_q = '';
            $companions = $sql->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
            return view('admin.companion.list', compact('companions', 'search_q'));
        }
    }

    public function add(Request $request)
    {
        $categories = Category::where(['status'=>1])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
        return view('admin.companion.add', compact('categories'));
    }

    public function save(Request $request)
    {

        $request->validate([ 
            'category_id' => 'required', 
            'frm_name' => 'required', 
            'frm_kana' => 'required', 
            'frm_age' => 'required', 
            'frm_height' => 'required', 
            'frm_bust' => 'required',
            'frm_cup' => 'required',
            'frm_waist' => 'required',
            'frm_hip' => 'required',
            'frm_rookie' => 'required',
            'frm_hobby' => 'required',
            'frm_sale_point' => 'required',
            'frm_font_color' => 'required',
            'short_message' => 'required',
            'frm_entry_date' => 'required'
        ]);

        $count = Companion::max('position');
        $companion = Companion::create([
            'category_id' => $request->category_id, 
            'name' => $request->frm_name, 
            'kana' => $request->frm_kana, 
            'age' => $request->frm_age, 
            'height' => $request->frm_height, 
            'bust' => $request->frm_bust,
            'cup' => $request->frm_cup,
            'waist' => $request->frm_waist,
            'hip' => $request->frm_hip,
            'rookie' => $request->frm_rookie,
            'hobby' => $request->frm_hobby,
            'sale_point' => $request->frm_sale_point,
            'font_color' => $request->frm_font_color,
            'message' => $request->short_message,
            'entry_date' => $request->frm_entry_date,
            'option_non_japanese_chk' => (!empty($request->option_non_japanese_chk) ? 1 : 0),
            'option_3p_chk' => (!empty($request->option_3p_chk) ? 1 : 0),
            'option_av_chk' => (!empty($request->option_av_chk) ? 1 : 0),
            'option_newface_chk' => (!empty($request->option_newface_chk) ? 1 : 0),
            'position' => ($count + 1)
        ]);

        return redirect()->route('admin.companion.edit', [ 'id' => $companion->id, 'stab' => 1 ]);

    }

    public function edit(Request $request)
    {

        $stab = $request->stab;
        $categories = Category::where(['status'=>1])->orderBy('position', 'ASC')->orderBy('id', 'ASC')->get();
        $companion = Companion::with(['category'])->where([ 'id'=>$request->id ])->first();
        $photoSizeSettings = PhotoSizeSetting::with(['photo_category'])->where(['status'=>1])->get();
        $companionPhotos = CompanionPhoto::with(['photo_size_setting'])->where(['companion_id'=>$request->id, 'status'=>1])->get();
        return view('admin.companion.edit', compact('categories','companion', 'photoSizeSettings', 'companionPhotos','stab'));
    }

    public function update(Request $request)
    {
        $request->validate([ 
            'id' => 'required', 
            'category_id' => 'required', 
            'frm_name' => 'required', 
            'frm_kana' => 'required', 
            'frm_age' => 'required', 
            'frm_height' => 'required', 
            'frm_bust' => 'required',
            'frm_cup' => 'required',
            'frm_waist' => 'required',
            'frm_hip' => 'required',
            'frm_rookie' => 'required',
            'frm_hobby' => 'required',
            'frm_sale_point' => 'required',
            'frm_font_color' => 'required',
            'short_message' => 'required',
            'frm_entry_date' => 'required'
        ]);

        $companion = Companion::where([
            'id' => $request->id, 
        ])->update([
            'category_id' => $request->category_id, 
            'name' => $request->frm_name, 
            'kana' => $request->frm_kana, 
            'age' => $request->frm_age, 
            'height' => $request->frm_height, 
            'bust' => $request->frm_bust,
            'cup' => $request->frm_cup,
            'waist' => $request->frm_waist,
            'hip' => $request->frm_hip,
            'rookie' => $request->frm_rookie,
            'hobby' => $request->frm_hobby,
            'sale_point' => $request->frm_sale_point,
            'font_color' => $request->frm_font_color,
            'message' => $request->short_message,
            'entry_date' => $request->frm_entry_date,
            'option_non_japanese_chk' => (!empty($request->option_non_japanese_chk) ? 1 : 0),
            'option_3p_chk' => (!empty($request->option_3p_chk) ? 1 : 0),
            'option_av_chk' => (!empty($request->option_av_chk) ? 1 : 0),
            'option_newface_chk' => (!empty($request->option_newface_chk) ? 1 : 0)
        ]);   

        return redirect()->route('admin.companion.edit', [ 'id' => $request->id, 'stab' => 1 ]);

    }

    public function extra(Request $request)
    {
        $request->validate([ 
            'id' => 'required', 
            'frm_position' => 'required', 
            'frm_celebrities_who_look_alike' => 'required'
        ]);

        $companion = Companion::where([
            'id' => $request->id, 
        ])->update([
            'previous_position' => $request->frm_position, 
            'celebrities_who_look_alike' => $request->frm_celebrities_who_look_alike
        ]);   

        return redirect()->route('admin.companion.edit', [ 'id' => $request->id, 'stab' => 2 ]);

    }

    public function photo_save(Request $request)
    {

        $request->validate([ 
            'companion_id' => 'required', 
            'photo_setting_id' => 'required', 
            'frm_title' => 'required'
        ]);

        $folderPath = storage_path('app/public/photos/').$request->companion_id;
        if(!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0777, true);
        }
        $photoSizeSetting = PhotoSizeSetting::with(['photo_category'])->where(['id'=>$request->photo_setting_id])->first();
        
        if($request->hasfile('frm_photo')){ 
            $request->validate(['frm_photo' => 'required|image|max:10240']);
            $image = $request->file('frm_photo');
            $ext = $image->getClientOriginalExtension();
            $imageName = $photoSizeSetting->prefix.'_'.$request->companion_id.'.'.$ext;
            if(empty($photoSizeSetting->hpx) || empty($photoSizeSetting->vpx)){
                Storage::disk('public')->put('photos/'.$request->companion_id.'/'.$imageName, file_get_contents($image), 'public');
            }else{
                $img = Image::make($image->getRealPath());
                $img->resize($photoSizeSetting->hpx, $photoSizeSetting->vpx, function ($constraint) { $constraint->aspectRatio(); });
                $img->stream();
                Storage::disk('public')->put('photos/'.$request->companion_id.'/'.$imageName, $img, 'public');
            }

            CompanionPhoto::create([
                'companion_id' => $request->companion_id,
                'photo_setting_id' => $request->photo_setting_id,
                'title' =>  $request->frm_title,
                'photo' => $imageName,
                'status' => 1
            ]);
        }

        return redirect()->route('admin.companion.edit', [ 'id' => $request->companion_id, 'stab' => 3 ]);

    }

    public function position(Request $request)
    {
        Companion::where('id','>',0)->update(['position'=>0]);
        foreach($request->data as $key => $data){
            Companion::where(['id'=>$key])->update(['position'=>$data]);
        }

        return response()->json(['status' => 1, 'message' => 'success']);
    }

    public function status(Request $request)
    {
        Companion::where(['id' => $request->companion_id])->update(['status'=>$request->status]);
        return redirect()->route('admin.companion.list');
    }

}
