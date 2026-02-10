@extends('layouts.core.app')

@section('sidebar')
    @include('layouts.partials.sidebar-agent')
@endsection

@section('content')
    @yield('page')
@endsection
