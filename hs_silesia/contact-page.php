<html>
  <head>
    <?php include (TEMPLATEPATH . "/templates/head.php"); ?>
    <?php wp_head() ?>
  </head>
  <body  <?php body_class() ?> >
    <?php include (TEMPLATEPATH . "/templates/header.php"); ?>
    <div class="container" id="content-main">
      <?php include (TEMPLATEPATH . "/templates/contact.php"); ?>
    </div>
    <?php include (TEMPLATEPATH . "/templates/footer.php"); ?>
    <?php include (TEMPLATEPATH . "/templates/loader.php"); ?>
    <?php wp_footer() ?>
  </body>
</html>