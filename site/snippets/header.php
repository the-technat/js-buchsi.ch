<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/icons/favicon/apple-touch-icon.png')->url() ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/icons/favicon/favicon-32x32.png')->url() ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= asset('assets/icons/favicon/favicon-16x16.png')->url() ?>">
  <link rel="manifest" href="<?= asset('assets/icons/favicon/site.webmanifest')->url() ?>">
  <link rel="mask-icon" href="<?= asset('assets/icons/favicon/safari-pinned-tab.svg')->url() ?>" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <link rel="shortcut icon" href="<?= asset('assets/icons/favicon/favicon.ico')->url() ?>">
  <meta name="msapplication-config" content="<?= asset('assets/icons/favicon/browserconfig.xml')->url() ?>">
  <meta name="theme-color" content="#ffffff">
  <title><?= $site->title()->html() ?></title>
  <?= css('assets/css/index.css') ?>
</head>
<body>
  <header>
    <div class="container header-top">
      <?php $logo=asset('assets/icons/Logo-JB.svg') ?>
      <a class="logo" href=<?= page('home')->url() ?>><?= $logo->read() ?></a>
      <nav>
        <ul>
          <?php foreach ($site->children()->listed() as $item): ?>
            <li>
              <a href="<?= $item->url() ?>"><?= $item->title() ?></a>
              <?php if ($item->hasChildren()): ?>
                <ul class="subnav">
                  <?php foreach ($item->children()->listed() as $subitem): ?>
                    <li><a href="<?= $subitem->url() ?>"><?= $subitem->title() ?></a></li>
                  <?php endforeach ?>
                </ul>
              <?php endif ?>
            </li>
          <?php endforeach ?>
        </ul>
      </nav>
    </div>
    <?php // let's see if the blueprint for this page allows custom header-images, else we fallback to default ones
    $headerImage = $page->images()->filterBy('template', 'header-image')->shuffle()->first() ?> 
    <?php if (empty($headerImage)): ?>
			<?php $finalHeaderImage = $site->images()->filterBy('template', 'header-image')->shuffle()->first() ?> 
		<?php else: ?>
			<?php $finalHeaderImage = $headerImage ?>
		<?php endif ?>
		<?= $finalHeaderImage->crop('2100', '900') ?>
  </header>
  <main>
   <div class="container">
