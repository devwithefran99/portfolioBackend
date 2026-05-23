@extends('backend.layouts.app')
@section('title', 'Contact Messages - Myfolio')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1">Contact Messages</h4>
            <p class="text-muted mb-0">Manage all messages from your portfolio visitors.</p>
        </div>
        @php $pending = $contacts->where('status','pending')->count(); @endphp
        @if($pending > 0)
            <span class="badge bg-danger fs-6">{{ $pending }} Pending</span>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Desktop Table --}}
    <div class="card d-none d-md-block">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($contacts as $i => $item)
                <tr>
                    <td class="text-muted small">{{ $i + 1 }}</td>
                    <td class="fw-semibold">{{ $item->name }}</td>
                    <td>
                        <a href="mailto:{{ $item->email }}" class="text-primary">{{ $item->email }}</a>
                    </td>
                    <td style="max-width:260px">
                        <span class="d-block text-truncate" title="{{ $item->message }}">
                            {{ $item->message }}
                        </span>
                    </td>
                    <td>
                        @if($item->status === 'pending')
                            <span class="badge bg-label-danger">Pending</span>
                        @else
                            <span class="badge bg-label-success">Done</span>
                        @endif
                    </td>
                    <td class="text-muted small">{{ $item->created_at->format('d M Y') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            @if($item->status === 'pending')
                            <form action="{{ route('backend.contact.done', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-success">
                                    <i class="bx bx-check"></i>
                                </button>
                            </form>
                            @endif
                            <form action="{{ route('backend.contact.delete', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Delete this message?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted">No messages yet.</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Mobile Cards --}}
    <div class="d-md-none">
        @forelse($contacts as $item)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h6 class="fw-bold mb-0">{{ $item->name }}</h6>
                    @if($item->status === 'pending')
                        <span class="badge bg-label-danger">Pending</span>
                    @else
                        <span class="badge bg-label-success">Done</span>
                    @endif
                </div>
                <p class="mb-1 small text-muted">{{ $item->email }}</p>
                <p class="mb-2 small">{{ $item->message }}</p>
                <p class="mb-3 small text-muted">{{ $item->created_at->format('d M Y') }}</p>
                <div class="d-flex gap-2">
                    @if($item->status === 'pending')
                    <form action="{{ route('backend.contact.done', $item->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-success">
                            <i class="bx bx-check me-1"></i> Done
                        </button>
                    </form>
                    @endif
                    <form action="{{ route('backend.contact.delete', $item->id) }}" method="POST"
                          onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            <i class="bx bx-trash me-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p class="text-muted text-center py-4">No messages yet.</p>
        @endforelse
    </div>

</div>
@endsection