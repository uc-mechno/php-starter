<?php
// index.php
require_once('config/functions.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes,minimum-scale=1.0,maximum-scale=2.0">
  <?php include(include_path('gtag-head.php')); ?>
  <?php include(include_path('favicon.php')); ?>
  <?php include(include_path('font.php')); ?>
  <?php include(include_path('lib.php')); ?>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="<?php echo asset('js/common.js'); ?>" defer></script>
  <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>">
  <?php include(include_path('json-ld.php')); ?>
</head>

<body>
  <?php include(include_path('gtag-body.php')); ?>
  <div class="wrapper">

    <?php include(include_path('header.php')); ?>

    <div class="scroll-observer" aria-hidden="true"></div><!-- /.scroll-observer -->

    <main class="main">

      <?php include(include_path('top-hero.php')); ?>

      <?php include(include_path('top-about.php')); ?>

      <?php include(include_path('top-news.php')); ?>

    </main><!-- /.main -->

    <?php include(include_path('footer.php')); ?>

  </div><!-- /.wrapper -->
</body>

</html>
