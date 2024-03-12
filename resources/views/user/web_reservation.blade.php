@extends('page.layout')

@section('content')
    <section class="kv_main">
        <div class="kv_wrap">
            <img src="{{ url('storage/gallery/86851710153484.jpg') }}" alt="">
            <h2 class="kv_title">Web Reservation</h2>
        </div>
    </section>
    <section class="article-container" id="reservation_page">
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
                    <span property="name" class="archive taxonomy category current-item">WEB RESERVATION</span>
                    <meta property="url" content="{{ route('user.web.reservation') }}">
                    <meta property="position" content="2">
                </span>
            </div>
        </div>
        <div class="wrapper">
            <div class="archive">
                <div class="headline mrgbtm0">
                    <p class="ttl_en">ARCHIVE</p>
                    <h2 class="headline_ttl">
                        WEB RESERVATION </h2>
                    <p class="back_txt">ARCHIVE</p>
                </div>
            </div>
            <div class="reservation">
                <form action="{{ route('user.web.reservation.save') }}" class="form" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" name="frm_user_id" value="{{ $users->id }}" required/>
                    <div id="mw_wp_form_mw-wp-form-59" class="mw_wp_form mw_wp_form_input  ">
                        <dl>
                            <dt>お名前 (登録希望名)<span>必須</span></dt>
                            <dd>
                                <input type="text" name="reserve_name" placeholder="例)　田中" class="wide" value="{{ $users->name }}" data-prompt-position="topLeft" readonly required>
                            </dd>
                        </dl>
                        <dl>
                            <dt>メールアドレス<span>必須</span></dt>
                            <dd>
                                <input type="email" name="reserve_mail" placeholder="例)　xxx-xxx@xxxxx.ne.jp" value="{{ $users->email }}" class="wide" id="reserveMail" data-prompt-position="topLeft" readonly required>
                            </dd>
                        </dl>
                        <dl>
                            <dt>メールアドレス(確認用)<span>必須</span></dt>
                            <dd>
                                <input type="email" name="reserve_mail2" placeholder="確認のため再度ご入力ください" value="{{ $users->email }}" class="wide" data-prompt-position="topLeft" readonly required>
                            </dd>
                        </dl>
                        <dl>
                            <dt>お電話番号<span>必須</span></dt>
                            <dd>
                                <input type="text" name="reserve_tel" placeholder="例)　080-1234-5678" value="{{ $users->tel }}" class="tel wide" data-prompt-position="topLeft" readonly required>
                            </dd>
                        </dl>
                        <dl>
                            <dt>LINE ID</dt>
                            <dd>
                                <input type="text" name="reserve_lineid" class="wide" value="{{ $users->lineid }}" readonly>
                                <p class="sub_ex_txt2">当クラブのLINE(アカウント名○○○)より連絡をご希望の場合は、ID検索許可に設定の上、こちらにご入力ください。</p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>ご予約希望女性<span>必須</span></dt>
                            <dd class="lady">
                                <input type="text" name="reserve_lady1" value="" placeholder="第1候補" class="wide _lady" data-prompt-position="topLeft" required>
                                <input type="text" name="reserve_lady2" value="" placeholder="第2候補" class="wide _lady" data-prompt-position="topLeft" required>
                                <input type="text" name="reserve_lady3" value="" placeholder="第3候補" class="wide _lady" data-prompt-position="topLeft" required>
                            </dd>
                        </dl>
                        <dl>
                            <dt>ご予約希望日時<span>必須</span></dt>
                            <dd>
                                <p class="prf_title">[第一候補日]</p>
                                <dd class="preferred">
                                    <select name="reserve_month1" class="wide" data-prompt-position="topLeft" required>
                                        <option value="" disabled>--</option>
                                        <option value="1" {{ ($month == 1) ? 'selected' : '' }} >1</option>
                                        <option value="2" {{ ($month == 2) ? 'selected' : '' }} >2</option>
                                        <option value="3" {{ ($month == 3) ? 'selected' : '' }} >3</option>
                                        <option value="4" {{ ($month == 4) ? 'selected' : '' }} >4</option>
                                        <option value="5" {{ ($month == 5) ? 'selected' : '' }} >5</option>
                                        <option value="6" {{ ($month == 6) ? 'selected' : '' }} >6</option>
                                        <option value="7" {{ ($month == 7) ? 'selected' : '' }} >7</option>
                                        <option value="8" {{ ($month == 8) ? 'selected' : '' }} >8</option>
                                        <option value="9" {{ ($month == 9) ? 'selected' : '' }} >9</option>
                                        <option value="10" {{ ($month == 10) ? 'selected' : '' }} >10</option>
                                        <option value="11" {{ ($month == 11) ? 'selected' : '' }} >11</option>
                                        <option value="12" {{ ($month == 12) ? 'selected' : '' }} >12</option>
                                    </select>月&nbsp;
                                    <select name="reserve_day1" class="wide" data-prompt-position="topLeft" required>
                                        <option value="" disabled>--</option>
                                        <option value="1" {{ ($day == 1) ? 'selected' : '' }} >1</option>
                                        <option value="2" {{ ($day == 2) ? 'selected' : '' }} >2</option>
                                        <option value="3" {{ ($day == 3) ? 'selected' : '' }} >3</option>
                                        <option value="4" {{ ($day == 4) ? 'selected' : '' }} >4</option>
                                        <option value="5" {{ ($day == 5) ? 'selected' : '' }} >5</option>
                                        <option value="6" {{ ($day == 6) ? 'selected' : '' }} >6</option>
                                        <option value="7" {{ ($day == 7) ? 'selected' : '' }} >7</option>
                                        <option value="8" {{ ($day == 8) ? 'selected' : '' }} >8</option>
                                        <option value="9" {{ ($day == 9) ? 'selected' : '' }} >9</option>
                                        <option value="10" {{ ($day == 10) ? 'selected' : '' }} >10</option>
                                        <option value="11" {{ ($day == 11) ? 'selected' : '' }} >11</option>
                                        <option value="12" {{ ($day == 12) ? 'selected' : '' }} >12</option>
                                        <option value="13" {{ ($day == 13) ? 'selected' : '' }} >13</option>
                                        <option value="14" {{ ($day == 14) ? 'selected' : '' }} >14</option>
                                        <option value="15" {{ ($day == 15) ? 'selected' : '' }} >15</option>
                                        <option value="16" {{ ($day == 16) ? 'selected' : '' }} >16</option>
                                        <option value="17" {{ ($day == 17) ? 'selected' : '' }} >17</option>
                                        <option value="18" {{ ($day == 18) ? 'selected' : '' }} >18</option>
                                        <option value="19" {{ ($day == 19) ? 'selected' : '' }} >19</option>
                                        <option value="20" {{ ($day == 20) ? 'selected' : '' }} >20</option>
                                        <option value="21" {{ ($day == 21) ? 'selected' : '' }} >21</option>
                                        <option value="22" {{ ($day == 22) ? 'selected' : '' }} >22</option>
                                        <option value="23" {{ ($day == 23) ? 'selected' : '' }} >23</option>
                                        <option value="24" {{ ($day == 24) ? 'selected' : '' }} >24</option>
                                        <option value="25" {{ ($day == 25) ? 'selected' : '' }} >25</option>
                                        <option value="26" {{ ($day == 26) ? 'selected' : '' }} >26</option>
                                        <option value="27" {{ ($day == 27) ? 'selected' : '' }} >27</option>
                                        <option value="28" {{ ($day == 28) ? 'selected' : '' }} >28</option>
                                        <option value="29" {{ ($day == 29) ? 'selected' : '' }} >29</option>
                                        <option value="30" {{ ($day == 30) ? 'selected' : '' }} >30</option>
                                        <option value="31" {{ ($day == 31) ? 'selected' : '' }} >31</option>
                                    </select>日&nbsp;
                                    <select name="reserve_hour1" class="wide" data-prompt-position="topLeft" required>
                                        <option value="" selected disabled>--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                    </select>時&nbsp;
                                    <select name="reserve_minut1" class="wide" data-prompt-position="topLeft" required>
                                        <option value="" selected disabled>--</option>
                                        <option value="00">00</option>
                                        <option value="30">30</option>
                                    </select>分
                                </dd>
                                <p class="prf_title">[第二候補日]</p>
                                <dd class="preferred">
                                    <select name="reserve_month2" class="wide" data-prompt-position="topLeft" required>
                                        <option value="" disabled>--</option>
                                        <option value="1" {{ ($month == 1) ? 'selected' : '' }} >1</option>
                                        <option value="2" {{ ($month == 2) ? 'selected' : '' }} >2</option>
                                        <option value="3" {{ ($month == 3) ? 'selected' : '' }} >3</option>
                                        <option value="4" {{ ($month == 4) ? 'selected' : '' }} >4</option>
                                        <option value="5" {{ ($month == 5) ? 'selected' : '' }} >5</option>
                                        <option value="6" {{ ($month == 6) ? 'selected' : '' }} >6</option>
                                        <option value="7" {{ ($month == 7) ? 'selected' : '' }} >7</option>
                                        <option value="8" {{ ($month == 8) ? 'selected' : '' }} >8</option>
                                        <option value="9" {{ ($month == 9) ? 'selected' : '' }} >9</option>
                                        <option value="10" {{ ($month == 10) ? 'selected' : '' }} >10</option>
                                        <option value="11" {{ ($month == 11) ? 'selected' : '' }} >11</option>
                                        <option value="12" {{ ($month == 12) ? 'selected' : '' }} >12</option>
                                    </select>月&nbsp;
                                    <select name="reserve_day2" class="wide" data-prompt-position="topLeft" required>
                                        <option value="" disabled>--</option>
                                        <option value="1" {{ ($day == 1) ? 'selected' : '' }} >1</option>
                                        <option value="2" {{ ($day == 2) ? 'selected' : '' }} >2</option>
                                        <option value="3" {{ ($day == 3) ? 'selected' : '' }} >3</option>
                                        <option value="4" {{ ($day == 4) ? 'selected' : '' }} >4</option>
                                        <option value="5" {{ ($day == 5) ? 'selected' : '' }} >5</option>
                                        <option value="6" {{ ($day == 6) ? 'selected' : '' }} >6</option>
                                        <option value="7" {{ ($day == 7) ? 'selected' : '' }} >7</option>
                                        <option value="8" {{ ($day == 8) ? 'selected' : '' }} >8</option>
                                        <option value="9" {{ ($day == 9) ? 'selected' : '' }} >9</option>
                                        <option value="10" {{ ($day == 10) ? 'selected' : '' }} >10</option>
                                        <option value="11" {{ ($day == 11) ? 'selected' : '' }} >11</option>
                                        <option value="12" {{ ($day == 12) ? 'selected' : '' }} >12</option>
                                        <option value="13" {{ ($day == 13) ? 'selected' : '' }} >13</option>
                                        <option value="14" {{ ($day == 14) ? 'selected' : '' }} >14</option>
                                        <option value="15" {{ ($day == 15) ? 'selected' : '' }} >15</option>
                                        <option value="16" {{ ($day == 16) ? 'selected' : '' }} >16</option>
                                        <option value="17" {{ ($day == 17) ? 'selected' : '' }} >17</option>
                                        <option value="18" {{ ($day == 18) ? 'selected' : '' }} >18</option>
                                        <option value="19" {{ ($day == 19) ? 'selected' : '' }} >19</option>
                                        <option value="20" {{ ($day == 20) ? 'selected' : '' }} >20</option>
                                        <option value="21" {{ ($day == 21) ? 'selected' : '' }} >21</option>
                                        <option value="22" {{ ($day == 22) ? 'selected' : '' }} >22</option>
                                        <option value="23" {{ ($day == 23) ? 'selected' : '' }} >23</option>
                                        <option value="24" {{ ($day == 24) ? 'selected' : '' }} >24</option>
                                        <option value="25" {{ ($day == 25) ? 'selected' : '' }} >25</option>
                                        <option value="26" {{ ($day == 26) ? 'selected' : '' }} >26</option>
                                        <option value="27" {{ ($day == 27) ? 'selected' : '' }} >27</option>
                                        <option value="28" {{ ($day == 28) ? 'selected' : '' }} >28</option>
                                        <option value="29" {{ ($day == 29) ? 'selected' : '' }} >29</option>
                                        <option value="30" {{ ($day == 30) ? 'selected' : '' }} >30</option>
                                        <option value="31" {{ ($day == 31) ? 'selected' : '' }} >31</option>
                                    </select>日&nbsp;
                                    <select name="reserve_hour2" class="wide" data-prompt-position="topLeft" required>
                                        <option value="" selected disabled>--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                    </select>時&nbsp;
                                    <select name="reserve_minut2" class="wide" data-prompt-position="topLeft" required>
                                        <option value="" selected disabled>--</option>
                                        <option value="00">00</option>
                                        <option value="30">30</option>
                                    </select>分
                                </dd>
                                <p class="prf_title">[第三候補日]</p>
                                <dd class="preferred">
                                    <select name="reserve_month3" class="wide" data-prompt-position="topLeft" required>
                                        <option value="" disabled>--</option>
                                        <option value="1" {{ ($month == 1) ? 'selected' : '' }} >1</option>
                                        <option value="2" {{ ($month == 2) ? 'selected' : '' }} >2</option>
                                        <option value="3" {{ ($month == 3) ? 'selected' : '' }} >3</option>
                                        <option value="4" {{ ($month == 4) ? 'selected' : '' }} >4</option>
                                        <option value="5" {{ ($month == 5) ? 'selected' : '' }} >5</option>
                                        <option value="6" {{ ($month == 6) ? 'selected' : '' }} >6</option>
                                        <option value="7" {{ ($month == 7) ? 'selected' : '' }} >7</option>
                                        <option value="8" {{ ($month == 8) ? 'selected' : '' }} >8</option>
                                        <option value="9" {{ ($month == 9) ? 'selected' : '' }} >9</option>
                                        <option value="10" {{ ($month == 10) ? 'selected' : '' }} >10</option>
                                        <option value="11" {{ ($month == 11) ? 'selected' : '' }} >11</option>
                                        <option value="12" {{ ($month == 12) ? 'selected' : '' }} >12</option>
                                    </select>月&nbsp;
                                    <select name="reserve_day3" class="wide" data-prompt-position="topLeft" required>
                                        <option value="" disabled>--</option>
                                        <option value="1" {{ ($day == 1) ? 'selected' : '' }} >1</option>
                                        <option value="2" {{ ($day == 2) ? 'selected' : '' }} >2</option>
                                        <option value="3" {{ ($day == 3) ? 'selected' : '' }} >3</option>
                                        <option value="4" {{ ($day == 4) ? 'selected' : '' }} >4</option>
                                        <option value="5" {{ ($day == 5) ? 'selected' : '' }} >5</option>
                                        <option value="6" {{ ($day == 6) ? 'selected' : '' }} >6</option>
                                        <option value="7" {{ ($day == 7) ? 'selected' : '' }} >7</option>
                                        <option value="8" {{ ($day == 8) ? 'selected' : '' }} >8</option>
                                        <option value="9" {{ ($day == 9) ? 'selected' : '' }} >9</option>
                                        <option value="10" {{ ($day == 10) ? 'selected' : '' }} >10</option>
                                        <option value="11" {{ ($day == 11) ? 'selected' : '' }} >11</option>
                                        <option value="12" {{ ($day == 12) ? 'selected' : '' }} >12</option>
                                        <option value="13" {{ ($day == 13) ? 'selected' : '' }} >13</option>
                                        <option value="14" {{ ($day == 14) ? 'selected' : '' }} >14</option>
                                        <option value="15" {{ ($day == 15) ? 'selected' : '' }} >15</option>
                                        <option value="16" {{ ($day == 16) ? 'selected' : '' }} >16</option>
                                        <option value="17" {{ ($day == 17) ? 'selected' : '' }} >17</option>
                                        <option value="18" {{ ($day == 18) ? 'selected' : '' }} >18</option>
                                        <option value="19" {{ ($day == 19) ? 'selected' : '' }} >19</option>
                                        <option value="20" {{ ($day == 20) ? 'selected' : '' }} >20</option>
                                        <option value="21" {{ ($day == 21) ? 'selected' : '' }} >21</option>
                                        <option value="22" {{ ($day == 22) ? 'selected' : '' }} >22</option>
                                        <option value="23" {{ ($day == 23) ? 'selected' : '' }} >23</option>
                                        <option value="24" {{ ($day == 24) ? 'selected' : '' }} >24</option>
                                        <option value="25" {{ ($day == 25) ? 'selected' : '' }} >25</option>
                                        <option value="26" {{ ($day == 26) ? 'selected' : '' }} >26</option>
                                        <option value="27" {{ ($day == 27) ? 'selected' : '' }} >27</option>
                                        <option value="28" {{ ($day == 28) ? 'selected' : '' }} >28</option>
                                        <option value="29" {{ ($day == 29) ? 'selected' : '' }} >29</option>
                                        <option value="30" {{ ($day == 30) ? 'selected' : '' }} >30</option>
                                        <option value="31" {{ ($day == 31) ? 'selected' : '' }} >31</option>
                                    </select>日&nbsp;
                                    <select name="reserve_hour3" class="wide" data-prompt-position="topLeft" required>
                                        <option value="" selected disabled>--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                    </select>時&nbsp;
                                    <select name="reserve_minut3" class="wide" data-prompt-position="topLeft" required>
                                        <option value="" selected disabled>--</option>
                                        <option value="00">00</option>
                                        <option value="30">30</option>
                                    </select>分
                                </dd>
                            </dd>
                            <p class="sub_ex_txt2">お選びいただいたモデルの出勤日以外でも入力可能です。当クラブからモデルへ出勤可能かを確認致します。</p>
                        </dl>
                        <dl>
                            <dt>ご希望のコース<span>*必須</span></dt>
                            <dd>
                                <select class="wide" name="reserve_cource" required>
                                    <option value="" selected disabled>選択してください</option>
                                    @foreach($prices as $price)
                                        <option value="{{ $price->name }} {{ $price->time_interval }}">{{ $price->name }} {{ $price->time_interval }}</option>
                                    @endforeach
                                </select>
                            </dd>
                        </dl>
                        <dl>
                            <dt>ご利用予定のホテルまたは地域(ご自宅を希望される方は住所をご入力ください。)</dt>
                            <dd>
                                <input type="text" name="reserve_place" class="wide" value="">
                            </dd>
                        </dl>
                        <dl>
                            <dt>お支払方法</dt>
                            <dd>
                                <select class="wide" name="reserve_pay">
                                    <option value="" selected disabled>選択してください</option>
                                    <option value="現金">現金</option>
                                    <option value="クレジットカード">クレジットカード</option>
                                </select>
                            </dd>
                        </dl>
                        <dl>
                            <dt>当クラブからのご連絡方法</dt>
                            <dd>
                                <select class="wide" name="reserve_contact">
                                    <option value="" selected disabled>選択してください</option>
                                    <option value="メール">メール</option>
                                    <option value="電話">電話</option>
                                    <option value="LINE">LINE</option>
                                    <option value="いずれでも可">いずれでも可</option>
                                </select>
                            </dd>
                        </dl>
                        <dl>
                            <dt>その他ご質問、追加サービス(オプション等)のご要望　<em>※領収書をご希望の場合こちらにその旨をご入力ください。</em></dt>
                            <dd>
                                <textarea name="reserve_cmnt" cols="50" rows="10"></textarea>
                            </dd>
                        </dl>
                        <p class="contact_bottom_txt">
                            <em>※確認画面は表示されませんので、送信前に内容のご確認をお願い致します。</em><br>
                            ※ドメイン指定受信されているお客様は「info@club-firenze.net」からのメールを受信できるよう、設定の変更をお願い致します。
                        </p>
                        <button type="submit" class="recruit_btn">送信する</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection


