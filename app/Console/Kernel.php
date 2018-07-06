<?php

namespace App\Console;

use DB;
use App\Models\Carpeta;
use App\Models\Preregistro;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        $schedule->call(function () {  
            Preregistro::whereRaw('created_at < timestamp(DATE_SUB( NOW() , INTERVAL 24 HOUR))')->delete();        
            Preregistro::whereRaw('created_at < timestamp(DATE_SUB( NOW() , INTERVAL 72 HOUR))')->delete();    
        })->hourly();
        
        $schedule->call(function () {      
            Carpeta::whereNull('idEstadoCarpeta')->whereRaw('created_at < timestamp(DATE_SUB( NOW() , INTERVAL 150 HOUR))')->delete();    
        })->daily();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
