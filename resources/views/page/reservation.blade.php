@extends('page.layout')

@section('content')

    {!!  $header->text_data1 !!}
    {!!  $header->text_data2 !!}
    {!!  $header->text_data3 !!}

    <article id="reservation" class="inner">
        <h2 class="ttl"><span>オンライン予約 </span></h2>
        <div class="contents">
            <p class="txt">オンライン予約は、ご利用履歴のある会員様のご利用に限定させて頂いております。ご新規のお客様は大変お手数ではございますが、お電話にてご予約をお願い致します。（TEL: 03-6868-5149）</p>
            <div class="form" id="reserve_inner">
                <div id="reserve_box">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
                <form id="reserveForm" action="{{ route('page.reservation.save') }}" method="post">
                    @csrf
                    <dl class="clearfix">
                        <dt>お名前(登録希望名)<span>*必須</span></dt>
                        <dd class="frm-inpt">
                            <input type="text" name="reserve_name" value="" placeholder="例)　田中" class="" data-prompt-position="topLeft">
                        </dd>
                        <dt>メールアドレス<span>*必須</span></dt>
                        <dd class="frm-inpt">
                            <input type="text" name="reserve_mail" value="" placeholder="例)　xxx-xxx@xxxxx.ne.jp" class="" id="reserveMail" data-prompt-position="topLeft">
                        </dd>
                        <dt>メールアドレス確認用<span>*必須</span></dt>
                        <dd class="frm-inpt">
                            <input type="text" name="reserve_mail2" value="" placeholder="確認のため再度ご入力ください" class="" data-prompt-position="topLeft">
                        </dd>
                        <dt>お電話番号<span>*必須</span></dt>
                        <dd class="frm-inpt">
                            <input type="text" name="reserve_tel" value="" placeholder="例)　080-1234-5678" class="" data-prompt-position="topLeft">
                        </dd>
                        <dt>LINE ID</dt>
                        <dd>
                            <input type="text" name="reserve_lineid" value="">
                            <span class="linetxt">当クラブのLINE(アカウント名○○○○)より連絡をご希望の場合は、ID検索許可に設定の上、こちらにご入力ください。</span>
                        </dd>
                        <dt>ご予約希望女性<span>*必須</span></dt>
                        <dd>
						    <ul class="reserve_list">
                                <li class="frm-inpt"><input type="text" name="reserve_lady1" value="" placeholder="第1候補" class="" data-prompt-position="topLeft"></li>
                                <li class="frm-inpt"><input type="text" name="reserve_lady2" value="" placeholder="第2候補" class="" data-prompt-position="topLeft"></li>
                                <li class="frm-inpt"><input type="text" name="reserve_lady3" value="" placeholder="第3候補" class="" data-prompt-position="topLeft"></li>
                            </ul>
					    </dd>
					    <dt class="day">ご予約希望日時<span>*必須</span></dt>
                        <dd class="day">
                            <ul class="reserve_list2">
                                <li>第一候補日&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="reserve_month1" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
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
                                        </select>
                                    </div>月&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="reserve_day1" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
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
                                        </select>
                                    </div>日&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="reserve_hour1" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
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
                                        </select>
                                    </div>時&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="reserve_minut1" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
                                            <option value="00">00</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>分
                                </li>
                                <li>第二候補日&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="reserve_month2" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
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
                                        </select>
                                    </div>月&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="reserve_day2" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
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
                                        </select>
                                    </div>日&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="reserve_hour2" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
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
                                        </select>
                                    </div>時&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="reserve_minut2" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
                                            <option value="00">00</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>分
                                </li>
                                    <li>第三候補日&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="reserve_month3" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
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
                                        </select>
                                    </div>月&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="reserve_day3" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
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
                                        </select>
                                    </div>日&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="reserve_hour3" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
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
                                        </select>
                                    </div>時&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="reserve_minut3" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
                                            <option value="00">00</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>分
                                </li>
                            </ul>
						    <p class="txt">お選びいただいたモデルの出勤日以外でも入力可能です。当クラブからモデルへ出勤可能かを確認致します。</p>
					    </dd>
					    <dt>ご希望のコース<span>*必須</span></dt>
                        <dd class="frm-inpt">
                            <select name="reserve_cource" class="" data-prompt-position="topLeft">
                                <option value="">選択してください</option>
                                @foreach($prices as $price)
                                    <option value="{{ $price->name }} {{ $price->time_interval }}">{{ $price->name }} {{ $price->time_interval }}</option>
                                @endforeach
                            </select>
                        </dd>
					    <dt class="largeinput">ご利用予定のホテルまたは地域(ご自宅を希望される方は住所をご入力ください。)</dt>
                        <dd class="largeinput">
                            <input type="text" name="reserve_place" value="">
                        </dd>
					    <dt>お支払方法</dt>
                        <dd>
                            <select name="reserve_pay">
                                <option value="">選択してください</option>
                                <option value="現金">現金</option>
                                <option value="クレジットカード">クレジットカード</option>
                            </select>
					    </dd>
					    <dt>当クラブからのご連絡方法</dt>
                        <dd>
                            <select name="reserve_contact">
                                <option value="">選択してください</option>
                                <option value="メール">メール</option>
                                <option value="電話">電話</option>
                                <option value="LINE">LINE</option>
                                <option value="いずれでも可">いずれでも可</option>
                            </select>
					    </dd>
					    <dt class="textarea">その他ご質問、追加サービス(オプション等)のご要望　<em>※領収書をご希望の場合こちらにその旨をご入力ください。</em></dt>
                        <dd class="textarea"><textarea name="reserve_cmnt"></textarea></dd>
                    </dl>
					<p class="contact_bottom_txt"><em>※確認画面は表示されませんので、送信前に内容のご確認をお願い致します。</em><br>
                        ※ドメイン指定受信されているお客様は「info@club-firenze.net」からのメールを受信できるよう、設定の変更をお願い致します。</p>
					
                    <div id="reserve_btn">
                        <div class="g-recaptcha" data-callback="syncerRecaptchaCallback" data-sitekey="6LfSKB4eAAAAAOfyQgh9NS9c1-SHhtCFsTMiNQsr">
                            <div style="width: 304px; height: 78px;"><div>
                                <iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfSKB4eAAAAAOfyQgh9NS9c1-SHhtCFsTMiNQsr&amp;co=aHR0cHM6Ly9jbHViLWZpcmVuemUubmV0OjQ0Mw..&amp;hl=en&amp;v=3kTz7WGoZLQTivI-amNftGZO&amp;size=normal&amp;cb=xqn7un5p8edf" width="304" height="78" role="presentation" name="a-80082gkzxcsp" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"></iframe>
                            </div>
                            <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="reserve"> 
                    <button name="submit" >上記内容を送信する</button>
                </form>
                <script type="text/javascript">
                    function syncerRecaptchaCallback(code) {
                        if(code !== ""){
                            $('button[name=submit]').removeAttr("disabled");
                        }
                    }
                </script>
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
                    href="{{ route('page.reservation') }}"><span itemprop="name">オンライン予約</span></a>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </nav>

    <script>
        $(document).ready(function(){
            $('#reserveForm').validate({
                ignore: [],
                debug: false,
                rules: {
                    reserve_name: { required: true },
                    reserve_mail: { required: true, email: true },
                    reserve_mail2: { required: true, email: true, equalTo: "#reserveMail" },
                    reserve_tel: { required: true },
                    reserve_lady1: { required: true },
                    reserve_lady2: { required: true },
                    reserve_lady3: { required: true },
                    reserve_month1: { required: true },
                    reserve_day1: { required: true },
                    reserve_hour1: { required: true },
                    reserve_minut1: { required: true },
                    reserve_month2: { required: true },
                    reserve_day2: { required: true },
                    reserve_hour2: { required: true },
                    reserve_minut2: { required: true },
                    reserve_month3: { required: true },
                    reserve_day3: { required: true },
                    reserve_hour3: { required: true },
                    reserve_minut3: { required: true },
                    reserve_cource: { required: true }
                },
                messages: {
                    reserve_name: { required: "{{ __('This field is required') }}" },
                    reserve_mail: { required: "{{ __('This field is required') }}", email: "{{ __('Invalid email address') }}" },
                    reserve_mail2: { required: "{{ __('This field is required') }}", email: "{{ __('Invalid email address') }}", equalTo: "{{ __('Email not matched') }}" },
                    reserve_tel: { required: "{{ __('This field is required') }}" },
                    reserve_lady1: { required: "{{ __('This field is required') }}" },
                    reserve_lady2: { required: "{{ __('This field is required') }}" },
                    reserve_lady3: { required: "{{ __('This field is required') }}" },
                    reserve_month1: { required: "{{ __('This field is required') }}" },
                    reserve_day1: { required: "{{ __('This field is required') }}" },
                    reserve_hour1: { required: "{{ __('This field is required') }}" },
                    reserve_minut1: { required: "{{ __('This field is required') }}" },
                    reserve_month2: { required: "{{ __('This field is required') }}" },
                    reserve_day2: { required: "{{ __('This field is required') }}" },
                    reserve_hour2: { required: "{{ __('This field is required') }}" },
                    reserve_minut2: { required: "{{ __('This field is required') }}" },
                    reserve_month3: { required: "{{ __('This field is required') }}" },
                    reserve_day3: { required: "{{ __('This field is required') }}" },
                    reserve_hour3: { required: "{{ __('This field is required') }}" },
                    reserve_minut3: { required: "{{ __('This field is required') }}" },
                    reserve_cource: { required: "{{ __('This field is required') }}" }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.frm-inpt').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        })
    </script>

@endsection
