@extends('page.layout')

@section('content')
    <style>
        #index {
            background-image: url("{{ url('/assets/images/16177807506659_momotani_s2.jpg') }}");
        }

        @media screen and (min-width:1024px) {
            #index {
                background-image: url("{{ url('/assets/images/16177815289378_momotani.jpg') }}");
            }
        }
    </style>
    <div id="index">
        <article id="enter">
            <h1><img src="{{ url('/assets/images/index_logo.png') }}" width="391" height="102" alt="渋谷デリヘル風俗 CLUB 虎の穴 青山店"></h1>
            <p class="official_btn mincho"><a href="/main"><span>ENTER</span></a></p>
            <!-- <p class="prime_btn mincho"><a href="#"
                    target="_blank"><span>PRIME会員様</span></a></p> -->
        </article>
    </div>

@endsection

   