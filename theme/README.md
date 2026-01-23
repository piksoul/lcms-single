# LeanCMS Starter Theme

A minimal WordPress theme designed for use with the LeanCMS plugin, Tailwind CSS, and DaisyUI.

## Architecture

The theme lives in the plugin repo at `/theme/` and is deployed via a **theme-stub** pattern:

```
Plugin repo:
├── theme/              # Actual theme logic (header, footer, functions)
└── theme-stub/         # Minimal stub for wp-content/themes/

WordPress:
└── wp-content/themes/lcms-starter/   # Copy of theme-stub/
    └── Each file includes from LEANCMS_PLUGIN_DIR . 'theme/'
```

This keeps all theme logic version-controlled alongside the plugin, while the stub just delegates via `include`.

## Files

```
theme/
├── functions.php   # Theme setup, Tailwind enqueue, nav fallback
├── header.php      # DaisyUI responsive navbar with wp_nav_menu()
├── footer.php      # Structural close (wp_footer + HTML close)
├── index.php       # Fallback template
├── 404.php         # 404 page
└── README.md       # This file
```

## Header

Uses DaisyUI navbar component with:
- Mobile dropdown menu (CSS-based toggle via `:focus-within`)
- Desktop horizontal nav
- `wp_nav_menu()` integration with fallback callback
- Site title as home link

## Footer

The theme footer is structural only — just fires `wp_footer()` and closes HTML. The visible footer is rendered by the plugin's page template partials, giving full design control to the template system.

## What's Removed

The theme cleans up WordPress output:
- Emoji scripts/styles
- Generator meta tag
- WLW manifest / RSD / Shortlink
- Block library CSS (re-enable in functions.php if using Gutenberg)

## Nav Menu

Register menus in `functions.php`:
- `primary` — Header navigation
- `footer` — Footer links (rendered by plugin template partial)

When no menu is assigned, the fallback renders placeholder links (Home, About, Contact) with correct DaisyUI classes for both mobile and desktop contexts.

## Tailwind CSS

Loaded from the plugin directory:
```
LEANCMS_PLUGIN_URL . 'templates/assets/tailwind/tailwind.css'
```

Compiled via `npm run build` in the plugin repo root. The CSS covers all Tailwind/DaisyUI classes used across templates, partials, and theme files.

## License

GPL v2 or later
