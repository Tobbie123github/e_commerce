   <!--SIde bar -->
   @include('admin.sidebar');
      <!-- partial -->
   @include('admin.header');
        <!-- partial -->

  
  <div class="main-panel" id="panel">
     <div class="content-wrapper" id="wrapper"> 
<div class="container">
  <h2>Add Product</h2>
  
  <form action="{{ route('add_product')}}" method="POST" enctype="multipart/form-data">
    
    @csrf
    <label for="title">Title:</label>
    <input type="text" id="title" name="title">

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" ></textarea>

    <div class="grid">
      <div class="grid-item">
        <label for="quantity">Quantity:</label>
        <div class="quantity-input">
          <button type="button" onclick="decrement('quantity')">-</button>
          <input type="number" id="quantity" name="quantity" min="0" step="1" value="0" >
          <button type="button" onclick="increment('quantity')">+</button>
        </div>
      </div>
      <div class="grid-item">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" min="0" step="0.01">
      </div>
      <div class="grid-item">
        <label for="discountPrice">Discount Price:</label>
        <input type="number" id="discountPrice" name="discount_price" min="0" step="0.01">
      </div>
    </div>

    <label for="image">Image:</label>
    <input type="file" id="image" name="image" >

    <button type="submit">Submit</button>
  </form>
</div>
 </div>
 
         
         
         
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

@include('admin.footer');