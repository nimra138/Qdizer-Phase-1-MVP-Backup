<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Client;
use App\Models\Service;
use App\Models\Company;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $quotations = Quotation::where('user_id', auth()->id())
        ->with('client')
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('quotation_number', 'like', "%{$search}%")
                  ->orWhereHas('client', function ($clientQuery) use ($search) {
                      $clientQuery->where('client_name', 'like', "%{$search}%");
                  });
            });
        })
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
    // $quotation->template = $request->template;
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
                'template' => $request->template,
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

    public function show($quotation)
{
    $quotation = Quotation::with(['client', 'items.service'])
        ->where('quotation_number', $quotation)
        ->where('user_id', Auth::id())
        ->firstOrFail();

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
            'template' => $request->template,
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
//     public function download(Quotation $quotation)
// {
//     $quotation->load(['client', 'items']);

//     $fileName = 'quotations/' . $quotation->quotation_number . '.pdf';

//     // If PDF already exists, download it
//     if (
//         $quotation->pdf_path &&
//         Storage::disk('public')->exists($quotation->pdf_path)
//     ) {
//         return response()->download(
//             storage_path('app/public/' . $quotation->pdf_path)
//         );
//     }

//     // Select PDF template
//     $view = match ($quotation->template) {
//         'minimal' => 'user.quotations.pdf.default',
//         'contractor' => 'user.quotations.pdf.contractor',
//         default => 'user.quotations.pdf.corporate',
//     };

//     // Generate PDF
//     $pdf = Pdf::loadView($view, compact('quotation'));

//     // Save PDF
//     Storage::disk('public')->put($fileName, $pdf->output());

//     // Update database
//     $quotation->update([
//         'pdf_path' => $fileName,
//         'pdf_generated_at' => now(),
//     ]);

//     // Download newly generated PDF
//     return response()->download(
//         storage_path('app/public/' . $fileName)
//     );
// }
// public function download(Quotation $quotation)
// {
//     dd($quotation);
//     die;

//   dd($quotation->load([
//     'client',
//     'items.service',
//     'user.companyProfile'
// ])->toArray());

//     $fileName = 'quotations/' . $quotation->quotation_number . '.pdf';

//     $view = match ($quotation->template) {
//         'minimal'    => 'user.quotations.pdf.default',
//         'contractor' => 'user.quotations.pdf.contractor',
//         default      => 'user.quotations.pdf.corporate',
//     };

//     $pdf = Pdf::loadView($view, compact('quotation'));

//     Storage::disk('public')->put($fileName, $pdf->output());

//     $quotation->update([
//         'pdf_path' => $fileName,
//         'pdf_generated_at' => now(),
//     ]);

//     return response()->download(
//         storage_path('app/public/' . $fileName)
//     );
// }
public function download($quotation)
{
    $quotation = Quotation::with([
        'client',
        'items.service',
        'user.companyProfile'
    ])
    ->where('quotation_number', $quotation)
    ->where('user_id', auth()->id())
    ->firstOrFail();

    // Delete old PDF if it exists
    if (
        !empty($quotation->pdf_path) &&
        Storage::disk('public')->exists($quotation->pdf_path)
    ) {
        Storage::disk('public')->delete($quotation->pdf_path);
    }

    // PDF filename
    $fileName = 'quotations/' . $quotation->quotation_number . '.pdf';

    // Select template
    $view = match ($quotation->template) {
        'minimal'    => 'user.quotations.pdf.default',
        'contractor' => 'user.quotations.pdf.contractor',
        default      => 'user.quotations.pdf.corporate',
    };

    // Generate PDF
    $pdf = Pdf::loadView($view, compact('quotation'));

    // Save new PDF
    Storage::disk('public')->put($fileName, $pdf->output());

    // Update database
    $quotation->update([
        'pdf_path' => $fileName,
        'pdf_generated_at' => now(),
    ]);

    // Make sure file exists
    if (!Storage::disk('public')->exists($fileName)) {
        return back()->with('error', 'PDF could not be generated.');
    }

    // Download the newly generated PDF
    return response()->download(
        Storage::disk('public')->path($fileName),
        $quotation->quotation_number . '.pdf'
    );
}

public function publicView($quotation_number)
{
    $quotation = Quotation::with([
        'client',
        'items.service',
        'user.companyProfile'
    ])
    ->where('quotation_number', $quotation_number)
    ->firstOrFail();

    return view('user.home.quotation', compact('quotation'));
}
// public function pdfFiles()
// {
//     $files = Storage::disk('public')->files('quotations');

//     $pdfs = [];

//     foreach ($files as $file) {
//         $pdfs[] = [
//             'name' => basename($file),
//             'path' => $file,
//             'size' => round(Storage::disk('public')->size($file) / 1024, 2), // KB
//             'last_modified' => date(
//                 'd M Y h:i A',
//                 Storage::disk('public')->lastModified($file)
//             ),
//             'url' => Storage::url($file),
//         ];
//     }

//     return view('user.quotations.pdfFiles', compact('pdfs'));
// }
}