<?php require_once("../../resources/config.php");

// If not admin, return to homepage
if (!isset($_COOKIE["admin"])) {
    header("Location: ../index.php");
}

// Collect orderID from outside
$order_id = $_GET["order_id"];

// Check if customer ID is valid, if not, send back to prev page.
if (!validCustomerID($_GET['customer_id'])) {
    header("Location: add-order.php?order_id={$order_id}");
}

// If both order_id exist, product_id is not empty and quantity is above 0, add product, else return to <add-order.php>
if (isset($_GET['order_id']) && isset($_GET['customer_id']) && !empty($_GET['product_id']) && isset($_GET['quantity'])) {

    // Collect all get values
    $customer_id = $_GET["customer_id"];
    $product_id = $_GET["product_id"];
    $quantity = $_GET["quantity"];


    // Fill XML with relevant files then reload the order_id
    // XML settings
    $xml = new DOMDocument('1.0', "UTF-8");
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    $xml->load(XML_DB . DS . "orders.xml");

    // Get date
    $date = date("M d, Y");

    // If order ID exists, add product only

    // Get root node
    $root = $xml->documentElement;
    // Get array of orders and set as nodeArray
    $orders = $root->getElementsByTagName("order");

    // Boolean match
    $match = false;

    // For each order 
    foreach ($orders as $order) {

        // If an order ID matches, add product at the end
        if ($order->getElementsByTagName("order_id")->item(0)->textContent == $order_id) {
            // Since match is true, change value;
            $match = true;

            // Go into cart and update products
            $cart = $order->getElementsByTagName("cart")->item(0);

            // Create a new element of type product
            $product = $xml->createElement("product");
            $product->appendChild($xml->createElement("id", $product_id));
            $product->appendChild($xml->createElement("p_quantity", $quantity));

            // Append product to end
            $cart->appendChild($product);
        }
    }

    // So if no match in XML file, no such order exists and make a new one
    if (!$match) {
        // If order ID does not exist, fill whole XML
        $xml->getElementsByTagName("next")->item(0)->textContent = $order_id + 1; // Set next value

        // Create a new order
        $order = $xml->createElement("order");
        // Fill existing values
        $order->appendChild($xml->createElement("order_id", $order_id));
        $order->appendChild($xml->createElement("date", $date));
        $order->appendChild($xml->createElement("customer_id", $customer_id));

        // Create a new cart and append
        $cartList = $xml->createElement("cart");
        $order->appendChild($cartList);

        // Create a new product and add to cart
        $cart = $order->getElementsByTagName("cart")->item(0);
        // Create a new element of type product
        $product = $xml->createElement("product");
        $product->appendChild($xml->createElement("id", $product_id));
        $product->appendChild($xml->createElement("p_quantity", $quantity));

        // Append product to end
        $cart->appendChild($product);
    }

    // Save to XML file and return to page
    $xml->save(XML_DB . DS . "orders.xml") or die("Error, unable to create xml file.");
    header("Location: add-order.php?order_id={$order_id}");
} else {
    header("Location: add-order.php?order_id={$order_id}");
}
