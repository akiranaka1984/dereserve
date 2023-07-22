@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"></path></svg>
        コンパニオン登録</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> コンパニオン情報入力</div>

    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <form role="form" method="post" action="{{ route('admin.companion.save') }}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered" id="frmCompanion" >
                        @csrf   
                        <div class="form-group"> 
                            <label class="col-sm-3 control-label">ヘルスコース</label>
                            <div class="col-sm-5 frm-inpt"> 
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <a href="{{ route('admin.category.list') }}" class="btn btn-success btn-icon-align">
                                    <svg class="bi bi-pencil"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                                    <span class="title ml-1">カテゴリー編集</span>
                                </a>
                            </div>
                        </div>
                        <div class="form-group"> <label for="frmName" class="col-sm-3 control-label">名前<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_name" class="form-control" id="frmName" placeholder="表示名全体を漢字で入力してください" > </div>
                        </div>
                        <div class="form-group"> <label for="frmKana" class="col-sm-3 control-label">かな</label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_kana" class="form-control" id="frmKana" placeholder="ローマ字、 ひらがな等全体を統一してください"> </div>
                        </div>
                        <div class="form-group"> <label for="frmAge" class="col-sm-3 control-label">年齢<span class="text-danger">半角数字</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_age" class="form-control" id="frmAge" placeholder="年齢">歲</div>
                        </div>
                        <div class="form-group"> <label for="frmHeight" class="col-sm-3 control-label">身長<span class="text-danger">半角数字</span></label>
                            <div class="col-sm-8 frm-inpt"><input type="text" name="frm_height" class="form-control" id="frmHeight" placeholder="身長">cm</div>
                        </div>
                        <div class="form-group"> <label for="frmBust" class="col-sm-3 control-label">バスト<span class="text-danger">半角数字</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_bust" class="form-control" id="frmBust" placeholder="バスト">cm</div>
                        </div>
                        <div class="form-group"> <label for="frmCup" class="col-sm-3 control-label">カップ<span class="text-danger">半角数字</span></label>
                            <div class="col-sm-8 frm-inpt"> 
                                <select name="frm_cup" id="frmCup" class="form-control">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                    <option value="I">I</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"> <label for="frmWaist" class="col-sm-3 control-label">ウエス<span class="text-danger">ト半角数字</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_waist" class="form-control" id="frmWaist" placeholder="ウエスト">cm</div>
                        </div>
                        <div class="form-group"> <label for="frmHip" class="col-sm-3 control-label">ヒップ<span class="text-danger">半角数字</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_hip"  class="form-control" id="frmHip" placeholder="ヒップ">cm</div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">新人属性</label>
                            <div class="col-sm-8 frm-inpt">
                                <div class="radio-inline"> <label> <input type="radio" name="frm_rookie" value="新人" checked>新人</label> </div>
                                <div class="radio-inline"> <label> <input type="radio" name="frm_rookie" value="経験者">経験者</label></div>
                            </div>
                        </div>
                        <div class="form-group"> <label for="frmHobby" class="col-sm-3 control-label">趣味</label>
                            <div class="col-sm-8"> <input type="text" name="frm_hobby" class="form-control" id="frmHobby" placeholder="趣味を簡潔に記入してください"> </div>
                        </div>
                        <div class="form-group"> <label for="frmSalePoint" class="col-sm-3 control-label">セールスポイント</label>
                            <div class="col-sm-8 frm-inpt"> 
                                <input type="text" name="frm_sale_point" class="form-control" id="frmSalePoint" placeholder="セールスポイント/10文字目安">
                                <label class="col-sm-4 control-label">フォントカラー選択 :</label>
                                <div class="col-sm-8">
                                    <div class="radio-inline"> <label> <input type="radio" name="frm_font_color" value="黒" checked>黒</label> </div>
                                    <div class="radio-inline"> <label> <input type="radio" name="frm_font_color" value="デフォルト">デフォルト</label></div>
                                    <div class="radio-inline"> <label> <input type="radio" name="frm_font_color" value="青">青</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"> <label for="frmShortMessage" class="col-sm-3 control-label">店舖 メッセージ</label>
                            <div class="col-sm-8 frm-inpt"> 
                                <div class="row">
                                    <label class="col-sm-8 control-label" style="color:hotpink; text-align:left;">女性紹介のメッセージを記入してください</label>
                                </div>
                                <div class="row mt-1">
                                    <textarea  name="short_message" class="ckeditor form-control" id="frmShortMessage" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"> <label for="frmEntryDate" class="col-sm-3 control-label">入店目<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> 
                                <div class="input-group"> 
                                    <input type="text" name="frm_entry_date" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="入店日　カレンダーから選択" id="frmEntryDate" >
                                    <div class="input-group-addon"> 
                                        <a href="#"><i class="entypo-calendar"></i></a> 
                                    </div>
                                </div>
                            </div>  
                        </div>

                        <div class="col-md-3 mt-3">
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
                    frm_rookie: { required: true },
                    frm_sale_point: { required: true },
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
                    frm_rookie: { required: "{{ __('This field is required') }}" },
                    frm_sale_point: { required: "{{ __('This field is required') }}" },
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
        })
    </script>
@endsection