  </main>
  <?php $footerLogo = $site->footer_logo()->toFile(); ?>
  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <img class="footer-brand-mark" src="<?= $footerLogo ? $footerLogo->url() : url('assets/logo/SVG/TBGSBK - round black.svg') ?>" alt="<?= $site->club_name()->or('Tønsberg Skateboardklubb')->escape() ?>">
        </div>
        <div class="footer-nav">
          <h4>Lenker</h4>
          <?php if ($om = page('om-klubben')): ?><a href="<?= $om->url() ?>">Om klubben</a><?php endif ?>
          <?php if ($arrangementer = page('arrangementer')): ?><a href="<?= $arrangementer->url() ?>">Arrangementer</a><?php endif ?>
          <?php if ($apning = page('apningstider')): ?><a href="<?= $apning->url() ?>">Åpningstider</a><?php endif ?>
          <?php if ($sponsorer = page('sponsorer')): ?><a href="<?= $sponsorer->url() ?>">Sponsorer</a><?php endif ?>
        </div>
        <div class="footer-nav">
          <h4>Informasjon</h4>
          <?php if ($medlem = page('bli-medlem')): ?><a href="<?= $medlem->url() ?>">Bli med</a><?php endif ?>
          <?php if ($prosjekter = page('prosjekter')): ?><a href="<?= $prosjekter->url() ?>">Prosjekter</a><?php endif ?>
          <?php if ($kontakt = page('kontakt')): ?><a href="<?= $kontakt->url() ?>">Kontakt oss</a><?php endif ?>
          <?php if ($site->epost()->isNotEmpty()): ?><a href="mailto:<?= $site->epost()->escape() ?>"><?= $site->epost()->html() ?></a><?php endif ?>
          <?php if ($site->telefon()->isNotEmpty()): ?><a href="tel:<?= $site->telefon()->escape() ?>"><?= $site->telefon()->html() ?></a><?php endif ?>
          <?php if ($site->instagram_url()->isNotEmpty()): ?><a href="<?= $site->instagram_url()->escape() ?>">Instagram</a><?php endif ?>
          <?php if ($site->facebook_url()->isNotEmpty()): ?><a href="<?= $site->facebook_url()->escape() ?>">Facebook</a><?php endif ?>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© <?= date('Y') ?> <?= $site->club_name()->or('Tønsberg Skateboardklubb') ?></p>
        <?php if ($site->footer_text()->isNotEmpty()): ?><p><?= $site->footer_text()->html() ?></p><?php endif ?>
      </div>
    </div>
  </footer>
  <script src="<?= url('assets/js/navigation.js') ?>" defer></script>
  <script src="<?= url('assets/js/main.js') ?>" defer></script>
</body>
</html>
