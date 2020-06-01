@extends('layouts.app')

@section('content')
<div class="w3-half w3-padding">
    <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

        <h2>Реєстрація</h2><hr>  
        <div class="w3-section {{ $errors->has('name') ? ' has-error' : '' }}">
            <label>Ім'я</label>
            <input id="name" type="text" class="w3-input w3-border w3-round" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                       <span class="w3-cell-row"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
        </div>
        <div class="w3-section {{ $errors->has('email') ? ' has-error' : '' }}">
            <label>E-Mail Адреса</label>
            <input id="email" type="email" class="w3-input w3-border w3-round" name="email" value="{{ old('email') }}" required>
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
            <label> Повторіть пароль </label>
            <input id="password-confirm" type="password" class="w3-input w3-border w3-round" name="password_confirmation" required>
        </div>
        <div class="w3-section">
            <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">Зареєструватись</button>
        </div>
    </form>
</div>
@endsection
