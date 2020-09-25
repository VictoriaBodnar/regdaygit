@extends('layouts.app')
@section('content')
<link href="{{ asset('css/msgstyles.css') }}" rel="stylesheet" type="text/css" >
<div class="w3-container w3-responsive">
    <div class="w3-cell-row w3-padding-8">
        <div class="w3-half">
            <!-- Display Validation Errors -->
            @include('common.errors')
            <div class="w3-cell-row">
          <div class="w3-cell w3-text-pink w3-bold"><h3>Масове видалення вимірів</h3></div>
        </div>
            <form class="w3-container w3-card-4 w3-pink" method="POST" action="{{ url('graf_del_block') }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <h3>Вибір даних</h3><hr>
                <div class="w3-section">
                    <div class="w3-col w3-margin-right" style="width:15%"><label>Дата</label></div>
                        <div class="w3-rest">
                            <select name="date_zamer" id="graf-date_zamer" class="w3-select w3-border w3-round" required>
                                            @foreach($pasps as $pasp)
                                             {{$slmark=''}}
                                              
                                             <option value="{{ $pasp->date_zamer }}" {{ $slmark }}>{{ $pasp->date_zamer}}</option>
                                            @endforeach
                            </select>
                        </div>
                </div>       
                <div class="w3-section">
                    <div class="w3-col w3-margin-right" style="width:15%"><label>Тип виміру</label></div>
                        <div class="w3-rest">
                            <select name="type_zamer" id="graf-type_zamer" class="w3-select w3-border w3-round" required>
                                            @foreach($types as $type)
                                             {{$slmark=''}}
                                              
                                             <option value="{{ $type->name_type }}" {{ $slmark }}>{{ $type->name_type}}</option>
                                            @endforeach
                            </select>
                        </div>
                </div>
                <div class="w3-section">
                    <div class="w3-col w3-margin-right" style="width:15%"><label>&nbsp;</label></div>
                        <div class="w3-rest">
                            <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium" onclick="return confirm('Дійсно бажаєте виконати масове видалення?')">Виконати</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
    @if (session('alert'))
        <div class="w3-section w3-padding-16 w3-green w3-round" id="success-alert">
            {{ session('alert') }}
        </div>
    @endif
    @if (session('message'))
        <div class="msg-insert-data" >
            {{ session('message') }}
        </div>
    @endif
     @if (session('error'))
        <div class="alert alert-danger" >
            {{ session('error') }}
        </div>
    @endif
    
</div>    
@endsection 