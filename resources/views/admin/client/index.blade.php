@extends('admin.layouts.layout')

@section('title','Clients')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">Clients</h3>
        <p class="text-muted mb-0">
            Manage all clients across the platform.
        </p>
    </div>
</div>

<div class="ab-card">

    <div class="ab-card-body">

        <form method="GET" class="row mb-3">

            <div class="col-md-4">
                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Search client..."
                       value="{{ request('search') }}">
            </div>

            <div class="col-md-2">
                <button class="btn ab-btn-primary">
                    Search
                </button>
            </div>

        </form>

        <div class="table-responsive">

            <table class="table ab-table align-middle mb-0">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Name</th>

                        {{-- <th>Company</th> --}}

                        <th>Email</th>

                        <th>Phone</th>

                        <th>Owner</th>

                        <th>Created</th>

                        <th width="120">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($clients as $client)

                    <tr>

                        <td>{{ $client->id }}</td>

                        <td>{{ $client->client_name }}</td>

                        {{-- <td>{{ $client->company ?? '-' }}</td> --}}

                        <td>{{ $client->email }}</td>

                        <td>{{ $client->phone_number }}</td>

                        <td>
                            {{ $client->user->name ?? '-' }}
                        </td>

                        <td>
                            {{ $client->created_at->format('d M Y') }}
                        </td>

                        <td>

                           <a href="{{ route('admin.clients.show',$client->id) }}"
                            class="btn btn-sm ab-btn-icon">
                                <i class="fas fa-eye"></i>
                            </a>

                            {{-- <a href="#"
                               class="btn btn-sm ab-btn-icon-danger">
                                <i class="fas fa-trash"></i>
                            </a> --}}

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="8" class="text-center py-5 text-muted">

                            No clients found.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $clients->withQueryString()->links() }}

        </div>

    </div>

</div>

@endsection