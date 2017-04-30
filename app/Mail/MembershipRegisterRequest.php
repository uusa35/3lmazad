<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MembershipRegisterRequest extends Mailable
{
    use Queueable, SerializesModels;
    public $request;
    public $address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request,$address)
    {
        $this->request = $request;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.membership_register')->with([
            'title' => trans('general.register'),
            'name' => $this->request['name'],
            'phone' => $this->request['phone'],
            'email' => $this->request['email'],
            'country' => $this->request['country'],
            'address' => $this->address,
            'id' => $this->request['id'],
            'date_attendance' => $this->request['date_attendance'],
            'training_center' => $this->request['training_center'],
            'membership_type' => $this->request['membership_type']
        ]);
    }
}
