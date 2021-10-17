<nav>
  <ul>
    <?php foreach ($site->children()->listed() as $item): ?>
      <li>
        <a href="<?= $item->url() ?>"><?= $item->title() ?></a>
        <?php if ($item->hasChildren()): ?>
          <ul class="subnav">
            <?php foreach ($item->children()->listed() as $subitem): ?>
              <?php if($subitem->hidefromnav()->toBool() === false ): ?>
                <li><a href="<?= $subitem->url() ?>"><?= $subitem->title() ?></a></li>
              <?php endif ?>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </li>
    <?php endforeach ?>
  </ul>
</nav>
