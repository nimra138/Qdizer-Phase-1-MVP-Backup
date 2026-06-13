<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function edit()
    {
        $user = auth()->user();

        $company = Company::where('user_id', $user->id)->first();

        return view('user.company.edit', compact('company', 'user'));
    }
public function update(Request $request)
{
    $request->validate([
        'company_name' => 'required',
        'business_category' => 'required',
        'phone_number' => 'required',
        'vat_number' => 'required_if:vat_registered,1',
    ]);

    $company = Company::updateOrCreate(
        [
            'user_id' => auth()->id()
        ],
        [
            'company_name' => $request->company_name,
            'business_category' => $request->business_category,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'vat_registered' => $request->has('vat_registered'),
            'vat_number' => $request->has('vat_registered')
                ? $request->vat_number
                : null,
            'country' => 'United Arab Emirates',
            'currency' => 'AED',
            'vat_rate' => 5,
            'default_terms' => $request->default_terms,
        ]
    );

    // LOGO
    if ($request->hasFile('logo')) {

        $path = $request->file('logo')
            ->store('logos', 'public');

        $company->update([
            'logo' => $path
        ]);
    }

    // return back()->with(
    //     'success',
    //     'Company profile saved successfully'
    // );
    return view('user.company.show', compact('company'));
}
public function show()
{
    $company = Company::where('user_id', auth()->id())->first();

    return view('user.company.show', compact('company'));
}
}
