# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Local development

```bash
composer start        # Start dev server at http://localhost:8001
```

Panel: `http://localhost:8001/panel`

After changing blueprints, restart the server AND hard-refresh the Panel (Cmd+Shift+R) — Kirby caches blueprint output in `site/cache/` and the Panel caches tab state in JS. If tabs still show wrong content, delete `site/cache/localhost_8001/*`.

## Deploy

```bash
git add <files> && git commit -m "message" && git push origin main
ssh -i ~/.ssh/tbgsbk_deploy tonsbergskateboa@login.domeneshop.no \
  "cd /home/6/t/tonsbergskateboa/www/tonsbergskateboardklubb.no && git pull"
```

Server: `login.domeneshop.no`, user `tonsbergskateboa`, web root `/home/6/t/tonsbergskateboa/www/tonsbergskateboardklubb.no`. See `DEPLOY.md` for full setup notes.

## Architecture

Kirby 5.3.3 file-based CMS. No database, no build step, no Node.

**Content:** `content/` — flat `.txt` files, one per page, in numbered folders. Folder number controls sort order. The `.txt` filename must match the template name (e.g. `prosjekt.txt` maps to `site/templates/prosjekt.php`).

**Templates** (`site/templates/`): one PHP file per page type. Each template calls `snippet('header')`, renders sections, then calls `snippet('global-cta')` and `snippet('footer')`.

**Blueprints** (`site/blueprints/`): YAML files that define the Kirby Panel UI. `site/blueprints/site.yml` controls the global Panel (tabs: Sider, Klubbinfo, Profil, Kontakt, Medlemskap, CTA). Page blueprints live in `site/blueprints/pages/`.

**Snippets** (`site/snippets/`):
- `header.php` — full `<html>` open, loads all CSS, renders nav
- `footer.php` — renders footer nav and closes `</html>`
- `global-cta.php` — the shared CTA panel used on every page (edit once, updates everywhere)

**CSS** (`assets/css/`): five files loaded in order — `tokens.css` (design tokens / CSS variables), `base.css`, `layout.css`, `components.css`, `pages.css`. No preprocessor.

**JS** (`assets/js/`): `navigation.js` handles the mobile nav toggle (`.nav-toggle` button ↔ `.site-nav.is-open`). `main.js` for any other interactions. Both loaded with `defer` in `footer.php`.

**Config** (`site/config/config.php`): Kirby config. Currently empty (`return []`). Do not add `'panel.install' => true` on a live server.

## Key patterns

**Global site fields** — accessed via `$site->fieldname()` in any template. Defined in `site/blueprints/site.yml`. Important ones: `cta_*` (CTA section content), `opening_hours`, `season_notice`, `member_link`, `epost`, `telefon`, navigation texts/URLs.

**Button URL fallback pattern** — every button URL uses this pattern:
```php
<?php $url = $page->field_url()->isNotEmpty() ? $page->field_url()->escape() : (($p = page('slug')) ? $p->url() : ''); if ($url): ?>
<a href="<?= $url ?>">...</a>
<?php endif ?>
```

**Section keys must be unique** across all tabs in a blueprint. Using `fields` as the section key in multiple tabs causes Kirby to show the wrong tab content. Name each section key after its tab (e.g. tab `kontakt` → section key `kontakt`).

**List pages + subpages** — `arrangementer`/`arrangement` and `prosjekter`/`prosjekt` follow the same pattern: a list blueprint with a `pages` section (type: pages, templates: [...], create: ...) and a subpage blueprint. List pages must also be registered in `site/blueprints/site.yml` under `hoofdsider` → `templates` and `create`.

**Structure fields** — rendered with `->toStructure()` before looping. Toggle fields checked with `->isTrue()`.

**Kirbytext** — use `->kt()` for textarea fields that support bold/italic/link/ul buttons. Use `->html()` for plain text fields.

**Footer links are hardcoded** in `site/snippets/footer.php` using `page('slug')` lookups — they are not blueprint-driven. Add new footer links there directly.

**Subpage pattern** — `sponsorer`/`sponsor` follows the same list+subpage pattern as `arrangementer`/`arrangement` and `prosjekter`/`prosjekt`.
