<?php

namespace App\Console;

use App\Console\Commands\SendExpireDateEmails;
use App\Http\Controllers\CartController;
use App\Models\BookBorrow;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        SendExpireDateEmails::class
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // dd($schedule);
        // $schedule->command('inspire')->hourly();
        // $schedule->call(function () {
        //     $books = BookBorrow::where('due_date', '<', \Carbon\Carbon::now())->where('status', '0')->get();
        //     foreach ($books as $book) {
        //         $this->sendMail($book->user_id);
        //     }
        // })->daily();
    }

    // public function sendMail($user_id)
    // {
    // }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}