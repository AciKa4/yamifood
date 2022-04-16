<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\ImageUpload;
use App\Models\Ingredient;
use App\Models\IngredientProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends MyBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const PAGINATE_LIMIT = 10;

    public function filter(Request $request){

        $productsModel = new Product();

        try{
            if($request->has("entities")){
                $numberPagination = $request->entities;
            }
            else {
                $numberPagination = self::PAGINATE_LIMIT;
            }

            $productsData = $productsModel->getProductsAdmin($request)->paginate($numberPagination);


            return response()->json($productsData);
        }

        catch (\Exception $e) {
            \Log::error('Error occurred: ' . $e->getMessage());
            return response(["msgError" => "Server error occurred"], 500);
        }

    }

    public function index()
    {
        $this->data["products"] = Product::paginate(self::PAGINATE_LIMIT);

        return view("admin.products.index",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["categories"] = Category::all();
        $this->data["ingredients"] = Ingredient::all();


        return view("admin.products.create",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        try {
            $newImg = ImageUpload::upload($request->image);
            $product = Product::create($request->except('image')+["image"=>$newImg]);

            $ingredients = $request->ingredients;

            foreach($ingredients as $ing){
                IngredientProduct::create(["product_id"=>$product->id,"ingredient_id"=>$ing]);
            }


            return redirect()->route('products.index')
                                ->with('success', 'New product added.');


        } catch (Exception $e) {
            Log::error($e->getMessage());

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data["product"] = Product::find($id);

        return view("pages.single",$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data["ingredients"] = Ingredient::all();
        $this->data["categories"] = Category::all();

        $product = Product::where("id",$id)
                            ->with("categories")
                            ->with("ingredients")
                            ->first();

        $this->data["product"] = $product;

        return view("admin.products.edit",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);

        try{
            $product->update($request->except('image'));

            if($request->has("image")){
                $newImg = ImageUpload::upload($request->image);

                ImageUpload::deleteImg($request->image);

                $product->image = $newImg;
                $product->save();
            }

            if($request->has("ingredients")){

                IngredientProduct::where("product_id",$product->id)->delete();

                foreach($request->ingredients as $ing){
                    IngredientProduct::create(["product_id"=>$product->id,"ingredient_id"=>$ing]);
                }
            }


            return redirect()->route("products.index")->with("success","Product updated successfully");

        }
        catch(\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('products.edit', $product->id)->with('errorMessage', 'A server error occurred!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $product = Product::find($id);

            $product->delete();


            return redirect()->route('products.index')
                ->with('success', 'Product deleted successfully.');
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->route('products.index')->with('errorMessage', 'Product can not be deleted, because it is containedinorders!');
}
    }
}
