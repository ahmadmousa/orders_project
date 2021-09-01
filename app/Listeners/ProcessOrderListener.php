<?php

namespace App\Listeners;

use App\Events\ExampleEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class ProcessOrderListener implements ShouldQueue
{
//    use SerializesModels;
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
       $this->saveOrder($event);
    }

    private function saveOrder($event){
        $orderInfo = json_decode($event->order);
        $newOrder = new Order();
        $newOrder->notes = $orderInfo->notes;
        $newOrder->restaurant_id = $orderInfo->restaurant_id;
        $newOrder->dish_id = $orderInfo->dish_id;
        $newOrder->user_id = $orderInfo->user_id;
        $newOrder->quantity = $orderInfo->quantity;
        $newOrder->price = $orderInfo->price;
        $newOrder->netPrice = $orderInfo->price * $orderInfo->quantity;
        
        $newOrder->city = $orderInfo->address->city;
        $newOrder->address = $orderInfo->address->country;
    
        $newOrder->latitude = $orderInfo->address->geo->latitude;
        $newOrder->longitude = $orderInfo->address->geo->longitude;
        $newOrder->save();
    }
}
