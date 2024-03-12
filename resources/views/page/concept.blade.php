@extends('page.layout')

@section('content')

    <section class="kv_main">
        <div class="kv_wrap">
            <img src="{{ url('storage/gallery/23361710153484.jpg') }}" alt="">
            <h2 class="kv_title">CONCEPT</h2>
        </div>
    </section>
    <section class="concept" id="concept">
        <div class="wrapper">
            <div class="breadcrumbs">
                <div class="breadcrumb_inner">
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="クラブフィレンツェへ移動する" href="{{ route('page.index') }}" class="home">
                            <span property="name">HOME</span>
                        </a>
                        <meta property="position" content="1">
                    </span>
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                    <span property="itemListElement" typeof="ListItem">
                        <span property="name" class="post post-page current-item">CONCEPT</span>
                        <meta property="url" content="{{ route('page.concept') }}">
                        <meta property="position" content="2">
                    </span>
                </div>
            </div>
            <div class="headline">
                <h2 class="headline_ttl color_white"> CONCEPT </h2>
                <p class="back_txt color_wh05">CONCEPT</p>
            </div>

            <h3 class="concept_title">
            </h3>
            <h2 class="concept_title">高級デリヘルの枠を超越した史上最高クラスの美女をご案内いたします。</h2>
            <div class="concept_box">
                <p class="txt">
                    当クラブでは、初めて高級デリヘル店のご利用をご検討されているお客様、日頃から高級店をご利用のお客様を問わず、全てのお客様に「フィレンツェを利用して本当に良かった」と感じて頂けるようなお店づくりをすることを理念としております。
                </p>

                <p class="txt">お仕事のお忙しい日常の中で、見た目的にも内面的にも「理想的な美人」と言える女性と出会える機会は、なかなかないかもしれません。</p>

                <p class="txt">
                    私たちは、長年に渡り培った独自の美人女性のリクルーティングネットワークをもとに、通常の高級デリヘル店であれば実現することが難しい最高峰クオリティの厳選された美人女性をご案内させて頂くことを、ここにお約束致します。
                </p>
            </div>
        </div>
    </section>

@endsection
