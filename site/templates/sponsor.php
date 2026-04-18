<?php snippet('header') ?>

<section class="subpage-hero subpage-hero--text-only">
  <div class="container subpage-hero__inner">
    <div class="subpage-hero__top">
      <div class="subpage-hero__identity">
        <div class="subpage-hero__heading">
          <nav class="breadcrumbs" aria-label="Brødsmuler">
            <a href="<?= url() ?>">Hjem</a>
            <span aria-hidden="true">/</span>
            <a href="<?= $page->parent()->url() ?>"><?= $page->parent()->title()->html() ?></a>
            <span aria-hidden="true">/</span>
            <span aria-current="page"><?= $page->title()->html() ?></span>
          </nav>
          <h1><?= $page->title()->html() ?></h1>
        </div>
      </div>
      <div class="subpage-hero__copy">
        <?php if ($page->sponsor_type()->isNotEmpty()): ?><p><?= $page->sponsor_type()->html() ?></p><?php endif ?>
        <?php if ($page->description()->isNotEmpty()): ?><p><?= $page->description()->html() ?></p><?php endif ?>
        <?php if ($page->link()->isNotEmpty()): ?><a class="btn" href="<?= $page->link()->escape() ?>">Besøk nettside</a><?php endif ?>
      </div>
    </div>
  </div>
</section>

<?php snippet('footer') ?>
