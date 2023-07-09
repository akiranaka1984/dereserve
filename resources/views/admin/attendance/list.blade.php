@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"></path></svg>
    出勤登録</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> 出勤コンパニオン登録</div>

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">

                    <form role="form" class="form-horizontal form-groups-bordered">

                        <div class="form-group"> 
                            <label for="field-3" class="col-sm-7 control-label"></label>
                            <div class="col-sm-4">
                                <a href="#" class="btn btn-orange btn-icon-align">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 3C7.58 3 4 4.79 4 7s3.58 4 8 4s8-1.79 8-4s-3.58-4-8-4M4 9v3c0 2.21 3.58 4 8 4s8-1.79 8-4V9c0 2.21-3.58 4-8 4s-8-1.79-8-4m0 5v3c0 2.21 3.58 4 8 4s8-1.79 8-4v-3c0 2.21-3.58 4-8 4s-8-1.79-8-4Z"/></svg>
                                    <span class="title ml-1">並び順を確定する</span>
                                </a>
                            </div>
                        </div>

                        <div class="form-group"> 
                            <input type="hidden" class="selected_date" />
                            <h3 class="text-danger m-0 ml-3 selected_date_text"></h3>
                        </div>

                        <div class="form-group"> 
                            <label for="field-3" class="col-sm-3 control-label">コンパニオン名</label>
                            <div class="col-sm-8"> 
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

                        <div class="form-group"> 
                            <label for="field-3" class="col-sm-3 control-label">出勤時間</label>
                            <div class="col-sm-8"> 
                                
                                <div class="input-group">
                                    <select name="test" class="form-control">
                                        <option></option>
                                        <option value="1">00:00</option>
                                        <option value="1">00:30</option>
                                        <option value="1">01:00</option>
                                        <option value="1">01:30</option>
                                        <option value="1">02:00</option>
                                        <option value="1">02:30</option>
                                        <option value="1">03:00</option>
                                        <option value="1">03:30</option>
                                        <option value="1">04:00</option>
                                        <option value="1">04:30</option>
                                        <option value="1">05:00</option>
                                        <option value="1">05:30</option>
                                        <option value="1">06:00</option>
                                        <option value="1">06:30</option>
                                        <option value="1">07:00</option>
                                        <option value="1">07:30</option>
                                        <option value="1">08:00</option>
                                        <option value="1">08:30</option>
                                        <option value="1">09:00</option>
                                        <option value="1">09:30</option>
                                        <option value="1">10:00</option>
                                        <option value="1">10:30</option>
                                        <option value="1">11:00</option>
                                        <option value="1">11:30</option>
                                        <option value="1">12:00</option>
                                        <option value="2">12:30</option>
                                        <option value="3">13:00</option>
                                        <option value="4">13:30</option>
                                        <option value="5">14:00</option>
                                        <option value="5">14:30</option>
                                        <option value="5">15:00</option>
                                        <option value="5">15:30</option>
                                        <option value="5">16:00</option>
                                        <option value="5">16:30</option>
                                        <option value="5">17:00</option>
                                        <option value="5">17:30</option>
                                        <option value="5">18:00</option>
                                        <option value="5">18:30</option>
                                        <option value="5">19:00</option>
                                        <option value="5">19:30</option>
                                        <option value="5">20:00</option>
                                        <option value="5">20:30</option>
                                        <option value="5">21:00</option>
                                        <option value="5">21:30</option>
                                        <option value="5">22:00</option>
                                        <option value="5">22:30</option>
                                        <option value="5">23:00</option>
                                        <option value="5">23:30</option>
                                    </select>
                                    <span class="input-group-addon"> ~ </span>
                                    <select name="test" class="form-control">
                                        <option></option>
                                        <option value="1">00:00</option>
                                        <option value="1">00:30</option>
                                        <option value="1">01:00</option>
                                        <option value="1">01:30</option>
                                        <option value="1">02:00</option>
                                        <option value="1">02:30</option>
                                        <option value="1">03:00</option>
                                        <option value="1">03:30</option>
                                        <option value="1">04:00</option>
                                        <option value="1">04:30</option>
                                        <option value="1">05:00</option>
                                        <option value="1">05:30</option>
                                        <option value="1">06:00</option>
                                        <option value="1">06:30</option>
                                        <option value="1">07:00</option>
                                        <option value="1">07:30</option>
                                        <option value="1">08:00</option>
                                        <option value="1">08:30</option>
                                        <option value="1">09:00</option>
                                        <option value="1">09:30</option>
                                        <option value="1">10:00</option>
                                        <option value="1">10:30</option>
                                        <option value="1">11:00</option>
                                        <option value="1">11:30</option>
                                        <option value="1">12:00</option>
                                        <option value="2">12:30</option>
                                        <option value="3">13:00</option>
                                        <option value="4">13:30</option>
                                        <option value="5">14:00</option>
                                        <option value="5">14:30</option>
                                        <option value="5">15:00</option>
                                        <option value="5">15:30</option>
                                        <option value="5">16:00</option>
                                        <option value="5">16:30</option>
                                        <option value="5">17:00</option>
                                        <option value="5">17:30</option>
                                        <option value="5">18:00</option>
                                        <option value="5">18:30</option>
                                        <option value="5">19:00</option>
                                        <option value="5">19:30</option>
                                        <option value="5">20:00</option>
                                        <option value="5">20:30</option>
                                        <option value="5">21:00</option>
                                        <option value="5">21:30</option>
                                        <option value="5">22:00</option>
                                        <option value="5">22:30</option>
                                        <option value="5">23:00</option>
                                        <option value="5">23:30</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12 text-left">
                                        <div class="checkbox"> <label> <input type="checkbox" name="working_terms_status_1">時間を未定で勤務登録を行う</label> </div> 
                                        <div class="checkbox"> <label> <input type="checkbox" name="working_terms_status_2">時間非表示で勤務登録を行う </label> </div> 
                                        <div class="checkbox"> <label> <input type="checkbox" name="working_terms_status_3">終了時間非表示で勤務登録を </label> </div> 
                                    </div> 
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group"> 
                            <label for="field-2" class="col-sm-3 control-label">出勤メッセージ</label>
                            <div class="col-sm-8"> <input type="text" class="form-control" id="field-2" placeholder="プロフィール用/10文字目安"> </div>
                        </div>

                        <div class="col-md-3 mt-3">
                            <button type="button" class="btn btn-orange btn-icon-align">
                                <svg class="bi bi-plus-circle-fill"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
                                <span class="title ml-1">出勤登録</span>
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>

    <div class="tile-stats tile-primary frm-head"> 出勤者リスト</div>

    <div id="left-events" class="row dragula">

        <div class="col-md-2">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/thmb_1139.jpg') }}" /> 
                    </a> 
                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前1</a></h3>
                    <h4 class="text-center">12:00 ~ 未設定 </h4>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-success btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5 19h1.4l8.625-8.625l-1.4-1.4L5 17.6V19ZM19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Zm-3.525-.725l-.7-.7l1.4 1.4l-.7-.7Z"/></svg>
                            <span class="ml-1">編集</span>
                        </button>
                    </div>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-red btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            <span class="title ml-1">削除</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/thmb_1139.jpg') }}" /> 
                    </a> 
                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前2</a></h3>
                    <h4 class="text-center">20:00 ~ 02:00 </h4>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-success btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5 19h1.4l8.625-8.625l-1.4-1.4L5 17.6V19ZM19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Zm-3.525-.725l-.7-.7l1.4 1.4l-.7-.7Z"/></svg>
                            <span class="ml-1">編集</span>
                        </button>
                    </div>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-red btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            <span class="title ml-1">削除</span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/thmb_1139.jpg') }}" /> 
                    </a> 
                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前3</a></h3>
                    <h4 class="text-center">20:00 ~ 02:00 </h4>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-success btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5 19h1.4l8.625-8.625l-1.4-1.4L5 17.6V19ZM19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Zm-3.525-.725l-.7-.7l1.4 1.4l-.7-.7Z"/></svg>
                            <span class="ml-1">編集</span>
                        </button>
                    </div>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-red btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            <span class="title ml-1">削除</span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/thmb_1139.jpg') }}" /> 
                    </a> 
                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前4</a></h3>
                    <h4 class="text-center">20:00 ~ 02:00 </h4>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-success btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5 19h1.4l8.625-8.625l-1.4-1.4L5 17.6V19ZM19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Zm-3.525-.725l-.7-.7l1.4 1.4l-.7-.7Z"/></svg>
                            <span class="ml-1">編集</span>
                        </button>
                    </div>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-red btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            <span class="title ml-1">削除</span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/thmb_1139.jpg') }}" /> 
                    </a> 
                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前5</a></h3>
                    <h4 class="text-center">20:00 ~ 02:00 </h4>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-success btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5 19h1.4l8.625-8.625l-1.4-1.4L5 17.6V19ZM19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Zm-3.525-.725l-.7-.7l1.4 1.4l-.7-.7Z"/></svg>
                            <span class="ml-1">編集</span>
                        </button>
                    </div>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-red btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            <span class="title ml-1">削除</span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/thmb_1139.jpg') }}" /> 
                    </a> 
                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前6</a></h3>
                    <h4 class="text-center">20:00 ~ 02:00 </h4>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-success btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5 19h1.4l8.625-8.625l-1.4-1.4L5 17.6V19ZM19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Zm-3.525-.725l-.7-.7l1.4 1.4l-.7-.7Z"/></svg>
                            <span class="ml-1">編集</span>
                        </button>
                    </div>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-red btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            <span class="title ml-1">削除</span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/thmb_1139.jpg') }}" /> 
                    </a> 
                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前7</a></h3>
                    <h4 class="text-center">20:00 ~ 02:00 </h4>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-success btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5 19h1.4l8.625-8.625l-1.4-1.4L5 17.6V19ZM19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Zm-3.525-.725l-.7-.7l1.4 1.4l-.7-.7Z"/></svg>
                            <span class="ml-1">編集</span>
                        </button>
                    </div>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-red btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            <span class="title ml-1">削除</span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/thmb_1139.jpg') }}" /> 
                    </a> 
                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前8</a></h3>
                    <h4 class="text-center">20:00 ~ 02:00 </h4>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-success btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5 19h1.4l8.625-8.625l-1.4-1.4L5 17.6V19ZM19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Zm-3.525-.725l-.7-.7l1.4 1.4l-.7-.7Z"/></svg>
                            <span class="ml-1">編集</span>
                        </button>
                    </div>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-red btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            <span class="title ml-1">削除</span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/thmb_1139.jpg') }}" /> 
                    </a> 
                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前9</a></h3>
                    <h4 class="text-center">20:00 ~ 02:00 </h4>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-success btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5 19h1.4l8.625-8.625l-1.4-1.4L5 17.6V19ZM19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Zm-3.525-.725l-.7-.7l1.4 1.4l-.7-.7Z"/></svg>
                            <span class="ml-1">編集</span>
                        </button>
                    </div>

                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-red btn-icon-align-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            <span class="title ml-1">削除</span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>


    <script>
        $(document).ready(function(){
            var calendar = $('#calendar');
            calendar.fullCalendar({
                header: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                dayClick: function(day) {
                    $('.selected_date').val(day.format())

                    let jp_date = moment(String(day.format())).format('YYYY年M月D日')
                    let day_name = ['日','月','火','水','木','金','土'][moment(String(day.format())).format('d')]
                    $('.selected_date_text').html(jp_date+' ('+day_name+') の出勤登録')

                },
                buttonText: {
                    prevYear: '&laquo;',  // <<
                    nextYear: '&raquo;',  // >>
                    today:    '今日',
                    month:    '月',
                    week:     '週',
                    day:      '日'
                },
                monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                dayNames: ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],
                dayNamesShort: ['日', '月', '火', '水', '木', '金', '土'],
                selectable: true,
                selectHelper: true,
                editable: true,
                firstDay: 1,
                height: 500,
                eventAfterAllRender: function(event) {
                    var row, cell, date;
                    $('.fc-content-skeleton').each(function(i) {
                        row = $(this);
                        $('thead td', row).each(function(k) {
                            cell = $(this);
                            cmdate = cell.data('date');
                            
                            if ((moment(event.start).format('MM') != moment(cmdate).format('MM')) && (moment(event.end).format('MM') != moment(cmdate).format('MM'))) {
                                let count = randomIntFromInterval(1,50)
                                $('tbody td', row).eq(k).data('count', count);
                                $('tbody td', row).eq(k).html(count+'名出勤');
                            }   
                        });
                    });


                }
            });

            let jp_date = moment().format('YYYY年M月D日')
            let day_name = ['日','月','火','水','木','金','土'][moment().format('d')]
            $('.selected_date_text').html(jp_date+' ('+day_name+') の出勤登録')

            dragula([document.getElementById("left-events")])
            .on('drag', function (el) {
                el.className += ' el-drag-ex-2';
                el.className = el.className.replace('ex-moved', '');
            })
            .on('drop', function (el, target, source, sibling) {
                el.className = el.className.replace('el-drag-ex-2', '');
                el.className += ' ex-moved';
                setTimeout(() => {
                    // resetPosition()
                }, 200);
            })
            .on('over', function (el, container) {
                container.className += ' ex-over';
            })
            .on('out', function (el, container) {
                container.className = container.className.replace('ex-over', '');
            })
            .on('cancel', function (el) {
                el.className = el.className.replace('el-drag-ex-2', '');
            });
        })

        function randomIntFromInterval(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min)
        }
    </script>

@endsection