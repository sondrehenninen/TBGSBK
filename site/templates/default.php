<?php
$heroImage = $page->hero_image()->toFile();
$primaryImage = $page->primary_image()->toFile();
$secondaryImage = $page->secondary_image()->toFile();
$ctaImage = $site->cta_image()->toFile();
?>
<?php snippet('header') ?>

<?php if ($page->slug() === 'om-klubben'): ?>
<section class="subpage-hero">
  <div class="container subpage-hero__inner">
    <div class="subpage-hero__top">
      <div class="subpage-hero__identity">
        <div class="subpage-hero__heading">
          <nav class="breadcrumbs" aria-label="Brødsmuler">
            <a href="<?= url() ?>">Hjem</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page"><?= $page->title()->html() ?></span>
          </nav>
          <h1>Et sted å høre til, uansett nivå</h1>
        </div>
      </div>
      <div class="subpage-hero__copy">
        <?php if ($page->hero_intro()->isNotEmpty()): ?><p><?= $page->hero_intro()->html() ?></p><?php endif ?>
        <div class="btn-group">
          <?php if ($medlem = page('bli-medlem')): ?><a class="btn" href="<?= $medlem->url() ?>">Bli medlem</a><?php endif ?>
          <?php if ($kontakt = page('kontakt')): ?><a class="btn btn--secondary-light" href="<?= $kontakt->url() ?>">Kontakt oss</a><?php endif ?>
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
      <div class="flow">
        <?php if ($page->label()->isNotEmpty()): ?><p class="label"><?= $page->label()->html() ?></p><?php endif ?>
        <h2>Frivillig drevet og rotfestet i Tønsberg</h2>
        <?= $page->body()->kt() ?>
        <?php if ($kontakt = page('kontakt')): ?><a class="btn btn--secondary-dark" href="<?= $kontakt->url() ?>">Kontakt klubben</a><?php endif ?>
      </div>
    </div>
    <?php if ($primaryImage): ?>
    <div class="about-story">
      <div class="media-frame">
        <img class="event-photo" src="<?= $primaryImage->url() ?>" alt="<?= $primaryImage->alt()->or('Skisse av permanent innendørshall')->esc() ?>">
      </div>
    </div>
    <?php endif ?>
  </div>
</section>

<section class="section section--blue">
  <div class="container container--stack">
    <div class="section-heading section-heading--stack">
      <p class="label">Miljøet vårt</p>
      <h2>Det vi vil at klubben skal kjennes som</h2>
    </div>
    <div class="value-grid">
      <article class="value-card">
        <h3>Lav terskel for å bli med</h3>
        <p>Du trenger ikke å kjenne noen fra før eller være god for å passe inn. Klubben skal være et trygt sted å starte og et godt sted å bli værende.</p>
      </article>
      <article class="value-card">
        <h3>Bygget rundt Tønsberg-miljøet</h3>
        <p>Vi holder til i Messehall B og Gunnarsbøparken, og jobber hele tiden for å gjøre tilbudet sterkere for alle som skater i området.</p>
      </article>
      <article class="value-card">
        <h3>Mer enn bare en skateøkt</h3>
        <p>Klubben skaper aktivitet, ansvarsfølelse og fellesskap gjennom sessions, arrangementer, opplæring og frivillig innsats.</p>
      </article>
    </div>
  </div>
</section>

<section class="section">
  <div class="container split-layout split-layout--reverse split-layout--align-start">
    <div class="section-copy">
      <div class="flow">
        <p class="label">Hvor vi holder til</p>
        <?php if ($page->secondary_title()->isNotEmpty()): ?><h2><?= $page->secondary_title()->html() ?></h2><?php endif ?>
        <?php if ($page->secondary_body()->isNotEmpty()): ?><?= $page->secondary_body()->kt() ?><?php endif ?>
        <?php if ($page->highlights()->isNotEmpty()): ?>
        <ul class="notes-list">
          <?php foreach ($page->highlights()->toStructure() as $item): ?>
          <li><?= $item->text()->html() ?></li>
          <?php endforeach ?>
        </ul>
        <?php endif ?>
        <div class="btn-group">
          <?php if ($apning = page('apningstider')): ?><a class="btn" href="<?= $apning->url() ?>">Se åpningstider</a><?php endif ?>
          <?php if ($kontakt = page('kontakt')): ?><a class="btn btn--secondary-dark" href="<?= $kontakt->url() ?>">Spør oss</a><?php endif ?>
        </div>
      </div>
    </div>
    <?php if ($secondaryImage): ?>
    <div class="about-story">
      <div class="media-frame">
        <img class="event-photo" src="<?= $secondaryImage->url() ?>" alt="<?= $secondaryImage->alt()->or('Miniramp og nye elementer i Messehall B')->esc() ?>">
      </div>
    </div>
    <?php endif ?>
  </div>
