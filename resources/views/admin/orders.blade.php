   <!--SIde bar -->
   @include('admin.sidebar');
      <!-- partial -->
   @include('admin.header');
        <!-- partial -->
        
        
        
 <div class="main-panel">
     <div class="content-wrapper" id="wrap">
    @if(session('message'))
    <div x-data="{not: true}" x-show="not" x-init="setTimeout(()=> not=false, 4000)" class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

<table class="responsive-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Title</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Image</th>
        <th>Payment Status</th>
        <th>Delivery Status</th>
        <th>Delivered</th>
        <th>Print</th>
      </tr>
    </thead>
    <tbody>
   
   @foreach($orders as $order)
      <tr>
        <td data-label='Name'>
          {{$order->name}}
        </td>
        
        <td data-label='Email'>
          {{$order->email}}
        </td>
        <td data-label='Address'>
          {{$order->address}}
        </td>
        <td data-label='Title'>
          {{$order->product_title}}
        </td>
        <td data-label='Quantity'>
          {{$order->quantity}}
        </td>
        <td data-label='Price'>
          {{$order->price}}
        </td>
        <td data-label='Image'>
         <img src="{{asset('storage/'. $order->image)}}" alt="Product 1 Image" width="50">
        </td>
        <td data-label='Payment Status'>
          {{$order->payment_status}}
        </td>
        <td data-label='Delivery Status'>
          {{$order->delivery_status}}
        </td>
        <td data-label="Deliver">
          @if($order->delivery_status == 'delivered')
          <p>Delivered</p>
          @else
          <form action="{{url('delivered', $order->id)}}"method="POST">
            @csrf
            <input type="submit" >
          </form>
         @endif
        </td>
        <td data-label='Print'>
          <a href="{{ url('print_pdf', $order->id)}}">Print</a>
        </td>
        
     

      </tr>
      @endforeach
       
      <!-- Add more rows as needed -->
    </tbody>
  </table>
      
        </div>
    
 
         
         
         
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
@include('admin.footer');
