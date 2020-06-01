@extends('layouts.app')
@section('content')
<div class="w3-half w3-padding">
  @include('common.errors')
    <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{action('RemController@update', $id)}}">
                        {{ csrf_field() }}
        <h3>РЕМ - змінити</h3><hr>       
        <input name="_method" type="hidden" value="PATCH">
        <div class="w3-section">
            <label>Код РЕМ</label>
            <input type="text" class="w3-input w3-border w3-round" id="lgFormGroupInput"  name="kod_rem" value="{{$rem->kod_rem}}" required autofocus>
        </div>
        <div class="w3-section">
            <label>Назва РЕМ</label>
            <input type="text" class="w3-input w3-border w3-round" id="lgFormGroupInput"  name="name_rem" value="{{$rem->name_rem}}" required>
        </div>
        <div class="w3-section">
            <label>Код мережі</label>
            <select name="kod_seti" id="rem-kod_seti" class="w3-select w3-border w3-round">
                 <option value="{{$rem->kod_seti}}" selected>{{$rem->kod_seti}}</option>
                 <option value="7">7</option>
                 <option value="15">15</option>
            </select>
        </div>
        <div class="w3-section">
            <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">Зберегти</button>
        </div>
    </form>
</div>
@endsection