@extends('layouts.app')

@section('title', 'Quotation Expired')

@section('content')
<div class="container py-5">
    <div class="text-center">

        <h2 class="text-danger mb-3">
            This quotation has expired
        </h2>

        <p class="text-muted">
            The public link is no longer available because it has exceeded its validity period.
        </p>

        <p>
            Please contact <strong>{{ $setting->company_name ?? 'our team' }}</strong>
            for a revised quotation.
        </p>

        <a href="{{ route('contact') }}" class="btn btn-primary">
            Contact Us
        </a>

    </div>
</div>
@endsection