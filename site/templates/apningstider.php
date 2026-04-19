<?php
$heroIcon = $page->hero_icon()->toFile();
$heroImage = $page->hero_image()->toFile();
$ctaImage = $site->cta_image()->toFile();
?>
<?php snippet('header') ?>

<section class="subpage-hero">
  <div class="container subpage-hero__inner">
    <div class="subpage-hero__top">
      <div class="subpage-hero__mark">
        <img src="<?= $heroIcon ? $heroIcon->url() : url('assets/Ilustrasjoner/white/SVG/board1.svg') ?>" alt="">
      </div>
      <div class="subpage-hero__identity">
        <div class="subpage-hero__heading">
          <nav class="breadcrumbs" aria-label="Brødsmuler">
            <a href="<?= url() ?>">Hjem</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page"><?= $page->title()->html() ?></span>
          </nav>
          <h1><?= $page->hero_title()->or('Åpningstider og sted')->html() ?></h1>
        </div>
      </div>
      <div class="subpage-hero__copy">
        <?php if ($page->hero_intro()->isNotEmpty()): ?><p><?= $page->hero_intro()->html() ?></p><?php endif ?>
        <div class="btn-group">
          <?php $url = $page->hero_primary_button_url()->isNotEmpty() ? $page->hero_primary_button_url()->escape() : (($p = page('bli-medlem')) ? $p->url() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $page->hero_primary_button_text()->or('Bli medlem')->html() ?></a><?php endif ?>
          <?php $url = $page->hero_secondary_button_url()->isNotEmpty() ? $page->hero_secondary_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-light" href="<?= $url ?>"><?= $page->hero_secondary_button_text()->or('Kontakt oss')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
    <div class="subpage-hero__media">
      <img src="<?= $heroImage ? $heroImage->url() : url('assets/Bilder til nettsiden/Permanent inehall/Kopi av Innehall.webp') ?>" alt="<?= $heroImage ? $heroImage->alt()->or('Innendørshallen til Tønsberg Skateboardklubb')->esc() : 'Innendørshallen til Tønsberg Skateboardklubb' ?>">
    </div>
  </div>
</section>

<hr class="section-rule" />

<section class="section">
  <div class="container split-layout">
    <div class="flow">
      <?php if ($page->season_label()->isNotEmpty()): ?><p class="label"><?= $page->season_label()->html() ?></p><?php endif ?>
      <h2><?= $page->season_title()->or('Messehall B')->html() ?></h2>
      <?php if ($page->season_intro()->isNotEmpty()): ?><p><?= $page->season_intro()->html() ?></p><?php endif ?>
      <?php if ($page->season_rows()->isNotEmpty()): ?>
      <div class="hours-table">
        <?php foreach ($page->season_rows()->toStructure() as $row): ?>
        <div class="hours-row">
          <span class="hours-row__day"><?= $row->day()->html() ?></span>
          <span class="hours-row__time"><?= $row->time()->html() ?></span>
        </div>
        <?php endforeach ?>
      </div>
      <?php endif ?>
      <?php if ($page->season_note()->isNotEmpty()): ?><p><?= $page->season_note()->html() ?></p><?php endif ?>
    </div>
    <div class="flow">
      <?php if ($page->location_label()->isNotEmpty()): ?><p class="label"><?= $page->location_label()->html() ?></p><?php endif ?>
      <h2><?= $page->location_title()->or('Adresse')->html() ?></h2>
      <div class="flow">
        <div>
          <?php if ($page->indoor_label()->isNotEmpty()): ?><p class="label"><?= $page->indoor_label()->html() ?></p><?php endif ?>
          <?php if ($page->indoor_text()->isNotEmpty()): ?><?= $page->indoor_text()->kt() ?><?php endif ?>
        </div>
        <div>
          <?php if ($page->outdoor_label()->isNotEmpty()): ?><p class="label"><?= $page->outdoor_label()->html() ?></p><?php endif ?>
          <?php if ($page->outdoor_text()->isNotEmpty()): ?><?= $page->outdoor_text()->kt() ?><?php endif ?>
        </div>
        <div>
          <?php if ($page->contact_label()->isNotEmpty()): ?><p class="label"><?= $page->contact_label()->html() ?></p><?php endif ?>
          <?php if ($page->contact_text()->isNotEmpty()): ?><?= $page->contact_text()->kt() ?><?php endif ?>
        </div>
      </div>
    </div>
  </div>
</section>

<hr class="section-rule" />

<section class="section section--surface">
  <div class="container">
    <div class="cta-panel cta-panel--image">
      <div class="cta-panel__media">
        <img src="<?= $ctaImage ? $ctaImage->url() : ($heroImage ? $heroImage->url() : url('assets/Bilder til nettsiden/Permanent inehall/Kopi av Innehall.webp')) ?>" alt="<?= $ctaImage ? $ctaImage->alt()->or('Innendørshallen til Tønsberg Skateboardklubb')->esc() : 'Innendørshallen til Tønsberg Skateboardklubb' ?>">
      </div>
      <div class="cta-panel__content">
        <div class="cta-panel__copy">
          <div class="cta-panel__mark">
            <img src="<?= url('assets/Ilustrasjoner/white/SVG/berrings2.svg') ?>" alt="">
          </div>
          <div class="cta-panel__text">
            <div class="section-heading section-heading--stack">
              <?php if ($site->cta_label()->isNotEmpty()): ?><p class="label"><?= $site->cta_label()->html() ?></p><?php endif ?>
              <h2><?= $site->cta_title()->or('Bli med i klubben')->html() ?></h2>
            </div>
            <?php if ($site->cta_text()->isNotEmpty()): ?><p><?= $site->cta_text()->html() ?></p><?php endif ?>
          </div>
        </div>
        <div class="btn-group cta-panel__actions">
          <?php $url = $site->cta_secondary_button_url()->isNotEmpty() ? $site->cta_secondary_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-light" href="<?= $url ?>"><?= $site->cta_secondary_button_text()->or('Kontakt oss')->html() ?></a><?php endif ?>
          <?php $url = $site->cta_primary_button_url()->isNotEmpty() ? $site->cta_primary_button_url()->escape() : (($p = page('bli-medlem')) ? $p->url() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $site->cta_primary_button_text()->or('Bli medlem')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php snippet('footer') ?>
