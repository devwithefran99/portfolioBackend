@extends('backend.layouts.app')
@section('title', 'Work Stats')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold mb-4">
        <span class="text-muted fw-light">Works /</span> Stats
    </h4>

    <div class="row g-4">

        {{-- Top Viewed --}}
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bx bx-show text-primary fs-5"></i>
                    <h5 class="mb-0"> Most Viewed Work</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Work Title</th>
                                <th class="text-center"> Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topViewed as $i => $work)
                            <tr>
                                <td class="text-muted">{{ $i + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset('storage/' . $work->cover_image) }}"
                                             width="36" height="36"
                                             style="object-fit:cover; border-radius:6px;">
                                        {{ $work->title }}
                                    </div>
                                </td>
                                <td class="text-center fw-bold text-primary">{{ number_format($work->views) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Top Liked --}}
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bx bx-heart text-danger fs-5"></i>
                    <h5 class="mb-0">Most Liked Work</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Work Title</th>
                                <th class="text-center"> Likes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topLiked as $i => $work)
                            <tr>
                                <td class="text-muted">{{ $i + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset('storage/' . $work->cover_image) }}"
                                             width="36" height="36"
                                             style="object-fit:cover; border-radius:6px;">
                                        {{ $work->title }}
                                    </div>
                                </td>
                                <td class="text-center fw-bold text-danger">{{ number_format($work->likes) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection 