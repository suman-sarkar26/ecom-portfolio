<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\JsonResponse;


class OrderController extends Controller
{
    public function Order(Request $request){
        
        try{
            $order = Order::create([
                'product_id'=>$request->product_id,
                'customer_name'=>$request->shipping_info['customer_name'],
                'customer_phone'=>$request->shipping_info['customer_phone'],
                'quantity'=>$request->product_quantity,
                'grand_total'=>$request->grand_total
            ]);
            
            $product = Product::find($request->product_id);
            $product->quantity = $product->quantity - $request->product_quantity;
            $product->update();


            return response()->json([
                'success'=>true,
                'message'=>'Order Created'
            ], JsonResponse::HTTP_CREATED);

        }catch(\Exception $e){
            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage()
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);

        }
    }
}
