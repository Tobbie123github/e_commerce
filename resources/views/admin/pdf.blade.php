<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Print</title>
  
  <!-- HTML -->
  

  <!-- Custom Styles -->
  <link rel="stylesheet" href="style.css">
  <!-- Add Font Awesome CDN in your HTML head -->


</head>

<body>
  <h1>Order Details</h1>
 <div>
   <h3>Customer Name</h3>
   <p>{{$order->name}}</p>
 </div>
 
  <div>
   <h3>Customer Email</h3>
   <p>{{$order->email}}</p>
 </div>
 
 
  <div>
   <h3>Customer Phone</h3>
   @if($order->phone == null)
   <p>No phone number</p>
   @else
   <p>{{$order->phone}}</p>
   @endif
 </div>
 
 
 
 
  <div>
   <h3>Customer Address</h3>
   @if($order->address == null)
   <p>No address</p>
   @else
   <p>{{$order->address}}</p>
   @endif
 </div>
 
 
  <div>
   <h3>Customer ID</h3>
   <p>{{$order->user_id}}</p>
 </div>
 
 
 <div>
   <h3>Product ID</h3>
   <p>{{$order->product_id}}</p>
 </div>
 
 <div>
   <h3>Product Name</h3>
   <p>{{$order->product_title}}</p>
 </div>
 
 
  <div>
   <h3>Product Price</h3>
   <p>#{{$order->price}}</p>
 </div>
 
  <div>
   <h3>Product Quantity</h3>
   <p>{{$order->quantity}}</p>
 </div>
 
 
  <div>
   <h3>Payment Status</h3>
   <p>{{$order->payment_status}}</p>
 </div>
 
 
  <div>
   <h3>Delivery Status</h3>
   <p>{{$order->delivery_status}}</p>
 </div>
 

  



</body>
</html>