@extends('backend.layouts.app')
@section('title', 'Analytics - Myfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Analytics</h4>
        <p class="text-muted mb-0">Visitor statistics for your portfolio.</p>
    </div>

    {{-- Stats --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="fw-bold mb-1">{{ number_format($totalVisitors) }}</h3>
                    <small class="text-muted">Total Visitors</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="fw-bold mb-1">{{ $todayVisitors }}</h3>
                    <small class="text-muted">Today</small>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart --}}
    <div class="card">
        <div class="card-header"><h6 class="mb-0">Monthly Visitors</h6></div>
        <div class="card-body">
            <div id="visitorChart"></div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    new ApexCharts(document.querySelector("#visitorChart"), {
        chart: { type: 'area', height: 350, toolbar: { show: false } },
        series: [{ name: 'Visitors', data: {!! json_encode(array_values($monthlyVisitors)) !!} }],
        xaxis: { categories: {!! json_encode(array_keys($monthlyVisitors)) !!} },
        stroke: { curve: 'smooth' },
        fill: { type: 'gradient', gradient: { opacityFrom: 0.7, opacityTo: 0.1 } },
        responsive: [
            { breakpoint: 768, options: { chart: { height: 250 } } },
            { breakpoint: 480, options: { chart: { height: 200 } } }
        ]
    }).render();
});
</script>
@endsection