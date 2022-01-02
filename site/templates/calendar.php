<?php snippet('header') ?>

<section class="intro">
  <?= $page->intro()->kirbytext() ?> 
</section>

<?php if (!empty($page->files()->filterBy('template', 'flyer')->first())) : ?>
<section class="download">
  <a href="<?= $page->files()->filterBy('template', 'flyer')->first()->mediaUrl() ?>">
    <button class="button"><i class="fas fa-file-download"></i> Flyer</button>
  </a>
</section>
<?php endif ?>

<hr>

<section class="events">
  <ul>
    <?php foreach ($events as $event): ?>
    <?php
      if ($event->special() == "true" || $event->blueprint()->title() == "Lager") {
        $toggleclass = 'special';
      } else {
        $toggleclass = '';
      } 
    ?>
    <li class="event <?= $toggleclass ?>">
      <div class="event-header <?=$toggleclass?>">
        <?php if ($event->blueprint()->title() == "JS-Nami") : ?>
          <time><?= $event->date()->toDate('d.m.Y') ?> <?= $event->starttime() ?> - <?= $event->endtime() ?></time>
        <?php else: ?>
          <time><?= $event->startdate()->toDate('d.m.Y') ?> - <?= $event->enddate()->toDate('d.m.Y') ?></time>
        <?php endif ?>
        <h3><?= $event->thema()->html() ?></h3>
      </div>

      <div class="event-body <?= $toggleclass ?>">
        <div class="event-infos">
          <?= $event->infos()->kirbytext() ?>
          <?php if($event->signallowed()->toBool() === true ): ?>
          <a href="<?= $event->signform() ?>">
            <?php if ($event->signenddate()->toDate() > time()): ?>
            <button class="button"><i class="fas fa-external-link-alt"></i> Anmelden</button>
            <?php endif ?>
          </a>
          <?php endif ?>
        </div>
        <?php if ($event->enterlocation()->toBool() === true ): ?>
        <div class="event-location">
          <?php 
            if($event->blueprint()->title() == "JS-Nami") {
              $linktext = "Treffpunkt";
            } else {
              $linktext = "Lagerplatz";
            } 
          ?>
          <i class="fas fa-map-pin"></i> <a href="https://www.openstreetmap.org/?mlat=<?= $event->location()->toLocation()->lat() ?>&amp;mlon=<?= $event->location()->toLocation()->lon() ?>#map=19/<?= $event->location()->toLocation()->lat() ?>/<?= $event->location()->toLocation()->lon() ?>"><?= $linktext ?></a>
        </div>
        <?php endif ?>
    </li>
    <?php endforeach ?>
  </ul>
</section>
<?php snippet('footer') ?>
