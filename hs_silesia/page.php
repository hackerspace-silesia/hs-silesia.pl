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
          <div class="col-sm-12">
            <?php while ( have_posts() ) : the_post(); ?>
            <h3 class='text-center' id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            <?php echo get_the_post_thumbnail(); ?>
            <p class="content">
            <?php the_content(); ?>
            </p>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
    <?php include (TEMPLATEPATH . "/templates/footer.php"); ?>
    <?php include (TEMPLATEPATH . "/templates/loader.php"); ?>
    <?php wp_footer() ?>
  </body>
</html>