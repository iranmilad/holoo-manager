<?php

namespace App\Console;

use App\Models\User;
use App\Jobs\SendSmsJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {

            // run send sms queue for 15 minutes later invoice received
            $schedule->call(function () {

                $startOfDay = now()->subMinutes(15);
                $endOfDay = now();
                //log::info($startOfDay );
                $users = User::where(['active'=> true,'sms'=>1])
                ->whereHas('invoices', function ($query) use ($startOfDay, $endOfDay) {
                    $query->whereIn('invoiceStatus', ['processing'])
                        ->where('status','ثبت سفارش فروش انجام شد')
                        ->whereBetween('created_at', [$startOfDay, $endOfDay]);
                })
                ->get();

                foreach($users as $key=>$user){
                    log::info("sms run job for ".$user->id);
                    $invoces=$user->invoices;
                    $allInvoiceId=[];
                    foreach($invoces as $invoice){
                        $allInvoiceId[]=(int)$invoice->InvoiceId;
                    }
                    $allInvoiceId=array_unique($allInvoiceId);
                    //log::info($allInvoiceId);
                    $count=count($allInvoiceId);
                    $message = $count." سفارش فروش جدید در سایت شما دریافت شد. افزونه نیلا";

                    SendSmsJob::dispatch((object)["queue_server"=>$user->queue_server,"id"=>$user->id,"mobile"=>$user->mobile,"name"=>$user->name],$message )->onConnection($user->queue_server)->onQueue("high");
                }


            })->name('send_sms_invoce_resived')->withoutOverlapping()->everyFifteenMinutes();
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
