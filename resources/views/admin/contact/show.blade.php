@extends('admin.layouts.layout')

@section('title','Contact Message')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                Contact Message
            </h4>

            <a href="{{ route('admin.contact.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

        <div class="card-body">

            <div class="row mb-3">

                <div class="col-md-6">

                    <strong>Name</strong>

                    <p>{{ $contactMessage->name }}</p>

                </div>

                <div class="col-md-6">

                    <strong>Email</strong>

                    <p>{{ $contactMessage->email }}</p>

                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-6">

                    <strong>Phone</strong>

                    <p>{{ $contactMessage->phone }}</p>

                </div>

                <div class="col-md-6">

                    <strong>Subject</strong>

                    <p>{{ $contactMessage->subject }}</p>

                </div>

            </div>

            <div class="mb-4">

                <strong>Message</strong>

                <div class="border rounded p-3 bg-light">

                    {!! nl2br(e($contactMessage->message)) !!}

                </div>

            </div>

            <div class="mb-4">

                <strong>Received At</strong>

                <p>{{ $contactMessage->created_at->format('d M Y h:i A') }}</p>

            </div>

            <hr>

            <form method="POST"
                  action="{{ route('admin.contact.update',$contactMessage) }}">

                @csrf
                @method('PUT')

                <div class="form-check form-switch mb-3">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="is_read"
                        value="1"
                        {{ $contactMessage->is_read ? 'checked' : '' }}>

                    <label class="form-check-label">

                        Mark as Read

                    </label>

                </div>

                <button class="btn btn-success">

                    Update Status

                </button>

            </form>

        </div>

    </div>

</div>

@endsection