<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
        Commands\createAdminUserCommand::class,
        Commands\backupDbToDropbox::class,        
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        if(!\DB::connection()){
            if(setup_variable('backup_db') == 1){
                $schedule->command('backup_db:dropbox')
                          ->dailyAt(setup_variable('jam_backup'));    
                }         
           }
    }

    
}
