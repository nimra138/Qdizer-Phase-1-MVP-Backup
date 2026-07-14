@extends('admin.layouts.layout')

@section('title','Services')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold">Services</h3>
        <p class="text-muted mb-0">
            View all services created by users.
        </p>
    </div>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form method="GET" class="row mb-3">

            <div class="col-md-4">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="Search service...">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary">
                    Search
                </button>
            </div>

        </form>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-liht">

                    <tr>

                        <th>#</th>

                        <th>Service</th>

                        {{-- <th>Price</th> --}}

                        <th>Owner</th>

                        <th>Created</th>

                        <th width="100">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($services as $service)

                    <tr>

                        <td>{{ $service->id }}</td>

                        <td>{{ $service->service_name }}</td>

                        {{-- <td>{{ number_format($service->price,2) }}</td> --}}

                        <td>{{ $service->user->name ?? '-' }}</td>

                        <td>{{ $service->created_at->format('d M Y') }}</td>

                        <td>

                            <a href="{{ route('admin.services.show',$service->id) }}"
                               class="btn btn-sm btn-outline-primary">

                                <i class="fas fa-eye"></i>

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-4">

                            No services found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $services->withQueryString()->links() }}

        </div>

    </div>

</div>

@endsection