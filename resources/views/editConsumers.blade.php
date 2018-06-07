@extends('layouts.app')
@section('content')
<div class="container">
  <form method="post" action="{{action('ConsumerController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
      <input name="_method" type="hidden" value="PUT"><!-- або  {{ method_field('PUT') }}-->
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код Споживача</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="kod_consumer" value="{{$consumerCur->kod_consumer}}">
      </div>
    </div>  
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Назва Споживача</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="name_consumer" value="{{$consumerCur->name_consumer}}">
      </div>
    </div>
    <div class="form-group row">  
      <label for="lgFormGroupSelect" class="col-sm-2 col-form-label col-form-label-lg">Код РЕМ</label>
      <div class="col-sm-10">
        <select name="rem_id" id="consumer-rem_id" class="form-control" id="lgFormGroupSelect">
                                   
                                     <option value="{{ $consumerCur->rem_id }}">{{ $rems->slice(1, 1)}}</option>

                                    @foreach($rems as $rem)
                                     <option value="{{ $rem->id }}">{{ $rem->kod_rem}} {{ $rem->name_rem}}</option>
                                    @endforeach
                                   
                                </select>
        <!--<input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="rem_id" value="{{$consumerCur->rem_id}}">-->
      </div>
    </div>
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код галузі</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="otr_id" value="{{$consumerCur->otr_id}}">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Зберегти</button>
    </div>
  </form>
</div>
@endsection