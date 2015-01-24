<div class="section" id='page-<?php the_ID(); ?>' style="display:block;">
  <div class='row'>
    <div class="col-sm-6">
      <h3 class='text-center'>O nas</h3>
      <?php
      $description = get_bloginfo( 'description', 'display' );
      if ( $description || is_customize_preview() ) : ?>
      <p class="site-description"><?php echo $description; ?></p>
      <? php else: ?>
      <p class="site-description"><strong>Hackerspace</strong> jest to społeczność kreatywnych ludzi z różnych obszarów zainteresowań związanych z technologiami, którzy spotykają się w wspólnym miejscu, gdzie mogą tworzyć, integrować się oraz realizować zwariowane projekty.</p>
      <p class="site-description"><strong>Hackerspace Silesia</strong> tworzą ludzie z całego województwa śląskiego i nie tylko. Jeżeli chcesz zobaczyć co robimy, oraz jak działamy to zapraszamy Ciebie na nasze czwartkowe spotkania o godzinie 18.00.</p>

      <?php endif; ?>
    </div>
    <?php include (TEMPLATEPATH . "/templates/news.php"); ?>
  </div>
</div>