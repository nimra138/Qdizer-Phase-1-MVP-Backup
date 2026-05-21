@extends('admin.layouts.layout')

@section('title','Dashboard')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card shadow-sm">

            <div class="card-header bg-white">
                <h5 class="mb-0">Users List</h5>
            </div>

            <div class="card-body table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>

                            <th>Status</th>
                            <th>Trial Start</th>
                            <th>Trial End</th>

                            <th>Created At</th>
                            <th>About At</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($users as $user)

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

                            <td class="fw-semibold">
                                {{ $user->name }}
                            </td>

                            <td>{{ $user->email }}</td>

                            <!-- STATUS BADGE -->
                            <td>
                                <span class="badge bg-{{ $statusColor }}">
                                    {{ ucfirst($user->status) }}
                                </span>
                            </td>

                            <td>
                                {{ $user->trial_start ?? '-' }}
                            </td>

                            <td>
                                {{ $user->trial_end ?? '-' }}
                            </td>

                            <td>
                                {{ $user->created_at->format('d M, Y') }}
                            </td>
                            <td>
                              <a href="{{ route('admin.users.show', $user->id) }}"
                                class="btn btn-sm btn-dark">
                                    View
                                </a>
                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

                <div class="mt-3">
                    {{ $users->links() }}
                </div>

            </div>

        </div>

    </div>

</div>

@endsection