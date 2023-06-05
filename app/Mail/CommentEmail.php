<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;
    public $project;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($comment , $project)
    {
        $this->comment = $comment;
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.jobComment');
    }
}
