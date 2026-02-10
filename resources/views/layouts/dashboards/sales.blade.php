@extends('layouts.core.app')

@section('sidebar')
    @include('layouts.partials.sidebar-sales')
@endsection

@section('content')
    @yield('page')
@endsection
