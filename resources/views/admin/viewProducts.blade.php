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
        <th>Description</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Image</th>
        <th>Discount Price</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td data-label="Name">{{$product->title}}</td>
        <td data-label="Description">{{$product->description}}</td>
        <td data-label="Quantity">{{$product->quantity}}</td>
        <td data-label="Price"><span>#</span>{{$product->price}}</td>
        <td data-label="Image"><img src="{{asset('storage/'. $product->image)}}" alt="Product 1 Image" ></td>
        <td data-label="Discount Price"><span>#</span>{{$product->discount_price}}</td>
        <td data-label="Edit"><a href="{{url('edit_product', $product->id)}}">Edit</a></td>

        <td data-label="Delete">
        <form action="/delete/{{$product->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Are you sure you want to delete')" style="background-color: red; width:fit-content;">
                  Delete
                   </button>
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