</section>

<section class="section">
  <div class="container container--stack">
    <div class="section-heading section-heading--split">
      <div>
        <p class="label">Pågående prosjekter</p>
        <h2>Det vi jobber med nå</h2>
      </div>
      <?php if ($sponsorer = page('sponsorer')): ?><a class="btn btn--secondary-dark" href="<?= $sponsorer->url() ?>">Se støtte og samarbeid</a><?php endif ?>
    </div>
    <div class="project-grid">
      <article class="project-card">
        <span class="project-card__tag">Hall</span>
        <h3>Permanent innendørshall</h3>
        <p>Et helårstilbud er avgjørende for å sikre trening, utvikling og fellesskap gjennom hele året, uavhengig av vær og sesong.</p>
      </article>
      <article class="project-card">
        <span class="project-card__tag">Park</span>
        <h3>Miniramp i betongparken</h3>
        <p>En ny miniramp vil gi et bredere aktivitetstilbud, både for nybegynnere som vil lære og for erfarne skatere som ønsker flere linjer og muligheter.</p>
      </article>
      <article class="project-card">
        <span class="project-card__tag">Park</span>
        <h3>Ny asfaltstripe</h3>
        <p>Et nytt og tryggere underlag vil gjøre parken bedre egnet for daglig bruk, læring og fremtidige arrangementer.</p>
      </article>
    </div>
  </div>
</section>

<?php elseif ($page->slug() === 'apningstider'): ?>
<section class="subpage-hero">
  <div class="container subpage-hero__inner">
    <div class="subpage-hero__top">
      <div class="subpage-hero__identity">
        <div class="subpage-hero__heading">
          <nav class="breadcrumbs" aria-label="Brødsmuler">
            <a href="<?= url() ?>">Hjem</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page"><?= $page->title()->html() ?></span>
          </nav>
          <h1>Åpningstider og sted</h1>
        </div>
      </div>
      <div class="subpage-hero__copy">
        <?php if ($page->hero_intro()->isNotEmpty()): ?><p><?= $page->hero_intro()->html() ?></p><?php endif ?>
        <div class="btn-group">
          <?php if ($medlem = page('bli-medlem')): ?><a class="btn" href="<?= $medlem->url() ?>">Bli medlem</a><?php endif ?>
          <?php if ($kontakt = page('kontakt')): ?><a class="btn btn--secondary-light" href="<?= $kontakt->url() ?>">Kontakt oss</a><?php endif ?>
        </div>
      </div>
    </div>
    <?php if ($heroImage): ?>
    <div class="subpage-hero__media">
      <img src="<?= $heroImage->url() ?>" alt="<?= $heroImage->alt()->or('Innendørshallen til Tønsberg Skateboardklubb')->esc() ?>">
    </div>
    <?php endif ?>
  </div>
</section>

<hr class="section-rule" />

<section class="section">
  <div class="container split-layout">
    <div class="flow">
      <?php if ($page->label()->isNotEmpty()): ?><p class="label"><?= $page->label()->html() ?></p><?php endif ?>
      <h2>Messehall B</h2>
      <?= $page->body()->kt() ?>
      <?php if ($site->opening_hours()->isNotEmpty()): ?>
      <div class="hours-table">
        <?php foreach ($site->opening_hours()->toStructure() as $row): ?>
        <div class="hours-row">
          <span class="hours-row__day"><?= $row->day()->html() ?></span>
          <span class="hours-row__time"><?= $row->time()->html() ?></span>
        </div>
        <?php endforeach ?>
      </div>
      <?php endif ?>
    </div>
    <div class="flow">
      <?php if ($page->secondary_title()->isNotEmpty()): ?><p class="label">Finn oss</p><h2><?= $page->secondary_title()->html() ?></h2><?php endif ?>
      <?php if ($page->secondary_body()->isNotEmpty()): ?><?= $page->secondary_body()->kt() ?><?php endif ?>
    </div>
  </div>
</section>

<hr class="section-rule" />

