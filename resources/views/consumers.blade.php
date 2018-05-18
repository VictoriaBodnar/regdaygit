@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Consumer
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('consumer_add')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="consumer-kod_consumer" class="col-sm-6 control-label">Код</label>
                            <div class="col-sm-6">
                                <input type="text" name="kod_consumer" id="consumer-kod_consumer" class="form-control" value="{{ old('consumer') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="consumer-name_consumer" class="col-sm-6 control-label">Назва</label>
                            <div class="col-sm-6">
                                <input type="text" name="name_consumer" id="consumer-name_consumer" class="form-control" value="{{ old('consumer') }}">
                            </div>
                        </div>    

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Consumer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($consumers) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Перелік Споживачів
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped consumer-table">
                            <thead>
                                <th>Код</th>
                                <th>Назва</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($consumers as $consumer)
                                    <tr>
                                        <td class="table-text"><div>{{ $consumer->kod_consumer }}</div></td>
                                        <td class="table-text"><div>{{ $consumer->name_consumer }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('consumer_del/'.$consumer->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
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