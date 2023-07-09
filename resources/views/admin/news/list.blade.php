@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M16.786 3.725a1.75 1.75 0 0 0-2.846.548L12.347 7.99A4.745 4.745 0 0 0 8.07 9.291l-1.71 1.71a.75.75 0 0 0 0 1.06l2.495 2.496l-5.385 5.386a.75.75 0 1 0 1.06 1.06l5.386-5.385l2.495 2.495a.75.75 0 0 0 1.061 0l1.71-1.71a4.745 4.745 0 0 0 1.302-4.277l3.716-1.592a1.75 1.75 0 0 0 .548-2.846l-3.962-3.963Zm-1.468 1.139a.25.25 0 0 1 .407-.078l3.963 3.962a.25.25 0 0 1-.079.407l-4.315 1.85a.75.75 0 0 0-.41.941a3.25 3.25 0 0 1-.763 3.396l-1.18 1.18l-4.99-4.99l1.18-1.18a3.25 3.25 0 0 1 3.396-.762a.75.75 0 0 0 .942-.41l1.85-4.316Z" clip-rule="evenodd"/></svg>
    ニュース編集</h2> <br />
    
    <div class="col-md-12">
        <div class="alert alert-success p-5px sidemenu-href">
            <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M.41 13.41L6 19l1.41-1.42L1.83 12m20.41-6.42L11.66 16.17L7.5 12l-1.43 1.41L11.66 19l12-12M18 7l-1.41-1.42l-6.35 6.35l1.42 1.41L18 7Z"/></svg></strong> 
            <span class="title ml-1">ニュースを削除しました。</span>
        </div>
    </div>

    <div class="tile-stats tile-primary frm-head"> 新規ニュース追加</div>

    <div class="col-md-12 mb-1">
        <button type="button" class="btn btn-orange btn-icon-align showSendEmailModal">
            <svg class="bi bi-plus-circle-fill" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path></svg>
            <span class="title ml-1">ニュースを追加する</span>
        </button>
    </div>

    <div class="tile-stats tile-primary frm-head"> ニュース一覧</div>
        
    
    <div class="panel panel-primary" >
        <div class="panel-body p-0 pl-15px">
            <form role="form" class="form-horizontal form-groups-bordered">
                <div class="row mt-1">
                    <div class="col-md-3 btn-icon-align-inline">
                        <div class="form-group"> 
                            <div class="col-sm-12"> 
                                <div class="checkbox"> <label> <input type="checkbox">非表示ニュースを含めて表示する</label> </div> 
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-success sidemenu-href">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0c.41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z"/></svg>
                            <span class="title ml-1">検索</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


