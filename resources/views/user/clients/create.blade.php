@extends('user.partials.app')

@section('title', 'Add Client')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <h3 class="mb-0">Add New Client</h3>
        <small class="text-muted">Create a reusable client for quotations</small>
    </div>

    <div class="row justify-content-center mb-5">

        <div class="col-md-8">

            {{-- FORM CARD --}}
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <form action="{{ route('clients.store') }}" method="POST">
                        @csrf

                        {{-- CLIENT NAME --}}
                        <div class="mb-3">
                            <label class="form-label">Client Name *</label>
                            <input type="text"
                                   name="client_name"
                                   value="{{ old('client_name') }}"
                                   class="form-control @error('client_name') is-invalid @enderror"
                                   placeholder="e.g. Ali Traders">

                            @error('client_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- PHONE --}}
                        <div class="mb-3">
                            <label class="form-label">Phone Number *</label>
                            <input type="text"
                                   name="phone_number"
                                   value="{{ old('phone_number') }}"
                                   class="form-control @error('phone_number') is-invalid @enderror"
                                   placeholder="+923001234567">

                            <small class="text-muted">
                                Must include country code (e.g. +971, +92)
                            </small>

                            @error('phone_number')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-3">
                            <label class="form-label">Email (Optional)</label>
                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   class="form-control"
                                   placeholder="client@example.com">
                        </div>

                        {{-- ADDRESS --}}
                        <div class="mb-3">
                            <label class="form-label">Address (Optional)</label>
                            <textarea name="address"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Full address">{{ old('address') }}</textarea>
                        </div>

                        {{-- NOTES --}}
                        <div class="mb-3">
                            <label class="form-label">Notes (Optional)</label>
                            <textarea name="notes"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Any important notes about client">{{ old('notes') }}</textarea>
                        </div>

                        {{-- BUTTONS --}}
                        <div class="d-flex justify-content-between mt-4">

                            <a href="{{ route('clients.index') }}"
                               class="btn btn-light border px-4 rounded-3">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="btn btn-primary px-4 rounded-3">
                                Save Client
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection