<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\Client;

use App\Models\Company;
use App\Models\Service;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $quotations = Quotation::where('user_id', auth()->id())
        ->with('client')
        ->latest()
        ->paginate(10);

    return view('user.quotations.index', compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $clients = Client::where('user_id', auth()->id())->get();
    $services = Service::where('user_id', auth()->id())->get();

    return view('user.quotations.create', compact('clients', 'services'));
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'client_id' => 'required',
        'items' => 'required|array',
        'items.*.service_id' => 'required',
        'items.*.quantity' => 'required|numeric|min:1',
    ]);

    $quotation = Quotation::create([
        'user_id' => auth()->id(),
        'client_id' => $request->client_id,
        'quotation_number' => $this->generateQuotationNumber(),
        'date' => now(),
        'subtotal' => 0,
        'vat' => 0,
        'total' => 0,
        'notes' => $request->notes,
    ]);

    $subtotal = 0;

    foreach ($request->items as $item) {

        $service = Service::findOrFail($item['service_id']);

        $unitPrice = $service->unit_price;
        $quantity = $item['quantity'];

        $total = $unitPrice * $quantity;

        $quotation->items()->create([
            'service_id' => $service->id,
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'total' => $total,
        ]);

        $subtotal += $total;
    }

   $company = auth()->user()->company;

    if ($company->vat_registered) {
        $vatRate = $company->vat_rate; // 5%
    } else {
        $vatRate = 0;
    }

$vat = $subtotal * ($vatRate / 100);

    $quotation->update([
        'subtotal' => $subtotal,
        'vat' => $vat,
        'total' => $total,
    ]);

    return redirect()
        ->route('quotations.index')
        ->with('success', 'Quotation created successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $quotation = Quotation::with(['client', 'items.service'])
        ->where('user_id', auth()->id())
        ->findOrFail($id);

    return view('user.quotations.show', compact('quotation'));
}

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    $quotation = Quotation::with('items')
        ->where('user_id', auth()->id())
        ->findOrFail($id);

    $clients = Client::where('user_id', auth()->id())->get();
    $services = Service::where('user_id', auth()->id())->get();

    return view('user.quotations.edit', compact('quotation', 'clients', 'services'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $quotation = Quotation::where('user_id', auth()->id())
        ->findOrFail($id);

    $quotation->items()->delete();

    $subtotal = 0;

    foreach ($request->items as $item) {

        $service = Service::findOrFail($item['service_id']);

        $total = $service->unit_price * $item['quantity'];

        $quotation->items()->create([
            'service_id' => $service->id,
            'quantity' => $item['quantity'],
            'unit_price' => $service->unit_price,
            'total' => $total,
        ]);

        $subtotal += $total;
    }

    $company = auth()->user()->company;

    if ($company->vat_registered) {
        $vatRate = $company->vat_rate; // 5%
    } else {
        $vatRate = 0;
    }

$vat = $subtotal * ($vatRate / 100);

    $quotation->update([
        'client_id' => $request->client_id,
        'notes' => $request->notes,
        'subtotal' => $subtotal,
        'vat' => $vat,
        'total' => $total,
    ]);

    return redirect()
        ->route('quotations.index')
        ->with('success', 'Quotation updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $quotation = Quotation::where('user_id', auth()->id())
        ->findOrFail($id);

    $quotation->delete();

    return back()->with('success', 'Quotation deleted successfully');
}
    private function generateQuotationNumber()
{
    $last = Quotation::where('user_id', auth()->id())
        ->latest('id')
        ->first();

    if (!$last) {
        return 'Q-0001';
    }

    $number = (int) str_replace('Q-', '', $last->quotation_number);
    $number++;

    return 'Q-' . str_pad($number, 4, '0', STR_PAD_LEFT);
}
public function template($id)
{
    $quotation = Quotation::with([
        'client',
        'items.service',
        'user.companyProfile'
    ])
    ->where('user_id', auth()->id())
    ->findOrFail($id);

    return view(
        'user.quotations.template',
        compact('quotation')
    );
}
}
