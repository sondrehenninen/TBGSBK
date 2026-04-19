<?php
$heroIcon = $page->hero_icon()->toFile();
$heroImage = $page->hero_image()->toFile();
$introIcon = $page->intro_icon()->toFile();
$primaryImage = $page->primary_image()->toFile();
$practicalIcon = $page->practical_icon()->toFile();
$secondaryImage = $page->secondary_image()->toFile();
$faqIcon = $page->faq_icon()->toFile();
$ctaImage = $site->cta_image()->toFile();
?>
<?php snippet('header') ?>

<section class="subpage-hero">
  <div class="container subpage-hero__inner">
    <div class="subpage-hero__top">
      <div class="subpage-hero__mark">
        <img src="<?= $heroIcon ? $heroIcon->url() : url('assets/Ilustrasjoner/white/SVG/berrings2.svg') ?>" alt="">
      </div>
      <div class="subpage-hero__identity">
        <div class="subpage-hero__heading">
          <nav class="breadcrumbs" aria-label="Brødsmuler">
            <a href="<?= url() ?>">Hjem</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page"><?= $page->title()->html() ?></span>
          </nav>
          <h1><?= $page->hero_title()->or('Bli en del av miljøet i Tønsberg')->html() ?></h1>
        </div>
      </div>
      <div class="subpage-hero__copy">
        <?php if ($page->hero_intro()->isNotEmpty()): ?><p><?= $page->hero_intro()->html() ?></p><?php endif ?>
        <div class="btn-group">
          <?php $url = $page->hero_primary_button_url()->isNotEmpty() ? $page->hero_primary_button_url()->escape() : ($site->member_link()->isNotEmpty() ? $site->member_link()->escape() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $page->hero_primary_button_text()->or('Meld deg inn')->html() ?></a><?php endif ?>
          <?php $url = $page->hero_secondary_button_url()->isNotEmpty() ? $page->hero_secondary_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-light" href="<?= $url ?>"><?= $page->hero_secondary_button_text()->or('Kontakt oss')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
    <div class="subpage-hero__media">
      <img src="<?= $heroImage ? $heroImage->url() : url('assets/Bilder til nettsiden/Sommerskate 2025/IMG_7315.webp') ?>" alt="<?= $heroImage ? $heroImage->alt()->or('Barn og unge samlet på klubbaktivitet i Tønsberg Skateboardklubb')->esc() : 'Barn og unge samlet på klubbaktivitet i Tønsberg Skateboardklubb' ?>">
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
          <h2><?= $page->intro_title()->or('Et medlemskap er mer enn bare tilgang')->html() ?></h2>
        </div>
        <?= $page->intro_body()->kt() ?>
      </div>
    </div>
    <div class="media-frame">
      <img class="event-photo" src="<?= $primaryImage ? $primaryImage->url() : url('assets/Bilder til nettsiden/Sommerskate 2025/IMG_5676.webp') ?>" alt="<?= $primaryImage ? $primaryImage->alt()->or('Skatere og frivillige samlet rundt aktivitet i klubben')->esc() : 'Skatere og frivillige samlet rundt aktivitet i klubben' ?>">
    </div>
  </div>
</section>

<section class="section section--surface">
  <div class="container">
    <div class="section-heading">
      <?php if ($page->benefits_label()->isNotEmpty()): ?><p class="label"><?= $page->benefits_label()->html() ?></p><?php endif ?>
      <h2><?= $page->benefits_title()->or('Dette får du som medlem')->html() ?></h2>
    </div>
    <div class="card-grid card-grid--three">
      <?php foreach ($page->benefits()->toStructure() as $benefit): ?>
      <article class="card program-card">
        <span class="event-row__tag"><?= $benefit->tag()->html() ?></span>
        <h3><?= $benefit->title()->html() ?></h3>
        <p><?= $benefit->text()->html() ?></p>
      </article>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-heading">
      <?php if ($page->steps_label()->isNotEmpty()): ?><p class="label"><?= $page->steps_label()->html() ?></p><?php endif ?>
      <h2><?= $page->steps_title()->or('Tre enkle steg for å komme i gang')->html() ?></h2>
    </div>
    <div class="card-grid card-grid--three">
      <?php foreach ($page->steps()->toStructure() as $step): ?>
      <article class="card program-card">
        <span class="event-row__tag"><?= $step->tag()->html() ?></span>
        <h3><?= $step->title()->html() ?></h3>
        <p><?= $step->text()->html() ?></p>
      </article>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="section section--surface">
  <div class="container split-layout split-layout--reverse split-layout--align-start">
    <div class="media-frame">
      <img class="event-photo" src="<?= $secondaryImage ? $secondaryImage->url() : url('assets/Bilder til nettsiden/Nye elementer 2025/a frame.webp') ?>" alt="<?= $secondaryImage ? $secondaryImage->alt()->or('Skateelementer i hallen til Tønsberg Skateboardklubb')->esc() : 'Skateelementer i hallen til Tønsberg Skateboardklubb' ?>">
    </div>
    <div class="section-copy">
      <img class="section-icon" src="<?= $practicalIcon ? $practicalIcon->url() : url('assets/Ilustrasjoner/white/SVG/tool1.svg') ?>" alt="">
      <div class="flow">
        <div class="section-heading">
          <?php if ($page->practical_label()->isNotEmpty()): ?><p class="label"><?= $page->practical_label()->html() ?></p><?php endif ?>
          <h2><?= $page->practical_title()->or('Greit å vite før du melder deg inn')->html() ?></h2>
        </div>
        <?php if ($page->practical_notes()->isNotEmpty()): ?>
        <ul class="notes-list">
          <?php foreach ($page->practical_notes()->toStructure() as $item): ?>
          <li><?= $item->text()->html() ?></li>
          <?php endforeach ?>
        </ul>
        <?php endif ?>
        <?php if ($site->member_price()->isNotEmpty()): ?><p><strong><?= $site->member_price()->html() ?></strong></p><?php endif ?>
        <div class="btn-group">
          <?php $url = $page->practical_primary_button_url()->isNotEmpty() ? $page->practical_primary_button_url()->escape() : ($site->member_link()->isNotEmpty() ? $site->member_link()->escape() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $page->practical_primary_button_text()->or('Gå til MinIdrett')->html() ?></a><?php endif ?>
          <?php $url = $page->practical_secondary_button_url()->isNotEmpty() ? $page->practical_secondary_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-dark" href="<?= $url ?>"><?= $page->practical_secondary_button_text()->or('Still spørsmål først')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container split-layout split-layout--align-start">
    <div class="section-copy">
      <img class="section-icon" src="<?= $faqIcon ? $faqIcon->url() : url('assets/Ilustrasjoner/white/SVG/broken_board1.svg') ?>" alt="">
      <div class="flow">
        <div class="section-heading">
          <?php if ($page->faq_label()->isNotEmpty()): ?><p class="label"><?= $page->faq_label()->html() ?></p><?php endif ?>
          <h2><?= $page->faq_title()->or('Det folk ofte lurer på først')->html() ?></h2>
        </div>
        <?php if ($page->faq_intro()->isNotEmpty()): ?><p><?= $page->faq_intro()->html() ?></p><?php endif ?>
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

<?php snippet('global-cta') ?>

<?php snippet('footer') ?>
