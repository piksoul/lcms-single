# Pro-Sites Partial System

Flexible, reusable content section framework for building professional WordPress pages.

Version: **1.2.4**
Introduced: **2025-11-09**

---

## Overview

The Pro-Sites partial system provides a standardized framework for creating content sections with consistent structure, styling, and behavior. All sections share a common configuration pattern and support extensive customization options.

### Key Features

- **6 Content Section Types**: Text, Image, Video, HTML, 2-Column, Grid
- **Shared Components**: Header, Footer, Wrapper (via `_lib/`)
- **Consistent Config Pattern**: Predictable array structure across all partials
- **Extensive Settings**: Visibility, dark mode, spacing, custom ID/classes/CSS
- **Auto-Loading CSS**: `pro-sites.css` loads automatically when any section renders
- **Responsive Design**: Mobile-first with tablet/desktop breakpoints
- **CSS Variables**: Fully integrated with 6-layer CSS architecture
- **Flexible Layouts**: Flexbox for 2-column, CSS Grid for multi-item layouts

---

## File Structure

```
_partials/pro-sites/
├── column-section.php         # Single column layout (universal)
├── 2-column-section.php       # Two-column flexible layouts (Flexbox)
├── grid-section.php           # Multi-item grid layouts (CSS Grid)
├── text-section.php           # DEPRECATED: Backward compat wrapper
├── image-section.php          # DEPRECATED: Backward compat wrapper
├── video-section.php          # DEPRECATED: Backward compat wrapper
├── html-section.php           # DEPRECATED: Backward compat wrapper
├── _lib/                      # Shared component library
│   ├── wrapper-open.php       # Section opening with settings
│   ├── wrapper-close.php      # Section closing tags
│   ├── header.php             # Header/Heading component
│   ├── footer.php             # Footer/Buttons component
│   └── content/               # Content type renderers
│       ├── text.php           # Renders text content
│       ├── image.php          # Renders image content
│       ├── video.php          # Renders video embeds
│       ├── html.php           # Renders raw HTML
│       ├── buttons.php        # Renders button groups (for columns)
│       ├── heading.php        # Renders standalone headings (h1-h6)
│       ├── stack.php          # Vertical stacking of multiple content types
│       ├── card.php           # Structured card with media/body/footer
│       └── row.php            # Horizontal flex layout of content types
├── pro-sites.css              # Stylesheet (auto-loads)
└── README.md                  # This documentation
```

### Architecture: Separation of Layout and Content

**v1.2.0 introduces a cleaner separation between layout structure and content types:**

- **Layout Partials** (`column-section.php`, `2-column-section.php`) handle structure
- **Content Renderers** (`_lib/content/*.php`) handle content display
- **Deprecated Partials** (`text-section.php`, etc.) are thin wrappers for backward compatibility

---

## Configuration Pattern

All pro-sites partials use a standardized `$section_config` array structure:

```php
$section_config = [
    'settings' => [...],   // Section wrapper settings
    'header'   => [        // Optional header component
        'heading' => [...],
    ],
    'content'  => [...],   // Type-specific content
    'footer'   => [        // Optional footer component
        'buttons' => [...],
    ],
];
```

**Note:** The old structure (`'heading' => [...]`, `'buttons' => [...]`) is supported for backward compatibility but deprecated. Please use the new `header`/`footer` structure.

### Settings Array

Controls section-level behavior and styling:

```php
'settings' => [
    'visibility'      => true,           // Show/hide section (PHP conditional)
    'dark_mode'       => false,          // Apply .lcms-pro-sites--dark modifier (BEM)
    'spacing_top'     => '80px',         // Override default top spacing
    'spacing_bottom'  => '80px',         // Override default bottom spacing
    'custom_id'       => '',             // Override auto-generated ID (default: lcms-{uniqid})
    'custom_classes'  => '',             // Additional classes (space-separated)
    'custom_css'      => '',             // Inline styles
    'container_classes' => '',           // Classes for inner .lcms-container (v2.0.5+)
    'container_css'   => '',             // Inline styles for inner container (v2.0.6+)
    'data_attrs'      => [],             // Data attributes ['key' => 'value']
]
```

