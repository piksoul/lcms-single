# Brand Hub - Client CMS — Publishing Workflow Context

## What We’ve Implemented (MVP)

### WP-Native Page Flow (“Keep it the WP Way”)
- Author creates a normal Page in WP Admin (keeps search/SEO/menus/revisions).
- In the Page Template dropdown, author selects **“LeanCMS Full Page.”**

### Plugin-Driven Rendering (File per Page)
- The plugin intercepts the request and renders from:
  - **Slug-first:** `plugins/leancms/templates/pages/slug-{post_name}.php`
  - **ID fallback:** `plugins/leancms/templates/pages/id-{ID}.php`
- A friendly fallback message is shown inside the theme chrome if no matching file exists.
- Admin-only hint if both slug & ID files exist (avoids ambiguity).

### Hello World Demo
- Sample page layout for Page `ID = 11` (inline styles, simple content) confirms the path.

### Quality & Ops Boilerplate
- Plugin Update Checker (GitHub repo, master branch; optional token).
- Activation/deactivation hooks with rewrite flush.
- i18n ready (text domain + loader).
- Lightweight admin menu page with version display.
- Constants for plugin paths/URL/basename; clean, self-contained wiring.

## Why This Approach
- **Speed to market:** no DB schema or builder UI; layouts live as versioned PHP files.
- **WP-native benefits:** menus, SEO, sitemaps, search, roles, revisions remain intact.
- **Dev ergonomics:** slug-first naming is natural; ID fallback is reliable; clear fallbacks.

## Opportunities for Phase 2 and Beyond

### A) Reusable Modules Everywhere
- Helper: add `leanos_render_module('name', $data = [], $opts = [])` to safely include `templates/modules/module-{name}.php` (with theme override via `locate_template`).
- Caching: transient per module (post + args) to keep pages snappy.
- Asset gating: enqueue each module’s CSS/JS only when used.

### B) Modular Page Template (Metabox UI)
- Add a second template (**“Leanos: Modular”**) with a tiny modules array stored in post meta (no ACF).
- UI: repeater rows (module select, order, optional JSON data).
- Renderer: loops modules → includes `templates/modules/*.php` with `$module['data']`.

### C) Authoring Ergonomics
- WP-CLI scaffolder: `wp leanos make --slug=about` to generate a ready stub in `templates/pages/`.
- Prev-slug redirect: auto-store previous slug on save; 301 old → new.
- Optional: hide the block editor UI when a Leanos template is selected (to reduce confusion).

### D) Search/SEO Integrations
- Breadcrumbs/sitemap: add a custom sitemap provider and breadcrumb mapper if needed.
- Canonical/title filters: set `pre_get_document_title` or plugin-side canonical if layouts are “virtual-ish.”
- If you later introduce virtual routes, consider CPT stubs (title/excerpt only) for indexing.

### E) Settings & Governance
- Settings page: toggle slug-first vs. ID-first (already slug-first by default), choose base directories, control fallback behavior.
- File conflict warning: persistently flag when slug + ID both exist; quick-link to file paths.

### F) DX, CI/CD, and Standards
- PHPCS/WPCS rules + GitHub Action.
- L10n workflow for `.pot` generation.
- Unit tests for resolver logic and template include behavior.

### G) Performance & Safety
- Output caching per full page (if modules get heavy).
- Nonce/escaping patterns baked into module examples.
- Security: sanitized file names; fixed include roots; no arbitrary paths.

### H) Future Routes (Optional)
- Virtual routes (no Page) for app-like endpoints; coexist with the current model.
- CPT “index stubs” if you want search/admin listings for virtual pages later.

## Current File Map (Key Pieces)
```
/wp-content/plugins/lcms-brandhub-client/
  leancms.php                     ← main plugin (update checker + bootstrap)
  /includes/content/
    class-page-renderer.php       ← registers the LeanCMS template + resolves layouts
  /templates/
    /pages/
      slug-{post_name}.php        ← primary resolution (preferred)
      id-{ID}.php                 ← fallback
    /modules/                     ← (future) reusable partials live here
```

## Theme Stub (Optional but Helpful)
```
/wp-content/themes/YOUR-THEME/page-templates/
  leancms-full-page.php               ← makes the template selectable in the editor
```

## Quick "How to Use" (for Authors)
1. Create a Page → set Template: **"LeanCMS Full Page."**
2. Create a file at `plugins/lcms-brandhub-client/templates/pages/slug-{your-page-slug}.php`.
3. Refresh the Page → your plugin-rendered layout appears.

## Brand Hub Configuration
This instance is specifically configured for Brand Hub client development:
- Repository: https://github.com/piksoul/lcms-brandhub-client
- Text Domain: brandhub-client-cms
- Version: 1.0.0
- Purpose: Agentic CMS for Brand Hub content management

