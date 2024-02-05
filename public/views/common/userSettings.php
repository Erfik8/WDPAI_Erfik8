<?php date_default_timezone_set('UTC');?>
<section class="user-settings">
    <form action="userSettings">
        <div class="user-information">
            <div class="user-photo">
                <img id="logo-image" <?php echo "src=".$user->getLogoLink();?> alt="logo" >
                <label for="logo-input">Edytuj zdjęcie</label>
                <input id="logo-input" type="file" id="logo" name="logo" accept="image/png, image/jpeg" />
            </div>
            <div class="user-description">
                <label for="name"> Imie: </label>
                <input type="text" name="name" id="name" value=<?php echo $user->getName();?>>
                <label for="surname"> Nazwisko:</label>
                <input type="text" name="surname" id="surname" value=<?php echo $user->getSurname();?>>
                <label for="email"> email</label>
                <input type="text" name="email" id="email" value=<?php echo $user->getEmail();?>>
                <label for="city">Miasto: </label>
                <input list="Cities" name="city" id="city" <?php echo "value=".$user->cityObject->getName();?>>
                    <datalist id="Cities">
                        <?php foreach ($cities as $city): ?>
                        <option value=<?php echo $city->getName()?>>
                        <?php endforeach;?>
                    </datalist>
            </div>
        </div>
        <label for="type">Typ użytkownika</label>
        <span> <?php echo $user->userTypeObject->getName(); // here later will be code to load data from database?></span>
        <?php if ($user->userTypeObject->getName() == "premium"){?>
                <label for="premium">Data okresu premium: </label>
                <span> <?php echo  $user->getPremiumEndingDate()?></span>
            <?php } 
            else
            {?>
                <button type="button">AKTYWUJ PREMIUM</button>
            <?php }
        ?>
         <button type="button" class="remove_account" onclick="alert('remove!')">Usuń konto</button>
         <button type="button" class="logout" onclick="window.location = '../logout'">Zapisz zmiany</button>

    </form>

    <script type="text/javascript">
        document.getElementById('logo-input').onchange = function (evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;
            
            // FileReader support
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function () {
                    document.getElementById('logo-image').src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }
            
            // Not supported
            else {
                // fallback -- perhaps submit the input to an iframe and temporarily store
                // them on the server until the user's session ends.
            }
        }
    </script>
</section>