<?php
$featuredEvents = page('arrangementer')
  ? page('arrangementer')->children()->listed()->filter(function ($event) {
      $start = $event->start_date()->toDate();
      $end = $event->end_date()->isNotEmpty() ? $event->end_date()->toDate() : $start;
      return $end >= strtotime('today');
    })->sortBy('start_date', 'asc')->limit(4)
  : null;
$sponsors = page('sponsorer') ? page('sponsorer')->children()->listed()->limit(6) : null;
$sponsorsWithLogos = $sponsors ? $sponsors->filter(function($s) { return $s->logo()->toFile(); }) : null;
$heroLogo = $page->hero_logo()->toFile() ?: $site->hero_logo()->toFile();
$heroImage = $page->hero_image()->toFile();
$openingIcon = $page->opening_icon()->toFile();
$openingHours = $page->opening_hours()->isNotEmpty() ? $page->opening_hours()->toStructure() : $site->opening_hours()->toStructure();
$eventsIcon = $page->events_icon()->toFile();
$aboutIcon = $page->about_icon()->toFile();
$aboutImage = $page->about_image()->toFile();
$supportIcon = $page->support_icon()->toFile();
$supportImage = $page->support_image()->toFile();
$faqIcon = $page->faq_icon()->toFile();
?>
<?php snippet('header') ?>

