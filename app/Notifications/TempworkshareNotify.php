<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\TemporaryWork;
use App\Models\TemporaryWorkComment;

class TempworkshareNotify extends Notification
{
    use Queueable;
    protected $data;
    protected $check;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data,$check)
    {
         $this->data = $data;
         $this->check= $check;
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
         if(is_object($this->data) && count($this->data)>0)
         {
           $tempworkdetails=TemporaryWork::with('comments','uploadfile')->select('id','ped_url','twc_id_no')->whereIn('id',$this->data)->get();
         }
         else{
             $tempworkdetails=TemporaryWork::with('comments','uploadfile')->select('id','ped_url','twc_id_no')->where('id',$this->data)->get();
         }
         return (new MailMessage)
            ->greeting('Greetings')
            ->subject('Temporary Work Share Notifications')
            ->view('mail.tempshare', ['details' => $tempworkdetails]);
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
