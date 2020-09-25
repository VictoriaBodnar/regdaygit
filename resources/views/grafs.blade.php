@extends('layouts.app')
@section('content')
<link href="{{ asset('css/msgstyles.css') }}" rel="stylesheet" type="text/css" >
<div class="w3-container w3-responsive">
    <div class="w3-cell-row w3-padding-8">
        <div class="w3-half">
            <!-- Display Validation Errors -->
            @include('common.errors')
            <div class="w3-cell-row">
          <div class="w3-cell"><h3>Режимні виміри за період</h3></div>
          <div class=" w3-container w3-cell w3-right"><a class="w3-button w3-round w3-margin-top w3-green" href="{{ url('graf_add') }}"><i class="fa fa-plus"></i>&nbsp;Додати запис</a></div>
          <div class="w3 container w3-cell w3-right"><a class="w3-button w3-round w3-margin-top w3-red" href="{{ url('graf_del_block') }}"><i class="fa fa-trash"></i>&nbsp;Видалення даних</a></div>
        </div>
            <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{ url('graf')}}">
                {{ csrf_field() }}
                <h3>Вибір даних</h3><hr>
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
                            <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">Виконати</button>
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
    <!-- Current Tasks -->
    @if (count($grafs) == 0)
        <div class="w3-section">
            <h4 class="w3-text-blue">Немає даних</h4>
        </div>
    @endif
    @if (count($grafs) > 0)
        <div class="w3-padding-8 w3-responsive w3-card-4">
             <div class="w3-section w3-text-blue">
                <div class="w3-col"><h3>Режимні виміри за: {{$selected_date}} тип виміру: {{$selected_type}} </h3></div>
                <div class="w3-col">{{ $grafs->links('paginator') }}</div>
             </div>
             <table class="w3-table w3-striped w3-bordered">
                <thead>
                    <tr class="w3-theme">
                        <th>Код споживача</th>
                        <th>Назва споживача</th>
                        <th>Дата виміру</th>
                        <th>Тип виміру</th>
                        <th>a1</th><th>a2</th><th>a3</th><th>a4</th><th>a5</th><th>a6</th><th>a7</th><th>a8</th><th>a9</th><th>a10</th>
                        <th>a11</th><th>a12</th><th>a13</th><th>a14</th><th>a15</th><th>a16</th><th>a17</th><th>a18</th><th>a19</th><th>a20</th><th>a21</th><th>a22</th><th>a23</th><th>a24</th><th>a_cyt</th>
                        <th>Ким внесено</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grafs as $graf)
                        <tr>
                            <td><div>{{ $graf->kod_consumer }}</div></td>
                            <td><div>{{ $graf->name_consumer }}</div></td>
                            <td><div>{{ $graf->date_zamer }}</div></td>
                            <td><div>{{ $graf->type_zamer }}</div></td>
                            <td><div>{{ $graf->a1 }}</div></td>
                            <td><div>{{ $graf->a2 }}</div></td>
                            <td><div>{{ $graf->a3 }}</div></td>
                            <td><div>{{ $graf->a4 }}</div></td>
                            <td><div>{{ $graf->a5 }}</div></td>
                            <td><div>{{ $graf->a6 }}</div></td>
                            <td><div>{{ $graf->a7 }}</div></td>
                            <td><div>{{ $graf->a8 }}</div></td>
                            <td><div>{{ $graf->a9 }}</div></td>
                            <td><div>{{ $graf->a10 }}</div></td>
                            <td><div>{{ $graf->a11 }}</div></td>
                            <td><div>{{ $graf->a12 }}</div></td>
                            <td><div>{{ $graf->a13 }}</div></td>
                            <td><div>{{ $graf->a14 }}</div></td>
                            <td><div>{{ $graf->a15 }}</div></td>
                            <td><div>{{ $graf->a16 }}</div></td>
                            <td><div>{{ $graf->a17 }}</div></td>
                            <td><div>{{ $graf->a18 }}</div></td>
                            <td><div>{{ $graf->a19 }}</div></td>
                            <td><div>{{ $graf->a20 }}</div></td>
                            <td><div>{{ $graf->a21 }}</div></td>
                            <td><div>{{ $graf->a22 }}</div></td>
                            <td><div>{{ $graf->a23 }}</div></td>
                            <td><div>{{ $graf->a24 }}</div></td>
                            <td><div>{{ $graf->a_cyt }}</div></td>
                            <td><div>{{ $graf->u_name }}</div></td>
                            <!-- Task Delete Button -->
                            <td><div>
                                <form action="{{ url('graf_del/'.$graf->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="w3-button w3-round w3-red w3-hover-theme" onclick="return confirm('Дійсно бажаєте вилучити рядок? {{ $graf->kod_consumer }} ')"><i class="fa fa-trash"></i>Вилучити
                                    </button>                                                   
                                </form>
                            </div></td>
                            <td><div>    
                                <a class="w3-button w3-round w3-blue w3-hover-theme" href="{{ url('graf_edit/'.$graf->id) }}"><i class="fa fa-edit"></i>Редагувати</a>
                            </div></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>    
@endsection 