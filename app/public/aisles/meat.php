<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "aisle-header.php") ?>

<!-- Aisle Title -->
<section class="jumbotron jumbotron-meat">
  <div class="container">
    <h1 class="aisle-title">Meat and Poultry</h1>
  </div>
</section>
<!-- Featured Products -->
<section class="featured-products aisle-featured">
    <h2>Featured Products</h2>
    <hr />
    <div class="container">
        <!-- Beef and Pork Section -->
        <h4>Beef &amp; Pork</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_meat', 0); ?>
        </div> 
        <!-- end of row -->
        <hr />
        <!-- Chicken Section -->
        <h4>Chicken</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_meat', 1); ?>
        </div>
        <!-- end of row -->
        <hr />
        <!-- Sausage and Bacon Section -->
        <h4>Sausage &amp; Bacon</h4>
        <div class="row featured-products-cards">
            <?php display_aisle_products('aisle_meat', 2); ?>
        </div>
         <!-- end of row -->
    </div>
</section>

<?php include(TEMPLATE_FRONT . DS . "aisle-footer.php") ?>