<?php

namespace App\Http\Controllers;
use App\Models\Setting;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SettingController extends Controller
{
     public function index()
    {

        $setting = Setting::first();

        return view(
            'admin.settings.index',
            compact('setting')
        );

    }



    public function update(Request $request)
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
