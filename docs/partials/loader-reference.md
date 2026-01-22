# Loader Partial - Quick Reference

Centralized CSS and resource loading for LeanCMS templates.

**Version:** 1.3.10 | **Updated:** 2025-11-17

---

## Table of Contents

- [Basic Usage](#basic-usage)
- [Parameters](#parameters)
- [Common Patterns](#common-patterns)
- [Config File Setup](#config-file-setup)
- [Skipping Resources](#skipping-resources)
- [Auto-Load Pattern](#auto-load-pattern)
- [Legacy Support](#legacy-support)

---

## Basic Usage

### Simple (No Client Config)

For templates without client-specific branding:

```php
<?php
defined('ABSPATH') || exit;
get_header();

// Load global CSS defaults
partial('loader', [], 'top-section');
?>

<!-- Your content here -->
<?php partial('column', [...], 'pro-sites'); ?>

<?php get_footer(); ?>
```

### With Client Code

For templates with client-specific branding:

```php
<?php
defined('ABSPATH') || exit;
get_header();

// Load client CSS + global defaults (merged)
partial('loader', [
    'client_code' => '4dli',
], 'top-section');
?>

<!-- Your content here -->
<?php get_footer(); ?>
```

### Auto-Load Pattern

For automatic loading (requires config.php setup):

```php
<?php
defined('ABSPATH') || exit;
get_header();

// Auto-loads if config.php has 'auto_load' => true
load_client_resources('4dli');
?>

<!-- Your content here -->
<?php get_footer(); ?>
```

---

## Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `client_code` | string | `''` | Client folder name (e.g., `'4dli'`) |
| `config` | array | `[]` | Pre-loaded config array (optional) |
| `flags` | array | `[]` | Skip flags for selective loading |
| `client_config_path` | string | `''` | Legacy: explicit config path |

### Flags Parameter

Control which resources to load:

```php
'flags' => [
    'skip_css_vars'     => false,  // Skip CSS variable output
    'skip_stylesheets'  => false,  // Skip stylesheet links
    'skip_fonts'        => false,  // Skip Google Fonts
]
```

---

## Common Patterns

### Pattern 1: Generic Template (No Branding)

```php
<?php
/**
 * Generic Project Template
 * Uses global CSS defaults only
 */

defined('ABSPATH') || exit;
get_header();

partial('loader', [], 'top-section');
?>

<!-- Content sections -->
<?php partial('column', [
    'header' => ['heading' => ['title' => 'Project Overview']],
    'content' => ['type' => 'text', 'text' => '<p>Content...</p>'],
], 'pro-sites'); ?>

<?php get_footer(); ?>
```

**Result:**
- Loads `lcms-design-system.css`
- Outputs global CSS variables
- No client branding
- No custom fonts

---

### Pattern 2: Client Template (With Branding)

```php
<?php
/**
 * 4D Lifeware Brand Hub
 * Uses client colors, fonts, and branding
 */

defined('ABSPATH') || exit;
get_header();

partial('loader', [
    'client_code' => '4dli',
], 'top-section');
?>

<!-- Content with client branding -->
<?php partial('column', [...], 'pro-sites'); ?>

<?php get_footer(); ?>
```

**Result:**
- Loads `lcms-design-system.css`
- Loads Google Fonts (if configured)
- Outputs merged CSS variables (client overrides global)
- Client colors and typography applied

---

### Pattern 3: Skip Fonts (Performance)

```php
<?php
/**
 * Client template - Skip fonts (already loaded elsewhere)
 */

defined('ABSPATH') || exit;
get_header();

partial('loader', [
    'client_code' => '4dli',
    'flags' => [
        'skip_fonts' => true,  // Fonts loaded by theme
    ],
], 'top-section');
?>

<!-- Content -->
<?php get_footer(); ?>
```

**Result:**
- Skips Google Fonts preconnect/stylesheet
- Still loads CSS variables and stylesheets
- Useful when theme already loads fonts

---

### Pattern 4: CSS Variables Only

```php
<?php
/**
 * CSS Variables Only - Skip everything else
 */

defined('ABSPATH') || exit;
get_header();

partial('loader', [
    'client_code' => 'refr',
    'flags' => [
        'skip_stylesheets' => true,
        'skip_fonts' => true,
    ],
], 'top-section');
?>

<!-- Content with custom stylesheets -->
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

<?php get_footer(); ?>
```

**Result:**
- Only outputs CSS variables
- No stylesheets
- No fonts
- Useful for custom theme integration

---

### Pattern 5: Manual Config Override

```php
<?php
/**
 * Pass config directly (no file loading)
 */

defined('ABSPATH') || exit;
get_header();

// Build custom config
$custom_config = [
    'css_variables' => [
        'color-brand-primary' => '#FF5733',
        'font-heading' => 'Arial, sans-serif',
    ],
];

partial('loader', [
    'config' => $custom_config,
], 'top-section');
?>

<!-- Content -->
<?php get_footer(); ?>
```

**Result:**
- Uses provided config directly
- No file loading
- Good for dynamic configurations

---

## Config File Setup

### Global Config

**Location:** `templates/assets/global/config.php`

```php
<?php
return [
    'css_variables' => [
        // Colors
        'color-brand-primary'     => '#333333',
        'color-brand-accent'      => '#0066cc',

        // Typography
        'font-heading'            => 'system-ui, sans-serif',
        'font-body'               => 'system-ui, sans-serif',

        // Layout
        'doc-max-width'           => '1200px',
        'spacing-section'         => '80px',
        'spacing-section-mobile'  => '30px',
        'spacing-heading-bottom'  => '0',
        'spacing-horizontal'      => '20px',

        // Effects
        'border-radius'           => '8px',
        'transition-standard'     => 'all 0.3s ease',
    ],
];
```

### Client Config

**Location:** `templates/pages/4dli/config.php`

```php
<?php
return [
    /**
     * CSS Variables - Client Overrides
     */
    'css_variables' => [
        // Brand Colors
        'color-brand-primary'     => '#1a5490',
        'color-brand-secondary'   => '#4a90e2',
        'color-brand-accent'      => '#ff6b35',

        // Typography
        'font-heading'            => "'Montserrat', Arial, sans-serif",
        'font-body'               => "'Open Sans', Arial, sans-serif",

        // Layout (if different from global)
        'doc-max-width'           => '1400px',
    ],

    /**
     * Google Fonts Configuration
     */
    'fonts' => [
        'preconnect' => [
            'https://fonts.googleapis.com',
            'https://fonts.gstatic.com',
        ],
        'google_fonts_url' => 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;600&display=swap',
    ],

    /**
     * Resource Loading
     */
    'resources' => [
        'auto_load' => true,                                    // Enable load_client_resources()
        'google_fonts' => true,                                 // Load Google Fonts
        'stylesheets' => ['lcms-design-system.css'],            // CSS files to load
    ],

    /**
     * Client Metadata (optional)
     */
    'client' => [
        'code'      => '4dli',
        'name'      => '4D Lifeware',
        'website'   => 'https://4dlifeware.com',
    ],
];
```

---

## Skipping Resources

### Skip All Fonts

```php
partial('loader', [
    'client_code' => '4dli',
    'flags' => ['skip_fonts' => true],
], 'top-section');
```

### Skip Stylesheets

```php
partial('loader', [
    'client_code' => 'refr',
    'flags' => ['skip_stylesheets' => true],
], 'top-section');
```

### Skip CSS Variables

```php
partial('loader', [
    'client_code' => 'stdn',
    'flags' => ['skip_css_vars' => true],
], 'top-section');
```

### Skip Multiple Resources

```php
partial('loader', [
    'client_code' => '4dli',
    'flags' => [
        'skip_fonts' => true,
        'skip_stylesheets' => true,
    ],
], 'top-section');
```

**Result:** Only outputs CSS variables

---

## Auto-Load Pattern

### Setup

1. **Create config.php:**

```php
// templates/pages/4dli/config.php
return [
    'css_variables' => [...],
    'fonts' => [...],
    'resources' => [
        'auto_load' => true,  // Enable auto-loading
        'google_fonts' => true,
        'stylesheets' => ['lcms-design-system.css'],
    ],
];
```

2. **Use in template:**

```php
<?php
defined('ABSPATH') || exit;
get_header();

// One-line loading
load_client_resources('4dli');
?>

<!-- Content -->
<?php get_footer(); ?>
```

**How it works:**
- Checks for `config.php` at `templates/pages/4dli/config.php`
- Verifies `resources.auto_load` is `true`
- Automatically calls loader partial via `wp_head` hook
- Loads all resources based on config

**Skip flags:**

```php
load_client_resources('4dli', [
    'skip_fonts' => true,
]);
```

---

## Legacy Support

### Old Pattern (Still Supported)

```php
partial('loader', [
    'client_config_path' => __DIR__ . '/../refr/config.php',
], 'top-section');
```

**Recommendation:** Migrate to `client_code` pattern for consistency.

---

## Troubleshooting

### Fonts Not Loading

**Check:**
1. `resources.google_fonts` is `true` in config.php
2. `fonts.google_fonts_url` is set correctly
3. `skip_fonts` flag is not `true`

**Debug:**
- Enable `WP_DEBUG` to see loader log messages
- Check browser Network tab for font requests

### CSS Variables Not Applying

**Check:**
1. Config file exists and returns array
2. `css_variables` key is present
3. Variable names use hyphens (not underscores)
4. `skip_css_vars` flag is not `true`

### Wrong Stylesheet Loading

**Check:**
1. `resources.stylesheets` array in config.php
2. File exists in `templates/assets/global/`
3. `skip_stylesheets` flag is not `true`

---

## What the Loader Outputs

### Example Output (Full)

```html
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">

<!-- Stylesheets -->
<link rel="stylesheet" href="http://example.com/wp-content/plugins/leancms/templates/assets/global/lcms-design-system.css">

<!-- CSS Variables -->
<style id="brand-css-variables">
:root {
    --color-brand-primary: #1a5490;
    --color-brand-accent: #ff6b35;
    --font-heading: 'Montserrat', Arial, sans-serif;
    --spacing-section: 80px;
    /* ... all CSS variables ... */
}
</style>
```

---

## Migration Guide

### From Manual Loading

**Before:**
```php
$global_config = include(LEANCMS_PLUGIN_DIR . 'templates/assets/global/config.php');
$css_vars = $global_config['css_variables'] ?? [];
?>
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/lcms-design-system.css">
<style id="brand-css-variables">
:root {
<?php foreach ($css_vars as $key => $value): ?>
    --<?php echo esc_attr($key); ?>: <?php echo esc_attr($value); ?>;
<?php endforeach; ?>
}
</style>
```

**After:**
```php
partial('loader', [], 'top-section');
```

**Benefits:**
- 90% less code
- Automatic config merging
- Google Fonts support
- Skip flags for flexibility
- Error handling built-in

---

## Tips

1. **Use `client_code` over `client_config_path`** for cleaner code
2. **Enable auto_load** for frequently-used clients
3. **Skip fonts** if theme already loads them (performance)
4. **Use skip flags** for custom integrations
5. **Check `WP_DEBUG` logs** for troubleshooting

---

**See also:**
- [Pro-Sites Quick Reference](quick-reference.md)
- [Pro-Sites Comprehensive Guide](pro-sites.md)
- [Config Examples](../CONFIG-EXAMPLE.md)
