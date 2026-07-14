@extends('user.partials.app')

@section('title', 'Quotations')

@section('content')
    @php
        $expired = auth()->check() && auth()->user()->status == 'expired';
    @endphp
    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="mb-1" style="color: var(--primary);">Quotations</h4>
            <small class="text-muted">Manage all your client quotations</small>
        </div>

        {{-- <a href="{{ route('quotations.create') }}"
       class="btn btn-accent d-flex align-items-center gap-2 px-3 py-2">

        <i class="fas fa-plus"></i>
        Create Quotation

    </a> --}}

        <a href="{{ $expired ? 'javascript:void(0)' : route('quotations.create') }}"
            class="{{ $expired ? 'text-muted' : '' }} btn btn-accent d-flex align-items-center gap-2 px-3 py-2"
            @if ($expired) onclick="alert('Your trial has expired. Please upgrade your subscription.')" @endif>
            <i class="fas fa-plus"></i>
            Create Quotation
        </a>

    </div>
    <!-- SEARCH -->
    <div class="card-ui p-4 mb-4" style="border-radius:16px;">
        <form method="GET" action="{{ route('quotations.index') }}">
            <div class="row g-3 align-items-center">

                <div class="{{ request('search') ? 'col-md-8' : 'col-md-10' }}">
                    <div class="position-relative">
                        <i class="fas fa-search position-absolute"
                            style="left:16px; top:15px; color: var(--text-muted); z-index:5;"></i>

                        <input type="text" name="search" value="{{ request('search') }}" class="form-control ps-5"
                            style="height:48px; border-radius:12px;"
                            placeholder="Search by client name or quotation number...">
                    </div>
                </div>

                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-accent" style="height:48px;">
                        Search
                    </button>
                </div>

                @if (request('search'))
                    <div class="col-md-2 d-grid">
                        <a href="{{ route('quotations.index') }}" class="btn btn-outline-secondary" style="height:48px;">
                            Clear
                        </a>
                    </div>
                @endif

            </div>
        </form>
    </div>

    @if (request('search'))
        <div class="alert alert-info border-0 shadow-sm mb-4" style="border-radius:12px;">
            Found <strong>{{ $quotations->total() }}</strong> result(s) for:
            <strong>"{{ request('search') }}"</strong>
        </div>
    @endif
    <!-- STATS -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="card-ui p-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <small class="text-muted">Total Quotations</small>
                        <h3 class="mb-0 mt-2">{{ $totalQuotations ?? $quotations->total() }}</h3>
                    </div>
                    <i class="fas fa-file-invoice fa-2x text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-ui p-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <small class="text-muted">This Page</small>
                        <h3 class="mb-0 mt-2">{{ $quotations->count() }}</h3>
                    </div>
                    <i class="fas fa-list fa-2x text-muted"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-ui p-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <small class="text-muted">Latest ID</small>
                        <h5 class="mb-0 mt-2">
                            {{ optional($quotations->first())->quotation_number ?? 'N/A' }}
                        </h5>
                    </div>
                    <i class="fas fa-hashtag fa-2x text-muted"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLE CARD -->
    <div class="card-ui">

        @if ($quotations->count() > 0)

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead style="background: rgba(14,34,46,.04);">
                        <tr>
                            <th>#</th>
                            <th>Quotation</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Subtotal</th>
                            {{-- <th>VAT</th> --}}
                            <th>Total</th>
                            {{-- <th>Status</th> --}}
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($quotations as $quotation)
                            <tr>

                                <td>
                                    {{ ($quotations->currentPage() - 1) * $quotations->perPage() + $loop->iteration }}
                                </td>

                                <td>
                                    <strong style="color: var(--primary);">
                                        {{ $quotation->quotation_number }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $quotation->client->client_name ?? 'N/A' }}
                                    <br>
                                    <small class="text-muted">
                                        {{ $quotation->client->phone_number ?? '' }}
                                    </small>
                                </td>

                                <td class="text-muted">
                                    {{ $quotation->date }}
                                </td>

                                <td>
                                    {{ number_format($quotation->subtotal, 2) }}
                                </td>

                                {{-- <td>
                        {{ number_format($quotation->vat, 2) }}
                    </td> --}}

                                <td>
                                    <strong style="color: var(--primary);">
                                        {{ number_format($quotation->total, 2) }}
                                    </strong>
                                </td>

                                {{-- <td>
                        <span class="badge bg-success">
                            Active
                        </span>
                    </td> --}}

                                <!-- ACTIONS -->
                                <td class="text-end d-flex justify-content-end gap-2">

                                    <a href="{{ route('quotations.show', $quotation) }}" class="btn btn-sm"
                                        style="background: var(--secondary); color:#fff; border-radius:10px;">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @php
    $phone = preg_replace('/[^0-9]/', '', $quotation->client->phone_number);

    $publicUrl = route('quotation.public', $quotation->public_token);

    $text = "📄 Quotation: {$quotation->quotation_number}\n\n";
    $text .= "Hello {$quotation->client->client_name},\n\n";
    $text .= "Please review your quotation using the link below:\n";
    $text .= $publicUrl . "\n\n";
    $text .= "Thank you,\n";
    $text .= $setting->company_name;

    $waMessage = urlencode($text);

    $disabledUrl = 'javascript:void(0)';
    $expiredMessage = "alert('Your trial has expired. Please upgrade your subscription.')";
