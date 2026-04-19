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
      <div class="subpage-hero__mark">
        <img src="<?= $heroIcon ? $heroIcon->url() : url('assets/Ilustrasjoner/white/SVG/truck.svg') ?>" alt="">
      </div>
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
    <div class="subpage-hero__media">
      <img src="<?= $heroImage ? $heroImage->url() : url('assets/Bilder til nettsiden/Nye elementer 2025/ferdig.webp') ?>" alt="<?= $heroImage ? $heroImage->alt()->or('Nye skateelementer bygget med støtte fra samarbeidspartnere')->esc() : 'Nye skateelementer bygget med støtte fra samarbeidspartnere' ?>">
    </div>
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

<?php if ($site->cta_title()->isNotEmpty() || $site->cta_text()->isNotEmpty()): ?>
<hr class="section-rule" />
<section class="section">
  <div class="container">
    <div class="cta-panel cta-panel--image">
      <div class="cta-panel__media">
        <img src="<?= $ctaImage ? $ctaImage->url() : ($heroImage ? $heroImage->url() : url('assets/Bilder til nettsiden/Nye elementer 2025/ferdig.webp')) ?>" alt="<?= $ctaImage ? $ctaImage->alt()->or('Nye skateelementer bygget med støtte fra samarbeidspartnere')->esc() : 'Nye skateelementer bygget med støtte fra samarbeidspartnere' ?>">
      </div>
      <div class="cta-panel__content">
        <div class="cta-panel__copy">
          <div class="cta-panel__mark">
            <img src="<?= url('assets/Ilustrasjoner/white/SVG/berrings2.svg') ?>" alt="">
          </div>
          <div class="cta-panel__text">
            <div class="section-heading section-heading--stack">
              <?php if ($site->cta_label()->isNotEmpty()): ?><p class="label"><?= $site->cta_label()->html() ?></p><?php endif ?>
              <?php if ($site->cta_title()->isNotEmpty()): ?><h2><?= $site->cta_title()->html() ?></h2><?php endif ?>
            </div>
            <?php if ($site->cta_text()->isNotEmpty()): ?><p><?= $site->cta_text()->html() ?></p><?php endif ?>
          </div>
        </div>
        <div class="btn-group cta-panel__actions">
          <?php $url = $site->cta_secondary_button_url()->isNotEmpty() ? $site->cta_secondary_button_url()->escape() : (($p = page('bli-medlem')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-light" href="<?= $url ?>"><?= $site->cta_secondary_button_text()->or('Bli medlem')->html() ?></a><?php endif ?>
          <?php $url = $site->cta_primary_button_url()->isNotEmpty() ? $site->cta_primary_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $site->cta_primary_button_text()->or('Ta kontakt')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif ?>

<?php snippet('footer') ?>
