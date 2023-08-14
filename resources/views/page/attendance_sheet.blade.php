@extends('page.layout')

@section('content')

    {!!  $header->text_data1 !!}
    {!!  $header->text_data2 !!}
    {!!  $header->text_data3 !!}


    <article id="schedule" class="inner">
        <h2 class="ttl"><span>SCHEDULE</span></h2>

        {!!  $attendance_sheet->text_data1 !!}

        <div id="schedule_nav">
            <ul class="contents mincho">
                @foreach($schedule_dates as $key=>$dates)
                    <li><a href="{{ route('page.attendance_sheet', ['date'=>$key]) }}"><span>{{ $dates }}</span></a></li>
                @endforeach
            </ul>
        </div>
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
                       <a href="{{ route('page.details', ['id'=>$attendance->companion->id]) }}">
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
                   <p class="name"><a href="{{ route('page.details', ['id'=>$attendance->companion->id]) }}">{{ $attendance->companion->name }}（{{ $attendance->companion->age }}）</a></p>
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
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.main') }}"><span itemprop="name">トップ</span></a>
                <meta itemprop="position" content="2" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span
                    itemprop="name">出勤表</span>
                <meta itemprop="position" content="3" />
            </li>
        </ul>
    </nav>

@endsection
