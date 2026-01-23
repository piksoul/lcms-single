# User Content Architecture

> **Status:** Planning
> **Date:** January 2026
> **Context:** LeanCMS Single-Site with Tailwind/DaisyUI theme

---

## Overview

This document outlines the architecture for user-managed content within the LeanCMS single-site setup. The core principle: keep the plugin focused on template/theme architecture and AI-managed deploy workflows, delegate commodity functionality to established plugins.

---

## 1. Third-Party Integrations (Use Plugins)

### Contact Forms
- **Approach:** Gravity Forms (or similar) via `do_shortcode()`
- **Rationale:** Form handling, validation, spam protection, and email delivery are solved problems
- **Implementation:** Contact page template renders the shortcode within a Tailwind partial

### SEO / Sitemap / OG Tags
- **Approach:** Yoast or RankMath plugin
- **Rationale:**
  - SEO is a moving target (schema, structured data, crawl directives)
  - Sitemap generation has edge cases (pagination, image sitemaps, priority)
  - OG tags need fallback logic, image dimensions, Twitter card variants
  - These plugins hook into WP cleanly without conflicting with our architecture
- **Future option:** AI-managed meta descriptions could write to Yoast meta fields programmatically

---

## 2. Image & Media Handling

### Two Tiers

| Tier | Storage | Use Case |
|------|---------|----------|
| Brand assets | Plugin source (`/templates/assets/`) | Logos, icons, patterns - version-controlled |
| Content images | WP Media Library | Page-specific photos, graphics |

- Template partials reference media library URLs via `wp_get_attachment_image()` or direct URLs
- No Gutenberg dependency needed just for images
- DB partials builder can include an image URL field for AI-managed content

---

## 3. DB Partials Builder - Component Architecture

### Structure: Two Levels (Section > Component)

```
Page
├── Section (layout: full-width | split | grid-3)
│   ├── Component (card, variant: "image-top")
│   ├── Component (card, variant: "horizontal")
│   └── Component (card, variant: "text-only")
├── Section (layout: full-width)
│   └── Component (text-block)
└── Section (layout: split)
    ├── Component (image)
    └── Component (cta)
```

### Why Two Levels
- **Full nesting (recursive):** Too complex. Rebuilds Gutenberg. CSS surface area explodes.
- **Flat/rigid (ordered sections only):** Too limiting. No layout flexibility.
- **Section > Component (two levels):** Predictable depth, finite CSS, real layout flexibility.

### Component Design: Variants + Optional Fields

Components use a **variant selection** model, not per-component layout control:

```php
// Example: Card component schema
$card = [
    'component' => 'card',
    'variant'   => 'image-top',  // image-top | horizontal | text-only | compact
    'fields'    => [
        'image'       => '',      // optional - omit to render without
        'title'       => '',      // required
        'description' => '',      // optional
        'badge'       => '',      // optional
        'cta_label'   => '',      // optional
        'cta_url'     => '',      // optional
    ],
];
```

**Rules:**
- Cards are rigid *per variant* but users choose which variant
- Empty optional fields = not rendered (no show/hide toggles)
- No per-component color/spacing/font overrides (inherits from DaisyUI theme)
- Section types define which components are allowed inside them

### Available Variants per Component

Define a bounded set. Example for cards:
- `image-top` — Image above title/description
- `horizontal` — Image left, content right
- `text-only` — No image, title + description + optional CTA
- `compact` — Minimal padding, smaller text

### HTML Partial (Escape Hatch)

For the 5-10% of cases beyond structured components:

```php
$custom = [
    'component' => 'html',
    'fields'    => [
        'content' => '<div class="custom-layout">...</div>',
    ],
];
```

No constraints on the HTML partial. Covers bespoke client needs without polluting the component system.

---

## 4. Tailwind CSS Compilation Constraint

### The Challenge
Tailwind only includes classes found in source at build time. Dynamic DB content could reference classes not in the compiled CSS.

### The Solution: Constrained Component Palette
- All component variants use known Tailwind/DaisyUI classes
- These classes exist in the partial templates (scanned at build time)
- CSS always covers everything the builder can produce
- No runtime CDN, no safelisting, no rebuild triggers needed

### What This Means for the Builder UI
- Expose semantic options (color: "primary", size: "lg") not raw classes
- Options map to known Tailwind classes internally
- Never expose freeform class input fields
- The HTML escape hatch is the only place raw classes can appear (user responsibility)

---

## 5. Staging to Production

Separate concern from code deployment:
- **Code:** Git + auto-updater (already handled)
- **Content/DB:** WP Migrate or similar tool (separate workflow)
- **Media:** Synced separately or referenced by URL

---

## 6. Implementation Priority

1. Define section types and allowed components per section
2. Define component variants with field schemas
3. Build renderer that maps DB records to Tailwind partial templates
4. Build admin UI for section/component selection
5. Compile Tailwind with all variant classes included in content paths

---

## 7. Architecture Diagram

```
┌─────────────────────────────────────────────┐
│  Admin / AI Workflow                         │
│  ┌─────────────┐  ┌─────────────────────┐  │
│  │ DB Partials  │  │ AI Deploy (Claude)   │  │
│  │ Builder UI   │  │ Template generation  │  │
│  └──────┬───────┘  └──────────┬──────────┘  │
└─────────┼──────────────────────┼─────────────┘
          │                      │
          ▼                      ▼
┌─────────────────────────────────────────────┐
│  Data Layer                                  │
│  ┌──────────────┐  ┌────────────────────┐   │
│  │ WP post_meta │  │ File templates     │   │
│  │ (JSON config)│  │ (PHP partials)     │   │
│  └──────┬───────┘  └──────────┬─────────┘   │
└─────────┼──────────────────────┼─────────────┘
          │                      │
          ▼                      ▼
┌─────────────────────────────────────────────┐
│  Render Layer                                │
│  ┌──────────────────────────────────────┐   │
│  │ Partial Registry + Template Loader    │   │
│  │ Section > Component > Variant         │   │
│  └──────────────────┬───────────────────┘   │
│                      ▼                       │
│  ┌──────────────────────────────────────┐   │
│  │ Tailwind/DaisyUI (pre-compiled CSS)   │   │
│  └──────────────────────────────────────┘   │
└─────────────────────────────────────────────┘
```
