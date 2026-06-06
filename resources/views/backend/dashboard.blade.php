@extends('backend.layouts.app')
@section('title', 'Dashboard - Myfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- ── Greeting ── --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1">Dashboard</h4>
            <p class="text-muted mb-0">Welcome back! Here's your portfolio summary.</p>
        </div>
        <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-primary btn-sm">
            <i class="bx bx-link-external me-1"></i> View Site
        </a>
    </div>

    {{-- ── Stats Cards ── --}}
    <div class="row g-3 mb-4">

        <div class="col-6 col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="bx bx-image"></i>
                            </span>
                        </div>
                        <span class="text-muted small">Total Works</span>
                    </div>
                    <h3 class="mb-0 fw-bold">{{ $totalWorks }}</h3>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success">
                                <i class="bx bx-show"></i>
                            </span>
                        </div>
                        <span class="text-muted small">Total Visitors</span>
                    </div>
                    <h3 class="mb-0 fw-bold">{{ number_format($totalVisitors) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-warning">
                                <i class="bx bx-envelope"></i>
                            </span>
                        </div>
                        <span class="text-muted small">Total Messages</span>
                    </div>
                    <h3 class="mb-0 fw-bold">{{ $totalContacts }}</h3>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="bx bx-time-five"></i>
                            </span>
                        </div>
                        <span class="text-muted small">Pending Messages</span>
                    </div>
                    <h3 class="mb-0 fw-bold">{{ $pendingContacts }}</h3>
                </div>
            </div>
        </div>

    </div>


    {{-- chart --}}

    <!-- ── Charts Section ── -->
<div class="container-xxl mt-4">
    <div class="row g-4">

        {{-- Chart 2: Works by Category (Donut) --}}
        <div class="col-md-5">
            <div class="card shadow-sm h-100">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bx bx-doughnut-chart text-warning fs-5"></i>
                    <h6 class="mb-0 fw-semibold">Works by Category</h6>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <div id="categoryChart"></div>
                </div>
            </div>
        </div>

        {{-- Chart 3: Monthly Contacts (Bar) --}}
        <div class="col-md-7">
            <div class="card shadow-sm h-100">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bx bx-bar-chart-alt-2 text-success fs-5"></i>
                    <h6 class="mb-0 fw-semibold">Monthly Messages — {{ now()->year }}</h6>
                </div>
                <div class="card-body">
                    <div id="contactChart"></div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    // ── Chart 1: Visitor Area Chart ──
    new ApexCharts(document.querySelector("#visitorChart"), {
        chart: { type: 'area', height: 300, toolbar: { show: false }, zoom: { enabled: false } },
        series: [{ name: 'Visitors', data: {!! json_encode(array_values($monthlyVisitors)) !!} }],
        xaxis: { categories: {!! json_encode(array_keys($monthlyVisitors)) !!} },
        stroke: { curve: 'smooth', width: 2 },
        fill: { type: 'gradient', gradient: { opacityFrom: 0.5, opacityTo: 0.05 } },
        colors: ['#696cff'],
        dataLabels: { enabled: false },
        grid: { borderColor: '#f1f1f1' },
        tooltip: { theme: 'light' }
    }).render();

    // ── Chart 2: Category Donut Chart ──
    new ApexCharts(document.querySelector("#categoryChart"), {
        chart: { type: 'donut', height: 280 },
        series: {!! json_encode(array_values($worksByCategory)) !!},
        labels: {!! json_encode(array_keys($worksByCategory)) !!},
        colors: ['#696cff', '#03c3ec', '#ffab00'],
        legend: { position: 'bottom' },
        dataLabels: { enabled: true },
        plotOptions: {
            pie: { donut: { size: '65%', labels: { show: true, total: { show: true, label: 'Total Works' } } } }
        }
    }).render();

    // ── Chart 3: Contact Bar Chart ──
    new ApexCharts(document.querySelector("#contactChart"), {
        chart: { type: 'bar', height: 280, toolbar: { show: false } },
        series: [{ name: 'Messages', data: {!! json_encode(array_values($monthlyContacts)) !!} }],
        xaxis: { categories: {!! json_encode(array_keys($monthlyContacts)) !!} },
        colors: ['#71dd37'],
        dataLabels: { enabled: false },
        plotOptions: { bar: { borderRadius: 6, columnWidth: '50%' } },
        grid: { borderColor: '#f1f1f1' },
        tooltip: { theme: 'light' }
    }).render();

});
</script>


    {{-- ── Recent Works + Recent Messages ── --}}
    <div class="row g-3 my-4">

        {{-- Recent Works --}}
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">Recent Works</h6>
                    <a href="{{ route('backend.works.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    @forelse($recentWorks as $work)
                    <div class="d-flex align-items-center px-3 py-2 border-bottom">
                        <img src="{{ asset('storage/' . $work->cover_image) }}"
                             class="rounded me-3" style="width:44px;height:36px;object-fit:cover;" alt="">
                        <div class="flex-grow-1">
                            <p class="mb-0 fw-semibold small">{{ $work->title }}</p>
                            <small class="text-muted">{{ ucfirst($work->category) }}</small>
                        </div>
                        <a href="{{ route('backend.works.edit', $work->id) }}" class="btn btn-sm btn-icon btn-outline-secondary">
                            <i class="bx bx-edit-alt"></i>
                        </a>
                    </div>
                    @empty
                    <p class="text-muted text-center py-4">No works added yet.</p>
                    @endforelse
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('backend.works.create') }}" class="btn btn-sm btn-primary">
                        <i class="bx bx-plus me-1"></i> Add New Work
                    </a>
                </div>
            </div>
        </div>

        {{-- Recent Messages --}}
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">
                        Recent Messages
                        @if($pendingContacts > 0)
                            <span class="badge bg-danger ms-1">{{ $pendingContacts }}</span>
                        @endif
                    </h6>
                    <a href="{{ route('backend.contacts.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    @forelse($recentContacts as $item)
                    <div class="d-flex align-items-start px-3 py-2 border-bottom">
                        <div class="avatar me-3 flex-shrink-0">
                            <span class="avatar-initial rounded-circle bg-label-info">
                                {{ strtoupper(substr($item->name, 0, 1)) }}
                            </span>
                        </div>
                        <div class="flex-grow-1" style="min-width:0">
                            <p class="mb-0 fw-semibold small">{{ $item->name }}</p>
                            <small class="text-muted d-block text-truncate">{{ $item->message }}</small>
                        </div>
                        <span class="badge ms-2 flex-shrink-0 {{ $item->status === 'pending' ? 'bg-label-danger' : 'bg-label-success' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>
                    @empty
                    <p class="text-muted text-center py-4">No messages yet.</p>
                    @endforelse
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('backend.contacts.index') }}" class="btn btn-sm btn-outline-secondary">
                        Manage All Messages
                    </a>
                </div>
            </div>
        </div>

    </div>

    {{-- ── Quick Actions ── --}}
    <div class="row g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h6 class="mb-0">Quick Actions</h6></div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-6 col-md-3">
                            <a href="{{ route('backend.works.create') }}" class="btn btn-outline-primary w-100">
                                <i class="bx bx-plus me-1"></i> Add Work
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="{{ route('backend.works.index') }}" class="btn btn-outline-secondary w-100">
                                <i class="bx bx-collection me-1"></i> All Works
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="{{ route('backend.contacts.index') }}" class="btn btn-outline-warning w-100">
                                <i class="bx bx-envelope me-1"></i> Messages
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="{{ route('backend.analytics.index') }}" class="btn btn-outline-success w-100">
                                <i class="bx bx-bar-chart-alt-2 me-1"></i> Analytics
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection