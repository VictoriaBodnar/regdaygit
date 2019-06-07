@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-0 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Новий тип виміру
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('types')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="type-name_type" class="col-sm-2 control-label">Назва типу</label>
                            <div class="col-sm-6">
                                <input type="text" name="name_type" id="type-name_type" class="form-control" value="{{ old('type') }}">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="type-primitka" class="col-sm-2 control-label">Примітка</label>
                            <div class="col-sm-6">
                                <input type="text" name="primitka" id="type-primitka" class="form-control" value="{{ old('type') }}">
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
            @if (session('error'))
                <div class="alert alert-danger" >
                    {{ session('error') }}
                </div>
            @endif
            <!-- Current Tasks -->
            @if (count($types) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Перелік Споживачів
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped type-table">
                            <thead>
                                <th>Назва типу</th>
                                <th>Примітка</th>
                                <!--<th>Ким внесено</th>-->
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                
                                @foreach ($types as $type)
                                    <tr>
                                        <td class="table-text"><div>{{ $type->name_type }}</div></td>
                                        <td class="table-text"><div>{{ $type->primitka }}</div></td>
                                        <!--<td class="table-text"><div>{{ $type->u_name }}</div></td>-->


                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('types/'.$type->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Вилучити
                                                </button>
                                            </form>
                                        </td>
                                        <td>    
                                           <a class="btn btn-primary" href="{{ route('types.edit',$type->id) }}">Редагувати</a>
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