<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Products;


class ProductsController extends Controller
{
    public function getAllProducts(){
        $products=Product::all;
        return response()->json(['products'=>$products], 200);
}

        public function addProduct(Request $request){
                $request->validate([
                        'title'=>'required',
                        'description'=>'required',
                        'currency'=>'required',
                        'price'=>'required',
                        'brand'=>'required',
                        'category'=>'required',
                        'image'=>'required'
                ]);

                $product= new Product;
                $product->title =$request->title;
                $product->description =$request->description;
                $product->currency =$request->currency; 
                $product->price =$request->price;
                $product->brand =$request->brand;
                $product->category =$request->category;
                $product->image =$request->image;

                $product->save();
                return response->json(200);

        }
}