<section class="section section--surface">
  <div class="container">
    <div class="cta-panel cta-panel--image">
      <?php if ($ctaImage || $heroImage): ?>
      <div class="cta-panel__media">
        <img src="<?= $ctaImage ? $ctaImage->url() : $heroImage->url() ?>" alt="<?= $ctaImage ? $ctaImage->alt()->or('Innendørshallen til Tønsberg Skateboardklubb')->esc() : $heroImage->alt()->or('Innendørshallen til Tønsberg Skateboardklubb')->esc() ?>">
      </div>
      <?php endif ?>
      <div class="cta-panel__content">
        <div class="cta-panel__copy">
          <div class="cta-panel__text">
            <?php if ($site->cta_title()->isNotEmpty()): ?><h2><?= $site->cta_title()->html() ?></h2><?php endif ?>
            <?php if ($site->cta_text()->isNotEmpty()): ?><p><?= $site->cta_text()->html() ?></p><?php endif ?>
          </div>
        </div>
        <div class="btn-group cta-panel__actions">
          <?php if ($kontakt = page('kontakt')): ?><a class="btn btn--secondary-light" href="<?= $kontakt->url() ?>">Kontakt oss</a><?php endif ?>
          <?php if ($medlem = page('bli-medlem')): ?><a class="btn" href="<?= $medlem->url() ?>">Bli medlem</a><?php endif ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php elseif ($page->slug() === 'bli-medlem'): ?>
<section class="subpage-hero">
  <div class="container subpage-hero__inner">
    <div class="subpage-hero__top">
      <div class="subpage-hero__identity">
        <div class="subpage-hero__heading">
          <nav class="breadcrumbs" aria-label="Brødsmuler">
            <a href="<?= url() ?>">Hjem</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page"><?= $page->title()->html() ?></span>
          </nav>
          <h1>Bli en del av miljøet i Tønsberg</h1>
        </div>
      </div>
      <div class="subpage-hero__copy">
        <?php if ($page->hero_intro()->isNotEmpty()): ?><p><?= $page->hero_intro()->html() ?></p><?php endif ?>
        <div class="btn-group">
          <?php if ($site->member_link()->isNotEmpty()): ?><a class="btn" href="<?= $site->member_link()->escape() ?>">Meld deg inn</a><?php endif ?>
          <?php if ($kontakt = page('kontakt')): ?><a class="btn btn--secondary-light" href="<?= $kontakt->url() ?>">Kontakt oss</a><?php endif ?>
        </div>
      </div>
    </div>
    <?php if ($heroImage): ?>
    <div class="subpage-hero__media">
      <img src="<?= $heroImage->url() ?>" alt="<?= $heroImage->alt()->or('Barn og unge samlet på klubbaktivitet')->esc() ?>">
    </div>
    <?php endif ?>
  </div>
</section>

<section class="section">
  <div class="container split-layout split-layout--align-start">
    <div class="section-copy">
      <div class="flow">
        <?php if ($page->label()->isNotEmpty()): ?><p class="label"><?= $page->label()->html() ?></p><?php endif ?>
        <h2>Et medlemskap er mer enn bare tilgang</h2>
        <?= $page->body()->kt() ?>
      </div>
    </div>
    <?php if ($primaryImage): ?>
    <div class="media-frame">
      <img class="event-photo" src="<?= $primaryImage->url() ?>" alt="<?= $primaryImage->alt()->or('Skatere og frivillige samlet rundt aktivitet i klubben')->esc() ?>">
    </div>
    <?php endif ?>
  </div>
</section>

<section class="section section--surface">
  <div class="container">
    <div class="section-heading">
      <p class="label">Fordeler</p>
      <h2>Dette får du som medlem</h2>
    </div>
    <div class="card-grid card-grid--three">
      <article class="card program-card">
        <span class="event-row__tag">Miljø</span>
        <h3>Tilgang til klubbens aktiviteter</h3>
        <p>Du får tilgang til arrangementer, skateskoler, sessions og aktiviteter gjennom året, og blir lettere en del av det som skjer i miljøet.</p>
      </article>
      <article class="card program-card">
        <span class="event-row__tag">Forbund</span>
        <h3>Fordeler gjennom Brettforbundet</h3>
        <p>Klubben er tilknyttet Brettforbundet og Norges idrettsforbund, noe som gir medlemsfordeler, organisert tilhørighet og flere muligheter videre.</p>
      </article>
      <article class="card program-card">
        <span class="event-row__tag">Trygghet</span>
        <h3>Forsikring og medvirkning</h3>
        <p>Utøvere under 13 år er dekket av NIFs sentrale barneidrettsforsikring, og medlemmer får også stemmerett på årsmøte.</p>
      </article>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-heading">
      <p class="label">Slik fungerer det</p>
      <?php if ($page->secondary_title()->isNotEmpty()): ?><h2><?= $page->secondary_title()->html() ?></h2><?php endif ?>
    </div>
    <?php if ($page->secondary_body()->isNotEmpty()): ?><div class="section-copy section-copy--wide"><?= $page->secondary_body()->kt() ?></div><?php endif ?>
    <?php if ($page->highlights()->isNotEmpty()): ?>
    <div class="card-grid card-grid--three">
      <?php $step = 1; foreach ($page->highlights()->toStructure() as $item): ?>
      <article class="card program-card">
        <span class="event-row__tag"><?= $step++ ?></span>
        <p><?= $item->text()->html() ?></p>
      </article>
      <?php endforeach ?>
    </div>
    <?php endif ?>
  </div>
