<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;
class HomeController extends Controller
{
  
    public function index(){
    $products = Product::latest()->take(6)->get();
   
    
    
     
     return view('home.home', compact('products'));
    }
   
      
   
    
  
    
    public function redirect(){
      $products = Product::latest()->take(6)->get();
      $user = Auth::user();

      if($user){
        $usertype = $user->usertype;
      
      if($usertype==="1"){
        return view('admin.admin', compact('users'));
        }else{
       
        return view('home.home', compact('products'));
      }
       
}
    }   
    
    public function preview($id){
   // I NEVER DO
   $product= Product::find($id);
   
      return view('home.preview', compact('product'));
    }
    public function show_cart(){
      $id = Auth::user()->id;
      $carts = Cart::where('user_id', '=', $id)->get();
//       $totalPrice = $carts->sum('price');
  
   // $totalPrice = Cart::where('user_id', '=', $id)->sum('price');   
   
      return view('home.cart')->with(['carts' => $carts,
      ]);
    }
    
public function add_cart(Request $request, $id) {

    $user = Auth::user();
   $userId = $user->id;
    $product = Product::find($id);
    //if user select thesame product to the cart
  $product_exist_id = Cart::where('product_id', '=', $id)->where('user_id', "=", $userId)->get('id')->first();
   if($product_exist_id){
     $cart = Cart::find($product_exist_id)->first();
  
   $quantity = $cart->quantity;
 
   $cart->quantity = $quantity + $request->quantity;
if ($product->discount_price != null) {
        $cart->price = $product->discount_price * $request->quantity;
    } else {
        $cart->price = $product->price * $request->quantity;
    }

   if ($request->quantity > $product->quantity) {
        return redirect()->back()->with('message', 'Product quantity exceeds available stock');
  }
   $cart->save();
   
   return redirect('/show_cart')->with('message', 'Product updated to Cart successfully');
   
   
   
     
   }else{
     $cart = new Cart;
    $cart->name = $user->name;
    $cart->email = $user->email;
    $cart->phone = $user->phone;
    $cart->address = $user->address;
    $cart->product_title = $product->title;

    if ($product->discount_price != null) {
        $cart->price = $product->discount_price * $request->quantity;
    } else {
        $cart->price = $product->price * $request->quantity;
    }

    if ($request->quantity > $product->quantity) {
        return redirect()->back()->with('message', 'Product quantity exceeds available stock');
    }

    $cart->quantity = $request->quantity;
    $cart->image = $product->image;
    $cart->product_id = $product->id;
    $cart->user_id = $user->id;

    $cart->save();

    return redirect('/show_cart')->with('message', 'Product added to Cart successfully');
     
   }

    $cart = new Cart;
    $cart->name = $user->name;
    $cart->email = $user->email;
    $cart->phone = $user->phone;
    $cart->address = $user->address;
    $cart->product_title = $product->title;

    if ($product->discount_price != null) {
        $cart->price = $product->discount_price * $request->quantity;
    } else {
        $cart->price = $product->price * $request->quantity;
    }

    if ($request->quantity > $product->quantity) {
        return redirect()->back()->with('message', 'Product quantity exceeds available stock');
    }

    $cart->quantity = $request->quantity;
    $cart->image = $product->image;
    $cart->product_id = $product->id;
    $cart->user_id = $user->id;

    $cart->save();

    return redirect('/show_cart')->with('message', 'Product added to Cart successfully');
}

  
  
  public function delete_cart($id){
    $cart = Cart::find($id);
    if($cart){
      $cart->delete();
    return redirect()->back()->with('message', 'Product deleted from Cart successfully');
    }else{
    return redirect()->back()->with('message', 'Item not Found');
    }
  }
  
  
  
  // ORDER
  public function cash_order() {
    $user= Auth::user();
    $userId = $user->id;
    
    $data= Cart::where('user_id', '=', $userId)->get();
    foreach($data as $data){
    $order= new Order;
    $order->name = $data->name;
    $order->email = $data->email;
    $order->phone = $data->phone;
    $order->address = $data->address;
    $order->user_id = $data->user_id;
    
    
    $order->product_title = $data->product_title;
    $order->price = $data->price;
    $order->quantity = $data->quantity;
    $order->image = $data->image;
    $order->product_id = $data->product_id;

    $order->payment_status = 'cash on delivery';
    $order->delivery_status= 'processing';
    $order->save();
    
    $cart_id = $data->id;
    $cart = Cart::find($cart_id);
    $cart->delete();

    }
    
  
    return redirect()->back()->with('message', 'Order Placed Successfully, We will connect with you soon');
  }
  
  
  
  // CARD PAYMENT (STRIPE)
  public function stripe($totalPrice){
    
    
    return view('home.stripe', compact('totalPrice'));
  }
    
    
  public function stripePost(Request $request, $totalPrice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalPrice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment" 
        ]);
      $user= Auth::user();
    $userId = $user->id;
    
    $data= Cart::where('user_id', '=', $userId)->get();
    foreach($data as $data){
    $order= new Order;
    $order->name = $data->name;
    $order->email = $data->email;
    $order->phone = $data->phone;
    $order->address = $data->address;
    $order->user_id = $data->user_id;
    
    
    $order->product_title = $data->product_title;
    $order->price = $data->price;
    $order->quantity = $data->quantity;
    $order->image = $data->image;
    $order->product_id = $data->product_id;

    $order->payment_status = 'paid';
    $order->delivery_status= 'processing';
    $order->save();
    
    $cart_id = $data->id;
    $cart = Cart::find($cart_id);
    $cart->delete();
    
    
    
    }
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
    
    public function shop(){
      $products = Product::orderBy('created_at', 'desc')->paginate(6);
      return view('home.shop')->with([
        'products'=> $products,
        ]);
    }
    
 public function user_orders()  {
   $user = Auth::user();
   $userId = $user->id;
   $orders = Order::where('user_id', '=', $userId)->get();
   
   
   return view('home.orders', compact('orders'));
 }
  
  
   public function delete_orders($id){
   $order = Order::find($id);
   if($order){
      $order->delete();
    return redirect()->back()->with('message', 'Order deleted Successfully');
    }else{
    return redirect()->back()->with('message', 'Item not Found');
    }
   
   


 }
  
    
    
}
