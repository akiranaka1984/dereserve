<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="Laborator.co" />
        <link rel="icon" href="{{ url('/assets/images/favicon.ico') }}">
        <title>管理パネル</title>
        <link rel="stylesheet" href="{{ url('/assets/css/jquery-ui-1.10.3.custom.min.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/entypo.css') }}">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/neon-core.css') }}?v=1.4" >
        <link rel="stylesheet" href="{{ url('/assets/css/neon-theme.css') }}?v=1.4" >
        <link rel="stylesheet" href="{{ url('/assets/css/neon-forms.css') }}?v=1.4" >
        <link rel="stylesheet" href="{{ url('/assets/css/custom.css') }}?v=1.4" >
        <link rel="stylesheet" href="{{ url('/assets/css/fullcalendar.min.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/sweetalert2.min.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/select2-bootstrap.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/select2.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/datatables.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/dragula.css') }}" >

        <script src="{{ url('/assets/js/jquery-1.11.3.min.js') }}"></script>
        <script src="{{ url('/assets/js/TweenMax.min.js') }}"></script>
        <script src="{{ url('/assets/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
        <script src="{{ url('/assets/js/bootstrap.js') }}"></script>
        <script src="{{ url('/assets/js/joinable.js') }}"></script>
        <script src="{{ url('/assets/js/resizeable.js') }}"></script>
        <script src="{{ url('/assets/js/neon-api.js') }}"></script>
        <script src="{{ url('/assets/js/cookies.min.js') }}"></script>
  
        <script src="{{ url('/assets/js/neon-chat.js') }}"></script>
        <script src="{{ url('/assets/js/neon-login.js') }}"></script>
        <script src="{{ url('/assets/js/neon-custom.js') }}"></script>
        <script src="{{ url('/assets/js/neon-demo.js') }}"></script>
        <script src="{{ url('/assets/js/jquery.multi-select.js') }}"></script>
        <script src="{{ url('/assets/js/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ url('/assets/js/sweetalert2.min.js') }}"></script>
        <script src="{{ url('/assets/js/fileinput.js') }}"></script>
        <script src="{{ url('/assets/js/custom-alert.js') }}"></script>
        <script src="{{ url('/assets/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ url('/assets/js/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ url('/assets/js/moment.min.js') }}"></script>
        <script src="{{ url('/assets/js/toastr.js') }}"></script>

        <script src="{{ url('/assets/js/select2.min.js') }}"></script>
        <script src="{{ url('/assets/js/dragula.min.js') }}"></script>
        <script src="{{ url('/assets/js/datatables.js') }}"></script>
        <script src="{{ url('/assets/js/fullcalendar.min.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script src="{{ url('/assets/js/bootstrap.js') }}"></script>
        <script src="{{ url('/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ url('/assets/js/additional-methods.min.js') }}"></script>
        
    </head>

    <body class="page-body">
        <div class="page-container">
            <div class="sidebar-menu">
                <div class="sidebar-menu-inner">
                    <header class="logo-env">
                        <div class="logo"> <a href="/"> <img src="{{ url('/assets/images/logo@2x.png') }}" width="120" alt /> </a>  </div>
                        <div class="sidebar-collapse"> <a href="#" class="sidebar-collapse-icon"> <i class="entypo-menu"></i> </a> </div>
                        <div class="sidebar-mobile-menu visible-xs"> <a href="#" class="with-animation"> <i class="entypo-menu"></i> </a> </div>
                    </header>
                    <ul id="main-menu" class="main-menu">
                        <li> 
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4" d="M44 40.836c-4.893-5.973-9.238-9.362-13.036-10.168c-3.797-.805-7.412-.927-10.846-.365V41L4 23.545L20.118 7v10.167c6.349.05 11.746 2.328 16.192 6.833c4.445 4.505 7.009 10.117 7.69 16.836Z" clip-rule="evenodd"/></svg>
                                <span class="title ml-1">サイトに戻る</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div class="row">
                    <div class="col-md-9 col-sm-8 clearfix">
                    </div>
                    <div class="col-md-3 col-sm-4 clearfix hidden-xs">
                        <ul class="list-inline links-list pull-right">
                            <li> 
                                <a href="{{ route('user.signout') }}" class="btn btn-danger sidemenu-href">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M10 20a10 10 0 1 1 0-20a10 10 0 0 1 0 20zm5-11H5v2h10V9z"/></svg>
                                    <span class="title ml-1">ログアウト</span> </a> 
                            </li>
                        </ul>
                    </div>
                </div>

                @yield('content') 
                
            </div>
        </div>
       

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