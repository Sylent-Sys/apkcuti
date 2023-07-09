@extends('layouts.base')
@section('title', 'Dashboard Cuti')
@section('content')
    @can('isKepalaDepartemen')
        @include('cuti.kapder.table')
    @endcan
    @can('isUser')
        @include('cuti.user.table')
    @endcan
@endsection
