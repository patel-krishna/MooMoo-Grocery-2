<?php
  if (isset($_COOKIE["admin"])) {
    setcookie("admin", "", 1, "/");
  } else if (isset($_COOKIE["user"])) {
    setcookie("user", "", 1, "/");
  }

  header("Location: index.php");
?>
