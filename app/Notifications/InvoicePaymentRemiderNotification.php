<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaymentRemiderNotification extends Notification
{
    use Queueable;
    protected $attackDoc;
    protected $days;
    protected $invoiceId;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($attackDoc,$days,$invoiceId)
    {
       
        $this->attackDoc= $attackDoc;
        $this->days= $days;
        $this->invoiceId= $invoiceId;

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
    
        $subject = 'Invoice Reminder';
       $send_email = (new MailMessage)
            ->greeting('Hello')
            ->subject($subject)
            ->view('mail.invoicePaymentReminder',['days'=>$this->days,'invoiceId'=>$this->invoiceId]);
            if($this->attackDoc)
            {
                $send_email->attach(public_path($this->attackDoc));
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
