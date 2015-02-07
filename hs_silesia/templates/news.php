<div class="col-sm-5 col-sm-offset-1">
  <h3 class='text-center'>Aktualności</h3>
  <ul class='news magic-links'>
    <?php
    $postlist = get_posts( 'sort_column=menu_order&sort_order=asc' );
    $posts = array();
    foreach ( $postlist as $post ) {
      $id = get_the_ID($post);
       echo sprintf('
         <li id="post-%s">
          <a href="%s" rel="bookmark" title="%s">
            <time>%s</time>
            %s
          </a>
        </li>
        ', $id, get_permalink($id), $post->post_title, get_the_time("d.m.y", $id), $post->post_title);
    }
    ?>
  </ul>
</div>
