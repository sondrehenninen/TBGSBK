# Prosjekter-side Design

**Dato:** 2026-04-19

---

## Mål

Ny «Prosjekter»-side med underside per prosjekt. Hvert prosjekt har en sjekkliste for status, et målseksjon og en CTA til kontaktsiden. Siden vises i footer og lenkes fra Sponsorer-seksjonen på forsiden.

---

## Arkitektur

Samme mønster som Arrangementer: én listeside (`prosjekter`) med subpages (`prosjekt`). Kirby håndterer subpages automatisk under `content/prosjekter/`.

```
content/
  prosjekter/
    prosjekter.txt          ← listevisning
    1_fast-innendorshall/
      prosjekt.txt          ← eksempelprosjekt
```

---

## Del 1: Prosjekter-listesiden

### Blueprint `site/blueprints/pages/prosjekter.yml`

Tabs:
- **Hero** — title, hero_icon, hero_title, hero_intro, hero_image, hero_primary_button_text/url, hero_secondary_button_text/url
- **Prosjekter** — label+tittel (1/3+2/3), intro-tekst, `pages`-seksjon med template `prosjekt`
- **SEO** — meta_description

### Template `site/templates/prosjekter.php`

- Subpage-hero (felles mønster)
- Seksjon med label/tittel/intro
- Liste over prosjekt-subpages: tittel, ingress, lenke til prosjektsiden
- Global CTA fra `$site`

---

## Del 2: Individuell prosjektside

### Blueprint `site/blueprints/pages/prosjekt.yml`

Tabs:
- **Hero** — title, hero_icon, hero_title, hero_intro, hero_image
- **Status** — label (1/3) + tittel (2/3), intro-tekst, `milestones`-struktur:
  ```
  beskrivelse  [text]
  fullfort     [toggle: Nei / Ja]
  ```
- **Mål** — label (1/3) + tittel (2/3), mål-tekst (textarea med bold/italic/link/ul)
- **CTA** — cta_title, cta_text, cta_button_text (1/2) + cta_button_url (1/2)
- **SEO** — meta_description

### Template `site/templates/prosjekt.php`

- Subpage-hero (breadcrumb: Hjem / Prosjekter / [tittel])
- Status-seksjon: liste over milepæler med visuell indikator (fullført = ✓, ikke fullført = ○)
- Mål-seksjon: label/tittel/tekst
- CTA-panel som lenker til kontaktsiden (bruker CTA-felt fra siden, ikke global)
- Global footer-CTA fra `$site`

---

## Del 3: Navigasjon og lenker

- Legg `prosjekter`-template til i `site/blueprints/site.yml` → `hovedsider`-listen
- Legg til lenke i `site/snippets/footer.php` (eller tilsvarende footer-snippet)
- Legg til `prosjekter_button_url`-felt i `home.yml` Sponsorer-tab som peker til `/prosjekter`

---

## Avgrensning

- Ingen database — alt lagres som Kirby txt-filer
- Kontaktskjema er en CTA-lenke til eksisterende kontaktside, ikke et eget skjema
- Ingen sortering eller filtrering av prosjekter i første versjon
- Sjekklistestatus er kun synlig i Panel — ikke vist som interaktiv sjekkliste på frontend (kun visuell indikator)
