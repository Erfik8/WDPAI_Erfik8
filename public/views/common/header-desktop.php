<header>
        <a href="/">
            <img src="/public/images/logo.svg" class="logo" alt="logo">
        </a>
        <div class="header-bar">
            <img class="notification" <?php echo "src=".__IMAGES__."dzwoneczek.png";?> alt="powiadomienia">
            <img class="profile" <?php echo "src=".$user->getLogoLink();?> alt="profil" onclick="showMenu()">
        </div>
        <script type="text/javascript">
        function showMenu()
        {
            document.getElementById('profile_basic_view').style.setProperty('width','100vw');
        }
        </script>
</header>
