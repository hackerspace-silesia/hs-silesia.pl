<div class="col-sm-5 col-sm-offset-1">
  <h3 class='text-center'>Aktualności</h3>
  <ul class='news'>
    <?php while (have_posts()) : the_post(); ?>
      <li id="post-<?php the_ID(); ?>">
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_author() ?>
          <time><?php the_time('F jS, Y') ?></time>
          <?php the_title(); ?>
        </a>
      </li>
    <?php endwhile; ?>
  </ul>
</div>