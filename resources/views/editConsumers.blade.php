@extends('layouts.app')
@section('content')
<div class="container">
  <form method="post" action="{{action('ConsumerController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
      <input name="_method" type="hidden" value="PUT"><!-- або  {{ method_field('PUT') }}-->
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код Споживача</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="kod_consumer" value="{{$consumer->kod_consumer}}">
      </div>
    </div>  
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Назва Споживача</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="name_consumer" value="{{$consumer->name_consumer}}">
      </div>
    </div>
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код РЕМ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="kod_rem" value="{{$consumer->kod_rem}}">
      </div>
    </div>
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код галузі</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="kod_otr" value="{{$consumer->kod_otr}}">
      </div>
    </div>
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код підгалузі</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="kod_podotr" value="{{$consumer->kod_podotr}}">
      </div>
    </div>   
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Зберегти</button>
    </div>
  </form>
</div>
@endsection