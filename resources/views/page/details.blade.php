	@extends('page.layout')

@section('content')
  
    {!!  $header->text_data1 !!}
    {!!  $header->text_data2 !!}
    {!!  $header->text_data3 !!}
     
    <article id="profile" class="inner">
        <h2 class="ttl"><span>{{ $companion->name }}</span><span>T{{ $companion->height }}&nbsp;B{{ $companion->bust }}({{ $companion->cup }})&nbsp;W{{ $companion->waist }}&nbsp;H{{ $companion->hip }}<br>{{ $companion->category->name }}</span></h2>
        <div class="contents">
            <div class="profile_image">
                <div class="large_image"><img src="{{ url('/storage/photos/') }}/{{ $companion->id }}/{{ $companion->home_image->photo }}" class="large" width="365" 
                height="505" alt="{{ $companion->name }}_{{ $companion->home_image->title }}"></div>
                <div class="thumb_image">
                    <ul>
                        @foreach($companion->all_images as $images )
                            <li><img src="{{ url('/storage/photos/') }}/{{ $companion->id }}/{{ $images->photo }}" class="thumb" width="365"
                                height="505" alt="{{ $companion->name }}_{{ $images->title }}"></li>
                        @endforeach
                        <li><a href="#" target="_blank"><img
                                    src="{{ url('/assets/images/prime.jpg') }}" width="365" height="505" alt="PRIME会員限定 マル秘写真公開"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </article>

    <div class="profile_contents_bottom">
        <div class="contents">
            <div class="contents_left">
                <article id="option" class="inner">
                    <h2 class="ttl"><span>モデルプロフィール</span></h2>
                    <h4 class="sale-point-text-details"><span>{{ $companion->sale_point }}</span></h4>
                    <ul>
                        <li><p>名前</p><p>{{ $companion->name }}</p></li>
                        <li><p>年齢</p><p>{{ $companion->age }}歳</p></li>
                        <li><p>スリーサイズ</p><p>H:{{ $companion->height }}cm B:{{ $companion->bust }}({{ $companion->cup }}) W:{{ $companion->waist }} H:{{ $companion->hip }}</p></li>
                        <li><p>前(現)職</p><p>{{ $companion->previous_position }}</p></li>
                        <li><p>似ている芸能人</p><p>{{ $companion->celebrities_who_look_alike }}</p></li>
                        <li><p>趣味</p><p>{{ $companion->hobby }}</p></li>
                    </ul>
                </article>
            </div>
            <div class="contents_right">
                <article id="option" class="inner">
                    <h2 class="ttl"><span>料金システム</span></h2>
                    <ul>
                        @foreach($companion->category->prices as $price)
                            <li><p>{{ $price->time_interval }}</p><p>{{ $price->start_price }} {{ !empty($price->end_price) ? " ~ ".($price->end_price) : '' }}</p></li>
                        @endforeach
                    </ul>
                </article>
            </div>
        </div>
    </div>

    <article id="comment" class="inner">
        <h2 class="ttl"><span>コンシェルジュからのコメント</span></h2>
        <div class="contents">
            {!! $companion->message !!}
        </div>
    </article>

    <article id="schedule" class="inner">
        <h2 class="ttl"><span>週間スケジュール</span></h2>
        <div class="contents">
            <div class="schedule">
                <ul>
                    @foreach($schedule_dates as $dkey => $schedule_date)
                            <li>
                                <p>{{ $schedule_date }}</p>
                                @if(count($companion->attendances) > 0)
                                    @foreach($companion->attendances as $attendance)
                                        @if($attendance->date == $dkey)
                                            @if(!empty($attendance->end_time))
                                                <p>{{ $attendance->start_time }} ~ {{ $attendance->end_time }}</p>
                                            @else
                                                <p>{{ $attendance->start_time }} ~ 終了時間未定</p>
                                            @endif
                                        @else
                                            <p> ― </p>
                                        @endif
                                    @endforeach
                                @else
                                    <p> ― </p>
                                @endif
                            </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </article>
    
    <div class="profile_contents_top">
        <div class="contents">
            <article id="movie" class="inner">
                <h2 class="ttl"><span>動画</span></h2>
                <div class="prime_txt">
                    <p class="btn mincho">
                        <a href="{{ route('page.movie') }}" target="_blank">新規会員登録の方はこちらから</a>
                    </p>
                </div>
            </article>
            <article id="gravure" class="inner">
                <h2 class="ttl"><span>オンライン予約</span></h2>
                <div class="prime_txt">
                    <p class="btn mincho">
                        <a href="{{ route('user.terms') }}" target="_blank">オンライン予約はコチラから</a>
                    </p>
                </div>
            </article>
        </div>
    </div>

    <div class="profile_contents_top mb-3">
        <div class="contents request_text">
            <p class="line_bnr">
                <a href="https://line.me/ti/p/1-RAi6Iy76" target="_blank">
                    <img src="https://club-firenze.net/theme/default/images/prof_request.jpg" alt="Click here for requests to women outside the office" widh="100%">
                </a>
                <br>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">* Requests can be made even outside of work. </font>
                    <font style="vertical-align: inherit;">Please tell us the name of the woman you want, the time and place of use.</font>
                </font>
            </p>
        </div>
    </div>

    <nav id="breadcrumbs">
        <ul class="contents" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.index') }}"><span itemprop="name">渋谷デリヘル</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.main') }}"><span itemprop="name">トップ</span></a>
                <meta itemprop="position" content="2" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.enrollment_table') }}"><span itemprop="name">在籍表</span></a>
                <meta itemprop="position" content="3" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span
                    itemprop="name">{{ $companion->name }}</span>
                <meta itemprop="position" content="4" />
            </li>
        </ul>
    </nav>
    
@endsection

