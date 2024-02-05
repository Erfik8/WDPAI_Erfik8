<section id="profile_basic_view" class="profile_basic_view"  onclick="hideMenu()" style="width: 0vw; height:0vh;">
    <div class="profile_view_box" onclick="event.stopPropagation()">
        <img <?php echo "src=".$user->getLogoLink();?> alt="">
        <h1><?php echo $user->getName().' '.$user->getSurname();?></h1>
        <div id="levelBar">
            <div id="level_bar" class="outer_level_bar">
                <span class>Level: <?php echo " 12"?></span>
                <div class="inner_level_bar" style="width: 30%;">
                </div>
            </div>
        </div>
        <?php include(__DIR__.'/../common/user-product-list.php'); ?>
         <button type="button" class="settings" onclick="window.location = '/userSettings'">Ustawienia</button>
         <button type="button" class="logout" onclick="window.location = '../logout'">Wyloguj</button>
    </div>
    <script type="text/javascript">
        function hideMenu()
        {
            document.getElementById('profile_basic_view').style.setProperty('width','0vw');
        }
    </script>
</section>