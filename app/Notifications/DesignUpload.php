<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DesignUpload extends Notification
{
    use Queueable;
     private $offerData;
     private $email;
     public $is_check;
     protected $attachment;
    //  public $ccemail;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($offerData,$email=null,$is_check=null)
    {
        $this->offerData = $offerData;
        $this->email=$email;
        $this->is_check=$is_check;
        $this->attachment = $offerData['body']['attachfile'];
        // $this->ccemail = $offerData['cc'];
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
        // dd($this->offerData['cc']);
        if($this->is_check){
            $path = public_path('estimatorPdf/' . $this->offerData['body']['filename']);
        } else{
            $path = public_path('pdf/' . $this->offerData['body']['filename']);
        }
       $send_email = (new MailMessage)
            ->greeting($this->offerData['greeting'])
            ->subject($this->offerData['subject'])
            ->view('mail.designupload', ['details' => $this->offerData,'email'=>$this->email])
            ->attach($path, [
                'as' => $this->offerData['body']['name'].'.pdf',
            ]);
            if($this->attachment!=""){
                $send_email->attachData(
                    $this->attachment->get(),
                    $this->attachment->getClientOriginalName(),
                    ['mime' => $this->attachment->getClientMimeType()]
                );
            }
            if ($cc_email = $this->offerData['cc'] ?? null)
            {
                $send_email->cc($cc_email);
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
