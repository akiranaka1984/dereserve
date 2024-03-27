@extends('page.layout')

@section('content')

    {!! $main->text_data1 !!}

    <section class="campaign" id="campaign">
        <div class="headline color_white fadeUpTrigger2 opacity_flg">
            <h3 class="">CAMPAIGN</h3>
            <span class="sub">キャンペーン</span>
            <p class="">クラブフィレンツェではお得なキャンペーンを実施中。詳細は下記よりご確認ください。</p>
        </div>
        {!! $campaign->text_data1 !!}
        {!! $campaign->text_data2 !!}
        {!! $campaign->text_data3 !!}
    </section>


    <section id="newface" class="newface">
        <div class="wrapper">
            <div class="headline color_white fadeUpTrigger2 opacity_flg smooth">
                <h3>NEW FACE</h3>
                <span class="sub">新人モデル</span>
                <p>当クラブには選りすぐりの美女たちが<br>
                    毎日入店しています。</p>
            </div>
            <div class="articlePanel">
                <div id="companians-slide" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($new_companions as $new_companion)
                                @php
                                    if(!empty($new_companion->home_image)){
                                        $imgPath = '/storage/photos/'.($new_companion->id).'/'.($new_companion->home_image->photo);
                                    }else{
                                        $imgPath = '/storage/photos/default/not-to-be-published.jpg';
                                    }
                                @endphp
                                <li class="article splide__slide">
                                    <a href="{{ route('page.details', ['id'=>$new_companion->id]) }}" class="model_link">
                                        <div class="box">
                                            <span class="new_label">NEW</span>
                                            <span class="rank_label">
                                                @if($new_companion->category->name == "BLACK")
                                                    <img src="{{ url('assets/images/black_label.png') }}" alt="{{ $new_companion->category->name }}">
                                                @elseif($new_companion->category->name == "PLATINUM")
                                                    <img src="{{ url('assets/images/platinum_label.png') }}" alt="{{ $new_companion->category->name }}">
                                                @elseif($new_companion->category->name == "DIAMOND")
                                                    <img src="{{ url('assets/images/diamond_label.png') }}" alt="{{ $new_companion->category->name }}">
                                                @elseif($new_companion->category->name == "RED DIAMOND")
                                                    <img src="{{ url('assets/images/reddiamond_label.png') }}" alt="{{ $new_companion->category->name }}">
                                                @endif
                                            </span>
                                            <img src="{{ $imgPath }}" alt="{{ $new_companion->name }}({{ $new_companion->age }})" class="photo">
                                            <div class="prof_box">
                                                <div class="prof">
                                                    <p class="intro">{{ $new_companion->sale_point }}</p>
                                                    <div class="name_wrap">
                                                        <p class="name">{{ $new_companion->name }}</p>
                                                        <span class="age">{{ $new_companion->age }}</span>歳
                                                    </div>
                                                    <div class="size"> T:<span class="tall">{{ $new_companion->height }}</span> <span
                                                            class="bast">B:{{ $new_companion->bust }}({{ $new_companion->cup }})</span> <span
                                                            class="west">W:{{ $new_companion->waist }}</span> <span
                                                            class="hip">H:{{ $new_companion->hip }}</span> </div>
                                                </div>
                                                <div class="schedule">
                                                    @if(!empty($new_companion->today_attendances))
                                                        @if(!empty($new_companion->today_attendances->end_time))
                                                            <p>出勤：{{ $new_companion->today_attendances->start_time }}～{{ $new_companion->today_attendances->end_time }}</p>
                                                        @else
                                                            <p>出勤：{{ $new_companion->today_attendances->start_time }}～終了時間未定</p>
                                                        @endif
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
            </div>
        </div>
    </section>
    <section id="todays_schedule" class="todays_schedule">
        <div class="wrapper">
            <div class="headline color_white fadeUpTrigger2 opacity_flg">
                <h3 class="txt_09em">TODAY'S SCHEDULE</h3>
                <span class="sub">本日の出勤スケジュール</span>
                <p>本日対応可能な女性をご紹介いたします。</p>
            </div>
            <div class="articlePanel mgt_30">
                <ul id="" class="article-wrap slider grid fadeUpTrigger3 muuri fadeUp" style="height: 4249px;">

                    @foreach($today_attendances as $attendance)
                        @if ($attendance->companion->status == 1)
                            @php
                                if(!empty($attendance->companion) && !empty($attendance->companion->home_image)){
                                    $imgPath = '/storage/photos/'.($attendance->companion->id).'/'.($attendance->companion->home_image->photo);
                                }else{
                                    $imgPath = '/storage/photos/default/not-to-be-published.jpg';
                                }
                            @endphp
                            <li class="article item muuri-item muuri-item-shown">
                                <a href="{{ route('page.details', ['id'=>$attendance->companion_id]) }}" class="model_link" style="opacity: 1; transform: scale(1);">
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
                                            <div class="prof">
                                                <p class="intro">{{ $attendance->companion->sale_point }}</p>
                                                <div class="name_wrap">
                                                    <p class="name"></p>{{ $attendance->companion->name }}</p>
                                                    <span class="age">{{ $attendance->companion->age }}</span>歳
                                                </div>
                                                <div class="size"> T:<span class="tall">{{ $attendance->companion->height }}</span> <span
                                                        class="bast">B:{{ $attendance->companion->bust }}({{ $attendance->companion->cup }})</span> <span class="west">W:{{ $attendance->companion->waist }}</span>
                                                    <span class="hip">H:{{ $attendance->companion->hip }}</span>
                                                </div>
                                            </div>
                                            <div class="schedule">
                                                @if(!empty($attendance->start_time))
                                                    @if(!empty($attendance->end_time))
                                                        <p>出勤：{{ $attendance->start_time }}～{{ $attendance->end_time }}</p>
                                                    @else
                                                        <p>出勤：{{ $attendance->start_time }}～終了時間未定</p>
                                                    @endif
                                                @else
                                                    <p>出勤：00:00～</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <button class="more_btn fadeUpTrigger2" id="more_btn">
                <a href="{{ route('page.enrollment_table') }}">在籍女性をもっと見る</a>
            </button>
        </div>
    </section>
    <section id="news" class="news">
        <div class="wrapper">
            <div class="headline">
                <h3 class="">INFORMATION</h3>
                <span class="sub">お知らせ</span>
                <p>当店からのお知らせはこちらからご確認ください。</p>
            </div>
            <div class="news_wrap">
                <div class="news_box">
                    <ul class="news_list">
                        @foreach ($recent_news as $news)
                            <li id="{{ $news->id }}" class="news type-post status-publish format-standard hentry category-news">
                                <div class="date-area">
                                    <time datetime="{{ date('Y/m/d', strtotime($news->created_at)) }}">{{ date('Y/m/d', strtotime($news->created_at)) }}</time>
                                    <ul class="post-categories">
                                        <li><a href="" rel="category tag">NEWS</a></li>
                                    </ul>
                                </div>
                                <p><a class="news-link" href="{{ route('page.news.details', [$news->slug]) }}">{{ $news->title }}</a></p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button class="more_btn_news">
                <a href="{{ route('page.news') }}">VIEW ALL</a>
            </button>
        </div>
    </section>
    {!! $main->text_data2 !!}
    <section id="contact" class="contact">
        <div class="wrapper">
            <div class="headline color_white txt_shadow">
                <h3 class="">CONTACT US</h3>
                <span class="sub">お問い合わせ</span>
                <p>当店サービスに関するご質問・ご相談は<br>
                    お気軽にお問い合わせフォームよりお願いいたします。</p>
            </div>
            <button class="btn_contact">
                <a href="{{ route('page.contact') }}">CONTACT FORM</a>
            </button>
        </div>
    </section>
    {!! $main->text_data3 !!}
    <section id="mailmagazine" class="mailmagazine">
        <div class="wrapper">
            <div class="headline">
                <h3 class="">MAIL MAGAZINE</h3>
                <span class="sub">メルマガ登録</span>
                <p>メルマガ会員の皆様には、お得なキャンペーン情報、新人モデル登録情報等をリアルタイムでお届け致します。<br>
                    お客様の大切なメールアドレスが他に漏洩する事は一切ございませんので、ご安心下さい。</p>
            </div>
            <div class="mailForm">
                <form action="{{ route('page.magazine.save') }}" method="POST">
                    @csrf

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <input type="text" name="name" placeholder="abcde" class="mail" required>
                    <input type="email" name="email" placeholder="abcde@gmail.com" class="mail" required>
                    <div class="div">
                        <input type="submit" class="button" name="castsyukkinmail_add" value="登録"/>
                        <input type="submit" class="button" name="castsyukkinmail_del" value="解除"/>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ url('/assets/js/top.js') }}?v=1.4"></script>
@endsection
