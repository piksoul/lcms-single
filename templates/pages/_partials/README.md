# Partials - Reusable Template Components

This directory contains reusable PHP template components that can be included in multiple page templates. Partials help maintain consistency and reduce code duplication.

## Folder Organization

Partials are organized into logical groups using subfolders:

```
_partials/
├── top-section/           # Page headers, hero sections
│   └── hero-section.php
├── brand-guide/           # Brand identity components
│   ├── color-palette-section.php
│   ├── typography-section.php
│   ├── logo-section.php
│   ├── guidelines-section.php
│   └── spacing-section.php
├── bottom-section/        # CTAs, footers
│   └── cta-section.php
└── README.md
```

**Benefits:**
- Logical grouping by function
- Easy to find related components
- Supports style-pack architecture
- Scalable for future component sets

---

## Two-Tier Partial System

### **Global Partials** (`templates/pages/_partials/`)
Cross-client components that can be used by any brand or page template.

**Location:** `/templates/pages/_partials/`

**Use when:**
- Component is brand-agnostic
- Multiple clients will use the same component
- You want maximum reusability

**Examples:**
- `hero-section.php` - Generic hero banner
- `cta-section.php` - Standard call-to-action section

---

### **Client-Specific Partials** (`templates/pages/{client}/_partials/`)
Client-branded components with specific styling, messaging, or functionality.

**Location:** `/templates/pages/refr/_partials/` (for Reframe WA)

**Use when:**
- Component includes client-specific branding
- Client needs a customized version of a global component
- Component is only relevant to one client

**Examples:**
- `refr/_partials/cta-branded.php` - Reframe WA CTA with tagline
- `brhu/_partials/testimonial-card.php` - BrandHub testimonial layout

---

## Rendering Patterns

### **Pattern 1: Folder Parameter (Recommended for Organized Partials)** ⭐

Use the third `$folder` parameter to specify the subfolder:

```php
<?php
// Define settings
$hero_settings = [
    'logo' => '/path/to/logo.svg',
    'title' => 'COMPANY NAME',
    'subtitle' => 'Tagline',
];

// Render with folder parameter (clean, explicit)
partial('hero', $hero_settings, 'top-section');
?>
```

**Features:**
- ✅ Clean separation of "what" and "where"
- ✅ Perfect for style-pack switching
- ✅ Easy to loop through components
- ✅ Auto-wraps config
- ✅ Third parameter optional (defaults to root)

**Style-Pack Example:**
```php
<?php
$style = 'modern';  // or 'classic', 'minimal'

// All partials use same variable
partial('hero', $hero_settings, $style);
partial('color-palette', $color_settings, $style);
partial('cta', $cta_settings, $style);
?>
```

---

### **Pattern 2: Namespaced Syntax** (Alternative)

Specify the full path using forward slashes:

```php
<?php
// Namespaced - folder is part of the name
partial('brand-guide/color-palette', $color_settings);
?>
```

**Features:**
- ✅ Explicit location in code
- ✅ Self-documenting
- ✅ Folder parameter ignored if name contains '/'

---

### **Pattern 3: Short Names** (Backward Compatible)

Use just the partial name (looks in root or first discovered):

```php
<?php
// Short name - uses root or first match
partial('color-palette', $color_settings);
?>
```

**Note:** With subfolder organization, this may be ambiguous. Prefer Pattern 1 or 2 for clarity.

---

### **Pattern 4: Array Config with Include** (Legacy Supported)

Direct include with array configuration:

```php
<?php
// ✅ Array config
$cta_config = [
    'title' => 'Questions About Brand Usage?',
    'description' => 'Need guidance...',
    'button_text' => 'Get in Touch',
    'button_url' => '#contact',
];
include LEANCMS_PLUGIN_DIR . 'templates/pages/_partials/cta-section.php';
?>
```

**Note:** This pattern still works but requires explicit paths. Use Pattern 1 for new code.

---

### **Pattern 5: Individual Variables** (Legacy)

