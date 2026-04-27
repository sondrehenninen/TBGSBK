<?php
$heroIcon = $page->hero_icon()->toFile();
$activeProjects    = $page->children()->listed()->filter(fn($p) => !$p->completed()->isTrue());
$completedProjects = $page->children()->listed()->filter(fn($p) => $p->completed()->isTrue());
?>
<?php snippet('header') ?>

<section class="subpage-hero subpage-hero--text-only">
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
    <?php if ($activeProjects->count()): ?>
    <div class="event-list">
      <?php foreach ($activeProjects as $prosjekt): ?>
      <article class="event-row event-row--details">
        <div class="event-row__content">
          <h3 class="event-row__title"><?= $prosjekt->title()->html() ?></h3>
          <?php if ($prosjekt->hero_intro()->isNotEmpty()): ?><p class="event-row__description"><?= $prosjekt->hero_intro()->html() ?></p><?php endif ?>
        </div>
        <a class="cta-link event-row__link" href="<?= $prosjekt->url() ?>">Les mer</a>
      </article>
      <?php endforeach ?>
    </div>
    <?php endif ?>
  </div>
</section>

<?php if ($completedProjects->count()): ?>
<section class="section">
  <div class="container container--stack">
    <?php snippet('results-slider', ['projects' => $completedProjects, 'heading' => 'Noe av det vi allerede har fått til']); ?>
  </div>
</section>
<?php endif ?>

<?php snippet('global-cta') ?>

<?php snippet('footer') ?>
