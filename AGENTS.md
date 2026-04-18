# AGENTS.md — Site to be Published

Denne mappen inneholder den ferdige nettsiden klar for FTP/server-upload.

## Forutsetninger

- Steg 2 (web-generator) er fullført og QA-sjekkliste er grønn
- Steg 3 (CMS) er fullført og Kirby Panel fungerer

## Arbeidsrekkefølge

1. Kopier ferdig site fra `../03_cms/site/` til denne mappen
2. Fjern dev-filer: `node_modules/`, `.git/`, `.DS_Store`, testfiler
3. Fjern workshop-mapper og interne docs
4. Kjør QA-sjekkliste (se under)
5. Verifiser at alle tekster er ekte — ingen placeholder-tekst
6. Siden er klar for FTP-opplasting

## QA-sjekkliste

- [ ] Alle interne lenker fungerer
- [ ] Mobilvisning ser riktig ut (test på 390px)
- [ ] Meta-title og description er satt på alle sider
- [ ] Bilder har alt-tekst
- [ ] Telefonnummer og adresse er korrekte
- [ ] Kontaktskjema fungerer (hvis live backend)
- [ ] Ingen broken images
- [ ] Ingen «FirmaNavn» eller placeholder-tekst igjen

## Serverinfo

Fyll inn ved deployment:
- **Server:** [FTP-adresse]
- **Bruker:** [brukernavn]
- **Sti:** [serversti]