Original pattern with individual variables:

```php
<?php
// ❌ Legacy: Individual variables (still supported)
$cta_title = 'Questions About Brand Usage?';
$cta_description = 'Need guidance...';
$cta_button_text = 'Get in Touch';
$cta_button_url = '#contact';
include LEANCMS_PLUGIN_DIR . 'templates/pages/_partials/cta-section.php';
?>
```

**Note:** Fully supported but more verbose. Recommended only for backward compatibility.

---

## Configuration Benefits

**Array Config + `partial()` function provides:**
- Cleaner, more readable code
- JSON-like structure for AI/LLM processing
- Easy to see all configuration at a glance
- Can be extracted to separate config files
- Obfuscated file paths (no LEANCMS_PLUGIN_DIR needed)
- Auto-discovery of new partials
- Backward compatible with all legacy patterns

---

## Available Partials

### Global Partials

#### `hero-section.php`
Hero banner with optional logo, badge, title, and subtitle. Uses `.hero` styles from `document-system.css`.

**Usage:**
```php
<?php
$hero_settings = [
    'logo' => '/path/to/logo.svg',
    'logo_alt' => 'Company Logo',
    'badge' => 'Brand Guidelines',
    'title' => 'COMPANY NAME',
    'subtitle' => 'Tagline Here',
];
partial('hero', $hero_settings);
?>
```

**Config:**
- `logo` (optional) - Path to logo image
- `logo_alt` (optional) - Alt text for logo (default: 'Logo')
- `badge` (optional) - Badge text above title
- `title` (required) - Main heading text
- `subtitle` (optional) - Subtitle/tagline text

**Styling:**
Uses `.hero`, `.hero-logo`, `.hero-badge`, `.hero-subtitle` from `document-system.css`.

---

#### `cta-section.php`
Call-to-action section with heading, description, and button.

**Usage:**
```php
<?php
$cta_title = 'Questions About Brand Usage?';
$cta_description = 'Need guidance on applying these guidelines to your project?';
$cta_button_text = 'Get in Touch';
$cta_button_url = '#contact';
include LEANCMS_PLUGIN_DIR . 'templates/pages/_partials/cta-section.php';
?>
```

**Variables:**
- `$cta_title` (required) - Main heading text
- `$cta_description` (optional) - Description paragraph
- `$cta_button_text` (required) - Button text
- `$cta_button_url` (required) - Button URL
- `$cta_button_target` (optional) - Link target (default: `_self`)
- `$cta_bg_style` (optional) - Custom background style

**Styling:**
Uses `.cta-section` from `document-system.css` - dark gradient background with white text.

---

#### `color-palette-section.php`
Color palette display with swatches, HEX/RGB values, and usage guidelines.

**Usage:**
```php
<?php
$color_settings = [
    'label' => 'Visual Identity',
    'title' => 'Color Palette',
    'description' => 'Our color palette combines...',
    'colors' => [
        [
            'hex' => '#08093E',
            'rgb' => '8, 9, 62',
            'name' => 'Primary Navy',
            'usage' => 'Primary backgrounds, headers',
        ],
        // ... more colors
    ],
];
partial('color-palette', $color_settings);
?>
```

**Config:**
- `label` (optional) - Section label text
- `title` (optional) - Section heading
- `description` (optional) - Description paragraph
- `colors` (required) - Array of color objects with:
  - `hex` - Hexadecimal color value
  - `rgb` - RGB values as string
  - `name` - Color name
  - `usage` - Usage guidelines

**Styling:**
Uses `.color-palette-section`, `.color-grid`, `.color-card` from `document-system.css`.

---

#### `typography-section.php`
Typography system showcase with specimen examples and font specifications.

**Usage:**
```php
<?php
$typography_settings = [
    'label' => 'Typography',
    'title' => 'Type System',
    'description' => 'Our typography combines...',
    'specimens' => [
        [
            'label' => 'Heading XL',
            'class' => 'heading-xl',
            'text' => 'EXAMPLE HEADING',
            'font' => 'Raleway',
            'size' => '56px',
            'weight' => '700 (Bold)',
            'transform' => 'Uppercase',  // optional
            'line_height' => '1.1',
        ],
        // ... more specimens
    ],
];
partial('typography', $typography_settings);
?>
```

