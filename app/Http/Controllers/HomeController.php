<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use App\Models\Quotation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Dashboard
     */
    public function index()
    {
        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | Dashboard Statistics
        |--------------------------------------------------------------------------
        */

        $clients = Client::where('user_id', $user->id)->count();

        $services = Service::where('user_id', $user->id)->count();

        $quotations = Quotation::where('user_id', $user->id)->count();

        /*
        |--------------------------------------------------------------------------
        | PDF Files
        |--------------------------------------------------------------------------
        */

        $pdfs = Quotation::where('user_id', $user->id)
            ->whereNotNull('pdf_path')
            ->latest()
            ->get();

        foreach ($pdfs as $pdf) {

            $pdf->url = Storage::url($pdf->pdf_path);

            $pdf->size = Storage::disk('public')->exists($pdf->pdf_path)
                ? round(Storage::disk('public')->size($pdf->pdf_path) / 1024, 2)
                : 0;
        }

        /*
        |--------------------------------------------------------------------------
        | Recent Quotations
        |--------------------------------------------------------------------------
        */

        $recentQuotations = Quotation::where('user_id', $user->id)
            ->with('client')
            ->latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Subscription / Trial
        |--------------------------------------------------------------------------
        */

        $subscription = $user->subscription('default');

        $expiryDate = null;
        $daysLeft = 0;
        $hoursLeft = 0;
        $subscriptionStatus = 'Trial';

        if ($subscription) {

            if ($subscription->valid()) {

                $subscriptionStatus = 'Active';

                // Active subscription period from Stripe
                if ($subscription->ends_at) {

                    $expiryDate = $subscription->ends_at;

                } elseif ($subscription->trial_ends_at) {

                    $expiryDate = $subscription->trial_ends_at;

                } else {

                    $expiryDate = null;
                }

            }

            if ($subscription->onGracePeriod()) {

                $subscriptionStatus = 'Cancelling';

                $expiryDate = $subscription->ends_at;
            }

            if ($subscription->onTrial()) {

                $subscriptionStatus = 'Trial';

                $expiryDate = $subscription->trial_ends_at;
            }

        } else {

            // Free trial stored in users table
            $expiryDate = $user->trial_end;
        }

        if ($expiryDate && Carbon::parse($expiryDate)->isFuture()) {

            $daysLeft = now()->diffInDays($expiryDate);

            $hoursLeft = now()->diffInHours($expiryDate) % 24;
        }
        

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        return view('user.dashboard.index', compact(
            'clients',
            'services',
            'quotations',
            'pdfs',
            'recentQuotations',
            'subscription',
            'subscriptionStatus',
            'expiryDate',
            'daysLeft',
            'hoursLeft'
        ));
    }
}