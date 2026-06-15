<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Client;
use App\Models\Service;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotation::where('user_id', auth()->id())
            ->with('client')
            ->latest()
            ->paginate(10);

        return view('user.quotations.index', compact('quotations'));
    }

    public function create()
    {
        $clients = Client::where('user_id', auth()->id())->get();
        $services = Service::where('user_id', auth()->id())->get();

        return view('user.quotations.create', compact('clients', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'items' => 'required|array',
            'items.*.service_id' => 'required',
            'items.*.quantity' => 'required|numeric|min:1',
        ]);

        DB::beginTransaction();

        try {
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
                $lineTotal = $unitPrice * $quantity;

                $quotation->items()->create([
                    'service_id' => $service->id,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'total' => $lineTotal,
                ]);

                $subtotal += $lineTotal;
            }

            $company = Company::where('user_id', auth()->id())->first();

            $vat = ($company && $company->vat_registered == 1)
                ? ($subtotal * 0.05)
                : 0;

            $grandTotal = $subtotal + $vat;

            $quotation->update([
                'subtotal' => $subtotal,
                'vat' => $vat,
                'total' => $grandTotal,
            ]);

            DB::commit();

            return redirect()
                ->route('quotations.index')
                ->with('success', 'Quotation created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Quotation $quotation)
    {
        $quotation->load(['client', 'items.service']);

        if ($quotation->user_id !== auth()->id()) {
            abort(403);
        }

        return view('user.quotations.show', compact('quotation'));
    }

    public function edit(string $id)
    {
        $quotation = Quotation::with('items')
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        $clients = Client::where('user_id', auth()->id())->get();
        $services = Service::where('user_id', auth()->id())->get();

        return view('user.quotations.edit', compact('quotation', 'clients', 'services'));
    }

    public function update(Request $request, string $id)
    {
        $quotation = Quotation::where('user_id', auth()->id())
            ->findOrFail($id);

        $quotation->items()->delete();

        $subtotal = 0;

        foreach ($request->items as $item) {
            $service = Service::findOrFail($item['service_id']);
            $lineTotal = $service->unit_price * $item['quantity'];

            $quotation->items()->create([
                'service_id' => $service->id,
                'quantity' => $item['quantity'],
                'unit_price' => $service->unit_price,
                'total' => $lineTotal,
            ]);

            $subtotal += $lineTotal;
        }

        $company = Company::where('user_id', auth()->id())->first();

        $vat = ($company && $company->vat_registered == 1)
            ? ($subtotal * 0.05)
            : 0;

        $grandTotal = $subtotal + $vat;

        $quotation->update([
            'client_id' => $request->client_id,
            'notes' => $request->notes,
            'subtotal' => $subtotal,
            'vat' => $vat,
            'total' => $grandTotal,
        ]);

        return redirect()
            ->route('quotations.index')
            ->with('success', 'Quotation updated successfully');
    }

    public function destroy(string $id)
    {
        $quotation = Quotation::where('user_id', auth()->id())
            ->findOrFail($id);

        $quotation->delete();

        return back()->with('success', 'Quotation deleted successfully');
    }

    private function generateQuotationNumber()
    {
        $userId = auth()->id();

        $last = Quotation::where('user_id', $userId)
            ->orderByDesc('id')
            ->first();

        $nextNumber = 1;

        if ($last) {
            $nextNumber = ((int) str_replace('Q-', '', $last->quotation_number)) + 1;
        }

        $quotationNumber = 'Q-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        while (
            Quotation::where('user_id', $userId)
                ->where('quotation_number', $quotationNumber)
                ->exists()
        ) {
            $nextNumber++;
            $quotationNumber = 'Q-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        }

        return $quotationNumber;
    }

    public function template($id)
    {
        $quotation = Quotation::with([
            'client',
            'items.service',
            'user.company'
        ])
        ->where('user_id', auth()->id())
        ->findOrFail($id);

        return view('user.quotations.template', compact('quotation'));
    }
}