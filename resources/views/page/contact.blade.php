@extends('page.layout')

@section('content')
   
    <section class="kv_main">
        <div class="kv_wrap">
            <img src="{{ url('/assets/images/contact_bg_mb.png') }}" alt="">
            <h2 class="kv_title">CONTACT</h2>
        </div>
    </section>

    <section id="mailmagazine" class="mailmagazine article-container">
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
                    <span property="name" class="archive taxonomy category current-item">CONTACT</span>
                    <meta property="url" content="{{ route('page.contact') }}">
                    <meta property="position" content="2">
                </span>
            </div>
        </div>
        <div class="wrapper">
            <div class="headline">
                <h3 class="">CONTACT</h3>
                <span style="font-size: 22px">ご質問はいつでもお受けいたします</span>
            </div>
       
            <div class="mailForm">
                <form action="{{ route('page.contact.save') }}" method="POST">
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
                    <input type="text" name="title" placeholder="タイトル" class="mail" required>
                    <textarea name="text" placeholder="あなたの連絡先の問い合わせ" class="mail" rows="5" required></textarea>
                    <div class="div">
                        <button type="submit" class="button">送信</button>
                    </div>
               
                </form>
                
            </div>
        </div>
    </section>
@endsection
