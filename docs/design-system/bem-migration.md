# BEM Migration Reference for Project Overview Templates

This document provides a comprehensive mapping of legacy classes to BEM equivalents for use in HTML content blocks within project overview templates.

## Quick Reference Table

| Legacy Class | BEM Equivalent | Notes |
|-------------|----------------|-------|
| `.status-badge` | `.lcms-badge` | Base badge component |
| `.status-in-progress` | `.lcms-badge--warning` | Yellow/orange badge |
| `.status-not-started` | `.lcms-badge--light` | Gray badge |
| `.status-not-funded` | `.lcms-badge--danger` | Red badge |
| `.status-complete` | `.lcms-badge--success` | Green badge |
| `.progress-bar-container` | `.lcms-progress` | Progress bar wrapper |
| `.progress-bar-header` | `.lcms-progress__label` | Label/header area |
| `.progress-bar-indicator` | (remove) | Not needed with BEM |
| `.progress-bar-fill` | `.lcms-progress__bar` | The actual progress bar |
| `.metric-card` | `.lcms-metric` | Metric display component |
| `.metric-label` | `.lcms-metric__label` | Metric label text |
| `.metric-value` | `.lcms-metric__value` | Large metric number |
| `.metric-description` | `.lcms-metric__description` | Description text |
| `.inner-card` | (remove) | No styling, not needed |
| `.summary-card` | `.lcms-card--summary` | Card variant |
| `.feature-card` | `.lcms-card--feature` | Feature card variant |
| `.roadmap-card` | `.lcms-card--info` | Info card variant |
| `.phase-box` | `.lcms-badge` or `.lcms-card--compact` | Depends on usage |
| `.grid-2col` | `.lcms-grid--2col` | 2-column grid |
| `.grid-3col` | `.lcms-grid--3col` | 3-column grid |
| `.grid-4col` | `.lcms-grid--4col` | 4-column grid |
| `.flex` | `style="display: flex;"` | Use inline style |
| `.justify-space-between` | `style="justify-content: space-between;"` | Use inline style |
| `.align-flex-start` | `style="align-items: flex-start;"` | Use inline style |
| `.mt-24` | `style="margin-top: 24px;"` | Use inline style |
| `.mb-16` | `style="margin-bottom: 16px;"` | Use inline style |

## Section-Level vs. Container-Level Styling

**NEW in v2.0.5:** You can now apply BEM classes at two different levels.
**NEW in v2.0.6:** Added `container_css` for container-level inline styles.

### Available Parameters:

| Parameter | Level | Type | Purpose |
|-----------|-------|------|---------|
| `custom_classes` | Section | Classes | Apply BEM classes to `<section>` |
| `custom_css` | Section | Inline CSS | Apply inline styles to `<section>` |
| `container_classes` | Container | Classes | Apply BEM classes to `.lcms-container` |
| `container_css` | Container | Inline CSS | Apply inline styles to `.lcms-container` |

---

### 1. **Section-Level Styling** (Outer Wrapper)
Use `custom_classes` and `custom_css` to style the entire `<section>` element:

```php
partial('column', [
    'settings' => [
        'custom_classes' => 'lcms-card lcms-card--summary',
        'custom_css' => 'padding-top: 0; padding-bottom: 0;',
    ],
    // ...
], 'pro-sites');
```

**HTML Output:**
```html
<section class="lcms-pro-sites lcms-card lcms-card--summary" style="padding-top: 0; padding-bottom: 0;">
    <div class="lcms-container">
        <!-- content -->
    </div>
</section>
```

**Use Case:** Background styling, full-width cards, section-wide effects, section padding adjustments

---

### 2. **Container-Level Styling** (Inner Container - **Floating Cards**)
Use `container_classes` and `container_css` to style the inner `.lcms-container` div:

```php
partial('column', [
    'settings' => [
        'container_classes' => 'lcms-card lcms-card--elevated',
        'container_css' => 'margin-top: -50px;',
    ],
    // ...
], 'pro-sites');
```

**HTML Output:**
```html
<section class="lcms-pro-sites">
    <div class="lcms-container lcms-card lcms-card--elevated" style="margin-top: -50px;">
        <!-- content -->
    </div>
</section>
```

**Use Case:** Floating cards, overlapping sections, max-width contained cards, negative margins

---

### 3. **Both Levels** (Advanced - All Parameters)
Combine all parameters for maximum flexibility:

```php
partial('column', [
    'settings' => [
        'dark_mode' => true,                               // Dark section (BEM-compliant)
        'custom_css' => 'padding-top: 0; padding-bottom: 0;',  // Section spacing
        'container_classes' => 'lcms-card lcms-card--elevated', // Floating card
        'container_css' => 'margin-top: -50px;',               // Card overlap
    ],
    // ...
], 'pro-sites');
```

