@extends('admin.layouts.layout')

@section('title','Dashboard')

@section('content')

<div class="ab-page">

    {{-- Top stat row --}}
    <div class="row g-3">
        <div class="col-md-3">
            <div class="ab-stat-card">
                <div class="ab-stat-icon ab-icon-charcoal">👥</div>
                <div>
                    <div class="ab-stat-label">Total Users</div>
                    <h2 class="ab-stat-value">{{ $totalUsers }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="ab-stat-card">
                <div class="ab-stat-icon ab-icon-amber">✨</div>
                <div>
                    <div class="ab-stat-label">New Today</div>
                    <h2 class="ab-stat-value">{{ $newUsersToday }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="ab-stat-card">
                <div class="ab-stat-icon ab-icon-blue">🏢</div>
                <div>
                    <div class="ab-stat-label">Total Clients</div>
                    <h2 class="ab-stat-value">{{ $totalClients }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="ab-stat-card">
                <div class="ab-stat-icon ab-icon-green">📄</div>
                <div>
                    <div class="ab-stat-label">Quotations</div>
                    <h2 class="ab-stat-value">{{ $totalQuotations }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Subscription status row --}}
    <div class="row g-3 mt-1">
        <div class="col-md-4">
            <div class="ab-stat-card">
                <div class="ab-stat-icon ab-icon-green">✅</div>
                <div>
                    <div class="ab-stat-label">Active Users</div>
                    <h2 class="ab-stat-value">{{ $activeUsers }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="ab-stat-card">
                <div class="ab-stat-icon ab-icon-blue">⏳</div>
                <div>
                    <div class="ab-stat-label">Trial Users</div>
                    <h2 class="ab-stat-value">{{ $trialUsers }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="ab-stat-card">
                <div class="ab-stat-icon ab-icon-red">⚠️</div>
                <div>
                    <div class="ab-stat-label">Expired Users</div>
                    <h2 class="ab-stat-value">{{ $expiredUsers }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Charts row --}}
    <div class="row g-3 mt-1">
        <div class="col-lg-7">
            <div class="ab-card">
                <div class="ab-card-header">
                    <h5>Monthly User Registrations</h5>
                </div>
                <div class="ab-card-body">
                    <canvas id="userChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="ab-card">
                <div class="ab-card-header">
                    <h5>Subscription Status</h5>
                </div>
                <div class="ab-card-body">
                    <canvas id="subscriptionChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Expiring subscriptions --}}
    <div class="ab-card mt-3">
        <div class="ab-card-header">
            <h5>⚠️ Expiring in Next 7 Days</h5>
        </div>

        <div class="table-responsive">
            <table class="table ab-table mb-0">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Status</th>
                        <th>Expiry Date</th>
                        <th>Days Left</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($expiringSubscriptions as $user)
                        @php
                            $expiry = $user->status === 'active'
                                ? $user->trial_ends_at
                                : $user->trial_end;

                            $daysLeft = now()->diffInDays(\Carbon\Carbon::parse($expiry));
                        @endphp

                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                                <span class="ab-badge ab-badge-blue">
                                    {{ ucfirst($user->status) }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($expiry)->format('d M Y') }}</td>
                            <td>
                                <span class="ab-badge ab-badge-amber">
                                    {{ $daysLeft }} Days
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                No subscriptions expiring in the next 7 days.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Latest users --}}
    <div class="ab-card mt-3">
        <div class="ab-card-header">
            <h5>Latest Users</h5>
        </div>

        <div class="table-responsive">
            <table class="table ab-table mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($latestUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Top active users --}}
    <div class="ab-card mt-3">
        <div class="ab-card-header">
            <h5>🔥 Top 5 Active Users</h5>
        </div>

        <div class="table-responsive">
            <table class="table ab-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Company</th>
                        <th>Quotations</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($topUsers as $index => $user)
                        <tr>
                            <td><span class="ab-rank">{{ $index + 1 }}</span></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->company ?? '-' }}</td>
                            <td>
                                <span class="ab-badge ab-badge-green">
                                    {{ $user->quotations_count }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
const ctx = document.getElementById('userChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json($months),
        datasets: [{
            label: 'New Users',
            data: @json($counts),
            borderWidth: 3,
            borderColor: '#f5a524',
            backgroundColor: 'rgba(245,165,36,0.12)',
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#1f2229',
            pointRadius: 4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: { precision: 0 },
                grid: { color: '#f0f0f2' }
            },
            x: {
                grid: { display: false }
            }
        }
    }
});
</script>

<script>
const subscriptionCtx = document.getElementById('subscriptionChart');

new Chart(subscriptionCtx, {
    type: 'doughnut',
    data: {
        labels: ['Active', 'Trial', 'Expired'],
        datasets: [{
            data: [
                {{ $activeUsers }},
                {{ $trialUsers }},
                {{ $expiredUsers }}
            ],
            backgroundColor: [
                '#16a34a',
                '#2563eb',
                '#dc2626'
            ],
            borderWidth: 0,
            hoverOffset: 6
        }]
    },
    options: {
        responsive: true,
        cutout: '65%',
        plugins: {
            legend: { position: 'bottom' }
        }
    }
});
</script>
@endsection