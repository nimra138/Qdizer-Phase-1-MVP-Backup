<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = auth()->user()->services;
        return view('user.services.index', compact('services'));
    }

    public function create()
    {
        return view('user.services.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'service_name' => 'required',
        'unit_price' => 'required|numeric',
        'description' => 'nullable'
    ]);

    $exists = auth()->user()->services()
        ->where('service_name', $request->service_name)
        ->exists();

    if ($exists) {
        return back()
            ->withInput()
            ->withErrors([
                'service_name' => 'This service already exists.'
            ]);
    }

    auth()->user()->services()->create([
        'service_name' => $request->service_name,
        'unit_price' => $request->unit_price,
        'description' => $request->description,
    ]);

    return redirect()->route('services.index')
        ->with('success', 'Service added successfully');
}

    public function edit(Service $service)
    {
        abort_if($service->user_id != auth()->id(), 403);

        return view('user.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        abort_if($service->user_id != auth()->id(), 403);

        $request->validate([
            'service_name' => 'required',
            'unit_price' => 'required|numeric',
            'description' => 'nullable'
        ]);
        // Rule::unique('services')
        //     ->where(fn ($q) => $q->where('user_id', auth()->id()))
        //     ->ignore($service->id)
        $service->update([
            'service_name' => $request->service_name,
            'unit_price' => $request->unit_price,
            'description' => $request->description,
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service updated');
    }

    public function destroy(Service $service)
    {
        abort_if($service->user_id != auth()->id(), 403);

        $service->delete();

        return back()->with('success', 'Service deleted');
    }
}