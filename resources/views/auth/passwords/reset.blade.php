@extends('layouts.app')

@section('content')

<div class="w3-half w3-padding">
    <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">                
        <h2>Відновлення паролю</h2><hr>  
        <div class="w3-section {{ $errors->has('email') ? ' has-error' : '' }}">
            <label>E-Mail Адреса</label>
            <input id="email" type="email" class="w3-input w3-border w3-round" name="email" value="{{ $email or old('email') }}" required autofocus>
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
        <div class="w3-section {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label>Повторіть пароль</label>
            <input id="password-confirm" type="password" class="w3-input w3-border w3-round" name="password_confirmation" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="w3-cell-row"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                    @endif
        </div>
        <div class="w3-section">
            <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">Скинути пароль</button>
        </div>
    </form>
</div>

@endsection
