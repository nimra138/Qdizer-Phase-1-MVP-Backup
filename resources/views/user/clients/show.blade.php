@extends('user.partials.app')

@section('title', 'Client Profile')

@section('content')

<div class="container-fluid py-4 mb-5">
     @php
        $expired = auth()->check() && auth()->user()->status == 'expired';
    @endphp

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-0">{{ $client->client_name }}</h3>
            <small class="text-muted">Client Profile & History</small>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('clients.edit', $client->id) }}"
               class="btn btn-warning rounded-3">
               <i class="fas fa-edit"></i>
                Edit Client
            </a>

            {{-- <a href="{{ route('quotations.create') }}"
               class="btn btn-primary rounded-3">
                
            </a> --}}
            <a class="btn btn-primary rounded-3" href="{{ $expired ? 'javascript:void(0)' : route('quotations.create') }}"
                   class="{{ $expired ? 'text-muted' : '' }}"
                   @if($expired)
                       onclick="alert('Your trial has expired. Please upgrade your subscription.')"
                   @endif>
                    <i class="fas fa-plus"></i>
                    Create Quotation
                </a>
        </div>

    </div>

    <div class="row g-4">

        {{-- LEFT: CLIENT INFO --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <h5 class="mb-3">Client Details</h5>

                    <div class="mb-3">
                        <small class="text-muted">Phone</small>
                        <div class="fw-bold">📞 {{ $client->phone_number }}</div>
                    </div>

                    @if($client->email)
                    <div class="mb-3">
                        <small class="text-muted">Email</small>
                        <div>{{ $client->email }}</div>
                    </div>
                    @endif

                    @if($client->address)
                    <div class="mb-3">
                        <small class="text-muted">Address</small>
                        <div>{{ $client->address }}</div>
                    </div>
                    @endif

                    @if($client->notes)
                    <div class="mb-3">
                        <small class="text-muted">Notes</small>
                        <div class="text-muted">
                            {{ $client->notes }}
                        </div>
                    </div>
                    @endif

                    <hr>

                    <div class="d-flex justify-content-between">
                        <small class="text-muted">Client ID</small>
                        <strong>#{{ $client->id }}</strong>
                    </div>

                </div>

            </div>

        </div>

        {{-- RIGHT: QUOTATIONS HISTORY --}}
        <div class="col-md-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h5 class="mb-0">Quotation History</h5>

                        <span class="badge bg-primary">
                            {{ $client->quotations->count() }} Total
                        </span>

                    </div>

                    @if($client->quotations->count() > 0)

                        <div class="table-responsive">

                            <table class="table align-middle">

                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Quotation</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        {{-- <th>Status</th>
                                        <th class="text-end">Action</th> --}}
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($client->quotations as $quotation)

                                        <tr>

                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>
                                                <strong>
                                                    {{ $quotation->quotation_number ?? 'QT-'.$quotation->id }}
                                                </strong>
                                            </td>

                                            <td>
                                                {{ $quotation->created_at->format('d M Y') }}
                                            </td>

                                            <td>
                                                <span class="fw-bold">
                                                    {{ number_format($quotation->total ?? 0, 2) }}
                                                </span>
                                            </td>

                                            {{-- <td>
                                                <span class="badge bg-success">
                                                    {{ $quotation->status ?? 'Draft' }}
                                                </span>
                                            </td> --}}

                                            {{-- <td class="text-end">

                                                <a href="#"
                                                   class="btn btn-sm btn-light border">
                                                    View
                                                </a>

                                            </td> --}}

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    @else

                        {{-- EMPTY STATE --}}
                        <div class="text-center py-5">

                            <h6 class="text-muted">No Quotations Found</h6>

                            <p class="text-muted small">
                                This client has not been used in any quotation yet.
                            </p>

                            <a href="#"
                               class="btn btn-primary rounded-3">
                                Create First Quotation
                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection