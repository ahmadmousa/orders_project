<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent ;
use App\Models\Order;
use App\Models\Address;
use App\Models\ResopensOrder;
use App\Jobs\ProcessOrder;
use Illuminate\Foundation\Event\Dispatchable;

use App\Events\ProcessAddOrderEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
// use Illuminate\Queue;
class OrdersController extends Controller
{
    //
    public function addOrder(Request $request){
   
      
      event(new ProcessAddOrderEvent(json_encode($request->all())));
  
    //  dispatch(new ProcessOrder($this->createNewOrder($request)));
   
    return response()->json([
        'status' => 200,
        'message' => 'request received waiting restaurant to accept order',
    ]);
    }

    public function getListOrders(){
        $orders = Order::simplePaginate(4);
        return $orders;
    }


}
