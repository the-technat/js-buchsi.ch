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
