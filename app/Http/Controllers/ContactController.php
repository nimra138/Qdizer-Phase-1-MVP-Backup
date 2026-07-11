<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
      
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:100'
            ],

            'email' => [
                'required',
                'email:rfc,dns',
                'max:255'
            ],

              'phone' => [
                'required',
               'regex:/^(50|52|54|55|56|58)\s?\d{3}\s?\d{4}$/'
            ],

            'subject' => [
                'required',
                'string',
                'max:150'
            ],

            'message' => [
                'required',
                'string',
                'min:10',
                'max:5000'
            ]

        ]
        ,[
            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Please enter a valid UAE mobile number (Example: 50 123 4567).',

        ]
        );
        $phone = '+971 ' . preg_replace('/\s+/', ' ', trim($request->phone));

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return back()->with(
            'success',
            'Thank you! Your message has been sent successfully.'
        );
    }
   
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(15);

        return view('admin.contact.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        if (!$contactMessage->is_read) {
            $contactMessage->update([
                'is_read' => true
            ]);
        }

        return view('admin.contact.show', compact('contactMessage'));
    }

    public function update(Request $request, ContactMessage $contactMessage)
    {
        $contactMessage->update([
            'is_read' => $request->boolean('is_read')
        ]);

        return redirect()
            ->route('admin.contact.show', $contactMessage)
            ->with('success', 'Status updated successfully.');
    }
}