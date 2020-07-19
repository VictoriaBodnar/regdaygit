@extends('layouts.app')
@section('content')
<div class="w3-half w3-padding">
   <!-- Display Validation Errors -->
  @include('common.errors')
  <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{action('GrafController@update', $id)}}">  
      {{csrf_field()}}
      <h3>Виміри - змінити</h3><hr> 
      <input name="_method" type="hidden" value="PUT">
      <div class="w3-section">
            <label>Код рядка</label>
            <input disabled type="text" class="w3-input w3-border w3-round" name="id" value="{{$grafCur->id}}">
      </div>
      <div class="w3-section">
            <label>Код Споживача</label>
            <select name="kod_consumer" id="graf-kod_consumer" class="w3-select w3-border w3-round">
                  @foreach($consumers as $consumer)
                    {{$slmark=''}}
                    @if( $consumer->kod_consumer == $grafCur->kod_consumer)
                        {{$slmark='selected'}}
                    @endif
                    <option value="{{ $consumer->kod_consumer }}" {{ $slmark }}>{{ $consumer->kod_consumer}} --- {{ $consumer->name_consumer}} </option>
                  @endforeach
            </select>
      </div>
      <div class="w3-section">
            <label>Дата виміру</label>
            <select name="date_zamer" id="graf-date_zamer" class="w3-select w3-border w3-round">
              @foreach($pasps as $pasp)
                {{$slmark=''}}
                @if( $pasp->date_zamer == $grafCur->date_zamer)
                  {{$slmark='selected'}}
                @endif
                  <option value="{{ $pasp->date_zamer }}" {{ $slmark }}>{{ $pasp->date_zamer}}</option>
              @endforeach
            </select>
      </div>
      <div class="w3-section">
            <label>Тип виміру</label>
            <select name="type_zamer" id="graf-type_zamer" class="w3-select w3-border w3-round">
              @foreach($types as $type)
                {{$slmark=''}}
                @if( $type->name_type == $grafCur->type_zamer)
                  {{$slmark='selected'}}
                @endif
                  <option value="{{ $type->name_type }}" {{ $slmark }}>{{ $type->name_type}}</option>
              @endforeach
            </select>
      </div>
      
      @for ($i = 1; $i < 25; $i++)
       <div class="w3-section">
            <label>{{$zzz='a'.$i}}</label>
            <input type="text" class="w3-input w3-border w3-round" name="{{$zzz}}" value="{{$grafCur->$zzz}}">
       </div>       
      @endfor
      <div class="w3-section">
            <label>a_cyt</label>
            <input disabled type="text" class="w3-input w3-border w3-round w3-blue" name="a_cyt" value="{{$grafCur->a_cyt}}">
       </div>
       <div class="w3-section">
            <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">Зберегти</button>
        </div>    
    </form>
</div>
@endsection
