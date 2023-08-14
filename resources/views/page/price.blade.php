@extends('page.layout')

@section('content')
  
    {!!  $header->text_data1 !!}
    {!!  $header->text_data2 !!}
    {!!  $header->text_data3 !!}
     
    <article id="system">
        <h2 class="ttl"><span>SYSTEM</span></h2>
        <div id="course" class="inner">
            <div class="system contents">

                @foreach($categories as $category)
                    <div class="price">

                        @if($category->name == "BLACK")
                            <p class="legend mincho"><span><span>{{ $category->name }}</span></span></p>
                        @elseif($category->name == "PLATINUM")
                            <p class="platinum mincho"><span><span>{{ $category->name }}</span></span></p>
                        @elseif($category->name == "DIAMOND")
                            <p class="gold mincho"><span><span>{{ $category->name }}</span></span></p>
                        @elseif($category->name == "RED DIAMOND")
                            <p class="diamond mincho"><span><span>{{ $category->name }}</span></span></p>
                        @endif

                        @if(!empty($category->prices))
                            <div class="price_list">
                                @foreach($category->prices as $price)
                                    <p><span>{{ $price->time_interval }}</span><span>{{ $price->start_price }} {{ !empty($price->end_price) ? " ~ ".($price->end_price) : '' }}</span></p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach

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
                    href="{{ route('page.price') }}"><span itemprop="name">料金表</span></a>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </nav>
    
@endsection

