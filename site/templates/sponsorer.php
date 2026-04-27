<?php
$sponsors = $page->children()->listed()->sortBy('title', 'asc');
$heroIcon = $page->hero_icon()->toFile();
$heroImage = $page->hero_image()->toFile();
$ctaImage = $site->cta_image()->toFile();
?>
<?php snippet('header') ?>

<section class="subpage-hero">
  <div class="container subpage-hero__inner">
    <div class="subpage-hero__top">
      <?php if ($heroIcon): ?>
      <div class="subpage-hero__mark">
        <img src="<?= $heroIcon->url() ?>" alt="">
      </div>
      <?php endif ?>
      <div class="subpage-hero__identity">
        <div class="subpage-hero__heading">
          <nav class="breadcrumbs" aria-label="Brødsmuler">
            <a href="<?= url() ?>">Hjem</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page"><?= $page->title()->html() ?></span>
          </nav>
          <h1><?= $page->hero_title()->or('Sponsorer og støttespillere')->html() ?></h1>
        </div>
      </div>
      <div class="subpage-hero__copy">
        <?php if ($page->intro()->isNotEmpty()): ?><p><?= $page->intro()->html() ?></p><?php endif ?>
        <div class="btn-group">
          <?php $url = $page->hero_primary_button_url()->isNotEmpty() ? $page->hero_primary_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $page->hero_primary_button_text()->or('Ta kontakt')->html() ?></a><?php endif ?>
          <?php $url = $page->hero_secondary_button_url()->isNotEmpty() ? $page->hero_secondary_button_url()->escape() : (($p = page('bli-medlem')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-light" href="<?= $url ?>"><?= $page->hero_secondary_button_text()->or('Bli medlem')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
    <?php if ($heroImage): ?>
    <div class="subpage-hero__media">
      <img src="<?= $heroImage->url() ?>" alt="<?= $heroImage->alt()->or('Nye skateelementer bygget med støtte fra samarbeidspartnere')->esc() ?>">
    </div>
    <?php endif ?>
  </div>
</section>

<hr class="section-rule" />

<section class="section">
  <div class="container">
    <div class="section-heading">
      <p class="label"><?= $page->sponsors_label()->or('Våre sponsorer')->html() ?></p>
      <h2><?= $page->sponsors_title()->or('Takk til')->html() ?></h2>
    </div>
    <div class="sponsor-strip">
      <?php foreach ($sponsors as $sponsor): ?>
      <span class="sponsor-item"><?= $sponsor->title()->html() ?></span>
      <?php endforeach ?>
    </div>
  </div>
</section>

<?php if ($page->support_text()->isNotEmpty()): ?>
<hr class="section-rule" />
<section class="section section--surface">
  <div class="container split-layout">
    <div class="flow">
      <p class="label"><?= $page->support_label()->or('Støtte fra det offentlige')->html() ?></p>
      <h2><?= $page->support_title()->or('Tilskudd og prosjekter')->html() ?></h2>
    </div>
    <div class="flow">
      <?= $page->support_text()->kt() ?>
      <?php $url = $page->support_link_url()->isNotEmpty() ? $page->support_link_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="cta-link" href="<?= $url ?>">→ <?= $page->support_link_text()->or('Kontakt oss')->html() ?></a><?php endif ?>
    </div>
  </div>
</section>
<?php endif ?>

<?php snippet('global-cta') ?>

<?php snippet('footer') ?>
