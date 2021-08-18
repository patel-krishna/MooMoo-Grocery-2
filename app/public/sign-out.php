<?php
  if (isset($_COOKIE["admin"])) {
    setcookie("admin", "", 1, "/MooMoo-Grocery-2/app/public");
  } else if (isset($_COOKIE["user"])) {
    setcookie("user", "", 1, "/MooMoo-Grocery-2/app/public");
  }

  header("Location: index.php");
?>