@endphp

<a href="{{ $expired ? $disabledUrl : 'https://wa.me/' . $phone . '?text=' . $waMessage }}"
   target="{{ $expired ? '_self' : '_blank' }}"
   class="btn btn-sm {{ $expired ? 'text-muted' : '' }}"
   style="background:#25D366; color:#fff; border-radius:10px;"
   @if($expired)
       onclick="{{ $expiredMessage }}"
   @endif>
    <i class="fab fa-whatsapp"></i>
</a>
                                  
                                    {{-- Edit --}}
                                    <a href="{{ $expired ? $disabledUrl : route('quotations.edit', $quotation->id) }}"
                                        class="btn btn-sm {{ $expired ? 'text-muted' : '' }}"
                                        style="background: var(--primary); color:#fff; border-radius:10px;"
                                        @if ($expired) onclick="{{ $expiredMessage }}" @endif>
                                        <i class="fas fa-pen"></i>
                                    </a>

                                  
                                    {{-- @php
                                        $phone = preg_replace('/[^0-9]/', '', $quotation->client->phone_number);

                                        $url = route('quotation.public', $quotation->public_token);

                                        $message = "Hello {$quotation->client->client_name},

                                        Please review your quotation.

                                        Quotation #: {$quotation->quotation_number}

                                        View quotation:
                                        {$url}

                                        Thank you,
                                        {$setting->company_name}";

                                        $waMessage = urlencode($message);
                                    @endphp

                                    <a href="{{ $expired ? 'javascript:void(0)' : 'https://wa.me/' . $phone . '?text=' . $waMessage }}"
                                        target="{{ $expired ? '_self' : '_blank' }}"
                                        class="btn btn-sm {{ $expired ? 'text-muted' : '' }}"
                                        style="background:#25D366; color:#fff; border-radius:10px;"
                                        @if ($expired) onclick="alert('Your trial has expired. Please upgrade your subscription.')" @endif>
                                        <i class="fab fa-whatsapp"></i>
                                    </a> --}}

                                    <form action="{{ route('quotations.destroy', $quotation->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm" onclick="return confirm('Delete this quotation?')"
                                            style="background:#ef4444; color:#fff; border-radius:10px;">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </form>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
        @else
            <!-- EMPTY STATE -->
            <div class="text-center py-5">

                <h5 class="text-muted">No Quotations Found</h5>
                <p class="text-muted">Start by creating your first quotation.</p>

                <a href="{{ route('quotations.create') }}" class="btn btn-accent px-4">
                    <i class="fas fa-plus"></i>
                    Create Quotation
                </a>

            </div>

        @endif

    </div>

    <!-- PAGINATION -->
    @if ($quotations->hasPages())
        <div class="mt-3 mb-5">
            {{ $quotations->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif

@endsection
