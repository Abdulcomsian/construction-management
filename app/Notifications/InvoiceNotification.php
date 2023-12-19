<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoiceNotification extends Notification
{
    use Queueable;
    protected $invoiceData;
    

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($invoiceData)
    {
       

     $this->invoiceData= $invoiceData;

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
       $send_email = (new MailMessage)
            ->greeting($this->invoiceData['subject'])
            ->subject($this->invoiceData['subject'])
            ->view('mail.invoiceDesignerMail',['invoiceDetails'=>$this->invoiceData]);
            if($this->invoiceData['body']['attachfile'])
            {
                $send_email->attach(public_path($this->invoiceData['body']['attachfile']));

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
