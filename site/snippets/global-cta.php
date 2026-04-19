<?php $ctaImage = $site->cta_image()->toFile(); ?>
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
          <?php $url = $site->cta_secondary_button_url()->isNotEmpty() ? $site->cta_secondary_button_url()->escape() : (($p = page('kontakt')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-light" href="<?= $url ?>"><?= $site->cta_secondary_button_text()->or('Kontakt oss')->html() ?></a><?php endif ?>
          <?php $url = $site->cta_primary_button_url()->isNotEmpty() ? $site->cta_primary_button_url()->escape() : (($p = page('bli-medlem')) ? $p->url() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $site->cta_primary_button_text()->or('Bli medlem')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
  </div>
</section>
