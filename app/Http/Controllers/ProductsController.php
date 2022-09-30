<?php

namespace App\Http\Controllers;
require "vendor/autoload.php";
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function getAllProducts(){
        $client = new Client([
                'base_uri' => 'http://127.0.0.1:8000/'
        ]);
        $response = $client->get('http://127.0.0.1:8000/products');
        $code = $response->getStatusCode();
        $body = $response->getBody();
        $products=json_decode($body)->products;
        var_dump($products);
        }
}

