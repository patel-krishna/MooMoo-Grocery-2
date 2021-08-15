<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta name="author" content="Krishna Patel 40176352" />
  <meta name="description" content="P4 Shopping Cart" />

  <title>MooMooGrocery Shopping Cart</title>
  <link rel="icon" href="images/icon-moo.png" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

  <!-- Include Google Icons/Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans&display=swap" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="css/styles-universal.css" />
  <link rel="stylesheet" type="text/css" href="css/styles-main.css" />
  <link rel="stylesheet" type="text/css" href="css/p4-style.css" />
</head>

<body onload="updateSummary()">
  <header>
    <a class="navbar-brand" href="index.html"><img src="images/moomoologo.png" alt="MooMoo Grocery Logo" /></a>
  </header>
  <div id="wrapper">
    <div class="shopping-cart">
      <h2 class="title">Shopping Cart</h2>
      <div class="product">
        <img class="product-picture" src=images/pear.jpg> <div class="product-description">
        <h3 class="name"><a href="products/pear.html">Pear</a></h3>
        <h4>Price: $<span class="price">0.87</span></h4>
        <p class="quantity">
            Quantity:
            <input class="quantity q-in" type="number" min="1" value="1" onchange="productSubtotal(0.87,this.value, 'subtotal1')"; />
          </p>
          <h5>Subtotal: $ <span class="subtotal" id="subtotal1">0.87</span></h5>
        <button class="remove" type="button" data-toggle="modal" data-target="#removeModal">
          Remove
        </button>
      </div>
    </div>

    <div class="product">
      <img class="product-picture" src=images/apple.jpg> <div class="product-description">
      <h3 class="name"><a href="products/apples.html">Apple</a></h3>
      <h4>Price: $<span class="price">0.79</span></h4>
      <p class="quantity">
        Quantity:
        <input class="quantity q-in" type="number" min="1" value="1" onchange="productSubtotal(0.79,this.value, 'subtotal2')"; />
      </p>
      <h5>Subtotal: $ <span class="subtotal" id="subtotal2">0.79</span></h5>
      <button class="remove" type="button" data-toggle="modal" data-target="#removeModal">
        Remove
      </button>
    </div>
  </div>

  <div class="product">
    <img class="product-picture" src=images/radish.jpg> <div class="product-description">
    <h3 class="name"><a href="products/radish.html">Radish</a></h3>
    <h4>Price: $<span class="price">0.79</span></h4>
    <p class="quantity">
      Quantity:
      <input class="quantity q-in" type="number" min="1" value="1" onchange="productSubtotal(0.79,this.value, 'subtotal3')"; />
    </p>
    <h5>Subtotal: $ <span class="subtotal" id="subtotal3">0.79</span></h5>
    <button class="remove" type="button" data-toggle="modal" data-target="#removeModal">
      Remove
    </button>
  </div>
  </div>
  
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
      <h3 class="total">TOTAL COST: $<span id="total"></span></h3>

      <a href="#"><button class="checkout" type="button">Checkout</button></a>

      <a href="index.html"><button class="back-to-shopping" type="button">
          Back to shopping
        </button></a>
    </div>
  </div>
  </div>
      <!-- Pop up for removed item -->
      <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="removeLabel">Remove Item</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Please confirm that you want to remove this item.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="remove-cart-btn">Confirm</button>
            </div>
          </div>
        </div>
      </div>
  <!-- JavaScript -->
  <script type="text/javaScript" src="js/cart.js"></script>

  <!-- Optional JavaScript functionality -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
</body>

</html>

