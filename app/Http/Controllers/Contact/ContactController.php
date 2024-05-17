<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the contact form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        // Validate the form data if needed
        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Send email
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $messageContent = $request->input('message');

        Mail::to('bonsadesalegn2@gmail.com')->send(new ContactFormMail($fullname, $email, $subject, $messageContent));

        // Redirect back with a success message or to a thank you page
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
