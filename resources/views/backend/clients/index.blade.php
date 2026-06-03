@extends('backend.layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Trusted By — Clients</h4>
        <a href="{{ route('backend.clients.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Client
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Order</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                    <tr>
                        <td>{{ $client->sort_order }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$client->logo) }}"
                                 alt="{{ $client->name }}"
                                 style="height:40px; object-fit:contain;">
                        </td>
                        <td>{{ $client->name }}</td>
                        <td>
                            @if($client->is_published)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Hidden</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('backend.clients.edit', $client) }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('backend.clients.destroy', $client) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this client?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            No clients added yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection