@include('home.header')
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                     </div>
              </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->


    <section class="product spad" id="section">
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
    
    <div class='pagination-links mb-4'>
       {{$products->links('vendor.pagination.custom-pagination')}}
    </div>




    <!-- Footer Section Begin -->
@include('home.footer')