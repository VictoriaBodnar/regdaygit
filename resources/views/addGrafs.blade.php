@extends('layouts.app')
@section('content')
<div class="container">
   <!-- Display Validation Errors -->
  @include('common.errors')
  <form method="post" action="{{action('GrafController@store')}}">
    <div class="form-group row">
      {{csrf_field()}}
      <input name="_method" type="hidden" value="POST">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код рядка</label>
      <div class="col-sm-10">
        <input disabled type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="id" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код Споживача</label>
      <div class="col-sm-10">
        <select name="kod_consumer" id="graf-kod_consumer" class="form-control" id="lgFormGroupSelect">
                                    <option value=""></option>
                                    @foreach($consumers as $consumer)
                                      <option value="{{ $consumer->kod_consumer }}" >{{ $consumer->kod_consumer}} --- {{ $consumer->name_consumer}} </option>
                                    @endforeach
        </select>
      </div>
    </div>    
    <div class="form-group row">  
      <label for="lgFormGroupSelect" class="col-sm-2 col-form-label col-form-label-lg">Дата виміру</label>
      <div class="col-sm-10">
        <select name="date_zamer" id="graf-date_zamer" class="form-control" id="lgFormGroupSelect">
                                    <option value=""></option>
                                    @foreach($pasps as $pasp)
                                      <option value="{{ $pasp->date_zamer }}" >{{ $pasp->date_zamer}}</option>
                                    @endforeach
        </select>
        
      </div>
    </div>
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Тип виміру</label>
      <div class="col-sm-10">
        <select name="type_zamer" id="graf-type_zamer" class="form-control" id="lgFormGroupSelect">
                                    <option value=""></option>
                                    @foreach($types as $type)
                                      <option value="{{ $type->name_type }}" >{{ $type->name_type}}</option>
                                    @endforeach
        </select>
       
      </div>
    </div>
    @for ($i = 1; $i < 25; $i++)
              
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg"> {{$zzz='a'.$i}}</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="{{$zzz}}" value="0">
      </div>
    </div>
    @endfor
    <div class="form-group row">  
     <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">  a_cyt</label>
      <div class="col-sm-10">
        <input disabled type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="a_cyt" value="0">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Зберегти</button>
    </div>
  </form>
</div>
@endsection