**Config:**
- `label` (optional) - Section label
- `title` (optional) - Section heading
- `description` (optional) - Description
- `specimens` (required) - Array of type specimen objects

**Styling:**
Uses `.typography-section`, `.type-specimen`, `.heading-*`, `.body-*` from `document-system.css`.

---

#### `logo-section.php`
Logo variations display with images, titles, and usage descriptions.

**Usage:**
```php
<?php
$logo_settings = [
    'label' => 'Logo Guidelines',
    'title' => 'Logo Usage',
    'description' => 'The logo features...',
    'logos' => [
        [
            'image' => '/path/to/logo.svg',
            'title' => 'Primary Vertical',
            'description' => 'Main logo in formal arrangement...',
            'bg_color' => '',       // optional
            'text_color' => '',     // optional for dark backgrounds
        ],
        // ... more logos
    ],
];
partial('logo', $logo_settings);
?>
```

**Config:**
- `label` (optional) - Section label
- `title` (optional) - Section heading
- `description` (optional) - Description
- `logos` (required) - Array of logo objects

**Styling:**
Uses `.logo-section`, `.logo-grid`, `.logo-card` from `document-system.css`.

---

#### `guidelines-section.php`
Brand guidelines with do's and don'ts in two-column layout.

**Usage:**
```php
<?php
$guidelines_settings = [
    'label' => 'Best Practices',
    'title' => 'Brand Guidelines',
    'description' => 'Follow these guidelines...',
    'do' => [
        'Use approved fonts only',
        'Maintain clear space around logo',
        // ... more do's
    ],
    'dont' => [
        'Alter logo proportions',
        'Use unapproved colors',
        // ... more don'ts
    ],
];
partial('guidelines', $guidelines_settings);
?>
```

**Config:**
- `label` (optional) - Section label
- `title` (optional) - Section heading
- `description` (optional) - Description
- `do` (required) - Array of do's
- `dont` (required) - Array of don'ts

**Styling:**
Uses `.guidelines-section`, `.guidelines-grid`, `.guideline-card` from `document-system.css`.
Green (✓) for do's, red (✗) for don'ts.

---

#### `spacing-section.php`
Spacing system with visual representations of spacing values.

**Usage:**
```php
<?php
$spacing_settings = [
    'label' => 'Layout System',
    'title' => 'Spacing & Layout',
    'description' => 'Consistent spacing creates rhythm...',
    'spacing' => [
        [
            'label' => 'Small',
            'value' => '20px',
            'height' => 20,  // Height for visual display
        ],
        // ... more spacing values
    ],
];
partial('spacing', $spacing_settings);
?>
```

**Config:**
- `label` (optional) - Section label
- `title` (optional) - Section heading
- `description` (optional) - Description
- `spacing` (required) - Array of spacing objects

**Styling:**
Uses `.spacing-section`, `.spacing-grid`, `.spacing-card` from `document-system.css`.

---

### Client-Specific Partials (Refr)

#### `refr/_partials/cta-branded.php`
Reframe WA branded CTA with "Review · Renew · Regenerate" tagline.

**Usage:**
```php
<?php
$cta_title = 'Ready to Transform Your Leadership?';
$cta_button_text = 'Schedule Free Consultation';
$cta_button_url = '/contact';
include LEANCMS_PLUGIN_DIR . 'templates/pages/refr/_partials/cta-branded.php';
?>
```

**Variables:**
- Same as `cta-section.php` plus:
- `$show_tagline` (optional) - Show Reframe WA tagline (default: `true`)

---

## Creating New Partials

### 1. Decide Scope (Global vs Client-Specific)

**Choose Global if:**
- Component works for multiple brands
- Styling comes from `document-system.css`
- No brand-specific content

