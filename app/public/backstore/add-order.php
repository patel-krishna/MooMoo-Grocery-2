<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php"); ?>

<div class="col-8">
  <h1>Edit or Add an Order</h1>
  <h3>Specify, edit or add details to a specific order.</h3>
  <form class="properties" action="" method="post" enctype="text/plain">
    <div class="">
      <div class="col-6">
        <label for="first-name">Order ID:</label>
        <input class="properties-input" type="text" id="first-name" name="first-name" value="">
      </div>
      <div class="col-6">
        <label for="last-name">Customer ID:</label>
        <input class="properties-input" type="text" id="last-name" name="last-name" value="">
      </div>
    </div>
    <div class="prop-row">
      <div class="col-7">
        <label for="email-address">Customer's First Name:</label>
        <input class="properties-input" type="email" id="email-address" name="email-address" value="">
      </div>
      <div class="col-5">
        <label for="phone-number">Customer's Last Name:</label>
        <input class="properties-input" type="text" id="phone-number" name="phone-number" value="">
      </div>
    </div>

    <div class="col-10">
      <table class="backstore-list">
        <tr class="backstore-table-header-row">
          <th class="backstore-table-header">Product ID</th>
          <th class="backstore-table-header hide-mobile-o">Product Name</th>
          <th class="backstore-table-header">Quantity</th>
          <th class="backstore-table-header hide-mobile-o">Price</th>
          <th class="backstore-table-header">Action</th>
        </tr>
        <tr>
          <td>123456</td>
          <td class="hide-mobile-o">Pear</td>
          <td><input class="quantity-input" type="number" name="quantity" value=""></td>
          <td class="hide-mobile-o">$0.87</td>
          <td><a href="#">Delete</a></td>
        </tr>
        <tr>
          <td>123456</td>
          <td class="hide-mobile-o">Pear</td>
          <td><input class="quantity-input" type="number" name="quantity" value=""></td>
          <td class="hide-mobile-o">$0.87</td>
          <td><a href="#">Delete</a></td>
        </tr>
        <tr>
          <td>123456</td>
          <td class="hide-mobile-o">Pear</td>
          <td><input class="quantity-input" type="number" name="quantity" value=""></td>
          <td class="hide-mobile-o">$0.87</td>
          <td><a href="#">Delete</a></td>
        </tr>
        <tr>
          <td>123456</td>
          <td class="hide-mobile-o">Pear</td>
          <td><input class="quantity-input" type="number" name="quantity" value=""></td>
          <td class="hide-mobile-o">$0.87</td>
          <td><a href="#">Delete</a></td>
        </tr>
        <tr>
          <td>123456</td>
          <td class="hide-mobile-o">Pear</td>
          <td><input class="quantity-input" type="number" name="quantity" value=""></td>
          <td class="hide-mobile-o">$0.87</td>
          <td><a href="#">Delete</a></td>
        </tr>
        <tr>
          <td><input class="product-input" type="text" id="productID" name="productID" value=""></td>
          <td class="hide-mobile-o"><input class="product-input hide-mobile-o" type="text" id="productName"
              name="productName" value=""></td>
          <td><input class="quantity-input" type="number" id="quantity" name="quantity" value=""></td>
          <td class="hide-mobile-o"><input class="product-input hide-mobile-o" type="text" id="productPrice"
              name="productPrice" value=""></td>
          <td><a href="">Add Product</a></td>
        </tr>
      </table>
      <!-- Empty Column -->
    </div>

    <div class="col-12">
      <input class="save-button" type="submit" name="" value="Save Changes"></p>
    </div>

  </form>
</div>

</div>
</body>