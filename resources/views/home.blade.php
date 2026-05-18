@extends('user.partials.app')

@section('title', 'Dashboard')

@section('content')

<div class="mb-4">
    <h2>Dashboard</h2>
    <p class="text-muted">
        Welcome back 👋
    </p>
</div>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card p-4 border-0 shadow-sm rounded-4">
            <h5>Total Quotations</h5>
            <h2>120</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-4 border-0 shadow-sm rounded-4">
            <h5>Total Clients</h5>
            <h2>45</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-4 border-0 shadow-sm rounded-4">
            <h5>Revenue</h5>
            <h2>$3,200</h2>
        </div>
    </div>

</div>

@endsection
