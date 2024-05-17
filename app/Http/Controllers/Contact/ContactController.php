<?php

namespace App\Http\Controllers\Contact;
use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function submit(Request $request)
    {
        // Validate the form data if needed

        // Send email
        Mail::to('bons2112lidu@gmail.com')->send(new ContactFormMail(
            $request->input('fullname'),
            $request->input('email'),
            $request->input('subject'),
            $request->input('message')
        ));

        // Redirect back with a success message or to a thank you page
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
