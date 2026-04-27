<?php
$heroIcon = $page->hero_icon()->toFile();
$heroImage = $page->hero_image()->toFile();
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
          <h1><?= $page->hero_title()->or('Vi hører gjerne fra deg')->html() ?></h1>
        </div>
      </div>
      <div class="subpage-hero__copy">
        <?php if ($page->hero_ingress()->isNotEmpty()): ?><p><?= $page->hero_ingress()->html() ?></p><?php endif ?>
        <div class="btn-group">
          <?php $url = $page->hero_primary_button_url()->isNotEmpty() ? $page->hero_primary_button_url()->escape() : ($site->epost()->isNotEmpty() ? 'mailto:' . $site->epost()->escape() : ''); if ($url): ?><a class="btn" href="<?= $url ?>"><?= $page->hero_primary_button_text()->or('Send e-post')->html() ?></a><?php endif ?>
          <?php $url = $page->hero_secondary_button_url()->isNotEmpty() ? $page->hero_secondary_button_url()->escape() : (($p = page('bli-medlem')) ? $p->url() : ''); if ($url): ?><a class="btn btn--secondary-light" href="<?= $url ?>"><?= $page->hero_secondary_button_text()->or('Bli medlem')->html() ?></a><?php endif ?>
        </div>
      </div>
    </div>
    <?php if ($heroImage): ?>
    <div class="subpage-hero__media">
      <img src="<?= $heroImage->url() ?>" alt="<?= $heroImage->alt()->or($page->title())->esc() ?>">
    </div>
    <?php endif ?>
  </div>
</section>

<section class="section section--blue">
  <div class="container container--stack">
    <div class="section-heading section-heading--stack">
      <p class="label"><?= $page->people_label()->or('Kontaktpersoner')->html() ?></p>
      <h2><?= $page->people_title()->or('Hvem kan hjelpe deg?')->html() ?></h2>
    </div>
    <?php if ($page->contact_intro()->isNotEmpty()): ?><p><?= $page->contact_intro()->html() ?></p><?php endif ?>
    <div class="team-slider">
      <?php foreach ($page->kontaktpersoner()->toStructure() as $person): $photo = $person->photo()->toFile(); ?>
      <article class="contact-person contact-person--profile">
        <div class="contact-person__media" aria-hidden="true">
          <?php if ($photo): ?><img src="<?= $photo->url() ?>" alt="<?= $photo->alt()->or($person->navn()->esc()) ?>"><?php endif ?>
        </div>
        <div class="contact-person__body">
          <p class="contact-person__name"><?= $person->navn()->html() ?></p>
          <div class="contact-person__details">
            <?php if ($person->rolle()->isNotEmpty()): ?><p class="contact-person__role"><?= $person->rolle()->html() ?></p><?php endif ?>
            <?php if ($person->epost()->isNotEmpty()): ?><p class="contact-person__info"><a href="mailto:<?= $person->epost()->escape() ?>"><?= $person->epost()->html() ?></a></p><?php endif ?>
            <?php if ($person->telefon()->isNotEmpty()): ?><p class="contact-person__info"><a href="tel:<?= $person->telefon()->escape() ?>"><?= $person->telefon()->html() ?></a></p><?php endif ?>
          </div>
        </div>
      </article>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container split-layout split-layout--align-start contact-layout">
    <div class="contact-layout__people">
      <div class="flow">
        <?php if ($page->contact_text_label()->isNotEmpty()): ?><p class="label"><?= $page->contact_text_label()->html() ?></p><?php endif ?>
        <h2><?= $page->contact_text_title()->or('Kom i kontakt med oss')->html() ?></h2>
        <?php if ($page->contact_text_body()->isNotEmpty()): ?><p><?= $page->contact_text_body()->html() ?></p><?php endif ?>
      </div>
      <div class="contact-meta">
        <?php if ($page->social_text()->isNotEmpty()): ?>
        <div>
          <p class="label"><?= $page->social_label()->or('Sosiale medier')->html() ?></p>
          <?= $page->social_text()->kt() ?>
        </div>
        <?php endif ?>
        <?php if ($page->address_text()->isNotEmpty()): ?>
        <div>
          <p class="label"><?= $page->address_label()->or('Adresse')->html() ?></p>
          <?= $page->address_text()->kt() ?>
        </div>
        <?php endif ?>
      </div>
    </div>
    <div class="contact-layout__form">
      <div class="contact-form-panel">
        <div class="section-heading section-heading--stack">
          <p class="label"><?= $page->form_label()->or('Send melding')->html() ?></p>
          <h2><?= $page->form_title()->or('Fortell oss hva det gjelder')->html() ?></h2>
        </div>
        <?php if ($page->form_intro()->isNotEmpty()): ?><p><?= $page->form_intro()->html() ?></p><?php endif ?>
        <?php if ($formSent): ?>
        <p class="form-feedback form-feedback--ok"><?= $page->form_success_text()->or('Takk! Vi svarer så snart vi kan.')->html() ?></p>
        <?php else: ?>
        <?php if ($formError): ?><p class="form-feedback form-feedback--error"><?= esc($formError) ?></p><?php endif ?>
        <form class="form" method="post" action="<?= $page->url() ?>#kontakt-skjema" id="kontakt-skjema">
          <input type="hidden" name="contact_submit" value="1">
          <label class="form-field">
            <?= $page->form_name_label()->or('Navn')->html() ?>
            <input class="form-input" type="text" name="name" value="<?= esc(get('name') ?? '') ?>" required />
          </label>
          <label class="form-field">
            <?= $page->form_email_label()->or('E-post')->html() ?>
            <input class="form-input" type="email" name="email" value="<?= esc(get('email') ?? '') ?>" required />
          </label>
          <label class="form-field">
            <?= $page->form_message_label()->or('Hva gjelder det?')->html() ?>
            <textarea class="form-input" name="message" rows="5" required><?= esc(get('message') ?? '') ?></textarea>
          </label>
          <button type="submit" class="btn"><?= $page->form_submit_text()->or('Send melding')->html() ?></button>
        </form>
        <?php endif ?>
      </div>
    </div>
  </div>
</section>

<?php snippet('global-cta') ?>

<?php snippet('footer') ?>