**Choose Client-Specific if:**
- Contains client logos, colors, or messaging
- Only one client will use it
- Extends or modifies a global partial

---

### 2. Create the Partial File

**Global Partial:**
```bash
touch templates/pages/_partials/new-component.php
```

**Client Partial:**
```bash
mkdir -p templates/pages/refr/_partials
touch templates/pages/refr/_partials/new-component.php
```

---

### 3. Follow the Template Structure

```php
<?php
/**
 * Component Name
 *
 * Brief description of what this component does.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Partials
 * @filepath   templates/pages/_partials/component-name.php
 *
 * Expected variables:
 * - $var_name (required) - Description
 * - $optional_var (optional) - Description
 */

// Set defaults for all variables
$var_name = $var_name ?? 'Default Value';
$optional_var = $optional_var ?? '';
?>

<section class="component-class">
    <h2><?php echo esc_html($var_name); ?></h2>

    <?php if ($optional_var): ?>
        <p><?php echo esc_html($optional_var); ?></p>
    <?php endif; ?>
</section>
```

**Important:**
- Always include a docblock with `@filepath`
- Set sensible defaults for all variables
- Use proper escaping (`esc_html`, `esc_url`, `esc_attr`)
- Keep styling in `document-system.css` when possible

---

### 4. Add Documentation

Update this README with:
- Component description
- Usage example
- All available variables
- Any special notes

---

## Using Partials in Templates

### **Recommended: Use `partial()` Function** ⭐

```php
<?php
// Define settings
$cta_settings = [
    'title' => 'Get Started Today',
    'button_text' => 'Contact Us',
    'button_url' => '/contact',
];

// Render partial
partial('cta', $cta_settings);
?>
```

---

### Using Client-Specific Partial

```php
<?php
// For Reframe WA branded CTA
$cta_settings = [
    'title' => 'Transform Your Leadership',
];

partial('cta-branded', $cta_settings);
?>
```

---

### Conditional Partials

```php
<?php
if (LeanCMS_Helpers::check_url_param('show-cta')) {
    $cta_settings = ['title' => 'Special Offer'];
    partial('cta', $cta_settings);
}
?>
```

---

### Legacy Include Pattern (Still Supported)

```php
<?php
// Old style still works
$cta_title = 'Get Started Today';
$cta_button_text = 'Contact Us';
$cta_button_url = '/contact';
include LEANCMS_PLUGIN_DIR . 'templates/pages/_partials/cta-section.php';
?>
```

---

## Resolution Priority

The `partial()` function **auto-discovers** and resolves partials using this priority:

1. **Client-specific partials** (e.g., `refr/_partials/cta-branded.php`)
2. **Global partials** (e.g., `_partials/cta-section.php`)

```php
// ✅ Auto-resolution with partial() function
partial('cta');           // Finds _partials/cta-section.php
partial('cta-branded');   // Finds refr/_partials/cta-branded.php (if exists)

// ✅ Explicit paths still work (legacy)
include LEANCMS_PLUGIN_DIR . 'templates/pages/_partials/cta-section.php';
include LEANCMS_PLUGIN_DIR . 'templates/pages/refr/_partials/cta-branded.php';
```

**How Auto-Discovery Works:**
- Scans `_partials/` and `{client}/_partials/` folders on plugin boot
- Strips `-section` suffix from filenames for cleaner naming
- Client partials override global partials with same name
- All discovered partials available via simple name

---

## Best Practices

### Variable Naming
Use clear, descriptive variable names with prefixes:
- `$cta_*` for CTA components
- `$hero_*` for hero sections
- `$card_*` for card components

### Defaults
Always provide sensible defaults so partials work standalone:
```php
$cta_title = $cta_title ?? 'Get in Touch';
```

### Escaping
Always escape output based on context:
- `esc_html()` for text content
- `esc_url()` for URLs
- `esc_attr()` for HTML attributes

### Styling
- Use classes from `document-system.css`
- Avoid inline styles unless absolutely necessary
- Keep brand-specific styles in `{brand}-theme.css`

### Documentation
- Document all variables in the docblock
- Include usage examples
- Mark required vs optional variables
- Update this README when adding new partials

---

## Styling Partials

Partials should use existing classes from `document-system.css`:

```php
<!-- ✅ Good: Uses existing .cta-section class -->
<section class="cta-section">
    <h2><?php echo esc_html($title); ?></h2>
</section>

<!-- ❌ Avoid: Inline styles -->
<section style="background: blue; padding: 50px;">
    <h2><?php echo esc_html($title); ?></h2>
</section>
```

If you need new styles:
1. Add them to `document-system.css` (brand-agnostic)
2. Or add to `{client}-theme.css` (brand-specific)
3. Or create a partial-specific CSS file (style-pack variations)

---

## CSS Architecture: Progressive Enhancement Pattern

### Overview

The partial system supports **optional CSS files** that automatically load alongside PHP partials. This enables:

- ✅ **Style-pack variations** - Different visual treatments for same component
- ✅ **Progressive enhancement** - Base styles in `document-system.css`, overrides in partial CSS
- ✅ **Zero breaking changes** - Partials work without CSS files (fallback to base styles)
- ✅ **Automatic loading** - No manual registration required

**Since:** v1.1.3

---

### How It Works

When you render a partial, the registry checks for a corresponding `.css` file:

```
_partials/
├── top-section/
│   ├── hero-section.php     ← Partial template
│   └── hero-section.css     ← Optional styles (auto-loaded if exists)
```

**Loading Order:**
1. Template loads `document-system.css` (base styles)
2. Partial renders via `partial('hero', $settings, 'top-section')`
3. Registry checks for `top-section/hero-section.css`
4. If found, outputs `<link>` tag for partial CSS
5. Partial CSS overrides base styles via CSS cascade

---

### When to Use Partial CSS

**✅ Use partial CSS when:**
- Creating style-pack variations (`modern/hero.css`, `classic/hero.css`)
- Overriding base styles for specific layouts
- Adding folder-specific visual treatments
- Building client-specific component themes

**❌ Don't use partial CSS when:**
- Styles are shared across all partials (use `document-system.css`)
- Component uses only base styles (let it inherit from base)
- One-off styling (use inline styles sparingly or base CSS)

---

### Creating Partial CSS Files

#### Step 1: Create CSS File Next to PHP File

```bash
# Create CSS file with same base name as PHP file
touch _partials/top-section/hero-section.css
```

**Naming Convention:**
- PHP file: `hero-section.php`
- CSS file: `hero-section.css` (same name, different extension)

#### Step 2: Write Override Styles

```css
/**
 * Hero Section - Modern Style Pack
 *
 * Overrides base document-system.css styles for modern aesthetic.
 * Uses CSS custom properties from base for consistency.
 */

.hero {
    /* Override background - base has linear gradient */
    background: radial-gradient(
        ellipse at top,
        var(--color-brand-primary) 0%,
        var(--color-brand-secondary) 100%
    );

    /* Override padding - base has 100px 60px */
    padding: 120px 80px;

    /* Add new property not in base */
    backdrop-filter: blur(10px);
}

.hero h1 {
    /* Inherit font-family, color from base */
    /* Override only size */
    font-size: 64px;
    letter-spacing: 4px;
}

/* Add new elements not in base */
.hero::before {
    content: '';
    position: absolute;
    /* ... decorative element ... */
}
```

**Best Practices:**
- ✅ Use CSS custom properties (`var(--color-brand-primary)`) for consistency
- ✅ Override only what needs to change
- ✅ Let base styles handle shared properties
- ✅ Add comments explaining why you're overriding
- ❌ Don't duplicate base styles unnecessarily

#### Step 3: Test

Render the partial - CSS automatically loads:

```php
<?php
// Renders hero-section.php AND auto-loads hero-section.css
partial('hero', $hero_settings, 'top-section');
?>
```

