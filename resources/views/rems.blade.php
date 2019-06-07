@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-0 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Новий РЕМ
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('rems')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="rem-kod_rem" class="col-sm-1 control-label">Код РЕМ</label>
                            <div class="col-sm-6">
                                <input type="text" name="kod_rem" id="rem-kod_rem" class="form-control" value="{{ old('rem') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rem-name_rem" class="col-sm-1 control-label">Назва РЕМ</label>
                            <div class="col-sm-6">
                                <input type="text" name="name_rem" id="rem-name_rem" class="form-control" value="{{ old('rem') }}">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="rem-kod_rem" class="col-sm-1 control-label">Код мережі</label>
                            <div class="col-sm-6">
                                <input type="text" name="kod_seti" id="rem-kod_seti" class="form-control" value="{{ old('rem') }}">
                            </div>
                        </div>      
                        

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-6">
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
            @if (count($rems) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Перелік РЕМ
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped rem-table">
                            <thead>
                                <th>Код РЕМ</th>
                                <th>Назва РЕМ</th>
                                <th>Код мережі</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($rems as $rem)
                                    <tr>
                                        <td class="table-text"><div>{{ $rem->kod_rem }}</div></td>
                                        <td class="table-text"><div>{{ $rem->name_rem }}</div></td>
                                        <td class="table-text"><div>{{ $rem->kod_seti }}</div></td>
                                        
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('rems/'.$rem->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Вилучити
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('rems.edit',$rem->id) }}">Редагувати</a>
                                            <!--<form action="{{ url('rems/'.$rem->id) }}" method="POST">
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