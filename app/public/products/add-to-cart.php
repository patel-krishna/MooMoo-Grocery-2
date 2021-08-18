<?php require_once("../../resources/config.php");

if(isset($_GET['id']) && isset($_GET['category'])) {
    $product_aisle = htmlspecialchars($_GET["category"]);
    $product_id =  htmlspecialchars($_GET["id"]);

    if(isset($_POST['quantity'])) {
        $product_quantity =  htmlspecialchars($_POST["quantity"]);
        echo "Quantity: " . $product_quantity;
    }

    // Decided to include the category so that you can redirect to the same product page after.
    // $product_page = "Location: productDisplay.php?category=" . $product_aisle . "&id=" . $product_id;
    // header($product_page);
} else {
    header("Location: ../index.php");
}

?>