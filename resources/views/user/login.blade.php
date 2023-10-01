@extends('auth.layout')

@section('content')

<div class="login-container">
    <div class="login-form">
        <div class="login-content">
            <div class="tile-stats tile-primary"> 
                <h1 class="text-light">{{__('Sign In')}}</h1>
                <p class="text-light mb-3">{{__('Log in to your account to continue.')}}</p>

                 <script async src="https://telegram.org/js/telegram-widget.js?22" 
                    data-telegram-login="{{ $telegramCred->botname }}" 
                    data-size="large" 
                    data-onauth="onTelegramAuth(user)" 
                    data-request-access="write">
                </script>
                <script type="text/javascript">
                    function onTelegramAuth(user) {
                        document.getElementById('frm_id').value = user.id;
                        $('#form_login').submit()
                    }
                </script>
                
                <form method="post" action="{{ route('user.login') }}" role="form" id="form_login">
                    @csrf
                   <input type="hidden" class="form-control" id="frm_id" name="id" required />
                </form>

            </div>
        </div>
    </div>
</div>
@endsection