**Defaults:**
- `visibility`: `true` (section renders)
- `dark_mode`: `false` (applies `.lcms-pro-sites--dark` modifier when true)
- `spacing_top/bottom`: `null` (uses CSS variable defaults)
- `custom_id`: Auto-generated with `lcms-` prefix
- `custom_classes`: Empty string
- `custom_css`: Empty string
- `data_attrs`: Empty array

### Header Object

Optional header component containing the heading:

```php
'header' => [
    'heading' => [
        'label'      => 'Section Label',       // Small label above title
        'title'      => 'Section Title',       // Main heading
        'subtitle'   => 'Section subtitle',    // Subtitle below title
        'align'      => 'center',              // left|center|right
        'title_size' => 'h2',                  // h1|h2|h3|h4|h5|h6 (default: h2)
    ],
]
```

**Skip Rendering:** Omit the `header` key entirely or leave `header.heading` empty.

**Backward Compatibility:** The old `'heading' => [...]` structure still works but is deprecated.

### Footer Object

Optional footer component containing buttons:

```php
'footer' => [
    'buttons' => [
        [
            'text'   => 'Button Text',
            'url'    => '#',
            'style'  => 'primary',           // primary|secondary|outline
            'target' => '_self',             // _self|_blank
        ],
        // Add more buttons as needed
    ],
]
```

**Button Styles:**
- `primary`: Accent background, white text
- `secondary`: Light background, dark text
- `outline`: Transparent background, accent border

**Skip Rendering:** Omit the `footer` key entirely or leave `footer.buttons` empty.

**Backward Compatibility:** The old `'buttons' => [...]` structure still works but is deprecated.

---

## Section Types

### Layout-Based Approach (v1.2.0+) - Recommended

The new architecture separates layout from content type. Use layout partials and specify content type explicitly.

#### Column Section (Single Column Layout)

Universal single-column layout that displays any content type.

**Usage:**
```php
$column_section = [
    'header' => [
        'heading' => [
            'title' => 'About Us',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type'   => 'text',                  // Required: text|image|video|html
        'text'   => '<p>Your content here...</p>',
        'format' => 'standard',              // Type-specific properties
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'Learn More', 'url' => '/about', 'style' => 'primary'],
        ],
    ],
];

partial('column', $column_section, 'pro-sites');
```

---

### Content Type Examples

#### 1. Text Content

**New Pattern (Recommended):**
```php
partial('column', [
    'header' => [...],
    'content' => [
        'type'   => 'text',
        'text'   => '<p>Your content here...</p>',
        'format' => 'standard',              // standard|lead|small
    ],
    'footer' => [...],
], 'pro-sites');
```

**Old Pattern (Deprecated but supported):**
```php
partial('text', [
    'header' => [...],
    'content' => [
        'text'   => '<p>Your content here...</p>',
        'format' => 'standard',
    ],
    'footer' => [...],
], 'pro-sites');
```

**Content Structure:**
```php
'content' => [
    'text'   => 'HTML content',              // wp_kses_post() applied
    'format' => 'standard',                  // Text size variant
]
```

**Format Options:**
- `standard`: Default body text (16px)
- `lead`: Larger, prominent text (20px)
- `small`: Smaller text (14px)

---

#### 2. Image Content

**New Pattern (Recommended):**
```php
partial('column', [
    'header' => [...],
    'content' => [
        'type'    => 'image',
        'src'     => '/path/to/image.jpg',
        'alt'     => 'Image description',
        'caption' => 'Optional caption',
        'lazy'    => true,
    ],
    'footer' => [...],
], 'pro-sites');
```

**Old Pattern (Deprecated but supported):**
```php
partial('image', [
    'header' => [...],
    'content' => [
        'src'     => '/path/to/image.jpg',
        'alt'     => 'Image description',
        'caption' => 'Optional caption',
        'lazy'    => true,
    ],
    'footer' => [...],
], 'pro-sites');
```

**Content Structure:**
```php
'content' => [
    'src'     => '/path/to/image.jpg',       // Required
    'alt'     => 'Alt text',                 // Recommended for accessibility
    'caption' => 'Image caption',            // Optional
    'lazy'    => true,                       // Enable lazy loading (default: true)
]
```

---

