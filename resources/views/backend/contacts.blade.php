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
       @if($pendingCount > 0)
    <span class="badge bg-danger fs-6">{{ $pendingCount }} Pending</span>
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
                   <td class="text-muted small">{{ $contacts->firstItem() + $loop->index }}</td>
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
                                <button class="btn btn-sm btn-success" title="Mark as Done">
                                    <i class="bx bx-check"></i>
                                </button>
                            </form>
                            @endif

                            {{-- Reply Button --}}
                            <button class="btn btn-sm btn-info" title="Reply"
                                    data-bs-toggle="modal"
                                    data-bs-target="#replyModal{{ $item->id }}">
                                <i class="bx bx-reply"></i>
                            </button>

                            <form action="{{ route('backend.contact.delete', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Delete this message?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Delete">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>
                        </div>

                        {{-- Reply Modal --}}
                        <div class="modal fade" id="replyModal{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('backend.contact.reply', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h6 class="modal-title">
                                                <i class="bx bx-reply me-1"></i> Reply to {{ $item->name }}
                                            </h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="bg-light rounded p-3 mb-3">
                                                <p class="small mb-1">
                                                    <strong>To:</strong> {{ $item->email }}
                                                </p>
                                                <p class="small mb-0">
                                                    <strong>Their message:</strong> {{ Str::limit($item->message, 120) }}
                                                </p>
                                            </div>
                                            <label class="form-label fw-semibold small">Your Reply</label>
                                            <textarea name="reply_message" rows="5" class="form-control"
                                                      placeholder="Reply লেখো..." required minlength="10"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="bx bx-send me-1"></i> Send Reply
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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

                    {{-- Reply Button --}}
                    <button class="btn btn-sm btn-info"
                            data-bs-toggle="modal"
                            data-bs-target="#replyModalMob{{ $item->id }}">
                        <i class="bx bx-reply me-1"></i> Reply
                    </button>

                    <form action="{{ route('backend.contact.delete', $item->id) }}" method="POST"
                          onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            <i class="bx bx-trash me-1"></i> Delete
                        </button>
                    </form>
                </div>

                {{-- Mobile Reply Modal --}}
                <div class="modal fade" id="replyModalMob{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('backend.contact.reply', $item->id) }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h6 class="modal-title">
                                        <i class="bx bx-reply me-1"></i> Reply to {{ $item->name }}
                                    </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="bg-light rounded p-3 mb-3">
                                        <p class="small mb-1">
                                            <strong>To:</strong> {{ $item->email }}
                                        </p>
                                        <p class="small mb-0">
                                            <strong>Their message:</strong> {{ Str::limit($item->message, 120) }}
                                        </p>
                                    </div>
                                    <label class="form-label fw-semibold small">Your Reply</label>
                                    <textarea name="reply_message" rows="5" class="form-control"
                                              placeholder="Reply লেখো..." required minlength="10"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                            data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="bx bx-send me-1"></i> Send Reply
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @empty
        <p class="text-muted text-center py-4">No messages yet.</p>
        @endforelse
    </div>

     {{-- Pagination --}}
    @if($contacts->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $contacts->links() }}
        </div>
    @endif
</div>
@endsection