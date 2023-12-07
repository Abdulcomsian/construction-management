<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EstimationPriceRejectedNotification extends Notification
{
    use Queueable;
    protected $text;
    protected $editRoute;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($text, $editRoute)
    {
        $this->text = $text;
        $this->editRoute = $editRoute;
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
        // dd($this->editRoute);
        $mailMessage = new MailMessage;

        if ($this->editRoute->work_status === 'pending') {
            $mailMessage->subject($this->editRoute->projno . (!empty($this->editRoute->projno) && !empty($this->editRoute->projname)) ? ' | ' : ''. $this->editRoute->projname . ' Rejected')->line('Your pricing is rejected by the client.Please update the prices.')
                ->line($this->text)
                ->action('Link', route('edit_estimation', $this->editRoute->id));
        } elseif ($this->editRoute->work_status === 'publish') {
            $mailMessage->subject($this->editRoute->projno . (!empty($this->editRoute->projno) && !empty($this->editRoute->projname)) ? ' | ' : ''. $this->editRoute->projname . ' Approved')->line('Congratulations! Your pricing is approved by the client.')
                ->action('Link', route('edit_estimation', $this->editRoute->id));
        }

        $mailMessage->line('Thank you for using our application!');

        return $mailMessage;
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
