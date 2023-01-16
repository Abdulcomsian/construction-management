<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\EstimatorDesignerList;

class DesignerEstimatComment extends Notification
{
    use Queueable;

    public $email;
    public $type;
    public $designListId;
    public $temworaryId;
    public function __construct($email,$type,$designListId=NULL,$temworaryId=NULL)
    {
        $this->email=$email;
        $this->type=$type;
        $this->designListId=$designListId;
        $this->temworaryId=$temworaryId;
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
        $code='';
        $data='';
        if($this->designListId)
        {
            $data=EstimatorDesignerList::find($this->designListId);
            $code=$data->code;
        }
       
        return (new MailMessage)
            ->greeting('Designer Comment')
            ->subject('Designer Comment')
            ->view('mail.designerEstimatorComment',['email'=>$this->email,'type'=>$this->type,'code'=>$code,'data'=>$data]);
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
