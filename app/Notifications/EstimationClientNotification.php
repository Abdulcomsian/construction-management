<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EstimationClientNotification extends Notification
{
    
    use Queueable;

    private $offerData;
    public $id;
    public $email;
    public $code;
    public $information;
    public $detail;
    public $file;
    public function __construct($offerData,$id,$email,$information,$detail,$file,$code)
    {
        $this->offerData = $offerData;
        $this->id=$id;
        $this->email=$email;
        $this->information = $information;
        $this->code=$code;
        $this->detail =$detail;
        $this->file =$file;
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
        if(isset($this->file) && !empty($this->file))
        {
            return (new MailMessage)
            ->greeting($this->offerData['greeting'])
            ->subject($this->offerData['subject'])
            ->view('mail.estimatorclientmail', ['details' => $this->offerData,'id'=>$this->id,'email'=>$this->email,'code'=>$this->code ,'information' => $this->information , 'detail' =>$this->detail])
            ->attach(public_path('estimatorPdf/' . $this->offerData['body']['filename']), [
                'as' =>  $this->offerData['body']['name'].'.pdf',
                'mime' => 'text/pdf',
            ])
            ->attach(public_path('uploads/additional_information/' . $this->file), [
                'as' =>  $this->file,
            ]);
        }else{
            return (new MailMessage)
                ->greeting($this->offerData['greeting'])
                ->subject($this->offerData['subject'])
                ->view('mail.estimatorclientmail', ['details' => $this->offerData,'id'=>$this->id,'email'=>$this->email,'code'=>$this->code ,'information' => $this->information , 'detail' =>$this->detail])
                ->attach(public_path('estimatorPdf/' . $this->offerData['body']['filename']), [
                    'as' =>  $this->offerData['body']['name'].'.pdf',
                    'mime' => 'text/pdf',
                ]);
        }
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
