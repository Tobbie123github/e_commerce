<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" type="text/css">
    
    <style>
      
      /* Base styles for larger screens */
      #section{
        width:100%;
        text-align: center;
      }
      #container{
        width:80%;
        margin:0 auto;
        display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1.5rem;
      }
#product{
  border:1px solid grey;
  overflow:hidden;
  border-radius:1.2rem 0 1.2rem 0;
}
.product {
    
    padding: 10px;
    transition: transform 0.3s ease-in-out;
}

.product:hover {
    transform: scale(1.01);
}

.product img {
    width: 90%;
    height: auto;
}

.product-details {
    text-align: center;
    
}

/* Additional styling for product name, price, and discount */
.product-name {
    margin-top: 10px;
    font-size: 1.2em;
    color: #333;
}

.product-price,
.product-discount-price {
    font-size: 1em;
    margin-bottom: 5px;
}
.product-price{
  color:blue;
}
.product-discount-price{
  color:green;
}



@media screen and (max-width: 768px) {
    #container{
      width:90%;
      margin:0 auto;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
    }
}

      
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <!--Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__link">
              
              @auth
              <div style="display:flex; justify-content:center; align-items:center;">
               <a  style="color:black;">{{ Auth::user()->name }}</a>
                                       <form method="POST" action="{{ route('logout') }}">
                                
                            @csrf
                <input type="submit" value="Logout"
                   style="color:black; margin-left:1rem; border:0; background: transparent;"                >
                       
                  </form>
                  </div>
               @else
                <a href="{{ route('login')}}" style="color:black;">Sign in</a>
                <a href="{{ route('register')}}" style="color:black; margin-left:1rem;">Sign up </a>
                @endauth
 
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span></span></a>
        
       


        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
  
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
            
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links" >
                            @auth
         <div style="display:flex; justify-content:center; align-items:center;">
               <a  style="color:white;">{{ Auth::user()->name }}</a>
                                       <form method="POST" action="{{ route('logout') }}">
                                
                            @csrf
                <input type="submit" value="Logout"
                   style="color:white; margin-left:1rem; border:0; background: transparent;"                >
                       
                  </form>
                  </div>

               @else
                <a href="{{ route('login')}}">Sign in</a>
                  @if (Route::has('register'))
                <a href="{{ route('register')}}">Sign up</a>
                @endif
                @endauth

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="/"><img src="img/logo.png" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="/">Home</a></li>

                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="#">About Us</a></li>
                     <li><a href="#">Contacts</a></li>

                                </ul>
                            </li>
                            <li><a href="{{url('shop')}}">Shop</a></li>
                            <li><a href="{{url('user_orders')}}">Orders</a></li>
                                          <li><a href="{{url('show_cart')}}"> Cart
                           </a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                        <a href="#"><img src="img/icon/cart.png" alt=""> <span></span></a>
                 
 
                        </div>
                        

                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
        
    </header>