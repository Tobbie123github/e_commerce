<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="aseets/css/main.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
/* styles.css */

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
    grid-template/-columns: 1fr;
  }
}


 #wrap{
  font-family: Arial, sans-serif;
  background-color: #000;
  color: #fff;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
  table-layout: fixed; /* Ensures uniform cell width */
}

th, td {
  border: 1px solid #fff;
  padding: 8px;
  text-align: left;
  overflow-wrap: break-word; /* Allows long words to break and wrap */
  word-wrap: break-word; /* Alternative for older browsers */
}





 table thead tr {
  background-color: #B81CAF;
}

td img{
  max-width: 100%;
 max-height:auto;
 width:auto;
 height:auto;
}
/* Edit and Delete button styling */
td[data-label="Print"] a {
  display: inline-block;
  padding: 5px 10px;
  background-color: orange;
  color: white;
  text-decoration: none;
  border-radius: 5px;
}
td[data-label="Deliver"] input {
  display: inline-block;
  padding: 5px 10px;
  background-color: #0f496c
  color: white;
  text-decoration: none;
  border-radius: 5px;
}


td[data-label="Edit"] a {
  display: inline-block;
  padding: 5px 10px;
  background-color: green;
  color: white;
  text-decoration: none;
  border-radius: 5px;
}
td[data-label="Delete"] a {
  display: inline-block;
  padding: 5px 10px;
  background-color: red;
  color: white;
  text-decoration: none;
  border-radius: 5px;
}

/* Adjustments for smaller screens */
@media screen and (max-width: 600px) {
  table, thead, tbody, th, td, tr {
    display: block;
  }
  
  thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
  
  tr {
    border:1px solid #B81CAF;
    border-radius:1rem 0px 1rem 0px;
    margin-bottom: 20px;
  }
  
  td {
    border: none;
    position: relative;
    padding-left: 50%;
  }
  
  td:before {
    position: absolute;
    top: 6px;
    left: 6px;
    width: 45%;
    padding-right: 10px;
    white-space: nowrap;
    content: attr(data-label);
    font-weight: bold;
  }
}

    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href=""><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href=""><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  
                  <h5 class="mb-0 font-weight-normal">Tobi</h5>
                  <span>Gold Member</span>
                  
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('/redirect') }}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/addProducts') }}">Add Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/viewProducts') }}">View Products</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('orders')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Orders</span>
            </a>
          </li>

        </ul>
      </nav>