
    <footer>
    <div class="icon-element">
        <a href="#"><img src="/public/images/dzwoneczek.png" alt="notification"></a>
        <p>Powiadomienia</p>
    </div>
    <div class="icon-element">
        <a href="/products"><img src="/public/images/search.png" alt="search"></a>
        <p>Szukaj Produktów</p>
    </div>
    <div class="user-element" id="user-element">
        <a href="#"><img <?php echo "src=".$user->getLogoLink();?> alt="profile" onclick="showMenu()"></a>
        <div class="level-bar">
            <div class="level-filler"></div>
        </div>
    </div>

    <div class="icon-element">
        <a href="/shops"><img src="/public/images/restaurant.png" alt="notification"></a>
        <p>Restauracje</p>
    </div>
    <div class="icon-element">
        <a href="/settings"><img src="/public/images/settings.png" alt="search"></a>
        <p>Narzędzia</p>
    </div>
    <?php include(__DIR__.'/../common/profile_basic_view.php'); ?>
    <script type="text/javascript">
        function showMenu()
        {
            if (document.getElementById('profile_basic_view').style.height == "0vh")
            {
                document.getElementById('user-element').style.setProperty('top',"120px");
                document.getElementById('user-element').getElementsByTagName('img')[0].style.setProperty('background-color',"white");
                document.getElementById('profile_basic_view').style.setProperty('height',"100vh");
            }
            else 
            {
                document.getElementById('user-element').style.removeProperty("top");
                document.getElementById('user-element').getElementsByTagName('img')[0].style.removeProperty('background-color');
                document.getElementById('profile_basic_view').style.setProperty('height','0vh')
            }
        }
        document.getElementById('profile_basic_view').style.removeProperty('width');
    </script>
    </footer>