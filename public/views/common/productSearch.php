<div class="product-search">
    <div class="input">
        <input type="text" id="searchProductInput" onkeyup="sendProductSearchRequest(event)">
        <img class="search-icon" <?php echo "src=".__IMAGES__."search.png"?> alt="search">
    </div>
    <div class="products-list" id="products-list">
        <?php foreach ($products as $product): ?>     
        <a <?php echo "href=/products?product_id=".$product->getId() ?>>
            <div class="product-element">
                <img class="product-images" <?php echo "src=".__IMAGES__."sloik.png"?> alt="produkt">
                <div class="description">
                    <h3><?php echo $product->getName(17)?></h3>
                    <p>Firma: łowicz</p>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
    

</div>