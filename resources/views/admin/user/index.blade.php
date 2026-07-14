@extends('admin.layouts.layout')

@section('title','Dashboard')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="ab-card">

            <div class="ab-card-header">
                <h5 class="mb-0">Users List</h5>
            </div>

            <div class="ab-card-body table-responsive">

                <table class="table ab-table align-middle mb-0">

                    <thead>
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
                                'active' => 'green',
                                'trial' => 'amber',
                                'expired' => 'red',
                                default => 'blue'
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
                                <span class="ab-badge ab-badge-{{ $statusColor }}">
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
                                class="btn btn-sm ab-btn-view">
                                    View
                                </a>
                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

                <div class="mt-3 px-3 pb-2">
                    {{ $users->links() }}
                </div>

            </div>

        </div>

    </div>

</div>

@endsection