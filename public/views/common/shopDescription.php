<section class="information-block <?php echo is_null($main_shop) ? 'disabled' :"" ?>" id="shop-description">
    <div class="shop-details">
        <img src="<?php echo is_null($main_shop) ? '' :$main_shop->getLogoLink();?>" alt="">
        <div clas="title">
            <h1><?php echo is_null($main_shop) ? '' :$main_shop->getName();?></h1>
            <h3><?php echo is_null($main_shop) ? '' :$main_shop->addressObject->getAddress();?></h3>
            <div class="diet-information">
                <img src="/public/images/vegan.png" alt="" class="<?php echo is_null($main_shop) ? '' :$main_shop->isVegan() == true ? 'active' : 'deactive'?>">
                <img src="/public/images/vegetarian.png" alt="" class="<?php echo is_null($main_shop) ? '' :$main_shop->isVegetarian() == true ? 'active' : 'deactive'?>">
                <img src="/public/images/lactose.png" alt="" class="<?php echo is_null($main_shop) ? '' :$main_shop->isLactoseFree() == true ? 'active' : 'deactive'?>">
                <img src="/public/images/gluten.png" alt="" class="<?php echo is_null($main_shop) ? '' :$main_shop->isGlutenfree() == true ? 'active' : 'deactive'?>">
            </div>
        </div>
    </div>
    <h2> Lokalizacja i zdjęcia</h2>
    <div class="photos">
        <img src="<?php echo is_null($main_shop) ? '' : $main_shop->getPhotoLink();?>" alt="">
        <iframe src="<?php echo $main_shop->getgoogleEmbeddedLink()?>" width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <h2>Opinie użytkowników: <span id="grade">2.5/5</span></h2>
    
</section>