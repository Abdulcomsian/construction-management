<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoiceNotification extends Notification
{
    use Queueable;
    protected $attachmentDoc;
    protected $designerCompany;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($attachmentDoc,$designerCompany)
    {
       
     $this->attachmentDoc= $attachmentDoc;
     $this->designerCompany= $designerCompany;

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
    
        $subject = isset($this->designerCompany) ? 'Invoice | '.$this->designerCompany : 'Invoice';
       $send_email = (new MailMessage)
            ->greeting('Hello')
            ->subject($subject)
            ->view('mail.invoiceDesignerMail');
            if($this->attachmentDoc)
            {
                $send_email->attach(public_path($this->attachmentDoc));

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
