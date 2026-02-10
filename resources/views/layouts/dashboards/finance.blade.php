@extends('layouts.core.app')

@section('sidebar')
    @include('layouts.partials.sidebar-finance')
@endsection

@section('content')
    @yield('page')
@endsection
