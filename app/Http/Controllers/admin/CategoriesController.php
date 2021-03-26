<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
     }

     public function store(Request  $request){
        $request->validate(
             ['name' => 'required']
         );
       try{
        Category::create(
            [
                'name'=>$request->name,
                'slug'=>Str::slug($request->name)
            ]
            );
            return redirect()->back()->with('success', 'Category Created Successfully');
       }catch(\Exception $e){
           \Log::error($e->getMessage());
           return  redirect()->back()->with('error', 'Oops!! Something went worng');
       }
     }

     public function edit(int $id){
         $category = Category::find($id);
         return view('admin.categories.edit', compact('category'));
         
     }

     public function update(Request $request, $id){
         $request->validate([
            'name' => 'required'
         ]);
       try{
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->update();
        return redirect()->back()->with('success', 'Category Updated Successfully.');
       }catch(\Exception $e){
           \Log::error($e->getMessage());
           return redirect()->back()->with('error', 'OOps!!! Something Went Wrong.');
       }
     }

     public function destroy($id){
         try{
            $category = Category::find($id);
            $category->delete();
            return redirect()->back()->with('success','Category Deleted.');
         }catch(\Exception $e){
             \Log::error($e->getMessage);
             return redirect()->back()->with('error','OOps!! Something Went Wrong. Please Try Again.');
         }
     }

     public function show($id)
    {
        //
    }
}
