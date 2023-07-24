<?php

namespace App\Console;

use App\Models\User;
use App\Jobs\SendSmsJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {

            // run send sms queue for 15 minutes later invoice received
            $schedule->call(function () {
                log::info("sms run job");
                $startOfDay = now()->subMinutes(15);
                $endOfDay = now();

                $users = User::where(['active'=> true,'sms'=>1])
                ->whereHas('invoices', function ($query) use ($startOfDay, $endOfDay) {
                    $query->whereIn('invoiceStatus', ['processing'])

                        ->where('status','ثبت سفارش فروش انجام شد')
                        ->whereBetween('created_at', [$startOfDay, $endOfDay]);
                })
                ->get();

                foreach($users as $key=>$user){
                    $invoces=$user->invoices();
                    $allInvoiceId=[];
                    foreach($invoces as $invoce){
                        $allInvoiceId[]=$invoce->InvoiceId;
                    }

                    $message = "سفارش فروش جدید به شماره " . implode(', ', $allInvoiceId) . " در سایت شما دریافت شد. افزونه نیلا";
                    SendSmsJob::dispatch((object)["queue_server"=>$user->queue_server,"id"=>$user->id,"mobile"=>$user->siteUrl,"name"=>$user->name],$message )->onConnection($user->queue_server)->onQueue("high");
                }


            })->name('send_sms_invoce_resived')->withoutOverlapping()->everyMinute();//->everyFifteenMinutes();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
