<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<script>
		// Wordpress Theme Prevent Widget Overlap
		// by Ben Newton (BN Freelance - www.bnewton.co.uk)
		// Prevent any widgets which overlap the footer from displaying

		// Made for and tested in twentythirteen although likely can be used in others

		jQuery(document).ready(function($){
		  // Okay let's set the elements we don't want overlapping
		  postNav = $('nav.post-navigation');
		  pageNav = $('nav.paging-navigation');
		  colophon = $('#colophon');
		  comments = $('#comments');
		  respond = $('#respond');

		  // Now let's check if they exist on the page and if they do, let's get
		  // their position from the top of the page - this is the offset().top

		  // get post navigation top offset
		  if (postNav.length) { postNavFromTop = postNav.offset().top; }
		  // get page navigation top offset
		  if (pageNav.length) { pageNavFromTop = pageNav.offset().top; }

		  // get footer section top offset
		  if (colophon.length) { colophonFromTop = colophon.offset().top; }

		  // get comment section top offset
		  if (comments.length) { commentsFromTop = comments.offset().top; }
		  // get respond section top offset
		  if (respond.length) { respondFromTop = respond.offset().top; }

		  // get all sidebar widgets in array
		  widgets = $('.site-main .sidebar-container .widget');

		  // does widget overlap? true = yes | false = no
		  function widgetOverlaps(i) {

		    // check the distance to the top of the page from the very bottom of the element
		    var calculation = ($(widgets[i]).offset().top)+($(widgets[i]).height());
		    // check if the widget distance from top is greater than (X) section
		    if (postNav.length && calculation >= postNavFromTop) {
		      return true; // widget overlaps post nav
		    } else if (pageNav.length && calculation >= pageNavFromTop) {
		      return true; // widget overlaps page nav
		    } else if (comments.length && calculation >= commentsFromTop) {
		      return true; // widget overlaps comments
		    } else if (respond.length && calculation >= respondFromTop) {
		      return true; // widget overlaps response form
		    } else if (colophon.length && calculation >= colophonFromTop) {
		      return true; // widget overlaps colophon footer
		    } else {
		      return false; // widget does not overlap anything!
		    }
		  }
		  function checkWidgets() {
		    // cycle each widget in array and check if widget overlaps
		    for (i=0; i < widgets.length; i++) {
		      // if widget overlaps returns true
		      if (widgetOverlaps(i) == 1) {
		        // remove the widget from sidebar
		        $(widgets[i]).css("display", "none");
		      } else {
		        // make sure widget is visible
		        $(widgets[i]).css("display", "block");
		      }
		    }
		  }
		  // on document.ready check all widgets for overlapping
		  checkWidgets();
		  // if window is resized, re-check if widgets can fit in the sidebar
		  $(window).resize(function() {
		    checkWidgets();
		  });
		});
	</script>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</a>

			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></button>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu magic-links' ) ); ?>
					<?php get_search_form(); ?>
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->

		<div id="main" class="site-main">
