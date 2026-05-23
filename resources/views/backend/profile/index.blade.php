@extends('backend.layouts.app')
@section('title', 'Profile Settings - Myfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Profile Settings</h4>
        <p class="text-muted mb-0">তোমার portfolio র personal info manage করো</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('backend.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="row g-4">

            {{-- ── LEFT COLUMN ── --}}
            <div class="col-lg-8">

                {{-- Basic Info --}}
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center gap-2">
                        <i class="bx bx-user text-primary"></i>
                        <h6 class="mb-0">Basic Info</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name', $profile->name) }}">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Tagline</label>
                                <input type="text" name="tagline" class="form-control"
                                       value="{{ old('tagline', $profile->tagline) }}"
                                       placeholder="e.g. Graphic & UI Designer">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ old('email', $profile->email) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone / WhatsApp Number</label>
                                <input type="text" name="whatsapp" class="form-control"
                                       value="{{ old('whatsapp', $profile->whatsapp) }}"
                                       placeholder="e.g. 8801XXXXXXXXX">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Location</label>
                                <input type="text" name="location" class="form-control"
                                       value="{{ old('location', $profile->location) }}"
                                       placeholder="e.g. Chattogram, BD">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Telegram Username</label>
                                <input type="text" name="telegram" class="form-control"
                                       value="{{ old('telegram', $profile->telegram) }}"
                                       placeholder="e.g. @ekram">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Bio / About Me</label>
                                <textarea name="bio" rows="4" class="form-control"
                                          placeholder="নিজের সম্পর্কে কিছু লেখো...">{{ old('bio', $profile->bio) }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Social Links --}}
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center gap-2">
                        <i class="bx bx-link text-info"></i>
                        <h6 class="mb-0">Social Links</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    <i class="bx bxl-behance me-1 text-primary"></i> Behance URL
                                </label>
                                <input type="url" name="behance" class="form-control"
                                       value="{{ old('behance', $profile->behance) }}"
                                       placeholder="https://www.behance.net/...">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    <i class="bx bxl-facebook me-1 text-primary"></i> Facebook URL
                                </label>
                                <input type="url" name="facebook" class="form-control"
                                       value="{{ old('facebook', $profile->facebook) }}"
                                       placeholder="https://www.facebook.com/...">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    <i class="bx bxl-linkedin me-1 text-primary"></i> LinkedIn URL
                                </label>
                                <input type="url" name="linkedin" class="form-control"
                                       value="{{ old('linkedin', $profile->linkedin) }}"
                                       placeholder="https://www.linkedin.com/in/...">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    <i class="bx bxl-fiverr me-1 text-success"></i> Fiverr URL
                                </label>
                                <input type="url" name="fiverr" class="form-control"
                                       value="{{ old('fiverr', $profile->fiverr) }}"
                                       placeholder="https://www.fiverr.com/...">
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            {{-- ── RIGHT COLUMN ── --}}
            <div class="col-lg-4">

                {{-- Photo --}}
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center gap-2">
                        <i class="bx bx-camera text-success"></i>
                        <h6 class="mb-0">Profile Photo</h6>
                    </div>
                    <div class="card-body text-center">
                        @if($profile->photo)
                            <img src="{{ asset('storage/' . $profile->photo) }}" id="profilePreview"
                                 class="rounded-circle mb-3"
                                 style="width:100px;height:100px;object-fit:cover;" alt="">
                        @else
                            <img id="profilePreview" src="" alt=""
                                 class="rounded-circle mb-3 d-none"
                                 style="width:100px;height:100px;object-fit:cover;">
                            <div class="mb-3">
                                <i class="bx bx-user-circle" style="font-size:4rem;color:#ddd;"></i>
                            </div>
                        @endif

                        <div class="upload-area border rounded-3 p-3 position-relative"
                             style="border:2px dashed #d1d5db !important;cursor:pointer;">
                            <input type="file" name="photo" id="photoInput"
                                   class="position-absolute w-100 h-100 top-0 start-0 opacity-0"
                                   style="cursor:pointer;" accept="image/*">
                            <i class="bx bx-upload text-muted"></i>
                            <p class="text-muted small mb-0 mt-1">Photo change করতে ক্লিক করো</p>
                        </div>
                    </div>
                </div>

                {{-- CV Upload --}}
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center gap-2">
                        <i class="bx bx-file text-warning"></i>
                        <h6 class="mb-0">CV / Resume</h6>
                    </div>
                    <div class="card-body">
                        @if($profile->cv)
                            <div class="d-flex align-items-center gap-2 mb-3 p-2 bg-light rounded">
                                <i class="bx bxs-file-pdf text-danger fs-5"></i>
                                <a href="{{ asset('storage/' . $profile->cv) }}" target="_blank"
                                   class="text-primary small">Current CV দেখো</a>
                            </div>
                        @endif
                        <div class="upload-area border rounded-3 p-3 position-relative text-center"
                             style="border:2px dashed #d1d5db !important;cursor:pointer;">
                            <input type="file" name="cv"
                                   class="position-absolute w-100 h-100 top-0 start-0 opacity-0"
                                   style="cursor:pointer;" accept=".pdf">
                            <i class="bx bx-upload text-muted"></i>
                            <p class="text-muted small mb-0 mt-1">নতুন PDF upload করো</p>
                        </div>
                    </div>
                </div>

                {{-- Open to work toggle --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="fw-semibold mb-0">Open to Work</p>
                                <small class="text-muted">Frontend এ badge দেখাবে</small>
                            </div>
                            <div class="form-check form-switch mb-0 ms-3">
                                <input class="form-check-input" type="checkbox"
                                       name="open_to_work" value="1"
                                       {{ old('open_to_work', $profile->open_to_work) ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="bx bx-save me-1"></i> Save Profile
                </button>

            </div>
        </div>
    </form>

    {{-- ══ SKILLS SECTION ══ --}}
    <hr class="my-5">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h5 class="fw-bold mb-1">Skills</h5>
            <p class="text-muted mb-0">Admin থেকে skills manage করো</p>
        </div>
    </div>

    <div class="row g-4">

        {{-- Existing skills list --}}
        <div class="col-lg-8">
            @if($skills->isEmpty())
                <div class="card text-center py-4">
                    <p class="text-muted mb-0">এখনো কোনো skill যোগ করা হয়নি।</p>
                </div>
            @else
                <div class="card">
                    <div class="card-body p-0">
                        @foreach($skills as $skill)
                        <div class="d-flex align-items-center px-3 py-3 border-bottom gap-3">

                            @if($skill->icon_path)
                                <img src="{{ asset('storage/' . $skill->icon_path) }}"
                                     style="width:36px;height:36px;object-fit:contain;" alt="">
                            @else
                                <div style="width:36px;height:36px;background:#f0f0f0;border-radius:8px;"></div>
                            @endif

                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="fw-semibold small">{{ $skill->name }}</span>
                                    <span class="text-muted small">{{ $skill->percentage }}%</span>
                                </div>
                                <div class="progress" style="height:6px;">
                                    <div class="progress-bar bg-primary"
                                         style="width:{{ $skill->percentage }}%"></div>
                                </div>
                            </div>

                            <form action="{{ route('backend.skill.destroy', $skill->id) }}" method="POST"
                                  onsubmit="return confirm('Delete করবে?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>

                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        {{-- Add new skill form --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><h6 class="mb-0">নতুন Skill যোগ করো</h6></div>
                <div class="card-body">
                    <form action="{{ route('backend.skill.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Skill Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-sm"
                                   placeholder="e.g. Adobe Photoshop">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Percentage <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-center gap-2">
                                <input type="range" name="percentage" id="skillRange"
                                       min="1" max="100" value="80" class="flex-grow-1"
                                       oninput="document.getElementById('skillVal').textContent=this.value+'%'">
                                <span id="skillVal" class="fw-semibold small" style="min-width:36px">80%</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Icon Image <small class="text-muted">(optional)</small></label>
                            <input type="file" name="icon" class="form-control form-control-sm" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control form-control-sm"
                                   value="0" min="0">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm w-100">
                            <i class="bx bx-plus me-1"></i> Add Skill
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
document.getElementById('photoInput').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;
    const preview = document.getElementById('profilePreview');
    preview.src = URL.createObjectURL(file);
    preview.classList.remove('d-none');
});
</script>
@endsection