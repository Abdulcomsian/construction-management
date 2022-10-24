<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Project;

class Nominations extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $user;
    private $accepte_or_reject;
    private $comments;
    public function __construct($data,$status=null,$comments=null)
    {
        $this->user=$data;
        $this->accepte_or_reject=$status;
        $this->comments=$comments;
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
          $subject='TWP – Nomination Form Completion Request '.$projectdata->name.' and '.$projectdata->no.'';
          if($this->accepte_or_reject==2)
          {
            $subject='TWP - Nomination Rejected – '.$projectdata->name.' name and '.$projectdata->no.'';
          }
          if($this->accepte_or_reject==1)
          {
            $subject='TWP - Nomination Form Amendment  - '.$projectdata->name.' name and '.$projectdata->no.'';
          }
         
        
        return (new MailMessage)
            ->greeting('Nomination Form')
            ->subject($subject)
            ->view('mail.nomination',['user'=>$this->user,'status'=>$this->accepte_or_reject,'comments'=>$this->comments]);
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
