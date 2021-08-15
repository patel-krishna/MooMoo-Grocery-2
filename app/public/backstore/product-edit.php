<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<!-- Side Navigation -->
<?php include(TEMPLATE_BACK . DS . "side-nav.php"); ?>

<div class="col-8">
    <h1>Edit Product Info</h1>
    <h3>Modify all details of an inventory item.</h3>
    <form class="properties" action="" method="post" enctype="text/plain">
        <div class="">
            <div class="col-6">
                <label for="item-name">Item Name:</label>
                <input class="properties-input" type="text" id="item-name" name="item-name" value="" />
            </div>
            <div class="col-6">
                <label for="item-id">Serial Number:</label>
                <input class="properties-input" type="text" id="item-id" name="item-id" value="" />
            </div>
        </div>
        <div class="prop-row">
            <div class="col-12">
                <label for="description">Product Description:</label><br />
                <textarea type="description" ; id="description" ; name="description" ; value="" ; style="
                                    width: 100%;
                                    height: 400px;
                                    border: solid 1px;
                                " ;></textarea>
            </div>
        </div>
        <div class="col-2">
            <label for="price">Price:</label>
            <input class="properties-input" type="number" min="0" step="0.01" pattern="^\d*(\.\d{0,2})?$" id="price"
                name="price" placeholder="0.00" />
        </div>
        <div class="col-2">
            <label for="quantity">Quantity: </label>
            <input class="properties-input" type="number" min="0" id="quantity" name="quantity" placeholder="0" />
        </div>
        <div class="col-2">
            <label for="size">Size/Weight: </label>
            <input class="properties-input" type="number" min="0" id="size" name="size" placeholder="0" />
        </div>
        <div class="col-2">
            <label for="unit">Unit: </label>
            <select id="unit" name="unit" class="properties-input">
                <option value="g">g</option>
                <option value="kg">kg</option>
                <option value="mL">ml</option>
                <option value="L">L</option>
                <option value="L">ea</option>
            </select>
        </div>
        <div class="col-2">
            <label for="type">Type: </label>
            <input class="properties-input" type="text" id="type" name="type" value="" />
        </div>
        <div class="col-2">
            <label for="aisle">Aisle: </label>
            <select id="aisle" name="aisle" class="properties-input">
                <option value="Produce">Produce</option>
                <option value="Bakery">Bakery</option>
                <option value="Meat and Poultry">
                    Meat and Poultry
                </option>
                <option value="Dairy and Eggs">
                    Dairy and Eggs
                </option>
                <option value="Beverages">Beverages</option>
            </select>
        </div>
        <div class="col-12">
            <input class="save-button" type="submit" name="" value="Submit" />
        </div>
    </form>
</div>
<div class="col-2">
    <!-- Empty Column -->
</div>
</div>
</body>

</html>