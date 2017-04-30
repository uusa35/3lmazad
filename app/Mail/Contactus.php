<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contactus extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    public $contactusInfo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $contactusInfo)
    {
        $this->request = $request;
        $this->contactusInfo = $contactusInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contactus')->subject('Contact us form')->with([
            'name' => $this->request['name'],
            'email' => $this->request['email'],
            'title' => $this->request['subject'],
            'phone' => $this->request['phone'],
            'subject' => $this->request['content'],
            'address' => $this->contactusInfo->address
        ]);
    }
}
