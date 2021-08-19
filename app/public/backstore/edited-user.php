<?php require_once("../../resources/config.php");

if (!isset($_COOKIE["admin"])) {
  header("Location: ../index.php");
}

if(isset($_POST['submit'])) {
    $xml = new DOMDocument('1.0', "UTF-8");

    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;

    $xml->load(XML_DB . DS ."users.xml");

    $id = $_POST['user-id'];
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
    $password = $_POST['password'];
    $paymentmethod = $_POST['payment-method'];
    $cardnumber =$_POST['card-number'];
    $cvc = $_POST['cvc'];
    $language = $_POST['language'];
    $admin = $_POST['admin'];

    $root = $xml->documentElement;
    $users = $root->getElementsByTagName("user");

    foreach ($users as $user) {
        if ($user->getElementsByTagName('id')->item(0)->textContent == $id) {
            $user->getElementsByTagName('firstname')->item(0)->textContent = $firstname;
            $user->getElementsByTagName('middlename')->item(0)->textContent = $middlename;
            $user->getElementsByTagName('lastname')->item(0)->textContent = $lastname;
            $user->getElementsByTagName('email')->item(0)->textContent = $email;
            $user->getElementsByTagName('phonenumber')->item(0)->textContent = $phonenumber;
            $user->getElementsByTagName('address')->item(0)->textContent = $address;
            $user->getElementsByTagName('apartment')->item(0)->textContent = $apartment;
            $user->getElementsByTagName('city')->item(0)->textContent = $city;
            $user->getElementsByTagName('province')->item(0)->textContent = $province;
            $user->getElementsByTagName('postalcode')->item(0)->textContent = $postalcode;
            $user->getElementsByTagName('country')->item(0)->textContent = $country;
            $user->getElementsByTagName('password')->item(0)->textContent = $password;
            $user->getElementsByTagName('paymentmethod')->item(0)->textContent = $paymentmethod;
            $user->getElementsByTagName('cardnumber')->item(0)->textContent = $cardnumber;
            $user->getElementsByTagName('cvc')->item(0)->textContent = $cvc;
            $user->getElementsByTagName('language')->item(0)->textContent = $language;
            $user->getElementsByTagName('admin')->item(0)->textContent = $admin;
        }

    }

    $xml->save(XML_DB . DS ."users.xml") or die("Error, unable to create xml file.");

    header("Location: user-list.php");
} else {
    header("Location: user-list.php");
}

    ?>
