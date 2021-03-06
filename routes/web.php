<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Order;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'OrdersController@getListOrders');

$router->post('/addOrder', 'OrdersController@addOrder');
