@extends('layouts.base')
@section('title', 'Dashboard')
@section('content')
    <h3>Yokoso {{ Auth::user()->name }}</h3>
    @can('isUser')
        <p>Saldo Cuti : {{ Auth::user()->saldo_cuti }}</p>
    @endcan
@endsection
