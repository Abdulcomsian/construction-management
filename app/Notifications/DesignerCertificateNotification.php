<?php

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DesignerCertificateNotification extends Notification
{
    protected $temporary_work;
    protected $pdfLink;

    public function __construct($temporary_work, $pdfLink)
    {
        $this->temporary_work = $temporary_work;
        $this->pdfLink = $pdfLink;
    }

    public function toMailUsing($notifiable)
    {
        $recipient = $notifiable->id === $this->temporary_work->designerAssign ? 'checker' : 'designer';

        return (new MailMessage)
            ->subject('Designer Certificate Uploaded')
            ->greeting("Hello $recipient,")
            ->line('The designer certificate has been uploaded.')
            ->line('Please find the attached certificate PDF.')
            ->action('View Certificate', $this->pdfLink)
            ->line('Thank you for your participation!');
    }
}
