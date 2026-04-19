<?php
$heroIcon = $page->hero_icon()->toFile();
?>
<?php snippet('header') ?>

<section class="subpage-hero subpage-hero--text-only">
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
            <span aria-current="page"><?= $page->title()->html() ?></span>
          </nav>
          <h1><?= $page->hero_title()->or('Prosjekter i klubben')->html() ?></h1>
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
  </div>
</section>

<section class="section section--surface">
  <div class="container">
    <div class="section-heading">
      <p class="label"><?= $page->list_label()->or('Pågående arbeid')->html() ?></p>
      <h2><?= $page->list_title()->or('Prosjekter vi jobber med')->html() ?></h2>
    </div>
    <?php if ($page->list_intro()->isNotEmpty()): ?><p><?= $page->list_intro()->html() ?></p><?php endif ?>
    <div class="event-list">
      <?php foreach ($page->children()->listed() as $prosjekt): ?>
      <article class="event-row event-row--details">
        <div class="event-row__content">
          <h3 class="event-row__title"><?= $prosjekt->title()->html() ?></h3>
          <?php if ($prosjekt->hero_intro()->isNotEmpty()): ?><p class="event-row__description"><?= $prosjekt->hero_intro()->html() ?></p><?php endif ?>
        </div>
        <a class="cta-link event-row__link" href="<?= $prosjekt->url() ?>">Les mer</a>
      </article>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="cta-panel">
      <div class="flow">
        <div class="section-heading section-heading--stack">
          <p class="label"><?= $site->cta_label()->or('Vil du støtte klubben?')->html() ?></p>
          <h2><?= $site->cta_title()->or('Bli medlem og få med deg det som skjer')->html() ?></h2>
        </div>
        <?php if ($site->cta_text()->isNotEmpty()): ?><p><?= $site->cta_text()->html() ?></p><?php endif ?>
      </div>
      <div class="btn-group">
        <?php $url = $site->cta_secondary_button_url()->isNotEmpty() ? $site->cta_secondary_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-light" href="<?= $url ?>"><?= $site->cta_secondary_button_text()->or('Kontakt oss')->html() ?></a><?php endif ?>
        <?php $url = $site->cta_primary_button_url()->isNotEmpty() ? $site->cta_primary_button_url()->escape() : (($p = page('bli-medlem')) ? $p->url() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $site->cta_primary_button_text()->or('Bli medlem')->html() ?></a><?php endif ?>
      </div>
    </div>
  </div>
</section>

<?php snippet('footer') ?>
