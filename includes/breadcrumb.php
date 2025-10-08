<?php
// breadcrumb.php

// URLパスを解析してセグメントを取得
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = array_values(array_filter(explode('/', trim($path, '/')), 'strlen'));

// デバッグ用
//var_dump($path, $segments);

// セグメント数に応じて階層を決定
$depth = count($segments);

?>
<div class="crumbs">
  <div class="crumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
    <span class="page" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
      <span itemprop="name"><a itemprop="item" href="/.s6/preview/">HOME</a></span>
      <meta itemprop="position" content="1">
    </span>

    <?php if ($depth >= 1): ?>
      <span class="separator">›</span>
      <span class="page" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <span itemprop="name">2階層目</span>
        <meta itemprop="position" content="2">
      </span>
    <?php endif; ?>

    <?php if ($depth >= 2): ?>
      <span class="separator">›</span>
      <span class="page" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <span itemprop="name">3階層目</span>
        <meta itemprop="position" content="3">
      </span>
    <?php endif; ?>

  </div>
</div>
