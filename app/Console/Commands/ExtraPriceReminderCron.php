<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TemporaryWork;
use App\Models\ExtraPrice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ThreeDayReminderExtraPrice;

class ExtraPriceReminderCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Extra:Price';

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
        \Log::info("ExtraPrice Cron is working fine");
        $extraPrice = ExtraPrice::where('status', 0)->get();
        if(isset($extraPrice) && !empty($extraPrice)){
            foreach($extraPrice as $price){
                $todayDate = Carbon::parse(date('Y-m-d'));
                $created_at = Carbon::parse(date('Y-m-d', strtotime($price->created_at)));
                $differnce = $todayDate->diffInDays($created_at);
                if($differnce == 3){
                    $clientData = TemporaryWork::where('id', $price->temporary_work_id)->first();
                    Notification::route('mail', $clientData['client_email'])->notify(new ThreeDayReminderExtraPrice());
                    \Log::info("Email Sent");
                }
            }
        }        
    }
}
