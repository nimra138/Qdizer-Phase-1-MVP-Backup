@extends('user.partials.app')

@section('title', 'Company Profile')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-0">Company Profile</h3>
            <small class="text-muted">
                Your business information used in quotations & invoices
            </small>
        </div>

        <a href="{{ route('company.edit') }}"
           class="btn btn-primary rounded-3">
            Edit Profile
        </a>

    </div>

    <div class="row g-4">

        {{-- LEFT INFO --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <h5 class="mb-4">Business Information</h5>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <small class="text-muted">Company Name</small>
                            <h6>{{ $company->company_name ?? '-' }}</h6>
                        </div>

                        <div class="col-md-6 mb-3">
                            <small class="text-muted">Business Category</small>
                            <h6>{{ $company->business_category ?? '-' }}</h6>
                        </div>

                        <div class="col-md-6 mb-3">
                            <small class="text-muted">Phone Number</small>
                            <h6>{{ $company->phone_number ?? '-' }}</h6>
                        </div>

                        <div class="col-md-6 mb-3">
                            <small class="text-muted">Email</small>
                            <h6>{{ $company->email ?? '-' }}</h6>
                        </div>

                        <div class="col-12 mb-3">
                            <small class="text-muted">Address</small>
                            <h6>{{ $company->address ?? '-' }}</h6>
                        </div>

                    </div>

                </div>

            </div>

            {{-- VAT CARD --}}
            <div class="card border-0 shadow-sm rounded-4 mt-4">

                <div class="card-body p-4">

                    <h5 class="mb-3">Tax Information</h5>

                    <div class="row">

                        <div class="col-md-6 mb-2">
                            <small class="text-muted">VAT Registered</small>
                         <h6>
    {{ optional($company)->vat_registered ? 'Yes' : 'No' }}
</h6>
                        </div>

                        <div class="col-md-6 mb-2">
                            <small class="text-muted">VAT Number</small>
                            <h6>
                                {{ $company->vat_number ?? '-' }}
                            </h6>
                        </div>

                        <div class="col-md-6 mb-2">
                            <small class="text-muted">Country</small>
                            <h6>United Arab Emirates</h6>
                        </div>

                        <div class="col-md-6 mb-2">
                            <small class="text-muted">Currency</small>
                            <h6>AED</h6>
                        </div>

                        <div class="col-md-6 mb-2">
                            <small class="text-muted">VAT Rate</small>
                            <h6>5%</h6>
                        </div>

                    </div>

                </div>

            </div>

            {{-- TERMS --}}
            <div class="card border-0 shadow-sm rounded-4 mt-4">

                <div class="card-body p-4">

                    <h5 class="mb-3">Default Terms & Notes</h5>

                    <p class="text-muted">
                        {{ $company->default_terms ?? 'No terms added' }}
                    </p>

                </div>

            </div>

        </div>

        {{-- RIGHT LOGO CARD --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 text-center">

                <div class="card-body p-4">

                    @if(!empty($company?->logo))
                        <img src="{{ asset('storage/'.$company->logo) }}"
                             class="img-fluid mb-3 rounded"
                             style="max-height:140px;">
                    @else
                        <div class="text-muted mb-3">
                            No Logo Uploaded
                        </div>
                    @endif

                    <hr>

                    <div class="text-muted small">

                        <div>
                            Country: <strong>United Arab Emirates</strong>
                        </div>

                        <div>
                            Currency: <strong>AED</strong>
                        </div>

                        <div>
                            VAT Rate: <strong>5%</strong>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection