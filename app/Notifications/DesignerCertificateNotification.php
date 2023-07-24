<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DesignerCertificateNotification extends Notification
{
    protected $temporary_work;
    protected $pdfLink;
    protected $login_url;

    public function __construct($temporary_work, $pdfLink, $login_url)
    {
        $this->temporary_work = $temporary_work;
        $this->pdfLink = $pdfLink;
        $this->login_url = $login_url;
    }
    
    // Add the via method to specify the notification channels (e.g., mail)
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Designer Certificate Uploaded')
            ->greeting("Hello,")
            ->line('The designer certificate has been uploaded.')
            ->line('Please find the attached certificate PDF.')
            ->action('View Certificate', $this->login_url)
            ->line('Thank you for your participation!')
            ->attach($this->pdfLink, [
                'as' =>  'certificate'.'.pdf',
                'mime' => 'text/pdf',
            ]);
    }
}
