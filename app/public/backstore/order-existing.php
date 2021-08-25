<?php require_once("../../resources/config.php");

// If not admin, return to homepage
if (!isset($_COOKIE["admin"])) {
    header("Location: ../index.php");
}

// Update XML
if (isset($_POST["save-order"])) {
    // XML settings
    $xml = new DOMDocument('1.0', "UTF-8");
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    $xml->load(XML_DB . DS . "orders.xml");

    // Unique XML values
    $order_id = $_POST["order-id"];
    $customer_id = $_POST["customer-id"];
    $date = date("M d, Y"); // Today's date

    // Check if checkbox for order completed is checked
    $status = "";
    if (isset($_POST["status"])) {
        $status = "completed";
    } else {
        $status = "processing";
    }

    // Get root node
    $root = $xml->documentElement;
    // Get array of orders and set as nodeArray
    $orders = $root->getElementsByTagName("order");

    // For each order match ID
    foreach ($orders as $order) {
        // If an order ID matches, replace the rest
        if ($order->getElementsByTagName("order_id") == $order_id) {
            $order->getElementsByTagName("date")->item(0)->textContent = $date;
            $order->getElementsByTagName("customer_id")->item(0)->textContent = $customer_id;
            $order->getElementsByTagName("status")->item(0)->textContent = $status;
        }
    }

    // Save XML and redirect to order list
    $xml->save(XML_DB . DS . "orders.xml") or die("Error, unable to create xml file.");
    header("Location: order-list.php");
} else {
    // Redirect to order-list
    header("Location: order-list.php");
}
