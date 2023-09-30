@extends('auth.layout')

@section('content')

<div class="login-container">
    <div class="login-form">
        <div class="login-content">
            <div class="tile-stats tile-primary"> 
                <h1 class="text-light">{{__('Registration')}}</h1>

                <form method="post" action="{{ route('user.web.reservation.save') }}" role="form" id="form_register">
                    @csrf

                    <input type="hidden" class="form-control" name="frm_comp_id" value="{{ $comp_id }}" required />
                     <input type="hidden" class="form-control" name="frm_user_id" value="{{ $users->id }}" required />

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="text" class="form-control" id="frm_first_name" name="frm_name" placeholder="{{__('Firstname')}}" value="{{ $users->name }}" readonly required />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="email" class="form-control" name="frm_email" placeholder="{{__('Email address')}}" value="{{ $users->email }}" readonly required />
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="text" class="form-control" name="frm_tel" placeholder="{{__('Tel')}}" autocomplete="off" required />
                            @if ($errors->has('tel'))
                                <span class="text-danger">{{ $errors->first('tel') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="text" class="form-control" name="frm_line_id" placeholder="{{__('Line ID')}}" autocomplete="off" required />
                            @if ($errors->has('line_id'))
                                <span class="text-danger">{{ $errors->first('line_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="text" class="form-control" name="frm_lady1" placeholder="{{__('Lady 1')}}" autocomplete="off" required />
                            @if ($errors->has('lady1'))
                                <span class="text-danger">{{ $errors->first('lady1') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <div class="date-and-time"> 
                                <input type="text" name="frm_date1" class="form-control datepicker" data-format="yyyy-mm-dd" value="{{ $today }}"> 
                                <input type="text" name="frm_time1" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM"
                                                    data-show-meridian="true" data-minute-step="5" data-second-step="5" value="{{ $time }}" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="text" class="form-control" name="frm_lady2" placeholder="{{__('Lady 2')}}" autocomplete="off" required />
                            @if ($errors->has('lady2'))
                                <span class="text-danger">{{ $errors->first('lady2') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <div class="date-and-time"> 
                                <input type="text" name="frm_date2" class="form-control datepicker" data-format="yyyy-mm-dd" value="{{ $today }}"> 
                                <input type="text" name="frm_time2" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM"
                                                    data-show-meridian="true" data-minute-step="5" data-second-step="5" value="{{ $time }}" />
                            </div>
                        </div>
                    </div>


                     <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="text" class="form-control" name="frm_lady3" placeholder="{{__('Lady 3')}}" autocomplete="off" required />
                            @if ($errors->has('lady3'))
                                <span class="text-danger">{{ $errors->first('lady3') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <div class="date-and-time"> 
                                <input type="text" name="frm_date3" class="form-control datepicker" data-format="yyyy-mm-dd" value="{{ $today }}"> 
                                <input type="text" name="frm_time3" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM"
                                                    data-show-meridian="true" data-minute-step="5" data-second-step="5" value="{{ $time }}" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group text-left"> 
                        <label for="frmCourse" class="control-label">ご希望のコース</label>
                        <div class="frm-inpt"> 
                            <select name="frm_course" class="form-control" id="frmCourse" requierd>
                                <option value="">選択してください</option>
                                @foreach($prices as $price)
                                    <option value="{{ $price->id }}">{{ $price->name }} {{ $price->time_interval }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group text-left"> 
                        <label for="frmPaymentMethod" class="control-label">お支払方法</label>
                        <div class="frm-inpt"> 
                            <select name="frm_payment_method" class="form-control" id="frmPaymentMethod" requierd>
                                <option value="">選択してください</option>
                                <option value="現金">現金</option>
                                <option value="クレジットカード">クレジットカード</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group text-left"> 
                        <label for="frmPaymentMethod" class="control-label">お支払方法</label>
                        <div class="frm-inpt"> 
                            <select name="frm_payment_method" class="form-control" id="frmPaymentMethod" requierd>
                                <option value="">選択してください</option>
                                <option value="現金">現金</option>
                                <option value="クレジットカード">クレジットカード</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group text-left"> 
                        <label for="frmOthers" class="control-label">その他</label>
                        <div class="frm-inpt"> 
                            <textarea name="frm_cmnt" class="form-control" id="frmOthers" rows="5" placeholder=""></textarea>
                        </div>
                    </div>

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