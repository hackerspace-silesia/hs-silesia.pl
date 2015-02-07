var JINJA2WORDPRESS = {
  news: {
    from: '\{\{ macros.createNewsList(news) \}\}',
    to: " <?php $postlist=get_posts( 'sort_column=menu_order&sort_order=asc' ); $posts=array(); foreach ( $postlist as $post ){$id=get_the_ID($post); echo sprintf(' <li id=\"post-%s\"> <a href=\"%s\" rel=\"bookmark\" title=\"%s\"> %s <time>%s</time> %s </a> </li>', $id, get_permalink($id), $post->post_title, get_the_author_meta( 'user_nicename' , $post->post_author ), get_the_time(\"d.m.y\", $id), $post->post_title);}?>"
  },
  macros: {
    from: /\{\%-? (end)?macro ([a-zA-Z]*\(*([a-z]*)\))? ?-?\%\}/gi,
    to: ''
  },
  imports: {
    from: /\{\%-? import '.* -?\%\}/,
    to: ''
  },
  include: {
    from: / include \"/g,
    to: " include (TEMPLATEPATH . \"/"
  },
  openingTag: {
    from: /\{\%? /g,
    to: "<?php "
  },
  closingTag: {
    from: / -?\%\}/g,
    to: " ?>"
  },
};

module.exports = JINJA2WORDPRESS;