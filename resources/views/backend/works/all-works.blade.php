@extends('backend.layouts.app')

@section('title', 'All Works - Myfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Header --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1">
                <span class="text-muted fw-light">Portfolio /</span> All Works
            </h4>
            <p class="text-muted mb-0 small">মোট {{ $works->count() }}টি কাজ আছে</p>
        </div>
        <a href="{{ route('works.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> নতুন কাজ যোগ করো
        </a>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Filter Tabs --}}
    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3 gap-1" id="workTabs">
            <li class="nav-item">
                <button class="nav-link active" data-filter="all">
                    সব <span class="badge bg-primary ms-1">{{ $works->count() }}</span>
                </button>
            </li>
            @foreach(['mobile' => ['Social Media','bx-mobile-alt'], 'web' => ['Web Design','bx-desktop'], 'social' => ['Branding','bx-palette']] as $key => $info)
            <li class="nav-item">
                <button class="nav-link" data-filter="{{ $key }}">
                    <i class="bx {{ $info[1] }} me-1"></i>{{ $info[0] }}
                    <span class="badge bg-label-secondary ms-1">{{ $works->where('category', $key)->count() }}</span>
                </button>
            </li>
            @endforeach
        </ul>
    </div>

    {{-- Works Grid --}}
    @if($works->isEmpty())
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="bx bx-image-add text-muted" style="font-size:4rem; opacity:.4;"></i>
                <h5 class="mt-3 text-muted">এখনো কোনো কাজ যোগ করা হয়নি</h5>
                <a href="{{ route('works.create') }}" class="btn btn-primary mt-2">
                    <i class="bx bx-plus me-1"></i> প্রথম কাজ যোগ করো
                </a>
            </div>
        </div>
    @else
        <div class="row g-4" id="worksGrid">
            @foreach($works as $work)
            <div class="col-xl-3 col-lg-4 col-md-6 work-grid-item" data-category="{{ $work->category }}">
                <div class="card h-100 work-card-admin border-0 shadow-sm position-relative overflow-hidden">

                    {{-- Badge --}}
                    <div class="position-absolute top-0 start-0 m-2 z-1">
                        @php
                            $badges = ['mobile'=>['Social Media','bg-primary'], 'web'=>['Web Design','bg-info'], 'social'=>['Branding','bg-warning']];
                            [$label, $color] = $badges[$work->category] ?? ['Unknown','bg-secondary'];
                        @endphp
                        <span class="badge {{ $color }}">{{ $label }}</span>
                    </div>

                    @if($work->is_extra)
                    <div class="position-absolute top-0 end-0 m-2 z-1">
                        <span class="badge bg-label-secondary" style="font-size:.65rem;">Show More</span>
                    </div>
                    @endif

                    {{-- Cover Image --}}
                    <div style="height: 180px; overflow:hidden; background:#f1f5f9;">
                        <img src="{{ asset('storage/' . $work->cover_image) }}"
                             alt="{{ $work->title }}"
                             class="w-100 h-100"
                             style="object-fit:cover; transition: transform .3s;"
                             onmouseover="this.style.transform='scale(1.05)'"
                             onmouseout="this.style.transform='scale(1)'">
                    </div>

                    <div class="card-body pb-2">
                        <h6 class="fw-semibold mb-1 text-truncate" title="{{ $work->title }}">{{ $work->title }}</h6>
                        <p class="text-muted mb-0 small">
                            <i class="bx bx-calendar me-1"></i>
                            {{ $work->work_date ? $work->work_date->format('d M Y') : '—' }}
                        </p>
                    </div>

                    {{-- Actions --}}
                    <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-3">
                        <div class="d-flex gap-2">
                            <a href="{{ route('works.edit', $work->id) }}"
                               class="btn btn-sm btn-outline-primary flex-fill">
                                <i class="bx bx-edit me-1"></i> Edit
                            </a>
                            <form action="{{ route('works.destroy', $work->id) }}" method="POST" class="flex-fill">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger w-100 delete-btn"
                                        data-title="{{ $work->title }}">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>

{{-- ─── Styles ──────────────────────────────────────────────── --}}
<style>
.work-card-admin { transition: box-shadow .2s, transform .2s; }
.work-card-admin:hover { box-shadow: 0 8px 32px rgba(0,0,0,.12) !important; transform: translateY(-2px); }
#workTabs .nav-link { font-size:.85rem; padding:.45rem .9rem; border-radius: .5rem; }
.work-grid-item { transition: all .3s ease; }
.work-grid-item.hidden { display: none !important; }
</style>

{{-- ─── Scripts ─────────────────────────────────────────────── --}}
<script>
// Filter tabs
document.querySelectorAll('#workTabs .nav-link').forEach(btn => {
    btn.addEventListener('click', function () {
        document.querySelectorAll('#workTabs .nav-link').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        const filter = this.dataset.filter;
        document.querySelectorAll('.work-grid-item').forEach(item => {
            if (filter === 'all' || item.dataset.category === filter) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    });
});

// Delete confirm
document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', function (e) {
        const title = this.dataset.title;
        if (!confirm(`"${title}" মুছে ফেলতে চাও? এটি undo করা যাবে না।`)) {
            e.preventDefault();
        }
    });
});
</script>
@endsection