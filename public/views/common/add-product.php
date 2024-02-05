<?php if (isset($message) && !empty($message))
{?>
<div class="messagebox">
    <div class="messageCancel" onclick="(function (element){element.parentElement.style.display = 'none';})(this)">
        <img src="/public/images/cancel.png" alt="">
    </div>    
        <h3><?php echo $message?></h3>
    </div>
<?php }?>
<section class="information-block <?php echo is_null($main_product)  ? "" : 'disabled'?>" id="product-add">
    <form action="addProduct" class="add-product" method="POST" enctype="multipart/form-data">
        <h1>Dodaj produkt</h1>

        <h3>Nazwa</h3>
        <input type="text" name="name">
        <h3>Producent</h3>
        <input type="text" list="Companies" name="company">
        <datalist id="Companies">
            <?php foreach ($companyList as $company):
                echo "<option value='".$company->getName()."'>";
            endforeach;
            ?>
        </datalist>    

        <h3>Kategoria</h3>
        <input list="categories" name="category">
        <datalist id="categories">
            <?php foreach ($categoryList as $category):
                echo "<option value='".$category->getName()."'>";
            endforeach;?>
        </datalist>
        
        

        <h3>Etykieta</h3>
        <input type="text" name="description">
    
        <h3>Dodaj grafikę</h3>
        <input type="file" id="logo" name="logo" accept="image/png, image/jpeg" />
        
        <h5>Zaznacz przyciskiem diety dla danego produktu</h5>
        
        <div class="diet-group">
            <button type="button" onclick="switchValue(this)" value="False" class="False">
                <input type="text" name="isVegan" value="False" class="False">
                <img src="/public/images/vegan.png" alt="">
            </button>
            <button type="button" onclick="switchValue(this)" value="False" class="False">
                <input type="text" name="isVegetarian" value="False"  class="False">
                <img src="/public/images/vegetarian.png" alt="">
            </button>
            <button type="button" onclick="switchValue(this)" value="False" class="False">
                <input type="text" name="isLactoseFree" value="False" class="False">
                <img src="/public/images/lactose.png" alt="">
            </button>
            <button type="button"  onclick="switchValue(this)" value="False" class="False"> 
                <input type="text" name="isGlutenFree" value="False"  class="False">
                <img src="/public/images/gluten.png" alt="">
            </button>
        </div>
        <input type="submit">
    </form>
    <script type="text/javascript">
        function switchValue(relatedButton)
        {
            if(relatedButton.value == 'true')
            {
                relatedButton.classList.add('False');
                relatedButton.classList.remove('True');
                relatedButton.value = 'false';
                relatedButton.getElementsByTagName('input')[0].value = 'false';         
            }
            else
            {   
                relatedButton.classList.add('True');
                relatedButton.classList.remove('False');
                relatedButton.value = 'true';
                relatedButton.getElementsByTagName('input')[0].value = 'true';
            }       
        }

    </script>
</section>