**HTML Output:**
```html
<section class="lcms-pro-sites lcms-column-section lcms-pro-sites--dark" style="padding-top: 0; padding-bottom: 0;">
    <div class="lcms-container lcms-card lcms-card--elevated" style="margin-top: -50px;">
        <!-- content -->
    </div>
</section>
```

**Use Case:** Dark background with light elevated card that overlaps previous section, complex visual hierarchy

**Note:** Use `dark_mode => true` parameter instead of manually adding `'custom_classes' => 'dark-mode'` for BEM compliance

---

### 4. **Real-World Example** (Project Overview Summary Card)

```php
// Floating summary card that overlaps the hero section
partial('column', [
    'settings' => [
        'container_classes' => 'lcms-card lcms-card--summary',
        'container_css' => 'margin-top: -50px;',
        'custom_css' => 'padding-top: 0; padding-bottom: 0;',
    ],
    'content' => [
        'type' => 'row',
        'items' => [
            ['type' => 'text', 'content' => [...]],
            ['type' => 'image', 'content' => [...]],
        ],
    ],
], 'pro-sites');
```

**Result:** A floating summary card that overlaps the hero section by 50px, with the section padding removed to allow the card to sit flush.

---

## Detailed Migration Examples

### 1. Status Badges

**Before (Legacy):**
```html
<span class="status-badge status-in-progress">In Progress</span>
<span class="status-badge status-not-started">Not Started</span>
<span class="status-badge status-not-funded">Seeking Funding</span>
```

**After (BEM):**
```html
<span class="lcms-badge lcms-badge--warning">In Progress</span>
<span class="lcms-badge lcms-badge--light">Not Started</span>
<span class="lcms-badge lcms-badge--danger">Seeking Funding</span>
```

**Available Badge Modifiers:**
- `--primary` (brand primary color)
- `--secondary` (brand secondary color)
- `--success` (green)
- `--warning` (yellow/orange)
- `--danger` (red)
- `--info` (blue)
- `--light` (gray/light)
- `--dark` (dark)

### 2. Progress Bars

**Before (Legacy):**
```html
<div class="progress-bar-container">
    <div class="progress-bar-header flex justify-space-between align-flex-start">
        <h4>📋 Planning Phase</h4>
        <span class="status-badge status-in-progress">In Progress</span>
    </div>
    <div class="progress-bar-indicator">
        <div class="progress-bar-fill" style="width: 75%;">75%</div>
    </div>
</div>
```

**After (BEM):**
```html
<div class="lcms-progress">
    <div class="lcms-progress__label" style="display: flex; justify-content: space-between; align-items: flex-start;">
        <h4>📋 Planning Phase</h4>
        <span class="lcms-badge lcms-badge--warning">In Progress</span>
    </div>
    <div class="lcms-progress__bar" style="width: 75%;">
        <span class="lcms-progress__text">75%</span>
    </div>
</div>
```

**Available Progress Modifiers:**
- `--small`, `--medium`, `--large` (size)
- `--primary`, `--success`, `--warning`, `--danger` (color)
- `--striped` (striped pattern)
- `--animated` (animated stripes)

### 3. Metrics

**Before (Legacy):**
```html
<div class="metric-card">
    <div class="metric-label">Total Poses</div>
    <div class="metric-value">36</div>
    <div class="metric-description">Breakdancing moves covering toprock, freezes, power moves</div>
</div>
```

**After (BEM):**
```html
<div class="lcms-metric">
    <div class="lcms-metric__label">Total Poses</div>
    <div class="lcms-metric__value">36</div>
    <div class="lcms-metric__description">Breakdancing moves covering toprock, freezes, power moves</div>
</div>
```

**Available Metric Modifiers:**
- `--small`, `--large` (size)
- `--primary`, `--accent`, `--success`, `--warning`, `--danger` (value color)
- `--dark`, `--transparent` (background)

### 4. Cards

**Before (Legacy):**
```html
<div class="feature-card">
    <h4>🥇 First to Market</h4>
    <p>First AI-driven breakdancing sprite system available</p>
</div>

<div class="roadmap-card">
    <h3>⚡ Immediate (2 weeks)</h3>
    <ul class="list check-list">
        <li>Complete prompt template library</li>
    </ul>
</div>
```

