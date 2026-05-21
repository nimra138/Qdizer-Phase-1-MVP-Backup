<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
   use App\Models\Client;
use App\Models\Service;
use App\Models\Quotation;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $userId = auth()->id();

    $clients = Client::where('user_id', $userId)->count();

    $services = Service::where('user_id', $userId)->count();

    $quotations = Quotation::where('user_id', $userId)->count();

    // $revenue = Quotation::where('user_id', $userId)
    //     ->where('status', 'final')
    //     ->sum('total');

    $recentQuotations = Quotation::where('user_id', $userId)
        ->with('client')
        ->latest()
        ->take(5)
        ->get();

    // Trial Days
    // $trialEnd = auth()->user()->trial_end;

    // $trialDays = $trialEnd
    //     ? max(
    //         Carbon::now()->diffInDays(
    //             Carbon::parse($trialEnd),
    //             false
    //         ),
    //         0
    //     )
    //     : 0;
        $trialEnd = auth()->user()->trial_end;

        $daysLeft = 0;
        $hoursLeft = 0;

        if ($trialEnd) {

            $diff = Carbon::now()->diff(Carbon::parse($trialEnd));

            $daysLeft = $diff->invert ? 0 : $diff->d;
            $hoursLeft = $diff->invert ? 0 : $diff->h;
        }

    return view('user.dashboard.index', compact(
        'clients',
        'services',
        'quotations',
        // 'revenue',
        'hoursLeft',
        'daysLeft',
        'recentQuotations',
        // 'trialDays'
    ));

        // return view('user.dashboard.index');
    }
}

