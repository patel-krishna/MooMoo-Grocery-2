<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "aisle-header.php") ?>

<!-- Aisle Title -->
<section class="jumbotron jumbotron-produce">
    <div class="container">
        <h1 class="aisle-title">Fruits and Vegetables</h1>
    </div>
</section>
<!-- Featured Products -->
<section class="featured-products aisle-featured">
    <h2>Featured Products</h2>
    <hr />
    <div class="container">
        <!-- Fruits Section -->
        <h4>Fruits</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_produce', 0); ?>
        </div> 
        <!-- end of row -->
        <hr />
        <!-- Vegetables Section -->
        <h4>Vegetables</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_produce', 1); ?>
        </div>
        <!-- end of row -->
    </div>
</section>

<?php include(TEMPLATE_FRONT . DS . "aisle-footer.php") ?>