<?php // let's see if the blueprint for this page allows custom header-images, else we fallback to default ones
$headerImage = $page->images()->filterBy('template', 'header-image')->shuffle()->first() ?>
<?php if (empty($headerImage)): ?>
  <?php $finalHeaderImage = $site->images()->filterBy('template', 'header-image')->shuffle()->first() ?>
<?php else: ?>
  <?php $finalHeaderImage = $headerImage ?>
<?php endif ?>
<?= $finalHeaderImage->crop('2100', '900') ?>