#### 3. Video Content

**New Pattern (Recommended):**
```php
partial('column', [
    'header' => [...],
    'content' => [
        'type'     => 'video',               // Specifies content renderer
        'video'    => [
            'type'     => 'youtube',         // youtube|vimeo|html5
            'src'      => 'dQw4w9WgXcQ',     // Video ID or URL
            'autoplay' => false,
            'controls' => true,
        ],
    ],
    'footer' => [...],
], 'pro-sites');
```

**Old Pattern (Deprecated but supported):**
```php
partial('video', [
    'header' => [...],
    'content' => [
        'type'     => 'youtube',             // youtube|vimeo|html5
        'src'      => 'dQw4w9WgXcQ',         // Video ID or URL
        'autoplay' => false,
        'controls' => true,
    ],
    'footer' => [...],
], 'pro-sites');
```

**Content Structure:**
```php
'content' => [
    'type'     => 'youtube',                 // Required: youtube|vimeo|html5
    'src'      => 'video-id or URL',         // Required
    'autoplay' => false,                     // Auto-play on load (default: false)
    'controls' => true,                      // Show video controls (default: true)
]
```

**Video Types:**
- `youtube`: YouTube video ID (e.g., `dQw4w9WgXcQ`)
- `vimeo`: Vimeo video ID
- `html5`: Full URL to MP4 video file

---

#### 4. HTML Content

**New Pattern (Recommended):**
```php
partial('column', [
    'header' => [...],
    'content' => [
        'type' => 'html',
        'html' => '<div class="custom">Your HTML here...</div>',
    ],
    'footer' => [...],
], 'pro-sites');
```

**Old Pattern (Deprecated but supported):**
```php
partial('html', [
    'header' => [...],
    'content' => [
        'html' => '<div class="custom">Your HTML here...</div>',
    ],
    'footer' => [...],
], 'pro-sites');
```

**Content Structure:**
```php
'content' => [
    'html' => 'Raw HTML content',            // wp_kses_post() applied
]
```

**Use Cases:**
- Third-party embeds (forms, maps, widgets)
- Complex custom layouts
- Specialized content not fitting other types

---

#### 5. Heading Content

**Pattern:**
```php
partial('column', [
    'content' => [
        'type'  => 'heading',
        'text'  => 'Your Heading Text',
        'size'  => 'h2',                     // h1|h2|h3|h4|h5|h6 (default: h2)
        'align' => 'left',                   // left|center|right (default: left)
        'class' => 'custom-class',           // Optional custom CSS class
    ],
], 'pro-sites');
```

**Content Structure:**
```php
'content' => [
    'type'  => 'heading',
    'text'  => 'Heading Text',               // Required: heading text content
    'size'  => 'h2',                         // Heading level (h1-h6)
    'align' => 'left',                       // Text alignment
    'class' => '',                           // Optional additional CSS class
]
```

**Size Options:**
- `h1`: Top-level heading (use sparingly, typically one per page)
- `h2`: Major section heading (default)
- `h3`: Subsection heading
- `h4`: Minor heading
- `h5`: Small heading
- `h6`: Smallest heading

**Use Cases:**
- Standalone headings in grid items or columns
- Semantic heading structure for accessibility
- Headings without the full header component wrapper
- Content cards with consistent heading sizes

**Note:** For section headers with label/title/subtitle, use the `header` object instead. The heading content type is for standalone headings within content areas.

---

---

### Two-Column Layouts

#### 6. 2-Column Section

Flexible two-column layout supporting mixed content types.

**Usage:**
```php
$two_col = [
    'header' => [
        'heading' => [
            'title' => 'Features & Benefits',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type'    => 'image',
                'content' => ['src' => '/path/to/image.jpg', 'alt' => 'Feature'],
                'width'   => '50%',
            ],
            [
                'type'    => 'text',
                'content' => ['text' => '<h3>Title</h3><p>Description...</p>'],
                'width'   => '50%',
            ],
        ],
        'gap'      => '40px',                // Space between columns
        'reverse'  => false,                 // Reverse column order on mobile
    ],
];

partial('2-column', $two_col, 'pro-sites');
```

**Content Structure:**
```php
'content' => [
    'columns' => [
        [
            'type'    => 'text',             // text|image|video|html|buttons
            'content' => [...],              // Type-specific content structure
            'width'   => '50%',              // Column width (CSS value)
        ],
        [
            'type'    => 'image',
            'content' => [...],
            'width'   => '50%',
        ],
    ],
    'gap'      => '40px',                    // Gap between columns
    'reverse'  => false,                     // Reverse order on mobile
]
```

**Column Types:**
- `text`: Uses text section content structure
- `image`: Uses image section content structure
- `video`: Uses video section content structure
- `html`: Uses html section content structure
- `buttons`: Array of button configurations

**Responsive Behavior:**
- Desktop: 2 columns side-by-side
- Mobile (< 768px): Stacks into single column
- `reverse: true`: Reverses column order on mobile (useful for image-first layouts)

**Width Options:**
- Percentages: `'width' => '60%'` (fixed width)
- FR Units: `'width' => '2fr'` (proportional flex-grow)
- Pixels: `'width' => '400px'` (fixed width)
- Default: `'1fr'` (equal distribution)

---

### Grid Layouts

#### 6. Grid Section

Multi-item grid layout for cards, galleries, and product displays. Uses CSS Grid with auto-responsive behavior.

**Usage:**
```php
$grid_section = [
    'header' => [
        'heading' => [
            'title' => 'Product Gallery',
            'subtitle' => 'Browse our collection',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type'    => 'image',
                'content' => ['src' => '/path/to/image1.jpg', 'alt' => 'Product 1'],
            ],
            [
                'type'    => 'image',
                'content' => ['src' => '/path/to/image2.jpg', 'alt' => 'Product 2'],
            ],
            [
                'type'    => 'text',
                'content' => ['text' => '<h3>Feature</h3><p>Description...</p>'],
            ],
            // Add more items...
        ],
        'columns'   => 3,                        // or 'auto-fit' / 'auto-fill'
        'min-width' => '250px',                  // Used with auto-fit/auto-fill
        'gap'       => '30px',                   // Space between items
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'View All', 'url' => '#', 'style' => 'primary'],
        ],
    ],
];

partial('grid', $grid_section, 'pro-sites');
```

**Content Structure:**
```php
'content' => [
    'items' => [
        [
            'type'    => 'text|image|video|html|buttons',
            'content' => [...],                  // Type-specific content structure
        ],
        // More items...
    ],
    'columns'   => 3,                            // Fixed number or 'auto-fit'/'auto-fill'
    'min-width' => '250px',                      // Minimum column width (for auto)
    'gap'       => '30px',                       // Gap between grid items
]
```

**Column Options:**
- **Fixed Count**: `'columns' => 3` creates exactly 3 columns
  - `grid-template-columns: repeat(3, 1fr)`
- **Auto-Fit**: `'columns' => 'auto-fit'` creates as many columns as fit, collapses empty ones
  - `grid-template-columns: repeat(auto-fit, minmax(250px, 1fr))`
- **Auto-Fill**: `'columns' => 'auto-fill'` creates columns even if empty
  - `grid-template-columns: repeat(auto-fill, minmax(250px, 1fr))`

**Item Types:**
- `text`: Text content with optional formatting
- `image`: Images with optional captions
- `video`: Video embeds (YouTube, Vimeo, HTML5)
- `html`: Custom HTML content
- `buttons`: Button groups

**Use Cases:**
- Product grids (3-4 columns)
- Image galleries (auto-responsive)
- Feature cards
- Team member displays
- Blog post previews

**Responsive Behavior:**
- Desktop: Multi-column grid layout
- Mobile (< 768px): Collapses to single column
- Auto-fit/auto-fill: Automatically adjusts column count based on available space

**When to Use:**
- Use `grid-section.php` for multiple items of similar type (cards, galleries)
- Use `2-column-section.php` for side-by-side compositional layouts with specific widths
- Use `column-section.php` for single-column content

---

## Advanced Examples

### Dark Mode Section with Custom Spacing

