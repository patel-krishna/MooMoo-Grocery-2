<?php

    session_start();

    if(isset($_GET['id'])) {
        $product_id =  htmlspecialchars($_GET["id"]);
        if(isset($_POST['quantity'])) {
            $product_quantity =  htmlspecialchars($_POST["quantity"]);
        }
            $_SESSION['cart'][$product_id]=$product_quantity;
            
    }
         
    
        header("Location: ../public/cart.php");
    
    
    
    



?>