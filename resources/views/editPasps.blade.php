@extends('layouts.app')
@section('content')
<div class="container">
  <form method="post" action="{{action('PaspController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Дата виміру</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="date_zamer" value="{{$pasp->date_zamer}}">
      </div>
    </div>  
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Зберегти</button>
    </div>
  </form>
</div>
@endsection