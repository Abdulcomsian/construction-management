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
     protected $ccemail;
     protected $designCheckFile;
     protected $riskAssesmentFile;
     protected $drawingFile;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($offerData,$email=null,$is_check=null,$cc_email = null)
    {
        $this->offerData = $offerData;
        $this->email=$email;
        $this->is_check=$is_check;
        $this->attachment = $offerData['body']['attachfile'] ?? '';
        if(isset($offerData['body']['designcheckfile']) && !empty($offerData['body']['designcheckfile']))
        {
       
            $this->designCheckFile = public_path($offerData['body']['designcheckfile']);

        }
     
        if(isset($offerData['body']['risk_assesment_file']) && !empty($offerData['body']['risk_assesment_file']))
        {
            $this->riskAssesmentFile = public_path($offerData['body']['risk_assesment_file']);

        }
        
        if(isset($offerData['body']['drawing_file']) && !empty($offerData['body']['drawing_file']))
        {
            $this->drawingFile = public_path($offerData['body']['drawing_file']);

        }
     
        $this->ccemail = $cc_email;

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
            if(!file_exists($path))
            $path = public_path('pdf/'.$this->offerData['body']['filename']);
        } else{
            $path = public_path('pdf/' . $this->offerData['body']['filename']);
            if(!file_exists($path))
            $path = public_path('estimatorPdf/'.$this->offerData['body']['filename']);
        }

       $send_email = (new MailMessage)
            ->greeting($this->offerData['greeting'])
            ->subject($this->offerData['subject'])
            ->view('mail.designupload', ['details' => $this->offerData,'email'=>$this->email])
            ->attach($path, [
                'as' => $this->offerData['body']['name'].'.pdf',
            ]);
            if($this->attachment)
            {
                $send_email->attach($this->attachment);

            }
            if($this->designCheckFile)
            {
                $send_email->attach($this->designCheckFile);
            }
            if($this->riskAssesmentFile)
            {
                
                $send_email->attach($this->riskAssesmentFile);
            }
            if($this->drawingFile)
            {
                $send_email->attach($this->drawingFile);
            }
          
            if ($this->ccemail)
            {
               
                foreach($this->ccemail as $cc_email)
                {
                    if($cc_email != ""){
                        $send_email->cc($cc_email);
                    }
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
