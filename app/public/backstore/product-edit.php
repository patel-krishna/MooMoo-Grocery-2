<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php"); ?>

<!-- If editing, fill in default values -->
<?php
    $product_id = NULL;
    $img = NULL;
    $is_set = false;
    if(isset($_GET['id']) && isset($_GET['category'])) {
        $is_set = true;
        $product_aisle = htmlspecialchars($_GET["category"]);
        $product_id =  htmlspecialchars($_GET["id"]);
        $label =  htmlspecialchars($_GET["label"]);
        $product_category = ucfirst(explode("_", $product_aisle)[1]);
        $product_obj = getProductXml($product_aisle, $product_id);
        $size = explode(" ", $product_obj->unit);
        $unit = $size[1];
        $size = $size[0];
        $price_per = explode(" / ", $product_obj->price_per_unit);
        $per_unit = $price_per[1];
        $price_per = $price_per[0];
        $img = $product_obj->image;
        $option_type = "none";
        if (count($product_obj->options) >= 1) {
            $option_type = $product_obj->options->children()[0]->getName();
            $option_values = "";
            foreach ($product_obj->options->children() as $child) {
                $option_values = $option_values . $child . ", ";
            }
            $option_values = rtrim($option_values, ", ");
        }
    }
?>

<div class="col-8 backstore-body">
    <h1>Edit Product Info</h1>
    <?php add_product($is_set, $product_id, $img); ?>
    <form class="properties" method="post" action="" enctype="multipart/form-data">
        <div class="">
            <div class="col-6">
                <label for="item-name">Item Name:</label>
                <input class="properties-input" type="text" id="item-name" name="item-name"
                    value="<?php if ($is_set) echo $product_obj->name; ?>" required />
            </div>
            <div class="col-6">
                <label for="item-serial">Serial Number:</label>
                <input class="properties-input" type="text" id="item-serial" name="item-serial"
                    value="<?php if ($is_set) echo $product_obj->serial; ?>" required />
            </div>
        </div>
        <div class="prop-row">
            <div class="col-12">
                <label for="description">Product Description:</label><br />
                <textarea type="description" id="description" name="description" style="
                                    width: 100%;
                                    height: 400px;
                                    border: solid 1px;
                                " required><?php if ($is_set) echo $product_obj->description; ?></textarea>
            </div>
        </div>
        <div class="col-3">
            <label for="price">Price:</label>
            <input class="properties-input" type="number" min="0" step="0.01" pattern="^\d*(\.\d{0,2})?$" id="price"
                name="price" placeholder="0.00" <?php if ($is_set) echo 'value="' . $product_obj->price . '"'; ?>
                required />
        </div>
        <div class="col-3">
            <label for="quantity">Quantity: </label>
            <input class="properties-input" type="number" min="0" id="quantity" name="quantity" placeholder="0"
                <?php if ($is_set) echo 'value="' . $product_obj->quantity . '"'; ?> required />
        </div>
        <div class="col-3">
            <label for="size">Size/Weight: </label>
            <input class="properties-input" type="number" min="0" id="size" name="size" placeholder="0"
                <?php if ($is_set) echo 'value="' . $size . '"'; ?> required />
        </div>
        <div class="col-3">
            <label for="unit">Unit: </label>
            <select id="unit" name="unit" class="properties-input">
                <option value="g" <?php if ($is_set && (strcasecmp($unit, 'g') === 0)) echo 'selected'; ?>>g</option>
                <option value="kg" <?php if ($is_set && (strcasecmp($unit, 'kg') === 0)) echo 'selected'; ?>>kg</option>
                <option value="mL" <?php if ($is_set && (strcasecmp($unit, 'ml') === 0)) echo 'selected'; ?>>ml</option>
                <option value="L" <?php if ($is_set && (strcasecmp($unit, 'L') === 0)) echo 'selected'; ?>>L</option>
                <option value="ea" <?php if ($is_set && (strcasecmp($unit, 'ea') === 0)) echo 'selected'; ?>>ea</option>
                <option value="bunch" <?php if ($is_set && (strcasecmp($unit, 'bunch') === 0)) echo 'selected'; ?>>bunch</option>
            </select>
        </div>
        <div class="col-6">
            <label for="price_per">Price Per Unit:</label>
            <input class="properties-input" type="number" min="0" step="0.01" pattern="^\d*(\.\d{0,2})?$" id="price_per"
                name="price_per" placeholder="0.00" <?php if ($is_set) echo 'value="' . $price_per . '"'; ?> required />
        </div>
        <div class="col-6">
            <label for="per_unit">Per Unit Size:</label>
            <select id="per_unit" name="per_unit" class="properties-input">
                <option value="100 g" <?php if ($is_set && (strcasecmp($per_unit, '100 g') === 0)) echo 'selected'; ?>>
                    100 g</option>
                <option value="50 g" <?php if ($is_set && (strcasecmp($per_unit, '50 g') === 0)) echo 'selected'; ?>>50
                    g</option>
                <option value="1 kg" <?php if ($is_set && (strcasecmp($per_unit, '1 kg') === 0)) echo 'selected'; ?>>1
                    kg</option>
                <option value="100 mL"
                    <?php if ($is_set && (strcasecmp($per_unit, '100 ml') === 0)) echo 'selected'; ?>>100 ml</option>
                <option value="1 L" <?php if ($is_set && (strcasecmp($per_unit, '1 L') === 0)) echo 'selected'; ?>>1 L
                </option>
                <option value="ea" <?php if ($is_set && (strcasecmp($per_unit, 'ea') === 0)) echo 'selected'; ?>>ea
                </option>
            </select>
        </div>
        <div class="col-6">
            <label for="options">Options: </label>
            <select id="options" name="options" class="properties-input">
                <option value="none" <?php if ($is_set && (strcasecmp($option_type, 'none') === 0)) echo 'selected'; ?>>
                    None</option>
                <option value="flavour"
                    <?php if ($is_set && (strcasecmp($option_type, 'flavour') === 0)) echo 'selected'; ?>>Flavour
                </option>
                <option value="cut" <?php if ($is_set && (strcasecmp($option_type, 'cut') === 0)) echo 'selected'; ?>>
                    Cut</option>
            </select>
        </div>
        <div class="col-6">
            <label for="aisle">Aisle: </label>
            <select id="aisle" name="aisle" class="properties-input">
                <option value="aisle_produce-Fruits"
                    <?php if ($is_set && (strcasecmp($label, 'Fruits') === 0)) echo 'selected'; ?>>Produce - Fruits
                </option>
                <option value="aisle_produce-Vegetables"
                    <?php if ($is_set && (strcasecmp($label, 'Vegetables') === 0)) echo 'selected'; ?>>Produce -
                    Vegetables</option>
                <option value="aisle_bakery-Bread"
                    <?php if ($is_set && (strcasecmp($label, 'Bread') === 0)) echo 'selected'; ?>>Bakery - Bread
                </option>
                <option value="aisle_bakery-Pastries"
                    <?php if ($is_set && (strcasecmp($label, 'Pastries') === 0)) echo 'selected'; ?>>Bakery - Pastries
                </option>
                <option value="aisle_bakery-Desserts"
                    <?php if ($is_set && (strcasecmp($label, 'Desserts') === 0)) echo 'selected'; ?>>Bakery - Desserts
                </option>
                <option value="aisle_meat-Beef"
                    <?php if ($is_set && (strcasecmp($label, 'Beef') === 0)) echo 'selected'; ?>>Meat - Beef and Pork
                </option>
                <option value="aisle_meat-Sausage"
                    <?php if ($is_set && (strcasecmp($label, 'Sausage') === 0)) echo 'selected'; ?>>Meat - Sausages and
                    Bacon</option>
                <option value="aisle_meat-Chicken"
                    <?php if ($is_set && (strcasecmp($label, 'Chicken') === 0)) echo 'selected'; ?>>Meat - Chicken
                </option>
                <option value="aisle_dairy-Milk"
                    <?php if ($is_set && (strcasecmp($label, 'Milk') === 0)) echo 'selected'; ?>>Dairy - Milk Products
                </option>
                <option value="aisle_dairy-Cheese"
                    <?php if ($is_set && (strcasecmp($label, 'Cheese') === 0)) echo 'selected'; ?>>Dairy - Cheese
                    Products</option>
                <option value="aisle_dairy-Eggs"
                    <?php if ($is_set && (strcasecmp($label, 'Eggs') === 0)) echo 'selected'; ?>>Dairy - Eggs</option>
                <option value="aisle_beverages-Sparkling"
                    <?php if ($is_set && (strcasecmp($label, 'Sparkling') === 0)) echo 'selected'; ?>>Beverages -
                    Sparkling Water</option>
                <option value="aisle_beverages-Juice"
                    <?php if ($is_set && (strcasecmp($label, 'Juice') === 0)) echo 'selected'; ?>>Beverages - Juice
                </option>
                <option value="aisle_beverages-Pop"
                    <?php if ($is_set && (strcasecmp($label, 'Pop') === 0)) echo 'selected'; ?>>Beverages - Soft Drinks
                </option>
            </select>
        </div>
        <div class="col-12">
            <label for="option-vals">Optional Values:</label>
            <input class="properties-input" type="text" id="option-vals" name="option-vals"
                placeholder="Example: flavour1, flavour2, flavour3"
                <?php if ($is_set && (strcasecmp($option_type, 'none') !== 0)) echo 'value="' . $option_values . '"'; ?>>
        </div>
        <div class="col-12">
            <label for="product-image">Product Image: </label>
            <input type="file" name="file" style="font-size:large;" id="file" onchange="return imageValidation()"
                <?php echo ($is_set) ? '' : 'required'; ?> />
                <span id="file-error" style="color:red; display:none;">Invalid file type - valid file extensions: .jpg, .jpeg, .png, .gif.</span>
            <?php  if ($is_set) echo "<h4>If no image is uploaded, the product image will remain the same.</h4>";  ?>
        </div>

        <div class="col-12">
            <input class="save-button" type="submit" name="publish" value="Submit" />
        </div>
    </form>
</div>
<div class="col-3">
    <!-- Empty Column -->
</div>
</div>
<script>
    // validate the image
    function imageValidation() {
        var input = document.getElementById('file');
        var message = document.getElementById("file-error");

        var path = input.value;

        // Allowing file type
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if (!allowedExtensions.exec(path)) {
            message.style.display = "block";
            input.value = '';
            return false;
        } else {
            message.style.display= "none";
        }
    }
</script>
</body>

</html>
