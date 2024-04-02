@extends('page.layout')

@section('content')

    <section class="model_info">
        <div class="wrapper">
            <div class="breadcrumbs color_bk">
                <div class="breadcrumb_inner color_bk">
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="クラブフィレンツェへ移動する" href="{{ route('page.index') }}" class="home">
                            <span property="name">HOME</span>
                        </a>
                        <meta property="position" content="1">
                    </span>
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="モデルへ移動する" href="{{ route('page.enrollment_table') }}" class="archive post-model-archive">
                            <span property="name">モデル</span>
                        </a>
                        <meta property="position" content="2">
                    </span>
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                    <span property="itemListElement" typeof="ListItem">
                        <span property="name">{{ $companion->category->name }}</span>
                        <meta property="position" content="3">
                    </span>
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                    <span property="itemListElement" typeof="ListItem">
                        <span property="name" class="post post-model current-item">{{ $companion->name }}</span>
                        <meta property="url" content="{{ route('page.details', ['id'=>$companion->id]) }}">
                        <meta property="position" content="4">
                    </span>
                </div>
            </div>

            <div class="profiles">
                <h2 class="main_ttl">PROFILE</h2>
                <div class="prof_photo">
                    <div id="detail-slider" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    @if(!empty($companion->home_image->photo))
                                        <img src="{{ url('/storage/photos/') }}/{{ $companion->id }}/{{ $companion->home_image->photo }}" alt="{{ $companion->name }}_{{ $companion->home_image->title }}">
                                    @else
                                        <img src="/storage/photos/default/not-to-be-published.jpg" alt="{{ $companion->name }}_{{ $companion->age }}">
                                    @endif
                                    <div class="prof_box">
                                        <div class="prof">
                                            <div class="name_wrap">
                                                <p class="name">{{ $companion->name }}</p>
                                                <span class="age">{{ $companion->age }}歳</span>
                                            </div>
                                            <div class="size">
                                                <span class="tall">T:{{ $companion->height }}</span>
                                                <span class="bast">B:{{ $companion->bust }}({{ $companion->cup }})</span>
                                                <span class="west">W:{{ $companion->waist }}</span>
                                                <span class="hip">H:{{ $companion->hip }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                @foreach($companion->all_images as $images )
                                    <li class="splide__slide">
                                        <img src="{{ url('/storage/photos/') }}/{{ $companion->id }}/{{ $images->photo }}" alt="{{ $companion->name }}_{{ $images->title }}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="prof_ex">
                    <h4 class="prof_head">プロフィール詳細</h4>
                    <div class="detail">
                        <div class="row">
                            <p class="ttl">名前</p>
                            <p class="name">{{ $companion->name }}</p>
                        </div>
                        <div class="row">
                            <p class="ttl">年齢</p>
                            <p class="age">{{ $companion->age }}歳</p>
                        </div>
                        <div class="row">
                            <p class="ttl">身長</p>
                            <p class="tall">{{ $companion->height }}cm</p>
                        </div>
                        <div class="row">
                            <p class="ttl">スリーサイズ</p>
                            <p class="size">B:{{ $companion->bust }}({{ $companion->cup }}) W:{{ $companion->waist }} H:{{ $companion->hip }}</p>
                        </div>
                    </div>
                    <h4 class="prof_head">前(現)職</h4>
                    <p class="base">{{ $companion->previous_position }}</p>
                    <h4 class="prof_head">似ている芸能人</h4>
                    <p class="base">{{ $companion->celebrities_who_look_alike }}</p>
                    <h4 class="prof_head">趣味</h4>
                    <p class="base">{{ $companion->hobby }}</p>

                    <h4 class="prof_head">オススメポイント</h4>
                    <div class="feature">
                        @if (!empty($companion->rookie))
                            @foreach (explode(",", $companion->rookie) as $item)
                                <span>{{ $item }}</span>
                            @endforeach
                        @endif
                    </div>

                    <h4 class="prof_head">コンシェルジュからのメッセージ</h4>
                        {!! $companion->message !!}
                    <hr>
                    <div class="schedule_box">
                        <h3 class="ttl">出勤スケジュール</h3>
                        @foreach($schedule_dates as $dkey => $schedule_date)
                            <div class="wrap">
                                <div class="head">{{ $schedule_date }}</div>
                                @if(count($companion->attendances) > 0)
                                    @foreach($companion->attendances as $attendance)
                                        @if($attendance->date == $dkey)
                                            @if(!empty($attendance->end_time))
                                                <div class="cell">{{ $attendance->start_time }} ~ {{ $attendance->end_time }}</div>
                                            @else
                                                <div class="cell">{{ $attendance->start_time }} ~ 終了時間未定</div>
                                            @endif
                                        @else
                                            <div class="cell"> - </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="cell"> - </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="ex_wrap opacity_flg">
                        <div class="ex_wrap opacity_flg mgb_30">
                            @if($companion->category->name == "BLACK")
                                <p class="price_info_ttl black_rank">BLACK</p>
                            @elseif($companion->category->name == "PLATINUM")
                                <p class="price_info_ttl platinum_rank">PLATINUM</p>
                            @elseif($companion->category->name == "DIAMOND")
                                <p class="price_info_ttl diamond"> DIAMOND </p>
                            @elseif($companion->category->name == "RED DIAMOND")
                                <p class="price_info_ttl red_diamond">RED DIAMOND</p>
                            @endif
                            <table class="price">
                                <tbody>
                                    @foreach($companion->category->prices as $price)
                                        <tr>
                                            <th>{{ $price->time_interval }}</th>
                                            <td>{{ $price->start_price }} {{ !empty($price->end_price) ? " ~ ".($price->end_price) : '' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <h4 class="prof_head">オンライン予約</h4>
                        <button class="detail_recruit" id="more_btn">
                            <a href="#" onclick="openTermCondition({{ $companion->id }})">オンライン予約はコチラから</a>
                        </button>
                        <button class="_btn">
                            <a href="{{ route('page.enrollment_table') }}">他の在籍モデルをみる</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')

    <script>
        $(window).on('DOMContentLoaded', function () {
            new Splide('#detail-slider', {
                type   : 'loop',
                autoplay: true,
                pagination: false,
                speed: 2000
            }).mount();
        });

        function openTermCondition(comp_id){
            localStorage.setItem('comp_id', comp_id);
            window.location.href = "{{ route('user.terms') }}";
        }
    </script>

@endsection
