<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "aisle-header.php") ?>

<!-- Aisle Title -->
<section class="jumbotron jumbotron-dairy">
    <div class="container">
        <h1 class="aisle-title">Dairy and Eggs</h1>
    </div>
</section>
<!-- Featured Products -->
<section class="featured-products aisle-featured">
    <h2>Featured Products</h2>
    <hr />
    <div class="container">
        <!-- Milk Products Section -->
        <h4>Milk Products</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_dairy', 0); ?>
        </div> 
        <!-- end of row -->
        <hr />
        <!-- Egg Section -->
        <h4>Egg Products</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_dairy', 1); ?>
        </div>
        <!-- end of row -->
        <hr />
        <!-- Cheese Section -->
        <h4>Cheese Products</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_dairy', 2); ?>
        </div>
         <!-- end of row -->
    </div>
</section>

<?php include(TEMPLATE_FRONT . DS . "aisle-footer.php") ?>