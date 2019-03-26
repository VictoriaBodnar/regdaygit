@extends('layouts.app')
@section('content')
<div class="container">
   <!-- Display Validation Errors -->
  @include('common.errors')
  <form method="post" action="{{action('GrafController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
      <input name="_method" type="hidden" value="PUT"><!-- або  {{ method_field('PUT') }}-->
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код рядка</label>
      <div class="col-sm-10">
        <input disabled type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="id" value="{{$grafCur->id}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код Споживача</label>
      <div class="col-sm-10">
        <select name="kod_consumer" id="graf-kod_consumer" class="form-control" id="lgFormGroupSelect">
                                    @foreach($consumers as $consumer)
                                      {{$slmark=''}}
                                      @if( $consumer->kod_consumer == $grafCur->kod_consumer)
                                        {{$slmark='selected'}}
                                      @endif
                                        <option value="{{ $consumer->kod_consumer }}" {{ $slmark }}>{{ $consumer->kod_consumer}} --- {{ $consumer->name_consumer}} </option>
                                    @endforeach
        </select>
      </div>
    </div>    
    <div class="form-group row">  
      <label for="lgFormGroupSelect" class="col-sm-2 col-form-label col-form-label-lg">Дата виміру</label>
      <div class="col-sm-10">
        <select name="date_zamer" id="graf-date_zamer" class="form-control" id="lgFormGroupSelect">
                                    @foreach($pasps as $pasp)
                                      {{$slmark=''}}
                                      @if( $pasp->date_zamer == $grafCur->date_zamer)
                                        {{$slmark='selected'}}
                                      @endif
                                        <option value="{{ $pasp->date_zamer }}" {{ $slmark }}>{{ $pasp->date_zamer}}</option>
                                    @endforeach
        </select>
        
      </div>
    </div>
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Тип виміру</label>
      <div class="col-sm-10">
        <select name="type_zamer" id="graf-type_zamer" class="form-control" id="lgFormGroupSelect">
                                    @foreach($types as $type)
                                      {{$slmark=''}}
                                      @if( $type->name_type == $grafCur->type_zamer)
                                        {{$slmark='selected'}}
                                      @endif
                                        <option value="{{ $type->name_type }}" {{ $slmark }}>{{ $type->name_type}}</option>
                                    @endforeach
        </select>
       
      </div>
    </div>
    @for ($i = 1; $i < 25; $i++)
              
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg"> {{$zzz='a'.$i}}</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="{{$zzz}}" value="{{$grafCur->$zzz}}">
      </div>
    </div>
    @endfor
    <div class="form-group row">  
     <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">  a_cyt</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="a_cyt" value="{{$grafCur->a_cyt}}">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Зберегти</button>
    </div>
  </form>
</div>
@endsection
