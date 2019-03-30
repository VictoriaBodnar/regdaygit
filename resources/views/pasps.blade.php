@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/msgstyles.css') }}" rel="stylesheet" type="text/css" >
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New pasp
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('pasps')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="pasp-date_zamer" class="col-sm-6 control-label">Дата виміру</label>
                            <div class="col-sm-6">
                                <input type="text" name="date_zamer" id="pasp-date_zamer" class="form-control" value="{{ old('pasp') }}">
                            </div>
                        </div>
                                               

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add pasp
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (session('alert'))
                <div class="alert alert-success" id="success-alert">
                    {{ session('alert') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" >
                    {{ session('error') }}
                </div>
            @endif

            <!-- Current Tasks -->
            @if (count($pasps) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Перелік РЕМ
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped pasp-table">
                            <thead>
                                <th>Дата виміру</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($pasps as $pasp)
                                    <tr>
                                        <td class="table-text"><div>{{ $pasp->date_zamer }}</div></td>
                                       
                                        
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('pasps/'.$pasp->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Вилучити
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('pasps.edit',$pasp->id) }}">Редагувати</a>
                                            <!--<form action="{{ url('pasps/'.$pasp->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('GET') }}
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-trash"></i>Редагувати
                                                </button>
                                            </form>-->
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