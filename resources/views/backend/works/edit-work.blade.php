@extends('backend.layouts.app')

@section('title', 'Edit Work - Myfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1">
                <span class="text-muted fw-light">Portfolio /</span> Edit Work
            </h4>
            <p class="text-muted mb-0 small">কাজটি সম্পাদনা করো</p>
        </div>
        <a href="{{ route('works.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bx bx-arrow-back me-1"></i> সব কাজে ফিরে যাও
        </a>
    </div>

    <form action="{{ route('works.update', $work->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-4">

            {{-- Left Column --}}
            <div class="col-lg-8">

                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center">
                        <i class="bx bx-edit text-primary me-2"></i>
                        <h6 class="mb-0">কাজের তথ্য</h6>
                    </div>
                    <div class="card-body">

                        <div class="mb-4">
                            <label class="form-label fw-semibold">কাজের নাম <span class="text-danger">*</span></label>
                            <input type="text" name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $work->title) }}" placeholder="কাজের নাম">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                            <div class="d-flex gap-3 flex-wrap">
                                @foreach(['mobile' => ['Social Media', 'bx-mobile-alt', 'primary'], 'web' => ['Web Design', 'bx-desktop', 'info'], 'social' => ['Branding', 'bx-palette', 'warning']] as $val => $info)
                                <label class="category-option flex-fill" style="cursor:pointer;">
                                    <input type="radio" name="category" value="{{ $val }}"
                                        {{ old('category', $work->category) == $val ? 'checked' : '' }}
                                        class="d-none category-radio">
                                    <div class="category-box border rounded-3 p-3 text-center">
                                        <i class="bx {{ $info[1] }} fs-3 text-{{ $info[2] }}"></i>
                                        <div class="fw-semibold mt-1 small">{{ $info[0] }}</div>
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">কাজের তারিখ</label>
                                <input type="date" name="work_date" class="form-control"
                                       value="{{ old('work_date', $work->work_date?->format('Y-m-d')) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control"
                                       value="{{ old('sort_order', $work->sort_order) }}" min="0">
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Images --}}
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center">
                        <i class="bx bx-images text-success me-2"></i>
                        <h6 class="mb-0">ছবি (না বদলালে আগেরটাই থাকবে)</h6>
                    </div>
                    <div class="card-body">

                        {{-- Current Cover --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Cover Image <span class="badge bg-label-secondary ms-1">বর্তমান ছবি</span>
                            </label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $work->cover_image) }}" alt=""
                                     class="rounded-3" style="height:120px; object-fit:cover;">
                            </div>
                            <div class="upload-area border rounded-3 p-3 text-center position-relative"
                                 style="border: 2px dashed #d1d5db; cursor:pointer;">
                                <input type="file" name="cover_image" id="coverInput"
                                       class="position-absolute w-100 h-100 top-0 start-0 opacity-0"
                                       style="cursor:pointer;" accept="image/*">
                                <div id="coverPreviewWrap">
                                    <i class="bx bx-cloud-upload me-1 text-muted"></i>
                                    <span class="text-muted small">নতুন Cover Image দিতে ক্লিক করো</span>
                                </div>
                                <img id="coverPreviewImg" src="" alt=""
                                     class="d-none rounded-3 mx-auto"
                                     style="max-height:150px; max-width:100%; object-fit:cover;">
                            </div>
                        </div>

                        {{-- Current Popup --}}
                        <div>
                            <label class="form-label fw-semibold">
                                Popup Image <span class="badge bg-label-secondary ms-1">বর্তমান ছবি</span>
                            </label>
                            @if($work->popup_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $work->popup_image) }}" alt=""
                                     class="rounded-3" style="height:120px; object-fit:cover;">
                            </div>
                            @endif
                            <div class="upload-area border rounded-3 p-3 text-center position-relative"
                                 style="border: 2px dashed #d1d5db; cursor:pointer;">
                                <input type="file" name="popup_image" id="popupInput"
                                       class="position-absolute w-100 h-100 top-0 start-0 opacity-0"
                                       style="cursor:pointer;" accept="image/*">
                                <div id="popupPreviewWrap">
                                    <i class="bx bx-image-add me-1 text-muted"></i>
                                    <span class="text-muted small">নতুন Popup Image দিতে ক্লিক করো</span>
                                </div>
                                <img id="popupPreviewImg" src="" alt=""
                                     class="d-none rounded-3 mx-auto"
                                     style="max-height:150px; max-width:100%; object-fit:cover;">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- Right Column --}}
            <div class="col-lg-4">

                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center">
                        <i class="bx bx-show text-warning me-2"></i>
                        <h6 class="mb-0">Visibility</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between p-3 rounded-3 bg-label-secondary">
                            <div>
                                <div class="fw-semibold small">"Show More" Section</div>
                                <div class="text-muted" style="font-size:.78rem;">চেক করলে Show More এ যাবে</div>
                            </div>
                            <div class="form-check form-switch ms-3 mb-0">
                                <input class="form-check-input" type="checkbox"
                                       name="is_extra" value="1"
                                       {{ old('is_extra', $work->is_extra) ? 'checked' : '' }}
                                       style="width:2.5rem; height:1.25rem;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bx bx-save me-2"></i> পরিবর্তন সংরক্ষণ করো
                        </button>
                        <a href="{{ route('works.index') }}" class="btn btn-outline-secondary">বাতিল করো</a>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<style>
.upload-area:hover { border-color: #696cff !important; background: rgba(105,108,255,.03); }
.category-box { border-color: #d1d5db !important; transition: all .2s; }
.category-radio:checked + .category-box { border-color: #696cff !important; background: rgba(105,108,255,.08); box-shadow: 0 0 0 3px rgba(105,108,255,.15); }
</style>

<script>
function setupPreview(inputId, previewImgId, wrapId) {
    document.getElementById(inputId).addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            const img = document.getElementById(previewImgId);
            img.src = e.target.result;
            img.classList.remove('d-none');
            document.getElementById(wrapId).classList.add('d-none');
        };
        reader.readAsDataURL(file);
    });
}
setupPreview('coverInput', 'coverPreviewImg', 'coverPreviewWrap');
setupPreview('popupInput', 'popupPreviewImg', 'popupPreviewWrap');
</script>
@endsection