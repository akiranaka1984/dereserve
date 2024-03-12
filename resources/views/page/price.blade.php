@extends('page.layout')

@section('content')

    <section class="kv_main">
        <div class="kv_wrap">
            <img src="{{ url('storage/gallery/28081710153484.jpg') }}" alt="">
            <h2 class="kv_title">PRICE</h2>
        </div>
    </section>
    <section class="system" id="system">
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
                        <span property="name" class="post post-page current-item">料金について</span>
                        <meta property="url" content="{{ route('page.price') }}">
                        <meta property="position" content="2">
                    </span>
                </div>
            </div>
            <div class="ex_wrap">
                <h3 class="ex_headline">料金システム</h3>
                <p class="ex_txt">
                    当店の料金システムは、クラス毎に明瞭な料金体系になっております。また、プロフィールと異なる女性がお伺いするという、風俗店でありがちな「振替行為」も一切ございませんので安心してご利用ください。
                </p>

                @foreach($categories as $category)
                    <div class="price">

                        @if($category->name == "BLACK")
                            <p class="price_info_ttl black_rank">BLACK</p>
                        @elseif($category->name == "PLATINUM")
                            <p class="price_info_ttl platinum_rank">PLATINUM</p>
                        @elseif($category->name == "DIAMOND")
                            <p class="price_info_ttl diamond_rank">DIAMOND</p>
                        @elseif($category->name == "RED DIAMOND")
                            <p class="price_info_ttl red_diamond">RED DIAMOND</p>
                        @endif

                        @if(!empty($category->prices))
                            <table class="price">
                                <tbody>
                                    @foreach($category->prices as $price)
                                        <tr>
                                            <th>{{ $price->time_interval }}</th>
                                            <td>{{ $price->start_price }} {{ !empty($price->end_price) ? " ~ ".($price->end_price) : '' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                @endforeach

                <div class="sub_ex">
                    <h4 class="sub_ex_ttl">追加可能サービス - Option</h4>
                    <p class="sub_ex_txt">オプションはモデルにより対応可能なものが異なります。お手数ではございますが、詳細はお電話にてお問い合わせください。</p>
                    <h4 class="sub_ex_ttl">交通費 - Transportation Expenses</h4>
                    <ul>
                        <li>渋谷区・新宿区・港区・目黒区・品川区 … ￥3,000</li>
                        <li>中央区・千代田区・世田谷区・中野区 … ￥4,000</li>
                        <li>杉並区・豊島区・文京区・大田区 … ￥5,000</li>
                        <li>その他23区内・他地域 … ￥6,000～</li>
                    </ul>
                    <p class="annotations">※上記各地域における交通費に関しましては、距離や交通の便に応じて多少変動致しますので、ご了承くださいませ。</p>
                    <p class="annotations">※全国への出張派遣も行っております。交通費につきましては、お電話にてご相談ください。</p>

                    <h4 class="sub_ex_ttl">お支払方法 - Payment Method</h4>
                    <p class="sub_ex_txt mgb_10">現金、または各種クレジットカード(VISA,Master Card,JCB,American Express,Diners
                        Club)がご利用頂けます。クレジットカードをご利用の場合は、ご予約の際にその旨をお伝えください。領収書の発行もしておりますので、お気軽にお申し付けください。</p>
                    <p class="annotations color_gold">※延長料金は現金のみでのお支払となります。</p>
                </div>
            </div>
            <div class="flow_wrap">
                <h3 class="ex_headline">ご利用の流れ</h3>
                <div class="flow_design">
                    <ul class="flow">
                        <li>
                            <p class="icon">1</p>
                            <dl>
                                <dt>ご予約</dt>
                                <dd>
                                    <p>お好みの女性をお選び頂き、お電話（03-6868-5149）またはご予約フォームよりご予約を承ります。</p>
                                    <ul>
                                        <li>・<span class="color_pink">初めてご利用のお客様は、お電話でのご予約</span>をお願い致します。</li>
                                        <li>・<span class="color_pink">当日のご予約は、お電話のみ</span>とさせて頂きます。</li>
                                    </ul>
                                    <p class="annotations">※頂いた個人情報につきましては、個人情報保護法に基づき、顧客管理目的以外での利用は致しませんのでご安心ください。
                                    </p>
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <p class="icon">2</p>
                            <dl>
                                <dt>ご宿泊先ホテル・ご自宅へ女性を派遣</dt>
                                <dd>
                                    <p>東京23区、およびその周辺地域内のシティホテル、ビジネスホテル、ファッションホテル、ご自宅等に派遣させて頂きます。</p>
                                    <p class="annotations color_gold">
                                        ※女性により一部お伺いすることが難しいホテルもございますので、当クラブに事前にご相談下さい。</p>
                                    <p class="annotations color_gold">
                                        ※ホテルやシティホテルにおきましては、女性がお部屋に直接お伺い出来ないホテルもございます。そのような場合は、お客様にロビー階まで女性のお迎えにいらして頂きますよう、ご理解・ご協力をお願い致します。
                                    </p>
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <p class="icon">3</p>
                            <dl>
                                <dt>確認連絡・サービス開始</dt>
                                <dd>
                                    <p>お客様とお会いできましたら、女性から当クラブへ確認の連絡を行い、ご案内完了です。当クラブが厳選した女性との至福のひと時を、ご堪能下さいませ･･･</p>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </div>
                <h4 class="sub_ex_ttl">変更・キャンセルに関する規約</h4>
                <ul class="cancel_policy">
                    <li>ご予約の変更やキャンセルにつきましては、ご予約当日の2時間前までに、お電話にてご連絡をお願い致します。</li>
                    <li>ご予約当日の2時間前を経過した後の変更・キャンセルにつきましては、当該理由が止むを得ない事情によるものである、と当クラブ側が判断した場合を除き、一切受け付けることができませんのでご注意ください。
                    </li>
                    <li>ご予約頂いていた女性が、体調不良等、急遽止むを得ない事情でお客様のもとにお伺いできなくなるケースがございます。当クラブでは、このような事態が発生しないよう細心の注意を払ってはおりますが、このようなケースが生じてしまった場合のご予約のホテル代の負担等に関しましては、誠に申し訳ございませんが当クラブでは負担致しかねますので、ご了承ください。
                        <p>※上記ケースの際にはお客様とご相談の上、ご希望に沿う他のモデルをご案内可能な場合には、そのモデルの正規料金より3,000円を割引した 金額でご案内しております。</p>
                    </li>
                    <li>当クラブでは、女性の振替等は一切しておりませんので、ご安心ください。
                        <p>※振替とはお客様がご指名になられた女性と、実際にお伺いする女性が異なるようなケースのことを言います。</p>
                    </li>
                    <li>上記の他、記載事項以外のケースに関しましては個別に対応させて頂きますので、当店コンシェルジュまでお尋ねください。</li>
                </ul>
                <h4 class="sub_ex_ttl">利用規約</h4>
                <p class="sub_ex_txt mgb_10">以下に該当する方のご利用はお断りしております。</p>
                <ul class="bg_w">
                    <li>18歳未満の方(高校生不可)</li>
                    <li>本番行為、及び本番行為の強要をされる方や、常識を逸した過剰サービスの強要をされる方</li>
                    <li>プレイ前にシャワーを浴びない方</li>
                    <li>泥酔者、薬物（ハーブ等も含む）を使用している方</li>
                    <li>暴力団、またはそれに準ずると見受けられる方</li>
                    <li>性病、もしくはその疑いのある方</li>
                    <li>同業者、スカウト行為を目的とされる方</li>
                    <li>ご利用になるご本人以外の参加</li>
                    <li>盗聴・盗撮などの行為をされる方</li>
                    <li>女性が嫌がる行為、暴力行為をされる方</li>
                    <li>モデルに対するストーカー行為をされる方</li>
                    <li>頻繁なチェンジ・キャンセルをされる方</li>
                    <li>悪質な予約キャンセルをされた方</li>
                    <li>女性やクラブに対する脅迫、または類似すると判断される行為をされた方</li>
                    <li>その他、上記以外の合理的理由により、当クラブが不適当と判断した方</li>
                    <li>上記の事項が発覚した場合、サービスを中断させて頂き、料金のご返金にも応じかねますので、ご了承下さい。なお、悪質と判断した場合は所轄の警察署に通報の上、以後一切のご利用をお断り致します。
                    </li>
                </ul>
            </div>
        </div>
    </section>

@endsection
