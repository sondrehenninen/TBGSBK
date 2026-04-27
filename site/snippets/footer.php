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
          <?php if ($medlem = page('bli-medlem')): ?><a href="<?= $medlem->url() ?>">Bli medlem</a><?php endif ?>
          <?php if ($prosjekter = page('prosjekter')): ?><a href="<?= $prosjekter->url() ?>">Prosjekter</a><?php endif ?>
          <?php if ($kontakt = page('kontakt')): ?><a href="<?= $kontakt->url() ?>">Kontakt oss</a><?php endif ?>
          <div class="footer-social">
            <?php if ($site->instagram_url()->isNotEmpty()): ?>
            <a href="<?= $site->instagram_url()->escape() ?>" aria-label="Instagram" class="footer-social__link">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
            </a>
            <?php endif ?>
            <?php if ($site->facebook_url()->isNotEmpty()): ?>
            <a href="<?= $site->facebook_url()->escape() ?>" aria-label="Facebook" class="footer-social__link">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>
            <?php endif ?>
          </div>
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
