<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
   // Controller method to add a product to the cart
 
   public function addToCart(Request $request)
   {
      try{
       if(session('user')){
        $user_id = session('user')['user_id'];
        $cart = new Cart();
        $cart->product_id=$request['product_id'];
        $cart->user_id= $user_id;
        $cart->quantity=$request['quantity'];
        $cart_check = Cart::all()->where('user_id',$user_id)
        ->where('product_id',$cart->product_id);
        if(count($cart_check) > 0){
            echo "Item already exist in cart";
        }else{
        $cart->save();
        return redirect('/cart');
        }
       }else{
        
        return redirect('/login');
    }

    }catch(Exception $e){
        echo('Error: '.$e->getMessage());
    }
       
   }
   

   public function showCart()
   {
    if(session('user')){
       $cartProducts = DB::table('carts')
       ->select('carts.id','carts.quantity','products.product_id','products.price','products.image','products.name')
       ->leftJoin('products','products.product_id','=','carts.product_id')
       ->where('carts.user_id','=',session('user')['user_id'])->get();
       $data = compact('cartProducts');
       return view('frontend.add_to_cart')->with($data);
   }else{
    return redirect('/login');
   }
   }

   public function updateCart(Request $request, $id)
   {
    try{
   $cart = Cart::find($id);
   if(!is_null($cart)){
      $cart-> quantity = $request['quantity'];
      $cart->save();
      return response()->json(['data'=>$cart]);
   }else{
    return response()->json([]);
   }
    }   catch(Exception $e){
       return response()->json(['error'=>$e->getMessage()]);
    }
    
    }

    public function deleteCart($id){  
      try{
        $cart = Cart::find($id);
        if(!is_null($cart)){
        $cart->delete();
        return response()->json(['message'=>'deleted successfully']);
        }else{
            return response()->json(['error'=>'invalid item']);
        }
      }catch(Exception $e){
        return response()->json(['error'=>$e->getMessage()]);
      }
    }

    public function checkout(){
        if(session('user')){
           
        $cart = cart::where('user_id','=',session('user')['user_id'])->get();
        if(!is_null($cart)){
            $cartProducts = DB::table('carts')
            ->select('carts.id','carts.quantity','products.product_id','products.price','products.image','products.name')
            ->leftJoin('products','products.product_id','=','carts.product_id')
            ->where('carts.user_id','=',session('user')['user_id'])->get();
           
        $data = compact('cartProducts');
        return view('frontend.checkout')->with($data);
    }else{
      return  redirect('/cart');
    }
    }
}


   

    
}
