@include('home.header')

    @if(session('message'))
    <div x-data="{not: true}" x-show="not" x-init="setTimeout(()=> not=false, 4000)" class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4> Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>

                            <span> Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <!--  Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->

 <section class="shopping-cart spad">


     <div class="container">
                @if($carts->isEmpty())
      <div style="text-align:center;">
  <h4>Your Cart is Empty</h4>
      </div>

            <div class="row">
              
                <div class="col-lg-8">
                  @else
                    <div class="shopping__cart__table">
                   
                        <table>
                            <thead>
                                <tr>
                                    <th> Product</th>
                                   <th>Quantity</th>
                                   
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                           <?php $totalPrice = 0; ?>
                         @foreach($carts as $cart)
                                <tr>
                               <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{asset('/storage/'. $cart->image)}}" alt="cart_img">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h5>{{$cart->product_title}}</h5>
                <!--         <h5>
                           #{{$cart->price}}
                         </h5> -->              
                                        </div>
                                    </td>
                                <td class="cart__price" style="text-align: center;">
                    {{$cart->quantity}}
                                    </td>
      
                                    <td class="cart__price">#{{$cart->price}}</td>
                  
                                    <td class="cart__close">
      <form action="{{url('delete_cart', $cart->id)}}" method="POST" class="class__close">
                   @csrf
                   @method('DELETE')                  <button onclick="return confirm('Are you sure you want to delete')" type="submit"><i class="fa fa-close"></i></button>
                    </form>                 </td>
                                </tr>
          <? $totalPrice = $totalPrice + $cart->price ?>
                        @endforeach        

                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-5">
                    


                    <div class="cart__total" style="width:73%; margin:0 auto;">
                        <h6>Cart total</h6>
                        <ul>

                            <li>Total <span>#{{$totalPrice}}</span></li>
                        </ul>
    @if($totalPrice != 0)
                        <a href="{{url('cash_order')}}" class="primary-btn mb-3">Pay On Delivery</a>
                  <a href="{{url('stripe', $totalPrice)}}" class="primary-btn">Pay With Card</a>
                 @endif
                    </div>
                    
                </div>
            
            </div>
            @endif
        </div>
      
    </section>
 
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
 @include('home.footer');