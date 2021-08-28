<?php

namespace App\Events;
use Illuminate\Foundation\Event\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\Models\Order;

class ProcessAddOrderEvent extends Event
{
    public $order;
    use InteractsWithSockets;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($newOredr)
    {
    
        $this-> order = $newOredr;
    }
}
