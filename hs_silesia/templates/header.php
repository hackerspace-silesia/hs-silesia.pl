<!--
WURDPRESS MAGICKS
IT SO RETARDED
MY BRAIN PONY
AND HURTS LOAD
-->
<div class="head-bg">
  <img src="<?php echo get_template_directory_uri() . '/assets/logo.png' ?>" class="center-block" />
</div>
<header>
  <div class="container">
    <?php wp_nav_menu(array(
    'theme_location' =>  'primary',
    'menu_class'      => 'nav nav-pills pull-right row magic-links',
    'menu_id'         => 'primary-menu'
    )); ?>
  </div>
</header>