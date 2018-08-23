@extends('layouts.app')
@section('content')
<html lang="en">
<head>
    <!--<title>Laravel 5 maatwebsite export into csv and excel and import into DB</title>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>
<body>
 <!--<div class="panel panel-primary">-->
 <!--<div class="panel-heading">Laravel 5 maatwebsite export into csv and excel and import into DB</div>-->
  <div class="panel-body"> 
  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <a href="{{ route('excel-file',['type'=>'xls']) }}">Download Excel xls</a> |
        <a href="{{ route('excel-file',['type'=>'xlsx']) }}">Download Excel xlsx</a> |
        <a href="{{ route('excel-file',['type'=>'csv']) }}">Download CSV</a>
      </div>
   </div>     
       {!! Form::open(array('route' => 'import-csv-excel','method'=>'POST','files'=>'true')) !!}
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('file_for_upload','Оберіть файл для завантаження:',['class'=>'col-md-3']) !!}
                    <div class="col-md-9">
                    {!! Form::file('file_for_upload', array('class' => 'form-control')) !!}
                    {!! $errors->first('file_for_upload', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            {!! Form::submit('Upload',['class'=>'btn btn-primary']) !!}
            </div>
        </div>
       {!! Form::close() !!}
       
     <!--</div>-->
{{$message}}
</div>
@if (count($data) > 0)
                <div class="panel panel-default">
                      <div class="panel-body">
                        <table class="table table-striped consumer-table">
                            <thead>
                                <th>Код сп</th>
                                <th>Дата зам</th>
                                <th>Тип зам</th>
                                <th>a1</th><th>a2</th><th>a3</th><th>a4</th><th>a5</th><th>a6</th><th>a7</th><th>a8</th><th>a9</th><th>a10</th><th>a11</th><th>a12</th><th>a13</th><th>a14</th><th>a15</th><th>a16</th><th>a17</th><th>a18</th><th>a19</th><th>a20</th><th>a21</th><th>a22</th><th>a23</th><th>a24</th><th>a_cyt</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                
                                @foreach ($data as $rw)
                                    <tr>
                                      <td class="table-text"><div>{{ $rw['kod_consumer'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['date_zamer'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['type_zamer'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a1'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a2'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a3'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a4'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a5'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a6'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a7'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a8'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a9'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a10'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a11'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a12'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a13'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a14'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a15'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a16'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a17'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a18'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a19'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a20'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a21'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a22'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a23'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a24'] }}</div></td>
                                      <td class="table-text"><div>{{ $rw['a_cyt'] }}</div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
</body>
</html>
@endsection
