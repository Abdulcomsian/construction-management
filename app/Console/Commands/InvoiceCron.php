<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use App\Models\ChangeEmailHistory;
use Carbon\Carbon;
use Notification;
use App\Notifications\InvoicePaymentRemiderNotification;
use App\Jobs\SendEmailJob;
class InvoiceCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Invoice:Cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");
        $invoices = Invoice::where('status','Unpaid')->get();
        foreach($invoices as $invoice)
        {
            $invoice_date = date('Y-m-d',strtotime($invoice->created_at));
            $invoice_date = carbon::parse($invoice_date);
            $due_date = date('Y-m-d',strtotime($invoice->date_of_payment));
            $due_date = carbon::parse($due_date);
            $diff = $invoice_date->diffInDays($due_date);
            if($diff == 3 || $diff == 7 || $diff == 1)
            {
                if($diff == 3){
                    $chm= new ChangeEmailHistory();
                    // $chm->email= Auth::user()->email;
                    $chm->type ='Invoice';
                    $chm->foreign_idd=$invoice->temporary_work_id;
                    $chm->message='Three day reminder message sent';
                    // $chm->status = 2;
                    // $chm->user_type = 'checker';
                    $chm->save();
                }elseif($diff == 7){
                    $chm= new ChangeEmailHistory();
                    // $chm->email= Auth::user()->email;
                    $chm->type ='Invoice';
                    $chm->foreign_idd=$invoice->temporary_work_id;
                    $chm->message='Seven days reminder message sent';
                    // $chm->status = 2;
                    // $chm->user_type = 'checker';
                    $chm->save();
                }elseif($diff == 1){
                    $chm= new ChangeEmailHistory();
                    // $chm->email= Auth::user()->email;
                    $chm->type ='Invoice';
                    $chm->foreign_idd=$invoice->temporary_work_id;
                    $chm->message='One day reminder message sent';
                    // $chm->status = 2;
                    // $chm->user_type = 'checker';
                    $chm->save();
                }
                
                dispatch(new SendEmailJob($invoice->send_email,$invoice->file_name,$diff,$invoice->id));
            }

        }
    }
}
