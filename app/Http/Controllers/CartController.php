<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\UserAction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CartController extends MyBaseController
{
    public function cart(Request $request)
    {

        $productIds = Cart::select('product_id', 'quantity')
            ->where('user_id', $request->session()->get('user')->id)
            ->get();
        $products = [];

        foreach ($productIds as $pid) {
            $product = Product::with('categories')
                ->where('id', $pid->product_id)
                ->first();
            $product->quantity = $pid->quantity;
            $products[] = $product;
        }

        $this->data['products'] = $products;
        return view("pages.cart", $this->data);
    }


    public function store(Request $request)
    {

        $user = $request->session()->get("user");
        $productId = $request->productId;

        try {

            $cart = Cart::where("product_id", $productId)
                ->where("user_id", $user->id)
                ->first();

            if ($cart) {
                $product = Product::find($productId);

                $cart->quantity = $cart->quantity + 1;
                $cart->save();

                return response(['msg' => 'Update quantity for ' . $product->name]);
            }

            $cartNew = new Cart();

            $cartNew->product_id = $productId;
            $cartNew->user_id = $user->id;
            $cartNew->quantity = 1;
            $result = $cartNew->save();


            $userAction = $request->session()->get("user")->first_name ." added item to cart";

            UserAction::create(["user_id"=>$request->session()->get("user")->id,"action"=> $userAction]);

            if ($result) {
                return response(['msg' => 'Successfully added to cart!']);
            } else {
                return response(['msg' => 'Server error'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }


    }

    public function changeQuantity(Request $request){

        try{
            $cart = Cart::where("product_id",$request->productId)->first();
            $cart->quantity = $request->quantityVal;

            $result=$cart->save();
            $itemsinCart = Cart::where("user_id",$request->session()->get("user")->id)->get();

            if($result)
            {
                return response(['msg' => 'Successfully changed quantity','itemsinCart'=> $itemsinCart], Response::HTTP_OK);
            }
            else
                return response(['msg'=> 'Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);

        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
            return response(['message'=> 'Quantity is Invalid'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function destroy(Request $request){


        try{

            $cart = Cart::where("product_id",$request->productId)->first();

            $result = $cart->delete();

            $itemsInCart = Cart::where("user_id",$request->session()->get("user")->id)->get();

            if(count($itemsInCart) ==0){
                return response(['msg' => 'Removed last item from cart.'], Response::HTTP_BAD_REQUEST);
            }

            if($result){
                $userAction = $request->session()->get("user")->first_name ." remove item from cart";
                UserAction::create(["user_id"=>$request->session()->get("user")->id,"action"=> $userAction]);

                return response(['msg' => 'Successfully removed item from cart!','itemsinCart'=> $itemsInCart], Response::HTTP_OK);
            }
            else {
                return response(['msg'=> 'Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }


}
