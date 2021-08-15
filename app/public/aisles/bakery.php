<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "aisle-header.php") ?>


<!-- Aisle Title -->
<section class="jumbotron jumbotron-bakery">
    <div class="container">
        <h1 class="aisle-title">Bakery</h1>
    </div>
</section>
<!-- Featured Products -->
<section class="featured-products aisle-featured">
    <h2>Featured Products</h2>
    <hr />
    <div class="container">
        <!-- Bread Section -->
        <h4>Bread</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_bakery', 0); ?>
        </div> 
        <!-- end of row -->
        <hr />
        <!-- Pastries Section -->
        <h4>Pastries</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_bakery', 1); ?>
        </div>
        <!-- end of row -->
        <hr />
        <!-- Desserts Section -->
        <h4>Desserts</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_bakery', 2); ?>
        </div>
         <!-- end of row -->
    </div>
</section>

<?php include(TEMPLATE_FRONT . DS . "aisle-footer.php") ?>