<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/login.css">
    <meta name="google-signin-client_id"
        content="546023060518-r9o0hkgfa2nlenu9udbkjotk77hb3dmo.apps.googleusercontent.com">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <script defer src="/public/js/login.js"></script>
    <title>LOGIN</title>
</head>

<body class="login">
    <div class="left-side">
        <div class="logo">
            <img src="public/images/logo.svg" alt="logo" class="logo">
            <h1 class="Title">GlutenOff</h1>
        </div>
        <ul>Sprawdź, które produkty są dla ciebie bezpieczne</ul>
        <br>
        <ul>Znajdź sklep polecany przez użytkowników</ul>
        <br>
        <ul>Podziel się opinią z innymi użytkownikami </ul>
    </div>
    <div class="right-side">
        <h4>Rejestracja</h4>
        <form class="register" action="register" onsubmit="return validateRegistrationForm()" method="POST">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
            <input type="text" name="name" id="name" value="name">
            <input type="text" name="surname" id="surname" value="surname">        
            <input type="email" name="email" id="emal"value="Login">
            <input type="password" name="password" id="password" value="Password">
            <input type="password" name="password2" id="password2" value="Confirm password">
            <input list="Cities" name="city">
                <datalist id="Cities">
                    <?php foreach ($cities as $city): ?>
                    <option value=<?php echo $city->getName()?>>
                    <?php endforeach;?>
                </datalist>
            <button type="submit" id="rejestracja">Utwórz konto</button>
            <button type="button" id="logowanie" onclick="loginPage()">Zaloguj</button>
        </form>
    </div>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</body>

</html>