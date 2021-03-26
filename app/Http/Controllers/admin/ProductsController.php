<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
   
    public function index()
    {
       $products = Product::all();
       return view('admin.products.index', compact('products'));
    }

    public function create()
    {   $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {   
        $request->validate(
            [
                'name'=>'required',
                'category_id'=>'required'
            ]
        );

        $imageNameWithPath="";
        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = $request->name.'.'.$extension;
            $imageNameWithPath = 'products/'.$imageName;
            $upload = $request->file('image')->storeAs('public/products', $imageName);
        }
        Product::create([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'image'=>$imageNameWithPath,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'short_description'=>$request->short_description,
            'description'=>$request->description
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $imageNameWithPath="";
        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = $request->name.'.'.$extension;
            $imageNameWithPath = 'products/'.$imageName;
            $upload = $request->file('image')->storeAs('public/products', $imageName);
        }

        $products = Product::find($id);
        
        
        $products->category_id = $request->category_id;
        $products->name = $request->name;
        $products->slug = Str::slug($request->name);
        if($imageNameWithPath){
            \Storage::delete('public/'.$products->image);
            $products->image = $imageNameWithPath;
        }
        $products->price =$request->price;
        $products->quantity = $request->quantity;
        $products->short_description = $request->short_description;
        $products->description = $request->description;
        $products->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