<section class="hero">
  <div class="hero-image">
    <img src="<?= $heroImage ? $heroImage->url() : url('assets/Bilder til nettsiden/Permanent inehall/Kopi av Innehall.webp') ?>" alt="<?= $heroImage ? $heroImage->alt()->or('Innendørs skatepark — Tønsberg Skateboardklubb')->esc() : 'Innendørs skatepark — Tønsberg Skateboardklubb' ?>" />
  </div>
  <div class="hero-content">
    <div class="container hero-inner">
      <h1 class="visually-hidden"><?= $page->title()->html() ?></h1>
      <div class="hero-logo-wrap">
        <img src="<?= $heroLogo ? $heroLogo->url() : url('assets/logo/SVG/TBGSBK - round white yellow.svg') ?>" alt="<?= $site->club_name()->or('TBGSBK logo')->esc() ?>">
      </div>
      <div class="hero-text-wrap">
        <?php if ($page->hero_intro()->isNotEmpty()): ?><p><?= $page->hero_intro()->html() ?></p><?php endif ?>
        <div class="btn-group">
          <?php $url = $page->hero_primary_button_url()->isNotEmpty() ? $page->hero_primary_button_url()->escape() : (($p = page('bli-medlem')) ? $p->url() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $page->hero_primary_button_text()->or('Bli medlem')->html() ?></a><?php endif ?>
          <?php $url = $page->hero_secondary_button_url()->isNotEmpty() ? $page->hero_secondary_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-light" href="<?= $url ?>"><?= $page->hero_secondary_button_text()->or('Kontakt oss')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if ($sponsorsWithLogos && $sponsorsWithLogos->count()): ?>
<section class="section--mint section--compact sponsor-band">
  <div class="sponsor-marquee" aria-hidden="true">
    <div class="sponsor-marquee__track">
      <?php foreach ($sponsorsWithLogos as $sponsor): $logo = $sponsor->logo()->toFile(); ?>
      <img src="<?= $logo->url() ?>" alt="<?= $sponsor->title()->esc() ?>">
      <?php endforeach ?>
    </div>
  </div>
</section>
<?php endif ?>

<section class="section section--surface">
  <div class="container split-layout split-layout--align-start">
    <div class="section-copy">
      <div class="flow">
        <?php if ($openingIcon): ?><img class="section-icon" src="<?= $openingIcon->url() ?>" alt="<?= $openingIcon->alt()->or('Ikon for åpningstider')->esc() ?>"><?php endif ?>
        <p class="label"><?= $page->opening_label()->or('Åpningstider')->html() ?></p>
        <h2><?= $page->opening_title()->or('Messehall B')->html() ?></h2>
        <?php if ($page->opening_intro()->isNotEmpty()): ?><p><?= $page->opening_intro()->html() ?></p><?php endif ?>
      </div>
    </div>
    <div>
      <?php if ($openingHours->count()): ?>
      <div class="hours-table">
        <?php foreach ($openingHours as $row): ?>
        <div class="hours-row">
          <span class="hours-row__day"><?= $row->day()->html() ?></span>
          <span class="hours-row__time"><?= $row->time()->html() ?></span>
        </div>
        <?php endforeach ?>
      </div>
      <?php endif ?>
      <?php if ($page->opening_notice_enabled()->toBool() && ($page->opening_notice()->isNotEmpty() || $site->season_notice()->isNotEmpty())): ?><p><?= $page->opening_notice()->or($site->season_notice())->html() ?></p><?php endif ?>
    </div>
  </div>
</section>

<?php if ($featuredEvents && $featuredEvents->count()): ?>
<section class="section section--mint">
  <div class="container split-layout split-layout--align-start">
    <div class="section-copy">
      <div class="flow">
        <?php if ($eventsIcon): ?><img class="section-icon" src="<?= $eventsIcon->url() ?>" alt="<?= $eventsIcon->alt()->or('Ikon for arrangementer')->esc() ?>"><?php endif ?>
        <p class="label"><?= $page->events_label()->or('Arrangementer')->html() ?></p>
        <h2><?= $page->events_title()->or('Hold deg oppdatert på hva som skjer')->html() ?></h2>
        <p><?= $page->events_intro()->or('Vi har ukentlige økter og arrangementer gjennom hele året.')->html() ?></p>
        <a class="cta-link" href="<?= $page->events_button_url()->isNotEmpty() ? $page->events_button_url()->escape() : page('arrangementer')->url() ?>">→ <?= $page->events_button_text()->or('Se alle arrangementer')->html() ?></a>
      </div>
    </div>
    <div class="event-list">
      <?php foreach ($featuredEvents as $event): ?>
      <a href="<?= $event->url() ?>" class="event-row">
        <div class="event-row__content">
          <div class="event-row__meta">
            <span class="event-row__tag"><?= $event->tag()->or('Arrangement')->html() ?></span>
            <span class="event-row__date"><?= $event->date_label()->or($event->start_date()->toDate('d.m.Y'))->html() ?></span>
          </div>
          <span class="event-row__title"><?= $event->title()->html() ?></span>
        </div>
        <span class="event-row__arrow">→</span>
      </a>
      <?php endforeach ?>
    </div>
  </div>
</section>
<?php endif ?>

<section class="section">
  <div class="container split-layout">
    <?php if ($aboutImage): ?>
    <div class="about-media">
      <img class="media-frame" src="<?= $aboutImage->url() ?>" alt="<?= $aboutImage->alt()->or('Skating i klubbmiljøet')->esc() ?>">
    </div>
    <?php endif ?>
    <div class="section-copy">
      <div class="flow">
        <?php if ($aboutIcon): ?><img class="section-icon" src="<?= $aboutIcon->url() ?>" alt="<?= $aboutIcon->alt()->or('Ikon for om klubben')->esc() ?>"><?php endif ?>
        <p class="label"><?= $page->about_label()->or('Om oss')->html() ?></p>
        <h2><?= $page->about_title()->or('Dette er TBGSBK')->html() ?></h2>
        <?php if ($page->about_intro()->isNotEmpty()): ?><p><?= $page->about_intro()->html() ?></p><?php endif ?>
        <?php if ($page->about_secondary_text()->isNotEmpty()): ?><p><?= $page->about_secondary_text()->html() ?></p><?php endif ?>
        <?php $url = $page->about_button_url()->isNotEmpty() ? $page->about_button_url()->escape() : (($p = page('om-klubben')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-dark" href="<?= $url ?>">→ <?= $page->about_button_text()->or('Om klubben')->html() ?></a><?php endif ?>
      </div>
    </div>
  </div>
</section>

<section class="section sponsor-section">
  <div class="container split-layout split-layout--reverse">
    <?php if ($supportImage): ?>
    <div class="sponsor-media">
      <img class="media-frame" src="<?= $supportImage->url() ?>" alt="<?= $supportImage->alt()->or('Prosjekter og støtte')->esc() ?>">
    </div>
    <?php endif ?>
    <div class="section-copy">
      <div class="flow">
        <?php if ($supportIcon): ?><img class="section-icon" src="<?= $supportIcon->url() ?>" alt="<?= $supportIcon->alt()->or('Ikon for sponsorer')->esc() ?>"><?php endif ?>
        <p class="label"><?= $page->support_label()->or('Sponsorer')->html() ?></p>
        <h2><?= $page->support_title()->or('Prosjekter og støtte')->html() ?></h2>
        <?php if ($page->support_intro()->isNotEmpty()): ?><p><?= $page->support_intro()->html() ?></p><?php endif ?>
        <?php if ($page->support_secondary_text()->isNotEmpty()): ?><p><?= $page->support_secondary_text()->html() ?></p><?php endif ?>
        <?php $url = $page->support_button_url()->isNotEmpty() ? $page->support_button_url()->escape() : (($p = page('sponsorer')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-dark" href="<?= $url ?>">→ <?= $page->support_button_text()->or('Om sponsorer')->html() ?></a><?php endif ?>
        <?php $url = $page->prosjekter_button_url()->isNotEmpty() ? $page->prosjekter_button_url()->escape() : (($p = page('prosjekter')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-dark" href="<?= $url ?>">→ <?= $page->prosjekter_button_text()->or('Se prosjekter')->html() ?></a><?php endif ?>
      </div>
    </div>
  </div>
</section>

<?php if ($page->faq()->isNotEmpty()): ?>
<section class="section section--blue">
  <div class="container split-layout split-layout--align-start">
    <div class="section-copy">
      <div class="flow">
        <?php if ($faqIcon): ?><img class="section-icon" src="<?= $faqIcon->url() ?>" alt="<?= $faqIcon->alt()->or('Ikon for FAQ')->esc() ?>"><?php endif ?>
        <p class="label"><?= $page->faq_label()->or('FAQ')->html() ?></p>
        <h2><?= $page->faq_title()->or('Lurer du på noe?')->html() ?></h2>
        <?php if ($page->faq_intro()->isNotEmpty()): ?><p><?= $page->faq_intro()->html() ?></p><?php endif ?>
        <?php $url = $page->faq_button_url()->isNotEmpty() ? $page->faq_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-dark" href="<?= $url ?>">→ <?= $page->faq_button_text()->or('Kontakt oss')->html() ?></a><?php endif ?>
      </div>
    </div>
    <div class="faq-list">
      <?php foreach ($page->faq()->toStructure() as $item): ?>
      <details class="faq-item">
        <summary><?= $item->sporsmal()->html() ?></summary>
        <p><?= $item->svar()->html() ?></p>
      </details>
      <?php endforeach ?>
    </div>
  </div>
</section>
<?php endif ?>

<?php snippet('global-cta') ?>

<?php snippet('footer') ?>
