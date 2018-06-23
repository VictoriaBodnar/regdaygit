@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-0 col-sm-12">
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
                        <div class="form-group">
                            <label for="consumer-rem_id" class="col-sm-6 control-label">Код РЕМ</label>
                            <div class="col-sm-6">
                                <select name="rem_id" id="consumer-rem_id" class="form-control">
                                    <option value=""></option>
                                    @foreach($rems as $rem)
                                     <option value="{{ $rem->id }}">{{ $rem->kod_rem}} {{ $rem->name_rem}}</option>
                                    @endforeach
                                </select>
                                <!--<input type="text" name="kod_rem" id="consumer-kod_rem" class="form-control" value="{{ old('consumer') }}">--> 
                            </div>
                        </div>      
                        <div class="form-group">
                            <label for="consumer-otr_id" class="col-sm-6 control-label">Код галузі</label>
                            <div class="col-sm-6">
                                <select name="otr_id" id="consumer-otr_id" class="form-control">
                                    <option value=""></option>
                                    @foreach($otrs as $otr)
                                     <option value="{{ $otr->id }}">{{ $otr->kod_otr}} -  {{ $otr->kod_podotr}} {{ $otr->name_otr}}</option>
                                    @endforeach
                                </select>
                                <!--<input type="text" name="kod_otr" id="consumer-kod_otr" class="form-control" value="{{ old('consumer') }}">-->
                            </div>
                        </div> 
                        

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Consumer
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
                                <th>Код РЕМ</th>
                                <th>Код галузі</th>
                                <th>Ким внесено</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                
                                @foreach ($consumers as $consumer)
                                    <tr>
                                        <td class="table-text"><div>{{ $consumer->kod_consumer }}</div></td>
                                        <td class="table-text"><div>{{ $consumer->name_consumer }}</div></td>
                                        <td class="table-text"><div><option value="{{ $consumer->rem_id }}">{{ $consumer->kod_rem_name_rem }}</option></div></td>
                                        <td class="table-text"><div><option value="{{ $consumer->otr_id }}">{{ $consumer->kod_otr }} - {{ $consumer->kod_podotr }} {{ $consumer->name_otr }}</option></div></td>
                                        <td class="table-text"><div>{{ $consumer->u_name }}</div></td>


                                        <!-- Task Delete Button -->
                                        <td><div>
                                            <form action="{{ url('consumer_del/'.$consumer->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Вилучити
                                                </button>
                                            </form>
                                        </div></td>
                                        <td><div>    
                                           <a class="btn btn-primary" href="{{ url('consumer_edit/'.$consumer->id) }}">Редагувати</a>
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