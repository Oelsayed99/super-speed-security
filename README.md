# Super Speed — Bilingual Corporate Site & Inline CMS

Website and content-management system for **Super Speed**, a security services company in Egypt. Built and delivered as sole developer.

Bilingual English/Arabic with full right-to-left support, and an inline CMS that lets the client edit the site without touching code.

> **Status:** delivered, awaiting client launch. The company is mid-rebrand, so the site currently runs on a development domain.

---

## Why native PHP

No framework. The only Composer dependency is `phpmailer/phpmailer`.

The site is content-driven with a small, well-defined feature set, and the client's hosting is shared Plesk. A framework would have added deployment complexity and a dependency-upgrade burden without solving a problem this project actually had. The structure below provides the separation a framework would have given, at a fraction of the surface area.

## Architecture

```
app/                    Service layer
  Database.php            PDO connection and query helpers
  Translation.php         msgid-keyed translation + per-language media
  Storage.php             Upload handling for images and video
  helpers.php             View-facing wrappers
database/
  init.sql                Schema and seed data
public/                 Web root (Apache DocumentRoot)
  index.php               Front controller — routing, layout, page dispatch
  includes/               Shared header and footer
  pages/                  home · services · about · clients · contact
  assets/                 CSS, JS, images
  storage/uploads/        Runtime media
  *.php                   Authenticated admin endpoints
```

**Front controller.** `public/index.php` resolves the language and page from the query string, validates the page against a whitelist before including it, then assembles header, page and footer.

The whitelist matters: including a user-supplied path without validating it is how this pattern becomes a local file inclusion vulnerability.

```php
$allowed_pages = ['home', 'services', 'about', 'clients', 'contact'];
if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}
```

## Bilingual English / Arabic with RTL

Translation is keyed by `msgid` rather than by embedding strings in templates, so copy can change without touching markup:

```php
Translation::get('hero.headline', $lang);
Translation::getMedia('hero.background', 'image');
```

Media is resolved per language too — the Arabic site can carry different imagery where a translated overlay would not fit.

RTL is more than a `dir` attribute. Arabic glyphs are taller than their Latin equivalents at the same font size, so headline line-height had to be raised to stop hero text overlapping, and internal links had to be rewritten to preserve the active language across navigation.

## Inline CMS

The client manages their own content:

- Edit text and swap images in place on the live page
- Upload images and video
- Add, remove and **drag-and-drop reorder** client logos
- Manage admin users, with a forgot/reset password flow

## Security

- **Prepared statements everywhere.** No query is built by string interpolation.
- **`password_hash` / `password_verify`** for credentials. No `md5`, no `sha1`.
- **Session-based access control** on every admin endpoint.
- **Whitelisted routing** — no user input reaches `include` unvalidated.

## Running locally

```bash
docker compose up -d
```

Serves on `http://localhost:8000` with MySQL 8 alongside. The container is `php:8.2-apache` with `pdo_mysql` and `mod_rewrite`, DocumentRoot pointed at `public/`.

Load the schema:

```bash
docker compose exec -T mysql mysql -uroot -proot superspeed_cms < database/init.sql
```

## Deployment

Deployed to the client's **Plesk** server. Database configuration reads from the environment so the same code runs unchanged in Docker and on Plesk.

> `vendor/` is intentionally committed — the Plesk deploy pulls this repository directly and does not run `composer install`. If that changes, untrack it.

## Services covered

Trained personnel · armed and unarmed guards · VIP protection · facility security · event security · cash in transit · secure transport · vault storage · cash handling.

---

**Stack:** PHP 8.2 · MySQL · PDO · vanilla JavaScript · Docker · Apache · Plesk · PHPMailer
