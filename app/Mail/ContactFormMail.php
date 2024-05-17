<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fullname;
    public $email;
    public $subject;
    public $message;

    /**
     * Create a new message instance.
     *
     * @param string $fullname
     * @param string $email
     * @param string $subject
     * @param string $message
     */
    public function __construct($fullname, $email, $subject, $message)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
                    ->subject('New Contact Form Submission')
                    ->view('pages.contact');
    }
}
