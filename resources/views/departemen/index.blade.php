@extends('layouts.base')
@section('title', 'Dashboard Departemen')
@section('content')
    @can('isAdmin')
        @include('departemen.admin.table')
    @endcan
    @can('isKepalaDepartemen')
        @include('departemen.kapder.table')
    @endcan
@endsection
