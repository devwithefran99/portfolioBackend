@extends('backend.layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Edit Client</h4>
        <a href="{{ route('backend.clients.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="card" style="max-width:520px;">
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('backend.clients.update', $client) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Client Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $client->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Logo Image</label>
                    {{-- Current logo preview --}}
                    <div class="mb-2 p-2 border rounded d-inline-block">
                        <img src="{{ asset('storage/'.$client->logo) }}"
                             alt="{{ $client->name }}"
                             style="height:50px; object-fit:contain;">
                    </div>
                    <input type="file" name="logo" class="form-control"
                           accept="image/*">
                    <small class="text-muted">নতুন logo না দিলে পুরনোটাই থাকবে</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control"
                           value="{{ old('sort_order', $client->sort_order) }}" min="0">
                </div>

                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                               name="is_published" id="is_published"
                               {{ $client->is_published ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">
                            Published
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-check-lg"></i> Update Client
                </button>

            </form>
        </div>
    </div>

</div>
@endsection