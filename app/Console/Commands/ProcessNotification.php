<?php

namespace App\Console\Commands;

use App\Factories\SmsProviderFactory;
use App\Mail\OrderAssignMail;
use App\Mail\OrderStatusMail;
use App\Models\SendNotificationCronjob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ProcessNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SendNotificationCronjob::where('is_send', 0)
                                ->orderByDesc('id')
                                ->chunk(12, function($notifications){

                                    foreach($notifications as $notification)
                                    {
                                        if($notification->type == 2)
                                        {
                                            if($notification->method == 'place_order')
                                            {
                                                Mail::to($notification->target)->send(new OrderStatusMail($notification->content));
                                            }
                                            if($notification->method == 'assign_order')
                                            {
                                                Mail::to($notification->target)->send(new OrderAssignMail($notification->content));
                                            }
                                        }
                                        else
                                        {
                                            // if($notification->method == 'place_order')
                                            // {
                                                $smsProvider = SmsProviderFactory::get('aditya');
                                                $smsProvider->sendSms($notification->target, $notification->content);
                                            // }
                                        }
                                        $notification->is_send = 1;
                                        $notification->save();
                                    }
                                });



        $this->info("Command executed successully");
    }
}
