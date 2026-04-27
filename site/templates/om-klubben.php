<?php
$heroIcon = $page->hero_icon()->toFile();
$heroImage = $page->hero_image()->toFile();
$introIcon = $page->intro_icon()->toFile();
$primaryImage = $page->primary_image()->toFile();
$locationIcon = $page->location_icon()->toFile();
$secondaryImage = $page->secondary_image()->toFile();
$ctaImage = $site->cta_image()->toFile();
$galleryIcon = $page->gallery_icon()->toFile();
$galleryFeaturedImage = $page->gallery_featured_image()->toFile();
$galleryImages = $page->gallery_images()->toFiles();
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
          <h1><?= $page->hero_title()->or('Et sted å høre til, uansett nivå')->html() ?></h1>
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
    <?php if ($heroImage): ?>
    <div class="subpage-hero__media">
      <img src="<?= $heroImage->url() ?>" alt="<?= $heroImage->alt()->or('Skatere samlet i Tønsberg Skateboardklubb')->esc() ?>">
    </div>
    <?php endif ?>
  </div>
</section>

<section class="section">
  <div class="container split-layout split-layout--align-start">
    <div class="section-copy">
      <?php if ($introIcon): ?><img class="section-icon" src="<?= $introIcon->url() ?>" alt=""><?php endif ?>
      <div class="flow">
        <div class="section-heading">
          <?php if ($page->intro_label()->isNotEmpty()): ?><p class="label"><?= $page->intro_label()->html() ?></p><?php endif ?>
          <h2><?= $page->intro_title()->or('Frivillig drevet og rotfestet i Tønsberg')->html() ?></h2>
        </div>
        <?= $page->intro_body()->kt() ?>
        <?php $url = $page->intro_button_url()->isNotEmpty() ? $page->intro_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-dark" href="<?= $url ?>"><?= $page->intro_button_text()->or('Kontakt klubben')->html() ?></a><?php endif ?>
      </div>
    </div>
    <div class="about-story">
      <?php if ($primaryImage): ?>
      <div class="media-frame">
        <img class="event-photo" src="<?= $primaryImage->url() ?>" alt="<?= $primaryImage->alt()->or('Skisse av permanent innendørshall for Tønsberg Skateboardklubb')->esc() ?>">
      </div>
      <?php endif ?>
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
        <?php if ($icon): ?><img class="value-card__icon" src="<?= $icon->url() ?>" alt=""><?php endif ?>
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
      <?php if ($locationIcon): ?><img class="section-icon" src="<?= $locationIcon->url() ?>" alt=""><?php endif ?>
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
        <?php $url = $page->location_primary_button_url()->isNotEmpty() ? $page->location_primary_button_url()->escape() : (($p = page('apningstider')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-dark" href="<?= $url ?>"><?= $page->location_primary_button_text()->or('Se åpningstider')->html() ?></a><?php endif ?>
      </div>
    </div>
    <div class="about-story">
      <?php if ($secondaryImage): ?>
      <div class="media-frame">
        <img class="event-photo" src="<?= $secondaryImage->url() ?>" alt="<?= $secondaryImage->alt()->or('Miniramp og nye elementer i Messehall B')->esc() ?>">
      </div>
      <?php endif ?>
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
      <?php $url = $page->projects_button_url()->isNotEmpty() ? $page->projects_button_url()->escape() : (($p = page('sponsorer')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-dark" href="<?= $url ?>"><?= $page->projects_button_text()->or('Se støtte og samarbeid')->html() ?></a><?php endif ?>
    </div>
    <?php $listedProjects = page('prosjekter') ? page('prosjekter')->children()->listed()->filter(fn($p) => !$p->completed()->isTrue()) : null; ?>
    <?php if ($listedProjects && $listedProjects->count()): ?>
    <div class="project-grid">
      <?php foreach ($listedProjects as $project): ?>
      <a href="<?= $project->url() ?>" class="project-card">
        <?php if ($project->card_tag()->isNotEmpty()): ?><span class="project-card__tag"><?= $project->card_tag()->html() ?></span><?php endif ?>
        <h3><?= $project->title()->html() ?></h3>
        <?php if ($project->hero_intro()->isNotEmpty()): ?><p><?= $project->hero_intro()->html() ?></p><?php endif ?>
      </a>
      <?php endforeach ?>
    </div>
    <?php endif ?>
    <?php
      $completedProjects = page('prosjekter') ? page('prosjekter')->children()->listed()->filter(fn($p) => $p->completed()->isTrue()) : null;
      snippet('results-slider', ['projects' => $completedProjects, 'heading' => $page->results_title()->or('Noe av det vi allerede har fått til')->value()]);
    ?>
  </div>
</section>

<section class="section section--blue">
  <div class="container container--stack">
    <div class="section-heading section-heading--stack">
      <?php if ($page->team_label()->isNotEmpty()): ?><p class="label"><?= $page->team_label()->html() ?></p><?php endif ?>
      <h2><?= $page->team_title()->or('Styret og ansvarspersoner')->html() ?></h2>
    </div>
    <div class="team-slider">
      <?php foreach ($page->team_members()->toStructure() as $member): $photo = $member->photo()->toFile(); ?>
      <article class="contact-person contact-person--profile">
        <div class="contact-person__media" aria-hidden="true">
          <?php if ($photo): ?><img src="<?= $photo->url() ?>" alt="<?= $photo->alt()->or($member->name()->esc()) ?>"><?php endif ?>
        </div>
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

<section class="section section--surface">
  <div class="container">
    <div class="section-copy">
      <?php if ($galleryIcon): ?><img class="section-icon" src="<?= $galleryIcon->url() ?>" alt="<?= $galleryIcon->alt()->or('Ikon for galleri')->esc() ?>"><?php endif ?>
      <div class="section-heading gallery-heading">
        <p class="label"><?= $page->gallery_label()->or('Galleri')->html() ?></p>
        <div class="section-heading--split">
          <h2><?= $page->gallery_title()->or('Øyeblikk fra miljøet')->html() ?></h2>
          <?php if ($page->gallery_intro()->isNotEmpty()): ?><p><?= $page->gallery_intro()->html() ?></p><?php endif ?>
          <?php $url = $page->gallery_button_url()->isNotEmpty() ? $page->gallery_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-dark" href="<?= $url ?>">→ <?= $page->gallery_button_text()->or('Kontakt klubben')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
    <div class="gallery-grid">
      <?php foreach ($galleryImages as $index => $image): ?>
      <img class="gallery-card<?= $index === 0 ? ' gallery-card--large' : '' ?>" src="<?= $image->url() ?>" alt="<?= $image->alt()->or('Galleri fra Tønsberg Skateboardklubb')->esc() ?>">
      <?php endforeach ?>
      <?php if (!$galleryImages->count() && $galleryFeaturedImage): ?>
      <img class="gallery-card gallery-card--large" src="<?= $galleryFeaturedImage->url() ?>" alt="<?= $galleryFeaturedImage->alt()->or('Klubbaktivitet')->esc() ?>">
      <?php endif ?>
    </div>
  </div>
</section>

<?php snippet('global-cta') ?>

<?php snippet('footer') ?>
