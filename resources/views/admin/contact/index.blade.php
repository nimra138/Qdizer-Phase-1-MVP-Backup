@extends('admin.layouts.layout')

@section('title','Contact Messages')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h4 class="mb-1 fw-bold">
                        Contact Messages
                    </h4>

                    <small class="text-muted">
                        Manage customer inquiries and support requests
                    </small>
                </div>

                <span class="badge bg-primary fs-6 px-3 py-2">
                    Total: {{ $messages->total() }}
                </span>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="30%">Customer</th>

                            <th>Phone</th>

                            <th>Subject</th>

                            <th>Status</th>

                            <th>Date</th>

                            <th width="120">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($messages as $message)

                        <tr>

                            <td>

                                <div class="d-flex align-items-center">

                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold"
                                         style="width:48px;height:48px;">

                                        {{ strtoupper(substr($message->name,0,1)) }}

                                    </div>

                                    <div class="ms-3">

                                        <div class="fw-semibold">
                                            {{ $message->name }}
                                        </div>

                                        <small class="text-muted">
                                            {{ $message->email }}
                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>

                                {{ $message->phone }}

                            </td>

                            <td>

                                <span class="fw-medium">
                                    {{ $message->subject }}
                                </span>

                            </td>

                            <td>

                                @if($message->is_read)

                                    <span class="badge rounded-pill bg-success">
                                        <i class="fas fa-check-circle me-1"></i>
                                        Read
                                    </span>

                                @else

                                    <span class="badge rounded-pill bg-warning text-dark">
                                        <i class="fas fa-envelope me-1"></i>
                                        New
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div>{{ $message->created_at->format('d M Y') }}</div>

                                <small class="text-muted">
                                    {{ $message->created_at->format('h:i A') }}
                                </small>

                            </td>

                            <td>

                                <a href="{{ route('admin.contact.show',$message) }}"
                                   class="btn btn-primary btn-sm rounded-pill">

                                    <i class="fas fa-eye me-1"></i>

                                    View

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-5">

                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>

                                <h5>No Contact Messages</h5>

                                <p class="text-muted mb-0">
                                    Messages will appear here once customers contact you.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        @if($messages->hasPages())

        <div class="card-footer bg-white">

            {{ $messages->links() }}

        </div>

        @endif

    </div>

</div>

@endsection