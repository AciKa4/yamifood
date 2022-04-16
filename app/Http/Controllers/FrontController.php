<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontController extends MyBaseController
{

    const PAGINATE_LIMIT = 6;

    public function home(){


        $this->data["slider"] = SliderImage::where("active",1)->get();
        $this->data["customers"] = Customer::all();
        $this->data["products"] = Product::limit(6)->orderByDesc("created_at")->get();

        return view("pages.index",$this->data);
    }

    public function products(){

        $this->data["customers"] = Customer::all();
        $this->data["products"] = Product::where('is_active',1)->paginate(self::PAGINATE_LIMIT);
        $this->data["categories"] = Category::select("id","name")->get();

        return view("pages.products",$this->data);
    }

    public function product($id){
        $product = Product::with("categories")->find($id);

        if(!$product){
            return view("pages.menu");
        }

        $this->data["product"] = $product;

        return view("pages.single",$this->data);
    }

    public function getFilter(Request $request){
        try{
            $cats = $request->cats;
            $keyword = $request->keyword;
            $sort= $request->sort;

            $productsData = Product::getProducts($cats,$keyword,$sort)->paginate(self::PAGINATE_LIMIT);

            return response()->json($productsData);
        }

        catch (\Exception $e) {
            \Log::error('Error occurred: ' . $e->getMessage());
            return response(["msgError" => "Server error occurred"], 500);
        }
    }


    public function about(){
        return view("pages.about",$this->data);
    }

    public function author(){
        return view("pages.author",$this->data);
    }



}
