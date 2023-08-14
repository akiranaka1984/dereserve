@extends('page.layout')

@section('content')

    {!!  $header->text_data1 !!}
    {!!  $header->text_data2 !!}
    {!!  $header->text_data3 !!}

    <article id="mail" class="inner">
        <h2 class="ttl"><span>求人情報</span></h2>
        <div class="contents">
            <p class="txt">高級デリヘル 六本木【フィレンツェ】 > 高級デリヘル 六本木求人【フィレンツェ】</p>
            <div class="recruit_box1 clearfix">
                <div class="left"><img src="{{ url('/assets/images/img_recruit_01.jpg') }}" alt="女性求人"></div>
                <div class="right"><h3>Model recruitment</h3>
                <p>当クラブの概要やお仕事内容、特徴・報酬に<br>ついて詳しい内容はこちらをご覧ください。</p>
                <div class="link_btn"><a href="./entry">女性求人情報はコチラ</a></div></div>
            </div>
            <div class="recruit_box2 clearfix">
                <div class="left"><img src="{{ url('/assets/images/img_recruit_02.jpg') }}" alt="男性求人"></div>
                <div class="right"><h3>Mens recruitment</h3>
                <p>男性向け内勤スタッフ・ドライバー求人情報は<br>こちらをご覧ください。</p>
                <div class="link_btn"><a href="./summary">男性求人情報はコチラ</a></div></div>
            </div>
        </div>
    </article>

    <nav id="breadcrumbs">
        <ul class="contents" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.index') }}"><span itemprop="name">渋谷デリヘル</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.recruit') }}"><span itemprop="name">求人情報</span></a>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </nav>

@endsection
