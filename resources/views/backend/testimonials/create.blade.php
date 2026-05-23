@extends('backend.layouts.app')
@section('title', 'Add Testimonial - Myfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1"><span class="text-muted fw-light">Testimonials /</span> Add New</h4>
            <p class="text-muted mb-0">নতুন client review যোগ করো</p>
        </div>
        <a href="{{ route('backend.testimonials.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bx bx-arrow-back me-1"></i> Back
        </a>
    </div>

    <form action="{{ route('backend.testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">

            {{-- Left --}}
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header"><h6 class="mb-0">Client Info</h6></div>
                    <div class="card-body">

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Client Name <span class="text-danger">*</span></label>
                                <input type="text" name="client_name"
                                       class="form-control @error('client_name') is-invalid @enderror"
                                       value="{{ old('client_name') }}" placeholder="e.g. Rafiq Ahmed">
                                @error('client_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Location</label>
                                <input type="text" name="location"
                                       class="form-control"
                                       value="{{ old('location') }}" placeholder="e.g. BD, USA">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Rating <span class="text-danger">*</span></label>
                            <div class="d-flex gap-2">
                                @for($s = 1; $s <= 5; $s++)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating"
                                           id="star{{ $s }}" value="{{ $s }}"
                                           {{ old('rating', 5) == $s ? 'checked' : '' }}>
                                    <label class="form-check-label" for="star{{ $s }}" style="color:#f4b400">
                                        {{ str_repeat('★', $s) }}
                                    </label>
                                </div>
                                @endfor
                            </div>
                            @error('rating')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-semibold">Review <span class="text-danger">*</span></label>
                            <textarea name="review" rows="4"
                                      class="form-control @error('review') is-invalid @enderror"
                                      placeholder="Client এর review লেখো...">{{ old('review') }}</textarea>
                            @error('review')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                    </div>
                </div>
            </div>

            {{-- Right --}}
            <div class="col-lg-4">

                {{-- Photo upload --}}
                <div class="card mb-4">
                    <div class="card-header"><h6 class="mb-0">Client Photo</h6></div>
                    <div class="card-body text-center">
                        <img id="photoPreview" src="" alt=""
                             class="rounded-circle mb-3 d-none"
                             style="width:80px;height:80px;object-fit:cover;">
                        <div class="upload-area border rounded-3 p-3 text-center position-relative"
                             style="border: 2px dashed #d1d5db !important; cursor:pointer;">
                            <input type="file" name="photo" id="photoInput"
                                   class="position-absolute w-100 h-100 top-0 start-0 opacity-0"
                                   style="cursor:pointer;" accept="image/*">
                            <i class="bx bx-user-circle fs-2 text-muted"></i>
                            <p class="text-muted small mb-0 mt-1">Photo upload করো<br><small>(optional)</small></p>
                        </div>
                        @error('photo')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>

                {{-- Publish & Order --}}
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
                            <input type="number" name="sort_order" class="form-control form-control-sm"
                                   value="{{ old('sort_order', 0) }}" min="0">
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="bx bx-save me-1"></i> Save Testimonial
                </button>

            </div>
        </div>
    </form>

</div>

<script>
document.getElementById('photoInput').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;
    const preview = document.getElementById('photoPreview');
    preview.src = URL.createObjectURL(file);
    preview.classList.remove('d-none');
});
</script>
@endsection