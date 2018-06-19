@extends('layouts.app')
@section('content')
<div class="container">
   <!-- Display Validation Errors -->
  @include('common.errors')
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
                                    @foreach($rems as $rem)
                                      {{$slmark=''}}
                                      @if( $rem->id == $consumerCur->rem_id)
                                        {{$slmark='selected'}}
                                      @endif
                                        <option value="{{ $rem->id }}" {{ $slmark }}>{{ $rem->kod_rem}} {{ $rem->name_rem}} </option>
                                    @endforeach
        </select>
        <!--<input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="rem_id" value="{{$consumerCur->rem_id}}">-->
      </div>
    </div>
    <div class="form-group row">  
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Код галузі</label>
      <div class="col-sm-10">
        <select name="otr_id" id="consumer-otr_id" class="form-control" id="lgFormGroupSelect">
                                    @foreach($otrs as $otr)
                                      {{$slmark=''}}
                                      @if( $otr->id == $consumerCur->otr_id)
                                        {{$slmark='selected'}}
                                      @endif
                                        <option value="{{ $otr->id }}" {{ $slmark }}>{{ $otr->kod_otr}} -  {{ $otr->kod_podotr}} {{ $otr->name_otr}}</option>
                                    @endforeach
        </select>
       <!-- <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"  name="otr_id" value="{{$consumerCur->otr_id}}">-->
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Зберегти</button>
    </div>
  </form>
</div>
@endsection