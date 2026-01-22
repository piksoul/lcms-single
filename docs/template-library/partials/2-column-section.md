# 2-Column Section Partial

## Overview

**File:** `templates/pages/_partials/pro-sites/2-column-section.php`
**Namespace:** `pro-sites`
**Since:** 1.2.0 (Migrated to BEM in 2.0.0)

The 2-column section partial provides a flexible two-column layout system using flexbox. Each column can contain different content types including text, images, videos, cards, grids, and more.

## When to Use

**Best for:**
- Image-text layouts (feature showcases)
- Video-content combinations
- Asymmetric column widths (60/40, 70/30 splits)
- Two distinct content types side-by-side
- Mobile column reordering needs

**Not for:**
- More than 2 columns (use `grid-section.php` instead)
- Equal-width multi-item grids (use `grid-section.php` instead)

## Basic Usage

```php
partial('2-column-section', [
    'settings' => [
        'dark_mode' => false,
    ],
    'header' => [
        'heading' => [
            'title' => 'Two Column Layout',
            'subtitle' => 'Flexible content side-by-side',
        ],
    ],
    'content' => [
        'columns' => [
            ['type' => 'image', 'content' => [...], 'width' => '50%'],
            ['type' => 'text', 'content' => [...], 'width' => '50%'],
        ],
        'gap' => '40px',
    ],
], 'pro-sites');
```

## Configuration Structure

```php
[
    'settings' => [...],           // Standard section settings (dark_mode, etc.)
    'pre_html' => 'HTML string',   // Optional: HTML before header
    'header'   => [                // Optional: Section heading
        'heading' => [...]
    ],
    'content' => [
        'columns' => [             // Required: Array of column configs
            [
                'type'    => 'text|image|video|html|buttons|card|grid|heading|row|stack',
                'content' => [...], // Type-specific content structure
                'width'   => '60%', // Column width (see Width Options below)
            ],
            [...],                 // Second column
        ],
        'gap'      => '40px',      // Space between columns (default: 40px)
        'reverse'  => false,       // Reverse column order on mobile (default: false)
    ],
    'footer' => [                  // Optional: Section-level buttons
        'buttons' => [...]
    ],
    'post_html' => 'HTML string',  // Optional: HTML after footer
]
```

## Column Width Options

The partial supports three width formats:

### 1. Percentages (Recommended for asymmetric layouts)
```php
'width' => '60%'  // Fixed 60% of container width
'width' => '40%'  // Fixed 40% of container width
```

**Common splits:**
- 50/50: `'50%'` and `'50%'`
- 60/40: `'60%'` and `'40%'`
- 70/30: `'70%'` and `'30%'`
- 67/33: `'67%'` and `'33%'` (2:1 ratio)

### 2. Fractional Units (Recommended for proportional layouts)
```php
'width' => '2fr'  // Takes 2/3 of available space
'width' => '1fr'  // Takes 1/3 of available space
```

**Common ratios:**
- Equal: `'1fr'` and `'1fr'`
- 2:1: `'2fr'` and `'1fr'`
- 3:1: `'3fr'` and `'1fr'`

### 3. Pixel Values (For fixed-width sidebars)
```php
'width' => '300px'  // Fixed pixel width
'width' => '1fr'    // Remaining space
```

**Default:** If no width is specified, defaults to `'1fr'` (equal distribution)

## Content Types

The partial supports **10 content types** through content renderers:

| Type | Description | File |
|------|-------------|------|
| `text` | Simple text content | `_lib/content/text.php` |
| `image` | Images with captions | `_lib/content/image.php` |
| `video` | YouTube, Vimeo, HTML5 video | `_lib/content/video.php` |
| `html` | Raw HTML content | `_lib/content/html.php` |
| `buttons` | Button groups | `_lib/content/buttons.php` |
| `card` | Single card component | `_lib/content/card.php` |
| `grid` | Multi-item grid | `_lib/content/grid.php` |
| `heading` | Standalone heading | `_lib/content/heading.php` |
| `row` | Horizontal content row | `_lib/content/row.php` |
| `stack` | Vertical content stack | `_lib/content/stack.php` |

## Content Type Examples

### Image Content

```php
'content' => [
    'columns' => [
        [
            'type' => 'image',
            'content' => [
                'src'     => 'https://example.com/image.jpg',
                'alt'     => 'Descriptive alt text',
                'caption' => 'Optional caption text',
                'width'   => '100%',    // Image width (default: 100%)
                'height'  => 'auto',    // Image height (default: auto)
                'lazy'    => true,      // Lazy loading (default: true)
            ],
            'width' => '50%',
        ],
    ],
],
```

**Output:** Uses `.lcms-image` BEM component with `<figure>` and `<figcaption>`

### Video Content

```php
'content' => [
    'columns' => [
        [
            'type' => 'video',
            'content' => [
                'type'     => 'youtube',  // youtube|vimeo|html5
                'src'      => 'VIDEO_ID', // YouTube ID, Vimeo ID, or full URL for HTML5
                'width'    => '100%',
                'height'   => '400px',
                'autoplay' => false,
                'controls' => true,
            ],
            'width' => '60%',
        ],
    ],
],
```

**Output:** Uses `.lcms-video` BEM component with responsive embed

