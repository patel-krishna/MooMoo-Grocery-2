<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Metadata -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="P4 Shopping Cart" />

  <title>MooMoo Grocery | Cart</title>
  <link rel="icon" href="../images/icon-moo.png" />

  <!--Link Bootstrap 4 styling to document-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

  <!-- Link Google's Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

  <!-- Main styling sheet -->
  <link rel="stylesheet" type="text/css" href="css/styles-universal.css" />
  <link rel="stylesheet" type="text/css" href="css/styles-p3.css" />

  <!-- Cart styling sheet -->
  <link rel="stylesheet" type="text/css" href="css/p4-style.css" />


  <!-- JavaScript -->
  <script type="text/javaScript" src="js/product.js"></script>
  
  

</head>


<body class="d-flex flex-column min-vh-100" onload="updateSummary()">
      <!-- Header with menu -->
  <header class="container-fluid fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand" href="index.php"><img src="images/moomoologo.png" alt="MooMoo Grocery Logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarAisles" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Aisles
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarAisles">
              <a class="dropdown-item" href="aisles/produce.php">Produce</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="aisles/bakery.php">Bakery</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="aisles/meat.php">Meat and Poultry</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="aisles/dairy.php">Dairy and Eggs</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="aisles/beverages.php">Beverages</a>
            </div>
          </li>
          <li class="nav-item">
            <?php
              if (isset($_COOKIE["admin"]) || isset($_COOKIE["user"])) {
                echo '<a class="nav-link" href="sign-out.php">Sign Out</a>';
              } else {
                echo '<a class="nav-link" href="Login.php">Sign In</a>';
              }
            ?>
          </li>
          <li class="nav-item">
            <?php
              if (isset($_COOKIE["user"])) {
                echo '<a class="nav-link" id="register-link" href="SignUp.php" style="display: none">Register</a>';
              } else if (isset($_COOKIE["admin"])) {
                echo '<a class="nav-link" id="backstore-link" href="backstore/order-list.php" >Backstore</a>';
              } else {
                echo '<a class="nav-link" id="register-link" href="SignUp.php">Register</a>';
              }
            ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><span class="material-icons md-24">shopping_cart</span></a>
          </li>
        </ul>
      </div>
      <?php
          if (isset($_COOKIE["admin"])) {
            echo '<span class="nav-item text-primary">Hello, ' . $_COOKIE["admin"] . '</span>';
          } elseif (isset($_COOKIE["user"])) {
            echo '<span class="nav-item text-primary">Hello, ' . $_COOKIE["user"] . '</span>';
          } else {
            echo '';
          }
      ?>
    </nav>
  </header>
  <br>
  <br>
  <br>
  <br>
  <div id="wrapper">
    <div class="shopping-cart">
      <h2 class="title">Shopping Cart</h2>

     

       <?php

              if(!empty($_SESSION['cart'])){

                $product_ids = array();
                foreach($_SESSION['cart'] as $product_id=>$value){
                  array_push($product_ids, $product_id);
                }  

                foreach($product_ids as $ids){
                  $quantity=$_SESSION['cart'][$ids];
                   $xml = simplexml_load_file("../resources/data/products.xml") or die("Error: Cannot create object");
                   foreach($xml->children() as $aisle_categories){
                    foreach ($aisle_categories->children() as $aisle_section){
                      $aisle_name = $aisle_categories->getName();
                      foreach($aisle_section->children() as $product){
                        
                        if($ids == $product->id){
                          $sub_total = $quantity*$product->price;
                         
                          echo " <div class='product'>"; 
                           echo "<img class='product-picture' src='images/{$product->image}'> ";
                            echo "<div class='product-description'>";
                            echo "<h3 class='name'><a href='products/productDisplay.php?category={$aisle_name}&id={$ids}'>{$product->name}</a></h3>";
                            
                            echo "<h4>Price: $<span class='price'>{$product->price}</span></h4>";
                         
                            echo "<form class='updateQty' action='update-quantity.php?id={$product->id}' method='POST'>";
                          
                            echo "<p class='quantity'>
                            Quantity:
                            <input class='quantity q-in' type='number' min='1' id='$product->id' name='quantity' value='{$quantity}' />
                            <input type='submit' class='update-button' style='float:right display:flex; background-color:white; color:#3f3f3f;
                            cursor: pointer;
                            border-radius: 5px; margin-top:5px;' value='Update'>
                          </p>";
                            echo 
                            "<button class='remove' type='button' data-toggle='modal' data-target='#removeModal'> 
                            <a style='color:#cc0009; text-decoration:none;' href='remove-from-cart.php?removed={$ids}'>
                            Remove
                            </a>
                          </button>";
                         
                          echo "</form>";
                       
                          echo "</div>";
                            echo "</div>";
  

                            // Pop up for removed item 
                            //UPDATE: There seems to be an issue where whenever the modal is activated, it only activates the modal for the first product in the cart
                            //because of this i simply decided to take the modal off for simplicity, 
                            //i might work on this if i have time on sunday but for now the remove button will work without modal 
                          
                           /* echo "<div class='modal fade' id='removeModal' tabindex='-1' aria-labelledby='removeLabel' aria-hidden='true'>"; 
                            echo "<div class='modal-dialog'>";
                            echo  "<div class='modal-content'>";
                            echo   " <div class='modal-header'>";
                            echo      "<h5 class='modal-title' id='removeLabel'>Remove Item</h5>";
                            echo      "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                            echo      "  <span aria-hidden='true'>&times;</span>";
                            echo     " </button>"; 
                            echo   " </div>";
                            echo    "<div class='modal-body'>"; 
                            echo      "<p>Please confirm that you want to remove this item.</p>";
                            echo    "</div>";
                            echo    "<div class='modal-footer'>";
                            echo      "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
                            echo     " <button type='button' class='btn btn-primary'><a style='color:white; text-decoration:none;' href='remove-from-cart.php?removed={$ids}'>Confirm</a> </button>";
                            echo "</form>";
                            echo    "</div>";
                            echo  "</div>;";
                           echo  "</div>";
                          echo "</div>" ;    */

                        }  
                      }
                    }
                  }   
                }
                
               
              }else{
                echo " <div class='product'>"; 
                echo "<h3 class=''>Sorry, your cart is currently empty.</h3>";
                echo "</div>";
              }
             
              
       ?>
  </div>
            
  <div class="order-summary">
    <h2 class="title">Order Summary</h2>
    <div class="order">
      <p class="nb-products">Total number of items: <span id="num-items"></span></p>
      <p class="sub-total">
        Sub-Total: $<span id="subtotal-summary"></span>
      </p>
      <p class="GST">
        GST : $<span id="gst"></span>
      </p>
      <p class="QST">
        QST : $<span id="qst"></span>
      </p>
      <hr />

      <form action="checkout.php" method="POST" onsubmit="myFunction()" id="total-form">
      
        <h2 class="total">TOTAL COST: 
         <div id="test"> <span id="total"></span></div>
      </h2> 

      <input type="hidden"  name="total" id="totalHidden" value="not yet defined">
      <button class="checkout" type="submit">Checkout</button>

      <a href="index.php"><button class="back-to-shopping" type="button" >
          Back to shopping
        </button></a>

            </form>
    </div>
  </div>
  </div>
      
  <!-- JavaScript -->
  <script type="text/javaScript" src="js/cart.js"></script>


  <!-- sending order Javascript -->
  <script>
              // This function gets called once the user submits the form
          function myFunction(){

          // First get the value from the cronMDMtimer-span
          var total = document.getElementById('test').textContent;

          // Then store the extracted timerValue in a hidden form field
          document.getElementById("totalHidden").value = total; 

          // submit the form using it's ID "my-form"
          document.getElementById("total-form").submit();
          }


  </script>



  <!-- Optional JavaScript functionality -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
</body>

</html>

