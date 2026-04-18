<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $page->title()->escape() ?> | <?= $site->club_name()->or('Tønsberg Skateboardklubb')->escape() ?></title>
  <meta name="description" content="<?= $page->meta_description()->or($site->description())->escape() ?>" />
  <link rel="stylesheet" href="<?= url('assets/css/tokens.css') ?>" />
  <link rel="stylesheet" href="<?= url('assets/css/base.css') ?>" />
  <link rel="stylesheet" href="<?= url('assets/css/layout.css') ?>" />
  <link rel="stylesheet" href="<?= url('assets/css/components.css') ?>" />
  <link rel="stylesheet" href="<?= url('assets/css/pages.css') ?>" />
</head>
<body>
  <?php
  $headerLogoMark = $site->header_logo_mark()->toFile();
  $headerLogoWordmark = $site->header_logo_wordmark()->toFile();
  ?>
  <header class="site-header">
    <div class="container header-inner">
      <a class="site-brand" href="<?= url() ?>">
        <img class="site-brand-mark" src="<?= $headerLogoMark ? $headerLogoMark->url() : url('assets/logo/SVG/TBGSBK - round black yellow.svg') ?>" alt="<?= $site->club_name()->or('Tønsberg Skateboardklubb')->escape() ?>">
        <img class="site-brand-wordmark" src="<?= $headerLogoWordmark ? $headerLogoWordmark->url() : url('assets/logo/SVG/TBGSBK - horizontal - liggende simple black.svg') ?>" alt="">
      </a>
      <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-navigation" aria-label="Åpne meny"><?= $site->menu_button_text()->or('Meny')->html() ?></button>
      <nav class="site-nav" id="site-navigation" aria-label="Hovednavigasjon">
        <?php if ($arrangementer = page('arrangementer')): ?>
        <a href="<?= $arrangementer->url() ?>" <?php e($arrangementer->isOpen(), 'aria-current="page"') ?>><?= $site->nav_events_text()->or('Arrangementer')->html() ?></a>
        <?php endif ?>
        <?php if ($om = page('om-klubben')): ?>
        <a href="<?= $om->url() ?>" <?php e($om->isOpen(), 'aria-current="page"') ?>><?= $site->nav_about_text()->or('Om klubben')->html() ?></a>
        <?php endif ?>
        <?php if ($kontakt = page('kontakt')): ?>
        <a href="<?= $kontakt->url() ?>" <?php e($kontakt->isOpen(), 'aria-current="page"') ?>><?= $site->nav_contact_text()->or('Kontakt oss')->html() ?></a>
        <?php endif ?>
        <?php if ($medlem = page('bli-medlem')): ?>
        <a class="nav-cta" href="<?= $medlem->url() ?>" <?php e($medlem->isOpen(), 'aria-current="page"') ?>><?= $site->nav_member_text()->or('Bli medlem')->html() ?></a>
        <?php endif ?>
      </nav>
    </div>
  </header>
  <main>
