@php
    $user = auth()->user();

    /*
    |--------------------------------------------------------------------------
    | User Subscription State
    |--------------------------------------------------------------------------
    */

    $isTrial = $user->status === 'trial';

    $isActive = $user->status === 'active';

    $isCanceling = $user->status === 'cancelled';

    $isExpired = $user->status === 'expired';

    $isPastDue = $user->status === 'past_due';


    /*
    |--------------------------------------------------------------------------
    | Trial Dates
    |--------------------------------------------------------------------------
    */

    $trialStart = $user->trial_start
        ? \Carbon\Carbon::parse($user->trial_start)
        : null;

    $trialEnd = $user->trial_end
        ? \Carbon\Carbon::parse($user->trial_end)
        : null;

    /*
    |--------------------------------------------------------------------------
    | IMPORTANT:
    | If user is currently on trial, show trial.
    | Do NOT use subscription valid() to determine trial.
    |--------------------------------------------------------------------------
    */

    $trialDaysLeft = 0;

    if ($isTrial && $trialEnd) {
        // $trialDaysLeft = max(
        //     0,
        //     now()->diffInDays($trialEnd, false)
        // );
         $trialDaysLeft = $isTrial
    ? (int) ceil(max(0, now()->diffInDays($trialEnd, false)))
    : null;
    }


    /*
    |--------------------------------------------------------------------------
    | Subscription Dates
    |--------------------------------------------------------------------------
    */

    $subscriptionStart = $user->subscription_start
        ? \Carbon\Carbon::parse($user->subscription_start)
        : null;

    $subscriptionEnd = $user->subscription_end
        ? \Carbon\Carbon::parse($user->subscription_end)
        : null;


    /*
    |--------------------------------------------------------------------------
    | Subscription Days Left
    |--------------------------------------------------------------------------
    */

    $subscriptionDaysLeft = null;

    if ($isActive && $subscriptionEnd) {
        // $subscriptionDaysLeft = max(
        //     0,
        //     now()->diffInDays($subscriptionEnd, false)
        // );
        $subscriptionDaysLeft = $isActive
        ? (int) ceil(max(0, now()->diffInDays($subscriptionEnd, false)))
        : null;
    }


    /*
    |--------------------------------------------------------------------------
    | Trial Progress
    |--------------------------------------------------------------------------
    */

    $trialProgress = 0;

    if ($trialStart && $trialEnd && $trialEnd->greaterThan($trialStart)) {

        $totalTrialSeconds = $trialStart->diffInSeconds($trialEnd);

        $usedTrialSeconds = $trialStart->diffInSeconds(
            min(now(), $trialEnd)
        );

        $trialProgress = min(
            100,
            max(
                0,
                ($usedTrialSeconds / $totalTrialSeconds) * 100
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Subscription Progress
    |--------------------------------------------------------------------------
    */

    $subscriptionProgress = 0;

    if (
        $subscriptionStart &&
        $subscriptionEnd &&
        $subscriptionEnd->greaterThan($subscriptionStart)
    ) {

        $totalSubscriptionSeconds =
            $subscriptionStart->diffInSeconds($subscriptionEnd);

        $usedSubscriptionSeconds =
            $subscriptionStart->diffInSeconds(
                min(now(), $subscriptionEnd)
            );

        $subscriptionProgress = min(
            100,
            max(
                0,
                ($usedSubscriptionSeconds / $totalSubscriptionSeconds) * 100
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Can Create Quotation
    |--------------------------------------------------------------------------
    */

    $canCreateQuotation =
        $isTrial ||
        $isActive;
@endphp
<!-- Mobile Button + Brand Wrapper -->
<div class="d-flex align-items-center justify-content-between d-lg-none px-3 py-2">

    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" id="menuToggle">
        <i class="fas fa-bars"></i>
    </button>


</div>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">

    <!-- Brand -->
    <div>

        {{-- <div class="sidebar-brand mb-4">
            <a href="{{ route('home') }}">
            <img src="{{ $logo }}" style="max-height:60px;">
            </a>
        </div> --}}
        <div class="sidebar-brand mb-4">

    @if($setting?->company_logo)

        <a href="{{ route('home') }}">

            <img src="{{ asset('storage/'.$setting->company_logo) }}"
                 width="80"
                 style="max-height:60px; object-fit:contain;">

        </a>

    @else

        <a href="{{ route('home') }}">
            <h5>{{ $setting->company_name ?? 'QDizer' }}</h5>
        </a>

    @endif

</div>
        <!-- Menu -->
        <ul class="sidebar-menu">

            <!-- Dashboard -->
            <li>
                <a href="{{ route('home') }}"
                   class="menu-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <div class="menu-left">
                        <i class="fas fa-house menu-icon"></i>
                        Dashboard
                    </div>
                </a>
            </li>

            

            <!-- Quotations -->
           <li>
    <button class="dropdown-btn" data-bs-toggle="collapse" data-bs-target="#quotationMenu">
        <div class="menu-left">
            <i class="fas fa-file-invoice menu-icon"></i>
            Quotations
        </div>
        <i class="fas fa-chevron-down"></i>
    </button>

    @php
        $expired = auth()->check() && auth()->user()->status == 'expired';
    @endphp

    <div class="collapse sho" id="quotationMenu">
                <ul class="submenu">

            <li>
                <a href="{{ route('quotation.index') }}">
                    <i class="fas fa-list"></i>
                    All Quotations
                </a>
            </li>

           <li>
    @if($canCreateQuotation)

        <a href="{{ route('quotation.create') }}">
            <i class="fas fa-plus"></i>
            Create Quotation
        </a>

    @else

        <a href="javascript:void(0)"
           class="text-muted"
           onclick="alert('Your trial or subscription has expired. Please subscribe to continue.')">

            <i class="fas fa-plus"></i>
            Create Quotation
            <i class="fas fa-lock ms-1"></i>

        </a>

    @endif
</li>

        </ul>
        
    </div>
</li>

            <!-- Clients -->
            <li>
                <button class="dropdown-btn" data-bs-toggle="collapse" data-bs-target="#clientMenu">
                    <div class="menu-left">
                        <i class="fas fa-users menu-icon"></i>
                        Clients
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </button>

                <div class="collapse" id="clientMenu">
                    <ul class="submenu">
                        <li><a href="{{ route('clients.index') }}"><i class="fas fa-user-group"></i> All Clients</a></li>
                        <li><a href="{{ route('clients.create') }}"><i class="fas fa-user-plus"></i> Add Client</a></li>
                    </ul>
                </div>
            </li>
            <!-- Services -->
            <li>
                <button class="dropdown-btn" data-bs-toggle="collapse" data-bs-target="#servicesMenu">
                    <div class="menu-left">
                        <i class="fas fa-list menu-icon"></i>
                        Services
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </button>

                <div class="collapse" id="servicesMenu">
                    <ul class="submenu">
                        <li><a href="{{ route('services.index') }}"><i class="fas fa-eye"></i> All Services</a></li>
                        <li><a href="{{ route('services.create') }}"><i class="fas fa-plus"></i> Create Service</a></li>
                    </ul>
                </div>
            </li>
            <!-- Settings -->
            <li>
                <button class="dropdown-btn" data-bs-toggle="collapse" data-bs-target="#settingsMenu">
                    <div class="menu-left">
                        <i class="fas fa-gear menu-icon"></i>
                        Company Settings
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </button>

                <div class="collapse" id="settingsMenu">
                    <ul class="submenu">
                        <li><a href="{{ route('company.show') }}"><i class="fas fa-building"></i> Company Profile</a></li>
                        <li><a href="{{ route('company.edit') }}"><i class="fas fa-palette"></i>Company Edit</a></li>
                        {{-- <li><a href="#"><i class="fas fa-envelope"></i> Email Settings</a></li> --}}
                    </ul>
                </div>
            </li>

            <!-- Billing -->
            <li>
                <a href="{{ route('billing') }}" class="menu-link">
                    <div class="menu-left">
                        <i class="fas fa-credit-card menu-icon"></i>
                        Billing / Subscription
                    </div>
                </a>
            </li>

        </ul>
    </div>

    <!-- Footer -->
    <div class="sidebar-footer">

        <div class="plan-box mb-3">

    <small class="text-muted">Current Plan</small>

    <h6 class="mb-2">
        {{ auth()->user()->isActive() ? 'QDizer Pro' : 'Free Trial' }}
    </h6>

    <span class="badge bg-{{ auth()->user()->badgeColor() }}">
        {{ ucfirst(auth()->user()->status) }}
    </span>

    @if(auth()->user()->isTrial())

        <div class="small text-muted mt-2">
            {{ auth()->user()->trialDaysLeft() }} days remaining
        </div>

    @elseif(auth()->user()->isActive())

        <div class="small text-muted mt-2">
            {{ auth()->user()->subscriptionDaysLeft() }} days remaining
        </div>

    @elseif(auth()->user()->isExpired())

        <div class="small text-danger mt-2">
            Subscription expired
        </div>

    @elseif(auth()->user()->isPastDue())

        <div class="small text-warning mt-2">
            Payment pending
        </div>

    @elseif(auth()->user()->isCancelled())

        <div class="small text-secondary mt-2">
            Subscription cancelled
        </div>

    @endif

</div>
</div>

        <!-- User Dropdown -->
        <div class="dropdown">

            <button class="user-dropdown-btn" data-bs-toggle="dropdown">

                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" />

                <div class="user-meta">
                    <h6>{{ $user->name }}</h6>
                    <small>{{ $user->email }}</small>
                </div>

                <i class="fas fa-chevron-down"></i>

            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow border-0">

                <li class="dropdown-header">
                    <strong>{{ $user->name }}</strong><br>
                    <small>{{ $user->email }}</small>
                </li>

                <li><hr></li>

                <li>
                    <a class="dropdown-item" href="{{ route('company.show') }}">
                        <i class="fas fa-user me-2"></i> Profile
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('company.edit') }}">
                        <i class="fas fa-gear me-2"></i> Settings
                    </a>
                </li>

                <li><hr></li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger">
                            <i class="fas fa-right-from-bracket me-2"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>

        </div>

    </div>
</aside>
<script>

const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');

menuToggle.addEventListener('click', function () {
    sidebar.classList.toggle('show');
    overlay.classList.toggle('show');
});

overlay.addEventListener('click', function () {
    sidebar.classList.remove('show');
    overlay.classList.remove('show');
});

</script>