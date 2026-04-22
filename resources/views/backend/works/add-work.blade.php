@extends('backend.layouts.app')

@section('title', 'Add Work - Myfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Page Header --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1">
                <span class="text-muted fw-light">Portfolio /</span> Add New Work
            </h4>
            <p class="text-muted mb-0 small">নতুন কাজ যোগ করো — এটি সরাসরি Portfolio তে দেখাবে</p>
        </div>
        <a href="{{ route('works.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bx bx-list-ul me-1"></i> সব কাজ দেখো
        </a>
    </div>

    {{-- Alert Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">

            {{-- ─── Left Column: Main Info ─────────────────── --}}
            <div class="col-lg-8">

                {{-- Basic Info Card --}}
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center">
                        <i class="bx bx-info-circle text-primary me-2"></i>
                        <h6 class="mb-0">কাজের তথ্য</h6>
                    </div>
                    <div class="card-body">

                        {{-- Title --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                কাজের নাম <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="যেমন: Creative Fruit Poster Design"
                                value="{{ old('title') }}"
                            >
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Category --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Category <span class="text-danger">*</span>
                            </label>
                            <div class="d-flex gap-3 flex-wrap">
                                @foreach(['mobile' => ['Social Media', 'bx-mobile-alt', 'primary'], 'web' => ['Web Design', 'bx-desktop', 'info'], 'social' => ['Branding', 'bx-palette', 'warning']] as $val => $info)
                                <label class="category-option flex-fill" style="cursor:pointer;">
                                    <input type="radio" name="category" value="{{ $val }}"
                                        {{ old('category', 'mobile') == $val ? 'checked' : '' }}
                                        class="d-none category-radio">
                                    <div class="category-box border rounded-3 p-3 text-center transition-all" style="border-width:2px !important;">
                                        <i class="bx {{ $info[1] }} fs-3 text-{{ $info[2] }}"></i>
                                        <div class="fw-semibold mt-1 small">{{ $info[0] }}</div>
                                    </div>
                                </label>
                                @endforeach
                            </div>
                            @error('category')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Date & Sort --}}
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">কাজের তারিখ</label>
                                <input
                                    type="date"
                                    name="work_date"
                                    class="form-control @error('work_date') is-invalid @enderror"
                                    value="{{ old('work_date', date('Y-m-d')) }}"
                                >
                                @error('work_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Sort Order</label>
                                <input
                                    type="number"
                                    name="sort_order"
                                    class="form-control"
                                    placeholder="0"
                                    value="{{ old('sort_order', 0) }}"
                                    min="0"
                                >
                                <div class="form-text">ছোট নম্বর আগে দেখাবে</div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Images Card --}}
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center">
                        <i class="bx bx-images text-success me-2"></i>
                        <h6 class="mb-0">ছবি আপলোড</h6>
                    </div>
                    <div class="card-body">

                        {{-- Cover Image --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Cover Image <span class="text-danger">*</span>
                                <span class="badge bg-label-primary ms-1 small">Card এ দেখাবে</span>
                            </label>
                            <div class="upload-area border-2 border-dashed rounded-3 p-4 text-center position-relative @error('cover_image') border-danger @enderror"
                                 id="coverDropZone"
                                 style="border: 2px dashed #d1d5db; cursor:pointer; transition: all .2s;">
                                <input type="file" name="cover_image" id="coverInput"
                                       class="position-absolute w-100 h-100 top-0 start-0 opacity-0"
                                       style="cursor:pointer;" accept="image/*">
                                <div id="coverPreviewWrap">
                                    <i class="bx bx-cloud-upload fs-1 text-muted"></i>
                                    <p class="mb-1 fw-semibold text-muted">Cover Image টেনে আনো বা ক্লিক করো</p>
                                    <p class="small text-muted mb-0">JPG, PNG, WEBP — সর্বোচ্চ 4MB</p>
                                </div>
                                <img id="coverPreviewImg" src="" alt=""
                                     class="d-none rounded-3 mx-auto"
                                     style="max-height:200px; max-width:100%; object-fit:cover;">
                            </div>
                            @error('cover_image')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Popup Image --}}
                        <div>
                            <label class="form-label fw-semibold">
                                Popup Image
                                <span class="badge bg-label-secondary ms-1 small">Optional — Eye আইকনে দেখাবে</span>
                            </label>
                            <div class="upload-area border-2 border-dashed rounded-3 p-4 text-center position-relative"
                                 id="popupDropZone"
                                 style="border: 2px dashed #d1d5db; cursor:pointer; transition: all .2s;">
                                <input type="file" name="popup_image" id="popupInput"
                                       class="position-absolute w-100 h-100 top-0 start-0 opacity-0"
                                       style="cursor:pointer;" accept="image/*">
                                <div id="popupPreviewWrap">
                                    <i class="bx bx-image-add fs-1 text-muted"></i>
                                    <p class="mb-1 fw-semibold text-muted">Popup Image (বড় ছবি)</p>
                                    <p class="small text-muted mb-0">না দিলে Popup হবে না — সর্বোচ্চ 6MB</p>
                                </div>
                                <img id="popupPreviewImg" src="" alt=""
                                     class="d-none rounded-3 mx-auto"
                                     style="max-height:200px; max-width:100%; object-fit:cover;">
                            </div>
                            @error('popup_image')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>

            </div>

            {{-- ─── Right Column: Settings ──────────────────── --}}
            <div class="col-lg-4">

                {{-- Visibility Card --}}
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center">
                        <i class="bx bx-show text-warning me-2"></i>
                        <h6 class="mb-0">Visibility</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between p-3 rounded-3 bg-label-secondary">
                            <div>
                                <div class="fw-semibold small">"Show More" Section</div>
                                <div class="text-muted" style="font-size:0.78rem;">
                                    চেক করলে "Show More" চাপলে দেখাবে,<br>না করলে সরাসরি দেখাবে
                                </div>
                            </div>
                            <div class="form-check form-switch ms-3 mb-0">
                                <input class="form-check-input" type="checkbox"
                                       name="is_extra" value="1" id="isExtra"
                                       {{ old('is_extra') ? 'checked' : '' }}
                                       style="width:2.5rem; height:1.25rem;">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Preview Card --}}
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center">
                        <i class="bx bx-low-vision text-info me-2"></i>
                        <h6 class="mb-0">Card Preview</h6>
                    </div>
                    <div class="card-body p-2">
                        <div class="rounded-3 overflow-hidden" style="background:#0f172a;">
                            <div style="height:160px; background:#1e293b; position:relative; overflow:hidden;">
                                <img id="previewCardImg" src="" alt=""
                                     class="w-100 h-100 d-none"
                                     style="object-fit:cover; opacity:.85;">
                                <div class="position-absolute w-100 h-100 top-0 start-0 d-flex align-items-center justify-content-center"
                                     id="previewPlaceholder">
                                    <i class="bx bx-image text-muted" style="font-size:2.5rem; opacity:.4;"></i>
                                </div>
                            </div>
                            <div class="p-3">
                                <div class="text-muted mb-1" style="font-size:.72rem;" id="previewDate">{{ date('d M Y') }}</div>
                                <div class="text-white fw-semibold small" id="previewTitle">কাজের নাম এখানে দেখাবে</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="card">
                    <div class="card-body d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bx bx-plus-circle me-2"></i> Portfolio তে যোগ করো
                        </button>
                        <a href="{{ route('works.index') }}" class="btn btn-outline-secondary">
                            বাতিল করো
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

