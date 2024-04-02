@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"></path></svg>
        モデル編集</h2> <br />

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs bordered">
                <li class="{{ ($stab == 1) ? 'active' : '' }}">
                    <a href="#tab1-companion_basic_information" data-toggle="tab">
                        <span class="visible-xs"><i class="entypo-home"></i></span> <span class="hidden-xs">モデル基本情報</span>
                    </a>
                </li>
                <li class="{{ ($stab == 2) ? 'active' : '' }}" >
                    <a href="#tab1-additional_setting_items" data-toggle="tab">
                        <span class="visible-xs"><i class="entypo-user"></i></span>
                        <span class="hidden-xs">追加設定項目</span>
                    </a>
                </li>
                <li class="{{ ($stab == 3) ? 'active' : '' }}" >
                    <a href="#tab1-photo_management" data-toggle="tab">
                        <span class="visible-xs"><i class="entypo-mail"></i></span> <span class="hidden-xs">写真管理</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">

                <div class="{{ ($stab == 1) ? 'tab-pane active' : 'tab-pane' }}" id="tab1-companion_basic_information">

                    <a href="{{ route('admin.companion.list') }}" class="btn btn-blue mt-3">モデル一覧に戻る</a>

                    <div class="tile-stats tile-primary frm-head mt-1"> モデル情報入力</div>

                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-9">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-body">

                                    <form role="form" method="post" action="{{ route('admin.companion.update') }}" class="form-horizontal form-groups-bordered" id="frmCompanion" >
                                        @csrf
                                        <input type="hidden" name="id" class="form-control" value="{{ $companion->id }}" required />

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">ランク・コース</label>
                                            <div class="col-sm-5 frm-inpt">
                                                <select name="category_id" class="form-control">
                                                    @foreach($categories as $category)
                                                        @if($category->id == $companion->category_id)
                                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                        @else
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <a href="{{ route('admin.category.list') }}" class="btn btn-success btn-icon-align">
                                                    <svg class="bi bi-pencil"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                                                    <span class="title ml-1">ランク・コース内容編集</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group"> <label for="frmName" class="col-sm-3 control-label">名前<span class="text-danger">※必須</span></label>
                                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_name" class="form-control" id="frmName" value="{{ $companion->name }}" placeholder="表示名全体を漢字で入力してください" > </div>
                                        </div>
                                        <div class="form-group"> <label for="frmKana" class="col-sm-3 control-label">かな</label>
                                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_kana" class="form-control" id="frmKana" value="{{ $companion->kana }}" placeholder="ローマ字、 ひらがな等全体を統一してください"> </div>
                                        </div>
                                        <div class="form-group"> <label for="frmAge" class="col-sm-3 control-label">年齢<span class="text-danger">半角数字</span></label>
                                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_age" class="form-control" id="frmAge" value="{{ $companion->age }}" placeholder="年齢">歲</div>
                                        </div>
                                        <div class="form-group"> <label for="frmHeight" class="col-sm-3 control-label">身長<span class="text-danger">半角数字</span></label>
                                            <div class="col-sm-8 frm-inpt"><input type="text" name="frm_height" class="form-control" id="frmHeight" value="{{ $companion->height }}" placeholder="身長">cm</div>
                                        </div>
                                        <div class="form-group"> <label for="frmBust" class="col-sm-3 control-label">バスト<span class="text-danger">半角数字</span></label>
                                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_bust" class="form-control" id="frmBust" value="{{ $companion->bust }}" placeholder="バスト">cm</div>
                                        </div>
                                        <div class="form-group"> <label for="frmCup" class="col-sm-3 control-label">カップ<span class="text-danger">半角数字</span></label>
                                            <div class="col-sm-8 frm-inpt">
                                                <select name="frm_cup" id="frmCup" class="form-control">
                                                    <option value="A" {{ $companion->cup == 'A' ? 'selected' : '' }} >A</option>
                                                    <option value="B" {{ $companion->cup == 'B' ? 'selected' : '' }} >B</option>
                                                    <option value="C" {{ $companion->cup == 'C' ? 'selected' : '' }} >C</option>
                                                    <option value="D" {{ $companion->cup == 'D' ? 'selected' : '' }} >D</option>
                                                    <option value="E" {{ $companion->cup == 'E' ? 'selected' : '' }} >E</option>
                                                    <option value="F" {{ $companion->cup == 'F' ? 'selected' : '' }} >F</option>
                                                    <option value="G" {{ $companion->cup == 'G' ? 'selected' : '' }} >G</option>
                                                    <option value="H" {{ $companion->cup == 'H' ? 'selected' : '' }} >H</option>
                                                    <option value="I" {{ $companion->cup == 'I' ? 'selected' : '' }} >I</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group"> <label for="frmWaist" class="col-sm-3 control-label">ウエス<span class="text-danger">ト半角数字</span></label>
                                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_waist" class="form-control" id="frmWaist" value="{{ $companion->waist }}" placeholder="ウエスト">cm</div>
                                        </div>
                                        <div class="form-group"> <label for="frmHip" class="col-sm-3 control-label">ヒップ<span class="text-danger">半角数字</span></label>
                                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_hip"  class="form-control" id="frmHip" value="{{ $companion->hip }}" placeholder="ヒップ">cm</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">おすすめポイント</label>
                                            <div class="col-sm-8 frm-inpt">
                                                <div class="grid">
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="新人" {{ (strpos($companion->rookie, '新人') !== false) ? 'checked': '' }} >&nbsp;新人 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="経験者" {{ (strpos($companion->rookie, '経験者') !== false) ? 'checked': '' }} >&nbsp; 経験者 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="未経験" {{ (strpos($companion->rookie, '未経験') !== false) ? 'checked': '' }} >&nbsp; 未経験 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="清楚系" {{ (strpos($companion->rookie, '清楚系') !== false) ? 'checked': '' }} >&nbsp; 清楚系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="スタイル抜群" {{ (strpos($companion->rookie, 'スタイル抜群') !== false) ? 'checked': '' }} >&nbsp; スタイル抜群 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="モデル系" {{ (strpos($companion->rookie, 'モデル系') !== false) ? 'checked': '' }} >&nbsp; モデル系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="キレカワ系" {{ (strpos($companion->rookie, 'キレカワ系') !== false) ? 'checked': '' }} >&nbsp; キレカワ系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="アイドル系" {{ (strpos($companion->rookie, 'アイドル系') !== false) ? 'checked': '' }} >&nbsp; アイドル系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="素人系" {{ (strpos($companion->rookie, '素人系') !== false) ? 'checked': '' }} >&nbsp; 素人系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="グラビア系" {{ (strpos($companion->rookie, 'グラビア系') !== false) ? 'checked': '' }} >&nbsp; グラビア系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="お姉様系" {{ (strpos($companion->rookie, 'お姉様系') !== false) ? 'checked': '' }} >&nbsp; お姉様系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="ギャル系" {{ (strpos($companion->rookie, 'ギャル系') !== false) ? 'checked': '' }} >&nbsp; ギャル系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="現役モデル" {{ (strpos($companion->rookie, '現役モデル') !== false) ? 'checked': '' }} >&nbsp; 現役モデル &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="AV女優" {{ (strpos($companion->rookie, 'AV女優') !== false) ? 'checked': '' }} >&nbsp; AV女優 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="CA" {{ (strpos($companion->rookie, 'CA') !== false) ? 'checked': '' }} >&nbsp; CA &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="女子大生" {{ (strpos($companion->rookie, '女子大生') !== false) ? 'checked': '' }} >&nbsp; 女子大生 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="ロリ系" {{ (strpos($companion->rookie, 'ロリ系') !== false) ? 'checked': '' }} >&nbsp; ロリ系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="おっとり系" {{ (strpos($companion->rookie, 'おっとり系') !== false) ? 'checked': '' }} >&nbsp; おっとり系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="綺麗系" {{ (strpos($companion->rookie, '綺麗系') !== false) ? 'checked': '' }} >&nbsp; 綺麗系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="可愛い系" {{ (strpos($companion->rookie, '可愛い系') !== false) ? 'checked': '' }} >&nbsp; 可愛い系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="癒し系" {{ (strpos($companion->rookie, '癒し系') !== false) ? 'checked': '' }} >&nbsp; 癒し系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="オススメ" {{ (strpos($companion->rookie, 'オススメ') !== false) ? 'checked': '' }} >&nbsp; オススメ &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="巨乳" {{ (strpos($companion->rookie, '巨乳') !== false) ? 'checked': '' }} >&nbsp; 巨乳 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="スレンダー" {{ (strpos($companion->rookie, 'スレンダー') !== false) ? 'checked': '' }} >&nbsp; スレンダー &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="女子アナ系" {{ (strpos($companion->rookie, '女子アナ系') !== false) ? 'checked': '' }} >&nbsp; 女子アナ系 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="小柄" {{ (strpos($companion->rookie, '小柄') !== false) ? 'checked': '' }} >&nbsp; 小柄 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="高身長" {{ (strpos($companion->rookie, '高身長') !== false) ? 'checked': '' }} >&nbsp; 高身長 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="愛嬌抜群" {{ (strpos($companion->rookie, '愛嬌抜群') !== false) ? 'checked': '' }} >&nbsp; 愛嬌抜群 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="パイパン" {{ (strpos($companion->rookie, 'パイパン') !== false) ? 'checked': '' }} >&nbsp; パイパン &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="美脚" {{ (strpos($companion->rookie, '美脚') !== false) ? 'checked': '' }} >&nbsp; 美脚 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="美乳" {{ (strpos($companion->rookie, '美乳') !== false) ? 'checked': '' }} >&nbsp; 美乳 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="美尻" {{ (strpos($companion->rookie, '美尻') !== false) ? 'checked': '' }} >&nbsp; 美尻 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="黒髪" {{ (strpos($companion->rookie, '黒髪') !== false) ? 'checked': '' }} >&nbsp; 黒髪 &nbsp;&nbsp;
                                                    <input name="frm_rookie[]" class="form-check-input" type="checkbox" value="ハーフ" {{ (strpos($companion->rookie, 'ハーフ') !== false) ? 'checked': '' }} >&nbsp; ハーフ &nbsp;&nbsp;
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"> <label for="frmHobby" class="col-sm-3 control-label">趣味</label>
                                            <div class="col-sm-8"> <input type="text" name="frm_hobby" class="form-control" id="frmHobby" value="{{ $companion->hobby }}" placeholder="趣味を簡潔に記入してください"> </div>
                                        </div>
                                        <div class="form-group"> <label for="frmSalePoint" class="col-sm-3 control-label">セールスポイント</label>
                                            <div class="col-sm-8 frm-inpt">
                                                <input type="text" name="frm_sale_point" class="form-control" id="frmSalePoint" value="{{ $companion->sale_point }}" placeholder="セールスポイント">
                                                <label class="col-sm-4 control-label">フォントカラー選択 :</label>
                                                <div class="col-sm-8">
                                                    <div class="radio-inline"> <label> <input type="radio" name="frm_font_color" value="黒" {{ $companion->font_color == '黒' ? 'checked' : '' }} >黒</label> </div>
                                                    <div class="radio-inline"> <label> <input type="radio" name="frm_font_color" value="デフォルト" {{ $companion->font_color == 'デフォルト' ? 'checked' : '' }} >デフォルト</label></div>
                                                    <div class="radio-inline"> <label> <input type="radio" name="frm_font_color" value="青" {{ $companion->font_color == '青' ? 'checked' : '' }} >青</label></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"> <label for="frmShortMessage" class="col-sm-3 control-label">店舖 メッセージ</label>
                                            <div class="col-sm-8 frm-inpt">
                                                <div class="row">
                                                    <label class="col-sm-8 control-label" style="color:hotpink; text-align:left;">女性紹介のメッセージを記入してください</label>
                                                </div>
                                                <div class="row mt-1">
                                                    <textarea  name="short_message" class="ckeditor form-control" id="frmShortMessage">{{ $companion->message }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="frmEntryDate" class="col-sm-3 control-label">入店目<span class="text-danger">※必須</span></label>
                                            <div class="col-sm-8 frm-inpt">
                                                <div class="input-group">
                                                    <input type="text" name="frm_entry_date" class="form-control datepicker" data-format="yyyy-mm-dd" value="{{ $companion->entry_date }}" placeholder="入店日　カレンダーから選択" id="frmEntryDate" >
                                                    <div class="input-group-addon">
                                                        <a href="#"><i class="entypo-calendar"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5 mt-3">
                                            <button type="submit" class="btn btn-orange btn-icon-align">
                                                <svg class="bi bi-plus-circle-fill"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
                                                <span class="title ml-1">コンパニオン登録</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="{{ ($stab == 2) ? 'tab-pane active' : 'tab-pane' }}" id="tab1-additional_setting_items">

                    <a href="{{ route('admin.companion.list') }}" class="btn btn-blue mt-3">コンパニオン一覧に戻る</a>
                    <div class="tile-stats tile-primary frm-head mt-1"> 追加設定項目</div>

                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-body">

                                    <form role="form" method="post" action="{{ route('admin.companion.extra.update') }}" class="form-horizontal form-groups-bordered" id="frmExtraCompanion" >
                                        @csrf
                                        <input type="hidden" name="id" class="form-control" value="{{ $companion->id }}" required />

                                        <div class="form-group"> <label for="frmPosition" class="col-sm-3 control-label">前(現)職   </label>
                                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_position" class="form-control" id="frmPosition"  value="{{ $companion->previous_position }}" placeholder="" > </div>
                                        </div>
                                        <div class="form-group"> <label for="frmLookALive" class="col-sm-3 control-label">似ている芸能人</label>
                                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_celebrities_who_look_alike" class="form-control" id="frmLookALive" value="{{ $companion->celebrities_who_look_alike }}" placeholder="似ている芸能人"> </div>
                                        </div>

                                        <div class="col-md-5 mt-3">
                                            <button type="submit" class="btn btn-orange btn-icon-align">
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

                <div class="{{ ($stab == 3) ? 'tab-pane active' : 'tab-pane' }}" id="tab1-photo_management">

                    <a href="{{ route('admin.companion.list') }}" class="btn btn-blue mt-3">コンパニオン一覧に戻る</a>
                    <div class="tile-stats tile-primary frm-head mt-1"> 写真管理</div>

                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-body">

                                    <form role="form" method="post" action="{{ route('admin.companion.photo.save') }}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered" id="frmCompanionPhoto" >
                                        @csrf

                                        <input type="hidden" name="companion_id" class="form-control" value="{{ $companion->id }}" required />

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">フォト設定名</label>
                                            <div class="col-sm-8 frm-inpt">
                                                <select name="photo_setting_id" class="form-control">

                                                    @foreach($photoSizeSettings as $photoSizeSetting)
                                                        @if(!empty($photoSizeSetting->hpx) && !empty($photoSizeSetting->vpx))
                                                            <option value="{{ $photoSizeSetting->id }}">{{ $photoSizeSetting->name }} ({{ $photoSizeSetting->photo_category['name'] }}/横{{ $photoSizeSetting->hpx }}pxｘ縦{{ $photoSizeSetting->vpx }}px)</option>
                                                        @else
                                                            <option value="{{ $photoSizeSetting->id }}">{{ $photoSizeSetting->name }} ({{ $photoSizeSetting->photo_category['name'] }}/サイズ指定なし)</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group"> <label for="frmPhoto" class="col-sm-3 control-label">ファイル指定</label>
                                            <div class="col-sm-8 frm-inpt"> <input type="file" name="frm_photo" class="form-control" id="frmPhoto" placeholder="選択されていません">※推奨画像サイズ：300px ⅹ 400px(サイドビックアップは207px ⅹ 356px)<br>※上記以外の比率で画像をアップロードした場合、画像の表示が崩れる場合があります </div>
                                        </div>

                                        <div class="form-group"> <label for="frmTitle" class="col-sm-3 control-label">タイトル</label>
                                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_title" class="form-control" id="frmTitle" placeholder="写真タイトルを入力してください"> </div>
                                        </div>

                                        <div class="col-md-5 mt-3">
                                            <button type="submit" class="btn btn-orange btn-icon-align">
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
                                                        @foreach($companionPhotos as $companionPhoto)
                                                            <tr>
                                                                <td>{{ $companionPhoto->title }}</td>
                                                                <td>
                                                                    @if(empty($companionPhoto->photo_size_setting['hpx']) || empty($companionPhoto->photo_size_setting['vpx']))
                                                                            サイズ指定なし
                                                                    @else
                                                                        {{ $companionPhoto->photo_size_setting['hpx'] }}x{{ $companionPhoto->photo_size_setting['vpx'] }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @php
                                                                         $path = '/storage/photos/'.$companionPhoto->companion_id.'/'.$companionPhoto->photo;
                                                                    @endphp
                                                                    <a href="{{ url($path) }}" target="_blank" >{{ url($path) }} </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row m-0">

                                                    @foreach($companionPhotos as $companionPhoto)
                                                        @php
                                                            $imgPath = '/storage/photos/'.$companionPhoto->companion_id.'/'.$companionPhoto->photo;
                                                        @endphp
                                                        <div class="col-md-2">
                                                            @if(empty($companionPhoto->photo_size_setting['hpx']) || empty($companionPhoto->photo_size_setting['vpx']))
                                                                <div class="panel panel-primary image-panel-shadow">
                                                                    <img src="{{ url($imgPath) }}" class="w-100" alt="{{ $companionPhoto->photo }}" />
                                                                </div>
                                                            @else
                                                                <div class="panel panel-primary image-panel-shadow" style="max-width:{{ ($companionPhoto->photo_size_setting['hpx'] + 10) }}px">
                                                                    <img src="{{ url($imgPath) }}" class="w-100" alt="{{ $companionPhoto->photo }}" />
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
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

    <script>
        $(document).ready(function(){

            $('#frmCompanion').validate({
                ignore: [],
                debug: false,
                rules: {
                    category_id: { required: true },
                    frm_name: { required: true },
                    frm_kana: { required: true },
                    frm_age: { required: true },
                    frm_height: { required: true },
                    frm_bust: { required: true },
                    frm_cup: { required: true },
                    frm_waist: { required: true },
                    frm_hip: { required: true },
                    'frm_rookie[]': { required: true, maxlength:4 },
                    frm_sale_point: { required: true, maxlength:100 },
                    short_message: {
                        required: function(){
                            CKEDITOR.instances.frmShortMessage.updateElement();
                        }
                    },
                    frm_entry_date: { required: true }
                },
                messages: {
                    category_id: { required: "{{ __('This field is required') }}" },
                    frm_name: { required: "{{ __('This field is required') }}" },
                    frm_kana: { required: "{{ __('This field is required') }}" },
                    frm_age: { required: "{{ __('This field is required') }}" },
                    frm_height: { required: "{{ __('This field is required') }}" },
                    frm_bust: { required: "{{ __('This field is required') }}" },
                    frm_cup: { required: "{{ __('This field is required') }}" },
                    frm_waist: { required: "{{ __('This field is required') }}" },
                    frm_hip: { required: "{{ __('This field is required') }}" },
                    'frm_rookie[]': { required: "{{ __('This field is required') }}", maxlength: "{{ __('Max 4 checkbox allowed') }}" },
                    frm_sale_point: { required: "{{ __('This field is required') }}", maxlength: "{{ __('Max 100 characters allowed') }}" },
                    short_message: { required: "{{ __('This field is required') }}" },
                    frm_entry_date: { required: "{{ __('This field is required') }}" }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.frm-inpt').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

            $('#frmExtraCompanion').validate({
                ignore: [],
                debug: false,
                rules: {
                    frm_position: { required: true },
                    frm_celebrities_who_look_alike: { required: true }
                },
                messages: {
                    frm_position: { required: "{{ __('This field is required') }}" },
                    frm_celebrities_who_look_alike: { required: "{{ __('This field is required') }}" }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.frm-inpt').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

            $('#frmCompanionPhoto').validate({
                ignore: [],
                debug: false,
                rules: {
                    photo_setting_id: { required: true },
                    frm_photo: { required: true },
                    frm_title: { required: true }
                },
                messages: {
                    photo_setting_id: { required: "{{ __('This field is required') }}" },
                    frm_photo: { required: "{{ __('This field is required') }}" },
                    frm_title: { required: "{{ __('This field is required') }}" }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.frm-inpt').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

        })
    </script>


@endsection
