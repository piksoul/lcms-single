# PHP Partials Documentation

Complete reference documentation for the LeanCMS Pro-Sites partial system, including loader configuration, quick reference guides, and implementation examples.

## Overview

The Pro-Sites partial system is the core PHP template engine for LeanCMS Brand Hub, providing reusable components for building brand-consistent pages.

## Contents

### Complete Guides

- **[Pro-Sites Partials](pro-sites.md)** - Comprehensive guide to the partial system
  - All available partials (column, 2-column, grid, etc.)
  - Configuration structure
  - Content types and renderers
  - Dark mode and spacing options
  - Real-world examples

- **[Loader Reference](loader-reference.md)** - CSS and resource loading guide
  - Design system CSS loading
  - Client resource loading
  - Google Fonts integration
  - Asset management

- **[Quick Reference](quick-reference.md)** - Copy-paste examples and cheat sheet
  - Common section patterns
  - Parameter quick reference
  - Frequently used configurations

## Partial System Architecture

```
partial($name, $config, $namespace)
```

**Namespaces:**
- `top-section` - Page headers and hero sections
- `pro-sites` - Main content sections (most common)

**Key Partials:**
- `page-header` - Hero sections with title, subtitle, badge
- `column` - Single column flexible content
- `2-column-section` - Two-column layouts (asymmetric widths)
- `grid-section` - Multi-column grids (3+ columns)

**Content Types:**
- text, image, video, html, buttons
- card, grid, heading, row, stack

## Integration with Template Library

The partial system provides the **implementation** for the template library's **patterns**:

**Template Library** defines:
- Component patterns (what to build)
- Recipes (page sequences)
- AI generation rules

**Partial System** provides:
- PHP partial functions (how to build)
- Content type renderers
- Layout mechanisms

**Example:**
```php
// Template library pattern: "feature-showcase"
// Implemented using: 2-column-section partial
partial('2-column-section', [
    'content' => [
        'columns' => [
            ['type' => 'image', ...],
            ['type' => 'html', ...],
        ],
    ],
], 'pro-sites');
```

## Quick Start

1. **Learn the system:** Read [pro-sites.md](pro-sites.md)
2. **Copy examples:** Use [quick-reference.md](quick-reference.md)
3. **Load assets:** Check [loader-reference.md](loader-reference.md)
4. **Build pages:** Apply patterns from `/docs/template-library/`

## Common Use Cases

### Creating a Hero Section
```php
partial('page-header', [
    'pre_html' => '<span class="lcms-badge lcms-badge--primary">New</span>',
    'title' => 'Page Title',
    'subtitle' => 'Page subtitle or description',
], 'top-section');
```

### Creating Content Section
```php
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => ['heading' => ['title' => 'Section Title']],
    'content' => ['type' => 'html', 'html' => '...'],
], 'pro-sites');
```

### Creating Two-Column Layout
```php
partial('2-column-section', [
    'content' => [
        'columns' => [
            ['type' => 'image', 'content' => [...], 'width' => '50%'],
            ['type' => 'text', 'content' => [...], 'width' => '50%'],
        ],
        'gap' => '60px',
    ],
], 'pro-sites');
```

## File Locations

**Partial Files:** `templates/pages/_partials/pro-sites/`
- `column.php` - Single column
- `2-column-section.php` - Two columns
- `grid-section.php` - Multi-column grid
- `_lib/content/` - Content type renderers

**Template Library Integration:** `docs/template-library/partials/`
- `2-column-section.md` - Detailed 2-column partial documentation

## Content Type Renderers

Location: `templates/pages/_partials/pro-sites/_lib/content/`

| Renderer | Output | Use For |
|----------|--------|---------|
| `image.php` | `.lcms-image` figure | Images with captions |
| `video.php` | `.lcms-video` embed | YouTube, Vimeo, HTML5 |
| `text.php` | Paragraph | Simple text |
| `html.php` | Raw HTML | BEM compositions |
| `buttons.php` | `.lcms-button-group` | CTAs |
| `card.php` | `.lcms-card` | Cards |
| `grid.php` | Grid layout | Multi-item grids |
| `heading.php` | `.lcms-section-heading` | Headings |
| `row.php` | `.lcms-content-row` | Horizontal |
| `stack.php` | `.lcms-content-stack` | Vertical |

## Best Practices

✅ **Always use partials** - Don't write raw HTML in page files
✅ **Use proper namespace** - `top-section` for headers, `pro-sites` for content
✅ **Leverage content types** - Use `image`, `video` types instead of raw HTML
✅ **Follow BEM** - When using `html` type, use BEM classes
✅ **Check quick reference** - Copy proven patterns

❌ **Don't hardcode** - Use partials, not manual HTML
❌ **Don't skip dark mode** - Consider light/dark alternation
❌ **Don't ignore accessibility** - Use proper alt text, captions

## Related Documentation

- **Template Library:** `/docs/template-library/` - Component patterns and recipes
- **Design System:** `/docs/design-system/` - BEM CSS classes
- **Guides:** `/docs/guides/` - Project documentation

## Support

For partial system questions:
1. Check [pro-sites.md](pro-sites.md) comprehensive guide
2. Use [quick-reference.md](quick-reference.md) for examples
3. Review [loader-reference.md](loader-reference.md) for asset loading
4. Check template library for implementation patterns

---

**Last Updated:** 2025-11-18
**Maintained By:** Piksoul
