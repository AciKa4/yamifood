<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\Product;
use App\Models\UserAction;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends MyBaseController
{


    public function index(){
        $this->data["orders"] = Order::with("order_infos")->get();

        return view("admin.pages.orders",$this->data);
    }



    public function store(OrderRequest $request){


        try{
            $order = Order::create($request->all());

            $productsFromCart = Cart::select("product_id","quantity")
                                      ->where("user_id",$request->session()->get("user")->id)
                                      ->get();

            foreach($productsFromCart as $pid) {
                $product = Product::with('categories')
                                    ->where('id', $pid->product_id)
                                    ->first();

                $order_info = OrderInfo::create(['product_id' => $product->id,
                                                'name' => $product->name,
                                                'price' => $product->price,
                                                'quantity' => $pid->quantity,
                                                'order_id' => $order->id]);
            }

            UserAction::create(['action' => $request->name .' has completed order.', 'user_id' =>$request->user_id]);
            Cart::where('user_id', $request->user_id)->delete();


            return response(['msg' => 'Order is successfully recorded!'], Response::HTTP_CREATED);

        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return response(['message'=> 'Order data is Invalid',],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
