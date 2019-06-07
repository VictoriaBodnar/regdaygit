@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-0 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Нова галузь
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('otrs')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="otr-kod_otr" class="col-sm-2 control-label">Код галузі</label>
                            <div class="col-sm-6">
                                <input type="text" name="kod_otr" id="otr-kod_otr" class="form-control" value="{{ old('otr') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="otr-name_otr" class="col-sm-2 control-label">Назва галузі</label>
                            <div class="col-sm-6">
                                <input type="text" name="name_otr" id="otr-name_otr" class="form-control" value="{{ old('otr') }}">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="otr-kod_otr" class="col-sm-2 control-label">Код підгалузі</label>
                            <div class="col-sm-6">
                                <input type="text" name="kod_podotr" id="otr-kod_podotr" class="form-control" value="{{ old('otr') }}">
                            </div>
                        </div>      
                        

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Додати
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

            <!-- Current Tasks -->
            @if (count($otrs) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Перелік РЕМ
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped otr-table">
                            <thead>
                                <th>Код галузі</th>
                                <th>Назва галузі</th>
                                <th>Код підгалузі</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($otrs as $otr)
                                    <tr>
                                        <td class="table-text"><div>{{ $otr->kod_otr }}</div></td>
                                        <td class="table-text"><div>{{ $otr->name_otr }}</div></td>
                                        <td class="table-text"><div>{{ $otr->kod_podotr }}</div></td>
                                        
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('otrs/'.$otr->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Вилучити
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('otrs.edit',$otr->id) }}">Редагувати</a>
                                            <!--<form action="{{ url('otrs/'.$otr->id) }}" method="POST">
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