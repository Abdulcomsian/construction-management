<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Notification;
use App\Notifications\InvoicePaymentRemiderNotification;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $invoiceEmail;
    private $fileName;
    private $days;
    private $invoiceId;
    public function __construct($invoiceEmail,$fileName,$days,$invoiceId)
    {
        $this->invoiceEmail = $invoiceEmail;
        $this->fileName = $fileName;
        $this->days = $days;
        $this->invoiceId = $invoiceId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Notification::route('mail',  $this->invoiceEmail ?? '')->notify(new InvoicePaymentRemiderNotification($this->fileName,$this->days,$this->invoiceId));
    }
}
