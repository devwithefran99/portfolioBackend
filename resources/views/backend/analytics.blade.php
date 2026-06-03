@extends('backend.layouts.app')
@section('title', 'Analytics - Myfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Analytics</h4>
        <p class="text-muted mb-0">Visitor statistics for your portfolio.</p>
    </div>

    {{-- Stats Cards --}}
    <div class="row g-3 mb-4">

        {{-- Total --}}
        <div class="col-6 col-md-3">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div class="mb-2">
                        <i class="bx bx-group fs-2 text-primary"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ number_format($totalVisitors) }}</h3>
                    <small class="text-muted">Total Visitors</small>
                </div>
            </div>
        </div>

        {{-- Today --}}
        <div class="col-6 col-md-3">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div class="mb-2">
                        <i class="bx bx-user-check fs-2 text-success"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $todayVisitors }}</h3>
                    <small class="text-muted">Today's Visitors</small>
                </div>
            </div>
        </div>

        {{-- Unique --}}
        <div class="col-6 col-md-3">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div class="mb-2">
                        <i class="bx bx-fingerprint fs-2 text-warning"></i>
                    </div>
                    <h3 class="fw-bold mb-1">{{ number_format($uniqueVisitors) }}</h3>
                    <small class="text-muted">Unique Visitors</small>
                </div>
            </div>
        </div>

        {{-- Top Day --}}
        <div class="col-6 col-md-3">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div class="mb-2">
                        <i class="bx bx-trophy fs-2 text-danger"></i>
                    </div>
                    @if($topDay)
                        <h3 class="fw-bold mb-1">{{ $topDay->count }}</h3>
                        <small class="text-muted">Best Day</small>
                        <span class="badge bg-label-danger mt-1">
                            {{ \Carbon\Carbon::parse($topDay->date)->format('d M Y') }}
                        </span>
                    @else
                        <h3 class="fw-bold mb-1">—</h3>
                        <small class="text-muted">Best Day</small>
                    @endif
                </div>
            </div>
        </div>

    </div>

    {{-- Last 30 Days Chart --}}
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center">
            <i class="bx bx-line-chart me-2 text-primary"></i>
            <h6 class="mb-0">Last 30 Days — Daily Visitors</h6>
        </div>
        <div class="card-body">
            <div id="dailyChart"></div>
        </div>
    </div>

    {{-- Monthly Chart --}}
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="bx bx-bar-chart-alt-2 me-2 text-primary"></i>
            <h6 class="mb-0">Monthly Visitors — {{ now()->year }}</h6>
        </div>
        <div class="card-body">
            <div id="monthlyChart"></div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    // Daily chart
    new ApexCharts(document.querySelector("#dailyChart"), {
        chart: { type: 'bar', height: 300, toolbar: { show: false } },
        series: [{ name: 'Visitors', data: {!! json_encode(array_values($dailyVisitors)) !!} }],
        xaxis: {
            categories: {!! json_encode(array_keys($dailyVisitors)) !!},
            labels: { rotate: -45, style: { fontSize: '11px' } }
        },
        colors: ['#696cff'],
        plotOptions: { bar: { borderRadius: 4, columnWidth: '60%' } },
        dataLabels: { enabled: false },
        responsive: [
            { breakpoint: 768, options: { chart: { height: 220 } } }
        ]
    }).render();

    // Monthly chart
    new ApexCharts(document.querySelector("#monthlyChart"), {
        chart: { type: 'area', height: 300, toolbar: { show: false } },
        series: [{ name: 'Visitors', data: {!! json_encode(array_values($monthlyVisitors)) !!} }],
        xaxis: { categories: {!! json_encode(array_keys($monthlyVisitors)) !!} },
        colors: ['#03c3ec'],
        stroke: { curve: 'smooth' },
        fill: { type: 'gradient', gradient: { opacityFrom: 0.6, opacityTo: 0.05 } },
        dataLabels: { enabled: false },
        responsive: [
            { breakpoint: 768, options: { chart: { height: 220 } } }
        ]
    }).render();

});
</script>
@endsection