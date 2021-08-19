<?php $current = basename($_SERVER['PHP_SELF']); ?>
<div class="row">
  <div class="col-2">
    <ul class="backstore-vertical-navbar">
      <li>
        <a class="navbar-item" href="../index.php">Front - Home</a>
      </li>
      <li>
        <a class="navbar-item <?php if($current == 'order-list.php') echo 'active'; ?>" href="order-list.php">Order List</a>
      </li>
      <ul>
        <li><a class="navbar-item <?php if($current == 'add-order.php') echo 'active'; ?>" href="add-order.php">Add Order</a></li>
      </ul>
      <li>
        <a class="navbar-item <?php if($current == 'product-list.php') echo 'active'; ?>" href="product-list.php">Product List</a>
      </li>
      <ul>
        <li>
          <a class="navbar-item <?php if($current == 'product-edit.php') echo 'active'; ?>" href="product-edit.php">Add Product</a>
        </li>
      </ul>
      <li>
        <a class="navbar-item <?php if($current == 'user-list.php') echo 'active'; ?>" href="user-list.php">User List</a>
      </li>
      <ul>
        <li>
          <a class="navbar-item <?php if($current == 'user-edit.php') echo 'active'; ?>" href="user-edit.php">Add User</a>
        </li>
      </ul>
    </ul>
  </div>