```php
$dark_section = [
    'settings' => [
        'dark_mode'       => true,
        'spacing_top'     => '120px',
        'spacing_bottom'  => '120px',
        'custom_classes'  => 'featured-section',
    ],
    'header' => [
        'heading' => [
            'title'    => 'Featured Content',
            'subtitle' => 'Highlighted section with extra spacing',
            'align'    => 'center',
        ],
    ],
    'content' => [
        'text'   => '<p>Content in dark mode with custom spacing.</p>',
        'format' => 'lead',
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'Call to Action', 'url' => '#', 'style' => 'primary'],
        ],
    ],
];

partial('text', $dark_section, 'pro-sites');
```

### Hidden Section (Conditional Visibility)

```php
$conditional_section = [
    'settings' => [
        'visibility' => is_user_logged_in(),  // Only show to logged-in users
    ],
    'header' => [
        'heading' => [
            'title' => 'Members Only Content',
        ],
    ],
    'content' => [
        'text' => '<p>This section only appears for logged-in members.</p>',
    ],
];

partial('text', $conditional_section, 'pro-sites');
```

### Custom ID and Data Attributes

```php
$tracked_section = [
    'settings' => [
        'custom_id'    => 'pricing-section',
        'data_attrs'   => [
            'track-event' => 'view_pricing',
            'category'    => 'conversion',
        ],
    ],
    'header' => [
        'heading' => [
            'title' => 'Our Pricing',
        ],
    ],
    'content' => [
        'text' => '<p>Pricing details...</p>',
    ],
];

partial('text', $tracked_section, 'pro-sites');

// Renders: <section id="pricing-section" data-track-event="view_pricing" data-category="conversion">
```

### 2-Column with Mixed Content Types

```php
$mixed_columns = [
    'content' => [
        'columns' => [
            [
                'type'    => 'video',
                'content' => [
                    'type' => 'youtube',
                    'src'  => 'dQw4w9WgXcQ',
                ],
                'width'   => '60%',
            ],
            [
                'type'    => 'buttons',
                'content' => [
                    'buttons' => [
                        ['text' => 'Watch More', 'url' => '/videos', 'style' => 'primary'],
                        ['text' => 'Subscribe', 'url' => '/subscribe', 'style' => 'secondary'],
                    ],
                ],
                'width'   => '40%',
            ],
        ],
        'gap' => '60px',
    ],
];

partial('2-column', $mixed_columns, 'pro-sites');
```

---

## CSS Architecture Integration

Pro-sites partials integrate seamlessly with the 6-layer CSS architecture:

### CSS Loading Order

1. **base.css** - Structural foundation (`.content-container`, responsive grid)
2. **config.php** - CSS variables (colors, fonts, spacing)
3. **document-system.css** - Global component styles
4. **pro-sites.css** - Pro-sites specific styles (auto-loads)
5. **Client theme.css** - Client-specific overrides

### CSS Variables Used

Pro-sites partials use the following CSS variables (defined in `config.php`):

**Layout:**
- `--doc-max-width`: Content container max width
- `--spacing-section-top/bottom`: Default section spacing
- `--spacing-horizontal`: Container side padding
- `--column-gap`: 2-column gap spacing

**Typography:**
- `--font-heading`: Heading font family
- `--font-size-h2`: Title font size
- `--font-size-body/large/small`: Text sizes
- `--line-height-heading/body`: Line heights

**Colors:**
- `--color-brand-primary/accent`: Brand colors
- `--color-text-primary/secondary`: Text colors
- `--color-background-dark/light`: Background colors

**Effects:**
- `--border-radius`: Element border radius
- `--transition-standard`: Transition timing
- `--button-padding`: Button padding

### Customizing Styles

**Option 1: Override CSS Variables in config.php**
```php
'css_variables' => [
    'spacing-section-top'    => '100px',
    'spacing-section-bottom' => '100px',
    'column-gap'             => '60px',
]
```

**Option 2: Add Custom CSS in theme.css**
```css
.lcms-pro-sites.featured-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.lcms-2-column-section .column-text h3 {
    color: var(--color-brand-primary);
}
```

**Option 3: Inline Custom CSS**
```php
'settings' => [
    'custom_css' => 'background: #f5f5f5; border-top: 5px solid var(--color-brand-accent);',
]
```

---

## Partial Registry Integration

Pro-sites partials are automatically registered with the partial registry system.

### Config Wrapper

