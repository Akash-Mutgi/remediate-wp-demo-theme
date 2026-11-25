# Stadt Musterhausen – Bürgerservice (Demo-Theme)

> **Fiktiv.** „Stadt Musterhausen" gibt es nicht. Dieses WordPress-Theme ist eine Demo und gehört zu keiner echten Behörde: kein echtes Wappen, kein Bundesadler, keine echten Namen, Adressen oder Telefonnummern. Jede Seite zeigt den Hinweis „Demo – fiktive Website, keine echte Behörde", und `header.php` setzt `<meta name="robots" content="noindex">`.

A classic WordPress theme in the style of a German municipal Bürgerservice website, built to demonstrate Klara's GitHub remediation on PHP theme templates (Remediate.AI, phase 1). It contains **nine deliberately planted accessibility issues**. Everything else is meant to be accessible, so a scan shows the planted issues and nothing else.

Klara's PHP support is behind the server flag `KLARA_GITHUB_PHP_ENABLED`. With the flag off, Klara does not read `.php` files at all. With it on, it opens **draft** pull requests only, never verified ones, and it never merges.

## Files

| File | What it is |
|---|---|
| `style.css` | Theme header and styles (contrast-checked colours, visible focus) |
| `functions.php` | Theme setup, stylesheet, fallback navigation |
| `header.php` | Demo notice, logo, "Leichte Sprache", search, main navigation |
| `searchform.php` | Search field and search button (loaded with `get_search_form()`) |
| `index.php` | Front page: hero, service tiles, news list (The Loop) |
| `template-parts/hero.php` | Front-page hero, loaded with `get_template_part` |
| `page.php` | Content pages, with a banner image |
| `footer.php` | Contact, opening hours, social links, newsletter |
| `404.php` | Not-found page |
| `assets/img/*.svg` | Invented logo and illustrations |

## Planted issues Klara SHOULD fix (draft pull request)

| # | Issue | File | Scanner rule | Expected result |
|---|---|---|---|---|
| S1 | Logo `<img class="site-logo">` has no `alt` | `header.php` | `image-alt` | Draft PR adding `alt="…"` to that one tag |
| S2 | Icon-only search button `<button class="search-submit">` has no accessible name | `searchform.php` | `button-name` | Draft PR adding `aria-label="…"` |
| S3 | Social icon link `<a class="social-instagram">` has no accessible name | `footer.php` | `link-name` | Draft PR adding `aria-label="…"` |
| S4 | Newsletter email `<input id="newsletter-email">` has the invalid `autocomplete="mail"` | `footer.php` | `autocomplete-valid` | Draft PR changing it to `autocomplete="email"` |

**S4 note.** The scanner (axe `autocomplete-valid`) only reports an *invalid* autocomplete value; it cannot see a *missing* one. So the issue is planted as an invalid value.

## Planted issues Klara must REFUSE (no pull request)

| # | Issue | File | Scanner rule | Why Klara refuses |
|---|---|---|---|---|
| S5 | Search field `<input class="search-field">` has no label | `searchform.php` | `label` | **Known phase 1 limit.** The `label` rule is always fixed by inserting a `<label>` element, and phase 1 never inserts elements into PHP templates. It only changes `alt`, `aria-label` and `autocomplete` on an element that already exists. A developer fixes this one. |
| R1 | News images `<img class="news-thumb">` without `alt`, **inside The Loop** | `index.php` | `image-alt` | Rendered once per post; one fixed value would be wrong for most posts. (axe reports these with a positional selector, `.news-item:nth-child(n) > …`, which Klara never maps onto a template.) |
| R2 | Badge `<img class="footer-badge">` **printed by PHP** (`echo '<img …>'`) | `footer.php` | `image-alt` | The markup is PHP code, not HTML in the template; Klara never edits PHP. |
| R3 | Hero image `<img class="hero-image">` in a **template part** loaded with `get_template_part` | `template-parts/hero.php` | `image-alt` | Only page templates WordPress loads once per page are edited (allowlist). |
| R4 | Page banner `<img class="page-banner">` whose **`alt` comes from PHP** | `page.php` | `image-alt` | The alt is built from two custom fields with a space between them, so with both empty it renders `alt=" "`, which axe flags. The value is set by PHP at render time, and Klara never overwrites it. |

## What a scan finds

axe-core 4.11 was run on the front page and on a content page, rendered as WordPress would render them with the demo content below. It reported **only the planted issues**, with nothing marked for manual review:

| Page | axe violations |
|---|---|
| Front page | `image-alt`: `.site-logo`, `.hero-image`, 3 × `.news-thumb`, `.footer-badge` · `button-name`: `.search-submit` · `link-name`: `.social-instagram` · `autocomplete-valid`: `#newsletter-email` · `label`: `.search-field` |
| Content page | `image-alt`: `.site-logo`, `.page-banner`, `.footer-badge` · `button-name`, `link-name`, `autocomplete-valid`, `label` as above |

