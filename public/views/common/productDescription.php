<section class="information-block <?php echo is_null($main_product) ? 'disabled' :"" ?>" id="product-description">
    <img src="/public/images/sloik.png" alt="sloik" class="product-image">
    <h1><?php echo is_null($main_product) ? '' : $main_product->getName()?></h1>
    <div class="diet-information">
        <img src="/public/images/vegan.png" alt="" class="<?php echo is_null($main_product) ? '' :$main_product->isVegan() == true ? 'active' : 'deactive'?>">
        <img src="/public/images/vegetarian.png" alt="" class="<?php echo is_null($main_product) ? '' :$main_product->isVegetarian() == true ? 'active' : 'deactive'?>">
        <img src="/public/images/lactose.png" alt="" class="<?php echo is_null($main_product) ? '' :$main_product->isLactoseFree() == true ? 'active' : 'deactive'?>">
        <img src="/public/images/gluten.png" alt="" class="<?php echo is_null($main_product) ? '' :$main_product->isGlutenfree() == true ? 'active' : 'deactive'?>">
    </div>
    <h3>Producent: Łowicz</h3>
    <span class="description">
        <?php echo is_null($main_product) ? '' :$main_product->getDescription()?>
    </span>
</section>