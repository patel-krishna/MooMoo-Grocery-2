<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "product-header.php") ?>
<?php 
    $product_aisle = htmlspecialchars($_GET["category"]);
    $product_id =  htmlspecialchars($_GET["id"]);
    $product_category = ucfirst(explode("_", $product_aisle)[1]);
    $product_obj = getProductXml($product_aisle, $product_id);
?>

<body class="d-flex flex-column min-vh-100" onload="loadQty(<?php echo htmlspecialchars($_GET['id']); ?>)"
    onbeforeunload="saveQty(<?php echo htmlspecialchars($_GET['id']); ?>)">
    <!-- Navigation bar linking to home and menus -->
    <?php include(TEMPLATE_FRONT . DS . "product-navbar.php") ?>

    <main>
        <section <?php echo 'class="jumbotron ' . getJumbotron($product_aisle) . '"'; ?>>
            <div class="container">
                <h1 class="display-5 text-white"><?php echo $product_category; ?></h1>
            </div>
        </section>
        <!-- Nav breadcrumbs to go back to upper directory -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a
                        href="../aisles/<?php echo $product_category; ?>.php"><?php echo $product_category; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $product_obj->name; ?></li>
            </ol>
        </nav>
        <!-- Main content -->
        <div class="container-fluid">
            <div class="row">
                <!-- Product image -->
                <div class="col-md-6" id="productImage">
                    <img src="../images/<?php echo $product_obj->image; ?>" class="img-fluid"
                        alt="Image of <?php echo $product_obj->name; ?>." />
                </div>

                <!-- Product description, pricing, quantity, add to cart button. -->
                <div class="col-md-6" id="productDescription">
                    <h3 id="productName"><?php echo $product_obj->name; ?></h3>
                    <h5><?php echo $product_obj->unit; ?></h5>
                    <h6>&#36;<?php echo $product_obj->price_per_unit; ?></h6>
                    <h5>&#36;<span id="unit-price"><?php echo $product_obj->price; ?></span> /ea</h5>
                    <form action="" method="POST">
                        <!-- Optional Flavour or Cut control -->
                        <?php
                         if (count($product_obj->options) >= 1) {
                             getOptions($product_obj->options->children());
                         }
                         ?>
                        <div class="form-group w-25">
                            <input id="quantity" class="form-control form-control-lg" type="number" name="quantity"
                                min="1" value="1" onchange="calculateSubtotal()" />
                            <label for="quantity">Quantity</label>
                        </div>
                        <h4>Subtotal: &#36;<span id="subtotal"></span></h4>
                        <button type="button" class="btn btn-outline-dark" onclick="moreDescription()">More
                            Description</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addedModal">Add
                            to Cart</button>
                        <!-- Pop up for add to cart -->
                        <div class="modal fade" id="addedModal" tabindex="-1" aria-labelledby="ProductLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content text-center">
                                    <div class="modal-header">
                                        <h4 class="modal-title w-100" id="ProductLabel">Add To Cart</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body w-100">
                                        <p>Add <span id="popup-quantity"></span> x <?php echo $product_obj->name; ?> to
                                            cart</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <input type="submit" class="btn btn-primary" id="add-cart-btn"
                                            value="Confirm" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="more-description" style="margin: 10px; display: none;">
                        <p>
                            <?php echo $product_obj->description; ?>
                            <p style="color: gray; font-size: smaller;">Serial #: <?php echo $product_obj->serial; ?>
                            </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>