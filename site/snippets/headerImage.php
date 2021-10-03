<?php
  // get header-image from page
  $headerImage = $page->images()->filterBy('template', 'header-image')->first();
  // if there is no header-image get a random header-image from the global ones
  if (empty($headerImage))
    $headerImage = $site->images()->filterBy('template', 'header-image')->shuffle()->first();
?>
<img src="<?= $headerImage->crop('2100', '900')->url() ?>" alt="header-image">
