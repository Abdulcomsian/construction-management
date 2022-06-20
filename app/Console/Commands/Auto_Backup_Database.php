<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Auto_Backup_Database extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Company Wise Project Backup';

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
        return 0;
    }
}
