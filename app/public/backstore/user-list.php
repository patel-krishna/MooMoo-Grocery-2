<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php"); ?>

<div class="col-10 backstore-body">
  <h1>User List</h1>
  <!-- Add user button -->
  <a class="add-user" href="user-edit.php">Add User</a>
  <table class="backstore-list">
    <tr class="backstore-table-header-row">
      <th class="backstore-table-header">User ID</th>
      <th class="backstore-table-header">Last Name</th>
      <th class="backstore-table-header">First Name</th>
      <th class="backstore-table-header hide-mobile">Email Address</th>
      <th class="backstore-table-header hide-mobile">Phone Number</th>
      <th class="backstore-table-header" style="text-align: center;">Actions</th>
    </tr>
    <?php display_users() ?>
  </table>

</div>
</div>
</body>

</html>
