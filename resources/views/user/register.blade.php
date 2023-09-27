@extends('auth.layout')

@section('content')

<div class="login-container">
    <div class="login-form">
        <div class="login-content">
            <div class="tile-stats tile-primary"> 

                <script async src="https://telegram.org/js/telegram-widget.js?2"
                        data-telegram-login="De_reserve_test_bot"
                        data-size="large"
                        data-radius="10"
                        data-auth-url="{{ route('user.register.save') }}"
                        data-request-access="phone">
                </script>
       
            </div>
        </div>
    </div>
</div>
@endsection