@extends('admin.layouts.layout')

@section('title','Service Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h3 class="fw-bold">
            Service Details
        </h3>

        <p class="text-muted">
            View complete service information.
        </p>

    </div>

    <a href="{{ route('admin.services') }}"
       class="btn btn-secondary">

        <i class="fas fa-arrow-left me-2"></i>

        Back

    </a>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <h6>Service Name</h6>

                <p>{{ $service->service_name }}</p>

            </div>

            <div class="col-md-6">

                <h6>Price</h6>

                <p>{{ number_format($service->price,2) }}</p>

            </div>

            <div class="col-md-6">

                <h6>Created By</h6>

                <p>{{ $service->user->name }}</p>

            </div>

            <div class="col-md-6">

                <h6>Owner Email</h6>

                <p>{{ $service->user->email }}</p>

            </div>

            <div class="col-md-6">

                <h6>Created At</h6>

                <p>{{ $service->created_at->format('d M Y h:i A') }}</p>

            </div>

            <div class="col-12 mt-3">

                <h6>Description</h6>

                <div class="border rounded p-3 bg-">

                    {!! nl2br(e($service->description)) !!}

                </div>

            </div>

        </div>

    </div>

</div>

@endsection