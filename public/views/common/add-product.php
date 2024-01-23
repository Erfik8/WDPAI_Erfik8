<section class="information-block disabled">
    <form action="add" class="add-product" method="POST">
        <h1>Dodaj produkt</h1>

        <h3>Nazwa</h3>
        <input type="text">

        <h3>Producent</h3>
        <input type="text">

        <h3>Kategoria</h3>
        <input list="categories" name="Category">
        <datalist id="categories">
            <option value="Vegatable">
            <option value="Fruit">
            <option value="Poultry">
            <option value="Juice">
            <option value="Meat">
        </datalist>
        
        

        <h3>Etykieta</h3>
        <input type="text">
        
        <h3>Dodaj grafikę</h3>
        <input type="file" id="logo" name="logo" accept="image/png, image/jpeg" />
        
        <h5>Zaznacz przyciskiem diety dla danego produktu</h5>
        
        <div class="diet-group">
            <button type="button">
                <img src="/public/images/vegan.png" alt="">
            </button>
            <button type="button">
                <img src="/public/images/vegetarian.png" alt="">
            </button>
            <button type="button">
                <img src="/public/images/lactose.png" alt="">
            </button>
            <button type="button">
                <img src="/public/images/gluten.png" alt="">
            </button>
        </div>
        
        <input type="submit">
    </form>
</section>