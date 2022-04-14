<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $comment;
    private $type;
    private $tempid;
    private $email;
    private $title;
    public function __construct($comment,$type,$tempid,$email,$title)
    {
        $this->comment=$comment;
        $this->type=$type;
        $this->tempid=$tempid;
        $this->email=$email;
        $this->title=$title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Comments Notification')
            ->subject($this->title.' - Notification')
            ->view('mail.commentsmail',['comment'=>$this->comment,'type'=>$this->type,'tempid'=>$this->tempid,'email'=>$this->email]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
