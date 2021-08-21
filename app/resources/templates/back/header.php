<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Backstore Page" />

  <title>MooMoo Grocery | Backstore </title>
  <link rel="icon" href="../images/icon-moo.png">
  <link rel="stylesheet" href="../css/styles-backstore.css">

  <!-- Include Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>

<body>

  <?php
  if (!isset($_COOKIE["admin"])) {
    header("Location: ../index.php");
  }
  ?>

  <header class="backstore-header">
    <a href="../index.php"><img class="backstore-header-logo" src="../images/moomoologo.png" alt="MooMooGrocery logo"></a>
    <?php
          if (isset($_COOKIE["admin"])) {
            echo '<span class="admin-name" >Hello, ' . $_COOKIE["admin"] . '</span>';
          } else {
            echo '';
          }
      ?>
    <a class="sign-out-button" href="../sign-out.php">Sign Out</a>
  </header>
