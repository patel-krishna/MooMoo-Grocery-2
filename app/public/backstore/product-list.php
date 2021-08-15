<?php require_once("../../resources/config.php"); ?>
<!-- Header -->
<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php"); ?>

<div class="col-10">
  <h1>Product List</h1>
  <h3>Inventory</h3>
  <!-- Add product button -->
  <a class="add-product" href="product-edit.html">Add Product</a>
  <table class="backstore-list">
    <tr class="backstore-table-header-row">
      <th class="backstore-table-header">Serial Number</th>
      <th class="backstore-table-header">Product Name</th>
      <th class="backstore-table-header hide-mobile">Display Price</th>
      <th class="backstore-table-header hide-mobile">
        Current Inventory
      </th>
      <th class="backstore-table-header">Edit</th>
      <th class="backstore-table-header hide-mobile">Delete</th>
    </tr>
    <tr>
      <td>0000</td>
      <td>Baguette</td>
      <td class="hide-mobile">$2.99</td>
      <td class="hide-mobile">90</td>
      <td>
        <a class="edit-button" href="product-edit.html">Edit</a>
      </td>
      <td><a class="hide-mobile" href="#">Delete</a></td>
    </tr>
    <tr>
      <td>0001</td>
      <td>Multigrain Sliced Bread</td>
      <td class="hide-mobile">$3.99</td>
      <td class="hide-mobile">57</td>
      <td>
        <a class="edit-button" href="product-edit.html">Edit</a>
      </td>
      <td><a class="hide-mobile" href="#">Delete</a></td>
    </tr>
    <tr>
      <td>0002</td>
      <td>Sourdough Loaf</td>
      <td class="hide-mobile">$4.99</td>
      <td class="hide-mobile">32</td>
      <td>
        <a class="edit-button" href="product-edit.html">Edit</a>
      </td>
      <td><a class="hide-mobile" href="#">Delete</a></td>
    </tr>
    <tr>
      <td>0003</td>
      <td>Doughnuts</td>
      <td class="hide-mobile">$5.99</td>
      <td class="hide-mobile">11</td>
      <td>
        <a class="edit-button" href="product-edit.html">Edit</a>
      </td>
      <td><a class="hide-mobile" href="#">Delete</a></td>
    </tr>
    <tr>
      <td>0004</td>
      <td>Croissants, Half-Dozen</td>
      <td class="hide-mobile">$5.99</td>
      <td class="hide-mobile">7</td>
      <td>
        <a class="edit-button" href="product-edit.html">Edit</a>
      </td>
      <td><a class="hide-mobile" href="#">Delete</a></td>
    </tr>
  </table>

  <div class="page-numbers-container">
    <div class="page-numbers">
      <a href="#">&laquo;</a>
      <a href="#" class="active">1</a>
      <a href="#">&raquo;</a>
    </div>
  </div>
</div>

<div class="col-2">
  <!-- Nothing here yet... -->
</div>
</div>
</body>

</html>