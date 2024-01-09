@include('home.header');
  @if(session('message'))
    <div x-data="{not: true}" x-show="not" x-init="setTimeout(()=> not=false, 4000)" class="alert alert-danger">
        {{ session('message') }}
    </div>
    @endif
<div style="display:grid; place-items:center">
<div style="width: 80%; margin: 0 auto;  display:flex; flex-direction: column; gap:1rem; margin-bottom:5rem;">
  <div style="background-color: #b7b1b1; width:fit-content;">
    <img src="{{ asset('/storage/'. $product->image)}}" alt="img" width="350" >
  </div>
  <h4>{{$product->title}}</h4>
  <p>{{$product->description}}</p>
  @if($product->discount_price != null)
  <span  style="display:flex; align-items:center; gap:0.3rem; ">Price: <h5 style="text-decoration: line-through;">#{{$product->price}}</h5></span>
 <h5>Discount Sale: #{{$product->discount_price}}</h5>

    @else
    
  <h5>Discount Sale: #{{$product->price}}</h5>
 @endif
  <div>
     <form class="" action="{{url('add_cart', $product->id)}}" method="POST">
                
              
                  @csrf
              <input style="width: 55px; background-color: white;" type="number" min="1" value="1" name="quantity" placeholder="Qty" >

            
                <input type="submit"class="primary-btn"value="Add to cart">
            
                </form>
  
  </div>

</div>
</div>

@include('home.footer')';