@extends('user.partials.app')

@section('title', 'Clients')

@section('content')

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h4 class="mb-1" style="color: var(--primary);">Clients</h4>
        <small class="text-muted">Manage your customer database</small>
    </div>

    <a href="{{ route('clients.create') }}"
       class="btn btn-accent d-flex align-items-center gap-2 px-3 py-2">

        <i class="fas fa-user-plus"></i>
        Add Client

    </a>

</div>

<!-- SEARCH -->
<div class="card-ui p-3 mb-4">

    <form method="GET" action="{{ route('clients.index') }}">

        <div class="d-flex gap-2">

            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control"
                   placeholder="Search clients by name, phone or email...">

            <button class="btn btn-primary px-4">
                <i class="fas fa-search"></i>
            </button>

        </div>

    </form>

</div>

<!-- TABLE -->
<div class="card-ui">

    @if($clients->count() > 0)

    <div class="table-responsive">

        <table class="table align-middle mb-0">

            <thead style="background: rgba(14,34,46,.04);">
                <tr>
                    <th>Client</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Notes</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($clients as $client)

                <tr>

                    <!-- CLIENT -->
                    <td>
                        <strong style="color: var(--primary);">
                            {{ $client->client_name }}
                        </strong>
                        <br>
                        <small class="text-muted">
                            #{{ $client->id }}
                        </small>
                    </td>

                    <!-- CONTACT -->
                    <td>
                        <div>
                            <i class="fas fa-phone text-muted"></i>
                            {{ $client->phone_number }}
                        </div>

                        @if($client->email)
                        <small class="text-muted">
                            <i class="fas fa-envelope"></i>
                            {{ $client->email }}
                        </small>
                        @endif
                    </td>

                    <!-- ADDRESS -->
                    <td class="text-muted">
                        {{ $client->address ?? '—' }}
                    </td>

                    <!-- NOTES -->
                    <td class="text-muted">
                        {{ \Illuminate\Support\Str::limit($client->notes, 40) ?? '—' }}
                    </td>

                    <!-- ACTIONS -->
                    <td class="text-end d-flex justify-content-end gap-2">

                        <a href="{{ route('clients.show', $client->id) }}"
                           class="btn btn-sm"
                           style="background: var(--secondary); color:#fff; border-radius:10px;">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a href="{{ route('clients.edit', $client->id) }}"
                           class="btn btn-sm"
                           style="background: var(--primary); color:#fff; border-radius:10px;">
                            <i class="fas fa-pen"></i>
                        </a>

                        <form action="{{ route('clients.destroy', $client->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm"
                                    onclick="return confirm('Delete this client?')"
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

        <i class="fas fa-users fa-2x text-muted mb-3"></i>

        <h5 class="text-muted">No Clients Found</h5>

        <p class="text-muted">
            Start by adding your first client.
        </p>

        <a href="{{ route('clients.create') }}"
           class="btn btn-accent px-4">
            <i class="fas fa-user-plus"></i>
            Add Client
        </a>

    </div>

    @endif

</div>

<!-- PAGINATION -->
@if($clients->hasPages())
<div class="mt-3">
    {{ $clients->links('pagination::bootstrap-5') }}
</div>
@endif

@endsection