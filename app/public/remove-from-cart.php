<<<<<<< HEAD
<?php  

session_start();

// get the product id
$id = isset($_GET['removed']) ? $_GET['removed'] : "";
 
// remove the item from the array
unset($_SESSION['cart'][$id]);
 
// redirect to product list and tell the user it was added to cart
header('Location: cart.php');

=======
<?php  

session_start();

// get the product id
$id = isset($_GET['removed']) ? $_GET['removed'] : "";
 
// remove the item from the array
unset($_SESSION['cart'][$id]);
 
// redirect to product list and tell the user it was added to cart
header('Location: cart.php');

>>>>>>> 08b80f28aae0f16d8425f186fb3f1af79178be64
?> 