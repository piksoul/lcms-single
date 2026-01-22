# Pro-Sites Partials - Quick Reference

Copy-paste ready examples and parameter reference.

**Version:** 2.1.0 | **Updated:** 2025-11-17

---

## Table of Contents

- [Basic Column Section](#basic-column-section)
- [Settings Parameters](#settings-parameters)
- [Header Parameters](#header-parameters)
- [Footer Parameters](#footer-parameters)
- [Content Types](#content-types)
  - [Text](#text-content)
  - [Image](#image-content)
  - [Video](#video-content)
  - [HTML](#html-content)
  - [Heading](#heading-content)
  - [Stack](#stack-content)
  - [Row](#row-content)
  - [Grid](#grid-content)
- [Layout Sections](#layout-sections)
  - [2-Column](#2-column-section)
  - [Grid Section](#grid-section)

---

## Basic Column Section

```php
partial('column', [
    'settings' => [
        'dark_mode' => false,
        'visibility' => true,
        'custom_classes' => '',
    ],
    'header' => [
        'heading' => [
            'label' => 'Optional Label',
            'title' => 'Section Title',
            'subtitle' => 'Optional subtitle',
            'align' => 'center',        // left|center|right
        ],
    ],
    'content' => [
        'type' => 'text',               // text|image|video|html|stack|row|grid
        // ... type-specific parameters
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'Button', 'url' => '#', 'style' => 'primary'],
        ],
    ],
], 'pro-sites');
```

---

## Settings Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `visibility` | bool | `true` | Show/hide section |
| `dark_mode` | bool | `false` | Apply dark theme (`.lcms-pro-sites--dark`) |
| `spacing_top` | string | `null` | Override top padding |
| `spacing_bottom` | string | `null` | Override bottom padding |
| `custom_id` | string | auto | Custom HTML id |
| `custom_classes` | string | `''` | Additional CSS classes |
| `custom_css` | string | `''` | Inline styles |
| `container_classes` | string | `''` | Classes for `.lcms-container` |
| `container_css` | string | `''` | Inline styles for container |
| `data_attrs` | array | `[]` | Data attributes `['key' => 'value']` |

---

## Header Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `label` | string | `''` | Small label above title |
| `title` | string | `''` | Main heading text |
| `subtitle` | string | `''` | Subtitle below title |
| `align` | string | `'left'` | Alignment: `left\|center\|right` |
| `title_size` | string | `'h2'` | Heading level: `h1-h6` |

---

## Footer Parameters

```php
'footer' => [
    'buttons' => [
        [
            'text' => 'Button Text',
            'url' => '#',
            'style' => 'primary',        // primary|secondary|outline
            'target' => '_self',         // _self|_blank
        ],
    ],
]
```

---

## Content Types

### Text Content

```php
'content' => [
    'type' => 'text',
    'text' => '<p>Your content here...</p>',
    'format' => 'standard',              // standard|lead|small
]
```

**Parameters:**
- `text` (string, required) - HTML content
- `format` (string) - Text size: `standard` (16px), `lead` (20px), `small` (14px)

---

### Image Content

```php
'content' => [
    'type' => 'image',
    'src' => '/path/to/image.jpg',
    'alt' => 'Image description',
    'caption' => 'Optional caption',
    'lazy' => true,
]
```

**Parameters:**
- `src` (string, required) - Image URL
- `alt` (string) - Alt text for accessibility
- `caption` (string) - Optional caption below image
- `lazy` (bool) - Enable lazy loading (default: `true`)

---

### Video Content

```php
'content' => [
    'type' => 'video',
    'video' => [
        'type' => 'youtube',             // youtube|vimeo|html5
        'src' => 'dQw4w9WgXcQ',          // Video ID or URL
        'autoplay' => false,
        'controls' => true,
    ],
]
```

**Parameters:**
- `type` (string, required) - Video platform
- `src` (string, required) - Video ID (YouTube/Vimeo) or URL (HTML5)
- `autoplay` (bool) - Auto-play on load
- `controls` (bool) - Show controls

---

### HTML Content

```php
'content' => [
    'type' => 'html',
    'html' => '<div class="custom">Your HTML here...</div>',
]
```

**Parameters:**
- `html` (string, required) - Raw HTML content (sanitized with `wp_kses_post()`)

---

### Heading Content

```php
'content' => [
    'type' => 'heading',
    'text' => 'Heading Text',
    'size' => 'h2',                      // h1|h2|h3|h4|h5|h6
    'align' => 'left',                   // left|center|right
    'class' => '',                       // Optional custom class
]
```

**Parameters:**
- `text` (string, required) - Heading text
- `size` (string) - Heading level (default: `h2`)
- `align` (string) - Text alignment (default: `left`)
- `class` (string) - Additional CSS class

---

### Stack Content

Vertical layout with gap-based spacing.

```php
'content' => [
    'type' => 'stack',
    'items' => [
        [
            'type' => 'html',
            'custom_classes' => 'lcms-card',
            'custom_id' => 'item-1',
            'content' => ['html' => '<h3>Item 1</h3>'],
        ],
        [
            'type' => 'html',
            'custom_classes' => 'lcms-card',
            'content' => ['html' => '<h3>Item 2</h3>'],
        ],
    ],
    'gap' => '20px',
    'align' => 'left',                   // left|center|right
]
```

**Container Parameters:**
- `items` (array, required) - Array of content items
- `gap` (string) - Vertical space between items (default: `20px`)
- `align` (string) - Horizontal alignment (default: `left`)

**Item Parameters:**
- `type` (string) - Content type
- `content` (array) - Type-specific content
- `custom_id` (string) - HTML id attribute
- `custom_classes` (string) - CSS classes
- `custom_css` (string) - Inline styles

---

### Row Content

Horizontal layout (stacks on mobile).

```php
'content' => [
    'type' => 'row',
    'items' => [
        [
            'type' => 'image',
            'width' => '40%',
            'content' => ['src' => '/path.jpg', 'alt' => 'Image'],
        ],
        [
            'type' => 'text',
            'width' => '60%',
            'custom_classes' => 'flex flex-column gap-16',
            'content' => ['text' => '<h3>Title</h3><p>Text</p>'],
        ],
    ],
    'gap' => '30px',
    'align' => 'center',                 // top|center|bottom
    'justify' => 'space-between',        // start|center|end|space-between
]
```

**Container Parameters:**
- `items` (array, required) - Array of content items
- `gap` (string) - Horizontal space (default: `20px`)
- `align` (string) - Vertical alignment (default: `center`)
- `justify` (string) - Horizontal distribution (default: `start`)

**Item Parameters:**
- `type` (string) - Content type
- `content` (array) - Type-specific content
- `width` (string) - CSS width value
- `custom_id` (string) - HTML id attribute
- `custom_classes` (string) - CSS classes
- `custom_css` (string) - Inline styles

---

### Grid Content

Multi-item grid layout.

```php
'content' => [
    'type' => 'grid',
    'items' => [
        [
            'type' => 'html',
            'custom_classes' => 'lcms-card',
            'content' => ['html' => '<h3>Item 1</h3>'],
        ],
        [
            'type' => 'html',
            'custom_classes' => 'lcms-card',
            'content' => ['html' => '<h3>Item 2</h3>'],
        ],
        [
            'type' => 'html',
            'custom_classes' => 'lcms-card',
            'content' => ['html' => '<h3>Item 3</h3>'],
        ],
    ],
    'columns' => 3,                      // or 'auto-fit'|'auto-fill'
    'min-width' => '250px',
    'gap' => '30px',
]
```

**Container Parameters:**
- `items` (array, required) - Array of grid items
- `columns` (int|string) - Column count or `'auto-fit'`/`'auto-fill'` (default: `'auto-fit'`)
- `min-width` (string) - Minimum column width for auto modes (default: `250px`)
- `gap` (string) - Space between items (default: `30px`)

**Item Parameters:**
- `type` (string) - Content type
- `content` (array) - Type-specific content
- `custom_id` (string) - HTML id attribute
- `custom_classes` (string) - CSS classes
- `custom_css` (string) - Inline styles

**Column Options:**
- `3` → `repeat(3, 1fr)` (fixed 3 columns)
- `'auto-fit'` → `repeat(auto-fit, minmax(250px, 1fr))` (responsive, collapses empty)
- `'auto-fill'` → `repeat(auto-fill, minmax(250px, 1fr))` (responsive, keeps empty)

---

## Layout Sections

### 2-Column Section

```php
partial('2-column', [
    'header' => [
        'heading' => ['title' => 'Features'],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'image',
                'content' => ['src' => '/path.jpg', 'alt' => 'Feature'],
                'width' => '40%',
            ],
            [
                'type' => 'text',
                'content' => ['text' => '<h3>Title</h3><p>Description</p>'],
                'width' => '60%',
            ],
        ],
        'gap' => '40px',
        'reverse' => false,              // Reverse order on mobile
    ],
], 'pro-sites');
```

---

### Grid Section

```php
partial('grid', [
    'header' => [
        'heading' => ['title' => 'Our Services', 'align' => 'center'],
    ],
    'content' => [
        'items' => [
            ['type' => 'image', 'content' => ['src' => '/img1.jpg', 'alt' => 'Service 1']],
            ['type' => 'image', 'content' => ['src' => '/img2.jpg', 'alt' => 'Service 2']],
            ['type' => 'image', 'content' => ['src' => '/img3.jpg', 'alt' => 'Service 3']],
        ],
        'columns' => 3,
        'gap' => '30px',
    ],
], 'pro-sites');
```

---

## Common Patterns

### Dark Mode Section

```php
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => ['heading' => ['title' => 'Dark Section', 'align' => 'center']],
    'content' => ['type' => 'text', 'text' => '<p>Content...</p>'],
], 'pro-sites');
```

### Card Grid

```php
partial('column', [
    'content' => [
        'type' => 'grid',
        'items' => [
            [
                'type' => 'html',
                'custom_classes' => 'lcms-card',
                'content' => ['html' => '<h3>🎨 Design</h3><p>UI/UX</p>'],
            ],
            [
                'type' => 'html',
                'custom_classes' => 'lcms-card',
                'content' => ['html' => '<h3>💻 Dev</h3><p>Web & Mobile</p>'],
            ],
        ],
        'columns' => 2,
        'gap' => '30px',
    ],
], 'pro-sites');
```

### Progress Stack with Badges

```php
partial('column', [
    'header' => ['heading' => ['title' => 'Development Status']],
    'content' => [
        'type' => 'stack',
        'items' => [
            [
                'type' => 'html',
                'custom_classes' => 'lcms-card',
                'content' => [
                    'html' => '
                        <div class="flex justify-space-between align-flex-start mb-12">
                            <h3>Planning Phase</h3>
                            <span class="lcms-badge lcms-badge--warning">In Progress</span>
                        </div>
                        <div class="lcms-progress lcms-progress--large">
                            <div class="lcms-progress__bar" style="width: 75%;">
                                <span class="lcms-progress__label">75%</span>
                            </div>
                        </div>
                    ',
                ],
            ],
        ],
        'gap' => '30px',
    ],
], 'pro-sites');
```

---

## Utility Classes Reference

**Flexbox:**
- `.flex` - Display flex
- `.flex-row` / `.flex-column` - Direction
- `.justify-space-between` / `.justify-center` - Justify content
- `.align-flex-start` / `.align-center` - Align items

**Spacing:**
- `.gap-8` / `.gap-16` / `.gap-24` / `.gap-32` - Gap spacing
- `.mb-8` / `.mb-16` / `.mb-24` - Margin bottom
- `.mt-8` / `.mt-16` / `.mt-24` - Margin top

**Grid:**
- `.grid-2col` / `.grid-3col` / `.grid-4col` - Predefined grids

**Text:**
- `.text-center` / `.text-left` / `.text-right` - Alignment
- `.text-lead` / `.text-large` / `.text-muted` - Sizes

**BEM Components:**
- `.lcms-card` - Card container
- `.lcms-badge` / `.lcms-badge--warning` / `.lcms-badge--secondary` - Badges
- `.lcms-progress` / `.lcms-progress--large` - Progress bars
- `.lcms-list` / `.lcms-list--check` / `.lcms-list--todo` - Lists

---

## Tips

1. **Use `custom_classes` instead of wrapping divs** for cleaner markup
2. **Avoid inline styles** when possible - use utility classes or CSS variables
3. **Stack/Row/Grid** support all content types - mix and match freely
4. **Dark mode** works automatically with `.lcms-pro-sites--dark`
5. **Gap-based spacing** is preferred over margin utilities

---

**See also:** [Complete Pro-Sites Documentation](pro-sites.md)
