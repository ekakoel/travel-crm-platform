@extends('layouts.core.app')

@section('sidebar')
    @include('layouts.partials.sidebar-operation')
@endsection

@section('content')
    @yield('page')
@endsection