</section>

<?php if ($page->faq()->isNotEmpty()): ?>
<section class="section">
  <div class="container split-layout split-layout--align-start">
    <div class="section-copy">
      <div class="flow">
        <p class="label">Vanlige spørsmål</p>
        <h2>Det folk ofte lurer på først</h2>
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

<section class="section">
  <div class="container">
    <div class="cta-panel cta-panel--image">
      <?php if ($ctaImage || $primaryImage): ?>
      <div class="cta-panel__media">
        <img src="<?= $ctaImage ? $ctaImage->url() : $primaryImage->url() ?>" alt="<?= $ctaImage ? $ctaImage->alt()->or('Skatere samlet i klubbmiljøet')->esc() : $primaryImage->alt()->or('Skatere samlet i klubbmiljøet')->esc() ?>">
      </div>
      <?php endif ?>
      <div class="cta-panel__content">
        <div class="cta-panel__copy">
          <div class="cta-panel__text">
            <?php if ($site->cta_title()->isNotEmpty()): ?><h2><?= $site->cta_title()->html() ?></h2><?php endif ?>
            <?php if ($site->cta_text()->isNotEmpty()): ?><p><?= $site->cta_text()->html() ?></p><?php endif ?>
          </div>
        </div>
        <div class="btn-group cta-panel__actions">
          <?php if ($kontakt = page('kontakt')): ?><a class="btn btn--secondary-light" href="<?= $kontakt->url() ?>">Kontakt oss</a><?php endif ?>
          <?php if ($site->member_link()->isNotEmpty()): ?><a class="btn" href="<?= $site->member_link()->escape() ?>">Gå til MinIdrett</a><?php endif ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php else: ?>
<section class="subpage-hero subpage-hero--text-only">
  <div class="container subpage-hero__inner">
    <div class="subpage-hero__top">
      <div class="subpage-hero__identity">
        <div class="subpage-hero__heading">
          <nav class="breadcrumbs" aria-label="Brødsmuler">
            <a href="<?= url() ?>">Hjem</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page"><?= $page->title()->html() ?></span>
          </nav>
          <h1><?= $page->title()->html() ?></h1>
        </div>
      </div>
      <?php if ($page->hero_intro()->isNotEmpty()): ?>
      <div class="subpage-hero__copy">
        <p><?= $page->hero_intro()->html() ?></p>
      </div>
      <?php endif ?>
    </div>
  </div>
</section>

<?php if ($page->body()->isNotEmpty()): ?>
<section class="section">
  <div class="container split-layout split-layout--align-start">
    <div class="section-copy section-copy--wide">
      <div class="flow">
        <?php if ($page->label()->isNotEmpty()): ?><p class="label"><?= $page->label()->html() ?></p><?php endif ?>
        <?= $page->body()->kt() ?>
      </div>
    </div>
    <?php if ($page->secondary_title()->isNotEmpty() || $page->secondary_body()->isNotEmpty() || $page->highlights()->isNotEmpty()): ?>
    <div class="flow">
      <?php if ($page->secondary_title()->isNotEmpty()): ?><h2><?= $page->secondary_title()->html() ?></h2><?php endif ?>
      <?php if ($page->secondary_body()->isNotEmpty()): ?><?= $page->secondary_body()->kt() ?><?php endif ?>
      <?php if ($page->highlights()->isNotEmpty()): ?>
      <ul class="notes-list">
        <?php foreach ($page->highlights()->toStructure() as $item): ?>
        <li><?= $item->text()->html() ?></li>
        <?php endforeach ?>
      </ul>
      <?php endif ?>
    </div>
    <?php endif ?>
  </div>
</section>
<?php endif ?>
<?php endif ?>

<?php snippet('footer') ?>
