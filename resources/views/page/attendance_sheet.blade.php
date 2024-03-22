@extends('page.layout')

@section('content')

    {!! $attendance_sheet->text_data1 !!}
    <section class="schedule" id="schedule">
        <div class="wrapper">
            <div class="breadcrumbs">
                <div class="breadcrumb_inner">
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="クラブフィレンツェへ移動する" href="{{ route('page.index') }}"
                            class="home">
                            <span property="name">HOME</span>
                        </a>
                        <meta property="position" content="1">
                    </span>
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                    <span property="itemListElement" typeof="ListItem">
                        <span property="name" class="post post-page current-item">本日の出勤情報</span>
                        <meta property="url" content="{{ route('page.attendance_sheet') }}">
                        <meta property="position" content="2">
                    </span>
                </div>
            </div>
            <div class="ex_wrap">
                <h3 class="ex_headline">出勤情報</h3>
                <p class="ex_txt">当店在籍モデルの出勤状況は以下よりご確認ください。 </p>
            </div>
            <div class="articlePanel mgt_30">
                <style>
                </style>
                <div id="am-block-schedule" class="">
                    <ul class="am-header">
                        @foreach ($schedule_dates as $key => $dates)
                            @if($key == $req_date)
                                <li class="am-header-item active"><a href="{{ route('page.attendance_sheet', ['date' => $key]) }}">{{ $dates }}</a></li>
                            @else
                                <li class="am-header-item"><a href="{{ route('page.attendance_sheet', ['date' => $key]) }}">{{ $dates }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul class="article-wrap slider grid opc_open muuri">
                        @foreach($today_attendances as $attendance)
                            @php
                                if(!empty($attendance->companion) && !empty($attendance->companion->home_image->photo)){
                                    $imgPath = '/storage/photos/'.($attendance->companion->id).'/'.($attendance->companion->home_image->photo);
                                }else{
                                    $imgPath = '/storage/photos/default/not-to-be-published.jpg';
                                }
                            @endphp
                            <li class="article item muuri-item muuri-item-shown">
                                <a href="{{ route('page.details', ['id'=>$attendance->companion->id]) }}" class="model_link">
                                    <div class="box fadeUpTrigger3 fadeUp">
                                        <span class="new_label">NEW</span>
                                        <span class="rank_label">
                                            @if($attendance->companion->category->name == "BLACK")
                                                <img src="{{ url('assets/images/black_label.png') }}" alt="{{ $attendance->companion->category->name }}">
                                            @elseif($attendance->companion->category->name == "PLATINUM")
                                                <img src="{{ url('assets/images/platinum_label.png') }}" alt="{{ $attendance->companion->category->name }}">
                                            @elseif($attendance->companion->category->name == "DIAMOND")
                                                <img src="{{ url('assets/images/diamond_label.png') }}" alt="{{ $attendance->companion->category->name }}">
                                            @elseif($attendance->companion->category->name == "RED DIAMOND")
                                                <img src="{{ url('assets/images/reddiamond_label.png') }}" alt="{{ $attendance->companion->category->name }}">
                                            @endif
                                        </span>
                                        <img src="{{ $imgPath }}" alt="{{ $attendance->companion->name }}" class="photo">
                                        <div class="prof_box">
                                            <p class="intro">{{ $attendance->companion->sale_point }}</p>
                                            <div class="prof">
                                                <div class="name_wrap">
                                                    <p class="name">{{ $attendance->companion->name }}</p>
                                                    <span class="age">{{ $attendance->companion->age }}</span>歳
                                                </div>
                                                <div class="size">
                                                    <span class="tall">T:{{ $attendance->companion->height }}</span>
                                                    <span class="bast">B:{{ $attendance->companion->bust }}({{ $attendance->companion->cup }})</span>
                                                    <span class="west">W:{{ $attendance->companion->waist }}</span>
                                                    <span class="hip">H:{{ $attendance->companion->hip }}</span>
                                                </div>
                                            </div>
                                            <div class="schedule">
                                                @if(!empty($attendance->start_time))
                                                    <p>出勤：{{ $attendance->start_time }}～{{ $attendance->end_time }}</p>
                                                @else
                                                    <p>出勤：00:00～</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button class="more_btn fadeUpTrigger2" id="more_btn">
                <a href="{{ route('page.enrollment_table') }}">在籍女性をもっと見る</a>
            </button>
        </div>
    </section>
@endsection
