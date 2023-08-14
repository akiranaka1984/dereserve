@extends('page.layout')

@section('content')
  
    {!!  $header->text_data1 !!}
    {!!  $header->text_data2 !!}
    {!!  $header->text_data3 !!}
     

    {!!  $main->text_data1 !!}

    <article id="newface" class="inner">
        <h2 class="ttl"><span>NEW&nbsp;FACE</span></h2>
        <div class="girls_list contents">
            
            @foreach($new_companions as $new_companion)
                @php
                    if(!empty($new_companion->home_image)){
                        $imgPath = '/storage/photos/'.($new_companion->id).'/'.($new_companion->home_image->photo);       
                    }else{
                        $imgPath = '/storage/photos/default/images.jpg';       
                    }
                @endphp 
                <section class="girl">
                    <h3 class="image">
                        <a href="{{ route('page.details', ['id'=>$new_companion->id]) }}">
                            <img src="{{ $imgPath }}" loading="lazy" width="180" height="255" alt="{{ $new_companion->name }}（{{ $new_companion->age }}）" style="width: 160px;height: 200px;" >
                        </a>
                    </h3>

                    @if($new_companion->category->name == "BLACK")
                        <p class="tiger_736 mincho"><span><span>{{ $new_companion->category->name }}</span></span></p>
                    @elseif($new_companion->category->name == "PLATINUM")
                        <p class="tiger_201 mincho"><span><span>{{ $new_companion->category->name }}</span></span></p>
                    @elseif($new_companion->category->name == "DIAMOND")
                        <p class="tiger_200 mincho"><span><span>{{ $new_companion->category->name }}</span></span></p>
                    @elseif($new_companion->category->name == "RED DIAMOND")
                        <p class="tiger_202 mincho"><span><span>{{ $new_companion->category->name }}</span></span></p>
                    @endif

                    <p class="comment">{{ mb_substr(strip_tags($new_companion->sale_point),0,8) }}</p>
                    <p class="name"><a href="{{ route('page.details', ['id'=>$new_companion->id]) }}">{{ $new_companion->name }}（{{ $new_companion->age }}）</a></p>
                    <p class="size">T{{ $new_companion->height }}<br>B{{ $new_companion->bust }}({{ $new_companion->cup }})&nbsp;W{{ $new_companion->waist }}&nbsp;H{{ $new_companion->hip }}</p>
                    <div class="option">
                        <ul>
                            <li>
                                @if($new_companion->option_non_japanese_chk == 1)
                                    <img src="{{ url('/assets/images/option_non_japanese.svg') }}" width="51" height="51" alt="外国人対応可">
                                @else
                                    <img src="{{ url('/assets/images/option_non_japanese_no.svg') }}" width="51" height="51" alt="外国人対応可">
                                @endif
                            </li>
                            <li>
                                @if($new_companion->option_3p_chk == 1)
                                    <img src="{{ url('/assets/images/option_3p.svg') }}" width="51" height="51" alt="3Pコース">
                                @else
                                    <img src="{{ url('/assets/images/option_3p_no.svg') }}" width="51" height="51" alt="3Pコース">
                                @endif
                            </li>
                            <li>
                                @if($new_companion->option_av_chk == 1)
                                    <img src="{{ url('/assets/images/option_av.svg') }}" width="51" height="51" alt="AV女優">
                                @else
                                    <img src="{{ url('/assets/images/option_av_no.svg') }}" width="51" height="51" alt="AV女優">
                                @endif
                            </li>
                            <li>
                                @if($new_companion->option_newface_chk == 1)
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
    </article>

    {!!  $main->text_data2 !!}

    {!!  $main->text_data3 !!}

    <article id="newface" class="inner">
        <h2 class="ttl"><span>本日の出勤</span></h2>
        <div class="girls_list contents">
             @foreach($today_attendances as $attendance)
                <section class="girl">
                    @php
                        if(!empty($attendance->companion)){
                            $imgPath = '/storage/photos/'.($attendance->companion->id).'/'.($attendance->companion->home_image->photo);       
                        }else{
                            $imgPath = '/storage/photos/default/images.jpg';       
                        }
                    @endphp 
                    <h3 class="image">
                        <a href="{{ route('page.details', ['id'=>$attendance->id]) }}">
                            <img src="{{ $imgPath }}" loading="lazy" width="180" height="255" alt="AIKA" style="width: 160px;height: 200px;">
                        </a>
                    </h3>
                    @if($attendance->companion->category->name == "BLACK")
                        <p class="tiger_736 mincho"><span><span>{{ $attendance->companion->category->name }}</span></span></p>
                    @elseif($attendance->companion->category->name == "PLATINUM")
                        <p class="tiger_201 mincho"><span><span>{{ $attendance->companion->category->name }}</span></span></p>
                    @elseif($attendance->companion->category->name == "DIAMOND")
                        <p class="tiger_200 mincho"><span><span>{{ $attendance->companion->category->name }}</span></span></p>
                    @elseif($attendance->companion->category->name == "RED DIAMOND")
                        <p class="tiger_202 mincho"><span><span>{{ $attendance->companion->category->name }}</span></span></p>
                    @endif

                    <p class="syukkin">{{ $attendance->start_time }}～{{ $attendance->end_time }}</p>
                    <p class="name"><a href="{{ route('page.details', ['id'=>$attendance->id]) }}">{{ $attendance->companion->name }}（{{ $attendance->companion->age }}）</a></p>
                    <p class="size">T{{ $attendance->companion->height }}<br>B{{ $attendance->companion->bust }}({{ $attendance->companion->cup }})&nbsp;W{{ $attendance->companion->waist }}&nbsp;H{{ $attendance->companion->hip }}</p>
                    <div class="option">
                        <ul>
                            <li>
                                @if($attendance->companion->option_non_japanese_chk == 1)
                                    <img src="{{ url('/assets/images/option_non_japanese.svg') }}" width="51" height="51" alt="外国人対応可">
                                @else
                                    <img src="{{ url('/assets/images/option_non_japanese_no.svg') }}" width="51" height="51" alt="外国人対応可">
                                @endif
                            </li>
                            <li>
                                @if($attendance->companion->option_3p_chk == 1)
                                    <img src="{{ url('/assets/images/option_3p.svg') }}" width="51" height="51" alt="3Pコース">
                                @else
                                    <img src="{{ url('/assets/images/option_3p_no.svg') }}" width="51" height="51" alt="3Pコース">
                                @endif
                            </li>
                            <li>
                                @if($attendance->companion->option_av_chk == 1)
                                    <img src="{{ url('/assets/images/option_av.svg') }}" width="51" height="51" alt="AV女優">
                                @else
                                    <img src="{{ url('/assets/images/option_av_no.svg') }}" width="51" height="51" alt="AV女優">
                                @endif
                            </li>
                            <li>
                                @if($attendance->companion->option_newface_chk == 1)
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
    </article>

    <article id="newface" class="inner">
        <h2 class="ttl"><span>明日の出勤</span></h2>
        <div class="girls_list contents">
            @foreach($tomorrow_attendances as $attendance)
                <section class="girl">
                    @php
                        if(!empty($attendance->companion)){
                            $imgPath = '/storage/photos/'.($attendance->companion->id).'/'.($attendance->companion->home_image->photo);       
                        }else{
                            $imgPath = '/storage/photos/default/images.jpg';       
                        }
                    @endphp 
                    <h3 class="image">
                        <a href="{{ route('page.details', ['id'=>$attendance->id]) }}">
                            <img src="{{ $imgPath }}" loading="lazy" width="180" height="255" alt="{{ $attendance->companion->name }}" style="width: 160px;height: 200px;">
                        </a>
                    </h3>
                    @if($attendance->companion->category->name == "BLACK")
                        <p class="tiger_736 mincho"><span><span>{{ $attendance->companion->category->name }}</span></span></p>
                    @elseif($attendance->companion->category->name == "PLATINUM")
                        <p class="tiger_201 mincho"><span><span>{{ $attendance->companion->category->name }}</span></span></p>
                    @elseif($attendance->companion->category->name == "DIAMOND")
                        <p class="tiger_200 mincho"><span><span>{{ $attendance->companion->category->name }}</span></span></p>
                    @elseif($attendance->companion->category->name == "RED DIAMOND")
                        <p class="tiger_202 mincho"><span><span>{{ $attendance->companion->category->name }}</span></span></p>
                    @endif

                    <p class="syukkin">{{ $attendance->start_time }}～{{ $attendance->end_time }}</p>
                    <p class="name"><a href="{{ route('page.details', ['id'=>$attendance->id]) }}">{{ $attendance->companion->name }}（{{ $attendance->companion->age }}）</a></p>
                    <p class="size">T{{ $attendance->companion->height }}<br>B{{ $attendance->companion->bust }}({{ $attendance->companion->cup }})&nbsp;W{{ $attendance->companion->waist }}&nbsp;H{{ $attendance->companion->hip }}</p>
                    <div class="option">
                        <ul>
                            <li>
                                @if($attendance->companion->option_non_japanese_chk == 1)
                                    <img src="{{ url('/assets/images/option_non_japanese.svg') }}" width="51" height="51" alt="外国人対応可">
                                @else
                                    <img src="{{ url('/assets/images/option_non_japanese_no.svg') }}" width="51" height="51" alt="外国人対応可">
                                @endif
                            </li>
                            <li>
                                @if($attendance->companion->option_3p_chk == 1)
                                    <img src="{{ url('/assets/images/option_3p.svg') }}" width="51" height="51" alt="3Pコース">
                                @else
                                    <img src="{{ url('/assets/images/option_3p_no.svg') }}" width="51" height="51" alt="3Pコース">
                                @endif
                            </li>
                            <li>
                                @if($attendance->companion->option_av_chk == 1)
                                    <img src="{{ url('/assets/images/option_av.svg') }}" width="51" height="51" alt="AV女優">
                                @else
                                    <img src="{{ url('/assets/images/option_av_no.svg') }}" width="51" height="51" alt="AV女優">
                                @endif
                            </li>
                            <li>
                                @if($attendance->companion->option_newface_chk == 1)
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
    </article>

    <nav id="breadcrumbs">
        <ul class="contents" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.index') }}"><span itemprop="name">渋谷デリヘル</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span
                    itemprop="name">トップ</span>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </nav>
    
@endsection