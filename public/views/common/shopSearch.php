<div class="shop-search">
    <div class="input">
        <input type="text" id="searchShopInput" onkeyup="sendShopSearchRequest(event)">
        <img class="search-icon" <?php echo "src=".__IMAGES__."search.png"?> alt="search">
    </div>
    <div class="shops-list" id="shops-list">
    <?php foreach ($shops as $shop): ?>
        <a href="/shops?shop_id=<?php echo $shop->getId()?>?>">
            <div class="shop-element">
                <img class="shop-images" <?php echo "src=".__IMAGES__."sloik.png"?> alt="produkt">
                <div class="description">
                    <h3><?php echo $shop->getName(20)?></h3>
                    <p><?php echo $shop->addressObject->getAddress()?></p>
                    <p>Polecane: 2365</p>
                </div>
                <div class="diet-list">
                    <img <?php echo "src=".__IMAGES__."lactose.png"?> alt="lactose" class="diets <?php echo $shop->isLactoseFree() == false ? 'deactive' : 'active'?>">
                    <img <?php echo "src=".__IMAGES__."vegan.png"?> alt="vegan" class="diets <?php echo $shop->isVegan() == false ? 'deactive' : 'active'?>">
                    <img <?php echo "src=".__IMAGES__."vegetarian.png"?> alt="vegetarian" class="diets <?php echo $shop->isVegetarian() == false ? 'deactive' : 'active'?>">
                    <img <?php echo "src=".__IMAGES__."gluten.png"?> alt="gluten" class="diets <?php echo $shop->isGlutenFree() == false ? 'deactive' : 'active'?>">
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
    

</div>