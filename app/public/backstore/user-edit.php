<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php"); ?>

<?php
  if(isset($_GET['id'])) {
    $user_id = htmlspecialchars($_GET["id"]);
    $user = getUserXml($user_id);
    $action = "edited-user.php";
  } else {
    $action = "added-user.php";
  }
?>

<div class="col-8">
  <h1>Edit User Info</h1>
  <form class="properties" action="<?php echo $action; ?>" method="POST">
    <div class="prop-row">
      <div class="col-8">
        <label for="user-id">User ID:</label>
        <input class="properties-input" type="text" id="user-id" name="user-id" value="<?php echo $user->id; ?>" disabled>
      </div>
      <div class="col-4">
        <label for="language">Language:</label>
        <select class="province-select properties-input" id="language" name="language">
          <option value="English" <?php if ($user->language == "English") echo 'selected' ?> >English</option>
          <option value="French" <?php if ($user->language == "French") echo 'selected' ?> >French</option>
        </select>
      </div>
    </div>
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
          <option value="AB" <?php if ($user->province == "AB" || $user->province == "Alberta") echo 'selected' ?> >AB</option>
          <option value="BC" <?php if ($user->province == "BC" || $user->province == "British Colubmia") echo 'selected' ?> >BC</option>
          <option value="MB" <?php if ($user->province == "MB" || $user->province == "Manitoba") echo 'selected' ?> >MB</option>
          <option value="NB" <?php if ($user->province == "NB" || $user->province == "New Brunswick") echo 'selected' ?> >NB</option>
          <option value="NL" <?php if ($user->province == "NL" || $user->province == "Newfoundland and Labrador") echo 'selected' ?> >NL</option>
          <option value="NS" <?php if ($user->province == "NS" || $user->province == "Nova Scotia") echo 'selected' ?> >NS</option>
          <option value="ON" <?php if ($user->province == "ON" || $user->province == "Ontario") echo 'selected' ?> >ON</option>
          <option value="PE" <?php if ($user->province == "PE" || $user->province == "Prince Edward Island") echo 'selected' ?> >PE</option>
          <option value="QC" <?php if ($user->province == "QC" || $user->province == "Quebec") echo 'selected' ?> >QC</option>
          <option value="SK" <?php if ($user->province == "SK" || $user->province == "Saskatchewan") echo 'selected' ?> >SK</option>
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
      <input class="properties-input" type="password" id="password" name="password" value="<?php echo $user->password; ?>" disabled>
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
          <option value="Debit" <?php if ($user->paymentmethod == "Debit") echo 'selected' ?> >Debit Card</option>
          <option value="Credit" <?php if ($user->paymentmethod == "Credit") echo 'selected' ?>>Credit Card</option>
          <option value="Moomoo card" <?php if ($user->paymentmethod == "Moomoo card") echo 'selected' ?>>MooMoo Card</option>
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
