@extends('user.partials.app')

@section('title', 'Create Service')

@section('content')

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h4 class="mb-1" style="color: var(--primary);">Create Service</h4>
        <small class="text-muted">Add a new service to your system</small>
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
<div class="card-ui p-4">

    <form action="{{ route('services.store') }}" method="POST">
        @csrf

        <!-- Service Name -->
        <div class="mb-3">
            <label class="form-label">Service Name</label>
            <input type="text"
                   name="service_name"
                   class="form-control"
                   placeholder="Enter service name">
        </div>

        <!-- Unit Price -->
        <div class="mb-3">
            <label class="form-label">Unit Price</label>
            <input type="number"
                   step="0.01"
                   name="unit_price"
                   class="form-control"
                   placeholder="Enter price">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description"
                      class="form-control"
                      rows="4"
                      placeholder="Enter service description"></textarea>
        </div>

        <!-- BUTTONS -->
        <div class="d-flex justify-content-end gap-2">

            <!-- Back (secondary action) -->
            <a href="{{ route('services.index') }}"
               class="btn btn-sm"
               style="background: var(--secondary); color:#fff; border-radius:10px;">
                Cancel
            </a>

            <!-- Save -->
            <button class="btn btn-accent btn-sm px-3">
                <i class="fas fa-save me-1"></i>
                Save Service
            </button>

        </div>

    </form>

</div>

@endsection