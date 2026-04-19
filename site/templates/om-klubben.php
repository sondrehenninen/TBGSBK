<?php
$heroIcon = $page->hero_icon()->toFile();
$heroImage = $page->hero_image()->toFile();
$introIcon = $page->intro_icon()->toFile();
$primaryImage = $page->primary_image()->toFile();
$locationIcon = $page->location_icon()->toFile();
$secondaryImage = $page->secondary_image()->toFile();
$ctaImage = $site->cta_image()->toFile();
?>
<?php snippet('header') ?>

<section class="subpage-hero">
  <div class="container subpage-hero__inner">
    <div class="subpage-hero__top">
      <div class="subpage-hero__mark">
        <img src="<?= $heroIcon ? $heroIcon->url() : url('assets/Ilustrasjoner/white/SVG/skull.svg') ?>" alt="">
      </div>
      <div class="subpage-hero__identity">
        <div class="subpage-hero__heading">
          <nav class="breadcrumbs" aria-label="Brødsmuler">
            <a href="<?= url() ?>">Hjem</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page"><?= $page->title()->html() ?></span>
          </nav>
          <h1><?= $page->hero_title()->or('Et sted å høre til, uansett nivå')->html() ?></h1>
        </div>
      </div>
      <div class="subpage-hero__copy">
        <?php if ($page->hero_intro()->isNotEmpty()): ?><p><?= $page->hero_intro()->html() ?></p><?php endif ?>
        <div class="btn-group">
          <?php if ($medlem = page('bli-medlem')): ?><a class="btn" href="<?= $medlem->url() ?>"><?= $page->hero_primary_button_text()->or('Bli medlem')->html() ?></a><?php endif ?>
          <?php if ($kontakt = page('kontakt')): ?><a class="btn btn--secondary-light" href="<?= $kontakt->url() ?>"><?= $page->hero_secondary_button_text()->or('Kontakt oss')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
    <div class="subpage-hero__media">
      <img src="<?= $heroImage ? $heroImage->url() : url('assets/Bilder til nettsiden/Sommerskate 2025/IMG_7565.webp') ?>" alt="<?= $heroImage ? $heroImage->alt()->or('Skatere samlet i Tønsberg Skateboardklubb')->esc() : 'Skatere samlet i Tønsberg Skateboardklubb' ?>">
    </div>
  </div>
</section>

<section class="section">
  <div class="container split-layout split-layout--align-start">
    <div class="section-copy">
      <img class="section-icon" src="<?= $introIcon ? $introIcon->url() : url('assets/Ilustrasjoner/white/SVG/board1.svg') ?>" alt="">
      <div class="flow">
        <div class="section-heading">
          <?php if ($page->intro_label()->isNotEmpty()): ?><p class="label"><?= $page->intro_label()->html() ?></p><?php endif ?>
          <h2><?= $page->intro_title()->or('Frivillig drevet og rotfestet i Tønsberg')->html() ?></h2>
        </div>
        <?= $page->intro_body()->kt() ?>
        <?php if ($kontakt = page('kontakt')): ?><a class="btn btn--secondary-dark" href="<?= $kontakt->url() ?>"><?= $page->intro_button_text()->or('Kontakt klubben')->html() ?></a><?php endif ?>
      </div>
    </div>
    <div class="about-story">
      <div class="media-frame">
        <img class="event-photo" src="<?= $primaryImage ? $primaryImage->url() : url('assets/Bilder til nettsiden/Permanent inehall/Kopi av Innehall.webp') ?>" alt="<?= $primaryImage ? $primaryImage->alt()->or('Skisse av permanent innendørshall for Tønsberg Skateboardklubb')->esc() : 'Skisse av permanent innendørshall for Tønsberg Skateboardklubb' ?>">
      </div>
      <div class="about-story__body">
        <?= $page->intro_story()->kt() ?>
      </div>
    </div>
  </div>
</section>

