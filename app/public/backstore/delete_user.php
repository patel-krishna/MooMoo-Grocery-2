<?php require_once("../../resources/config.php");

if(isset($_GET['id'])) {
    $user_id =  htmlspecialchars($_GET["id"]);

    deleteUserXml($user_id);
    header("Location: user-list.php");
} else {
    header("Location: user-list.php");
}

?>
