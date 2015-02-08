<?php

wp_register_script('magic-loader', get_stylesheet_directory_uri() . '/js/magic-loader.js', array('jquery'));
wp_enqueue_script('magic-loader');

wp_enqueue_style( 'font-awesome' , get_stylesheet_directory_uri() . '/css/font-awesome.min.css', null, '4.3.0', 'all');

?>