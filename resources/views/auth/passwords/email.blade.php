@extends('layouts.app')

@section('content')

<div class="w3-half w3-padding">
    
    @if (session('status'))
        <div class="w3-panel w3-green">
            {{ session('status') }}
        </div>
    @endif
    <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
        <h2>Відновлення паролю</h2><hr>  
        <div class="w3-section {{ $errors->has('email') ? ' has-error' : '' }}">
            <label>E-Mail Адреса</label>
            <input id="email" type="email" class="w3-input w3-border w3-round" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                       <span class="w3-cell-row"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
        </div>
        <div class="w3-section">
            <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">Відправити посилання для відновлення паролю</button>
        </div>
    </form>
</div>

<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
