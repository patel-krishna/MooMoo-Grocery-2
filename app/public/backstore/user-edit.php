<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php"); ?>

<div class="col-8">
  <h1>Edit User Info</h1>
  <h3>Modify all details of a user's account.</h3>
  <form class="properties" action="" method="post" enctype="text/plain">
    <div class="prop-row">
      <div class="col-4">
        <label for="first-name">First Name:</label>
        <input class="properties-input" type="text" id="first-name" name="first-name" value="">
      </div>
      <div class="col-4">
        <label for="middle-name">Middle Name:</label>
        <input class="properties-input" type="text" id="middle-name" name="middle-name" value="">
      </div>
      <div class="col-4">
        <label for="last-name">Last Name:</label>
        <input class="properties-input" type="text" id="last-name" name="last-name" value="">
      </div>
    </div>
    <div class="prop-row">
      <div class="col-7">
        <label for="email-address">Email Address:</label>
        <input class="properties-input" type="email" id="email-address" name="email-address" value="">
      </div>
      <div class="col-5">
        <label for="phone-number">Phone Number:</label>
        <input class="properties-input" type="text" id="phone-number" name="phone-number" value="">
      </div>
    </div>
    <div class="prop-row">
      <div class="col-10">
        <label for="street-address">Street Address:</label>
        <input class="properties-input" type="text" id="street-address" name="street-address" value="">
      </div>
      <div class="col-2">
        <label for="apartment">Apt:</label>
        <input class="properties-input" type="text" id="apartment" name="apartment" value="">
      </div>
    </div>
    <div class="prop-row">
      <div class="col-5">
        <label for="city">City:</label>
        <input class="properties-input" type="text" id="city" name="city" value="">
      </div>
      <div class="col-3">
        <label for="province">Province:</label>
        <select class="province-select properties-input" id="province" name="province">
          <option value="AB">AB</option>
          <option value="BC">BC</option>
          <option value="MB">MB</option>
          <option value="NB">NB</option>
          <option value="NL">NL</option>
          <option value="NS">NS</option>
          <option value="ON">ON</option>
          <option value="PE">PE</option>
          <option value="QC">QC</option>
          <option value="SK">SK</option>
        </select>
      </div>
      <div class="col-4">
        <label for="postal-code">Postal Code:</label>
        <input class="properties-input" type="text" id="postal-code" name="postal-code" value="">
      </div>
    </div>
    <div class="col-12">
      <label for="password">Current Password: </label>
      <input class="properties-input" type="password" id="password" name="password" value="">
    </div>
    <div class="col-12">
      <label for="new-password">New Password*: </label>
      <input class="properties-input" type="password" id="new-password" name="new-password" value="">
    </div>
    <div class="col-12">
      <label for="confirm-new-password">Confirm New Password*: </label>
      <input class="properties-input" type="password" id="confirm-new-password" name="confirm-new-password" value="">
    </div>
    <div class="prop-row">
      <div class="col-4">
        <label for="payment-method">Card Type:</label>
        <select class="properties-input" id="payment-method" name="payment-method">
          <option value="debit">Debit Card</option>
          <option value="credit">Credit Card</option>
          <option value="moomoo">MooMoo Card</option>
        </select>
      </div>
      <div class="col-6">
        <label for="card-number">Card Number:</label>
        <input class="properties-input" type="text" id="card-number" name="card-number" value="">
      </div>
      <div class="col-2">
        <label for="cvc">CVC:</label>
        <input class="properties-input" type="text" id="cvc" name="cvc" value="">
      </div>
    </div>
    <div class="col-12">
      <input class="save-button" type="submit" name="" value="Save Changes"></p>
      <p><em>*If you do not wish to modify these fields, leave them blank.</em><br>
    </div>
  </form>
</div>
<div class="col-2">
  <!-- Empty Column -->
</div>
</div>
</body>

</html>