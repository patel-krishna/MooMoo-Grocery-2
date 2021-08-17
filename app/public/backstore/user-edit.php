<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php"); ?>

<?php
  if(isset($_GET['id'])) {
    $user_id = htmlspecialchars($_GET["id"]);
    $user = getUserXml($user_id);
  }
?>

<div class="col-8">
  <h1>Edit User Info</h1>
  <h3>Modify all details of a user's account.</h3>
  <form class="properties" action="added-user.php" method="POST">
    <div class="prop-row">
      <div class="col-4">
        <label for="first-name">First Name:</label>
        <input class="properties-input" type="text" id="first-name" name="first-name" value="<?php echo $user->firstname; ?>">
      </div>
      <div class="col-4">
        <label for="middle-name">Middle Name:</label>
        <input class="properties-input" type="text" id="middle-name" name="middle-name" value="<?php echo $user->middlename; ?>">
      </div>
      <div class="col-4">
        <label for="last-name">Last Name:</label>
        <input class="properties-input" type="text" id="last-name" name="last-name" value="<?php echo $user->lastname; ?>">
      </div>
    </div>
    <div class="prop-row">
      <div class="col-7">
        <label for="email-address">Email Address:</label>
        <input class="properties-input" type="email" id="email-address" name="email-address" value="<?php echo $user->email; ?>">
      </div>
      <div class="col-5">
        <label for="phone-number">Phone Number:</label>
        <input class="properties-input" type="text" id="phone-number" name="phone-number" value="<?php echo $user->phonenumber; ?>">
      </div>
    </div>
    <div class="prop-row">
      <div class="col-7">
        <label for="street-address">Street Address:</label>
        <input class="properties-input" type="text" id="street-address" name="street-address" value="<?php echo $user->address; ?>">
      </div>
      <div class="col-2">
        <label for="apartment">Apt:</label>
        <input class="properties-input" type="text" id="apartment" name="apartment" value="<?php echo $user->apartment; ?>">
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
    </div>
    <div class="prop-row">
      <div class="col-5">
        <label for="city">City:</label>
        <input class="properties-input" type="text" id="city" name="city" value="<?php echo $user->city; ?>">
      </div>
      <div class="col-4">
        <label for="postal-code">Postal Code:</label>
        <input class="properties-input" type="text" id="postal-code" name="postal-code" value="<?php echo $user->postalcode; ?>">
      </div>
      <div class="col-3">
        <label for="country">Country:</label>
        <input class="properties-input" type="text" id="country" name="country" value="<?php echo $user->country; ?>">
      </div>
    </div>
    <div class="col-12">
      <label for="password">Current Password: </label>
      <input class="properties-input" type="password" id="password" name="password" value="<?php echo $user->password; ?>">
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
      <div class="col-5">
        <label for="card-number">Card Number:</label>
        <input class="properties-input" type="text" maxlength="16" id="card-number" name="card-number" value="<?php echo $user->cardnumber; ?>">
      </div>
      <div class="col-3">
        <label for="cvc">CVC:</label>
        <input class="properties-input" type="text" maxlength="3"id="cvc" name="cvc" value="<?php echo $user->cvc; ?>">
      </div>
    </div>
    <div class="col-12">
      <input class="save-button" type="submit" name="submit" value="Save Changes"></p>
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
