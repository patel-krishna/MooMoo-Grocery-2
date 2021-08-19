<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php") ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php") ?>

<div class="col-10">
  <h1>Order List</h1>
  <a class="add-order" href="add-order.html">Add Order</a>
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
    <tr>
      <td>&#35;1001</td>
      <td>Jul 10, 2021</td>
      <td class="hide-mobile">Zachary Bruce</td>
      <td class="hide-mobile">
        <address>111 Bowen rd, Montreal, H3H 3H3, QC, Canada</address>
      </td>
      <td class="hide-mobile-sm">&#36;26.98</td>
      <td class="completed-order">Completed</td>
      <td><a class="edit-action" href="add-order.html">Edit</a> <a class="delete-action" href="#">Delete</a></td>
    </tr>
    <tr>
      <td>&#35;1002</td>
      <td>Jul 11, 2021</td>
      <td class="hide-mobile">Youngjae Kim</td>
      <td class="hide-mobile">
        <address>112 Grand ave, Montreal, H3Z 9H2, QC, Canada</address>
      </td>
      <td class="hide-mobile-sm">&#36;200.08</td>
      <td class="completed-order">Completed</td>
      <td><a class="edit-action" href="add-order.html">Edit</a> <a class="delete-action" href="#">Delete</a></td>
    </tr>
    <tr>
      <td>&#35;1003</td>
      <td>Jul 13, 2021</td>
      <td class="hide-mobile">Sephora Maltais</td>
      <td class="hide-mobile">
        <address>191 Bloom rd, Montreal, H3H 3H3, QC, Canada</address>
      </td>
      <td class="hide-mobile-sm">&#36;67.90</td>
      <td class="processing-order">Processing</td>
      <td><a class="edit-action" href="add-order.html">Edit</a> <a class="delete-action" href="#">Delete</a></td>
    </tr>
    <tr>
      <td>&#35;1004</td>
      <td>Jul 13, 2021</td>
      <td class="hide-mobile">John Lin</td>
      <td class="hide-mobile">
        <address>101 Bean rd, Montreal, H3H 3J3, QC, Canada</address>
      </td>
      <td class="hide-mobile-sm">&#36;72.92</td>
      <td class="processing-order">Processing</td>
      <td><a class="edit-action" href="add-order.html">Edit</a> <a class="delete-action" href="#">Delete</a></td>
    </tr>
    <tr>
      <td>&#35;1005</td>
      <td>Jul 15, 2021</td>
      <td class="hide-mobile">Krishna Patel</td>
      <td class="hide-mobile">
        <address>211 Aren rd, Montreal, H3P 3H8, QC, Canada</address>
      </td>
      <td class="hide-mobile-sm">&#36;157.80</td>
      <td class="completed-order">Completed</td>
      <td><a class="edit-action" href="add-order.html">Edit</a> <a class="delete-action" href="#">Delete</a></td>
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