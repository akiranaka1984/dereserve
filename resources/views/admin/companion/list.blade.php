@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"></path></svg>
        コンパニオン一覧</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> 検索</div>

    <div class="panel panel-primary" data-collapsed="0">
        <div class="row p-1">
            <div class="col-md-4">
                <div class="form-group"> 
                    <label for="txtSearchId" class="col-sm-3 control-label text-right mt-5px">検索 : </label>
                    <div class="col-sm-8"> <input type="text" class="form-control" id="txtSearchId" placeholder=""> </div>
                </div>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-2">
                <button type="button" class="btn btn-orange">並び順を確定する</button>
            </div>
        </div>
    </div>

    <div class="tile-stats tile-primary frm-head"> コンパニオン一覧</div>

    <div class="row">

        <div class="col-md-3">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/topi_1139.jpg') }}" /> 
                    </a> 
                    <h2 class="text-center">RED DIAMOND</h2>

                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前</a></h3>
                    <h4 class="text-center">ひらがな </h4>

                    <div class="text-center">
                        <select class="form-control w-50 d-inline-block">
                            <option value="表示">表示</option>
                            <option value="非公開">非公開</option>
                            <option value="削除">削除</option>
                        </select>
                    </div>
                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-primary ">修正</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/topi_1139.jpg') }}" /> 
                    </a> 
                    <h2 class="text-center">DIAMOND</h2>

                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前</a></h3>
                    <h4 class="text-center">ひらがな </h4>

                    <div class="text-center">
                        <select class="form-control w-50 d-inline-block">
                            <option value="表示">表示</option>
                            <option value="非公開">非公開</option>
                            <option value="削除">削除</option>
                        </select>
                    </div>
                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-primary ">修正</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/topi_1139.jpg') }}" /> 
                    </a> 
                    <h2 class="text-center">DIAMOND</h2>

                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前</a></h3>
                    <h4 class="text-center">ひらがな </h4>

                    <div class="text-center">
                        <select class="form-control w-50 d-inline-block">
                            <option value="表示">表示</option>
                            <option value="非公開">非公開</option>
                            <option value="削除">削除</option>
                        </select>
                    </div>
                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-primary ">修正</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/topi_1139.jpg') }}" /> 
                    </a> 
                    <h2 class="text-center">DIAMOND</h2>

                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前</a></h3>
                    <h4 class="text-center">ひらがな </h4>

                    <div class="text-center">
                        <select class="form-control w-50 d-inline-block">
                            <option value="表示">表示</option>
                            <option value="非公開">非公開</option>
                            <option value="削除">削除</option>
                        </select>
                    </div>
                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-primary ">修正</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/topi_1139.jpg') }}" /> 
                    </a> 
                    <h2 class="text-center">DIAMOND</h2>

                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前</a></h3>
                    <h4 class="text-center">ひらがな </h4>

                    <div class="text-center">
                        <select class="form-control w-50 d-inline-block">
                            <option value="表示">表示</option>
                            <option value="非公開">非公開</option>
                            <option value="削除">削除</option>
                        </select>
                    </div>
                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-primary ">修正</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/topi_1139.jpg') }}" /> 
                    </a> 
                    <h2 class="text-center">DIAMOND</h2>

                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前</a></h3>
                    <h4 class="text-center">ひらがな </h4>

                    <div class="text-center">
                        <select class="form-control w-50 d-inline-block">
                            <option value="表示">表示</option>
                            <option value="非公開">非公開</option>
                            <option value="削除">削除</option>
                        </select>
                    </div>
                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-primary ">修正</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/topi_1139.jpg') }}" /> 
                    </a> 
                    <h2 class="text-center">DIAMOND</h2>

                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前</a></h3>
                    <h4 class="text-center">ひらがな </h4>

                    <div class="text-center">
                        <select class="form-control w-50 d-inline-block">
                            <option value="表示">表示</option>
                            <option value="非公開">非公開</option>
                            <option value="削除">削除</option>
                        </select>
                    </div>
                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-primary ">修正</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/topi_1139.jpg') }}" /> 
                    </a> 
                    <h2 class="text-center">DIAMOND</h2>

                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前</a></h3>
                    <h4 class="text-center">ひらがな </h4>

                    <div class="text-center">
                        <select class="form-control w-50 d-inline-block">
                            <option value="表示">表示</option>
                            <option value="非公開">非公開</option>
                            <option value="削除">削除</option>
                        </select>
                    </div>
                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-primary ">修正</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-primary" >
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit') }}"> 
                        <img src="{{ url('/storage/photos/1139/topi_1139.jpg') }}" /> 
                    </a> 
                    <h2 class="text-center">DIAMOND</h2>

                    <h3 class="text-center"><a href="{{ route('admin.companion.edit') }}" class="text-info">名前</a></h3>
                    <h4 class="text-center">ひらがな </h4>

                    <div class="text-center">
                        <select class="form-control w-50 d-inline-block">
                            <option value="表示">表示</option>
                            <option value="非公開">非公開</option>
                            <option value="削除">削除</option>
                        </select>
                    </div>
                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-primary ">修正</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


@endsection