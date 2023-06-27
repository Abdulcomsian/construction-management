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
    private $scan;
    private $code;
    // private $client_email;
    public function __construct($comment,$type,$tempid,$mail=null,$scan=null,$code=null)
    {
        $this->comment=$comment;
        $this->type=$type;
        $this->tempid=$tempid;
        $this->scan=$scan;
        if($this->type=="reply" || $this->type=="client")
        {
             $this->email=$mail;
             $this->code=$code;
            
        }
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
        $tempdata=TemporaryWork::with('project:name,no,id')->select('project_id','twc_email','design_requirement_text','twc_id_no','company')->find($this->tempid);
        $company=$tempdata->company;
        $title=$tempdata->design_requirement_text;
        $twc_id_no=$tempdata->twc_id_no;
        $project_name = $tempdata->project->name ?? $tempdata->projname;
        $proj_no = $tempdata->project->no ?? $tempdata->projno;
        if($this->type=='question')
        {
            $this->email=$tempdata->twc_email;
            $subject='TWP – Designer Comments/Question -'.$project_name.'-'.$proj_no;
        }

        if($this->type=="reply")
        {
             $subject='TWP – TWC Answered Question  -'.$project_name.'-'.$proj_no;
        }

        if($this->scan=="scan")
        {
            $subject='TWP– Live T.W. comment on site (QR code) - '.$project_name.'-'.$proj_no;
        }
        if($this->type=="client")
        {
            $subject='TWP– Live T.W. comment on site (QR code) - '.$project_name.'-'.$proj_no;
        }
        return (new MailMessage)
            ->greeting('Comments Notification')
            ->subject($subject)
            ->view('mail.commentsmail',['comment'=>$this->comment,'type'=>$this->type,'tempid'=>$this->tempid,'email'=>$this->email,'twc_id_no'=>$twc_id_no,'scan'=>$this->scan,'company'=>$company,'code'=>$this->code]);
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
