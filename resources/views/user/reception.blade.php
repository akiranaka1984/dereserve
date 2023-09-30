@extends('user.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"></path></svg>
    WEB予約受付情報一覧</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> WEB予約一覧</div>
    
<div class="col-md-12"> 
    <table class="table table-bordered"> 
        <thead> 
            <tr> 
                <th class="w-10">削除</th> 
                <th class="w-35">名前</th> 
                <th class="w-35">電話番号</th> 
                <th>編集</th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach($webReservations as $reservations)
                @if($reservations->compatible == 0)
                    <tr style=""> 
                @else
                    <tr style="background: lightyellow;"> 
                @endif
                    <td>
                        <button type="button" class="btn btn-danger btn-sm sidemenu-href delete_btn" data-id="{{ $reservations->id }}" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                        </button>
                    </td> 
                    <td>{{ $reservations->name }}</td>
                    <td>{{ $reservations->tel }}</td>
                    <td class="dl-flex"> 
                        <button type="button" class="btn btn-success btn-icon-align openModelDetails" data-id="{{ $reservations->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><path fill="currentColor" d="M247.31 124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57 61.26 162.88 48 128 48S61.43 61.26 36.34 86.35C17.51 105.18 9 124 8.69 124.76a8 8 0 0 0 0 6.5c.35.79 8.82 19.57 27.65 38.4C61.43 194.74 93.12 208 128 208s66.57-13.26 91.66-38.34c18.83-18.83 27.3-37.61 27.65-38.4a8 8 0 0 0 0-6.5ZM128 192c-30.78 0-57.67-11.19-79.93-33.25A133.47 133.47 0 0 1 25 128a133.33 133.33 0 0 1 23.07-30.75C70.33 75.19 97.22 64 128 64s57.67 11.19 79.93 33.25A133.46 133.46 0 0 1 231.05 128c-7.21 13.46-38.62 64-103.05 64Zm0-112a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48Zm0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32Z"/></svg>
                            <span class="title ml-1">詳細</span>
                        </button>
                    </td>
                </tr> 
            @endforeach
        </tbody> 
    </table> 
</div>



<div class="modal fade" id="modal-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <div class="panel panel-primary" >
                    <div class="panel-body">
                        
                        <div class="col-md-12"> 
                            <table class="table"> 
                                <tbody> 

                                    <tr> 
                                        <td class="w-30">名前</td>
                                        <td class="modal_name"></td>
                                    </tr> 

                                    <tr> 
                                        <td class="w-30">メールアドレス</td>
                                        <td class="modal_email"></td>
                                    </tr> 

                                    <tr> 
                                        <td class="w-30">TEL</td>
                                        <td class="modal_tel"></td>
                                    </tr>

                                    <tr> 
                                        <td class="w-30">具体的な内容</td>
                                        <td class="modal_content"></td>
                                    </tr>

                                    <tr> 
                                        <td class="w-30">予約日</td>
                                        <td class="modal_reservation_date"></td>
                                    </tr>
                    
                                    <tr> 
                                        <td class="w-30">予約日</td>
                                        <td class="modal_last_update_date"></td>
                                    </tr>

                                    <tr> 
                                        <td class="w-30">対応属性</td>
                                        <td class="modal_corresponding_attribute"></td>
                                    </tr>

                                </tbody> 
                            </table> 
                        </div>
   
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<script>
    let is_hidden = {{ $is_hidden }}
    $(document).ready(function(){
        $(document).on('click','.openModelDetails', function(){
            let id = $(this).attr('data-id')
            $.ajax({
                type: 'POST',
                url: `{{ route('user.reception.list.id') }}`,
                headers: {"Content-Type": "application/json"},
                data: JSON.stringify({
                    "_token": "{{ csrf_token() }}",
                    id: id
                }),
                success: function (response) {
                    $('.modal_name').html(response.name)
                    $('.modal_email').html(response.mail)
                    $('.modal_tel').html(response.tel)
                    let content = `<i class="entypo-right-bold"></i>LINE ID<br>`+ response.lineid +`
                        <p>---------------------------------</p>
                        <i class="entypo-right-bold"></i>ご希望の女性(第1 候補)<br>`+ response.lady1 +`
                        <p>---------------------------------</p>
                        <i class="entypo-right-bold"></i> ご希望の女性(第2候補)<br>`+ response.lady2 +`
                        <p>---------------------------------</p>
                        <i class="entypo-right-bold"></i>ご希望の女性(第3候補)<br>`+ response.lady3 +`
                        <p>---------------------------------</p>
                        <i class="entypo-right-bold"></i> 希望ご予約日(第1 候補)<br>
                        `+ response.month1 +`月`+ response.day1 +` 日`+ response.hour1 +`時`+ response.minut1 +`分
                        <p>---------------------------------</p>
                        <i class="entypo-right-bold"></i> 希望ご予約日(第2候補)<br>
                        `+ response.month2 +`月`+ response.day2 +` 日`+ response.hour2 +`時`+ response.minut2 +`分
                        <p>---------------------------------</p>
                        <i class="entypo-right-bold"></i>希望ご予約日(第3候補)<br>
                        `+ response.month3 +`月`+ response.day3 +` 日`+ response.hour3 +`時`+ response.minut3 +`分
                        <p>---------------------------------</p>
                        <i class="entypo-right-bold"></i>ご希望コース<br>
                        `+ response.cource +`
                        <p>---------------------------------</p>
                        <i class="entypo-right-bold"></i>ご利用場所<br>
                        `+ response.place +`
                        <p>---------------------------------</p>
                        <i class="entypo-right-bold"></i>お支払い方法&gt;<br>
                        `+ response.pay +`
                        <p>---------------------------------</p>
                        <i class="entypo-right-bold"></i> ご希望連絡方法<br>
                        `+ response.contact +`
                        <p>---------------------------------</p>
                        その他<br>`+ response.cmnt + ``

                    $('.modal_content').html(content)

                    $('.modal_reservation_date').html(moment(String(response.created_at)).format('YYYY年MM月DD日 HH:mm'))
                    $('.modal_last_update_date').html(moment(String(response.updated_at)).format('YYYY年MM月DD日 HH:mm'))
                    if(response.status == 0){
                        $('.modal_corresponding_attribute').html('未対応')
                    }else if(response.status == 1){
                        $('.modal_corresponding_attribute').html('対応中')
                    }else if(response.status == 2){
                        $('.modal_corresponding_attribute').html('対応済')
                    }
                   

                    $('#modal-1').modal('show');
                }
            })
        })

    })
 </script>       


@endsection