@extends('layouts.app')

@section('title', 'Dashboard | VOYEX CRM')

@section('content')
<div class="container-fluid py-4">

    {{-- KPI CARDS --}}
    <div class="row g-4 mb-4">
        <div class="col-xl-2 col-md-4 col-sm-6" >
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">New Leads</h6>
                    <h3 class="fw-bold">{{ $stats['leads'] ?? 0 }}</h3>
                    <small class="text-success">Today</small>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Active Quotations</h6>
                    <h3 class="fw-bold">{{ $stats['quotations'] ?? 0 }}</h3>
                    <small class="text-warning">In progress</small>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Expiring Soon</h6>
                    <h3 class="fw-bold">{{ $stats['expiring'] ?? 0 }}</h3>
                    <small class="text-danger">7 days</small>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Revenue</h6>
                    <h3 class="fw-bold">$ {{ number_format($stats['revenue'] ?? 0) }}</h3>
                    <small class="text-muted">This month</small>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Bookings</h6>
                    <h3 class="fw-bold">{{ $stats['bookings'] ?? 0 }}</h3>
                    <small class="text-info">Active</small>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Agents</h6>
                    <h3 class="fw-bold">{{ $stats['agents'] ?? 0 }}</h3>
                    <small class="text-muted">Active</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        {{-- SALES FUNNEL --}}
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0">Sales Funnel</h5>
                </div>
                <div class="card-body">
                    <canvas id="salesFunnelChart" height="120"></canvas>
                </div>
            </div>

            {{-- RECENT ACTIVITIES --}}
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0">Recent Activities</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse($activities as $activity)
                            <li class="list-group-item">
                                <strong>{{ $activity->user->name }}</strong>
                                {{ $activity->description }}
                                <br>
                                <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">No activities found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        {{-- TASKS & ALERTS --}}
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-0 d-flex justify-content-between">
                    <h5 class="mb-0">Tasks & Follow Ups</h5>
                    <a href="#" class="btn btn-sm btn-primary">+ Add</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse($tasks as $task)
                            <li class="list-group-item">
                                <span class="badge bg-warning me-2">{{ ucfirst($task->priority) }}</span>
                                {{ $task->title }}
                            </li>
                        @empty
                            <li class="list-group-item text-muted">No pending tasks</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0">System Alerts</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        @foreach($alerts as $alert)
                            <li class="mb-2 text-danger">&#9888; {{ $alert }}</li>
                        @endforeach
                        @if(count($alerts) === 0)
                            <li class="text-muted">All systems normal</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesFunnelChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Leads', 'Contacted', 'Quoted', 'Won'],
            datasets: [{
                label: 'Sales Funnel',
                data: @json($funnelData),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } }
        }
    });
</script>
@endpush



