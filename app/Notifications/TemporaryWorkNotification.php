<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TemporaryWorkNotification extends Notification
{
    use Queueable;
    private $offerData;
    public $id;
    public $email;
    public $is_check;
    public $is_job;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($offerData,$id,$email=NULL,$is_check=NULL,$is_job=NULL)
    {
        $this->offerData = $offerData;
        $this->id=$id;
        $this->email=$email;
        $this->is_check=$is_check;
        $this->is_job=$is_job;
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
        if($this->is_check){
            $path = public_path('estimatorPdf/' . $this->offerData['body']['filename']);
        } else{
            $path = public_path('pdf/' . $this->offerData['body']['filename']);
        }
        
        return (new MailMessage)
            ->greeting($this->offerData['greeting'])
            ->subject($this->offerData['subject'])
            ->view('mail.temporaryworkmail', ['details' => $this->offerData,'id'=>$this->id,'email'=>$this->email, 'job' =>$this->is_job])
            ->attach($path, [
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
