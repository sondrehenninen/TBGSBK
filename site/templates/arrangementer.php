<?php
$events = $page->children()->listed()->filter(function ($event) {
  $start = $event->start_date()->toDate();
  $end = $event->end_date()->isNotEmpty() ? $event->end_date()->toDate() : $start;
  return $end >= strtotime('today');
})->sortBy('start_date', 'asc');
$heroIcon = $page->hero_icon()->toFile();
$heroImage = $page->hero_image()->toFile();
$expectationIcon = $page->expectation_icon()->toFile();
$practicalIcon = $page->practical_icon()->toFile();
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
            <span aria-current="page"><?= $page->title()->html() ?></span>
          </nav>
          <h1><?= $page->hero_title()->or('Det skjer alltid noe i klubben')->html() ?></h1>
        </div>
      </div>
      <div class="subpage-hero__copy">
        <?php if ($page->intro()->isNotEmpty()): ?><p><?= $page->intro()->html() ?></p><?php endif ?>
        <div class="btn-group">
          <?php $url = $page->hero_primary_button_url()->isNotEmpty() ? $page->hero_primary_button_url()->escape() : (($p = page('bli-medlem')) ? $p->url() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $page->hero_primary_button_text()->or('Bli medlem')->html() ?></a><?php endif ?>
          <?php $url = $page->hero_secondary_button_url()->isNotEmpty() ? $page->hero_secondary_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-light" href="<?= $url ?>"><?= $page->hero_secondary_button_text()->or('Kontakt oss')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
    <div class="subpage-hero__media">
      <img src="<?= $heroImage ? $heroImage->url() : url('assets/Bilder til nettsiden/Sommerskate 2025/IMG_7565.webp') ?>" alt="<?= $heroImage ? $heroImage->alt()->or('Arrangementer i Tønsberg Skateboardklubb')->esc() : 'Arrangementer i Tønsberg Skateboardklubb' ?>">
    </div>
  </div>
</section>

<section class="section section--surface">
  <div class="container">
    <div class="section-heading section-heading--split">
      <div>
        <p class="label"><?= $page->list_label()->or('Neste på programmet')->html() ?></p>
        <h2><?= $page->list_title()->or('Kommende arrangementer')->html() ?></h2>
      </div>
      <?php $url = $page->list_link_url()->isNotEmpty() ? $page->list_link_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="cta-link" href="<?= $url ?>"><?= $page->list_link_text()->or('Kontakt oss om arrangementer')->html() ?></a><?php endif ?>
    </div>
    <div class="event-list">
      <?php foreach ($events as $event): ?>
      <article class="event-row event-row--details">
        <div class="event-row__content">
          <div class="event-row__meta">
            <span class="event-row__tag"><?= $event->tag()->or('Arrangement')->html() ?></span>
            <span class="event-row__date"><?= $event->date_label()->or($event->start_date()->toDate('d.m.Y'))->html() ?></span>
          </div>
          <h3 class="event-row__title"><?= $event->title()->html() ?></h3>
          <?php if ($event->intro()->isNotEmpty()): ?><p class="event-row__description"><?= $event->intro()->html() ?></p><?php endif ?>
        </div>
        <a class="cta-link event-row__link" href="<?= $event->url() ?>">Les mer</a>
      </article>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-copy section-copy--wide">
      <img class="section-icon" src="<?= $expectationIcon ? $expectationIcon->url() : url('assets/Ilustrasjoner/white/SVG/board1.svg') ?>" alt="">
      <div class="flow">
        <div class="section-heading">
          <p class="label"><?= $page->expectation_label()->or('Hva du kan forvente')->html() ?></p>
          <h2><?= $page->expectation_title()->or('Skating, samlinger og lav terskel gjennom hele året')->html() ?></h2>
        </div>
        <?= $page->expectation_body()->kt() ?>
        <div class="btn-group">
          <?php $url = $page->expectation_primary_button_url()->isNotEmpty() ? $page->expectation_primary_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $page->expectation_primary_button_text()->or('Spør oss først')->html() ?></a><?php endif ?>
          <?php $url = $page->expectation_secondary_button_url()->isNotEmpty() ? $page->expectation_secondary_button_url()->escape() : (($p = page('apningstider')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-dark" href="<?= $url ?>"><?= $page->expectation_secondary_button_text()->or('Se åpningstider')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-heading">
      <p class="label"><?= $page->offers_label()->or('Faste tilbud')->html() ?></p>
      <h2><?= $page->offers_title()->or('Gjennom året i klubben')->html() ?></h2>
    </div>
    <div class="card-grid card-grid--two">
      <?php foreach ($page->offers()->toStructure() as $offer): ?>
      <article class="card program-card">
        <span class="event-row__tag"><?= $offer->tag()->html() ?></span>
        <h3><?= $offer->title()->html() ?></h3>
        <p><?= $offer->text()->html() ?></p>
        <?php if ($offer->meta()->isNotEmpty()): ?><p class="program-card__meta"><?= $offer->meta()->html() ?></p><?php endif ?>
      </article>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="section section--surface">
  <div class="container">
    <div class="section-copy section-copy--wide">
      <img class="section-icon" src="<?= $practicalIcon ? $practicalIcon->url() : url('assets/Ilustrasjoner/white/SVG/tool1.svg') ?>" alt="">
      <div class="flow">
        <div class="section-heading">
          <p class="label"><?= $page->practical_label()->or('Praktisk info')->html() ?></p>
          <h2><?= $page->practical_title()->or('Før du kommer')->html() ?></h2>
        </div>
        <ul class="notes-list">
          <?php foreach ($page->practical_notes()->toStructure() as $item): ?>
          <li><?= $item->text()->html() ?></li>
          <?php endforeach ?>
        </ul>
        <div class="btn-group">
          <?php $url = $page->practical_primary_button_url()->isNotEmpty() ? $page->practical_primary_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $page->practical_primary_button_text()->or('Kontakt oss')->html() ?></a><?php endif ?>
          <?php $url = $page->practical_secondary_button_url()->isNotEmpty() ? $page->practical_secondary_button_url()->escape() : (($p = page('bli-medlem')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-dark" href="<?= $url ?>"><?= $page->practical_secondary_button_text()->or('Bli medlem')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php snippet('global-cta') ?>

<?php snippet('footer') ?>
