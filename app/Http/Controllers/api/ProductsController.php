<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function getAll(){
        $products = Product::all()->toArray();
        $newProducts = [];
        foreach($products as $product){
            $product['image'] = "http://127.0.0.1:8000/storage/".$product['image'];
            $newProducts[] = $product;
        }
        $response = [
            'success' =>true,
            'code' =>200,
            'result' =>$newProducts
        ];

        return response()->json($response);
    }

    public function singleProduct(Request $request){
        $productSlug = $request->slug;
        $product = Product::where('slug', '=', $productSlug)->get()->toArray();
        $singleProduct = $product[0];
        $singleProduct['image'] = "http://127.0.0.1:8000/storage/ ".$singleProduct['image'];      

        $response = [
            'success' =>true,
            'code' => 200,
            'result' => $singleProduct
        ];

        return response()->json($response);
    }
}