<div class="col-md-12"> 
    <table class="table table-bordered"> 
        <thead> 
            <tr> 
                <th>削除</th> 
                <th>文章</th> 
                <th>登録日</th> 
            </tr> 
        </thead> 
        <tbody> 
            <tr> 
                <td>
                    <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                    </button>
                </td> 
                <td>฀本日出勤฀ ฀ 完全業界未経験! 雪のように白い美肌と大人の雰囲気 色気がある美女 ฀</td>
                <td>2023/04/20 12:31</td> 
            </tr> 
            <tr> 
                <td>
                    <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                    </button>
                </td> 
                <td>฀本日出勤฀ ฀ 完全業界未経験! 雪のように白い美肌と大人の雰囲気 色気がある美女 ฀</td>
                <td>2023/04/20 12:31</td> 
            </tr> 
            <tr> 
                <td>
                    <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                    </button>
                </td> 
                <td>฀本日出勤฀ ฀ 完全業界未経験! 雪のように白い美肌と大人の雰囲気 色気がある美女 ฀</td>
                <td>2023/04/20 12:31</td> 
            </tr> 
            <tr> 
                <td>
                    <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                    </button>
                </td> 
                <td>฀本日出勤฀ ฀ 完全業界未経験! 雪のように白い美肌と大人の雰囲気 色気がある美女 ฀</td>
                <td>2023/04/20 12:31</td> 
            </tr> 
            <tr> 
                <td>
                    <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                    </button>
                </td> 
                <td>฀本日出勤฀ ฀ 完全業界未経験! 雪のように白い美肌と大人の雰囲気 色気がある美女 ฀</td>
                <td>2023/04/20 12:31</td> 
            </tr> 
            <tr> 
                <td>
                    <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                    </button>
                </td> 
                <td>฀本日出勤฀ ฀ 完全業界未経験! 雪のように白い美肌と大人の雰囲気 色気がある美女 ฀</td>
                <td>2023/04/20 12:31</td> 
            </tr> 
            <tr> 
                <td>
                    <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                    </button>
                </td> 
                <td>฀本日出勤฀ ฀ 完全業界未経験! 雪のように白い美肌と大人の雰囲気 色気がある美女 ฀</td>
                <td>2023/04/20 12:31</td> 
            </tr> 
            <tr> 
                <td>
                    <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                    </button>
                </td> 
                <td>฀本日出勤฀ ฀ 完全業界未経験! 雪のように白い美肌と大人の雰囲気 色気がある美女 ฀</td>
                <td>2023/04/20 12:31</td> 
            </tr> 
            <tr> 
                <td>
                    <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                    </button>
                </td> 
                <td>฀本日出勤฀ ฀ 完全業界未経験! 雪のように白い美肌と大人の雰囲気 色気がある美女 ฀</td>
                <td>2023/04/20 12:31</td> 
            </tr> 
            <tr> 
                <td>
                    <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                    </button>
                </td> 
                <td>฀本日出勤฀ ฀ 完全業界未経験! 雪のように白い美肌と大人の雰囲気 色気がある美女 ฀</td>
                <td>2023/04/20 12:31</td> 
            </tr> 

        </tbody> 
    </table> 
</div>

<div class="col-md-2">
    <a href="#" class="btn btn-orange btn-icon-align">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 3C7.58 3 4 4.79 4 7s3.58 4 8 4s8-1.79 8-4s-3.58-4-8-4M4 9v3c0 2.21 3.58 4 8 4s8-1.79 8-4V9c0 2.21-3.58 4-8 4s-8-1.79-8-4m0 5v3c0 2.21 3.58 4 8 4s8-1.79 8-4v-3c0 2.21-3.58 4-8 4s-8-1.79-8-4Z"></path></svg>
        <span class="title ml-1">並び順を確定する</span>
    </a>
</div>

<div class="modal fade" id="modal-1">
    <div class="modal-dialog" style="width: 60%;">
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">ニュースを追加する</h4>
            </div>
            <div class="modal-body">

                    <div class="panel panel-primary" >
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered">
                         
                                <div class="form-group"> <label for="field-2" class="col-sm-2 control-label">タイトル</label>
                                    <div class="col-sm-10"> <input type="text" class="form-control" id="field-2" placeholder="タイトルを入力してください。"> </div>
                                </div>
                  
                                <div class="form-group"> <label for="field-1" class="col-sm-2 control-label">本文</label>
                                    <div class="col-sm-10"> 
                                        <textarea  name="content" class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                                    </div>
                                </div>

                                <div class="form-group"> 
                                    <label for="field-3" class="col-sm-2 control-label">添付写真コンパニオン</label>
                                    <div class="col-sm-10"> 
                                        <select name="test" class="select2" data-allow-clear="true" data-placeholder="">
                                            <option></option>
                                            <option value="1">陽葵(29)</option>
                                            <option value="2">陽菜(21)</option>
                                            <option value="3">結愛(25)</option>
                                            <option value="4">丹梨(22)</option>
                                            <option value="5">冴咲(23)</option>
                                            <option value="5">佑泉(24)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3 mt-3">
                                    <a href="#" class="btn btn-orange btn-icon-align">
                                        <span class="title ml-1">新規ニュース登録</span>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('click','.showSendEmailModal', function(){
            $('#modal-1').modal('show');
        })
    })
 </script>       


@endsection