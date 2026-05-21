<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display listing
     */
    public function index(Request $request)
    {
        $clients = Client::where('user_id', auth()->id())
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($query) use ($request) {
                    $query->where('client_name', 'like', "%{$request->search}%")
                          ->orWhere('phone_number', 'like', "%{$request->search}%")
                          ->orWhere('email', 'like', "%{$request->search}%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('user.clients.index', compact('clients'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('user.clients.create');
    }

    /**
     * Store new client
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'phone_number' => 'required|regex:/^\+[1-9]\d{7,14}$/',
            'email' => 'nullable|email',
            'address' => 'nullable',
            'notes' => 'nullable',
        ]);

        auth()->user()->clients()->create([
            'client_name' => $request->client_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client created successfully');
    }

    /**
     * Show client profile (IMPORTANT for quotation history)
     */
    public function show(string $id)
{
    // $client = Client::where('user_id', auth()->id())
    //     ->findOrFail($id);

    $client = Client::with('quotations')
        ->where('user_id', auth()->id())
        ->findOrFail($id);

    return view('user.clients.show', compact('client'));
}
    /**
     * Edit form
     */
    public function edit(string $id)
    {
        $client = Client::where('user_id', auth()->id())
            ->findOrFail($id);

        return view('user.clients.edit', compact('client'));
    }

    /**
     * Update client
     */
    public function update(Request $request, Client $client)
    {
        abort_if($client->user_id != auth()->id(), 403);

        $request->validate([
            'client_name' => 'required',
            'phone_number' => 'required|regex:/^\+[1-9]\d{7,14}$/',
            'email' => 'nullable|email',
            'address' => 'nullable',
            'notes' => 'nullable',
        ]);

        $client->update([
            'client_name' => $request->client_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client updated successfully');
    }

    /**
     * Delete client
     */
    public function destroy(string $id)
    {
        $client = Client::where('user_id', auth()->id())
            ->findOrFail($id);

        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client deleted successfully');
    }
}