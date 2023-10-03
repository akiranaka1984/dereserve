@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg>
    電報テンプレートを編集する</h2> <br />

    <div class="tile-stats tile-primary frm-head"> 電報テンプレートを編集する</div>

    <form role="form" method="post" action="{{ route('admin.telegram.save') }}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered" id="frmTelegram" >
        @csrf
        <div class="row">
            <label for="frmTemplateName" class="col-sm-2 control-label">テンプレート名</label>
            <div class="col-sm-8 frm-inpt">
                <input type="text" name="post_title" class="form-control input-lg" placeholder="" />
            </div>
        </div> <br />
        <div class="row">
            <label for="frmContent" class="col-sm-2 control-label">本文</label>
            <div class="col-sm-8 frm-inpt">
                <textarea name="post_content" class="form-control ckeditor" rows="18" id="frmPostContent"></textarea>
            </div>
        </div> <br />
        <div class="row">
            <label for="frmContent" class="col-sm-2 control-label"></label>
            <div class="col-sm-2 post-save-changes">
                <button type="submit" class="btn btn-green btn-lg btn-block btn-icon"> {{ __('SAVE') }} <i class="entypo-check"></i></button>
            </div>
        </div>
    </form>

@endsection
