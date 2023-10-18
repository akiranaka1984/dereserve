@extends('page.layout')

@section('content')

    {!!  $header->text_data1 !!}
    {!!  $header->text_data2 !!}
    {!!  $header->text_data3 !!}

    <article id="girls">
        <h2 class="ttl"><span>GIRLS</span></h2>
        {!! $avs->text_data1 !!}

        
            <div id="girls_contents" class="contents">
                <div class="girls_nav">
                    <ul>
                        <li>
                            <div class="inner">
                                <p class="mincho">在籍女性検索</p>
                                <p><span>&nbsp;</span><span>&nbsp;</span></p>
                            </div>
                        </li>
                        <li>
                            <div class="inner">
                                <p class="mincho">出勤お知らせ</p>
                                <p><span>&nbsp;</span><span>&nbsp;</span></p>
                            </div>
                        </li>
                    </ul>
                </div>
                @if(!empty((array)$search_param))
                    <div class="girls_search girls_slide" style="display:block;">
                @else
                    <div class="girls_search">
                @endif
                    <form action="#" name="main" method="get">
                        <div class="inner">
                            <div class="prime_txt">
                                <p>こちらの機能は虎の穴PRIME会員ページにてご利用いただけます。</p>
                                <p class="btn mincho"><a href="https://tora-group.com/benefits/"
                                        target="_blank">新規会員登録の方はこちらから</a></p>
                            </div>
                            <ul>
                                <li>
                                    <p>新人割</p>
                                    <input type="checkbox" name="search_newface" id="search_newface" {{ !empty($search_param->search_newface) ? 'checked' : '' }} >
                                    <label for="search_newface" class="girls_search_label"></label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>動画</p>
                                    <input type="checkbox" name="search_movie" id="search_movie" {{ !empty($search_param->search_movie) ? 'checked' : '' }} >
                                    <label for="search_movie" class="girls_search_label"></label>
                                </li>
                                <!-- <li>
                                    <p>グラビア</p>
                                    <input type="checkbox" name="search_gravure" id="search_gravure">
                                    <label for="search_gravure" class="girls_search_label"></label>
                                </li> -->
                                <!-- <li>
                                    <p>目出し写真あり</p>
                                    <input type="checkbox" name="search_pic_medashi" id="search_pic_medashi">
                                    <label for="search_pic_medashi" class="girls_search_label"></label>
                                </li> -->
                                <li>
                                    <p>顔出し写真あり</p>
                                    <input type="checkbox" name="search_pic_kaodashi" id="search_pic_kaodashi" {{ !empty($search_param->search_pic_kaodashi) ? 'checked' : '' }}  >
                                    <label for="search_pic_kaodashi" class="girls_search_label"></label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>18～19歳</p>
                                    <input type="checkbox" name="search_age18" id="search_age18" {{ !empty($search_param->search_age18) ? 'checked' : '' }} >
                                    <label for="search_age18" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>20～24歳</p>
                                    <input type="checkbox" name="search_age20" id="search_age20" {{ !empty($search_param->search_age20) ? 'checked' : '' }} >
                                    <label for="search_age20" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>25～29歳</p>
                                    <input type="checkbox" name="search_age25" id="search_age25" {{ !empty($search_param->search_age25) ? 'checked' : '' }} >
                                    <label for="search_age25" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>30歳以上</p>
                                    <input type="checkbox" name="search_age30" id="search_age30" {{ !empty($search_param->search_age30) ? 'checked' : '' }} >
                                    <label for="search_age30" class="girls_search_label"></label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>149cm以下</p>
                                    <input type="checkbox" name="search_height149" id="search_height149" {{ !empty($search_param->search_height149) ? 'checked' : '' }} >
                                    <label for="search_height149" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>150cm～154cm</p>
                                    <input type="checkbox" name="search_height150" id="search_height150" {{ !empty($search_param->search_height150) ? 'checked' : '' }} >
                                    <label for="search_height150" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>155cm～159cm</p>
                                    <input type="checkbox" name="search_height155" id="search_height155" {{ !empty($search_param->search_height155) ? 'checked' : '' }} >
                                    <label for="search_height155" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>160cm～164cm</p>
                                    <input type="checkbox" name="search_height160" id="search_height160" {{ !empty($search_param->search_height160) ? 'checked' : '' }} >
                                    <label for="search_height160" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>165cm～169cm</p>
                                    <input type="checkbox" name="search_height165" id="search_height165" {{ !empty($search_param->search_height165) ? 'checked' : '' }} >
                                    <label for="search_height165" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>170cm以上</p>
                                    <input type="checkbox" name="search_height170" id="search_height170" {{ !empty($search_param->search_height170) ? 'checked' : '' }} >
                                    <label for="search_height170" class="girls_search_label"></label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>Aカップ</p>
                                    <input type="checkbox" name="search_bust_a" id="search_bust_a" {{ !empty($search_param->search_bust_a) ? 'checked' : '' }} >
                                    <label for="search_bust_a" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>Bカップ</p>
                                    <input type="checkbox" name="search_bust_b" id="search_bust_b" {{ !empty($search_param->search_bust_b) ? 'checked' : '' }} >
                                    <label for="search_bust_b" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>Cカップ</p>
                                    <input type="checkbox" name="search_bust_c" id="search_bust_c" {{ !empty($search_param->search_bust_c) ? 'checked' : '' }} >
                                    <label for="search_bust_c" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>Dカップ</p>
                                    <input type="checkbox" name="search_bust_d" id="search_bust_d" {{ !empty($search_param->search_bust_d) ? 'checked' : '' }} >
                                    <label for="search_bust_d" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>Eカップ</p>
                                    <input type="checkbox" name="search_bust_e" id="search_bust_e" {{ !empty($search_param->search_bust_e) ? 'checked' : '' }} >
                                    <label for="search_bust_e" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>Fカップ</p>
                                    <input type="checkbox" name="search_bust_f" id="search_bust_f" {{ !empty($search_param->search_bust_f) ? 'checked' : '' }} >
                                    <label for="search_bust_f" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>Gカップ</p>
                                    <input type="checkbox" name="search_bust_g" id="search_bust_g" {{ !empty($search_param->search_bust_g) ? 'checked' : '' }} >
                                    <label for="search_bust_g" class="girls_search_label"></label>
                                </li>
                                <li>
                                    <p>Hカップ以上</p>
                                    <input type="checkbox" name="search_bust_h" id="search_bust_h" {{ !empty($search_param->search_bust_h) ? 'checked' : '' }} >
                                    <label for="search_bust_h" class="girls_search_label"></label>
                                </li>
                            </ul>
                            <p class="girls_search_text_input">
                                <input type="text" name="girls_search_text" class="girls_search_text p-1" value="{{ !empty($search_param->girls_search_text) ? $search_param->girls_search_text : '' }}" placeholder="名前で検索"></p>

                            <button type="submit" class="black_btn">検索</button>        
                        </div>
                    </form>
                </div>
                <div class="girls_schedule_mail">
                    <div class="inner">
                        <div class="txt">
                            <p>出勤お知らせメールのご登録は簡単！！<br>気になる虎嬢の下にある<span>「出勤お知らせ」のチェックボックスにチェック</span>を入れて、お名前とメールアドレスを登録するだけ！！<br>女の子の出勤が確定したら、ご登録のメールアドレスへ出勤お知らせメールが配信されます！！
                            </p>
                            <p>※通常のメールマガジンとは異なり女性の出勤が確定時のみメールが配信されます。</p>
                        </div>
                        <div class="form">
                            <form action="{{ route('page.attendance_notices.save') }}" method="post">
                                @csrf
                                <input type="text" name="name" class="form-control" value="" placeholder="お名前をご入力ください。" required>
                                <input type="email" name="mail_addr" class="form-control" value="" placeholder="メールアドレスをご入力ください。" required>
                                <input type="hidden" name="mail_actors" class="form-control mail_actors" value="">
                                <div class="btn_area">
                                    <p class="btn"> <input type="submit" name="castsyukkinmail_add" class="mincho" value="登録" > </p>
                                    <p class="btn"> <input type="submit" name="castsyukkinmail_del" class="mincho" value="解除"> </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="girls_all">
                @foreach($all_records as $key => $records)
                    <section id="tiger_l" class="inner">
                        <h3 class="ttl"><span>{{ $key }}</span></h3>
                        <div class="girls_list contents">
                            @foreach($records as $companion)
                                <section class="girl">
                                    @php
                                        if(!empty($companion) && !empty($companion->home_image->photo)){
                                            $imgPath = '/storage/photos/'.($companion->id).'/'.($companion->home_image->photo);       
                                        }else{
                                            $imgPath = '/storage/photos/default/images.jpg';       
                                        }
                                    @endphp 
                                    <h4 class="image">
                                        <a href="{{ route('page.details', ['id'=>$companion->id]) }}">
                                            <img src="{{ $imgPath }}" loading="lazy" width="180" height="255" alt="{{ $companion->name }}" style="width: 160px;height: 200px;">
                                        </a>
                                    </h4>
                                    
                                    @if($companion->category->name == "BLACK")
                                        <p class="tiger_736 mincho"><span><span>{{ $companion->category->name }}</span></span></p>
                                    @elseif($companion->category->name == "PLATINUM")
                                        <p class="tiger_201 mincho"><span><span>{{ $companion->category->name }}</span></span></p>
                                    @elseif($companion->category->name == "DIAMOND")
                                        <p class="tiger_200 mincho"><span><span>{{ $companion->category->name }}</span></span></p>
                                    @elseif($companion->category->name == "RED DIAMOND")
                                        <p class="tiger_202 mincho"><span><span>{{ $companion->category->name }}</span></span></p>
                                    @endif

                                    <p class="name"><a href="{{ route('page.details', ['id'=>$companion->id]) }}">{{ $companion->name }}（{{ $companion->age }}）</a></p>
                                    <p class="size">T{{ $companion->height }}<br>B{{ $companion->bust }}({{ $companion->cup }})&nbsp;W{{ $companion->waist }}&nbsp;H{{ $companion->hip }}</p>
                                    <p class="notice">
                                        <input type="checkbox" name="cast_id_list" value="{{ $companion->id }}" class="cast_id_list" id="notice_checkbox{{ $companion->id }}">
                                        <label for="notice_checkbox{{ $companion->id }}">出勤お知らせ</label>
                                    </p>
                                    <div class="option">
                                        <ul>
                                            <li>
                                                @if($companion->option_non_japanese_chk == 1)
                                                    <img src="{{ url('/assets/images/option_non_japanese.svg') }}" width="51" height="51" alt="外国人対応可">
                                                @else
                                                    <img src="{{ url('/assets/images/option_non_japanese_no.svg') }}" width="51" height="51" alt="外国人対応可">
                                                @endif
                                            </li>
                                            <li>
                                                @if($companion->option_3p_chk == 1)
                                                    <img src="{{ url('/assets/images/option_3p.svg') }}" width="51" height="51" alt="3Pコース">
                                                @else
                                                    <img src="{{ url('/assets/images/option_3p_no.svg') }}" width="51" height="51" alt="3Pコース">
                                                @endif
                                            </li>
                                            <li>
                                                @if($companion->option_av_chk == 1)
                                                    <img src="{{ url('/assets/images/option_av.svg') }}" width="51" height="51" alt="AV女優">
                                                @else
                                                    <img src="{{ url('/assets/images/option_av_no.svg') }}" width="51" height="51" alt="AV女優">
                                                @endif
                                            </li>
                                            <li>
                                                @if($companion->option_newface_chk == 1)
                                                    <img src="{{ url('/assets/images/option_newface.svg') }}" width="51" height="51" alt="新人割">
                                                @else
                                                    <img src="{{ url('/assets/images/option_newface_no.svg') }}" width="51" height="51" alt="新人割">
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </section>
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </div>
    </article>
    <script>
        $(document).ready(function(){
            $(document).on('click','.cast_id_list', function(){
                let cast_id_list = []
                $('.cast_id_list:checked').each(function(){
                    cast_id_list.push($(this).val())
                })
                $('.mail_actors').val(cast_id_list.join('-'));
            })
        })
    </script>
@endsection