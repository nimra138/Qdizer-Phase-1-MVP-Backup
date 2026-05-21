@extends('user.partials.app')

@section('title','Edit Service')

@section('content')

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h4 class="mb-1" style="color: var(--primary);">Edit Service</h4>
        <small class="text-muted">Update service details</small>
    </div>

    <!-- BACK BUTTON -->
    <a href="{{ route('services.index') }}"
       class="btn btn-sm d-flex align-items-center gap-2"
       style="background: var(--secondary); color:#fff; border-radius:10px;">

        <i class="fas fa-arrow-left"></i>
        Back

    </a>

</div>

<!-- FORM CARD -->
<div class="card-ui p-4" style="max-width: 800px; margin:auto;">

    <form action="{{ route('services.update', $service->id) }}" method="POST">

        @csrf
        @method('PUT')

        <!-- Service Name -->
        <div class="mb-3">
            <label class="form-label">Service Name</label>

            <input type="text"
                   name="service_name"
                   class="form-control @error('service_name') is-invalid @enderror"
                   value="{{ old('service_name', $service->service_name) }}"
                   placeholder="Enter service name">

            @error('service_name')
                <div class="text-danger mt-1" style="font-size:13px;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Unit Price -->
        <div class="mb-3">
            <label class="form-label">Unit Price</label>

            <input type="number"
                   step="0.01"
                   name="unit_price"
                   class="form-control @error('unit_price') is-invalid @enderror"
                   value="{{ old('unit_price', $service->unit_price) }}"
                   placeholder="Enter unit price">

            @error('unit_price')
                <div class="text-danger mt-1" style="font-size:13px;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label">Description</label>

            <textarea name="description"
                      rows="4"
                      class="form-control @error('description') is-invalid @enderror"
                      placeholder="Optional description">{{ old('description', $service->description) }}</textarea>

            @error('description')
                <div class="text-danger mt-1" style="font-size:13px;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- ACTION BUTTONS -->
        <div class="d-flex justify-content-end gap-2 mt-4">

            <!-- Cancel -->
            <a href="{{ route('services.index') }}"
               class="btn btn-sm"
               style="background: var(--secondary); color:#fff; border-radius:10px;">
                Cancel
            </a>

            <!-- Update -->
            <button type="submit"
                    class="btn btn-accent btn-sm px-3">
                <i class="fas fa-save me-1"></i>
                Update Service
            </button>

        </div>

    </form>

</div>

@endsection