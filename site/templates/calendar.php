<?php snippet('header') ?>

<section class="intro">
  <?= $page->intro()->kirbytext() ?> 
</section>

<?php if (!empty($page->files()->filterBy('template', 'flyer')->first())) : ?>
<section class="download">
  <a href="<?= $page->files()->filterBy('template', 'flyer')->first()->mediaUrl() ?>">
    <button class="filebutton"><i class="fas fa-file-download"></i> Flyer</button>
  </a>
</section>
<?php endif ?>

<hr>

<section class="events">
  <ul>
    <?php foreach ($events as $event): ?>
      <?php if ($event->special() == "true"): ?>
        <li class="event special">
        <?php $toggleclass = 'moreinfo'; ?>
      <?php else: ?>
        <li class="event">
        <?php $toggleclass = ''; ?>
      <?php endif ?>

        <div class="event-header <?=$toggleclass?>">
          <?php if ($event->blueprint()->title() == "JS-Nami") : ?>
            <time><?= $event->date()->toDate('d.m.Y') ?> <?= $event->starttime() ?> - <?= $event->endtime() ?></time>
          <?php else: ?>
            <time><?= $event->startdate()->toDate('d.m.Y') ?> - <?= $event->enddate()->toDate('d.m.Y') ?></time>
          <?php endif ?>
          <h3><?= $event->thema()->html() ?></h3>
        </div>

        <?php if ($event->special() == "true") : ?>
        <div class="event-contentmore">
          <div class="event-infos"><?= $event->infos() ?></div>
          <div class="event-location">
            <?php $lat = $event->location()->toLocation()->lat() ?>
            <?php $lon = $event->location()->toLocation()->lon() ?>
            <i class="fas fa-map-pin"></i> <a href="https://www.openstreetmap.org/?mlat=<?= $lat ?>&amp;mlon=<?= $lon ?>#map=19/<?= $lat ?>/<?= $lon ?>">Treffpunkt</a>
            <br>
          </div>
        </div>
        <?php endif ?>

      </li>
    <?php endforeach ?>
  </ul>
</section>
<?php snippet('footer') ?>
