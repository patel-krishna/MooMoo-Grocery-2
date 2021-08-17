<?php

function set_message($msg) {
    if (empty($msg)) {
        $msg = "";
    } else {
        $_SESSION['message'] = $msg;
    }
}

function display_message($msg) {
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function load_aisle_xml($aisle) {
    $xml = simplexml_load_file(XML_DB . DS . "products.xml") or die("Error: Cannot create object");
    $aisle_xml = NULL;
    foreach ($xml->children() as $child) {
        if (strcasecmp($child->getName(), $aisle) === 0) {
            $aisle_xml = $child;
            break;
        }
    }

    return $aisle_xml;
}


// #################################### FRONT END FUNCTIONS

// ----- aisle page functions

// get products - for aisles
function display_aisle_products($aisle, $section) {
    $aisle_xml = load_aisle_xml($aisle);
    // separate each section
    $section = $aisle_xml->aisle_section[$section];

    foreach ($section->children() as $product) {
        $div_media = (count($section) >= 3) ? "col-lg-4": " ";
        $product_card = <<<DELIMITER
        <div class="col-sm-12 col-md-6 {$div_media} mb-3">
            <div class="card mb-3 h-100">
                <div class="embed-responsive embed-responsive-4by3">
                    <a href="../products/productDisplay.php?category={$aisle}&amp;id={$product->id}"><img src="../images/{$product->image}" class="card-img-top embed-responsive-item" alt="{$product->name}"></a>
                </div>
                <div class="card-body">
                    <a href="../products/productDisplay.php?category={$aisle}&amp;id={$product->id}"><h4 class="card-title">{$product->name}</h4></a>
                    <p class="card-text">{$product->name} &#8211; {$product->unit}</p>
                    <p class="card-text card-price">&#36;{$product->price}</p>
                    <p class="card-text"><small class="text-muted">&#36;{$product->price_per_unit}</small></p>
                    <a href="../products/productDisplay.php?category={$aisle}&amp;id={$product->id}">Go to Product Page</a>
                </div>
            </div>
        </div>
        DELIMITER;

        echo $product_card;
    }
}


// ----- product page functions

function getJumbotron($aisle_name) {
    $category = explode("_", $aisle_name)[1];
    return "jumbotron-" . $category;
}

function getProductXml($product_aisle, $product_id) {
    $aisle_xml = load_aisle_xml($product_aisle);
    $product_xml = NULL;
    foreach ($aisle_xml->children() as $section) {
        foreach ($section->children() as $product) {
            if (strcasecmp($product->id, $product_id) === 0) {
                $product_xml = $product;
                break;
            }
        }
    }

    return $product_xml;
}

// dynamically generate the options that may be required for a product
function getOptions($options) {
    $option_type = $options->getName();
    $option_uc = ucfirst($option_type);
    $select_open = <<<DELIMITER
        <select class="custom-select custom-select-lg mb-3 product-size" id="{$option_type}">
            <option selected>{$option_uc} - {$options[0]}</option>
    DELIMITER;
    echo $select_open;
    $i = 1;
    while ($i < count($options)) {
        $select_option = <<<DELIMITER
            <option value="{$i}">{$option_uc} - {$options[$i]}</option>
        DELIMITER;
        echo $select_option;
        $i++;
    }

    $select_close = <<<DELIMITER
        </select>
    DELIMITER;
    echo $select_close;
}

// #################################### BACK END FUNCTIONS

//  ----- products list

function display_products() {
    $xml = simplexml_load_file(XML_DB . DS . "products.xml") or die("Error: Cannot create object");
    foreach ($xml->children() as $aisle_categories) {
        foreach ($aisle_categories->children() as $aisle_section) {
            $aisle_name = $aisle_categories->getName();
            foreach ($aisle_section->children() as $product) {
                $label = $aisle_section['label'];
                $product_out = <<<DELIMITER
                <tr>
                    <td>{$product->serial}</td>
                    <td>{$product->name}</td>
                    <td class="hide-mobile">&#36;{$product->price}</td>
                    <td class="hide-mobile">{$product->quantity}</td>
                    <td><a class="edit-action" href="product-edit.php?category={$aisle_name}&amp;label={$label}&amp;id={$product->id}">Edit</a> <a class="delete-action" href="delete_product.php?category={$aisle_name}&amp;id={$product->id}">Delete</a></td>
                </tr>
                DELIMITER;

                echo $product_out;
            }
        }

    }
}

// deletes a product from products.xml
function deleteProductXml($product_aisle, $product_id) {
    $xml = new DOMDOcument;
    $xml->load(XML_DB . DS . "products.xml");
    $xpath = new DOMXpath($xml);
    foreach($xpath->query('//' . $product_aisle . '/aisle_section/product[id="' . $product_id . '"]') as $node) {
        $node->parentNode->removeChild($node);
    }
    $xml->save(XML_DB . DS . "products.xml");
}

// ----- add/edit products

// adding form input for product to xml file
function add_product($is_set, $id, $img) {
    if (isset($_POST['publish'])) {
        $name = $serial = $description = $price = $quantity = $size = $unit = $option = $aisle = "";
        $name = sanitize_input($_POST["item-name"]);
        $serial = sanitize_input($_POST["item-serial"]);
        $description = sanitize_input($_POST["description"]);
        $price = sanitize_input($_POST["price"]);
        $quantity = sanitize_input($_POST["quantity"]);
        $size = sanitize_input($_POST["size"]);
        $unit = sanitize_input($_POST["unit"]);
        $price_per = sanitize_input($_POST["price_per"]);
        $per_unit = sanitize_input($_POST["per_unit"]);
        $option = strtolower(sanitize_input($_POST["options"]));
        $optionvals = strtolower(sanitize_input($_POST["option-vals"]));
        $aisle = explode("-",sanitize_input($_POST["aisle"]));
        $image = htmlspecialchars($_FILES['file']['name']);
        $temp_image = htmlspecialchars($_FILES['file']['tmp_name']);
        $aisle_name = $aisle[0];
        $aisle_category = $aisle[1];

        move_uploaded_file($temp_image, UPLOADS . DS . $image);

        $xml = new DOMDocument('1.0', "UTF-8");
        $xml->load(XML_DB . DS . "products.xml");
        $xml->formatOutput = true;

        $xpath = new DOMXpath($xml);


        if ($is_set) {
            $nextId = $id;
            $image = $img;

            foreach($xpath->query('//' . $aisle_name . '/aisle_section/product[id="' . $id . '"]') as $node) {
                $node->parentNode->removeChild($node);
            }
        } else {
            $nextId = getNextProductId();
            // increment next id value
            foreach ($xpath->query('//next') as $next) {
                $next->firstChild->nodeValue = ($nextId + 1);
            }
        }

        $aisle_section = $xpath->query('//' . $aisle_name . '/aisle_section[@label="' . $aisle_category . '"]');

        $product = $xml->createElement("product");

        $pid = $xml->createElement("id", $nextId);
        $product->appendChild($pid);
        $pname = $xml->createElement("name", $name);
        $product->appendChild($pname);
        $pserial = $xml->createElement("serial", $serial);
        $product->appendChild($pserial);
        $pdescription = $xml->createElement("description", $description);
        $product->appendChild($pdescription);
        $pprice = $xml->createElement("price", $price);
        $product->appendChild($pprice);
        $pquantity = $xml->createElement("quantity", $quantity);
        $product->appendChild($pquantity);
        $punit = $xml->createElement("unit", $size . " " . $unit);
        $product->appendChild($punit);
        $pppunit = $xml->createElement("price_per_unit", $price_per . " / " . $per_unit);
        $product->appendChild($pppunit);
        $pimage = $xml->createElement("image", $image);
        $product->appendChild($pimage);
        if (strcasecmp($option, "none") !== 0) {
            $poption = $xml->createElement("options", "");
            $values = explode(",", $optionvals);
            foreach ($values as $value) {
                $pvalue = $xml->createElement($option, ucwords($value));
                $poption->appendChild($pvalue);
            }
            $product->appendChild($poption);
        }

        $aisle_section->item(0)->appendChild($product);
        $xml->save(XML_DB . DS ."products.xml") or die("Error, unable to save xml file.");
        header("Location: product-list.php");
    }
}

// sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getNextProductId() {
    $xml = simplexml_load_file(XML_DB . DS . "products.xml") or die("Error: Cannot create object");
    return $xml->next[0];
}

