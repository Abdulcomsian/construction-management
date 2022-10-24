<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\TemporaryWork;

class DrawingCommentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $data;
    protected $type;
    protected $mail;
    protected $tempid;
    public function __construct($data,$type,$mail=null,$tempid=null)
    {
        $this->data=$data;
        $this->type=$type;
        $this->mail=$mail;
        $this->tempid=$tempid;
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
        $tempdata='';
        $subject='Drawing Comment / Reply Notifications';
        if($this->tempid)
        {
        $tempdata=TemporaryWork::with('project:name,no,id')->find($this->tempid);
         $subject='TWP– Design Comments from TWC - '.$tempdata->project->name.' and '.$tempdata->no;
        }
         return (new MailMessage)
            ->greeting('Greetings')
            ->subject($subject)
            ->view('mail.drawingcomment',['comment'=> $this->data,'type'=>$this->type,'email'=>$this->mail,'tempid'=>$this->tempid,'tempdata'=>$tempdata]);
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
