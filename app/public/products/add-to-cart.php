<?php require_once("../../resources/config.php");

session_start();

if(isset($_GET['id']) && isset($_GET['category'])) {
    $product_aisle = htmlspecialchars($_GET["category"]);
    $product_id =  htmlspecialchars($_GET["id"]);

    $product_page = "Location: productDisplay.php?category=" . $product_aisle . "&id=" . $product_id;
   
    if(isset($_POST['quantity'])) {
        $product_quantity =  htmlspecialchars($_POST["quantity"]);
    }
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
        if(!isset($_SESSION['aisles'])){
            $_SESSION['aisles'] = array();
        }

        
        if(array_key_exists($id, $_SESSION['cart'])){

            echo('<script> alert("This item is already in your cart!") </script>');
            header($product_page);
        }else
        $_SESSION['cart'][$product_id]=$product_quantity;
        
    // Decided to include the category so that you can redirect to the same product page after.
     header($product_page);
     
} else {
    header("Location: ../index.php");
}






?>