All pro-sites partials use the `section_config` wrapper:

```php
// Automatically wrapped by registry
partial('text', $section_config, 'pro-sites');

// Equivalent to:
LeanCMS_Partial_Registry::render('pro-sites/text', ['section_config' => $section_config]);
```

### Auto-Discovery

Pro-sites partials are discovered automatically on plugin boot:
- Global: `templates/pages/_partials/pro-sites/`
- Client: `templates/pages/{client}/_partials/pro-sites/`

Client-specific pro-sites partials override global ones with the same name.

---

## Demo Template

View live examples of all section types:

**Location:** `templates/pages/test/slug-pro-sites-demo.php`

The demo template showcases:
- All 5 section types
- Various heading alignments
- Dark mode sections
- Custom spacing and styling
- 2-column layouts with mixed content
- Visibility controls
- Button variations

---

## Best Practices

### 1. Use Header for Structure
```php
// Good: Clear semantic structure
'header' => [
    'heading' => [
        'label'    => 'Features',
        'title'    => 'Our Services',
        'subtitle' => 'What we offer',
    ],
]

// Avoid: Title in content text
'content' => [
    'text' => '<h2>Our Services</h2><p>What we offer...</p>',
]
```

### 2. Leverage CSS Variables
```php
// Good: Use CSS variables for brand consistency
'settings' => [
    'custom_css' => 'padding: var(--spacing-large); border-color: var(--color-brand-accent);',
]

// Avoid: Hardcoded values
'settings' => [
    'custom_css' => 'padding: 60px; border-color: #0066cc;',
]
```

### 3. Consistent Button Styling
```php
// Good: Use style variants
['text' => 'Primary Action', 'style' => 'primary'],
['text' => 'Secondary', 'style' => 'outline'],

// Avoid: Custom inline styles on buttons
```

### 4. Semantic Column Widths
```php
// Good: Intentional asymmetry
'columns' => [
    ['type' => 'text', 'width' => '60%'],
    ['type' => 'image', 'width' => '40%'],
]

// Good: Even split
'columns' => [
    ['type' => 'text', 'width' => '50%'],
    ['type' => 'image', 'width' => '50%'],
]
```

### 5. Mobile-First Responsive
```php
// Use reverse for better mobile UX
'content' => [
    'columns' => [
        ['type' => 'image', ...],  // Desktop: Left, Mobile: Bottom
        ['type' => 'text', ...],   // Desktop: Right, Mobile: Top
    ],
    'reverse' => true,  // Image first on desktop, text first on mobile
]
```

---

## Troubleshooting

### Section Not Rendering

**Check visibility setting:**
```php
'settings' => [
    'visibility' => true,  // Ensure this is true
]
```

### CSS Not Loading

1. Clear browser cache
2. Check file exists: `templates/pages/_partials/pro-sites/pro-sites.css`
3. Verify partial registry is initialized (`LeanCMS_Partial_Registry::boot()`)

### Buttons Not Styled

Ensure button style is valid:
```php
'style' => 'primary',  // Valid: primary, secondary, outline
```

### Video Not Embedding

Verify video type and src format:
```php
// YouTube: Use video ID only
'type' => 'youtube',
'src'  => 'dQw4w9WgXcQ',  // NOT full URL

// HTML5: Use full URL
'type' => 'html5',
'src'  => 'https://example.com/video.mp4',
```

### 2-Column Not Responsive

Check that you're not using fixed widths:
```php
// Avoid: Fixed pixel widths prevent responsive behavior
'width' => '600px',

// Use: Percentage widths for responsive design
'width' => '50%',
```

---

## Migration Guide

### Migrating from Type-Specific to Layout-Based Approach

The v1.2.0 architecture separates layout from content. While old patterns still work, we recommend migrating to the new approach.

**Benefits of Migrating:**
- More flexible (easily switch between single-column, 2-column, grid layouts)
- Less code duplication
- Consistent content rendering across all layouts
- Future-proof architecture

**Migration Pattern:**

**Before (v1.1.x):**
```php
partial('text', [
    'header' => ['heading' => [...]],
    'content' => ['text' => '...', 'format' => 'standard'],
    'footer' => ['buttons' => [...]],
], 'pro-sites');
```