## Planner result (2026-11-25, Klara phase 1, no GitHub writes)

| # | Expected | Actual |
|---|---|---|
| S1 | draft PR | draft PR — `header.php`, `alt` added |
| S2 | draft PR | draft PR — `searchform.php`, `aria-label` added |
| S3 | draft PR | draft PR — `footer.php`, `aria-label` added |
| S4 | draft PR | draft PR — `footer.php`, `autocomplete="email"` |
| S5 | refused (known limit) | refused — "this kind of fix is not made in PHP templates yet" |
| R1 | refused | refused — positional selector against a PHP template (the element is also inside The Loop) |
| R2 | refused | not located — markup printed by PHP is not HTML in the template |
| R3 | refused | refused — "not a page template WordPress loads once per page" |
| R4 | refused | refused — "the alt attribute is set by PHP" |

Each draft PR changes exactly one line; the PHP code in the file is unchanged token for token.

## Setting up the WordPress site

1. **Settings → General:** set *Site Language* to **Deutsch**, so the page carries `lang="de-DE"`. Set the title to "Stadt Musterhausen (Demo)".
2. **Settings → Reading:** *Your homepage displays* → **Your latest posts**. Also tick *Discourage search engines from indexing this site*.
3. **Settings → Permalinks:** **Post name**.
4. Leave **Appearance → Menus** empty. The theme then shows its built-in navigation.
5. Create the content below. **Do not add the custom fields `banner_alt` or `banner_credit`** to the page; R4 depends on them being empty.
6. Disable page caching (or purge it after every merge) so a re-scan sees the deployed theme.

## Demo content to paste into WordPress

Create these with *Posts → Add New* and *Pages → Add New*. No featured images are needed.

### Post 1

**Title:** Online-Terminvergabe im Bürgerbüro startet

**Text:**

Ab sofort können Sie Ihren Termin im Bürgerbüro rund um die Uhr online buchen. Wählen Sie dazu einfach die gewünschte Leistung und einen freien Zeitpunkt aus.

Bitte bringen Sie zu Ihrem Termin alle notwendigen Unterlagen mit, zum Beispiel Ihren Personalausweis. Eine Übersicht finden Sie unter „Formulare & Anträge".

Wer keinen Internetzugang hat, kann Termine weiterhin telefonisch vereinbaren. *(Hinweis: Diese Meldung ist fiktiv.)*

### Post 2

**Title:** Abfallkalender 2027 ist da

**Text:**

Der Abfallkalender für das Jahr 2027 steht ab heute online bereit. Er zeigt die Abholtermine für Restmüll, Biomüll, Papier und gelbe Säcke für jede Straße in Musterhausen.

Die gedruckte Ausgabe wird im Dezember an alle Haushalte verteilt. Zusätzlich liegt sie im Bürgerbüro aus.

Tipp: Stellen Sie die Tonnen am Abholtag bis 6:00 Uhr bereit. *(Hinweis: Diese Meldung ist fiktiv.)*

### Post 3

**Title:** Marktstraße: Umleitung ab 7. Dezember

**Text:**

Wegen Kanalarbeiten wird die Marktstraße zwischen Musterplatz und Bahnhofstraße ab dem 7. Dezember für etwa drei Wochen gesperrt. Die Umleitung ist ausgeschildert.

Fußgängerinnen und Fußgänger können den Bereich weiterhin passieren. Die Bushaltestelle „Musterplatz" wird vorübergehend in die Lindenallee verlegt.

Wir bitten um Verständnis für die Einschränkungen. *(Hinweis: Diese Meldung ist fiktiv.)*

### Page

**Title:** Bürgerbüro — **Slug:** `buergerbuero`

**Text:**

Im Bürgerbüro der Stadt Musterhausen erledigen Sie die meisten Behördengänge an einem Ort.

**Leistungen** (as a heading)

- Personalausweis und Reisepass
- An-, Um- und Abmeldung des Wohnsitzes
- Führungszeugnis beantragen
- Fundsachen

**Termine** (as a heading)

Bitte buchen Sie vorab einen Termin online oder telefonisch. Ohne Termin kann es zu längeren Wartezeiten kommen.

**Kontakt** (as a heading)

Bürgerbüro, Musterplatz 1, 00000 Musterhausen. Telefon: 0000 000000 (fiktiv). E-Mail: buergerservice@musterhausen.example

*Hinweis: Diese Seite ist Teil einer Demo. Die Stadt Musterhausen und alle Kontaktdaten sind fiktiv.*
