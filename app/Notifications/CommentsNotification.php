<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\TemporaryWork;

class CommentsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $comment;
    private $type;
    private $tempid;
    private $email;
    private $title;
    private $twc_id_no;
    private $scan;
    private $company;
    public function __construct($comment,$type,$tempid,$mail=null,$scan=null)
    {
        $this->comment=$comment;
        $this->type=$type;
        $this->tempid=$tempid;
        $this->scan=$scan;
        $tempdata=TemporaryWork::select('twc_email','design_requirement_text','twc_id_no','company')->find($tempid);
        if($this->type=='question')
        {
            $this->email=$tempdata->twc_email;
        }
        elseif($this->type=='reply')
        {
            $this->email=$mail;
        }
        $this->company=$tempdata->company;
        $this->title=$tempdata->design_requirement_text;
        $this->twc_id_no=$tempdata->twc_id_no;
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
            ->greeting('Comments Notification')
            ->subject($this->title.'-'.$this->twc_id_no.' - Notification')
            ->view('mail.commentsmail',['comment'=>$this->comment,'type'=>$this->type,'tempid'=>$this->tempid,'email'=>$this->email,'this->twc_id_no'=>$this->twc_id_no,'scan'=>$this->scan,'company'=>$this->company]);
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
