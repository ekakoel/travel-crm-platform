@extends('layouts.dashboards.sales')

@section('title', 'Sales Dashboard')

@section('page')
    <h1>Welcome Sales 👋</h1>

    <div class="grid grid-cols-4 gap-4">
        @include('widgets.total-leads')
        @include('widgets.active-quotation')
        @include('widgets.conversion-rate')
    </div>
@endsection
