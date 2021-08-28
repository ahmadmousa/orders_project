<?php

namespace App\Jobs;
use Illuminate\Http\Request;
// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Foundation\Bus\Dispatchable;
// use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class ProcessOrder extends Job 
// implements ShouldQueue
{
    protected  $newOrder;
    // use 
    // // Dispatchable,
    //  InteractsWithQueue, Queueable;
  //  , SerializesModels;
  
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Request $request)
    {
        //
     $this->newOrder = $newOrder;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->newOrder->save();
    }
}