**After (BEM):**
```html
<div class="lcms-card lcms-card--feature">
    <div class="lcms-card__body">
        <h4>🥇 First to Market</h4>
        <p>First AI-driven breakdancing sprite system available</p>
    </div>
</div>

<div class="lcms-card lcms-card--info">
    <div class="lcms-card__body">
        <h3>⚡ Immediate (2 weeks)</h3>
        <ul class="lcms-list lcms-list--check">
            <li>Complete prompt template library</li>
        </ul>
    </div>
</div>
```

**Available Card Modifiers:**
- `--bordered`, `--elevated` (style)
- `--feature`, `--metric`, `--progress`, `--summary`, `--info` (variant)
- `--compact`, `--spacious` (padding)
- `--horizontal` (layout)

### 5. Grids

**Before (Legacy):**
```html
<div class="grid-4col">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
    <div>Item 4</div>
</div>

<div class="grid-3col mt-24">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
</div>
```

**After (BEM):**
```html
<div class="lcms-grid lcms-grid--4col">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
    <div>Item 4</div>
</div>

<div class="lcms-grid lcms-grid--3col" style="margin-top: 24px;">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
</div>
```

**Available Grid Modifiers:**
- `--2col`, `--3col`, `--4col` (column count)

### 6. Lists

**Before (Legacy):**
```html
<ul class="list check-list">
    <li>Item 1</li>
    <li>Item 2</li>
</ul>

<ul class="list check-list in-progress">
    <li>Item 1</li>
</ul>

<ul class="list check-list upcoming">
    <li>Item 1</li>
</ul>
```

**After (BEM):**
```html
<ul class="lcms-list lcms-list--check">
    <li>Item 1</li>
    <li>Item 2</li>
</ul>

<ul class="lcms-list lcms-list--check lcms-list--warning">
    <li>Item 1</li>
</ul>

<ul class="lcms-list lcms-list--check lcms-list--light">
    <li>Item 1</li>
</ul>
```

**Available List Modifiers:**
- `--check` (checkmark bullets)
- `--arrow` (arrow bullets)
- `--success`, `--warning`, `--light` (color variants)

### 7. Utility Classes → Inline Styles

For flexbox, spacing, and alignment utilities, use inline styles instead:

**Before (Legacy):**
```html
<div class="flex justify-space-between align-flex-start mt-24 mb-16">
    Content
</div>
```

**After (Inline Styles):**
```html
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-top: 24px; margin-bottom: 16px;">
    Content
</div>
```

## Migration Checklist for Project Overview Templates

- [ ] Line 44: `.status-badge .status-in-progress` → `.lcms-badge .lcms-badge--warning`
- [ ] Line 55: ✅ `custom_classes` migrated to BEM
- [ ] Line 82-117: Progress bars → `.lcms-progress` structure
- [ ] Line 145: `.card` → `.lcms-card`
- [ ] Line 202: `.grid-4col` → `.lcms-grid .lcms-grid--4col`
- [ ] Line 244-250: Progress bars → `.lcms-progress` structure
- [ ] Line 255: `.grid-3col .mt-24` → `.lcms-grid .lcms-grid--3col` + inline style
- [ ] Line 258: `.list .check-list` → `.lcms-list .lcms-list--check`
- [ ] Line 305: `.grid-2col .gap-8` → `.lcms-grid .lcms-grid--2col` + inline gap
- [ ] Line 306-312: `.phase-box` → `.lcms-badge` or `.lcms-card .lcms-card--compact`
- [ ] Line 347-371: `.metric-card` → `.lcms-metric`
- [ ] Line 400: `.grid-2col-funding` → `.lcms-grid .lcms-grid--2col`
- [ ] Line 401: `.card .flex .flex-column .align-center` → `.lcms-card` + inline styles
- [ ] Line 520: `.grid-2col` → `.lcms-grid .lcms-grid--2col`
- [ ] Line 521-541: `.feature-card` → `.lcms-card .lcms-card--feature`
- [ ] Line 589: `.grid-3col` → `.lcms-grid .lcms-grid--3col`
- [ ] Line 590-616: `.roadmap-card` → `.lcms-card .lcms-card--info`

## Notes

1. **Custom Classes**: The `custom_classes` parameter in partial() calls has been migrated. For HTML content blocks, you'll need to manually update the markup.

2. **Inline Styles**: For one-off styling needs (spacing, alignment, etc.), use the `custom_css` parameter or inline styles rather than utility classes.

3. **Component Structure**: BEM components often require proper HTML structure. For example, `.lcms-card` works best with child elements like `.lcms-card__body`.

4. **No Descendant Selectors**: Don't nest BEM classes within wrapper elements. Each BEM component should be self-contained.

5. **Full BEM Documentation**: For complete component documentation, see `templates/assets/global/lcms-design-system.css` which contains all available BEM components and modifiers.
