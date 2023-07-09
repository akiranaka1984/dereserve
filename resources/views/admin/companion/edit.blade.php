@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"></path></svg>
        コンパニオン編集</h2> <br />
    
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs bordered">
                <li class="active"> 
                    <a href="#tab1-companion_basic_information" data-toggle="tab">
                        <span class="visible-xs"><i class="entypo-home"></i></span> <span class="hidden-xs">コンパニオン基本情報</span> 
                    </a> 
                </li>
                <li> 
                    <a href="#tab1-additional_setting_items" data-toggle="tab"> 
                        <span class="visible-xs"><i class="entypo-user"></i></span> <span class="hidden-xs">追加設定項目</span> 
                    </a>
                </li>
                <li> 
                    <a href="#tab1-photo_management" data-toggle="tab"> 
                        <span class="visible-xs"><i class="entypo-mail"></i></span> <span class="hidden-xs">写真管理</span> 
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1-companion_basic_information">

                    <a href="{{ route('admin.companion.list') }}" class="btn btn-blue mt-3">コンパニオン一覧に戻る</a>

                    <div class="tile-stats tile-primary frm-head mt-1"> コンパニオン情報入力</div>

                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-9">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-body">
                                    <form  role="form" class="form-horizontal form-groups-bordered">
                                        <div class="form-group"> 
                                            <label class="col-sm-3 control-label">ヘルスコース</label>
                                            <div class="col-sm-5"> 
                                                <select class="form-control">
                                                    <option>PLATINUM</option>
                                                    <option>BLAK</option>
                                                    <option>DIAMOND</option>
                                                    <option>RED DIAMOND</option>
                                                </select>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-success btn-icon-align">
                                                    <svg class="bi bi-pencil"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                                                    <span class="title ml-1">カテゴリー編集</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group"> <label for="field-2" class="col-sm-3 control-label">名前<span class="text-danger">※必須</span></label>
                                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-2" placeholder="表示名全体を漢字で入力してください"> </div>
                                        </div>
                                        <div class="form-group"> <label for="field-3" class="col-sm-3 control-label">かな</label>
                                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-3" placeholder="ローマ字、 ひらがな等全体を統一してください"> </div>
                                        </div>
                                        <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">年齢<span class="text-danger">半角数字</span></label>
                                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-age" placeholder="年齢">歲</div>
                                        </div>
                                        <div class="form-group"> <label for="field-ta" class="col-sm-3 control-label">身長<span class="text-danger">半角数字</span></label>
                                            <div class="col-sm-8"><input type="text" class="form-control" id="field-age" placeholder="身長">cm</div>
                                        </div>
                                        <div class="form-group"> <label for="field-ta" class="col-sm-3 control-label">バスト<span class="text-danger">半角数字</span></label>
                                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-age" placeholder="バスト">cm</div>
                                        </div>
                                        <div class="form-group"> <label for="field-4" class="col-sm-3 control-label">カップ<span class="text-danger">半角数字</span></label>
                                            <div class="col-sm-8"> 
                                                <select class="form-control">
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>C</option>
                                                    <option>D</option>
                                                    <option>E</option>
                                                    <option>F</option>
                                                    <option>G</option>
                                                    <option>H</option>
                                                    <option>I</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group"> <label for="field-5" class="col-sm-3 control-label">ウエス<span class="text-danger">ト半角数字</span></label>
                                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-age" placeholder="ウエスト">cm</div>
                                        </div>
                                        <div class="form-group"> <label for="field-6" class="col-sm-3 control-label">ヒップ<span class="text-danger">半角数字</span></label>
                                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-age" placeholder="ヒップ">cm</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">新人属性</label>
                                            <div class="col-sm-8">
                                                <div class="radio-inline"> <label> <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>新人
                                                    </label> </div>
                                                <div class="radio-inline"> <label> <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">経験者
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">趣味</label>
                                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-1" placeholder="趣味を簡潔に記入してください"> </div>
                                        </div>
                                        <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">セールスポイント</label>
                                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-1" placeholder="セールスポイント/10文字目安">
                                                <label class="col-sm-5 control-label">フォントカラー選択 :</label>
                                                <div class="col-sm-6">
                                                    <div class="radio-inline"> <label> <input type="radio" name="optionsRadio" id="optionsRadios1" value="option1" checked>黒</label> </div>
                                                    <div class="radio-inline"> <label> <input type="radio" name="optionsRadio" id="optionsRadios2" value="option2">デフォルト</label></div>
                                                    <div class="radio-inline"> <label> <input type="radio" name="optionsRadio" id="optionsRadios2" value="option3">青</label></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">店舖 メッセージ</label>
                                            <div class="col-sm-8"> 
                                                <div class="row">
                                                    <label class="col-sm-8 control-label" style="color:hotpink; text-align:left;">女性紹介のメッセージを記入してください</label>
                                                </div>
                                                <div class="row mt-1">
                                                <textarea  name="content" class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">入店目<span class="text-danger">※必須</span></label>
                                            <div class="col-sm-8"> 
                                                <div class="input-group"> <input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" placeholder="入店日　カレンダーから選択">
                                                    <div class="input-group-addon"> 
                                                        <a href="#"><i class="entypo-calendar"></i></a> 
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="col-md-5 mt-3">
                                            <button type="button" class="btn btn-orange btn-icon-align">
                                                <svg class="bi bi-plus-circle-fill"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
                                                <span class="title ml-1">コンパニオン登録</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane" id="tab1-additional_setting_items">
                    
                    <a href="{{ route('admin.companion.list') }}" class="btn btn-blue mt-3">コンパニオン一覧に戻る</a>
                    <div class="tile-stats tile-primary frm-head mt-1"> 追加設定項目</div>

                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-body">
                                    <form role="form" class="form-horizontal form-groups-bordered">
                                        <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">前(現)職   </label>
                                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-1" placeholder=""> </div>
                                        </div>
                                        <div class="form-group"> <label for="field-2" class="col-sm-3 control-label">似ている芸能人</label>
                                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-2" placeholder="似ている芸能人"> </div>
                                        </div>

                                        <div class="col-md-5 mt-3">
                                            <button type="button" class="btn btn-orange btn-icon-align">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="m14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83a.996.996 0 0 0 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg>
                                                <span class="title ml-1">コンパニオン追加項目更新</span>
                                            </button>
                                        </div>  
                                    </form>      
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="tab1-photo_management">
                    
                    <a href="{{ route('admin.companion.list') }}" class="btn btn-blue mt-3">コンパニオン一覧に戻る</a>
                    <div class="tile-stats tile-primary frm-head mt-1"> 写真管理</div>

                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-body">
                                    <form role="form" class="form-horizontal form-groups-bordered">
                                        <div class="form-group"> <label class="col-sm-3 control-label">フォト設定名</label>
                                            <div class="col-sm-8">
                                                <select class="form-control">
                                                    <option>メイン画像(在籍写真１枚目)(メイン/サイズ指定なし)</option>
                                                    <option>在籍写真１枚目(ギャラリー/サイズ指定なし)</option>
                                                    <option>在籍写真２枚目(ギャラリー/サイズ指定なし)</option>
                                                    <option>在籍写真３枚目(ギャラリー/サイズ指定なし)</option>
                                                    <option>在籍写真４枚目(ギャラリー/サイズ指定なし)</option>
                                                    <option>在籍・出勤用アップ画像(サイドピックアップ/サイズ指定なし)</option>
                                                    <option>在籍・出勤用アップ画像(携帯版)(サイドピックアップ/横60pxｘ縦80px)</option>
                                                    <option>サイドピックアップ(サイドピックアップ/横207pxｘ縦356px)</option>
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">ファイル指定</label>
                                            <div class="col-sm-8"> <input type="file" class="form-control" id="field-file" placeholder="選択されていません">※推奨画像サイズ：300px ⅹ 400px(サイドビックアップは207px ⅹ 356px)<br>※上記以外の比率で画像をアップロードした場合、画像の表示が崩れる場合があります </div>
                                        </div>

                                        <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">タイトル</label>
                                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-1" placeholder="写真タイトルを入力してください"> </div>
                                        </div>

                                        <div class="col-md-5 mt-3">
                                            <button type="button" class="btn btn-orange btn-icon-align">
                                                <svg class="bi bi-plus-circle-fill"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
                                                <span class="title ml-1">写真追加</span>
                                            </button>
                                        </div>  
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tile-stats tile-primary frm-head mt-3"> 写真確認</div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs bordered">
                                <li class="active"> 
                                    <a href="#tab2-home" data-toggle="tab"> <span class="visible-xs"><i class="entypo-home"></i></span> <span class="hidden-xs">メイン</span> </a> 
                                </li>
                                <li> 
                                    <a href="#tab2-gallery" data-toggle="tab"> <span class="visible-xs"><i class="entypo-user"></i></span> <span class="hidden-xs">ギャラリー</span> </a>
                                </li>
                                <li> 
                                    <a href="#tab2-side-pickup" data-toggle="tab"> <span class="visible-xs"><i class="entypo-mail"></i></span> <span class="hidden-xs">サイドピックアップ</span> </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab2-home">
                                        
                                    <div class="panel panel-primary bg-grey border-grey-dark mt-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-title-custom border-grey-dark ml-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                                                    <span class="ml-1">メイン画像(在籍写真１枚目)</span>
                                                </div>
                                                <table class="table responsive text-dark">
                                                    <thead>
                                                        <tr>
                                                            <th>設定名</th>
                                                            <th>サイズ</th>
                                                            <th>写真URL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>元画像</td>
                                                            <td>サイズ指定なし</td>
                                                            <td> <a href="{{ url('/storage/photos/1139/moto_1139.jpg') }}" target="_blank" >{{ url('/storage/photos/1139/moto_1139.jpg') }} </a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>基本サムネール</td>
                                                            <td>120 x 160</td>
                                                            <td>{{ url('/storage/photos/1139/thmb_1139.jpg') }}</td>
                                                        </tr>   
                                                        <tr>
                                                            <td>トピックス</td>
                                                            <td>210 x 280</td>
                                                            <td>{{ url('/storage/photos/1139/topi_1139.jpg') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>出勤</td>
                                                            <td>180 x 240</td>
                                                            <td>{{ url('/storage/photos/1139/wk_1139.jpg') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>携帯サムネール</td>
                                                            <td>60 x 80</td>
                                                            <td>{{ url('/storage/photos/1139/mthumb_1139.jpg') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>メイン</td>
                                                            <td>720 x 960</td>
                                                            <td>{{ url('/storage/photos/1139/main_1139.jpg') }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row m-0">

                                                    <div class="col-md-2">
                                                        <div class="panel panel-primary image-panel-shadow">
                                                            <img src="{{ url('/storage/photos/1139/moto_1139.jpg') }}" class="w-100" alt="moto_1139" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="panel panel-primary image-panel-shadow">
                                                            <img src="{{ url('/storage/photos/1139/thmb_1139.jpg') }}" class="w-100" alt="thmb_1139"/>  
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="panel panel-primary image-panel-shadow">
                                                            <img src="{{ url('/storage/photos/1139/topi_1139.jpg') }}" class="w-100" alt="topi_1139" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="panel panel-primary image-panel-shadow">
                                                            <img src="{{ url('/storage/photos/1139/wk_1139.jpg') }}" class="w-100" alt="wk_1139" />
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <div class="panel panel-primary image-panel-shadow w-75px">
                                                            <img src="{{ url('/storage/photos/1139/mthumb_1139.jpg') }}" class="" alt="mthumb_1139" />
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <div class="panel panel-primary image-panel-shadow">
                                                            <img src="{{ url('/storage/photos/1139/main_1139.jpg') }}" class="w-100" alt="main_1139" />
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="tab2-gallery">
                                
                                </div>
                                <div class="tab-pane" id="tab2-side-pickup">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    

 


@endsection