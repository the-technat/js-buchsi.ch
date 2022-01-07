<?php snippet('header') ?>


<section class="imprint">
  <h1><?= $page->title()->html() ?></h1>
  <b><?= $page->owner()->html() ?> (<?= $page->region()->html() ?>)<br></b>
  <?= $page->contaktperson()->html() ?><br>
  <?= $page->street()->html() ?><br>
  <?= $page->plz()->html() ?> <?= $page->location()->html() ?><br> <br>
  <?= $page->mail()->html() ?><br>
  <?= $page->phone()->html() ?><br><br>
</section>

<section class="accountability">
  <?= $page->accountability()->kirbytext() ?>
</section>

<section class="privacy">
  <hr>
  <?= $page->privacy()->kirbytext() ?>
</section>

<?php snippet('footer') ?>
