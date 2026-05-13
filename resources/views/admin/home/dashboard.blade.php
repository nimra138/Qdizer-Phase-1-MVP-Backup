@extends('admin.layouts.layout')

@section('title','Dashboard')

@section('content')

<div class="row g-4">

    <div class="row mb-4">

    <div class="col-md-4">
        <div class="card p-3 shadow-sm">
            <h6>Total Users</h6>
            <h3>{{ \App\Models\User::count() }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow-sm">
            <h6>New Today</h6>
            <h3>{{ \App\Models\User::whereDate('created_at', today())->count() }}</h3>
        </div>
    </div>

</div>

</div>

@endsection