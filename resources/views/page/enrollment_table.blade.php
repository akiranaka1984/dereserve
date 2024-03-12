@extends('page.layout')

@section('content')

    {!! $enrollment_table->text_data1 !!}
    <section class="model" id="model">
        <div class="wrapper">
            <div class="breadcrumbs">
                <div class="breadcrumb_inner">
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage"
                            title="クラブフィレンツェへ移動する" href="{{ route('page.index') }}"
                            class="home"><span property="name">HOME</span></a>
                        <meta property="position" content="1">
                    </span><i class="fas fa-angle-right" aria-hidden="true"></i><span property="itemListElement"
                        typeof="ListItem"><span property="name"
                            class="archive post-model-archive current-item">モデル</span>
                        <meta property="url" content="{{ route('page.enrollment_table') }}">
                        <meta property="position" content="2">
                    </span>
                </div>
            </div>
            <div class="ex_wrap fadeUpTrigger smooth">
                <h3 class="ex_headline">在籍モデル一覧 61名</h3>
                <p class="ex_txt">
                    当店では芸能プロダクションのみならず、あらゆる業界の圧倒的美人が多数在籍しております。他の高級店では体験できない、最高峰クウォリティの美女を厳選してご案内いたします。 </p>
            </div>
            <div class="accordion-area fadeUpTrigger2">
                <section class="search">
                    <h3 class="search_title">Keyword Search</h3>
                    <div class="box">
                        <ul class="sort-btn color_bk">
                            <li>
                                <dl>
                                    <dt>All</dt>
                                    <dd>
                                        <ul>
                                            <li class="all active">全て</li>
                                        </ul>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt>CLASS</dt>
                                    <dd>
                                        <ul>
                                            <li class="rank01">PLATINUM</li>
                                            <li class="rank02">BLACK</li>
                                            <li class="rank03">DIAMOND</li>
                                            <li class="rank04">RED DIAMOND</li>
                                        </ul>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt>TYPE</dt>
                                    <dd>
                                        <ul>
                                            <li class="cat01">新人</li>
                                            <li class="cat02">経験者</li>
                                            <li class="cat03">未経験</li>
                                            <li class="cat04">清楚系</li>
                                            <li class="cat05">スタイル抜群</li>
                                            <li class="cat06">モデル系</li>
                                            <li class="cat07">キレカワ系</li>
                                            <li class="cat08">アイドル系</li>
                                            <li class="cat09">素人系</li>
                                            <li class="cat10">グラビア系</li>
                                            <li class="cat11">お姉様系</li>
                                            <li class="cat12">ギャル系</li>
                                            <li class="cat13">現役モデル</li>
                                            <li class="cat14">AV女優</li>
                                            <li class="cat15">CA</li>
                                            <li class="cat16">女子大生</li>
                                            <li class="cat17">ロリ系</li>
                                            <li class="cat18">おっとり系</li>
                                            <li class="cat19">綺麗系</li>
                                            <li class="cat20">可愛い系</li>
                                            <li class="cat21">癒し系</li>
                                            <li class="cat22">オススメ</li>
                                            <li class="cat23">巨乳</li>
                                            <li class="cat24">スレンダー</li>
                                        </ul>
                                    </dd>
                                </dl>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="articlePanel mgt_30">
                <ul id="" class="article-wrap slider grid fadeUpTrigger3 muuri" style="height: 238px;">
                    @foreach($all_records as $key => $records)
                        @foreach($records as $companion)
                                @php
                                    if(!empty($companion) && !empty($companion->home_image->photo)){
                                        $imgPath = '/storage/photos/'.($companion->id).'/'.($companion->home_image->photo);
                                    }else{
                                        $imgPath = '/storage/photos/default/not-to-be-published.jpg';
                                    }

                                    $companion_categories = '';

                                    $companion_categories = str_contains($companion->rookie, '新人') ? $companion_categories.' cat01' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, '経験者') ? $companion_categories.' cat02' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, '未経験') ? $companion_categories.' cat03' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, '清楚系') ? $companion_categories.' cat04' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'スタイル抜群') ? $companion_categories.' cat05' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'スタイル抜群') ? $companion_categories.' cat06' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'モデル系') ? $companion_categories.' cat07' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'キレカワ系') ? $companion_categories.' cat08' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'アイドル系') ? $companion_categories.' cat09' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, '素人系') ? $companion_categories.' cat10' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'お姉様系') ? $companion_categories.' cat11' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'ギャル系') ? $companion_categories.' cat12' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, '現役モデル') ? $companion_categories.' cat13' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'AV女優') ? $companion_categories.' cat114' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'CA') ? $companion_categories.' cat15' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, '女子大生') ? $companion_categories.' cat16' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'ロリ系') ? $companion_categories.' cat17' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'おっとり系') ? $companion_categories.' cat18' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, '綺麗系') ? $companion_categories.' cat19' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, '可愛い系') ? $companion_categories.' cat20' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, '癒し系') ? $companion_categories.' cat21' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'オススメ') ? $companion_categories.' cat22' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, '巨乳') ? $companion_categories.' cat23' : $companion_categories.'';
                                    $companion_categories = str_contains($companion->rookie, 'スレンダー') ? $companion_categories.' cat24' : $companion_categories.'';

                                    if ($companion->category_id == 1) {
                                        $companion_rank = 'rank01';
                                    } else if ($companion->category_id == 2) {
                                        $companion_rank = 'rank02';
                                    } else if ($companion->category_id == 3) {
                                        $companion_rank = 'rank03';
                                    } else if ($companion->category_id == 4) {
                                        $companion_rank = 'rank04';
                                    }


                                @endphp
                                <li class="article {{ $companion_categories }} {{ $companion_rank }} item muuri-item muuri-item-shown">
                                    <a href="{{ route('page.details', ['id'=>$companion->id]) }}" class="model_link" style="opacity: 1; transform: scale(1);">
                                        <div class="box fadeUpTrigger3">
                                            <span class="rank_label">
                                                @if($companion->category->name == "BLACK")
                                                    <img src="{{ url('assets/images/black_label.png') }}" alt="{{ $companion->category->name }}">
                                                @elseif($companion->category->name == "PLATINUM")
                                                    <img src="{{ url('assets/images/platinum_label.png') }}" alt="{{ $companion->category->name }}">
                                                @elseif($companion->category->name == "DIAMOND")
                                                    <img src="{{ url('assets/images/diamond_label.png') }}" alt="{{ $companion->category->name }}">
                                                @elseif($companion->category->name == "RED DIAMOND")
                                                    <img src="{{ url('assets/images/reddiamond_label.png') }}" alt="{{ $companion->category->name }}">
                                                @endif
                                            </span>
                                            <img src="{{ $imgPath }}" alt="{{ $companion->name }}" class="photo">
                                            <div class="prof_box">
                                                <p class="intro">☆まだあどけなさが残るキレカワ系の清楚美女☆</p>
                                                <div class="prof">
                                                    <div class="name_wrap">
                                                        <p class="name">{{ $companion->name }}</p>
                                                        <span class="age">{{ $companion->age }}</span>歳
                                                    </div>
                                                    <div class="size">
                                                        T:<span class="tall">{{ $companion->height }}</span>
                                                        <span class="bast">B:{{ $companion->bust }}({{ $companion->cup }})</span>
                                                        <span class="west">W:{{ $companion->waist }}</span>
                                                        <span class="hip">H:{{ $companion->hip }}</span>
                                                    </div>
                                                </div>
                                                <div class="schedule">
                                                    <p>出勤：</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

@endsection
