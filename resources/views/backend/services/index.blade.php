@extends('backend.layouts.app')
@section('title', 'Services - Myfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1">Services</h4>
            <p class="text-muted mb-0">Portfolio এর services manage করো</p>
        </div>
        <a href="{{ route('backend.services.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> Add New
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($services->isEmpty())
        <div class="card text-center py-5">
            <p class="text-muted mb-3">এখনো কোনো service যোগ করা হয়নি।</p>
            <div>
                <a href="{{ route('backend.services.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i> প্রথম service যোগ করো
                </a>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Tags</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $i => $srv)
                    <tr>
                        <td class="text-muted small">{{ $i + 1 }}</td>
                        <td>
                            <p class="fw-semibold mb-0">{{ $srv->title }}</p>
                            <small class="text-muted">{{ Str::limit($srv->description, 60) }}</small>
                        </td>
                        <td>
                            @foreach($srv->tags_array as $tag)
                                <span class="badge bg-label-primary me-1">{{ $tag }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if($srv->is_published)
                                <span class="badge bg-label-success">Published</span>
                            @else
                                <span class="badge bg-label-secondary">Hidden</span>
                            @endif
                        </td>
                        <td class="text-muted">{{ $srv->sort_order }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('backend.services.edit', $srv->id) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('backend.services.destroy', $srv->id) }}" method="POST"
                                      onsubmit="return confirm('Delete করবে?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>
@endsection