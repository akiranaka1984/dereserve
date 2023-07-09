@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98Zm-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4Zm0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2Z"></path></svg>
    基本写真サイズ編集</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> 基本写真サイズ登録</div>
        
    
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-primary" >
                <div class="panel-body p-0 pl-15px">
                        
                    <form role="form" class="form-horizontal form-groups-bordered">
                        <div class="form-group mt-1"> 
                            <label class="col-sm-3 control-label">カテゴリー(必須)</label>
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
                        <div class="form-group"> <label for="field-2" class="col-sm-3 control-label">設定名称(必須)</span></label>
                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-2" placeholder="写真サイズの設定名称を入力してください"> </div>
                        </div>
                        <div class="form-group"> <label for="field-3" class="col-sm-3 control-label">かな</label>
                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-3" placeholder="ローマ字、 ひらがな等全体を統一してください"> </div>
                        </div>
                        <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">横(px)ⅹ縦(px)</label>
                            <div class="col-sm-8"> 
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="横サイズを入力してください">
                                    <span class="input-group-addon input-group-addon-bg-light">px</span> 
                                    <input type="text" class="form-control" placeholder="縦サイズを入力してください">
                                    <span class="input-group-addon input-group-addon-bg-light">px</span> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group"> <label for="field-ta" class="col-sm-3 control-label">接頭語(英数字のみ)(必須)</label>
                            <div class="col-sm-8"><input type="text" class="form-control" id="field-age" placeholder="接頭語を入力してください">“pic”と入力した場合にファイル名に”pic_”が追加されます</div>
                        </div>
                 
                        <div class="col-md-3 mt-1 mb-1">
                            <button type="button" class="btn btn-orange btn-icon-align">
                                <svg class="bi bi-plus-circle-fill"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
                                <span class="title ml-1">新規追加</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="tile-stats tile-primary frm-head"> 基本写真サイズ編集</div>


    <div class="col-md-12"> 
        <table class="table table-bordered"> 
            <thead> 
                <tr> 
                    <th class="w-7">削除</th> 
                    <th class="w-20">名称</th> 
                    <th class="w-20">カテゴリー</th> 
                    <th class="w-10">横(px)</th> 
                    <th class="w-10">縦(px)</th> 
                    <th class="w-15">接頭語</th> 
                    <th>編集</th> 
                </tr> 
            </thead> 
            <tbody> 

                <tr> 
                    <td>
                        <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                        </button>
                    </td> 
                    <td>
                        <input type="text" class="form-control" placeholder="ローマ字、 ひらがな等全体を統一してください" />
                    </td>
                    <td>
                        <select class="form-control">
                            <option>未対応</option>
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="横(px)" />
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="縦(px)" />
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="moto" />
                    </td>
                    <td class="dl-flex"> 
                        <button type="button" class="btn btn-success btn-icon-align">
                            <svg class="bi bi-pencil"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                            <span class="title ml-1">編集する</span>
                        </button>
                        <button type="button" class="btn btn-blue ml-1">
                            <span class="title ml-1">サムネール編集画面</span>
                        </button>
                    </td>
                </tr> 
            
                <tr> 
                    <td>
                        <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                        </button>
                    </td> 
                    <td>
                        <input type="text" class="form-control" placeholder="ローマ字、 ひらがな等全体を統一してください" />
                    </td>
                    <td>
                        <select class="form-control">
                            <option>未対応</option>
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="横(px)" />
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="縦(px)" />
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="moto" />
                    </td>
                    <td class="dl-flex"> 
                        <button type="button" class="btn btn-success btn-icon-align">
                            <svg class="bi bi-pencil"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                            <span class="title ml-1">編集する</span>
                        </button>
                        <button type="button" class="btn btn-blue ml-1">
                            <span class="title ml-1">サムネール編集画面</span>
                        </button>
                    </td>
                </tr> 

                <tr> 
                    <td>
                        <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                        </button>
                    </td> 
                    <td>
                        <input type="text" class="form-control" placeholder="ローマ字、 ひらがな等全体を統一してください" />
                    </td>
                    <td>
                        <select class="form-control">
                            <option>未対応</option>
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="横(px)" />
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="縦(px)" />
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="moto" />
                    </td>
                    <td class="dl-flex"> 
                        <button type="button" class="btn btn-success btn-icon-align">
                            <svg class="bi bi-pencil"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                            <span class="title ml-1">編集する</span>
                        </button>
                        <button type="button" class="btn btn-blue ml-1">
                            <span class="title ml-1">サムネール編集画面</span>
                        </button>
                    </td>
                </tr> 

                <tr> 
                    <td>
                        <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                        </button>
                    </td> 
                    <td>
                        <input type="text" class="form-control" placeholder="ローマ字、 ひらがな等全体を統一してください" />
                    </td>
                    <td>
                        <select class="form-control">
                            <option>未対応</option>
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="横(px)" />
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="縦(px)" />
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="moto" />
                    </td>
                    <td class="dl-flex"> 
                        <button type="button" class="btn btn-success btn-icon-align">
                            <svg class="bi bi-pencil"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                            <span class="title ml-1">編集する</span>
                        </button>
                        <button type="button" class="btn btn-blue ml-1">
                            <span class="title ml-1">サムネール編集画面</span>
                        </button>
                    </td>
                </tr> 

                <tr> 
                    <td>
                        <button type="button" class="btn btn-danger btn-sm sidemenu-href">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                        </button>
                    </td> 
                    <td>
                        <input type="text" class="form-control" placeholder="ローマ字、 ひらがな等全体を統一してください" />
                    </td>
                    <td>
                        <select class="form-control">
                            <option>未対応</option>
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="横(px)" />
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="縦(px)" />
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="moto" />
                    </td>
                    <td class="dl-flex"> 
                        <button type="button" class="btn btn-success btn-icon-align">
                            <svg class="bi bi-pencil"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                            <span class="title ml-1">編集する</span>
                        </button>
                        <button type="button" class="btn btn-blue ml-1">
                            <span class="title ml-1">サムネール編集画面</span>
                        </button>
                    </td>
                </tr> 
                
            </tbody> 
        </table> 
    </div>



<script>
    $(document).ready(function(){
        
    })
 </script>       


@endsection