<section class="section section--blue">
  <div class="container container--stack">
    <div class="section-heading section-heading--stack">
      <?php if ($page->values_label()->isNotEmpty()): ?><p class="label"><?= $page->values_label()->html() ?></p><?php endif ?>
      <h2><?= $page->values_title()->or('Det vi vil at klubben skal kjennes som')->html() ?></h2>
    </div>
    <div class="value-grid">
      <?php foreach ($page->values_items()->toStructure() as $item): $icon = $item->icon()->toFile(); ?>
      <article class="value-card">
        <img class="value-card__icon" src="<?= $icon ? $icon->url() : url('assets/Ilustrasjoner/white/SVG/board1.svg') ?>" alt="">
        <h3><?= $item->title()->html() ?></h3>
        <p><?= $item->text()->html() ?></p>
      </article>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container split-layout split-layout--reverse split-layout--align-start">
    <div class="section-copy">
      <img class="section-icon" src="<?= $locationIcon ? $locationIcon->url() : url('assets/Ilustrasjoner/white/SVG/truck.svg') ?>" alt="">
      <div class="flow">
        <div class="section-heading">
          <?php if ($page->location_label()->isNotEmpty()): ?><p class="label"><?= $page->location_label()->html() ?></p><?php endif ?>
          <h2><?= $page->location_title()->or('To samlingspunkter gjennom året')->html() ?></h2>
        </div>
        <?= $page->location_body()->kt() ?>
        <?php if ($page->location_notes()->isNotEmpty()): ?>
        <ul class="notes-list">
          <?php foreach ($page->location_notes()->toStructure() as $item): ?>
          <li><?= $item->text()->html() ?></li>
          <?php endforeach ?>
        </ul>
        <?php endif ?>
        <div class="btn-group">
          <?php if ($apning = page('apningstider')): ?><a class="btn" href="<?= $apning->url() ?>"><?= $page->location_primary_button_text()->or('Se åpningstider')->html() ?></a><?php endif ?>
          <?php if ($kontakt = page('kontakt')): ?><a class="btn btn--secondary-dark" href="<?= $kontakt->url() ?>"><?= $page->location_secondary_button_text()->or('Spør oss')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
    <div class="about-story">
      <div class="media-frame">
        <img class="event-photo" src="<?= $secondaryImage ? $secondaryImage->url() : url('assets/Bilder til nettsiden/Nye elementer 2024/Bilde 07.06.2024, 10 28 43.webp') ?>" alt="<?= $secondaryImage ? $secondaryImage->alt()->or('Miniramp og nye elementer i Messehall B')->esc() : 'Miniramp og nye elementer i Messehall B' ?>">
      </div>
      <div class="about-story__body">
        <?= $page->location_story()->kt() ?>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container container--stack">
    <div class="section-heading section-heading--split">
      <div>
        <?php if ($page->projects_label()->isNotEmpty()): ?><p class="label"><?= $page->projects_label()->html() ?></p><?php endif ?>
        <h2><?= $page->projects_title()->or('Det vi jobber med nå')->html() ?></h2>
      </div>
      <?php if ($sponsorer = page('sponsorer')): ?><a class="btn btn--secondary-dark" href="<?= $sponsorer->url() ?>"><?= $page->projects_button_text()->or('Se støtte og samarbeid')->html() ?></a><?php endif ?>
    </div>
    <div class="project-grid">
      <?php foreach ($page->projects()->toStructure() as $project): ?>
      <article class="project-card">
        <span class="project-card__tag"><?= $project->tag()->html() ?></span>
        <h3><?= $project->title()->html() ?></h3>
        <p><?= $project->text()->html() ?></p>
      </article>
      <?php endforeach ?>
    </div>
    <div class="results-layout">
      <div class="results-intro">
        <h3><?= $page->results_title()->or('Noe av det vi allerede har fått til allerede')->html() ?></h3>
      </div>
      <div class="results-list">
        <?php foreach ($page->results()->toStructure() as $result): ?>
        <article class="result-card">
          <span class="result-card__tag"><?= $result->tag()->html() ?></span>
          <h4><?= $result->title()->html() ?></h4>
          <p><?= $result->text()->html() ?></p>
        </article>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</section>

<section class="section section--blue">
  <div class="container container--stack">
    <div class="section-heading section-heading--stack">
      <?php if ($page->team_label()->isNotEmpty()): ?><p class="label"><?= $page->team_label()->html() ?></p><?php endif ?>
      <h2><?= $page->team_title()->or('Styret og ansvarspersoner')->html() ?></h2>
    </div>
    <div class="card-grid card-grid--two team-grid">
      <?php foreach ($page->team_members()->toStructure() as $member): ?>
      <article class="contact-person contact-person--profile">
        <div class="contact-person__media" aria-hidden="true"></div>
        <div class="contact-person__body">
          <p class="contact-person__name"><?= $member->name()->html() ?></p>
          <div class="contact-person__details">
            <p class="contact-person__role"><?= $member->role()->html() ?></p>
            <?php if ($member->email()->isNotEmpty()): ?><p class="contact-person__info"><a href="mailto:<?= $member->email()->escape() ?>"><?= $member->email()->html() ?></a></p><?php endif ?>
          </div>
        </div>
      </article>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="cta-panel cta-panel--image">
      <div class="cta-panel__media">
        <img src="<?= $ctaImage ? $ctaImage->url() : url('assets/Bilder til nettsiden/Sommerskate 2025/IMG_5676.webp') ?>" alt="<?= $ctaImage ? $ctaImage->alt()->or('Skatere samlet i klubbmiljøet')->esc() : 'Skatere samlet i klubbmiljøet' ?>">
      </div>
      <div class="cta-panel__content">
        <div class="cta-panel__copy">
          <div class="cta-panel__mark">
            <img src="<?= url('assets/Ilustrasjoner/white/SVG/berrings2.svg') ?>" alt="">
          </div>
          <div class="cta-panel__text">
            <div class="section-heading section-heading--stack">
              <?php if ($site->cta_label()->isNotEmpty()): ?><p class="label"><?= $site->cta_label()->html() ?></p><?php endif ?>
              <h2><?= $site->cta_title()->or('Vil du skate sammen med oss?')->html() ?></h2>
            </div>
            <?php if ($site->cta_text()->isNotEmpty()): ?><p><?= $site->cta_text()->html() ?></p><?php endif ?>
          </div>
        </div>
        <div class="btn-group cta-panel__actions">
          <?php if ($kontakt = page('kontakt')): ?><a class="btn btn--secondary-light" href="<?= $kontakt->url() ?>"><?= $site->cta_secondary_button_text()->or('Kontakt oss')->html() ?></a><?php endif ?>
          <?php if ($medlem = page('bli-medlem')): ?><a class="btn" href="<?= $medlem->url() ?>"><?= $site->cta_primary_button_text()->or('Bli medlem')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php snippet('footer') ?>
