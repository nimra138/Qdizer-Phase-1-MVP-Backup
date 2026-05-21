@extends('user.partials.app')

@section('title', 'Services')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div class="page-header">
        <h4 class="mb-1" style="color: var(--primary);">Services</h4>
        <small class="text-muted">Manage all your services here</small>
    </div>

    <!-- ADD SERVICE BUTTON -->
    <a href="{{ route('services.create') }}"
       class="btn btn-accent d-flex align-items-center gap-2 px-3 py-2">

        <i class="fas fa-plus"></i>
        Add Service

    </a>

</div>

<!-- TABLE CARD -->
<div class="card-ui" style="overflow: hidden;">

    <div class="table-responsive">

        <table class="table align-middle mb-0">

            <thead style="background: rgba(14,34,46,.04);">
                <tr>
                    <th>Service Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($services as $service)
                <tr>

                    <td>
                        <strong style="color: var(--primary);">
                            {{ $service->service_name }}
                        </strong>
                    </td>

                    <td>
                        <span class="badge"
                              style="background: rgba(255,138,0,.1); color: var(--accent); padding:8px 12px;">
                            Rs {{ $service->unit_price }}
                        </span>
                    </td>

                    <td class="text-muted" style="max-width:300px;">
                        {{ \Illuminate\Support\Str::limit($service->description, 60) }}
                    </td>

                    <td class="text-end">

                        <a href="{{ route('services.edit', $service) }}"
                           class="btn btn-sm"
                           style="background: var(--primary); color:#fff; border-radius:10px;">
                            <i class="fas fa-pen"></i>
                        </a>

                        <form action="{{ route('services.destroy', $service) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm"
                                    onclick="return confirm('Delete this service?')"
                                    style="background:#ef4444; color:#fff; border-radius:10px;">
                                <i class="fas fa-trash"></i>
                            </button>

                        </form>

                    </td>

                </tr>
                @empty

                <tr>
                    <td colspan="4" class="text-center py-5 text-muted">
                        No services found
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection