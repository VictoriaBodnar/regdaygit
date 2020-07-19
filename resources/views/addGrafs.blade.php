@extends('layouts.app')
@section('content')
<div class="w3-half w3-padding">
   <!-- Display Validation Errors -->
  @include('common.errors')
  <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{action('GrafController@store')}}">  
      {{csrf_field()}}
      <h3>Виміри - новий</h3><hr> 
      <input name="_method" type="hidden" value="POST">
      <div class="w3-section">
            <label>Код рядка</label>
            <input disabled type="text" class="w3-input w3-border w3-round" name="id" value="">
      </div>
      <div class="w3-section">
            <label>Код Споживача</label>
            <select name="kod_consumer" id="graf-kod_consumer" class="w3-select w3-border w3-round">
                 <option value=""></option>
                 @foreach($consumers as $consumer)
                 <option value="{{ $consumer->kod_consumer }}" >{{ $consumer->kod_consumer}} --- {{ $consumer->name_consumer}} </option>
                 @endforeach
            </select>
      </div>
      <div class="w3-section">
            <label>Дата виміру</label>
            <select name="date_zamer" id="graf-date_zamer" class="w3-select w3-border w3-round">
              <option value=""></option>
              @foreach($pasps as $pasp)
                <option value="{{ $pasp->date_zamer}}" >{{ $pasp->date_zamer }}</option>
              @endforeach
            </select>
      </div>
      <div class="w3-section">
            <label>Тип виміру</label>
            <select name="type_zamer" id="graf-type_zamer" class="w3-select w3-border w3-round">
              <option value=""></option>
              @foreach($types as $type)
                <option value="{{ $type->name_type }}" >{{ $type->name_type }}</option>
              @endforeach
            </select>
      </div>
      
      @for ($i = 1; $i < 25; $i++)
       <div class="w3-section">
            <label>{{$zzz='a'.$i}}</label>
            <input type="text" class="w3-input w3-border w3-round" name="{{$zzz}}" value="0">
       </div>       
      @endfor
      <div class="w3-section">
            <label>a_cyt</label>
            <input disabled type="text" class="w3-input w3-border w3-round w3-blue" name="a_cyt" value="0">
       </div>
       <div class="w3-section">
            <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">Зберегти</button>
        </div>    
    </form>
</div>
@endsection
