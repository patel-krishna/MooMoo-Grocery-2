<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php"); ?>

<?php
  if(isset($_GET['id'])) {
    $is_set = true;
    $user_id = htmlspecialchars($_GET["id"]);
    $user = getUserXml($user_id);
    $action = "edited-user.php";
  } else {
    $is_set = false;
    $user_id = getNextUserID();
    $action = "added-user.php";
  }
?>

<script type="text/javascript">
  function passwordMatch() {
      var newPassword = document.getElementById("new-password");
      var confirmNewPassword = document.getElementById("confirm-new-password");
      var errorMessage = document.getElementById("confirm-password-error");
      var submit = document.getElementById("save-button");

      if(newPassword.value != confirmNewPassword.value) {
          errorMessage.style.display = "inline";
          confirmNewPassword.focus();
          confirmNewPassword.select();
          submit.disabled = true;
      }
      else {
          errorMessage.style.display = "none";
          submit.disabled = false;
      }
  }

  function passwordCheck() {
    var password = document.getElementById("new-password").value;
    var message = document.getElementById("passwordcondition");

    if(password.length<10 || !/[0-9]/.test(password) || !/[a-z]/.test(password) || !/[A-Z]/.test(password)
    ||!/[!@#$%^&*]/.test(password))
    {
      message.style.display = "block";
      document.getElementById("new-password").focus();
      document.getElementById("new-password").select();
    }
    else{
        message.style.display= "none";
    }
  }

  function showPassword() {
    var passwordInput = document.getElementById("password");

    if (passwordInput.type == "password") {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  }
</script>

<div class="col-8">
  <h1> <?php if ($is_set) echo 'Edit User Info'; else echo 'Add User'; ?></h1>
  <form class="properties" action="<?php echo $action; ?>" method="POST">
    <div class="prop-row">
      <div class="col-4">
        <label for="user-id">User ID:</label>
        <input class="properties-input" type="text" id="user-id" name="user-id" value="<?php echo $user_id; ?>" readonly>
      </div>
      <div class="col-4">
        <label for="language">Language:</label>
        <select class="language-select properties-input" id="language" name="language">
          <option value="English" <?php if ($is_set && $user->language == "English") echo 'selected';?> >English</option>
          <option value="French" <?php if ($is_set && $user->language == "French") echo 'selected';?> >French</option>
        </select>
      </div>
      <div class="col-4">
        <label for="admin">Admin:</label>
        <select class="admin-select properties-input" id="admin" name="admin">
          <option value="yes" <?php if ($is_set && $user->admin == "yes") echo 'selected'; ?> >Yes</option>
          <option value="no" <?php if ($is_set && $user->admin == "no") echo 'selected'; ?> >No</option>
        </select>
      </div>
    </div>
    <div class="prop-row">
      <div class="col-4">
        <label for="first-name">First Name:</label>
        <input class="properties-input" type="text" id="first-name" name="first-name" value="<?php if ($is_set) echo $user->firstname; ?>">
      </div>
      <div class="col-4">
        <label for="middle-name">Middle Name:</label>
        <input class="properties-input" type="text" id="middle-name" name="middle-name" value="<?php if ($is_set) echo $user->middlename; ?>">
      </div>
      <div class="col-4">
        <label for="last-name">Last Name:</label>
        <input class="properties-input" type="text" id="last-name" name="last-name" value="<?php if ($is_set) echo $user->lastname; ?>">
      </div>
    </div>
    <div class="prop-row">
      <div class="col-7">
        <label for="email-address">Email Address:</label>
        <input class="properties-input" type="email" id="email-address" name="email-address" value="<?php if ($is_set) echo $user->email; ?>">
      </div>
      <div class="col-5">
        <label for="phone-number">Phone Number:</label>
        <input class="properties-input" type="text" id="phone-number" name="phone-number" value="<?php if ($is_set) echo $user->phonenumber; ?>">
      </div>
    </div>
    <div class="prop-row">
      <div class="col-7">
        <label for="street-address">Street Address:</label>
        <input class="properties-input" type="text" id="street-address" name="street-address" value="<?php if ($is_set) echo $user->address; ?>">
      </div>
      <div class="col-2">
        <label for="apartment">Apt:</label>
        <input class="properties-input" type="text" id="apartment" name="apartment" value="<?php if ($is_set) echo $user->apartment; ?>">
      </div>
      <div class="col-3">
        <label for="province">Province:</label>
        <select class="province-select properties-input" id="province" name="province">
          <option value="AB" <?php if ($is_set && ($user->province == "AB" || $user->province == "Alberta")) echo 'selected'; ?> >AB</option>
          <option value="BC" <?php if ($is_set && ($user->province == "BC" || $user->province == "British Colubmia")) echo 'selected'; ?> >BC</option>
          <option value="MB" <?php if ($is_set && ($user->province == "MB" || $user->province == "Manitoba")) echo 'selected'; ?> >MB</option>
          <option value="NB" <?php if ($is_set && ($user->province == "NB" || $user->province == "New Brunswick")) echo 'selected'; ?> >NB</option>
          <option value="NL" <?php if ($is_set && ($user->province == "NL" || $user->province == "Newfoundland and Labrador")) echo 'selected'; ?> >NL</option>
          <option value="NS" <?php if ($is_set && ($user->province == "NS" || $user->province == "Nova Scotia")) echo 'selected'; ?> >NS</option>
          <option value="ON" <?php if ($is_set && ($user->province == "ON" || $user->province == "Ontario")) echo 'selected'; ?> >ON</option>
          <option value="PE" <?php if ($is_set && ($user->province == "PE" || $user->province == "Prince Edward Island")) echo 'selected'; ?> >PE</option>
          <option value="QC" <?php if ($is_set && ($user->province == "QC" || $user->province == "Quebec")) echo 'selected'; ?> >QC</option>
          <option value="SK" <?php if ($is_set && ($user->province == "SK" || $user->province == "Saskatchewan")) echo 'selected'; ?> >SK</option>
        </select>
      </div>
    </div>
    <div class="prop-row">
      <div class="col-5">
        <label for="city">City:</label>
        <input class="properties-input" type="text" id="city" name="city" value="<?php if ($is_set) echo $user->city; ?>">
      </div>
      <div class="col-4">
        <label for="postal-code">Postal Code:</label>
        <input class="properties-input" type="text" id="postal-code" name="postal-code" value="<?php if ($is_set) echo $user->postalcode; ?>">
      </div>
      <div class="col-3">
        <label for="country">Country:</label>
        <input class="properties-input" type="text" id="country" name="country" value="<?php if ($is_set) echo $user->country; ?>">
      </div>
    </div>
    <div class="col-12">
      <label for="password">Current Password: </label>
      <span style="font-size: 0.8rem;">
        <input type="checkbox" name="show-password" onclick="showPassword()" style="position: relative; top: 2px;" value="">
        Show Password
      </span>
      <input class="properties-input" type="password" id="password" name="password" value="<?php if ($is_set) echo $user->password; ?>" readonly>
    </div>
    <div class="col-12">
      <label for="new-password">New Password*: </label>
      <span style="font-size: 0.8rem;">
        (Must contain at least 10 characters, including at least one number,
        one lowercase letter, one uppercase letter and one special character.)
      </span>
      <input class="properties-input" type="password" id="new-password" name="new-password" value="" <?php if ($is_set == false) echo 'required'; ?> onchange="passwordCheck()">
      <span id="passwordcondition" style="color:red; display:none;">Please set your password again. Some condition is not met.</span>
    </div>
    <div class="col-12">
      <label for="confirm-new-password">Confirm New Password*: </label>
      <input class="properties-input" type="password" id="confirm-new-password" name="confirm-new-password" value="" <?php if ($is_set == false) echo 'required'; ?> onchange="passwordMatch()">
      <span id="confirm-password-error" style="color:red; display:none">Error: the passwords you entered do not match.</span>
    </div>
    <div class="prop-row">
      <div class="col-4">
        <label for="payment-method">Card Type:</label>
        <select class="properties-input" id="payment-method" name="payment-method">
          <option value="Debit" <?php if ($is_set && $user->paymentmethod == "Debit") echo 'selected'; ?> >Debit Card</option>
          <option value="Credit" <?php if ($is_set && $user->paymentmethod == "Credit") echo 'selected'; ?>>Credit Card</option>
          <option value="Moomoo card" <?php if ($is_set && $user->paymentmethod == "Moomoo card") echo 'selected'; ?>>MooMoo Card</option>
        </select>
      </div>
      <div class="col-5">
        <label for="card-number">Card Number:</label>
        <input class="properties-input" type="text" maxlength="16" id="card-number" name="card-number" value="<?php if ($is_set) echo $user->cardnumber; ?>">
      </div>
      <div class="col-3">
        <label for="cvc">CVC:</label>
        <input class="properties-input" type="text" maxlength="3"id="cvc" name="cvc" value="<?php if ($is_set) echo $user->cvc; ?>">
      </div>
    </div>
    <div class="col-12">
      <input id="save-button" class="save-button" type="submit" name="submit" value="Save Changes"></p>
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
