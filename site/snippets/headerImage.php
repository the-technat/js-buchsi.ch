<?php
  // get header-image from page
  $headerImage = $page->images()->filterBy('template', 'header-image')->first();
  // if there is no header-image get a random header-image from the global ones
  if (empty($headerImage)) {
    $headerImage = $site->images()->filterBy('template', 'header-image')->shuffle()->first();
  }

  // define how much crop we need
  if ($headerImage->slim()->toBool() === true) {
    $headerImage = $headerImage->crop('2100', '300');
  } else {
    $headerImage = $headerImage->crop('2100', '900');
  }
?>
<img src="<?= $headerImage->url() ?>" alt="header-image" style="width:100%;">
<?php if ($headerImage->overlay() != ""): ?>
  <div class="header-image-centered-text"><h1><?= $headerImage->overlay() ?></h1></div>
<?php endif ?>