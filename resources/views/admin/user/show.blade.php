@extends('admin.layouts.layout')

@section('title','User Details')

@section('content')

<div class="row">

    <div class="col-lg-10 mx-auto">

        <!-- PAGE HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">User Profile</h3>
                <p class="text-muted mb-0">
                    Detailed information about this user
                </p>
            </div>

            <a href="{{ route('admin.user') }}" class="btn btn-outline-dark">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        @php
            $statusColor = match($user->status) {
                'active' => 'success',
                'trial' => 'warning',
                'expired' => 'danger',
                default => 'secondary'
            };
        @endphp

        <div class="card border-0 shadow-sm overflow-hidden">

            <!-- TOP HEADER -->
            <div class="bg-dark text-white p-4">

                <div class="d-flex align-items-center gap-3">

                    <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center fw-bold"
                         style="width:70px;height:70px;font-size:26px;">
                        {{ strtoupper(substr($user->name,0,1)) }}
                    </div>

                    <div>
                        <h4 class="mb-1 fw-bold">
                            {{ $user->name }}
                        </h4>

                        <p class="mb-1 opacity-75">
                            {{ $user->email }}
                        </p>

                        <span class="badge bg-{{ $statusColor }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </div>

                </div>

            </div>

            <!-- BODY -->
            <div class="card-body p-4">

                <div class="row g-4">

                    <!-- PERSONAL INFO -->
                    <div class="col-md-6">

                        <div class="border rounded-4 p-4 h-100">

                            <h5 class="fw-bold mb-4">
                                Personal Information
                            </h5>

                            <div class="mb-3">
                                <label class="text-muted small">Full Name</label>
                                <div class="fw-semibold">
                                    {{ $user->name ?? '-' }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text-muted small">Company</label>
                                <div class="fw-semibold">
                                    {{ $user->company ?? '-' }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text-muted small">Email Address</label>
                                <div class="fw-semibold">
                                    {{ $user->email ?? '-' }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text-muted small">Phone Number</label>
                                <div class="fw-semibold">
                                    {{ $user->phone ?? '-' }}
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- ACCOUNT INFO -->
                    <div class="col-md-6">

                        <div class="border rounded-4 p-4 h-100">

                            <h5 class="fw-bold mb-4">
                                Account Information
                            </h5>

                            <div class="mb-3">
                                <label class="text-muted small">Account Status</label>
                                <div>
                                    <span class="badge bg-{{ $statusColor }}">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text-muted small">Email Verification</label>

                                <div>
                                    @if($user->email_verified_at)
                                        <span class="badge bg-success">
                                            Verified
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Not Verified
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text-muted small">Trial Start</label>
                                <div class="fw-semibold">
                                    {{ $user->trial_start ? \Carbon\Carbon::parse($user->trial_start)->format('d M, Y') : '-' }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text-muted small">Trial End</label>
                                <div class="fw-semibold">
                                    {{ $user->trial_end ? \Carbon\Carbon::parse($user->trial_end)->format('d M, Y') : '-' }}
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- SYSTEM INFO -->
                    <div class="col-12">

                        <div class="border rounded-4 p-4">

                            <h5 class="fw-bold mb-4">
                                System Information
                            </h5>

                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <label class="text-muted small">User ID</label>
                                    <div class="fw-semibold">
                                        #{{ $user->id }}
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="text-muted small">Created At</label>
                                    <div class="fw-semibold">
                                        {{ $user->created_at->format('d M, Y h:i A') }}
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="text-muted small">Last Updated</label>
                                    <div class="fw-semibold">
                                        {{ $user->updated_at->format('d M, Y h:i A') }}
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection