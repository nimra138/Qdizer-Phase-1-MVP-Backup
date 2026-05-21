@extends('user.partials.app')

@section('title', 'Edit Quotation')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h3>Update Quotation</h3>
        <small class="text-muted">
            Edit quotation details and recalculate totals
        </small>
    </div>

    <form action="{{ route('quotations.update', $quotation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-4">

            {{-- LEFT --}}
            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4 p-3">

                    <label>Client</label>
                    <select name="client_id" class="form-control mb-3">

                        @foreach($clients as $client)
                            <option value="{{ $client->id }}"
                                {{ $quotation->client_id == $client->id ? 'selected' : '' }}>
                                {{ $client->client_name }}
                            </option>
                        @endforeach

                    </select>

                    <label>Notes</label>
                    <textarea name="notes"
                              class="form-control"
                              rows="4">{{ $quotation->notes }}</textarea>

                    <button class="btn btn-warning w-100 mt-3">
                        Update Quotation
                    </button>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-md-8">

                <div class="card border-0 shadow-sm rounded-4 p-3">

                    <h5>Services</h5>

                    <table class="table">

                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Qty</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($quotation->items as $i => $item)

                            <tr>

                                <td>
                                    <select name="items[{{ $i }}][service_id]"
                                            class="form-control">

                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}"
                                                {{ $item->service_id == $service->id ? 'selected' : '' }}>
                                                {{ $service->service_name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </td>

                                <td>
                                    <input type="number"
                                           name="items[{{ $i }}][quantity]"
                                           value="{{ $item->quantity }}"
                                           class="form-control">
                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection