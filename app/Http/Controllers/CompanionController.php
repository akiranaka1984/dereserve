<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;

use App\Models\Category;
use App\Models\Companion;
use App\Models\PhotoSizeSetting;
use App\Models\CompanionPhoto;
use Intervention\Image\ImageManagerStatic as Image;
use PhpOffice\PhpSpreadsheet\IOFactory;
use ZipArchive;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Str;


class CompanionController extends Controller
{
    public function index(Request $request)
    {
        $sql = Companion::with(['home_image', 'category'])->where('status', '!=', 3);
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
            'rookie' => implode(', ', $request->frm_rookie),
            'hobby' => $request->frm_hobby,
            'sale_point' => $request->frm_sale_point,
            'font_color' => $request->frm_font_color,
            'message' => $request->short_message,
            'entry_date' => $request->frm_entry_date,
            'position' => ($count + 1),
            'previous_position' => $request->frm_position,
            'celebrities_who_look_alike' => $request->frm_celebrities_who_look_alike
        ]);

        if($request->hasFile('frm_photo')){
            $photoSizeSetting = PhotoSizeSetting::with(['photo_category'])->where(['id'=>1])->first();
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

            CompanionPhoto::updateOrInsert([
                'companion_id' => $companion->id,
                'photo_setting_id' => 1
            ],[
                'title' =>  $request->frm_title,
                'photo' => $imageName.'?v='.time(),
                'status' => 1
            ]);
        }

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
            'rookie' => implode(', ', $request->frm_rookie),
            'hobby' => $request->frm_hobby,
            'sale_point' => $request->frm_sale_point,
            'font_color' => $request->frm_font_color,
            'message' => $request->short_message,
            'entry_date' => $request->frm_entry_date,
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

            CompanionPhoto::updateOrInsert([
                'companion_id' => $request->companion_id,
                'photo_setting_id' => $request->photo_setting_id
            ],[
                'title' =>  $request->frm_title,
                'photo' => $imageName.'?v='.time(),
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

    public function bulk_add(Request $request)
    {
        //zipファイルの有無をチェック,$requestにzipという名前のファイルが含まれているかどうか
        if($request->hasfile('zip')){
            // upload zip and extract it
            // アップロードされたZIPファイルの実際のパス(サーバー上の一時的な保存場所)を取得する。
            $zipPath = $request->file("zip")->getRealPath();
            //ZIPファイルの展開先となるディレクトリのパスを指定する。
            //storage_path関数は、storageディレクトリに対する絶対パスを生成する。
            $filePath = storage_path('/app/public/bulk/');
            //このファイルパスにディレクトリが存在するかを確認
            if (!file_exists($filePath)) {
                mkdir($filePath, 0775, true); // ディレクトリが存在しない場合、作成する。0775のパーミッションも設定
            }
            //Laravelのファイルシステムクラスのインスタンスを作成
            $dir = new Filesystem;
            //指定された、ディレクトリ内のファイルとサブディレクトリを全て削除する。
            $dir->cleanDirectory($filePath);
            //PHPのZipArchiveクラスのインスタンスを作成する。
            $zip = new ZipArchive();
            //$zip->open($zipPath)でZIPファイルを開く。成功すればtrueを戻す。
            if ($zip->open($zipPath) === true) {
                //成功した場合、forループを使ってZipファイル内の各ファイルの処理を行う。
                for($i = 0; $i < $zip->numFiles; $i++) {
                    $filename = $zip->getNameIndex($i);//ZIPファイル内のi番目のファイル名を取得する
                    $fileinfo = pathinfo($filename);//ファイル名からパス情報(ディレクトリ名、ベース名、拡張子など)を取得する。
                    copy("zip://".$zipPath."#".$filename, $filePath.$fileinfo['basename']);//Zipファイル内のファイルを指定したディレクトリにコピーする。
                }
                $zip->close();//zipファイルを閉じる。
            }


            // start read excel
            // 引数に指定したディレクトリ($filePath)内から、Excelファイルのパスを検索するカスタム関数
            $excelPath = $this->find_excel_from_folder($filePath);
            //PhpSpreadsheetのIOFactory::loadメソッドを使用して、見つかったExcelファイルを読み込み、Spreadsheetオブジェクトを生成している。
            $spreadsheet = IOFactory::load($excelPath);
            // Select the first worksheet (index 0)
            // 読み込んだスプレッドシートの最初のワークシート(インデックスは0から始まる)を選択している。
            $worksheet = $spreadsheet->getSheet(0);

            // Get the highest row and column indices
            // 行と列のインデックスを取得
            // ワークシートの最も高い行番号と列のインデックスを取得して、どこまでの範囲にデータが存在するかを把握します。
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();

            //対象とする列のリストを定義。ここではA列からAU列までを指定。
            $columns = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU'];

            $finalData =array();
            //各行と列のセルから値を読み取る。外側のforループは各行を走査して、内側のループは定義した列リストに従って各列の値を読み取る。
            for ($row = 1; $row <= $highestRow; $row++) {
                $cindex=0;
                while(!empty($columns[$cindex])){
                    $col = $columns[$cindex];
                    //特定の行$rowと$colにあるセルの値を取得している。
                    $cellValue = $worksheet->getCell($col . $row)->getValue();
                    //最終的に読み取った値は$finalData[$row][$col]を使って、二次元配列として保存される。
                    $finalData[$row][$col] = $cellValue;
                    $cindex++;
                }
            }
            //$finalData配列に格納されたExcelデータを使って、データベースに新しいレコードを作成する一連のプロセスを実行している。
            //foreachループを使って、$finalData配列を一行ずつ処理をしている。
            //各行は$valueに格納され、$keyに行番号が格納される。

            foreach ($finalData as $key => $value) {
                // 必要なデータの取得
                $name = $value['A']; // A列のデータ
                $kana = $value['B']; // B列のデータ
                //列Rの値が「◯」の場合に、新規フラグ($new_face)を1に、そうでなければ0に設定している。
                $new_face = ($value['R'] == '〇') ? 1 : 0;
                $category_id = !empty($value['AJ']) ? $value['AJ'] : null; // AJ列が空でなければその値を使用、空ならnullを設定
                $position = $key + 1;
                $birthday = !empty($value['G']) ? date('Y-m-d', strtotime($value['G'])) : "";
                //列Hの値がリテラル文字列「age」または、「年齢」でない場合にのみ、後続の処理を実行する。1行目と2行目がデータではないため、ヘッダー行を除外する。
                if((strtolower($value['H']) != 'age') && (strtolower($value['H']) != '年齢')){
                    //各行の「A」列の項目が空でなければ以下の処理を実行
                    if(!empty($value['A'])){
                        // ここから新しいコードを挿入

                        // I列の値がExcelの日付形式であることを前提に、DateTimeオブジェクトに変換し、
                        // 必要なフォーマットで$entry_dateに格納します。
                        if (!empty($value['I'])) {
                            try {
                                $dateValue = Date::excelToDateTimeObject($value['I']);
                                $entry_date = $dateValue->format('Y-m-d');
                            } catch (\Exception $e) {
                                // 日付変換に失敗した場合、$entry_dateをnullに設定またはログに記録
                                $entry_date = null;
                                // Log::warning('Date conversion failed for value: '.$value['I']);
                            }
                        } else {
                            $entry_date = null;
                        }
                        // ここまで新しいコード
                        // 各行ごとに$rookieValuesをリセット
                        $rookieValues = []; // この行を追加
                        foreach (['AK', 'AL', 'AM', 'AN'] as $column) {
                            if (!empty($value[$column])) {
                                $rookieValues[] = $value[$column];
                            }
                        }
                        $rookie = implode(',', $rookieValues);
            
                        // ③ T列の値をsale_pointに格納
                        $sale_point = $value['S'] ?? null;
                        // ここまで新しいコード
                        //Companionモデルを使用して新しいレコードをデータベースに作成している。
                       /*  $companion = Companion::create([
                            'name' => $value['A'],
                            'kana' => $value['B'],
                            'age' => $value['H'],
                            'height' => $value['J'],
                            'bust' => $value['K'],
                            'cup' => $value['L'],
                            'waist' => $value['M'],
                            'category_id' => $category_id, // ここでAJ列の値をcategory_idに割り当て
                            'hip' => $value['N'],
                            'hobby' => $value['O'],
                            'message' => $value['T'], // ③の要件を既に満たしています
                            'option_newface_chk' => $new_face,
                            'position' => $position,
                            'nickname1' => $value['E'],
                            'nickname2' => $value['F'],
                            'birthday' => $birthday,
                            'hiragana' => $value['C'],
                            'surnames' => $value['D'],
                            'styles' => $value['P'],
                            'type' => $value['Q'],
                            'rookie' => $rookie, 
                            'entry_date' => $entry_date, 
                            'sale_point' => $sale_point, 
                        ]); */

                        // ユニークな識別子であるnameフィールドを基にレコードを探す
                        $companion = Companion::where('name', $value['A'])->first();

                        $attributes = [
                            'name' => $value['A'],
                            'kana' => $value['B'],
                            'age' => $value['H'],
                            'height' => $value['J'],
                            'bust' => $value['K'],
                            'cup' => $value['L'],
                            'waist' => $value['M'],
                            'category_id' => $category_id, // AJ列のデータをcategory_idに設定
                            'hip' => $value['N'],
                            'hobby' => $value['O'],
                            'message' => $value['T'], // T列のデータ
                            'option_newface_chk' => $new_face,
                            'position' => $position,
                            'nickname1' => $value['E'],
                            'nickname2' => $value['F'],
                            'birthday' => $birthday,
                            'hiragana' => $value['C'],
                            'surnames' => $value['D'],
                            'styles' => $value['P'],
                            'type' => $value['Q'],
                            'rookie' => $rookie,
                            'entry_date' => $entry_date,
                            'sale_point' => $sale_point,
                        ];

                        if ($companion) {
                            // 既存のレコードが見つかった場合、ファイルが関連している場合は古いファイルを削除
                            if ($companion->photo && Storage::exists('public/photos/' . $companion->photo)) {
                                Storage::delete('public/photos/' . $companion->photo);
                            }
                            // レコードを更新
                            $companion->update($attributes);
                        } else {
                            // 新しいレコードを作成
                            $companion = Companion::create($attributes);
                        }
                        if(!empty($value['Z']) && File::exists($filePath.$value['Z'])){
                            //Z列に記載してあるファイル名を$image1に格納する。
                            $image1 = $value['Z'];
                            //データベースから特定の画像サイズ設定を取得する。idが1の設定を取得する。
                            $photoSizeSetting = PhotoSizeSetting::with(['photo_category'])->where(['id'=>1])->first();
                            //画像ファイルの内容を取得する。
                            $image = File::get($filePath.$image1);
                            $ext = pathinfo($filePath.$image1, PATHINFO_EXTENSION);//拡張子を取得
                            //保存する新しい画像のファイル名を生成する。moto_id.jpgになる。
                            $imageName = $photoSizeSetting->prefix.'_'.$companion->id.'.'.$ext;
                            //画像サイズ設定に基づいて、画像リサイズするか決定。
                            if(empty($photoSizeSetting->hpx) || empty($photoSizeSetting->vpx)){
                                //リサイズした画像もしくはオリジナル画像を公開ディスクに保存する。
                                Storage::disk('public')->put('photos/'.$companion->id.'/'.$imageName, $image, 'public');
                            }else{
                                $img = Image::make($filePath.$image1);
                                $img->resize($photoSizeSetting->hpx, $photoSizeSetting->vpx, function ($constraint) { $constraint->aspectRatio(); });
                                $img->stream();
                                Storage::disk('public')->put('photos/'.$companion->id.'/'.$imageName, $img, 'public');
                            }
                            //CompanionPhotoテーブルに画像に関するデータを更新する。
                            CompanionPhoto::updateOrInsert([
                                'companion_id' => $companion->id,
                                'photo_setting_id' => 1
                            ],[
                                'title' =>  $request->frm_title,
                                'photo' => $imageName.'?v='.time(),
                                'status' => 1
                            ]);
                        }

                        if (!empty($value['AO'])) {
                            $dates = array();
                            $currentDate = strtotime($value['AO']);
                            empty($value['AP']) ? $endDate = strtotime($value['AO']) : $endDate = strtotime($value['AP']);

                            while ($currentDate <= $endDate) {
                                $dates[] = date('Y-m-d', $currentDate);
                                $currentDate = strtotime('+1 day', $currentDate);
                            }

                            foreach ($dates as $i => $val) {
                                Attendance::create([
                                    'companion_id' => $companion->id,
                                    'date' => $val,
                                    'start_time' => $value['AQ'],
                                    'end_time' => $value['AR'],
                                    'undetermined_hours' => $value['AS'],
                                    'hidden_hours' => $value['AT'],
                                    'without_end_time_display' => $value['AU']
                                ]);
                            }
                        }
                    }
                }
            }
        }
        return redirect()->back()->with('success', '成功!');
    }

    public function find_excel_from_folder($directoryPath){
        if (File::isDirectory($directoryPath)) {
            $files = File::files($directoryPath);
            foreach ($files as $file) {
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                if ($extension === 'xlsx' || $extension === 'xls') {
                    return $file->getRealPath();
                }
            }
        } else {
            return null;
        }
    }


}
