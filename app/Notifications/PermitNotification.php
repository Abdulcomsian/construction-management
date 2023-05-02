<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PermitNotification extends Notification
{
    use Queueable;
    private $offerData;
    public $type;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($offerData,$type=null)
    {
        $this->offerData = $offerData;
        $this->type=$type;
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
            ->greeting($this->offerData['greeting'])
            ->subject($this->offerData['subject'])
            ->view('mail.scaffoldmail', ['details' => $this->offerData,'type'=>$this->type])
            ->attach(
                public_path('pdf/' . $this->offerData['body']['filename']),
                [
                    'as' => $this->offerData['body']['name'] . '.pdf',
                    'mime' => 'text/pdf',
                ]
            );
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
