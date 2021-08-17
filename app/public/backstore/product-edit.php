<?php require_once("../../resources/config.php"); 
    // if(isset($_GET['id']) && isset($_GET['category'])) {
    //     $product_aisle = htmlspecialchars($_GET["category"]);
    //     $product_id =  htmlspecialchars($_GET["id"]);
    // }
?>

<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php"); ?>

<div class="col-8">
    <h1>Edit Product Info</h1>
    <?php add_product(); ?>
    <form class="properties" method="post" action="" enctype="multipart/form-data">
        <div class="">
            <div class="col-6">
                <label for="item-name">Item Name:</label>
                <input class="properties-input" type="text" id="item-name" name="item-name" value=""  />
            </div>
            <div class="col-6">
                <label for="item-serial">Serial Number:</label>
                <input class="properties-input" type="text" id="item-serial" name="item-serial" value="" />
            </div>
        </div>
        <div class="prop-row">
            <div class="col-12">
                <label for="description">Product Description:</label><br />
                <textarea type="description" ; id="description" ; name="description" ; value="" ; style="
                                    width: 100%;
                                    height: 400px;
                                    border: solid 1px;
                                " ;  ></textarea>
            </div>
        </div>
        <div class="col-4">
            <label for="price">Price:</label>
            <input class="properties-input" type="number" min="0" step="0.01" pattern="^\d*(\.\d{0,2})?$" id="price"
                name="price" placeholder="0.00"   />
        </div>
        <div class="col-4">
            <label for="quantity">Quantity: </label>
            <input class="properties-input" type="number" min="0" id="quantity" name="quantity" placeholder="0"  />
        </div>
        <div class="col-4">
            <label for="size">Size/Weight: </label>
            <input class="properties-input" type="number" min="0" id="size" name="size" placeholder="0" />
        </div>
        <div class="col-4">
            <label for="unit">Unit: </label>
            <select id="unit" name="unit" class="properties-input">
                <option value="g">g</option>
                <option value="kg">kg</option>
                <option value="mL">ml</option>
                <option value="L">L</option>
                <option value="L">ea</option>
            </select>
        </div>
        <div class="col-4">
            <label for="options">Options: </label>
            <select id="options" name="options" class="properties-input">
                <option value="none">None</option>
                <option value="flavour">Flavour</option>
                <option value="cut">Cut</option>
            </select>
        </div>
        <div class="col-4">
            <label for="aisle">Aisle: </label>
            <select id="aisle" name="aisle" class="properties-input">
                <option value="aisle_produce-Fruits">Produce - Fruits</option>
                <option value="aisle_produce-Vegetables">Produce - Vegetables</option>
                <option value="aisle_bakery-Bread">Bakery - Bread</option>
                <option value="aisle_bakery-Pastries">Bakery - Pastries</option>
                <option value="aisle_bakery-Desserts">Bakery - Desserts</option>
                <option value="aisle_meat-Beef">Meat - Beef and Pork</option>
                <option value="aisle_meat-Sausage">Meat - Sausages and Bacon</option>
                <option value="aisle_meat-Chicken">Meat - Chicken</option>
                <option value="aisle_dairy-Milk">Dairy - Milk Products</option>
                <option value="aisle_dairy-Cheese">Dairy - Cheese Products</option>
                <option value="aisle_dairy-Eggs">Dairy - Eggs</option>
                <option value="aisle_beverages-Sparkling">Beverages - Sparkling Water</option>
                <option value="aisle_beverages-Juice">Beverages - Juice</option>
                <option value="aisle_beverages-Pop">Beverages - Soft Drinks</option>
            </select>
        </div>
        <div class="col-12">
            <label for="product-image">Product Image: </label>
            <input type="file" name="file" style="font-size:large;"/>
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
</body>

</html>