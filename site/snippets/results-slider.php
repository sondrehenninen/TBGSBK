<?php
// $projects — Kirby Pages collection of completed prosjekt pages
// $heading  — optional heading string
$completedProjects = $projects ?? null;
if (!$completedProjects || !$completedProjects->count()) return;
?>
<div class="results-slider-wrap">
  <div class="results-slider-header">
    <h3><?= isset($heading) ? esc($heading) : 'Noe av det vi allerede har fått til' ?></h3>
    <div class="results-slider-nav">
      <button class="results-btn results-btn--prev" aria-label="Forrige">←</button>
      <button class="results-btn results-btn--next" aria-label="Neste">→</button>
    </div>
  </div>
  <div class="results-slider">
    <?php foreach ($completedProjects as $project): $slideImage = $project->hero_image()->toFile(); ?>
    <article class="results-slide">
      <div class="results-slide__text">
        <?php if ($project->card_tag()->isNotEmpty()): ?><span class="result-card__tag"><?= $project->card_tag()->html() ?></span><?php endif ?>
        <h4><?= $project->title()->html() ?></h4>
        <?php if ($project->hero_intro()->isNotEmpty()): ?><p><?= $project->hero_intro()->html() ?></p><?php endif ?>
        <a class="cta-link" href="<?= $project->url() ?>">→ Les mer</a>
      </div>
      <?php if ($slideImage): ?>
      <div class="results-slide__media">
        <img src="<?= $slideImage->url() ?>" alt="<?= $slideImage->alt()->or($project->title()->esc()) ?>">
      </div>
      <?php endif ?>
    </article>
    <?php endforeach ?>
  </div>
</div>
