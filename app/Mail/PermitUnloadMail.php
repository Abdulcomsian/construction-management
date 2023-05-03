<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PermitUnloadMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $url;
    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name , $url , $msg)
    {
        $this->name = $name;
        $this->url = $url;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.permitunloadmail');
    }
}
