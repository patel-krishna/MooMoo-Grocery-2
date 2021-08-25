<?php require_once("../../resources/config.php");

if (!isset($_COOKIE["admin"])) {
    header("Location: ../index.php");
}

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

    // Initialize variable for root node at index 0
    $root = $xml->getElementsByTagName("orders")->item(0);

    // Create new element: order
    $order = $xml->createElement("order");

    // Save the unique variables first
    $xml->getElementsByTagName("next")->item(0)->textContent = $order_id + 1; // Set next value
    $order->appendChild($xml->createElement("order_id", $order_id));
    $order->appendChild($xml->createElement("date", $date));
    $order->appendChild($xml->createElement("customer_id", $customer_id));

    // Create new element: cart and append as child of order
    $cart = $xml->createElement("cart");
    $order->appendChild($cart);

    // For the products, loop through all elements and append to cart
    // foreach ($_POST["product-id"] as $product_id) {
    //     $product = $xml->createElement("product");
    //     $product->appendChild($product_id);

    //     // Retrieve product quantity and append as child of product
    //     $quantity = $_POST["quantity"];
    //     $product->appendChild($xml->createElement("p_quantity", $quantity));

    //     // Append product to cart
    //     $cart->appendChild($product);
    // }

    // Finally update status
    $order->appendChild($xml->createElement("status", $status));

    // Finally append $order to root node
    $root->appendChild($order);

    // Save XML file
    $xml->save(XML_DB . DS . "orders.xml") or die("Error, unable to create xml file.");
    header("Location: order-list.php");
}
// Else redirect to order-list
else {
    header("Location: order-list.php");
}
