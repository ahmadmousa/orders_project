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
// use Illuminate\Queue;
class OrdersController extends Controller
{
    //
    public function addOrder(Request $request){
   
      
      event(new ProcessAddOrderEvent($this->createNewOrder($request)));
      
     // dispatch(new ProcessOrder($request));
   
    return response()->json([
        'status' => 200,
        'message' => 'request received waiting restaurant to accept order',
    ]);
    }

   private function createNewOrder( $request){
    $newOrder = new Order();
    $newOrder->notes = $request->input('notes');
    $newOrder->restaurant_id = $request->input('restaurant_id');
    $newOrder->dish_id = $request->input('dish_id');
    $newOrder->user_id = $request->input('user_id');
    $newOrder->quantity = $request->input('quantity');
    $newOrder->price = $request->input('price');
    $newOrder->netPrice = $request->input('price') * $request->input('quantity');
    
    $newOrder->city = $request->input('address.city');
    $newOrder->address = $request->input('address.country');

    $newOrder->latitude = $request->input('address.geo.latitude');
    $newOrder->longitude = $request->input('address.geo.longitude');
    return $newOrder;
   }
}
