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
        return (new MailMessage)
                    ->line('Your pricing is rejected by the client. Plese update the prices.')
                    ->line($this->text) // Use the specific text
                    ->action('Link', route('edit_estimation',$this->editRoute->id))
                    ->line('Thank you for using our application!');
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
