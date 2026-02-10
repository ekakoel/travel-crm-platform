@extends('layouts.partials.sidebar-base')

@section('menu')
    <li class="menu-item">
        <a href="{{ route('sales.dashboard') }}">
            <i class="icon">📊</i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="menu-item has-sub">
        <a href="#">
            <i class="icon">🧑‍🤝‍🧑</i>
            <span>CRM</span>
        </a>
        <ul class="submenu">
            <li><a href="{{ route('sales.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('leads.index') }}">Leads</a></li>
            <li><a href="{{ route('quotations.index') }}">Quotations</a></li>
            <li><a href="{{ route('customers.index') }}">Customers</a></li>
            <li><a href="{{ route('activities.index') }}">Activities</a></li>
        </ul>
    </li>
    <li class="menu-item">
        <a href="{{ route('quotations.index') }}">
            <i class="icon">🧾</i>
            <span>Quotations</span>
        </a>
    </li>
@endsection
