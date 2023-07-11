@extends('auth.layout')

@section('content')

<div class="login-container">
    <div class="login-form">
        <div class="login-content">
            <div class="tile-stats tile-primary"> 
                <h1 class="text-light">{{__('Sign In')}}</h1>
                <p class="text-light mb-3">{{__('Log in to your account to continue.')}}</p>
                <form method="post" action="{{ route('login') }}" role="form" id="form_login">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="text" class="form-control" name="username" placeholder="{{__('Username')}}" autocomplete="off" required />
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"> <i class="entypo-key"></i> </div> 
                            <input type="password" class="form-control" name="password" placeholder="{{__('Password')}}" autocomplete="off" required />
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="form-group"> 
                        <button type="submit" class="btn btn-primary btn-block btn-login"> 
                            <i class="entypo-login"></i>
                            {{__('Log In')}}
                        </button> 
                    </div>
                </form>
                <!-- <div class="login-bottom-links"> 
                    <a href="{{ route('forgot_password') }}" class="link">{{__('Forgot Password?')}}</a>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection