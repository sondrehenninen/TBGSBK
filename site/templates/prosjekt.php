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
            <a href="<?= $page->parent()->url() ?>"><?= $page->parent()->title()->html() ?></a>
            <span aria-hidden="true">/</span>
            <span aria-current="page"><?= $page->title()->html() ?></span>
          </nav>
          <h1><?= $page->hero_title()->or($page->title())->html() ?></h1>
        </div>
      </div>
      <div class="subpage-hero__copy">
        <?php if ($page->hero_intro()->isNotEmpty()): ?><p><?= $page->hero_intro()->html() ?></p><?php endif ?>
      </div>
    </div>
  </div>
</section>

<section class="section section--surface">
  <div class="container">
    <div class="section-heading">
      <p class="label"><?= $page->status_label()->or('Status')->html() ?></p>
      <h2><?= $page->status_title()->or('Hvor er vi i prosessen')->html() ?></h2>
    </div>
    <?php if ($page->status_intro()->isNotEmpty()): ?><p><?= $page->status_intro()->html() ?></p><?php endif ?>
    <ul class="notes-list notes-list--checklist">
      <?php foreach ($page->milestones()->toStructure() as $milestone): ?>
      <li class="<?= $milestone->fullfort()->isTrue() ? 'is-done' : '' ?>">
        <span class="milestone-indicator"><?= $milestone->fullfort()->isTrue() ? '✓' : '○' ?></span>
        <?= $milestone->beskrivelse()->html() ?>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-copy section-copy--wide">
      <div class="flow">
        <div class="section-heading">
          <p class="label"><?= $page->goal_label()->or('Mål')->html() ?></p>
          <h2><?= $page->goal_title()->or('Hva vi ønsker å oppnå')->html() ?></h2>
        </div>
        <?= $page->goal_text()->kt() ?>
      </div>
    </div>
  </div>
</section>

<section class="section section--surface">
  <div class="container">
    <div class="cta-panel">
      <div class="flow">
        <div class="section-heading section-heading--stack">
          <h2><?= $page->cta_title()->or('Vil du bidra til dette prosjektet?')->html() ?></h2>
        </div>
        <?php if ($page->cta_text()->isNotEmpty()): ?><p><?= $page->cta_text()->html() ?></p><?php endif ?>
      </div>
      <div class="btn-group">
        <?php $url = $page->cta_button_url()->isNotEmpty() ? $page->cta_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $page->cta_button_text()->or('Ta kontakt')->html() ?></a><?php endif ?>
      </div>
    </div>
  </div>
</section>

<?php snippet('global-cta') ?>

<?php snippet('footer') ?>
