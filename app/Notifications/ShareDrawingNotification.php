<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\TempWorkUploadFiles;
use App\Models\TemporaryWork;

class ShareDrawingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $data;
    protected $check;
    public function __construct($data,$check=null)
    {
        $this->data=$data;
        $this->check=$check;
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
        $drawings=TempWorkUploadFiles::with('comment')->find($this->data);
        $tempdata=TemporaryWork::select('id','desinger_email_2', 'twc_id_no','ped_url')->find($drawings->temporary_work_id);
        return (new MailMessage)
            ->greeting('Greetings')
            ->subject('Drawing  Share Notifications')
            ->view('mail.drawingshare',['drawings'=>$drawings,'tempdata'=>$tempdata,'check'=>$this->check]);
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
