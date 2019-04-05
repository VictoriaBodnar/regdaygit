@extends('layouts.app')

@section('content')
    Помилка: <b>{{ $exception->getMessage() }}</b>
    
@endsection 