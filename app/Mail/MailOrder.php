<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $mail;
    public $firstname;
    public $lastname;
    public $message;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @param $token
     * @param $product
     */
    public function __construct($token, $product)
    {
        $this->token = $token;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('stonkx-noreply@stonk.com')->subject('Order confirmation')->view('confirmationMail')->with(['products'=>$this->product, 'token'=>$this->token]);
    }
}
