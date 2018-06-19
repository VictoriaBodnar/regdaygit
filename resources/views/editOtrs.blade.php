@extends('layouts.app')
@section('content')
<div class="container">
   <!-- Display Validation Errors -->
  @include('common.errors')
  <form method="post" action="{{action('OtrController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код галузі</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="kod_otr" value="{{$otr->kod_otr}}">
      </div>
    </div>  
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Назва галузі</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="name_otr" value="{{$otr->name_otr}}">
      </div>
    </div>
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код підгалузі</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="kod_podotr" value="{{$otr->kod_podotr}}">
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