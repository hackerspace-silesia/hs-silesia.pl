<html>
  <head>
    <?php include (TEMPLATEPATH . "/templates/head.php"); ?>
    <?php wp_head() ?>
    <link rel="stylesheet" href="<?php echo TEMPLATEPATH . '/css/style.min.css' ?>">
  </head>
  <body  <?php body_class() ?> >
    <div class="head-bg">
      <img src="assets/logo.png" class="center-block" />
    </div>
    <?php include (TEMPLATEPATH . "/templates/header.php"); ?>
    <div class="container" id="content-main">
      <?php include (TEMPLATEPATH . "/templates/contact.php"); ?>
    </div>
    <?php include (TEMPLATEPATH . "/templates/footer.php"); ?>
    <?php include (TEMPLATEPATH . "/templates/loader.php"); ?>
    <?php wp_footer() ?>
    <script src="<?php echo TEMPLATEPATH . '/js/scripts.min.js'?>"></script>
  </body>
</html>