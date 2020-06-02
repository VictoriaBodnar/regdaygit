@extends('layouts.app')
@section('content')
<div class="w3-half w3-padding">
  @include('common.errors')
    <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{action('TypeController@update', $id)}}">
                        {{ csrf_field() }}
        <h3>Тип виміру - змінити</h3><hr>       
        <input name="_method" type="hidden" value="PATCH">
        <div class="w3-section">
            <label>Назва типу</label>
             <input type="text" class="w3-input w3-border w3-round" id="lgFormGroupInput"  name="name_type" value="{{$type->name_type}}" required autofocus>
        </div>
        <div class="w3-section">
            <label>Примітка</label>
            <input type="text" class="w3-input w3-border w3-round" id="lgFormGroupInput"  name="primitka" value="{{$type->primitka}}" required>
        </div>
        <div class="w3-section">
            <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">Зберегти</button>
        </div>
    </form>
</div>
@endsection