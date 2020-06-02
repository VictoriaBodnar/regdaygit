@extends('layouts.app')

@section('content')
<div class="w3-half w3-padding">
    <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

        <h2>Вхід</h2><hr>  
        <div class="w3-section {{ $errors->has('email') ? ' has-error' : '' }}">
            <label>E-Mail Адреса</label>
            <input id="email" type="email" class="w3-input w3-border w3-round" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                       <span class="w3-cell-row"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
        </div>
        <div class="w3-section {{ $errors->has('password') ? ' has-error' : '' }}">
            <label>Пароль</label>
            <input id="password" type="password" class="w3-input w3-border w3-round" name="password" required>
                    @if ($errors->has('password'))
                        <span class="w3-cell-row"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif
        </div>
        <div class="w3-section ">
            <label> Запам'ятати мене </label>
            <input class="w3-check" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
        </div>
        <div class="w3-section">
            <!--<a class="w3-button w3-circle w3-large w3-black"><i class="fa fa-plus"></i></a>-->
            <!--<button type="submit" class="w3-bar-item w3-button">LOGIN</button>                   w3-bar-item w3-button w3-padding-16-->
            <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">Увійти</button>
            <a class="#" href="{{ route('password.request') }}">Забули пароль?</a>
        </div>
    </form>
</div>
@endsection
