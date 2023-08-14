@extends('page.layout')

@section('content')

    {!!  $header->text_data1 !!}
    {!!  $header->text_data2 !!}
    {!!  $header->text_data3 !!}

    <article id="mail" class="inner">
        <h2 class="ttl"><span>メールマガジン</span></h2>
        <div class="contents">
            <p class="txt">メルマガ会員の皆様には、お得なキャンペーン情報、新人モデル登録情報等をリアルタイムでお届け致します。お客様の大切なメールアドレスが他に漏洩する事は一切ございませんので、ご安心下さい。</p>
            <div class="form">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{ route('page.magazine.save') }}" method="post">
                    @csrf
                    <input type="text" name="name" class="form-control" value="" placeholder="お名前をご入力ください。" required>
                    <input type="email" name="mail_addr" class="form-control" value="" placeholder="メールアドレスをご入力ください。" required>
                    <div class="btn_area">
                        <p class="btn">
                            <input type="submit" class="mincho" name="castsyukkinmail_add" value="登録">
                        </p>
                        <p class="btn">
                            <input type="submit" class="mincho" name="castsyukkinmail_del" value="解除">
                        </p>
                    </div>
                </form>
            </div>
            <br/><br/><br/>
            <p class="txt">※登録ボタンを押下後、当クラブから<span class="text-danger">メルマガ登録完了の自動応答メールが届かない場合、恐れ入りますが、下記のご対応をお願い致します。</span><br/>
            また、ご登録が完了しているかご不安な場合には、当クラブまでお電話にてお気軽にお問い合わせください。<br/>
            ■携帯電話の迷惑メール対策として、URLが含まれたメールは自動的に受信拒否する設定になっている場合がございます。<br/>
            お客様の携帯の「URL付きメールの受信設定」をご確認の上受信設定を行い、再度ご登録をお願いいたします。<br/>
            ■ドメイン指定受信されているお客様は「info@club-firenze.net」からのメールを受信できるよう、設定変更の上、再度ご登録をお願いいたします。</p>

        </div>
    </article>

    <nav id="breadcrumbs">
        <ul class="contents" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.index') }}"><span itemprop="name">渋谷デリヘル</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.magazine') }}"><span itemprop="name">メールマガジン</span></a>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </nav>

@endsection
