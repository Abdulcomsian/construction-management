<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Project;

class NominatinCompanyEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $company;
    public $file;
    public $user;
    public $type;
    public function __construct($data,$file,$user,$type=null)
    {
        $this->company=$data;
        $this->file=$file;
        $this->user=$user;
        $this->type=$type;
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
        $projectdata=Project::select('name','no')->find($this->user->project);
        $subject='TWP – Nomination Approval Required -'.$projectdata->name.' and '.$projectdata->no.'';
        if($this->type=="appointment")
        {
          $subject='TWP- Appointment -'.$projectdata->name.' and '.$projectdata->no.'';
        }
        return (new MailMessage)
            ->greeting('Nomination Form')
            ->subject($subject)
            ->view('mail.nominationcompany',['company'=>$this->company,'user'=>$this->user,'type'=>$this->type])
             ->attach(public_path('pdf/' . $this->file), [
                'as' => $this->type ? 'appointment.pdf':'nomination.pdf',
                'mime' => 'text/pdf',
            ]);
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
