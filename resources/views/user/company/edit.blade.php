@extends('user.partials.app')

@section('title', 'Company Profile')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h3 class="mb-0">Company Profile</h3>
        <small class="text-muted">
            Configure your company information for quotations & PDF documents
        </small>
    </div>

    <form method="POST"
          action="{{ route('company.update') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="row g-4">

            {{-- LEFT --}}
            <div class="col-lg-8">

                <div class="card shadow-sm border-0 rounded-4">

                    <div class="card-body p-4">

                        {{-- COMPANY NAME --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Company Name *
                            </label>

                            <input type="text"
                                   name="company_name"
                                   value="{{ old('company_name', $company->company_name ?? $user->company ?? '') }}"
                                   class="form-control @error('company_name') is-invalid @enderror">

                            @error('company_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- CATEGORY --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Business Category *
                            </label>

                            <select name="business_category"
                                    class="form-control @error('business_category') is-invalid @enderror">

                                <option value="">
                                    Select Category
                                </option>

                                @php
                                $cats = [
                                    'Air Conditioning / HVAC',
                                    'Plumbing',
                                    'Cleaning Services',
                                    'Electrical Services',
                                    'General Maintenance',
                                    'Other'
                                ];
                                @endphp

                                @foreach($cats as $cat)
                                    <option value="{{ $cat }}"
                                        {{ old('business_category', $company->business_category ?? '') == $cat ? 'selected' : '' }}>
                                        {{ $cat }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        {{-- CONTACT --}}
                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Phone Number *
                                </label>

                                <input type="text"
                                       name="phone_number"
                                       value="{{ old('phone_number', $company->phone_number ?? $user->phone ?? '') }}"
                                       class="form-control">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email"
                                       name="email"
                                       value="{{ old('email', $company->email ?? $user->email ?? '') }}"
                                       class="form-control">

                            </div>

                        </div>

                        {{-- ADDRESS --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Address
                            </label>

                            <textarea name="address"
                                      class="form-control"
                                      rows="3">{{ old('address', $company->address ?? '') }}</textarea>

                        </div>

                        {{-- VAT --}}
                        <div class="form-check form-switch mb-3">

                            <input type="checkbox"
                                   id="vatToggle"
                                   class="form-check-input"
                                   name="vat_registered"
                                   value="1"
                                   {{ old('vat_registered', $company->vat_registered ?? false) ? 'checked' : '' }}>

                            <label class="form-check-label">
                                VAT Registered
                            </label>

                        </div>

                        {{-- VAT NUMBER --}}
                        <div class="mb-3"
                             id="vatNumberBox">

                            <label class="form-label">
                                VAT Number
                            </label>

                            <input type="text"
                                   name="vat_number"
                                   value="{{ old('vat_number', $company->vat_number ?? '') }}"
                                   class="form-control">

                        </div>

                        {{-- TERMS --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Default Quotation Notes / Terms
                            </label>

                            <textarea name="default_terms"
                                      class="form-control"
                                      rows="4">{{ old('default_terms', $company->default_terms ?? '') }}</textarea>

                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-lg-4">

                <div class="card shadow-sm border-0 rounded-4">

                    <div class="card-body text-center p-4">

                        {{-- LOGO --}}
                        @if(!empty($company?->logo))
                            <img src="{{ asset('storage/'.$company->logo) }}"
                                 class="img-fluid rounded mb-3"
                                 style="max-height:120px;">
                        @endif

                        <label class="form-label">
                            Company Logo
                        </label>

                        <input type="file"
                               name="logo"
                               class="form-control">

                        <hr>

                        {{-- UAE INFO --}}
                        <div class="text-muted small">

                            <div>
                                Country:
                                <strong>United Arab Emirates</strong>
                            </div>

                            <div>
                                Currency:
                                <strong>AED</strong>
                            </div>

                            <div>
                                VAT Rate:
                                <strong>5%</strong>
                            </div>

                        </div>

                        <button class="btn btn-primary w-100 mt-4 rounded-3">
                            Save Company Profile
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

{{-- VAT TOGGLE --}}
<script>
function toggleVat() {

    let checked =
        document.getElementById('vatToggle').checked;

    document.getElementById('vatNumberBox')
        .style.display = checked
            ? 'block'
            : 'none';
}

toggleVat();

document
    .getElementById('vatToggle')
    .addEventListener('change', toggleVat);
</script>

@endsection