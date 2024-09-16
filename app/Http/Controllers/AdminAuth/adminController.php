<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;
use Str;
use Auth;

class adminController extends Controller
{
    public function index(){
        dd('HERE');
        $isAdmin = Auth::user();

        if ($isAdmin && $isAdmin->is_admin) { 
            return view('/pages/Admin/Dashboard',['products'=>Product::get()]);
        }
        else{
            return redirect()->route('home');
        }
       
    
    }

    public function addProduct(){
        $isAdmin = Auth::user();
        if ($isAdmin && $isAdmin->is_admin) { 
        return view('/pages/Admin/addproduct');
    }
    else{
        return redirect()->route('home');
    }

}
    public function storeProduct(Request $request){
        $isAdmin = Auth::user();
        if ($isAdmin && $isAdmin->is_admin) {

        $validator = Validator::make($request->all(),[
            'product_title' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,webp,png,gif|max:1000',
            'product_description' => 'nullable',
            'price' => 'required',
            'stock' => 'required'
        ]);

        if( !$validator->fails()){
            $image = $request->file('image')->store('products', 'public');
        $product = new Product();
        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        $product->image = $image;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->save();
        return redirect()->route('admin.dashboard')->with('success', 'Product Added');

        }
        else{
            return back()->with(['error','All fields are Required']);
        }
       
    }
    else{
        return redirect()->route('home');   
    }
    }

    public function editProduct($id){
        $isAdmin = Auth::user();
        if ($isAdmin && $isAdmin->is_admin) {
        $product= Product::where('id',$id)->first();
        return view('/pages/Admin/edit-product',['product'=>$product]);
        }
        else{
            return redirect()->route('home');   
        }
}

    public function updateProduct(Request $request , $id){
        $isAdmin = Auth::user();
        if ($isAdmin && $isAdmin->is_admin) {
        $product = Product::find($id);
        if($product){
            $image = $request->file('image')->store('products', 'public');
        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        $product->image = $image;
        $product->price=$request->price;
        $product->stock=$request->stock;
            $product->save();
            return redirect()->route('admin.dashboard')->with('success', 'Product updated successfully!');
        }
        else{
            return back()->with(['error=>Product Not Found!']);
        }
    }
    else{
        return redirect()->route('home');   
    }
    }


    public function destroy($id){
        $isAdmin = Auth::user();
        if ($isAdmin && $isAdmin->is_admin) {

        $product = Product::find($id);
        if($product){
         $product->delete();
         return back()->withSuccess('The Product Was Deleted Successfully');
        }
        else{
         return back()->with(["error =>Product Not Found"]);
        }
    }
    else{
        return redirect()->route('home');   
    }
     }
}
