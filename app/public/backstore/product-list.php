<?php require_once("../../resources/config.php"); ?>
<!-- Header -->
<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php"); ?>

<div class="col-10">
  <h1>Product List</h1>
  <!-- Add product button -->
  <a class="add-product" href="product-edit.php">Add Product</a>
  <!-- list of products -->
  <table class="backstore-list">
    <tr class="backstore-table-header-row">
      <th class="backstore-table-header">Serial Number</th>
      <th class="backstore-table-header">Product Name</th>
      <th class="backstore-table-header hide-mobile">Display Price</th>
      <th class="backstore-table-header hide-mobile">
        Current Inventory
      </th>
      <th class="backstore-table-header" style="text-align: center;">Actions</th>
    </tr>
    <!-- dynamically generate products from xml file -->
    <?php display_products() ?>
  </table>

  <!-- TODO: pagination -->
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