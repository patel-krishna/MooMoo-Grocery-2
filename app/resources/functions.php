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
                    <img src="../images/{$product->image}" class="card-img-top embed-responsive-item" alt="{$product->name}">
                </div>
                <div class="card-body">
                    <h4 class="card-title">{$product->name}</h4>
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
                $product_out = <<<DELIMITER
                <tr>
                    <td>{$product->serial}</td>
                    <td>{$product->name}</td>
                    <td class="hide-mobile">&#36;{$product->price}</td>
                    <td class="hide-mobile">{$product->quantity}</td>
                    <td><a class="edit-action" href="product-edit.php?category={$aisle_name}&amp;id={$product->id}">Edit</a> <a class="delete-action" href="delete_product.php?category={$aisle_name}&amp;id={$product->id}">Delete</a></td>
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


?>