@extends('admin.layouts.layout')


@section('title', 'General Settings')



@section('content')


    <div class="container-fluid">


        <div class="d-flex justify-content-between mb-4">


            <div>

                <h3 class="fw-bold">
                    General Settings
                </h3>

                <p class="text-muted">
                    Manage your company information
                </p>

            </div>


        </div>


@if($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif


        @if (session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif





        <div class="card shadow-sm">


            <div class="card-body">


                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">


                    @csrf



                    <div class="row">



                        <!-- Company Name -->

                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                Company Name

                            </label>


                            <input type="text" name="company_name" class="form-control"
                                value="{{ old('company_name', $setting->company_name ?? '') }}">


                        </div>





                        <!-- Email -->

                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                Company Email

                            </label>


                            <input type="email" name="company_email" class="form-control"
                                value="{{ old('company_email', $setting->company_email ?? '') }}">


                        </div>







                        <!-- Phone -->

                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                Company Phone

                            </label>


                            <input type="text" name="company_phone" class="form-control"
                                value="{{ old('company_phone', $setting->company_phone ?? '') }}">


                        </div>






                        <!-- Currency -->


                        <div class="col-md-3 mb-3">


                            <label>

                                Currency

                            </label>


                            <select name="currency" class="form-select">


                                <option value="AED" @if (($setting->currency ?? '') == 'AED') selected @endif>
                                    AED
                                </option>


                                <option value="USD" @if (($setting->currency ?? '') == 'USD') selected @endif>
                                    USD
                                </option>


                                <option value="PKR" @if (($setting->currency ?? '') == 'PKR') selected @endif>
                                    PKR
                                </option>


                                <option value="EUR" @if (($setting->currency ?? '') == 'EUR') selected @endif>
                                    EUR
                                </option>


                            </select>


                        </div>






                        <!-- Currency Symbol -->

                        <div class="col-md-3 mb-3">


                            <label>

                                Currency Symbol

                            </label>


                            <input type="text" name="currency_symbol" class="form-control"
                                value="{{ old('currency_symbol', $setting->currency_symbol ?? '') }}">


                        </div>






                        <!-- Address -->


                        <div class="col-md-12 mb-3">


                            <label>

                                Company Address

                            </label>


                            <textarea name="company_address" class="form-control" rows="3">{{ old('company_address', $setting->company_address ?? '') }}</textarea>


                        </div>







                        <!-- Logo -->


                        <div class="col-md-6 mb-3">


                            <label>

                                Company Logo

                            </label>


                            <input type="file" name="company_logo" class="form-control">



                            @if (isset($setting->company_logo))
                                <img src="{{ asset('storage/' . $setting->company_logo) }}" width="120"
                                    class="mt-3 rounded">
                            @endif


                        </div>



                    </div>





                    <button class="btn btn-primary">

                        Save Settings

                    </button>



                </form>


            </div>


        </div>


    </div>


@endsection
