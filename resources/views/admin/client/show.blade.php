@extends('admin.layouts.layout')

@section('title','Client Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">Client Details</h3>
            <p class="text-muted mb-0">
                Complete information about this client.
            </p>
        </div>

        <a href="{{ route('admin.clients') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>

    </div>

    <div class="row">

        <!-- Client Information -->

        <div class="col-lg-4">

            <div class="card shadow-sm border-0">

                <div class="card-body text-center">

                    <img src="https://ui-avatars.com/api/?name={{ urlencode($client->name) }}&background=0D8ABC&color=fff&size=120"
                        class="rounded-circle mb-3">

                    <h4>{{ $client->client_name }}</h4>

                    {{-- <p class="text-muted">
                        {{ $client->company ?? 'No Company' }}
                    </p> --}}

                    <hr>

                    <div class="text-start">

                        <p>
                            <strong>Email</strong><br>
                            {{ $client->email }}
                        </p>

                        <p>
                            <strong>Phone</strong><br>
                            {{ $client->phone_number }}
                        </p>

                        <p>
                            <strong>Address</strong><br>
                            {{ $client->address ?? '-' }}
                        </p>

                        {{-- <p>
                            <strong>City</strong><br>
                            {{ $client->city ?? '-' }}
                        </p> --}}

                        {{-- <p>
                            <strong>Country</strong><br>
                            {{ $client->country ?? '-' }}
                        </p> --}}

                    </div>

                </div>

            </div>

        </div>

        <!-- Right Side -->

        <div class="col-lg-8">

            <!-- Owner -->

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header">

                    <h5 class="mb-0">
                        Account Owner
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">

                            <strong>Name</strong>

                            <p>{{ $client->user->name }}</p>

                        </div>

                        <div class="col-md-6">

                            <strong>Email</strong>

                            <p>{{ $client->user->email }}</p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Statistics -->

            <div class="row mb-4">

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm text-center">

                        <div class="card-body">

                            <h3 class="text-primary">
                                {{ $client->quotations->count() }}
                            </h3>

                            <small>Total Quotations</small>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm text-center">

                        <div class="card-body">

                            <h3 class="text-success">
                                {{ number_format($client->quotations->sum('total'),2) }}
                            </h3>

                            <small>Total Value</small>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm text-center">

                        <div class="card-body">

                            <h3 class="text-warning">
                                {{ $client->created_at->format('d M Y') }}
                            </h3>

                            <small>Created</small>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Quotations -->

            <div class="card shadow-sm border-0">

                <div class="card-header">

                    <h5 class="mb-0">
                        Client Quotations
                    </h5>

                </div>

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead>

                            <tr>

                                <th class="text-white">#</th>

                                <th class="text-white">Quotation No.</th>

                                <th class="text-white">Date</th>

                                {{-- <th class="text-white">Total</th> --}}

                            </tr>

                        </thead>

                        <tbody >

                            @forelse($client->quotations as $quotation)

                                <tr>

                                    <td class="text-white">{{ $loop->iteration }}</td>

                                    <td class="text-white">{{ $quotation->quotation_number }}</td>

                                    <td class="text-white">{{ $quotation->date }}</td>

                                    {{-- <td class="text-white">{{ number_format($quotation->total,2) }}</td> --}}

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="text-center">

                                        No quotations found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection