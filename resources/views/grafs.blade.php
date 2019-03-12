@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-0 col-sm-12">
            <form action="{{ url('grafs/2017-12-20')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-heading">
                            Оберіть період
                        </div>
                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')
                        <div class="form-group">
                            <select name="pasp_id" id="graf-pasp_id" class="form-control">
                                            <option value=""></option>
                                            @foreach($pasps as $pasp)
                                             <option value="{{ $pasp->id }}">{{ $pasp->date_zamer}}</option>
                                            @endforeach
                            </select>
                        </div>    
                        <!-- Add Task Button -->
                        <div class="form-group">
                                <div class="col-sm-offset-0 col-sm-1">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-plus"></i>Виконати
                                    </button>
                                </div>
                        </div>

                        
                    </div>
                </div>
            </form>
            @if (session('alert'))
                <div class="alert alert-success" id="success-alert">
                    {{ session('alert') }}
                </div>
            @endif

            <!-- Current Tasks -->
            @if (count($grafs) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Режимні виміри
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped graf-table">
                            <thead>
                                <th>Код споживача</th>
                                <th>Назва споживача</th>
                                <th>Дата виміру</th>
                                <th>Тип виміру</th>
                                <th>a1</th><th>a2</th><th>a3</th><th>a4</th><th>a5</th><th>a6</th><th>a7</th><th>a8</th><th>a9</th><th>a10</th>
                                <th>a11</th><th>a12</th><th>a13</th><th>a14</th><th>a15</th><th>a16</th><th>a17</th><th>a18</th><th>a19</th><th>a20</th><th>a21</th><th>a22</th><th>a23</th><th>a24</th><th>a_cyt</th>
                                <th>Ким внесено</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                
                                @foreach ($grafs as $graf)
                                    <tr>
                                        <td class="table-text"><div>{{ $graf->kod_consumer }}</div></td>
                                        <td class="table-text"><div>{{ $graf->name_consumer }}</div></td>
                                        <td class="table-text"><div>{{ $graf->date_zamer }}</div></td>
                                        <td class="table-text"><div>{{ $graf->type_zamer }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a1 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a2 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a3 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a4 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a5 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a6 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a7 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a8 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a9 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a10 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a11 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a12 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a13 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a14 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a15 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a16 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a17 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a18 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a19 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a20 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a21 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a22 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a23 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a24 }}</div></td>
                                        <td class="table-text"><div>{{ $graf->a_cyt }}</div></td>
                                        <td class="table-text"><div>{{ $graf->u_name }}</div></td>


                                        <!-- Task Delete Button -->
                                        <td><div>
                                            <form action="{{ url('graf_del/'.$graf->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Вилучити
                                                </button>                                                
                                            </form>
                                        </div></td>
                                        <td><div>    
                                           <a class="btn btn-primary" href="{{ url('graf_edit/'.$graf->id) }}">Редагувати</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection 