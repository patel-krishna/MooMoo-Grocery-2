<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php") ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php") ?>

<div class="col-10 backstore-body">
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

</div>
</div>
</body>

</html>
