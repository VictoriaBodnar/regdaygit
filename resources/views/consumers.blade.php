@extends('layouts.app')

@section('content')
    <div class="w3-container">
        <div class="w3-cell-row w3-padding-8">
        <h3>Довідник споживачів</h3>
        <div class="w3-half">
            <!-- Display Validation Errors -->
             @include('common.errors')
              <!-- New Consumer Form -->
            <form class="w3-container w3-card-4 w3-theme" method="POST" action="{{ url('consumer_add')}}">
                            {{ csrf_field() }}
                    <h3>Новий споживач</h3><hr>
                    <div class="w3-row w3-section">
                        <div class="w3-col w3-margin-right" style="width:15%"><label>Код</label></div>
                        <div class="w3-rest">
                          <input type="text" name="kod_consumer" id="consumer-kod_consumer" class="w3-input w3-border w3-round" value="{{ old('consumer') }}" required>
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col w3-margin-right" style="width:15%"><label>Назва</label></div>
                        <div class="w3-rest">
                            <input type="text" name="name_consumer" id="consumer-name_consumer" class="w3-input w3-border w3-round" value="{{ old('consumer') }}" required>
                        </div>
                    </div>
                    <div class="w3-section">
                        <div class="w3-col w3-margin-right" style="width:15%"><label>Код РЕМ</label></div>
                        <div class="w3-rest">
                            <select name="rem_id" id="consumer-rem_id" class="w3-select w3-border w3-round" required>
                                    <option class="w3-theme w3-round" value=""></option>
                                    @foreach($rems as $rem)
                                        <option class="w3-theme w3-round" value="{{ $rem->id }}">{{ $rem->kod_rem}} {{ $rem->name_rem}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w3-section">
                        <div class="w3-col w3-margin-right" style="width:15%"><label>Код галузі</label></div>
                        <div class="w3-rest">
                            <select name="otr_id" id="consumer-otr_id" class="w3-select w3-border w3-round" required>
                                    <option value=""></option>
                                    @foreach($otrs as $otr)
                                        <option value="{{ $otr->id }}">{{ $otr->kod_otr}} -  {{ $otr->kod_podotr}} {{ $otr->name_otr}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                     @if (session('alert'))
                        <div class="w3-section w3-green w3-round" id="success-alert"><!--w3-container w3-red -->
                            <h3>{{ session('alert') }}</h3>
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
        <!-- Consumers -->
        @if (count($consumers) > 0)
            <div class="w3-padding-16 w3-responsive w3-card-4">
                <table class="w3-table w3-striped w3-bordered">
                <thead>
                <tr class="w3-theme">
                  <th>Код</th>
                  <th>Назва</th>
                  <th>Код РЕМ</th>
                  <th>Код галузі</th>
                  <th>Ким внесено</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
                </thead>
               <tbody>
                    @foreach ($consumers as $consumer)
                        <tr>
                            <td><div>{{ $consumer->kod_consumer }}</div></td>
                            <td><div>{{ $consumer->name_consumer }}</div></td>
                            <td><div><option value="{{ $consumer->rem_id }}">{{ $consumer->kod_rem_name_rem }}</option></div></td>
                            <td><div><option value="{{ $consumer->otr_id }}">{{ $consumer->kod_otr }} - {{ $consumer->kod_podotr }} {{ $consumer->name_otr }}</option></div></td>
                            <td><div>{{ $consumer->u_name }}</div></td>
                            <!-- Delete Button -->
                            <td><div>
                                 <form action="{{ url('consumer_del/'.$consumer->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="w3-button w3-round w3-red w3-hover-theme" onclick="return confirm('Дійсно бажаєте вилучити? {{ $consumer->name_consumer }} ')" style="font-weight:900;"><i class="fa fa-trash"></i>Вилучити
                                    </button>                                                            
                                 </form>          
                            </div></td> 
                            <!-- Edit Button -->             
                            <td><div>  
                                    <a class="w3-button w3-round w3-blue w3-hover-theme" href="{{ url('consumer_edit/'.$consumer->id) }}"><i class="fa fa-edit"></i>Редагувати</a>
                            </div></td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection 