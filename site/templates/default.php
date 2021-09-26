<?php snippet('header') ?>

  <?php foreach ($page->editor()->toBlocks() as $block): ?>
    <div id="<?= $block->id() ?>" class="block-type-<?= $block->type() ?>">
      <?= $block ?>
    </div>
  <?php endforeach ?>

<?php snippet('footer') ?>
