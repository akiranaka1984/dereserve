@extends('auth.layout')

@section('content')

<div class="login-container">
    <div class="login-form">
        <div class="login-content">
            <div class="tile-stats tile-primary"> 
                <h1 class="text-light">{{__('Sign In')}}</h1>
                <p class="text-light mb-3">{{__('Log in to your account to continue.')}}</p>

                 <script async src="https://telegram.org/js/telegram-widget.js?22" 
                    data-telegram-login="De_reserve_test_bot" 
                    data-size="large" 
                    data-onauth="onTelegramAuth(user)" 
                    data-request-access="write">
                </script>
                <script type="text/javascript">
                    function onTelegramAuth(user) {
                        document.getElementById('frm_id').value = user.id;
                        document.getElementById('frm_username').value = (user.username ? user.username : "");
                        document.getElementById('frm_photo_url').value = (user.photo_url ? user.photo_url : "");
                        document.getElementById('frm_auth_date').value = user.auth_date;
                        document.getElementById('frm_hash').value = user.hash;
                        document.getElementById('frm_first_name').value = user.first_name;
                        document.getElementById('frm_last_name').value = user.last_name;

                        $('#form_login').submit()
                    }
                </script>
                
                <form method="post" action="{{ route('user.login') }}" role="form" id="form_login">
                    @csrf
                   <input type="hidden" class="form-control" id="frm_id" name="id" required />
                    <div class="form-group"> 
                        <button type="submit" class="btn btn-primary btn-block btn-login"> 
                            <i class="entypo-login"></i>
                            {{__('Log In')}}
                        </button> 
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection