@extends('backend.layouts.app')
@section('title', 'Add Service - Myfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1"><span class="text-muted fw-light">Services /</span> Add New</h4>
        </div>
        <a href="{{ route('backend.services.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bx bx-arrow-back me-1"></i> Back
        </a>
    </div>

    <form action="{{ route('backend.services.store') }}" method="POST">
        @csrf
        <div class="row g-4">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header"><h6 class="mb-0">Service Info</h6></div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title') }}"
                                   placeholder="e.g. Brand Identity">
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description <span class="text-danger">*</span></label>
                            <textarea name="description" rows="4"
                                      class="form-control @error('description') is-invalid @enderror"
                                      placeholder="Service সম্পর্কে বিস্তারিত লেখো...">{{ old('description') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-semibold">Tags</label>
                            <input type="text" name="tags" class="form-control"
                                   value="{{ old('tags') }}"
                                   placeholder="Logo Design, Color Palette, Typography">
                            <div class="form-text">Comma দিয়ে আলাদা করো</div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header"><h6 class="mb-0">Settings</h6></div>
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <p class="fw-semibold small mb-0">Published</p>
                                <small class="text-muted">Frontend এ দেখাবে</small>
                            </div>
                            <div class="form-check form-switch ms-3 mb-0">
                                <input class="form-check-input" type="checkbox"
                                       name="is_published" value="1"
                                       {{ old('is_published', true) ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div>
                            <label class="form-label fw-semibold small">Sort Order</label>
                            <input type="number" name="sort_order"
                                   class="form-control form-control-sm"
                                   value="{{ old('sort_order', 0) }}" min="0">
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="bx bx-save me-1"></i> Save Service
                </button>
            </div>

        </div>
    </form>

</div>
@endsection