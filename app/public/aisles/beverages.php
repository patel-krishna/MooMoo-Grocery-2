<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "aisle-header.php") ?>

<!-- Aisle Title -->
<section class="jumbotron jumbotron-beverages">
  <div class="container">
    <h1 class="aisle-title">Beverages</h1>
  </div>
</section>
<!-- Featured Products -->
<section class="featured-products aisle-featured">
    <h2>Featured Products</h2>
    <hr />
    <div class="container">
        <!-- Juice Section -->
        <h4>Juice</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_beverages', 0); ?>
        </div> 
        <!-- end of row -->
        <hr />
        <!-- Sparkling Water Section -->
        <h4>Sparkling Water</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_beverages', 1); ?>
        </div>
        <!-- end of row -->
        <hr />
        <!-- Soft Drinks Section -->
        <h4>Soft Drinks</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_beverages', 2); ?>
        </div>
         <!-- end of row -->
    </div>
</section>

<?php include(TEMPLATE_FRONT . DS . "aisle-footer.php") ?>