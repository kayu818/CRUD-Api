<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productController extends Controller
{

    public function index() {
        return view('index', [
            'products' => product::get()
        ]);
    }
    

public function create(){
return view('create');
}
public function store(Request $request){

    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
    ]);
    

    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('products'), $imageName);
    
    $product = new product;
    $product->image = $imageName;
    $product->name = $request->name;
    $product->discription = $request->description;
    
    $product->save();
    return back()->withsuccess('product created!!!!  :)');
    
    }

    public function edit($id){
        $product = product::where('id',$id)->first();
        return view('edit',['product'=>$product]);
    }
public function update(request $request,$id){
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
    ]);
    $product = product::where('id',$id)->first();

    if(isset($request->image)){
        $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('products'), $imageName);
     $product->image = $imageName;
}

    
 
   
    $product->name = $request->name;
    $product->discription = $request->description;
    
    $product->save();
    return back()->withsuccess('Product Updated!!!!  :)');
    
}
public function destroy($id){
    $product=product::where ('id',$id)->first();
    $product->delete();
    return back()->withsuccess('Product Deleted!!!!  :)');
}

}

