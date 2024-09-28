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
    public $messageContent;

    /**
     * Create a new message instance.
     *
     * @param string $fullname
     * @param string $email
     * @param string $subject
     * @param string $messageContent
     */
    public function __construct($fullname, $email, $subject, $messageContent)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->subject = $subject;
        $this->messageContent = $messageContent;
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
                    ->view('email.contact');
    }
}
