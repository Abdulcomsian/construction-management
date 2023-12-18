<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoiceNotification extends Notification
{
    use Queueable;
     private $offerData;
     private $email;
     public $is_check;
     protected $attachment;
     protected $ccemail;
     protected $designCheckFile;
     protected $riskAssesmentFile;
     protected $drawingFile;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
       
     

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
        // dd($this->offerData['cc']);
        if($this->is_check){
            $path = public_path('estimatorPdf/' . $this->offerData['body']['filename']);
        } else{
            $path = public_path('pdf/' . $this->offerData['body']['filename']);
        }

       $send_email = (new MailMessage)
            ->greeting($this->offerData['greeting'])
            ->subject($this->offerData['subject'])
            ->view('mail.designupload', ['details' => $this->offerData,'email'=>$this->email])
            ->attach($path, [
                'as' => $this->offerData['body']['name'].'.pdf',
            ]);
            if($this->attachment)
            {
                $send_email->attach($this->attachment);

            }
            
            return $send_email;
           
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
