<?php

namespace App\Mail;

use App\Models\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsLetterCampaign extends Mailable
{
    use Queueable, SerializesModels;
    public $subscriber;
    public $title;
    public $body;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Newsletter $subscirber, $title, $body)
    {
        $this->subscriber = $subscirber;
        $this->title = $title;
        $this->body = $body;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // from by default the app email
//        return $this->view('emails.campaign')->subject('Newsletter Campaign | ' . $this->title)->with([
//            'title' => $this->title,
//            'body' => $this->body,
//            'name' => $this->subscriber->name,
//            'email' => $this->subscriber->email
//        ]);
        return $this->view('emails.campaign')->subject('Newsletter Campaign | ' . $this->title);
    }
}
