<?php

namespace App\Models;


use \Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'image', 'description','price', 'category_id', 'is_active'];

    public function categories(){

        return $this->belongsTo(Category::class,"category_id");
    }

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class);
    }

    public static function getProducts($cats,$keyword,$sort){

        $products = Product::with("categories")->with("ingredients");


        if(is_array($cats)){
            $products = $products->whereIn("category_id",$cats);
        }

        if($keyword){
            $products = $products->where("name","LIKE","%".$keyword."%");
        }

        if($sort){

            $sortAtr = explode("-",$sort);

            if($sortAtr[0] == 'p'){
                $products = $products->orderBy("price",$sortAtr[1]);
            }
            else{
                $products = $products->orderBy("name",$sortAtr[1]);
            }

        }

        return $products;

    }

    public static function getProductsAdmin(Request $request){

        $products = Product::with("categories")->with("ingredients");
        $keyword = $request->keyword;
        $sort = $request->sort;

        if($keyword){
            $products = $products->where("name","LIKE","%".$keyword."%");
        }

        if($sort){
            $sortAtr = explode("-",$sort);

            if($sortAtr[0] == 'p'){
                $products = $products->orderBy("price",$sortAtr[1]);
            }
            else{
                $products = $products->orderBy("name",$sortAtr[1]);
            }
        }

        return $products;

    }
}
