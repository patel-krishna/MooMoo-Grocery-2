<?php require_once("../../resources/config.php");

if(isset($_POST['submit'])) {
    $xml = new DOMDocument('1.0', "UTF-8");

    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;

    $xml->load(XML_DB . DS ."users.xml");

    $users = $xml->getElementsByTagName("users")->item(0);
    $user = $xml->createElement("user");
    //$user->setAttribute("name", $_POST['firstname']);

    $id = getNextUserID();
    $firstname = $_POST['first-name'];
    $middlename = $_POST['middle-name'];
    $lastname = $_POST['last-name'];
    $email =$_POST['email-address'];
    $phonenumber = $_POST['phone-number'];
    $address = $_POST['street-address'];
    $apartment = $_POST['apartment'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postalcode = $_POST['postal-code'];
    $country = $_POST['country'];
    $password = $_POST['new-password'];
    $paymentmethod = $_POST['payment-method'];
    $cardnumber =$_POST['card-number'];
    $cvc = $_POST['cvc'];
    $language = $_POST['language'];
    $admin = $_POST['admin'];

    $xml->getElementsByTagName("next")->item(0)->textContent = $id + 1;
    $user->appendChild($xml->createElement("id", $id));
    $user->appendChild($xml->createElement("firstname", $firstname));
    $user->appendChild($xml->createElement("middlename", $middlename));
    $user->appendChild($xml->createElement("lastname", $lastname));
    $user->appendChild($xml->createElement("email", $email));
    $user->appendChild($xml->createElement("phonenumber", $phonenumber));
    $user->appendChild($xml->createElement("address", $address));
    $user->appendChild($xml->createElement("apartment", $apartment));
    $user->appendChild($xml->createElement("city", $city));
    $user->appendChild($xml->createElement("province", $province));
    $user->appendChild($xml->createElement("postalcode", $postalcode));
    $user->appendChild($xml->createElement("country", $country));
    $user->appendChild($xml->createElement("password", $password));
    $user->appendChild($xml->createElement("paymentmethod", $paymentmethod));
    $user->appendChild($xml->createElement("cardnumber", $cardnumber));
    $user->appendChild($xml->createElement("cvc", $cvc));
    $user->appendChild($xml->createElement("language", $language));
    $user->appendChild($xml->createElement("admin", $admin));

    $users->appendChild($user);

    $xml->save(XML_DB . DS ."users.xml") or die("Error, unable to create xml file.");

    //assignNextUserID();

    header("Location: user-list.php");
} else {
    header("Location: user-list.php");
}

    ?>
