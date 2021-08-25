<?php  require_once("../resources/config.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_COOKIE["user"]) || isset($_COOKIE["admin"]) && (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)) {


    //set xml

    $xml = new DOMDocument('1.0', "UTF-8");

    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;

    $xml->load(XML_DB . DS . "orders.xml") or die("Error: Cannot create object");



    if(isset($_POST["total"])){


        $orders = $xml -> getElementsByTagName("orders")->item(0);
        $order = $xml ->createElement("order");

        $order_id = getNextOrderID() ;    
        $orders->getElementsByTagName("next")->item(0)->textContent = $order_id + 1;

        $date = date("M d, Y");

        if(isset( $_COOKIE["user"])){
            $customer_id = $_COOKIE["user"];
        }
        else if(isset( $_COOKIE["admin"])){
           $customer_id = $_COOKIE["admin"];
        }

        //looking for customer id
        $users =  simplexml_load_file(XML_DB . DS . "users.xml") or die("Error of calling file");

        for($i=0;$i<$users->user->count();$i++){
            if(($users->user[$i]->firstname == $customer_id)){
                $customer_id = $users->user[$i]->id;
            }

        }

        $status= "processing"; 

        $cart = $xml ->createElement("cart");

        //attached to cart node 

        foreach($_SESSION['cart'] as $key=>$value ){
            $product = $xml->createElement("product");

            $id = $key;
             $p_quantity = $value; 

            $o_id = $xml ->createElement("id", $id);
            $o_quantity = $xml ->createElement("p_quantity", $p_quantity);

            $product ->appendChild($o_id);
            $product ->appendChild($o_quantity);
            $cart ->appendChild($product); 


        }

        $total = $_POST['total'];
        $o_total = $xml ->createElement("total", $total);
        $cart->appendChild($o_total); 

        //append all order element to order node
        //order id, date, customer id, cart, status 

        $o_order_id= $xml->createElement("order_id", $order_id);
        $order->appendChild($o_order_id); 

        $o_date= $xml->createElement("date", $date);
        $order->appendChild($o_date); 

        $o_customer_id= $xml->createElement("customer_id", $customer_id);
        $order->appendChild($o_customer_id); 

        $order->appendChild($cart); 

        $o_status= $xml->createElement("status", $status);
        $order->appendChild($o_status); 

        $orders->appendChild($order);

        $xml ->save(XML_DB . DS . "orders.xml") or die("Error, unable to create xml file.");

        //resetting the session cart back to empty

        session_unset();

        //going back to homepage 
        header("Location: index.php");




    }
}else{
    if (!isset($_COOKIE["user"]) && !isset($_COOKIE["admin"])) {
        echo '<script>if (confirm("Sorry! You must be a member to checkout!")) {
            document.location = "Login.php"; 
        } else {
            document.location = "cart.php"; 
        }
            </script>';
    } else {
        echo '<script>if (confirm("Sorry! You must have at least one item in the cart!")) {
            document.location = "index.php"; 
        } else {
            document.location = "cart.php"; 
        }
            </script>';
    }
    
}