{{-- ─── Styles ──────────────────────────────────────────────── --}}
<style>
.upload-area:hover {
    border-color: #696cff !important;
    background: rgba(105,108,255,.03);
}
.category-box {
    border-color: #d1d5db !important;
    transition: all .2s;
}
.category-radio:checked + .category-box {
    border-color: #696cff !important;
    background: rgba(105,108,255,.08);
    box-shadow: 0 0 0 3px rgba(105,108,255,.15);
}
</style>

{{-- ─── Scripts ─────────────────────────────────────────────── --}}
<script>
// Image preview helper
function setupPreview(inputId, previewImgId, wrapId, cardPreviewId) {
    document.getElementById(inputId).addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            const img = document.getElementById(previewImgId);
            const wrap = document.getElementById(wrapId);
            img.src = e.target.result;
            img.classList.remove('d-none');
            wrap.classList.add('d-none');
            // card preview
            if (cardPreviewId) {
                const cardImg = document.getElementById(cardPreviewId);
                cardImg.src = e.target.result;
                cardImg.classList.remove('d-none');
                document.getElementById('previewPlaceholder').classList.add('d-none');
            }
        };
        reader.readAsDataURL(file);
    });
}

setupPreview('coverInput', 'coverPreviewImg', 'coverPreviewWrap', 'previewCardImg');
setupPreview('popupInput', 'popupPreviewImg', 'popupPreviewWrap', null);

// Live title preview
document.querySelector('[name="title"]').addEventListener('input', function () {
    const t = this.value.trim();
    document.getElementById('previewTitle').textContent = t || 'কাজের নাম এখানে দেখাবে';
});

// Live date preview
document.querySelector('[name="work_date"]').addEventListener('change', function () {
    if (!this.value) return;
    const d = new Date(this.value);
    document.getElementById('previewDate').textContent = d.toLocaleDateString('en-GB', {
        day:'2-digit', month:'short', year:'numeric'
    });
});
</script>
@endsection