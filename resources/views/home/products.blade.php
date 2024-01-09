    <section class="product spad" id="section">
      <h3 style='margin-bottom:3rem;'> Best Seller</h3>
        <div class="container" id='container'>
          
      @foreach($products as $product)
          
   <div class="products">
    <div class="product" id="product">
      <a href="{{url('preview_product', $product->id)}}">
        <img src="{{ asset('/storage/'. $product->image) }}" alt="Product" class="product-image">
        </a>
        <div class="product-details">
            <h3 class="product-name">{{$product->title}}</h3>
         @if($product->discount_price != null)
        <p class="product-price" style='text-decoration: line-through'>Price: #{{$product->price}}</p>
        
        <p class="product-discount-price">Discount Sale: #{{$product->discount_price}}</p>
        @else
      <p class="product-price">Price: #{{$product->price}}</p>
        @endif
            
            
          
        </div>
    </div>
    <!-- Add more products similarly -->
</div>
@endforeach
    </div>
    </section>