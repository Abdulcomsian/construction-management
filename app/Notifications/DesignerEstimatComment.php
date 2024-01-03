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
    protected $ccemail;
    protected $attachment;
    protected $comment;
    public function __construct($email,$type,$designListId=NULL,$temworaryId=NULL,$attachfile=NULL,$cc_emails=NULL,$comment=NULL)
    {
        $this->email=$email;
        $this->type=$type;
        $this->designListId=$designListId;
        $this->temworaryId=$temworaryId;
        $this->attachment = $attachfile;
        $this->ccemail = $cc_emails;
        $this->comment = $comment ?? '';
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
        $messageType =0;
        if($this->designListId)
        {
            $data=EstimatorDesignerList::find($this->designListId);
            $code=$data->code;
            if($this->type == 'designer_supplier')
            {
                if($data->email == $this->email)
                {
                $messageType = 1;
                }
                else
                {
                    $messageType = 2;
                }
            }
        }
       
        $send_email =  (new MailMessage)
            ->greeting('Designer Comment')
            ->subject('Designer Comment')
            ->view('mail.designerEstimatorComment',['email'=>$this->email,'type'=>$this->type,'code'=>$code,'data'=>$data,'comment'=>$this->comment,'messageType'=>$messageType]);
            if($this->attachment)
            {
                $send_email->attachData(
                    $this->attachment->get(),
                    $this->attachment->getClientOriginalName(),
                    ['mime' => $this->attachment->getClientMimeType()]
                );
            }
            if ($this->ccemail)
            {
                foreach($this->ccemail as $cc_email)
                {
                    $send_email->cc($cc_email);
                }
            }
        return $send_email;
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