### HTML Content (For Complex Layouts)

```php
'content' => [
    'columns' => [
        [
            'type' => 'html',
            'content' => [
                'html' => '<div class="custom-content">...</div>',
            ],
            'width' => '50%',
        ],
    ],
],
```

**Use cases:** Custom BEM compositions, feature-showcase patterns, one-off layouts

### Text Content

```php
'content' => [
    'columns' => [
        [
            'type' => 'text',
            'content' => [
                'text' => 'Simple text content paragraph.',
            ],
            'width' => '50%',
        ],
    ],
],
```

## Real-World Examples

### Example 1: Image-Text Feature (50/50)

```php
partial('2-column-section', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Centralized Brand Control',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/dashboard.jpg',
                    'alt' => 'Dashboard interface',
                    'caption' => 'Centralized management dashboard',
                ],
                'width' => '50%',
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-stack gap-16">
                            <h3>Key Features</h3>
                            <p class="lcms-text--large">
                                Manage all brand assets from one place.
                            </p>
                            <ul class="lcms-list lcms-list--check">
                                <li class="lcms-list__item">Single source of truth</li>
                                <li class="lcms-list__item">Real-time updates</li>
                                <li class="lcms-list__item">Role-based access</li>
                            </ul>
                        </div>
                    ',
                ],
                'width' => '50%',
            ],
        ],
        'gap' => '60px',
    ],
], 'pro-sites');
```

### Example 2: Asymmetric Video-Text (60/40)

```php
partial('2-column-section', [
    'settings' => ['dark_mode' => true],
    'content' => [
        'columns' => [
            [
                'type' => 'video',
                'content' => [
                    'type' => 'youtube',
                    'src' => 'dQw4w9WgXcQ',
                    'width' => '100%',
                    'height' => '400px',
                ],
                'width' => '60%',
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => 'Watch our platform demo to see how easy brand management can be.',
                ],
                'width' => '40%',
            ],
        ],
        'gap' => '40px',
    ],
], 'pro-sites');
```

### Example 3: Reversed Mobile Order

```php
partial('2-column-section', [
    'content' => [
        'columns' => [
            [
                'type' => 'text',
                'content' => ['text' => 'Important call-to-action text'],
                'width' => '50%',
            ],
            [
                'type' => 'image',
                'content' => ['src' => '...', 'alt' => '...'],
                'width' => '50%',
            ],
        ],
        'gap' => '40px',
        'reverse' => true,  // Image appears first on mobile
    ],
], 'pro-sites');
```

## Gap Control

Adjust spacing between columns:

```php
'gap' => '20px'   // Tight spacing
'gap' => '40px'   // Default spacing
'gap' => '60px'   // Generous spacing
'gap' => '80px'   // Extra generous
'gap' => '0'      // No gap
```

## Mobile Behavior

**Default:** Columns stack vertically on mobile in source order (left column → right column)

**With reverse:** Use `'reverse' => true` to flip order on mobile:
```php
'reverse' => true  // Right column appears first on mobile
```

**Responsive breakpoint:** Defined in `.lcms-column-layout` CSS

## BEM Classes

The partial uses these BEM classes:

- `.lcms-column-layout` - Main two-column container
- `.lcms-column-layout__column` - Individual column wrapper
- `.lcms-column-layout--reverse-mobile` - Mobile order reversal modifier

## Integration with Content Renderers

Each column type uses a dedicated content renderer from:
`templates/pages/_partials/pro-sites/_lib/content/`

**Available renderers:**
- `text.php` - Simple text paragraphs
- `image.php` - Images with figure/caption (BEM: `.lcms-image`)
- `video.php` - Video embeds (BEM: `.lcms-video`)
- `html.php` - Raw HTML passthrough
- `buttons.php` - Button groups (BEM: `.lcms-button-group`)
- `card.php` - Single card component (BEM: `.lcms-card`)
- `grid.php` - Multi-item grid layouts
- `heading.php` - Standalone headings
- `row.php` - Horizontal content layouts (BEM: `.lcms-content-row`)
- `stack.php` - Vertical content layouts (BEM: `.lcms-content-stack`)

## Related Partials

- **`column.php`** - Single column with flexible content (more common)
- **`grid-section.php`** - Multi-column grid layouts (3+columns)
- **`hero-section.php`** - Hero/header sections
- **`cta-section.php`** - Call-to-action sections

## Version History

- **1.2.0** - Initial creation
- **1.2.2** - Switched from CSS Grid to Flexbox for better column width control
- **2.0.0** - Migrated to BEM naming (`.lcms-column-layout`)

## Usage in Template Library

This partial is perfect for implementing:
- **Feature Showcase Pattern** - Image-text alternating layouts
- **Video Demonstrations** - Video with supporting text
- **Asymmetric Layouts** - Content-heavy sections with sidebar images
- **Mobile-First Content** - Reverse column order for mobile UX

## Notes

- For equal-width columns, prefer `'1fr'` over percentages for better flexibility
- Use `'html'` type for complex BEM compositions and custom patterns
- Image and video types automatically include lazy loading and responsive behavior
- All content renderers respect dark mode settings from section config
- Column widths are flexible on desktop, stack to 100% on mobile