**After (v1.2.0+):**
```php
partial('column', [
    'header' => ['heading' => [...]],
    'content' => ['type' => 'text', 'text' => '...', 'format' => 'standard'],
    'footer' => ['buttons' => [...]],
], 'pro-sites');
```

**Steps:**
1. Change partial name from type (`text`, `image`, `video`, `html`) to layout (`column`)
2. Add `'type' => 'content-type'` to the `content` array
3. Keep all other configuration the same

**Automated Migration:**
The old partials are thin wrappers that delegate to the new architecture, so existing code continues to work without changes. Migrate at your own pace.

---

## Version History

### v1.2.2 (2025-11-09) - Templates & Fixes
- **Fixed:** Partial registry configuration
  - Added `column` and `pro-sites/column` to config wrappers
  - Fixes rendering issue when using new column partial
- **Fixed:** Video content rendering
  - Updated renderer to support nested video config structure
  - Prevents conflict between content type and video type
- **Updated:** All demo and test templates migrated to column partial
  - `slug-pro-sites-demo.php` - All single-column sections
  - `slug-pro-sites-test-text.php` - 10 test cases
  - `slug-pro-sites-test-image.php` - 9 test cases
  - `slug-pro-sites-test-video.php` - 10 test cases with nested config
  - `slug-pro-sites-test-html.php` - 7 test cases
- **Video structure:** Now uses nested `video` key for video config

### v1.2.1 (2025-11-09) - Bug Fix
- **Fixed:** Undefined `$section_type` variable error in `wrapper-open.php:43`
  - Added `$section_type = 'column'` to `column-section.php`
  - Updated all backward compatibility wrappers to set type-specific `$section_type`
  - Maintains backward compatible CSS class names (`.lcms-text-section`, etc.)
  - Prevents breaking changes to existing custom styles

### v1.2.0 (2025-11-09) - Architecture Refactor
- **NEW:** Separated layout structure from content types
- Created content renderer system (`_lib/content/*.php`)
  - `text.php` - Text content with format options
  - `image.php` - Image display with captions
  - `video.php` - Video embeds (YouTube, Vimeo, HTML5)
  - `html.php` - Raw HTML content
  - `buttons.php` - Button groups for columns
- **NEW:** Universal `column-section.php` layout
  - Accepts `content.type` parameter
  - Delegates to appropriate content renderer
  - Replaces 4 type-specific partials
- Updated `2-column-section.php` to use content renderers
  - Simplified from ~170 lines to ~100 lines
  - Supports all content types consistently
- Deprecated type-specific partials (`text-section.php`, `image-section.php`, `video-section.php`, `html-section.php`)
  - Maintained as backward compatibility wrappers
  - Will be removed in v2.0.0
- Benefits: DRY architecture, easier maintenance, extensible for future layouts

### v1.1.9 (2025-11-09) - Breaking Change
- **BREAKING:** Changed config structure to semantic `header`/`footer` pattern
  - Old: `'heading' => [...]` and `'buttons' => [...]`
  - New: `'header' => ['heading' => [...]]` and `'footer' => ['buttons' => [...]]`
- Backward compatibility maintained in `_lib/header.php` and `_lib/footer.php`
- All demo and test templates updated to new structure
- Updated semantic HTML: `<header class="section-header">` and `<footer class="section-footer">`
- Improved extensibility for future header/footer components

### v1.1.8 (2025-11-09)
- Updated demo image URLs to Brand Hub placeholder images

### v1.1.7 (2025-11-09)
- Fixed CSS auto-loading issue

### v1.0.0 (2025-11-09)
- Initial release of Pro-Sites partial system
- 5 content section types (text, image, video, html, 2-column)
- Shared component library (_lib/)
- Auto-loading CSS (pro-sites.css)
- Full integration with 6-layer CSS architecture
- Comprehensive demo template

---

## Support

For questions or issues with the Pro-Sites system:

1. Review this documentation
2. Check the demo template for examples
3. Examine existing implementations in test templates
4. Consult the main partials README: `templates/pages/_partials/README.md`

---

**Pro-Sites Partial System** | Version 1.2.0 | Built for Brand Hub - Client CMS
