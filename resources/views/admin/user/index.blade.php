@extends('admin.layouts.layout')

@section('title', 'Users')

@section('content')

<div class="container-fluid">

    <!-- Statistics -->
    <div class="row mb-4">

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h3 class="fw-bold">{{ \App\Models\User::count() }}</h3>
                    <small class="text-muted">Total Users</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h3 class="text-success fw-bold">
                        {{ \App\Models\User::where('status','active')->count() }}
                    </h3>
                    <small class="text-muted">Active Users</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h3 class="text-warning fw-bold">
                        {{ \App\Models\User::where('status','trial')->count() }}
                    </h3>
                    <small class="text-muted">Trial Users</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h3 class="text-danger fw-bold">
                        {{ \App\Models\User::where('status','expired')->count() }}
                    </h3>
                    <small class="text-muted">Expired Users</small>
                </div>
            </div>
        </div>

    </div>

    <!-- Users Card -->
    <div class="card shadow-sm border-0">

        <div class="card-header">
            <h5 class="mb-0">Users List</h5>
        </div>

        <div class="card-body">

            <!-- Filter -->
            <form method="GET" action="{{ route('admin.users') }}" class="mb-4">

                <div class="row g-3">

                    <div class="col-lg-3">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control"
                               placeholder="Search name, email, company...">
                    </div>

                    <div class="col-lg-2">
                        <select name="status" class="form-select">
                            <option value="">All Status</option>

                            <option value="active"
                                {{ request('status')=='active'?'selected':'' }}>
                                Active
                            </option>

                            <option value="trial"
                                {{ request('status')=='trial'?'selected':'' }}>
                                Trial
                            </option>

                            <option value="expired"
                                {{ request('status')=='expired'?'selected':'' }}>
                                Expired
                            </option>

                        </select>
                    </div>

                    <div class="col-lg-2">
                        <select name="verified" class="form-select">

                            <option value="">Email Status</option>

                            <option value="yes"
                                {{ request('verified')=='yes'?'selected':'' }}>
                                Verified
                            </option>

                            <option value="no"
                                {{ request('verified')=='no'?'selected':'' }}>
                                Unverified
                            </option>

                        </select>
                    </div>

                    <div class="col-lg-2">
                        <input type="date"
                               name="from"
                               value="{{ request('from') }}"
                               class="form-control">
                    </div>

                    <div class="col-lg-2">
                        <input type="date"
                               name="to"
                               value="{{ request('to') }}"
                               class="form-control">
                    </div>

                    <div class="col-lg-1 d-grid">
                        <button class="btn btn-primary">
                            Filter
                        </button>
                    </div>

                </div>

                <div class="mt-3">
                    <a href="{{ route('admin.users') }}"
                       class="btn btn-outline-secondary btn-sm">
                        Reset Filters
                    </a>
                </div>

            </form>

            <!-- Table -->

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="tablelight">

                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Email Status</th>
                        <th>Status</th>
                        <th>Trial End</th>
                        <th>Created</th>
                        <th width="100">Action</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse($users as $user)

                        @php
                            $statusColor = match($user->status) {
                                'active' => 'success',
                                'trial' => 'warning',
                                'expired' => 'danger',
                                default => 'secondary'
                            };
                        @endphp

                        <tr>

                            <td>{{ $user->id }}</td>

                            <td>{{ $user->name }}</td>

                            <td>{{ $user->company ?? '-' }}</td>

                            <td>{{ $user->email }}</td>

                            <td>{{ $user->phone ?? '-' }}</td>

                            <td>

                                @if($user->email_verified_at)

                                    <span class="badge bg-success">
                                        Verified
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Unverified
                                    </span>

                                @endif

                            </td>

                            <td>
                                <span class="badge bg-{{ $statusColor }}">
                                    {{ ucfirst($user->status) }}
                                </span>
                            </td>

                            <td>
                                {{ $user->trial_end ? \Carbon\Carbon::parse($user->trial_end)->format('d M Y') : '-' }}
                            </td>

                            <td>
                                {{ $user->created_at->format('d M Y') }}
                            </td>

                            <td>

                                <a href="{{ route('admin.users.show',$user) }}"
                                   class="btn btn-sm btn-primary">
                                    View
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="10" class="text-center py-4">

                                <strong>No users found.</strong>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $users->links() }}
            </div>

        </div>

    </div>

</div>

@endsection