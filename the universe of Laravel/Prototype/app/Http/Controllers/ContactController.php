<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create(){
        return view('contact');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Prepare email sending, pass the validated data as an array
        Mail::send('emails.contact', ['data' => $validatedData], function ($message) use ($validatedData){
            $message->to('tribak.ayoub.solicode@gmail.com', 'Recipient')
            ->subject('New Contact Message from' . $validatedData['name']);
        });

        return redirect()->route('contact.create')->with('success', 'Your message has been sent successfully.');
    }

    
}
