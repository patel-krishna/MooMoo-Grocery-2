<?php require_once("../../resources/config.php");

if (!isset($_COOKIE["admin"])) {
  header("Location: ../index.php");
}

if(isset($_GET['id']) && isset($_GET['category'])) {
    $product_aisle = htmlspecialchars($_GET["category"]);
    $product_id =  htmlspecialchars($_GET["id"]);

    deleteProductXml($product_aisle, $product_id);
    header("Location: product-list.php");
} else {
    header("Location: product-list.php");
}

?>
