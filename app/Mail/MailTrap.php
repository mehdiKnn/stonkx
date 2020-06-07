<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailTrap extends Mailable
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
     * @param $mail
     * @param $firstname
     * @param $lastname
     * @param $subject
     * @param $message
     */
    public function __construct($mail, $firstname, $lastname, $subject ,$message)
    {
        $this->mail = $mail;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
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
        return $this->from($this->mail,$this->firstname.' '.$this->lastname)->subject($this->subject)->view('mail')->with(['bodymessage'=>$this->message]);
    }
}
