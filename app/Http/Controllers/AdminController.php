<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use App\Models\Quotation;
use App\Models\Setting;
use App\Models\SubscriptionTransaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function dashboard()
{
    $totalUsers = User::count();
    $newUsersToday = User::whereDate('created_at', today())->count();

    $totalClients = Client::count();
    $totalServices = Service::count();
    $totalQuotations = Quotation::count();

    $activeUsers = User::where('status', 'active')->count();
    $trialUsers = User::where('status', 'trial')->count();
    $expiredUsers = User::where('status', 'expired')->count();

    $latestUsers = User::latest()->take(5)->get();

    $monthlyUsers = User::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $months = [];
    $counts = [];

    for ($i = 1; $i <= 12; $i++) {
        $months[] = date('M', mktime(0, 0, 0, $i, 1));

        $record = $monthlyUsers->firstWhere('month', $i);
        $counts[] = $record ? $record->total : 0;
    }
    // expiry
   $expiringSubscriptions = User::get()->filter(function ($user) {

    $expiryDate = null;

    if ($user->status === 'active') {
        $expiryDate = $user->trial_ends_at; // Subscription expiry
    } else {
        $expiryDate = $user->trial_end; // Trial expiry
    }

    if (!$expiryDate) {
        return false;
    }

    $expiry = Carbon::parse($expiryDate);

    return $expiry->isFuture() && now()->diffInDays($expiry) <= 7;
});
    $topUsers = User::withCount('quotations')
    ->orderByDesc('quotations_count')
    ->take(5)
    ->get();
    return view('admin.home.dashboard', compact(
        'totalUsers',
        'newUsersToday',
        'totalClients',
        'totalServices',
        'totalQuotations',
        'activeUsers',
        'trialUsers',
        'expiredUsers',
        'latestUsers',
        'months',
        'counts',
        'expiringSubscriptions',
        'topUsers',
    ));
}

   public function user(Request $request)
{
    $query = User::query();

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('company', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%");
        });
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('verified')) {
        if ($request->verified == 'yes') {
            $query->whereNotNull('email_verified_at');
        } else {
            $query->whereNull('email_verified_at');
        }
    }

    if ($request->filled('from')) {
        $query->whereDate('created_at', '>=', $request->from);
    }

    if ($request->filled('to')) {
        $query->whereDate('created_at', '<=', $request->to);
    }

    $users = $query->latest()->paginate(10)->withQueryString();

    return view('admin.user.index', compact('users'));
}

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
    }

    // client
    public function clients(Request $request)
    {
        $query = Client::with('user');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('company', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $clients = $query->latest()->paginate(10);

        return view('admin.client.index', compact('clients'));
    }
    public function showClient($id)
    {
        $client = Client::with([
            'user',
            'quotations'
        ])->findOrFail($id);

        return view('admin.client.show', compact('client'));
    }



    // servise 
    public function services(Request $request)
    {
        $query = Service::with('user');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $services = $query->latest()->paginate(10);

        return view('admin.service.index', compact('services'));
    }
    public function showService($id)
    {
        $service = Service::with('user')->findOrFail($id);

        return view('admin.service.show', compact('service'));
    }
    //  quotations
    public function quotations(Request $request)
{
    $query = Quotation::with(['user', 'client']);

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('quotation_number', 'like', "%{$search}%")
              ->orWhereHas('client', function ($client) use ($search) {

                  $client->where('client_name', 'like', "%{$search}%");
                  
              })
              ->orWhereHas('user', function ($user) use ($search) {
                  $user->where('name', 'like', "%{$search}%");
              });
        });
    }

    $quotations = $query->latest()->paginate(10);

    return view('admin.quotations.index', compact('quotations'));
}
public function showQuotation($id)
{
    $quotation = Quotation::with([
        'user',
        'client',
        'items'
    ])->findOrFail($id);

    return view('admin.quotations.show', compact('quotation'));
}



public function subscriptions()
{

$total = SubscriptionTransaction::count();


$active = SubscriptionTransaction::where(
'stripe_status',
'active'
)->count();


$trial = SubscriptionTransaction::whereNotNull(
'trial_ends_at'
)
->where(
'stripe_status',
'trialing'
)
->count();



$cancelled = SubscriptionTransaction::where(
'stripe_status',
'canceled'
)->count();



$subscriptions = SubscriptionTransaction::with('owner')
->latest()
->paginate(20);



return view(
'admin.subscriptions.index',
compact(
'total',
'active',
'trial',
'cancelled',
'subscriptions'
));

}



public function subscriptionsshow($id)
{


$subscription = SubscriptionTransaction::with([
'owner',
'items'
])
->findOrFail($id);



return view(
'admin.subscriptions.show',
compact('subscription')
);
}

 public function settings()
    {

        $setting = Setting::first();

        return view(
            'admin.settings.index',
            compact('setting')
        );

    }



    public function updateSettings(Request $request)
    {


        $request->validate([

            'company_name' => 'required|string|max:255',

            'company_email' => 'nullable|email',

            'company_phone' => 'nullable|string',

            'company_address' => 'nullable|string',

            'currency' => 'required|string|max:10',

            'currency_symbol' => 'required|string|max:5',

            'company_logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'

        ]);



        $setting = Setting::first();


        if(!$setting){

            $setting = new Setting();

        }



        $setting->company_name = $request->company_name;

        $setting->company_email = $request->company_email;

        $setting->company_phone = $request->company_phone;

        $setting->company_address = $request->company_address;

        $setting->currency = $request->currency;

        $setting->currency_symbol = $request->currency_symbol;



        // Upload Logo

        if($request->hasFile('company_logo')){


            if($setting->company_logo){

                Storage::disk('public')
                ->delete($setting->company_logo);

            }



            $path = $request->file('company_logo')
                ->store('settings','public');


            $setting->company_logo = $path;


        }



        $setting->save();



        return back()->with(
            'success',
            'Settings updated successfully'
        );


    }

}