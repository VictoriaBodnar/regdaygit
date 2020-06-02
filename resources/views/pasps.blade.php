@extends('layouts.app')

@section('content')
 <div class="w3-container">
        <div class="w3-cell-row w3-padding-8">
        <h3>Паспорт задачі</h3>
        <div class="w3-half">
        <!-- Display Validation Errors -->
         @include('common.errors')
          <!-- New Consumer Form -->
    
        <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{ url('pasps')}}">
                        {{ csrf_field() }}
                <h3>Новий</h3><hr>
                <div class="w3-row w3-section">
                    <div class="w3-col w3-margin-right" style="width:15%"><label>Дата виміру</label></div>
                    <div class="w3-rest">
                        <input type="text" name="date_zamer" id="pasp-date_zamer" class="w3-input w3-border w3-round" value="{{ old('pasp') }}">
                    </div>
                </div>
                @if (session('alert'))
                    <div class="w3-section w3-green w3-round" id="success-alert"><!--w3-container w3-red -->
                        <h3>{{ session('alert') }}</h3>
                    </div>
                @endif
                @if (session('error'))
                    <div class="w3-section w3-red w3-round" id="success-alert"><!--w3-container w3-red -->
                            <h3>{{ session('error') }}</h3>
                    </div>
                @endif    
                <div class="w3-section">
                    <div class="w3-col w3-margin-right" style="width:15%"><label>&nbsp;</label></div>
                    <div class="w3-rest">
                        <button type="submit" class="w3-button w3-large w3-white w3-border w3-round-medium">
                                <i class="fa fa-plus"></i>Додати
                        </button>
                    </div>
                </div>
                                       
        </form>
        </div>
        </div>        
     
         <!-- Current Pasps -->
         @if (count($pasps) > 0)
                <div class="w3-padding-16 w3-responsive w3-card-4">
                    <table class="w3-table w3-striped w3-bordered">
                    <thead>
                    <tr class="w3-theme">
                      <th>Дата виміру</th>
                      <th>Ким внесено</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasps as $pasp)
                            <tr>
                                <td><div>{{ $pasp->date_zamer }}</div></td>
                                <td><div>{{ $pasp->u_name }}</div></td>
                                <td><!-- Delete Button -->
                                    <div>
                                        <form action="{{ url('pasps/'.$pasp->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="w3-button w3-round w3-red w3-hover-theme">
                                                    <i class="fa fa-trash"></i>Вилучити
                                                </button>                                                
                                        </form>
                                    </div>
                                </td>
                                <td><!-- Edit Button -->
                                    <div>    
                                        <a class="w3-button w3-round w3-blue w3-hover-theme" href="{{ route('pasps.edit',$pasp->id) }}"><i class="fa fa-edit"></i>Редагувати</a>
                                    </div>       
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
          @endif   
    </div>
@endsection 