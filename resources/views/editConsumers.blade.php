@extends('layouts.app')
@section('content')
<div class="w3-half w3-padding">
  @include('common.errors')
    <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{action('ConsumerController@update', $id)}}">
                        {{ csrf_field() }}
        <h3>Споживач - змінити</h3><hr>       
        <input name="_method" type="hidden" value="PUT"><!-- або  {{ method_field('PUT') }}-->
        <div class="w3-section">
            <label>Код споживача</label>
            <input type="text" class="w3-input w3-border w3-round" id="lgFormGroupInput"  name="kod_consumer" value="{{$consumerCur->kod_consumer}}" required autofocus>
        </div>
        <div class="w3-section">
            <label>Назва споживача</label>
            <input type="text" class="w3-input w3-border w3-round" id="lgFormGroupInput"  name="name_consumer" value="{{$consumerCur->name_consumer}}" required>
        </div>
        <div class="w3-section">
            <label>Код РЕМ</label>
            <select name="rem_id" id="consumer-rem_id" class="w3-select w3-border w3-round" id="lgFormGroupSelect">
                                    @foreach($rems as $rem)
                                      {{$slmark=''}}
                                      @if( $rem->id == $consumerCur->rem_id)
                                        {{$slmark='selected'}}
                                      @endif
                                        <option class="w3-theme" value="{{ $rem->id }}" {{ $slmark }}>{{ $rem->kod_rem}} {{ $rem->name_rem}} </option>
                                    @endforeach
            </select>
        </div>
        <div class="w3-section">
            <label>Код галузі</label>
            <select name="otr_id" id="consumer-otr_id" class="w3-select w3-border w3-round" id="lgFormGroupSelect">
                                    @foreach($otrs as $otr)
                                      {{$slmark=''}}
                                      @if( $otr->id == $consumerCur->otr_id)
                                        {{$slmark='selected'}}
                                      @endif
                                        <option value="{{ $otr->id }}" {{ $slmark }}>{{ $otr->kod_otr}} -  {{ $otr->kod_podotr}} {{ $otr->name_otr}}</option>
                                    @endforeach
            </select>
        </div>
        <div class="w3-section">
            <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">Зберегти</button>
        </div>
    </form>
</div>
@endsection