<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\TemporaryWork;

class DesignerAwarded extends Notification
{
    use Queueable;

    public $tempid;
    public $email;
    public $code;
    public function __construct($tempid,$email,$code)
    {
        $this->tempid=$tempid;
        $this->email=$email;
        $this->code=$code;
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
        $data=TemporaryWork::with('project')->find($this->tempid);
        $proj_name = $data->project->name ?? $data->projname;
        $proj_no = $data->project->no ?? $data->projno;
        return (new MailMessage)
            ->greeting('Design Brief Awarded')
            ->subject('Design Brief Awarded -'.$proj_name. '-' .$proj_no)
            ->view('mail.designerAwarded', ['details' => $data,'id'=>$this->tempid,'email'=>$this->email,'code'=>$this->code]);
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
