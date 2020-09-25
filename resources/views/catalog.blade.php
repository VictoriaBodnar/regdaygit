@extends('layouts.app')

@section('content')

    <div class="w3-half w3-padding">
        <div class="w3-card white">
          <div class="w3-container w3-card-4 w3-theme">
            <h3>Довідники</h3>
          </div>
          <ul class="w3-ul w3-border-top">
            <li class="w3-hover-grey">
              <h3><a href="{{ url('/consumer_list') }}">Довідник споживачів</a></h3>
            </li>
            <li class="w3-hover-grey">
              <h3><a href="{{ url('/rems') }}">Довідник РЕМів</a></h3>
            </li>
            <li class="w3-hover-grey">
              <h3><a href="{{ url('/otrs') }}">Довідник галузей</a></h3>
            </li>
            <li class="w3-hover-grey">
              <h3><a href="{{ url('/pasps') }}">Паспорт задачі</a></h3>
            </li>
            <li class="w3-hover-grey">
              <h3><a href="{{ url('/types') }}">Тип виміру</a></h3>
            </li>
          </ul>
        </div>
    </div>
@endsection
