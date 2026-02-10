@extends('layouts.partials.sidebar-base')

@section('menu')
    <li class="menu-item">
        <a href="/admin/dashboard">
            <i>📊</i><span>Dashboard</span>
        </a>
    </li>
    <li class="menu-item has-sub">
        <a href="#"><i>⚙️</i><span>Master Data</span></a>
        <ul class="submenu">
            <li class="menu-item {{ request()->routeIs('admin.hotels*') ? 'active' : '' }}"><a href="{{ route('admin.hotels') }}">Hotels</a></li>
            <li class="menu-item {{ request()->routeIs('admin.products*') ? 'active' : '' }}"><a href="{{ route('admin.products') }}">Products</a></li>
            <li class="menu-item {{ request()->routeIs('admin.users*') ? 'active' : '' }}"><a href="{{ route('admin.users') }}">Users</a></li>
        </ul>
    </li>
    <li class="menu-item">
        <a href="/admin/reports">
            <i>📈</i><span>Reports</span>
        </a>
    </li>
@endsection
