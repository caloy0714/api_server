<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductsController extends Controller
{
        public function allProducts(){
                $products = Product::all();
                return response()->json(['products'=>$products], 200);
}

        public function singleProduct($product_id){
                $products = Product::find($product_id);
                return response()->json(['products'=>$products],200);
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
                $product->title = $request->title;
                $product->description = $request->description;
                $product->currency = $request->currency; 
                $product->price = $request->price;
                $product->brand = $request->brand;
                $product->category = $request->category;
                $product->image = $request->image;
                $product->save();
                return response()->json();

        }

       public function updateProduct(Request $request, $product_id){
                $request->validate([
                        'title'=>'required',
                        'description'=>'required',
                        'currency'=>'required',
                        'price'=>'required',
                        'brand'=>'required',
                        'category'=>'required',
                        'image'=>'required'
                ]);
                $product= Product::find($product_id);
                $product->title = $request->title;
                $product->description = $request->description;
                $product->currency = $request->currency; 
                $product->price = $request->price;
                $product->brand = $request->brand;
                $product->category = $request->category;
                $product->image = $request->image;
 
                $product->update();
                return response()->json();

        }

        public function deleteProduct($product_id){
                $product = Product::find($product_id);
                $product->delete();
        }
}

