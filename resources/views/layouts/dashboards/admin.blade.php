@extends('layouts.core.app')

@section('sidebar')
    @include('layouts.partials.sidebar-admin')
@endsection

@section('content')
    @yield('page')
@endsection
