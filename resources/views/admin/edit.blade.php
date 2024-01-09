<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>HTML</title>
  
  <style>
  body{
    background:black;
  }
#wrapper{
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  color: #fff;
}

#wrapper .container {
  width: 80%;
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

form {
  display: grid;
  grid-gap: 10px;
}

label {
  font-weight: bold;
}

input[type="text"],
input[type="number"],
textarea,
button {
  width: calc(100% - 18px);
  padding: 8px;
  border: 1px solid #555;
  border-radius: 4px;
  background-color: #444;
  color: #fff;
  box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
}

textarea {
  resize: vertical;
}
.grid-item{
  background-color: transparent;
}
.grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 10px;
  
}

.quantity-input {
  display: flex;
  align-items: center;
}

.quantity-input button {
  padding: 5px 10px;
  border: none;
  background-color: #555;
  color: #fff;
  cursor: pointer;
}

.quantity-input button:hover {
  background-color: #777;
}

/* Media Queries for Responsiveness */

/* For smaller screens */
@media screen and (max-width: 600px) {
  .container {
    max-width: 90%; /* Adjust the width for smaller screens */
  }

  .grid {
    grid-template-columns: 1fr;
  }
}

  </style>
</head> 

<body> 

 <div class="content-wrapper" id="wrapper"> 
  <div class="container">
  <h2>Edit Product</h2>
  
  <form action="/update_product/{{$products->id}}" method="POST" enctype="multipart/form-data">
    
    @csrf
    @method('PATCH')
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{$products->title}}">

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" >{{$products->description}}</textarea>

    <div class="grid">
      <div class="grid-item">
        <label for="quantity">Quantity:</label>
        <div class="quantity-input">
          <button type="button" onclick="decrement('quantity')">-</button>
          <input type="number" id="quantity" name="quantity" min="0" step="1" value="{{$products->quantity}}">
          <button type="button" onclick="increment('quantity')">+</button>
        </div>
      </div>
      <div class="grid-item">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" min="0" step="0.01" value="{{$products->price}}">
      </div>
      <div class="grid-item">
        <label for="discountPrice">Discount Price:</label>
        <input type="number" id="discountPrice" name="discount_price" min="0" step="0.01" value="{{$products->discount_price}}">
      </div>
    </div>

    <label for="image">Image:</label>
    <input type="file" id="image" name="image" >

    <button type="submit">Submit</button>
  </form>
</div>
 </div>

<script>
  /* scripts.js */
function increment(inputId) {
  const input = document.getElementById(inputId);
  input.stepUp();
}

function decrement(inputId) {
  const input = document.getElementById(inputId);
  input.stepDown();
}
</script>
<body>
  
</html>