@extends('admin.layouts.layout')


@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="row">

    <!-- Card 1 -->
    <div class="col-xl-3 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                <h5 class="font-weight-bolder">$53,000</h5>
                <span class="text-success text-sm">+55%</span>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="col-xl-3 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Users</p>
                <h5 class="font-weight-bolder">2,300</h5>
                <span class="text-success text-sm">+3%</span>
            </div>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="col-xl-3 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                <h5 class="font-weight-bolder">+3,462</h5>
                <span class="text-danger text-sm">-2%</span>
            </div>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="col-xl-3 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                <h5 class="font-weight-bolder">$103,430</h5>
                <span class="text-success text-sm">+5%</span>
            </div>
        </div>
    </div>

</div>

<!-- Charts + Carousel -->
<div class="row mt-4">

    <!-- Chart -->
    <div class="col-lg-7 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Sales Overview</h6>
            </div>
            <div class="card-body">
                <canvas id="chart-line" height="300"></canvas>
            </div>
        </div>
    </div>

    <!-- Carousel -->
    <div class="col-lg-5">
        <div class="card overflow-hidden h-100">
            <div id="carouselExample" class="carousel slide h-100" data-bs-ride="carousel">

                <div class="carousel-inner h-100">

                    <div class="carousel-item active">
                        <img src="{{ asset('assets/img/carousel-1.jpg') }}" class="d-block w-100">
                    </div>

                    <div class="carousel-item">
                        <img src="{{ asset('assets/img/carousel-2.jpg') }}" class="d-block w-100">
                    </div>

                    <div class="carousel-item">
                        <img src="{{ asset('assets/img/carousel-3.jpg') }}" class="d-block w-100">
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<!-- Table + Categories -->
<div class="row mt-4">

    <!-- Table -->
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <h6>Sales by Country</h6>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>USA</td>
                            <td>2500</td>
                            <td>$230,900</td>
                        </tr>
                        <tr>
                            <td>Germany</td>
                            <td>3900</td>
                            <td>$440,000</td>
                        </tr>
                        <tr>
                            <td>UK</td>
                            <td>1400</td>
                            <td>$190,700</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Categories -->
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h6>Categories</h6>
            </div>

            <div class="card-body">
                <ul class="list-group">

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Devices</span>
                        <span>346 sold</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tickets</span>
                        <span>15 open</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Error Logs</span>
                        <span>40 closed</span>
                    </li>

                </ul>
            </div>

        </div>
    </div>

</div>

@endsection


@push('scripts')
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

<script>
    const ctx = document.getElementById('chart-line').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug"],
            datasets: [{
                label: "Sales",
                data: [50, 100, 150, 200, 250],
                borderColor: "#5e72e4",
                backgroundColor: "rgba(94,114,228,0.2)",
                fill: true,
                tension: 0.4
            }]
        }
    });
</script>
@endpush