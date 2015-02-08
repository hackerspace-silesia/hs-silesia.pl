<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>
		</footer><!-- #colophon -->
	</div><!-- #page -->
	<?php wp_footer(); ?>
  <!-- Loader -->
  <div class="milky-way--holder" style="display:none;">
    <div class="milky-way"></div>
    <div class="loader"><span>Pinky Pie is waiting for a new page</span></div>
  </div>
  <!-- End loader -->
</body>
</html>