**Output HTML:**
```html
<link rel="stylesheet" href=".../top-section/hero-section.css?ver=1.1.3" id="leancms-partial-top-section-hero-css">
<section class="hero">
    <!-- partial content -->
</section>
```

---

### Style-Pack Architecture Example

Create multiple variations of the same component:

```
_partials/
├── modern/
│   ├── hero-section.php         ← Modern layout
│   └── hero-section.css         ← Modern styles
├── classic/
│   ├── hero-section.php         ← Classic layout
│   └── hero-section.css         ← Classic styles
└── minimal/
    ├── hero-section.php         ← Minimal layout
    └── (no CSS file)            ← Uses base document-system.css
```

**Switch styles with variable:**

```php
<?php
// Switch entire page to different style pack
$style_pack = 'modern'; // or 'classic', 'minimal'

partial('hero', $hero_settings, $style_pack);
partial('color-palette', $color_settings, $style_pack);
partial('cta', $cta_settings, $style_pack);
?>
```

**Each style pack CSS:**

```css
/* modern/hero-section.css - Bold, gradient-heavy */
.hero {
    background: radial-gradient(var(--color-brand-primary), transparent);
    padding: 120px 80px;
}

/* classic/hero-section.css - Traditional, solid colors */
.hero {
    background: var(--color-brand-primary);
    padding: 80px 40px;
    border-bottom: 5px solid var(--color-brand-accent);
}

/* minimal/hero-section.css doesn't exist - uses base */
```

---

### CSS Cascade Relationship

```
┌─────────────────────────────────────┐
│   0. WordPress Theme CSS            │  ← External (not in scope)
└─────────────────────────────────────┘
              ↓
┌─────────────────────────────────────┐
│   1. base.css                       │  ← Structural foundation
│   • Resets, box model               │
│   • Grid systems (.grid-2, etc)     │
│   • Utility classes (.card, etc)    │
│   • NO colors/fonts                 │
└─────────────────────────────────────┘
              ↓
┌─────────────────────────────────────┐
│   2. config.php → CSS Variables     │  ← Generated inline <style>
│   • Global defaults (neutral)       │
│   • Client overrides (brand colors) │
│   • --color-brand-primary, etc      │
└─────────────────────────────────────┘
              ↓ (variables used by)
┌─────────────────────────────────────┐
│   3. document-system.css            │  ← Component styles
│   • .hero, .cta-button, etc         │
│   • Uses CSS variables above        │
│   • Brand-agnostic                  │
└─────────────────────────────────────┘
              ↓ (overridden by)
┌─────────────────────────────────────┐
│   4. Partial CSS (auto-loaded)      │  ← Component variations
│   • modern/hero-section.css         │
│   • Overrides specific components   │
└─────────────────────────────────────┘
              ↓ (overridden by)
┌─────────────────────────────────────┐
│   5. client-theme.css               │  ← Client rule overrides
│   • Specific CSS rules (optional)   │
│   • When variables aren't enough    │
└─────────────────────────────────────┘
              ↓ (final result)
┌─────────────────────────────────────┐
│   Rendered HTML Elements            │
│   • Complete cascade applied        │
└─────────────────────────────────────┘
```

---

### Fallback Behavior

If partial CSS doesn't exist, component uses base styles:

```php
// hero-section.css exists
partial('hero', $settings, 'modern');
// Loads: document-system.css + modern/hero-section.css

// hero-section.css doesn't exist
partial('hero', $settings, 'minimal');
// Loads: document-system.css only (no error, graceful fallback)
```

---

### Migration Path

**Current State (v1.1.4):**
CSS architecture uses 5-layer system for maximum flexibility.

**For New Clients:**
1. Copy `refr/` folder structure
2. `config.php` starts with empty `css_variables` array (uses global defaults)
3. `refr-theme.css` starts blank (no overrides needed)
4. Templates work immediately with sensible defaults
5. Add brand colors to `config.php` css_variables section as needed
6. Add CSS rule overrides to `refr-theme.css` only if variables aren't enough

