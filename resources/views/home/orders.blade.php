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
                        <h4>Order</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>

                         <span>Orders</span>
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
      @if($orders->isEmpty())
      <div style="text-align:center;">
  <h4>No Order</h4>
      </div>
            <div class="row">
              
                <div class="col-lg-8">
                  @else
                    <div class="shopping__cart__table">
                   
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                   <th>Quantity</th>
                                   
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                           <?php $totalPrice = 0; ?>
                         @foreach($orders as $order)
                                <tr>
                               <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{asset('/storage/'. $order->image)}}" alt="cart_img">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h5>{{$order->product_title}}</h5>
          
                                        </div>
                                    </td>
                                <td class="cart__price" style="text-align: center;">
                    {{$order->quantity}}
                                    </td>
      
                                    <td class="cart__price">#{{$order->price}}</td>
                  
                                    <td class="cart__close">
      <form action="{{url('delete_orders', $order->id)}}" method="POST" class="class__close">
                   @csrf
                   @method('DELETE')                  <button onclick="return confirm('Are you sure you want to delete')" type="submit"><i class="fa fa-close"></i></button>
                    </form>                 </td>
                                </tr>
          <? $totalPrice = $totalPrice + $order->price ?>
                        @endforeach        

                                
                            </tbody>
                        </table>
                    </div>
                                        
                </div>
                <div class="col-lg-4 mt-5">
                    


                    <div class="cart__total" style='width:73%; margin:0 auto;'>
                        <h6>Order Total</h6>
                        <ul>

                            <li>Total <span>#{{$totalPrice}}</span></li>
                        </ul>

                    </div>
                </div>
            
            </div>
                  @endif
        </div>

    </section>.
 
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
 @include('home.footer');