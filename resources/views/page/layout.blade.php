<!DOCTYPE html>
<html lang="ja">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <head>
        <meta charset="UTF-8">
        <meta name="author" content="虎の穴グループ">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <title>トップページ｜高級デリヘル 六本木【フィレンツェ】</title>
        <meta name="description" content="高級デリヘル 六本木【Firenze〜フィレンツェ〜】のトップページです。当店は、外見・内面ともに最高ランクの美女のみを派遣し、非日常的で素敵なお時間をお客様にお約束致します。">
        <meta name="keywords" content="トップページ,東京">

        <link rel="apple-touch-icon" href="{{ url('/assets/images/dIcon.png') }}">
        <link rel="icon" href="{{ url('/assets/images/favicon.ico') }}">

        <link rel="stylesheet" href="{{ url('/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/index.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/detail.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/ranking.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/movie.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/schedule.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/price.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/system.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/girls.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/event.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/mail.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/recruit.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/reservation.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/entry.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/slick.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('/assets/css/splide-default.min.css') }}">

        <script src="{{ url('/assets/js/jquery.min.js') }}"></script>
        <script src="{{ url('/assets/js/common.js') }} "></script>
        <script src="{{ url('/assets/js/detail.js') }}"></script>
        <script src="{{ url('/assets/js/slick.min.js') }}"></script>
        <script src="{{ url('/assets/js/top.js') }}"></script>
        <script src="{{ url('/assets/js/schedule.js') }}"></script>
        <script src="{{ url('/assets/js/girls.js') }}"></script>
        <script src="{{ url('/assets/js/girlslist.js') }}"></script>
        <script src="{{ url('/assets/js/tab.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>    
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

        <script src="{{ url('/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ url('/assets/js/additional-methods.min.js') }}"></script>
        
        <script src="{{ url('/assets/js/sweetalert2.min.js') }}"></script>
        <script src="{{ url('/assets/js/toastr.js') }}"></script>
        <script src="{{ url('/assets/js/custom-alert1.js') }}"></script>
        
    </head>

    <body>

        @yield('content') 

        <footer id="footer">
            <div class="footer_inner">

                {!!  $footer->text_data1 !!}
                {!!  $footer->text_data2 !!}
                {!!  $footer->text_data3 !!}
                        
            </div>
        </footer>
    </body>
    <script>
        @if(session('error'))
            simpleMessage('error',`{{session('error')}}`);
        @endif
        @if(session('success'))
            simpleMessage('success',`{{session('success')}}`);
        @endif
    </script>
</html>