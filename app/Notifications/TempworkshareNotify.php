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
    public function __construct($data, $check)
    {
        $this->data = $data;
        $this->check = $check;
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
        if (is_object($this->data) && count($this->data) > 0) {
            $tempworkdetails = TemporaryWork::with('project','comments', 'uploadfile', 'permits', 'scaffold', 'permitsunload')->select('id','project_id','company','design_requirement_text','ped_url', 'twc_id_no')->whereIn('id', $this->data)->get();
            $multiple=1;
        } else {
            $tempworkdetails = TemporaryWork::with('project','comments', 'uploadfile', 'permits', 'scaffold', 'permitsunload')->select('id','project_id','company','design_requirement_text','ped_url', 'twc_id_no')->where('id', $this->data)->get();
              $multiple=0;
        }
        return (new MailMessage)
            ->greeting('Greetings')
            ->subject('Temporary Work Share Notifications')
            ->view('mail.tempshare', ['details' => $tempworkdetails,'multiple'=>$multiple,'iscomment'=>$this->check]);
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
