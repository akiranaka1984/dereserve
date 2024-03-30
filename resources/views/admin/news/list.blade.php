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

    <!-- <div class="col-md-12">
        <div class="alert alert-success p-5px sidemenu-href">
            <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M.41 13.41L6 19l1.41-1.42L1.83 12m20.41-6.42L11.66 16.17L7.5 12l-1.43 1.41L11.66 19l12-12M18 7l-1.41-1.42l-6.35 6.35l1.42 1.41L18 7Z"/></svg></strong>
            <span class="title ml-1">ニュースを削除しました。</span>
        </div>
    </div> -->

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
                                <div class="checkbox"> <label> <input type="checkbox" class="show_hidden_checkbox" {{ ($is_hidden == 1) ? 'checked': '' }} >非表示ニュースを含めて表示する</label> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-success sidemenu-href search_btn">
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
                <th>編集/削除機能</th>
                <th>コンテンツ</th>
                <th>登録日</th>
            </tr>
        </thead>
        <tbody id="left-events" class="dragula">
            @foreach($newsLists as $news)
                <tr class="item_div" data-id="{{ $news->id }}">
                    <td style="display: flex; justify-content: center; gap: 2px;">
                        <button type="button" class="btn btn-danger btn-sm sidemenu-href delete_btn" data-id="{{ $news->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                        </button>
                        <button type="button" class="btn btn-orange btn-icon-align" data-id="{{ $news->id }}" onclick="openEditModal({{ $news }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83a.996.996 0 0 0 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"></path></svg>
                        </button>
                    </td>
                    <td>{!! $news->title !!}</td>
                    <td>{{ $news->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="col-md-2">
    <button type="button" class="btn btn-orange btn-icon-align save_all_position">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 3C7.58 3 4 4.79 4 7s3.58 4 8 4s8-1.79 8-4s-3.58-4-8-4M4 9v3c0 2.21 3.58 4 8 4s8-1.79 8-4V9c0 2.21-3.58 4-8 4s-8-1.79-8-4m0 5v3c0 2.21 3.58 4 8 4s8-1.79 8-4v-3c0 2.21-3.58 4-8 4s-8-1.79-8-4Z"></path></svg>
        <span class="title ml-1">並び順を確定する</span>
    </button>
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
                        <form role="form" method="post" action="{{ route('admin.news.save') }}" class="form-horizontal form-groups-bordered" id="frmNews" >
                            @csrf
                            <input type="hidden" name="id" value="" id="news_id">
                            <div class="form-group">
                                <label for="frmTitle" class="col-sm-2 control-label">タイトル</label>
                                <div class="col-sm-10 frm-inpt">
                                    <input type="text" name="frm_title" class="form-control" id="frmTitle" placeholder="タイトルを入力してください。">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="frmText" class="col-sm-2 control-label">本文</label>
                                <div class="col-sm-10 frm-inpt">
                                    <textarea name="frm_text" class="form-control" id="frmText" rows="20"></textarea>
                                </div>
                            </div>

                            <div class="col-md-3 mt-3">
                                <button type="submit" class="btn btn-orange btn-icon-align">
                                    <span class="title ml-1">新規ニュース登録</span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let nPsitionObj = {}
    $(document).ready(function(){

        CKEDITOR.replace('frmText');

        $(document).on('click','.showSendEmailModal', function(){
            $('#news_id').val()
            $('#frmTitle').val()
            CKEDITOR.instances.frmText.setData();
            $('#modal-1').modal('show');
        })

        dragula([document.getElementById("left-events")])
            .on('drag', function (el) {
                el.className += ' el-drag-ex-2';
                el.className = el.className.replace('ex-moved', '');
            })
            .on('drop', function (el, target, source, sibling) {
                el.className = el.className.replace('el-drag-ex-2', '');
                el.className += ' ex-moved';
                setTimeout(() => {
                    resetPosition()
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

        $('#frmNews').validate({
            ignore: [],
            debug: false,
            rules: {
                frm_title: { required: true },
                companion_id: { required: true },
                frm_text: {
                    required: function(){
                        CKEDITOR.instances.frmText.updateElement();
                    }
                },
            },
            messages: {
                frm_title: { required: "{{ __('This field is required') }}" },
                companion_id: { required: "{{ __('This field is required') }}" },
                frm_text: { required: "{{ __('This field is required') }}" },
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

        $(document).on('click','.save_all_position', function(){
            $.ajax({
                type: 'POST',
                url: `{{ route('admin.news.position.save') }}`,
                headers: {"Content-Type": "application/json"},
                data: JSON.stringify({
                    "_token": "{{ csrf_token() }}",
                    data: nPsitionObj
                }),
                success: function (response) {
                    simpleMessage('success',`{{__('Save Changes')}}`);
                }
            })
        })

        $(document).on('click','.delete_btn', function(){
            let id = $(this).attr('data-id')
            window.location.href = `{{ route('admin.news.delete') }}?id=`+id;
        })

        $(document).on('click','.search_btn', function(){
            let show_hidden_checkbox = $('.show_hidden_checkbox').prop('checked')
            if(show_hidden_checkbox === true){
                window.location.href = `{{ route('admin.news.list') }}?is_hidden=`+1;
            }else{
                window.location.href = `{{ route('admin.news.list') }}`;
            }
        })

        resetPosition()

    })
    function openEditModal(data) {
        $('#news_id').val(data['id'])
        $('#frmTitle').val(data['title'])
        CKEDITOR.instances.frmText.setData(data['text']);
        $('#modal-1').modal('show');
    }

    function resetPosition()
    {
        nPsitionObj = {};
        $('.item_div').each(function(index, rtag){
            let id = $(this).attr('data-id');
            nPsitionObj[id] = index + 1;
        })
    }

 </script>


@endsection
