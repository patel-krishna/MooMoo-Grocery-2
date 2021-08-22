<?php require_once("../../resources/config.php");

// If not admin, return to homepage
if (!isset($_COOKIE["admin"])) {
    header("Location: ../index.php");
}

if (isset($_GET['order_id'])) {
    $order_id = intval($_GET["order_id"]);

    deleteOrderXML($order_id);
    header("Location: order-list.php");
} else {
    header("Location: order-list.php");
}
