<!--
WURDPRESS MAGICKS
IT SO RETARDED
MY BRAIN PONY
AND HURTS LOAD
 -->
<header>
    <div class="container">
        <!-- <ul class=""> -->
            <!--- plz normal links -->
            <?php wp_nav_menu(array(
            'theme_location' =>  'primary',
            'depth' => 1,
            'link_before' => '<li class="menu-item">',
            'link_after' => '</li>',
            'items_wrap' => '<ul id="%1$s" class="%2$s nav nav-pills pull-right row">%3$s</ul>'
            )); ?>
            <!--
            <li><a href="#page">Page</a></li>
            <li><a href="#about">O nas</a></li>
            <li><a href="#place">Miejsce</a></li>
            <li><a href="#community">Społeczności</a></li>
            <li><a href="#calendar">Kalendarz</a></li>
            <li><a href="#gallery">Galeria</a></li>
            <li><a href="#partners">Partnerzy</a></li>
            <li><a href="#contact">Kontakt</a></li>
            -->
        <!-- </ul> -->
    </div>
</header>
