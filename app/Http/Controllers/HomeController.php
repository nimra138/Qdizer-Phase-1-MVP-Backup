<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
   use App\Models\Client;
use App\Models\Service;
use App\Models\Quotation;

use Illuminate\Support\Facades\Storage;
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
    
    $pdfs = Quotation::where('user_id', auth()->id())
    ->whereNotNull('pdf_path')
    ->get();

foreach ($pdfs as $pdf) {
    $pdf->url = Storage::url($pdf->pdf_path);
    $pdf->size = Storage::disk('public')->exists($pdf->pdf_path)
        ? round(Storage::disk('public')->size($pdf->pdf_path) / 1024, 2)
        : 0;
}
    // $pdfs = Quotation::where('user_id', auth()->id())
    // ->whereNotNull('pdf_path')
    // ->latest()
    // ->get()
    // ->map(function ($quotation) {
    //     return [
    //         'name' => basename($quotation->pdf_path),
    //         'path' => $quotation->pdf_path,
    //         'size' => Storage::disk('public')->exists($quotation->pdf_path)
    //             ? round(Storage::disk('public')->size($quotation->pdf_path) / 1024, 2)
    //             : 0,
    //         'last_modified' => Storage::disk('public')->exists($quotation->pdf_path)
    //             ? date(
    //                 'd M Y h:i A',
    //                 Storage::disk('public')->lastModified($quotation->pdf_path)
    //             )
    //             : '-',
    //         'url' => Storage::url($quotation->pdf_path),
    //         'quotation_number' => $quotation->quotation_number,
    //         'date' => $quotation->date,
    //     ];
    // });

    $recentQuotations = Quotation::where('user_id', $userId)
        ->with('client')
        ->latest()
        ->take(5)
        ->get();
$user = auth()->user();
   $daysLeft = 0;
$hoursLeft = 0;
$expiryDate = null;
if ($user->status === 'active') {

    // Subscription is active
    $expiryDate = $user->trial_ends_at;

} else {

    // User is on free trial
    $expiryDate = $user->trial_end;
}

if ($expiryDate) {

    $expiry = Carbon::parse($expiryDate);

    if ($expiry->isFuture()) {

        $daysLeft = now()->diffInDays($expiry);
        $hoursLeft = now()->copy()->addDays($daysLeft)->diffInHours($expiry);

    }

}



        // $trialEnd = auth()->user()->trial_end;
        // $status = auth()->user()->status;

        // $daysLeft = 0;
        // $hoursLeft = 0;
        // if ($status === "status") {
           
        // }
        // if ($trialEnd) {

        //     $diff = Carbon::now()->diff(Carbon::parse($trialEnd));

        //     $daysLeft = $diff->invert ? 0 : $diff->d;
        //     $hoursLeft = $diff->invert ? 0 : $diff->h;
        // }

    return view('user.dashboard.index', compact(
        'clients',
        'services',
        'quotations',
        'pdfs',
        
        'hoursLeft',
        'daysLeft',
        'recentQuotations',
        
    'expiryDate'
      
    ));

        // return view('user.dashboard.index');
    }
}

