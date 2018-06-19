@extends('layouts.app')
@section('content')
<div class="container">
   <!-- Display Validation Errors -->
  @include('common.errors')
  <form method="post" action="{{action('RemController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код РЕМ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="kod_rem" value="{{$rem->kod_rem}}">
      </div>
    </div>  
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Назва РЕМ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="name_rem" value="{{$rem->name_rem}}">
      </div>
    </div>
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код мережі</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="kod_seti" value="{{$rem->kod_seti}}">
      </div>
    </div>
    <div class=
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Зберегти</button>
    </div>
  </form>
</div>
@endsection