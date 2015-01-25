<html>
  <head>
    <?php include (TEMPLATEPATH . "/templates/head.php"); ?>
    <?php wp_head() ?>
  </head>
  <body  <?php body_class() ?> >
    <?php include (TEMPLATEPATH . "/templates/header.php"); ?>
    <div class="container" id="content-main">
      <div class="section" id='page-<?php the_ID(); ?>' style="display:block;">
        <div class='row'>
          <div class="col-sm-6">
            <?php while ( have_posts() ) : the_post(); ?>
            <h3 class='text-center' id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            <?php echo get_the_post_thumbnail(); ?>
            <p class="blogdate"> <?php the_time('F jS') ?>, <?php the_time('Y') ?></p>
            <p class="content">
            <?php the_content(); ?>
            </p>
            <p class="blogcategory">Categories: <?php the_category(' &bull; '); ?></p>
            <p class="blogtags"><?php the_tags(); ?> </p>
            <?php endwhile; ?>
          </div>
          <?php include (TEMPLATEPATH . "/templates/news.php"); ?>
        </div>
      </div>
    </div>
    <?php include (TEMPLATEPATH . "/templates/footer.php"); ?>
    <?php include (TEMPLATEPATH . "/templates/loader.php"); ?>
    <?php wp_footer() ?>
  </body>
</html>