// user list

function display_users() {
    $xml = simplexml_load_file(XML_DB . DS . "users.xml") or die("Error: Cannot create object");
        foreach ($xml->children() as $user) {
            $user_out = <<<DELIMITER
            <tr>
              <td>{$user->id}</td>
              <td>{$user->lastname}</td>
              <td>{$user->firstname}</td>
              <td class="hide-mobile">{$user->email}</td>
              <td class="hide-mobile">{$user->phonenumber}</td>
              <td>
                  <a class="edit-action" href="user-edit.php?id={$user->id}">Edit</a>
                  <a class="delete-action" href="delete_user.php?id={$user->id}">Delete</a>
              </td>
            </tr>
            DELIMITER;
            echo $user_out;
        }
}

//return user XML, used for editing user information
function getUserXml($user_id) {
  $xml = simplexml_load_file(XML_DB . DS . "users.xml") or die("Error: Cannot create object");
  $user_xml = NULL;

  foreach ($xml->children() as $user) {
    if ($user->id == $user_id) {
      $user_xml = $user;
      break;
    }
  }

  return $user_xml;
}

//delete a user from users.xml
function deleteUserXml($user_id) {
  $xml = new DOMDOcument;
  $xml->load(XML_DB . DS . "users.xml");
  $xpath = new DOMXpath($xml);
  foreach ($xpath->query('//user[id="' . $user_id .'"]') as $node) {
    $node->parentNode->removeChild($node);
  }
  $xml->save(XML_DB . DS . "users.xml");
}

function getNextUserID() {
  return 1;
  //return $nextUserID;
}

?>
