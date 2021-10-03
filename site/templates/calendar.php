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
        <?php $toggleclass = 'moreinfo'; ?>
        <li class="event special">
      <?php else: ?>
        <?php $toggleclass = ''; ?>
        <li class="event">
      <?php endif ?>
        <div class="event-header <?=$toggleclass?>">
          <?php if ($event->blueprint()->title() == "JS-Nami") : ?>
            <time><?= $event->date()->toDate('d.m.Y') ?></time>
          <?php else: ?>
            <time><?= $event->startdate()->toDate('d.m.Y') ?> - <?= $event->enddate()->toDate('d.m.Y') ?></time>
          <?php endif ?>
          <h3><?= $event->thema()->html() ?></h3>
        </div>

        <?php if ($event->special() == "true") : ?>
        <div class="event-contentmore">
          <div class="event-infos"><?= $event->infos() ?></div>
          <div class="event-location">
            <?php $location = $event->location()->toLocation() ?>
            <p>Strasse: <?= $location->address() ?> <?= $location->number() ?></p>
            <p>PLZ: <?= $location->postcode() ?></p>
            <p>Ort: <?= $location->city() ?></p>
          </div>
        </div>
        <?php endif ?>

      </li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>

  </section>
<?php snippet('footer') ?>
