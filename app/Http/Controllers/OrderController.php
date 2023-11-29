<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function makeOrder(Request $request){
    $orderItems =  DB::table('carts')
    ->select('carts.id','carts.quantity','products.product_id','products.price','products.image','products.name')
    ->leftJoin('products','products.product_id','=','carts.product_id')
    ->where('carts.user_id','=',session('user')['user_id'])->get();
    $total_price = 0;
    foreach($orderItems as $item){
    $total_price += $item->price * $item->quantity;
    }
    $order = new Order();
    $fullname = $request['fullname'];
    $email = $request['email'];
    $address = $request['address'];
    $city = $request['city'];
    $order -> shippingAddress = $fullname . '|' . $email .'|' . $address. '|'. $city;
    $user_id = session('user')['user_id'];
    $order -> user_id = $user_id;
    $order -> TotalPrice = $total_price;
    $order -> OrderStatus = 'pending';
    $order -> PaymentMethod = 'card';
    $order->save();
    $order_id = $order-> id;
    foreach($orderItems as $item){
      $orderItem = new OrderItem();
      $orderItem -> order_id = $order_id;
      $orderItem -> quantity = $item->quantity;
      $orderItem -> SubTotalPrice = $item->price * $item->quantity;
      $orderItem -> product_id = $item->product_id;
      $orderItem->save();

    }
    $total = $total_price;
    $productNames = $request['product_name'];
    $request->session()->flash('total', $total);
    $request->session()->flash('productNames', serialize($productNames));
    return redirect('/session');

    }

    
}
