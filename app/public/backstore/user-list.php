<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php"); ?>

<div class="col-10">
  <h1>User List</h1>
  <h3>List of MooMoo Grocery user accounts.</h3>
  <table class="backstore-list">
    <tr class="backstore-table-header-row">
      <th class="backstore-table-header">User ID</th>
      <th class="backstore-table-header">Last Name</th>
      <th class="backstore-table-header">First Name</th>
      <th class="backstore-table-header hide-mobile">Email Address</th>
      <th class="backstore-table-header hide-mobile">Phone Number</th>
      <th class="backstore-table-header">Edit User</th>
      <th class="backstore-table-header">Delete User</th>
    </tr>
    <tr>
      <td>0001</td>
      <td>Bruce</td>
      <td>Zachary</td>
      <td class="hide-mobile">zackrbruce@gmail.com</td>
      <td class="hide-mobile">514 111-1111</td>
      <td><a class="edit-button" href="user-edit.html">Edit</a></td>
      <td><a href="#">Delete</a></td>
    </tr>
    <tr>
      <td>0002</td>
      <td>Kim</td>
      <td>Youngjae</td>
      <td class="hide-mobile">youngjae0719@gmail.com</td>
      <td class="hide-mobile">514 222-2222</td>
      <td><a class="edit-button" href="user-edit.html">Edit</a></td>
      <td><a href="#">Delete</a></td>
    </tr>
    <tr>
      <td>0003</td>
      <td>Maltais</td>
      <td>Sephora</td>
      <td class="hide-mobile">seph156@gmail.com</td>
      <td class="hide-mobile">514 333-3333</td>
      <td><a class="edit-button" href="user-edit.html">Edit</a></td>
      <td><a href="#">Delete</a></td>
    </tr>
    <tr>
      <td>0004</td>
      <td>Lin</td>
      <td>John</td>
      <td class="hide-mobile">john.lin@mail.concordia.ca</td>
      <td class="hide-mobile">514 444-4444</td>
      <td><a class="edit-button" href="user-edit.html">Edit</a></td>
      <td><a href="#">Delete</a></td>
    </tr>
    <tr>
      <td>0005</td>
      <td>Patel</td>
      <td>Krishna</td>
      <td class="hide-mobile">krishnaletap@gmail.com</td>
      <td class="hide-mobile">514 555-5555</td>
      <td><a class="edit-button" href="user-edit.html">Edit</a></td>
      <td><a href="#">Delete</a></td>
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
</div>
</body>

</html>