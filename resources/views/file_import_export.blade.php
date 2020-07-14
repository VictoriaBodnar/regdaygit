@extends('layouts.app')
@section('content')
   <div class="w3-half w3-padding">
    <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{ route('import-csv-excel') }}"  accept-charset="UTF-8" enctype="multipart/form-data" >
                          {{ csrf_field() }}
          <h2>Завантаження вимірів</h2><hr>  
          <div class="w3-section">
              <label>Оберіть файл імпорту</label>
              <input class="w3-input w3-border w3-round" name="file_for_upload" type="file" id="file_for_upload" accept=".csv">
                      @if ($errors->has('file_for_upload'))
                         <span class="w3-cell-row"><strong>{{ $errors->first('file_for_upload') }}</strong></span>
                      @endif
          </div>
          <div class="w3-section">
              <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">Завантажити</button>
          </div>
      </form>
   </div>
<div class="w3-cell-row">
<div class="w3-section w3-padding">
   <h4 class="w3-text-red">{{$message}}</h4>
</div>
@if (count($data) > 0)
                <div class="w3-section">
                        <table class="w3-table w3-striped w3-bordered">
                            <thead>
                                <th>Код споживача</th>
                                <th>Дата виміру</th>
                                <th>Тип виміру</th>
                                <th>a1</th><th>a2</th><th>a3</th><th>a4</th><th>a5</th><th>a6</th><th>a7</th><th>a8</th><th>a9</th><th>a10</th><th>a11</th><th>a12</th><th>a13</th><th>a14</th><th>a15</th><th>a16</th><th>a17</th><th>a18</th><th>a19</th><th>a20</th><th>a21</th><th>a22</th><th>a23</th><th>a24</th><th>a_cyt</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $rw)
                                    @if ($rw['kod_consumer']==$errRow)
                                      <tr style="background-color:lightblue">
                                    @else  
                                      <tr>
                                    @endif  
                                      <td><div>{{ $rw['kod_consumer'] }}</div></td>
                                      <td><div>{{ $rw['date_zamer'] }}</div></td>
                                      <td><div>{{ $rw['type_zamer'] }}</div></td>
                                      <td><div>{{ $rw['a1'] }}</div></td>
                                      <td><div>{{ $rw['a2'] }}</div></td>
                                      <td><div>{{ $rw['a3'] }}</div></td>
                                      <td><div>{{ $rw['a4'] }}</div></td>
                                      <td><div>{{ $rw['a5'] }}</div></td>
                                      <td><div>{{ $rw['a6'] }}</div></td>
                                      <td><div>{{ $rw['a7'] }}</div></td>
                                      <td><div>{{ $rw['a8'] }}</div></td>
                                      <td><div>{{ $rw['a9'] }}</div></td>
                                      <td><div>{{ $rw['a10'] }}</div></td>
                                      <td><div>{{ $rw['a11'] }}</div></td>
                                      <td><div>{{ $rw['a12'] }}</div></td>
                                      <td><div>{{ $rw['a13'] }}</div></td>
                                      <td><div>{{ $rw['a14'] }}</div></td>
                                      <td><div>{{ $rw['a15'] }}</div></td>
                                      <td><div>{{ $rw['a16'] }}</div></td>
                                      <td><div>{{ $rw['a17'] }}</div></td>
                                      <td><div>{{ $rw['a18'] }}</div></td>
                                      <td><div>{{ $rw['a19'] }}</div></td>
                                      <td><div>{{ $rw['a20'] }}</div></td>
                                      <td><div>{{ $rw['a21'] }}</div></td>
                                      <td><div>{{ $rw['a22'] }}</div></td>
                                      <td><div>{{ $rw['a23'] }}</div></td>
                                      <td><div>{{ $rw['a24'] }}</div></td>
                                      <td><div>{{ $rw['a_cyt'] }}</div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            @endif
     </div>     
@endsection
