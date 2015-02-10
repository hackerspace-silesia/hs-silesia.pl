<?php
/*
* Template Name: With image Boxes
*/
get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header-full">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content-full">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
		$child_posts = types_child_posts('image-link');
		foreach ($child_posts as $child_post) {
		    $title = $child_post->fields['location'];
		    $url = $child_post->field['link'];
		    $image = $child_post->field['image'];

		    echo "<a href='$url' />";
		    if ($title) echo "<h3>$title</h3>";
		    if ($image) echo "<img src='$image' />";
		    echo $child_post->post_title; echo $child_post->fields['location'];
		    echo "</a>";
		}
						?>

					</div><!-- .entry-content -->

					<footer class="entry-meta-full">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<!-- ?php get_sidebar(); ? --> 
 
<?php get_footer(); ?>