**For Style-Pack Variations:**
1. Component styles are in `global/document-system.css`
2. Create partial CSS only for variations: `modern/hero-section.css`
3. Override only what differs from base component styles

**Example - Quick Client Setup:**

```php
// refr/config.php - Add just brand colors
'css_variables' => array(
    'color-brand-primary' => '#08093E',
    'color-brand-accent' => '#037DED',
    'font-heading' => "'Raleway', sans-serif",
),
```

Everything else uses global defaults!

---

### Performance Notes

**HTTP Requests:**
- Base: 1 CSS file (`document-system.css`)
- With 3 partials + partial CSS: 4 CSS files total
- Browser caches each file separately
- Modern browsers handle this efficiently

**Optimization Tips:**
- Only create partial CSS when needed (not for every partial)
- Use partial CSS for variations, not shared styles
- Consider build process to concatenate if >10 CSS files

---

### Debugging

Check if partial CSS loaded:

```html
<!-- View page source, look for: -->
<link rel="stylesheet" href=".../modern/hero-section.css?ver=1.1.3" id="leancms-partial-modern-hero-css">
```

**Not loading? Check:**
1. CSS file exists next to PHP file
2. CSS file named correctly (`hero-section.css` not `hero.css`)
3. File permissions allow reading
4. No PHP errors blocking render

---

## Testing Partials

Before committing a new partial:

1. **Test with defaults** - Include without setting variables
2. **Test with all options** - Set all possible variables
3. **Test responsive** - Check mobile/tablet layouts
4. **Test in multiple pages** - Ensure reusability
5. **Validate HTML** - Check for proper escaping and structure

---

## Migration Strategy

### Converting Inline Sections to Partials

**Before:**
```php
<section class="cta-section">
    <h2>Get in Touch</h2>
    <p>Contact us today</p>
    <a href="/contact" class="cta-button">Contact</a>
</section>
```

**After:**
```php
<?php
$cta_title = 'Get in Touch';
$cta_description = 'Contact us today';
$cta_button_text = 'Contact';
$cta_button_url = '/contact';
include LEANCMS_PLUGIN_DIR . 'templates/pages/_partials/cta-section.php';
?>
```

---

## System Architecture

### Partial Registry (`LeanCMS_Partial_Registry`)

The partial system uses an auto-discovery registry that:

- **Boots automatically** when plugin loads
- **Scans folders** for all `.php` files in `_partials/` directories
- **Registers partials** with clean names (strips `-section` suffix)
- **Prioritizes client partials** over global partials
- **Auto-wraps config** based on partial name
- **Caches discoveries** for performance

### Global Helper Function (`partial()`)

```php
// Global function available everywhere
partial('color-palette', $settings);

// Internally calls:
LeanCMS_Helpers::partial() → LeanCMS_Partial_Registry::render()
```

### Adding New Partials

Simply create a file in `_partials/` or `{client}/_partials/`:

```bash
# Create new partial
touch templates/pages/_partials/hero-section.php

# Automatically discovered on next page load
# Available as: partial('hero', $settings)
```

---

## Future Enhancements

Potential improvements to the partials system:

- ✅ **Auto-resolution** - ✨ Implemented in v1.2.0
- ✅ **Partial registry** - ✨ Implemented in v1.2.0
- **Partial variants** - Support for `cta-section-variant.php` naming
- **Shortcode wrapper** - Allow `[partial name="cta-section" title="..."]`
- **Template engine** - Consider Twig/Blade for more advanced partials
- **Cache optimization** - Store registry in transient/option

---

## Related Documentation

- **Main Template Guide:** `templates/pages/README.md`
- **Document System CSS:** `templates/pages/refr/assets/document-system.css`
- **WordPress Template Hierarchy:** https://developer.wordpress.org/themes/basics/template-hierarchy/

---

**Last Updated:** 2025-11-08 (v1.1.3 - Added CSS auto-loading)
**Maintained By:** LeanCMS Brand Hub Team
