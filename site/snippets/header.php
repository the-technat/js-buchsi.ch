<html lang="de">
<head>
  <title><?= $site->title()->html() ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- JavaScript -->
  <script src="https://kit.fontawesome.com/1233a33470.js" crossorigin="anonymous"></script>
  <?= js('@auto',true) ?>
  <!-- CSS -->
  <?= css('assets/css/index.css') ?>
  <?= css('@auto') ?>
  <!-- Facicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/icons/favicon/favicon-32x32.png')->url() ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= asset('assets/icons/favicon/favicon-16x16.png')->url() ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/icons/favicon/apple-touch-icon.png')->url() ?>">
  <link rel="manifest" href="<?= asset('assets/icons/favicon/site.webmanifest')->url() ?>">
  <link rel="mask-icon" href="<?= asset('assets/icons/favicon/safari-pinned-tab.svg')->url() ?>" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="<?= asset('assets/icons/favicon/browserconfig.xml')->url() ?>">
  <link rel="shortcut icon" href="<?= asset('assets/icons/favicon/favicon.ico')->url() ?>">
  <meta name="theme-color" content="#ffffff">
</head>
<body>
  <header>
    <div class="container header">
      <?php $logo=asset('assets/icons/Logo-JB.svg') ?>
      <a class="logo" href=<?= page('home')->url() ?>><?= $logo->read() ?></a>
      <?php snippet('nav') ?>
    </div>
    <div class="header-image">
      <?php snippet('headerImage') ?>
    </div>
  </header>
  <main>
   <div class="container main">
