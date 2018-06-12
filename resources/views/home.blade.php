@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('/consumer_list') }}">Довідник споживачів</a></div>
                <div class="panel-heading"><a href="{{ url('/rems') }}">Довідник РЕМів</a></div>
                <div class="panel-heading"><a href="{{ url('/otrs') }}">Довідник галузей</a></div>
                <div class="panel-heading"><a href="{{ url('/pasps') }}">Паспорт задачі</a></div>
                <div class="panel-heading"><a href="{{ url('/types') }}">Тип виміру</a></div>
                
               <!-- <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>-->
            </div>
        </div>
    </div>
</div>
@endsection
