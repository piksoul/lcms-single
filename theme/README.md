# LeanCMS Starter Theme

A minimal, unopinionated WordPress starter theme designed for use with the LeanCMS plugin and Tailwind CSS.

## Philosophy

This theme does **nothing** by design. No CSS resets, no opinionated styles, no conflicts. It's a clean shell that:

- Outputs proper HTML5 doctype and structure
- Calls `wp_head()` and `wp_footer()` correctly
- Gets out of the way

All styling is handled by the LeanCMS plugin and Tailwind CSS.

## Installation

1. Copy the `theme` folder to `/wp-content/themes/`
2. Rename to `lcms-starter` (or your preferred name)
3. Activate in WordPress admin

## Files

```
lcms-starter/
├── style.css       # Theme metadata (no actual styles)
├── functions.php   # Minimal theme setup
├── header.php      # Clean HTML head + body open
├── footer.php      # wp_footer + body/html close
├── index.php       # Fallback template
├── 404.php         # 404 page
└── README.md       # This file
```

## What's Removed

The theme cleans up WordPress output:

- Emoji scripts/styles
- Generator meta tag
- WLW manifest link
- RSD link
- Shortlink
- Adjacent posts links
- Block library CSS (comment out in functions.php if you use Gutenberg)

## Usage with LeanCMS

When using LeanCMS page templates, the theme just provides the HTML shell. Your templates handle everything inside `<body>`.

```php
// Your LeanCMS template
get_header();  // Outputs <!DOCTYPE html> through <body>
?>

<!-- Your Tailwind-styled content here -->

<?php
get_footer();  // Outputs wp_footer() and closes body/html
```

## Customization

### Adding Global Styles

If you want the theme to load Tailwind globally (instead of per-template), uncomment the enqueue in `functions.php`:

```php
function lcms_starter_scripts() {
    wp_enqueue_style( 'lcms-tailwind', get_template_directory_uri() . '/assets/tailwind.css', array(), '1.0.0' );
}
```

### Re-enabling Block Styles

If you use Gutenberg blocks, comment out the `lcms_starter_remove_block_css()` function in `functions.php`.

## License

GPL v2 or later
