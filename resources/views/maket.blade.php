@extends('layouts.app')
@section('content')
<link href="{{ asset('css/msgstyles.css') }}" rel="stylesheet" type="text/css" >
<div class="w3-container">
    <div class="w3-cell-row w3-padding-8">
        <div class="w3-half">
            <!-- Display Validation Errors -->
            @include('common.errors')
            <div class="w3-cell-row">
                <div class="w3-cell"><h3>Формування макету режимних вимірів</h3></div>
           </div>
            <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{ url('maket')}}">
                {{ csrf_field() }}
                <h3>Оберіть дату і тип виміру</h3><hr>
                <div class="w3-section">
                    <div class="w3-col w3-margin-right" style="width:15%"><label>Дата</label></div>
                        <div class="w3-rest">
                            <select name="date_zamer" id="graf-date_zamer" class="w3-select w3-border w3-round" required>
                                            @foreach($pasps as $pasp)
                                             {{$slmark=''}}
                                              @if( $pasp->date_zamer == $selected_date)
                                                {{$slmark='selected'}}
                                              @endif
                                             <option value="{{ $pasp->date_zamer }}" {{ $slmark }}>{{ $pasp->date_zamer}}</option>
                                            @endforeach
                            </select>
                        </div>
                </div>       
                <div class="w3-section">
                    <div class="w3-col w3-margin-right" style="width:15%"><label>Тип вміру</label></div>
                        <div class="w3-rest">
                            <select name="type_zamer" id="graf-type_zamer" class="w3-select w3-border w3-round" required>
                                            @foreach($types as $type)
                                             {{$slmark=''}}
                                              @if( $type->name_type == $selected_type)
                                                {{$slmark='selected'}}
                                              @endif
                                             <option value="{{ $type->name_type }}" {{ $slmark }}>{{ $type->name_type}}</option>
                                            @endforeach
                            </select>
                        </div>
                </div>
                <div class="w3-section">
                    <div class="w3-col w3-margin-right" style="width:15%"><label>&nbsp;</label></div>
                        <div class="w3-rest">
                            <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">Сформувати макет</button>
                        </div>
                </div>
            </form>
            <h4><button id="save-btn" class="w3-button w3-large w3-white w3-border w3-round-medium">Зберегти у файл</button></h4> 
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
    <!-- Current Tasks -->
    @if (count($makets) == 0)
        <div class="w3-section">
            <h4 class="w3-text-blue">Немає даних</h4>
        </div>
    @endif
    
</div> 
@if (count($makets) > 0)
        <div class="w3-padding-16 w3-responsive w3-card-4">
            <div id ="saveHtml" class="w3-cell-row" style="width:45%">
                     <table class="w3-table w3-striped w3-bordered">
                        <thead>
                               <tr class="w3-green"><td>&nbsp;</td><td>Дата виміру: </td><td>{{ $selected_date }}, </td><td>тип енергії:</td><td> {{ $selected_type }} </td></tr>
                                                         
                        </thead>
                        <tbody>
                            @foreach ($makets as $r)
                                <tr><td>{{ $r->tr }}</td><td>{{ $r->a1 }}</td><td>{{ $r->a2 }}</td><td>{{ $r->a3 }}</td><td>{{ $r->a4 }}</td></tr>
                                <tr><td>&nbsp;</td><td>{{ $r->a5 }}</td><td>{{ $r->a6 }}</td><td>{{ $r->a7 }}</td><td>{{ $r->a8 }}</td></tr>
                                <tr><td>&nbsp;</td><td>{{ $r->a9 }}</td><td>{{ $r->a10 }}</td><td>{{ $r->a11 }}</td><td>{{ $r->a12 }}</td></tr>
                                <tr><td>&nbsp;</td><td>{{ $r->a13 }}</td><td>{{ $r->a14 }}</td><td>{{ $r->a15 }}</td><td>{{ $r->a16 }}</td></tr>
                                <tr><td>&nbsp;</td><td>{{ $r->a17 }}</td><td>{{ $r->a18 }}</td><td>{{ $r->a19 }}</td><td>{{ $r->a20 }}</td></tr>
                                <tr><td>&nbsp;</td><td>{{ $r->a21 }}</td><td>{{ $r->a22 }}</td><td>{{ $r->a23 }}</td><td>{{ $r->a24 }}</td></tr>
                                <tr><td>&nbsp;</td><td>{{ $r->a_cyt }}</td><td>{{ $r->kont }}</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                            @endforeach
                        </tbody>
                    </table> 
            </div>
        </div>                  
@endif
         
@endsection 

