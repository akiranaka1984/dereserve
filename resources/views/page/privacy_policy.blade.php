@extends('page.layout')

@section('content')
  
    {!!  $header->text_data1 !!}
    {!!  $header->text_data2 !!}
    {!!  $header->text_data3 !!}
     
    <br/><br/><br/>
    {!!  $privacy_policy->text_data1 !!}
    {!!  $privacy_policy->text_data2 !!}
    {!!  $privacy_policy->text_data3 !!}

    <nav id="breadcrumbs">
        <ul class="contents" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.index') }}"><span itemprop="name">渋谷デリヘル</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.privacy_policy') }}"><span itemprop="name">プライバシーポリシー</span></a>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </nav>
    
@endsection

