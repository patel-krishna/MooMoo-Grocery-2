<?php require_once("../../resources/config.php");

// If not admin, return to homepage
if (!isset($_COOKIE["admin"])) {
    header("Location: ../index.php");
}

// If both order_id and product_id exist, delete product_id from XML, else return to <add-order.php>
if (isset($_GET['order_id'])) {
    $order_id = $_GET["order_id"];
    echo $order_id;

    // addOrderProduct($order_id, $product_id);
    // header("Location: add-order.php?order_id={$order_id}");
} else {
    // header("Location: add-order.php?order_id={$order_id}");
}
