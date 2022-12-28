<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EstimatorNotification extends Notification
{
    use Queueable;

    private $offerData;
    public $id;
    public $email;
    public $code;
    
    public function __construct($offerData,$id,$email,$code)
    {
        $this->offerData = $offerData;
        $this->id=$id;
        $this->email=$email;
        $this->code=$code;
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
            ->view('mail.estimatormail', ['details' => $this->offerData,'id'=>$this->id,'email'=>$this->email,'code'=>$this->code])
            ->attach(public_path('estimatorPdf/' . $this->offerData['body']['filename']), [
                'as' =>  $this->offerData['body']['name'].'.pdf',
                'mime' => 'text/pdf',
            ]);
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
