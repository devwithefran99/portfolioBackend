@extends('backend.layouts.app')
@section('title', 'Testimonials - Myfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1">Testimonials</h4>
            <p class="text-muted mb-0">Client reviews manage করো</p>
        </div>
        <a href="{{ route('backend.testimonials.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> Add New
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($testimonials->isEmpty())
        <div class="card text-center py-5">
            <p class="text-muted mb-3">এখনো কোনো testimonial যোগ করা হয়নি।</p>
            <div>
                <a href="{{ route('backend.testimonials.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i> প্রথম review যোগ করো
                </a>
            </div>
        </div>
    @else
        <div class="row g-3">
            @foreach($testimonials as $t)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">

                        {{-- Photo + Name --}}
                        <div class="d-flex align-items-center gap-3 mb-3">
                            @if($t->photo)
                                <img src="{{ asset('storage/' . $t->photo) }}"
                                     class="rounded-circle"
                                     style="width:52px;height:52px;object-fit:cover;" alt="">
                            @else
                                <div class="avatar">
                                    <span class="avatar-initial rounded-circle bg-label-primary">
                                        {{ strtoupper(substr($t->client_name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                            <div>
                                <p class="fw-semibold mb-0">{{ $t->client_name }}</p>
                                <small class="text-muted">{{ $t->location ?? '—' }}</small>
                            </div>
                            <div class="ms-auto">
                                @if($t->is_published)
                                    <span class="badge bg-label-success">Published</span>
                                @else
                                    <span class="badge bg-label-secondary">Hidden</span>
                                @endif
                            </div>
                        </div>

                        {{-- Stars --}}
                        <div class="mb-2" style="color:#f4b400;font-size:1rem;">
                            @for($s = 1; $s <= 5; $s++)
                                {{ $s <= $t->rating ? '★' : '☆' }}
                            @endfor
                        </div>

                        {{-- Review --}}
                        <p class="text-muted small mb-3" style="line-height:1.6">
                            {{ Str::limit($t->review, 120) }}
                        </p>

                    </div>

                    <div class="card-footer bg-transparent border-0 pb-3 px-3">
                        <div class="d-flex gap-2">
                            <a href="{{ route('backend.testimonials.edit', $t->id) }}"
                               class="btn btn-sm btn-outline-primary flex-fill">
                                <i class="bx bx-edit me-1"></i> Edit
                            </a>
                            <form action="{{ route('backend.testimonials.destroy', $t->id) }}" method="POST" class="flex-fill"
                                  onsubmit="return confirm('এই review মুছে ফেলবে?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger w-100">
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
@endsection