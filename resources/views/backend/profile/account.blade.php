@extends('backend.layouts.app')
@section('title', 'Account Settings')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Account Settings</h4>
        <p class="text-muted mb-0">Login email ও password পরিবর্তন করো</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible mb-4">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bx bx-lock-alt text-primary"></i>
                    <h6 class="mb-0">Change Email & Password</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.account.update') }}" method="POST">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Login Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', auth()->user()->email) }}">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <hr class="my-4">

                       {{-- Current Password --}}
<div class="mb-3">
    <label class="form-label fw-semibold">Current Password <span class="text-danger">*</span></label>
    <div class="input-group">
        <input type="password" name="current_password" id="currentPass"
               class="form-control @error('current_password') is-invalid @enderror"
               placeholder="বর্তমান password দাও">
        <span class="input-group-text toggle-pass" style="cursor:pointer;" data-target="currentPass">
    <i class="bx bx-hide"></i>
</span>
        @error('current_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

{{-- New Password --}}
<div class="mb-3">
    <label class="form-label fw-semibold">New Password</label>
    <div class="input-group">
        <input type="password" name="new_password" id="newPass" class="form-control"
               placeholder="নতুন password (optional)">
        <span class="input-group-text toggle-pass" style="cursor:pointer;" data-target="newPass">
    <i class="bx bx-hide"></i>
</span>
    </div>
    <div class="form-text">শুধু email change করলে এটা খালি রাখো</div>
</div>

{{-- Confirm New Password --}}
<div class="mb-4">
    <label class="form-label fw-semibold">Confirm New Password</label>
    <div class="input-group">
        <input type="password" name="new_password_confirmation" id="confirmPass" class="form-control"
               placeholder="নতুন password আবার দাও">
        <span class="input-group-text toggle-pass" style="cursor:pointer;" data-target="confirmPass">
    <i class="bx bx-hide"></i>
</span>
    </div>
</div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bx bx-save me-1"></i> Save Changes
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggle-pass').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const input = document.getElementById(this.dataset.target);
            const icon  = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bx-hide', 'bx-show');
            } else {
                input.type = 'password';
                icon.classList.replace('bx-show', 'bx-hide');
            }
        });
    });
});
</script>

@endsection

