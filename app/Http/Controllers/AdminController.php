<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use PDF;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    public function addProducts(){
      return view('admin.addProducts');
    }
    public function viewProducts(){
      $products = Product::latest()->get();
      return view('admin.viewProducts', compact('products'));
    }
    
    public function store(Request $request){
      
      $product = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'quantity' => 'required',
        'price' => 'required',
        'discount_price' => 'nullable',
        'image' =>'required|image',
        
    ]);
 
  
        if($request->hasFile('image')){        $product['image'] = $request->file('image')->store('images', 'public');
  }
  
      Product::create($product);
     
       return redirect('/viewProducts')->with('message', 'Product Added Successfully');
  
    }
    
    public function edit($id){
      $products = Product::find($id);
      return view('admin.edit', compact('products'));
    }
    
    
    
    
   public function destroy($id){
  $product= Product::find($id);
  if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }
    
 
    $product->delete();
    return redirect()->back()->with('message', 'Product Deleted Successfully');
    
   }
    
    
    
    
    public function update(Request $request, $id){
   
   $product = Product::find($id);
    $validate = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'quantity' => 'required',
        'price' => 'required',
        'discount_price' => 'nullable',
   
        
    ]);
$product->title = $validate['title'];
    $product->description = $validate['description'];
$product->quantity = $validate['quantity'];
 $product->price = $validate['price'];
 $product->discount_price = $validate['discount_price'];
 
    
if ($request->hasFile('image')) {
        // Delete existing image from storage if it exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Store the new uploaded image
        $imagePath = $request->file('image')->store('images', 'public');
        $product->image = $imagePath;
    }
   
  
         $product->save();
      return redirect('/viewProducts')->with('message', 'Product Updated successfully');
}

  public function orders(){
    $orders = Order::all();
    return view('admin.orders')->with([
      'orders' => $orders,
      ]);
  }

public function delivered($id){
  $order= Order::find($id);
  $order->delivery_status ="delivered";
  if($order->payment_status == 'cash on delivery'){
    $order->payment_status = 'paid';
  }
  $order->save();
  return redirect()->back()->with('message', 'Order Delivered');
}

public function print_pdf($id){
  $order = Order::find($id);
  $pdf = PDF::loadView('admin.pdf', compact('order'));
  
  return $pdf->download('order_details.pdf');
  
}





}
