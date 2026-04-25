<?php
$heroIcon = $page->hero_icon()->toFile();
$heroImage = $page->hero_image()->toFile();
?>
<?php snippet('header') ?>

<section class="subpage-hero">
  <div class="container subpage-hero__inner">
    <div class="subpage-hero__top">
      <div class="subpage-hero__mark">
        <img src="<?= $heroIcon ? $heroIcon->url() : url('assets/Ilustrasjoner/white/SVG/wheel.svg') ?>" alt="">
      </div>
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
        <p class="event-hero-meta"><?= $page->tag()->or('Arrangement')->html() ?> · <?= $page->date_label()->or($page->start_date()->toDate('d.m.Y'))->html() ?></p>
        <?php if ($page->intro()->isNotEmpty()): ?><p><?= $page->intro()->html() ?></p><?php endif ?>
      </div>
    </div>
    <?php if ($heroImage): ?>
    <div class="subpage-hero__media">
      <img src="<?= $heroImage->url() ?>" alt="<?= $heroImage->alt()->or($page->title()->esc()) ?>">
    </div>
    <?php endif ?>
  </div>
</section>

<section class="section">
  <div class="container split-layout split-layout--align-start">
    <div class="section-copy section-copy--wide">
      <div class="flow">
        <p class="label">Om arrangementet</p>
        <?php if ($page->description()->isNotEmpty()): ?><?= $page->description()->kt() ?><?php endif ?>
      </div>
    </div>
    <div class="flow">
      <p class="label">Praktisk info</p>
      <?php if ($page->location()->isNotEmpty()): ?><p><strong>Sted:</strong> <?= $page->location()->html() ?></p><?php endif ?>
      <?php if ($page->start_date()->isNotEmpty()): ?><p><strong>Starter:</strong> <?= $page->start_date()->toDate('d.m.Y') ?></p><?php endif ?>
      <?php if ($page->end_date()->isNotEmpty()): ?><p><strong>Slutter:</strong> <?= $page->end_date()->toDate('d.m.Y') ?></p><?php endif ?>
      <?php if ($page->price()->isNotEmpty()): ?><p><strong>Pris:</strong> <?= $page->price()->html() ?></p><?php endif ?>
      <?php if ($page->signup_link()->isNotEmpty()): ?><p><a class="btn" href="<?= $page->signup_link()->escape() ?>">Meld interesse</a></p><?php endif ?>
    </div>
  </div>
</section>

<?php snippet('footer') ?>
