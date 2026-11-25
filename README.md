# Gruenwerk Demo — a WordPress theme with planted accessibility issues

A small classic WordPress theme for a fictional garden nursery, the kind an agency builds. It exists to demonstrate Klara's GitHub remediation on PHP theme templates (Remediate.AI, phase 1). **Every issue below is planted deliberately. Do not use this theme on a real site.**

Klara's PHP support is behind the server flag `KLARA_GITHUB_PHP_ENABLED`. With the flag off, Klara does not read `.php` files at all. With it on, it opens **draft** pull requests only, never verified ones, and never merges.

## Files

| File | What it is |
|---|---|
| `style.css` | Theme header (`Theme Name: Gruenwerk Demo`) and styles |
| `functions.php` | Theme setup and stylesheet |
| `header.php` / `footer.php` | Site header and footer |
| `index.php` | Blog index, with The Loop |
| `page.php` | Single page; loads `template-parts/hero.php` |
| `searchform.php` | The search form |
| `404.php` | Not-found page |
| `template-parts/hero.php` | Hero block, loaded with `get_template_part` |
| `assets/img/*.svg` | Logo and illustrations |

## Planted issues Klara SHOULD fix (draft pull request)

| # | Issue | File | Scanner rule | Expected result |
|---|---|---|---|---|
| S1 | Logo `<img class="site-logo">` has no `alt` | `header.php` | `image-alt` | Draft PR adding `alt="…"` to that one tag |
| S2 | Icon-only `<button class="menu-toggle">` has no accessible name | `header.php` | `button-name` | Draft PR adding `aria-label="…"` |
| S3 | Social icon link `<a class="social-instagram">` has no accessible name | `footer.php` | `link-name` | Draft PR adding `aria-label="…"` |
| S4 | Newsletter email `<input>` has an invalid `autocomplete="mail"` | `footer.php` | `autocomplete-valid` | Draft PR changing it to `autocomplete="email"` |

**S4 note.** The scanner (axe `autocomplete-valid`) only reports an *invalid* autocomplete value; it cannot see a *missing* one, so a field without `autocomplete` would never produce a finding. The issue is therefore planted as an invalid value.


## Planted issues Klara must REFUSE (no pull request)

| # | Issue | File | Why Klara refuses |
|---|---|---|---|
| R1 | `<img class="post-icon">` without `alt` **inside The Loop** | `index.php` | Rendered once per post; one fixed value would be wrong for some posts |
| R2 | `<img class="payment-methods">` **echoed from PHP** (`echo '<img …>'`) | `footer.php` | The markup is PHP code, not HTML; Klara never edits PHP |
| R3 | `<img class="hero-image">` in a **template part** loaded with `get_template_part` | `template-parts/hero.php` | Only page templates WordPress loads once per page are edited (allowlist) |
| R4 | `<img class="page-banner">` whose **`alt` comes from PHP** (`alt="<?php echo … ?>"`) | `page.php` | The value is set by PHP at render time; Klara never overwrites it |
| S5 | Search `<input class="search-field">` **without a label** | `searchform.php` | Known phase 1 limit, see below |

**S5 is expected to be refused.** The scanner reports a field without a label under the axe rule `label`. Klara always remedies that rule by inserting a `<label>` element next to the field, and in phase 1 Klara never inserts elements into PHP templates; it only changes `alt`, `aria-label` and `autocomplete` on an element that already exists. So Klara explains the refusal instead of opening a pull request. The fix in this file is for a developer: add a visible `<label>` (or an `aria-label`) to the search field.

## Result of a planner run (2026-11-25, no GitHub writes)

| # | Expected | Actual |
|---|---|---|
| S1 | draft PR | draft PR — `header.php:23`, `alt` added; PHP unchanged |
| S2 | draft PR | draft PR — `header.php:25`, `aria-label` added |
| S3 | draft PR | draft PR — `footer.php:9`, `aria-label` added |
| S4 | draft PR | draft PR — `footer.php:12`, `autocomplete="email"` |
| S5 | refused (known limit) | refused — "this kind of fix is not made in PHP templates yet" |
| R1 | refused | refused — "inside a PHP while (line 12)" |
| R2 | refused | not located — markup printed by PHP is not HTML in the template |
| R3 | refused | refused — "not a page template WordPress loads once per page" |
| R4 | refused | refused — "the alt attribute is set by PHP" |
