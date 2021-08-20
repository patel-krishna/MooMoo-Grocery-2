<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php") ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php") ?>

<div class="col-10">
  <h1>Order List</h1>
  <a class="add-order" href="add-order.php">Add Order</a>
  <!-- Order List -->
  <table class="backstore-list">
    <tr class="backstore-table-header-row">
      <th class="backstore-table-header">Order</th>
      <th class="backstore-table-header">Date</th>
      <th class="backstore-table-header hide-mobile">Customer</th>
      <th class="backstore-table-header hide-mobile">Address</th>
      <th class="backstore-table-header hide-mobile-sm">Total</th>
      <th class="backstore-table-header" style="text-align: center;">Status</th>
      <th class="backstore-table-header" style="text-align: center;">Actions</th>
    </tr>
    <!-- // Dynamically display orders -->
    <?php display_orders() ?>
  </table>

  <div class="page-numbers-container">
    <div class="page-numbers">
      <a href="#">&laquo;</a>
      <a href="#" class="active">1</a>
      <a href="#">&raquo;</a>
    </div>
  </div>
</div>
</div>
</body>

</html>