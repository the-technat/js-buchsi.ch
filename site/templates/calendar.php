<?php snippet('header') ?>
  <section class="events">
    <h1><?= $page->title()->html() ?></h1>

    <?php
      $events = $page->children()->listed();
      if ($events->count() > 0):
    ?>
    <ul>
      <?php foreach ($events as $event): ?>
      <?php if ($event->special() == "true") : ?>
        <li class="event special">
      <?php else: ?>
        <li class="event">
      <?php endif ?>
        <h3><?= $event->thema()->html() ?></h3>

        <?php if ($event->blueprint()->title() == "JS-Nami") : ?>
          <time><?= $event->date()->toDate('d.m.Y') ?></time>
        <?php else: ?>
          <time><?= $event->startdate()->toDate('d.m.Y') ?> - <?= $event->enddate()->toDate('d.m.Y') ?></time>
        <?php endif ?>

        <p><?= $event->infos() ?></p>

        <div class="event-location">
            <?= $event->location()->html() ?>
        </div>

      </li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>

  </section>
<?php snippet('footer') ?>
