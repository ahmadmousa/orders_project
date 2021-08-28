<?php

namespace App\Listeners;

use App\Events\ExampleEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessOrderListener implements ShouldQueue
{
   // use SerializesModels;
    public function __construct()
    {
       
    }
    /**
     * Handle the event.
     *
     * @param  \App\Events\ProcessAddOrderEvent  $event
     * @return void
     */
    public function handle( $event)
    {
        //
        $event->order->save();
    }
}
