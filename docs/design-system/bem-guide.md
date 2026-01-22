# BEM Classes Reference Guide

Complete reference of all available BEM classes in the LeanCMS Design System.
Organized by component category for quick lookup and manual implementation.

**Version:** 2.0.6
**Last Updated:** 2025-11-17
**Total Components:** 20+

---

## Table of Contents

1. [Layout & Container](#layout--container)
2. [Section Utilities](#section-utilities)
3. [Typography & Headings](#typography--headings)
4. [Buttons & Navigation](#buttons--navigation)
5. [Content Display](#content-display)
6. [Cards & Containers](#cards--containers)
7. [Grid & Columns](#grid--columns)
8. [Data & Metrics](#data--metrics)
9. [Lists & Progress](#lists--progress)
10. [Badges & Labels](#badges--labels)
11. [Specialized Sections](#specialized-sections)
12. [Content Renderers](#content-renderers)

---

## Layout & Container

### Container
Universal max-width container for content.

**Base Class:**
- `.lcms-container` - Default max-width container (1200px)

**Modifiers:**
- `.lcms-container--thin` - Narrow container (900px)
- `.lcms-container--wide` - Wide container (1400px)
- `.lcms-container--full` - Full width (100%)

**Example:**
```html
<div class="lcms-container">
    <!-- Content -->
</div>

<div class="lcms-container lcms-container--thin">
    <!-- Narrow content -->
</div>
```

---

## Section Utilities

### Dark Mode
BEM modifier that inverts color scheme for child components within a section.

**BEM Modifier:**
- `.lcms-pro-sites--dark` - Applied automatically when `dark_mode => true`

**Legacy Classes (Deprecated):**
- `.dark-mode` - Non-BEM utility (still supported for backward compatibility)
- `.lcms-section--dark` - Previous BEM attempt (still supported)

**Affected Components:**
When dark mode is enabled, these components automatically adjust:
- **Buttons** - Secondary and outline buttons use light colors
- **Cards** - Cards use dark backgrounds with light text
- **All Text** - Text colors invert to light variants

**Recommended Usage (BEM-Compliant):**
Use the `dark_mode` parameter in settings - this automatically applies the BEM modifier:

```php
// Enable dark mode using the dark_mode parameter
partial('column', [
    'settings' => [
        'dark_mode' => true,  // BEM-compliant approach
    ],
    'content' => [
        // All components here will use dark theme
    ],
], 'pro-sites');
```

**HTML Output:**
```html
<section class="lcms-pro-sites lcms-column-section lcms-pro-sites--dark">
    <div class="lcms-container">
        <!-- All components use inverted colors -->
        <div class="lcms-card">
            <!-- Dark background, light text -->
        </div>
        <a href="#" class="lcms-button lcms-button--secondary">
            <!-- Light colored button -->
        </a>
    </div>
</section>
```

**Alternative (Manual Class):**
If you need to manually apply dark mode for special cases:

```php
partial('column', [
    'settings' => [
        'custom_classes' => 'lcms-pro-sites--dark',  // Manual BEM modifier
    ],
], 'pro-sites');
```

**Advanced: Dark Section with Light Floating Card**
Combine `dark_mode` parameter with container-level card styling:

```php
partial('column', [
    'settings' => [
        'dark_mode' => true,                               // Dark section background
        'container_classes' => 'lcms-card lcms-card--elevated', // Light floating card
        'container_css' => 'background: white; color: #161617;', // Override to stay light
    ],
], 'pro-sites');
```

**Notes:**
- ✅ **Recommended:** Use `dark_mode => true` parameter for BEM compliance
- ⚠️ **Deprecated:** Manually adding `dark-mode` class (non-BEM)
- All child components automatically inherit dark theme
- Individual components can be overridden with inline styles if needed
- Works seamlessly with all BEM components

---

## Typography & Headings

### Section Heading
Structured heading component with label, title, and description.

**Base Class:**
- `.lcms-section-heading` - Section heading wrapper

**Elements:**
- `.lcms-section-heading__label` - Small label above title
- `.lcms-section-heading__title` - Main heading
- `.lcms-section-heading__description` - Description text below title

**Modifiers:**
- `.lcms-section-heading--align-left` - Left-aligned (default)
- `.lcms-section-heading--align-center` - Center-aligned
- `.lcms-section-heading--align-right` - Right-aligned

**Example:**
```html
<div class="lcms-section-heading lcms-section-heading--align-center">
    <div class="lcms-section-heading__label">About</div>
    <h2 class="lcms-section-heading__title">Our Story</h2>
    <p class="lcms-section-heading__description">Learn about our journey</p>
</div>
```

### Content
Text content wrapper with formatting options.

**Base Class:**
- `.lcms-content` - Standard content wrapper

**Modifiers:**
- `.lcms-content--lead` - Larger lead text
- `.lcms-content--small` - Smaller text
- `.lcms-content--html` - HTML content with rich formatting

**Example:**
```html
<div class="lcms-content lcms-content--lead">
    <p>This is lead text with larger font size.</p>
</div>
```

---

## Buttons & Navigation

### Button
Individual button component.

**Base Class:**
- `.lcms-button` - Base button style

**Style Modifiers:**
- `.lcms-button--primary` - Primary action button
- `.lcms-button--secondary` - Secondary action button
- `.lcms-button--outline` - Outline style button
- `.lcms-button--cta` - Call-to-action button (prominent)

**Size Modifiers:**
- `.lcms-button--small` - Small button
- `.lcms-button--large` - Large button
- `.lcms-button--full-width` - Full width button

**Example:**
```html
<a href="#" class="lcms-button lcms-button--primary">
    Primary Action
</a>

<button class="lcms-button lcms-button--outline lcms-button--large">
    Large Outline Button
</button>
```

### Button Group
Container for multiple buttons.

**Base Class:**
- `.lcms-button-group` - Button group wrapper

**Alignment Modifiers:**
- `.lcms-button-group--align-left` - Left-aligned buttons
- `.lcms-button-group--align-center` - Center-aligned buttons
- `.lcms-button-group--align-right` - Right-aligned buttons

**Layout Modifiers:**
- `.lcms-button-group--stacked` - Vertical stack (mobile-first)

**Example:**
```html
<div class="lcms-button-group lcms-button-group--align-center">
    <a href="#" class="lcms-button lcms-button--primary">Primary</a>
    <a href="#" class="lcms-button lcms-button--secondary">Secondary</a>
</div>
```

---

## Content Display

### Image
Semantic image component with caption support.

**Base Class:**
- `.lcms-image` - Image wrapper (uses `<figure>`)

**Elements:**
- `.lcms-image__img` - The actual `<img>` element
- `.lcms-image__caption` - Image caption (uses `<figcaption>`)

**Example:**
```html
<figure class="lcms-image">
    <img src="photo.jpg" alt="Description" class="lcms-image__img">
    <figcaption class="lcms-image__caption">Photo caption</figcaption>
</figure>
```

### Video
Responsive video embed component (16:9 aspect ratio).

**Base Class:**
- `.lcms-video` - Video wrapper

**Elements:**
- `.lcms-video__element` - Video container with aspect ratio
- `.lcms-video__iframe` - Embedded iframe

**Example:**
```html
<div class="lcms-video">
    <div class="lcms-video__element">
        <iframe src="https://youtube.com/embed/..." class="lcms-video__iframe"></iframe>
    </div>
</div>
```

---

## Cards & Containers

### Card
Versatile card component for content grouping.

**Base Class:**
- `.lcms-card` - Base card style

**Elements:**
- `.lcms-card__header` - Card header section
- `.lcms-card__title` - Card title
- `.lcms-card__body` - Main card content
- `.lcms-card__footer` - Card footer section

**Style Modifiers:**
- `.lcms-card--bordered` - Card with border
- `.lcms-card--elevated` - Card with shadow elevation
- `.lcms-card--interactive` - Hover effects for clickable cards

**Type Modifiers:**
- `.lcms-card--feature` - Feature card styling
- `.lcms-card--progress` - Progress tracking card
- `.lcms-card--metric` - Metric display card
- `.lcms-card--summary` - Summary card
- `.lcms-card--info` - Information card

**Spacing Modifiers:**
- `.lcms-card--compact` - Reduced padding
- `.lcms-card--spacious` - Increased padding

**Layout Modifiers:**
- `.lcms-card--horizontal` - Horizontal card layout

**Example:**
```html
<div class="lcms-card lcms-card--elevated lcms-card--feature">
    <div class="lcms-card__header">
        <h3 class="lcms-card__title">Feature Title</h3>
    </div>
    <div class="lcms-card__body">
        <p>Card content goes here.</p>
    </div>
    <div class="lcms-card__footer">
        <a href="#" class="lcms-button">Learn More</a>
    </div>
</div>
```

---

## Grid & Columns

### Grid
Responsive grid layout system.

**Base Class:**
- `.lcms-grid` - Auto-responsive grid

**Column Modifiers:**
- `.lcms-grid--2col` - 2-column grid
- `.lcms-grid--3col` - 3-column grid
- `.lcms-grid--4col` - 4-column grid

**Gap Modifiers:**
- `.lcms-grid--gap-small` - Small gap (10px)
- `.lcms-grid--gap-medium` - Medium gap (20px)
- `.lcms-grid--gap-large` - Large gap (30px)

**Elements:**
- `.lcms-grid__item` - Grid item (optional)

**Example:**
```html
<div class="lcms-grid lcms-grid--3col lcms-grid--gap-large">
    <div class="lcms-grid__item">Item 1</div>
    <div class="lcms-grid__item">Item 2</div>
    <div class="lcms-grid__item">Item 3</div>
</div>
```

### Column Layout
Two-column responsive layout.

**Base Class:**
- `.lcms-column-layout` - Column layout wrapper

**Elements:**
- `.lcms-column-layout__column` - Individual column

**Alignment Modifiers:**
- `.lcms-column-layout--align-top` - Align items to top
- `.lcms-column-layout--align-center` - Vertically center items
- `.lcms-column-layout--align-bottom` - Align items to bottom
- `.lcms-column-layout--align-stretch` - Stretch items to equal height

**Gap Modifiers:**
- `.lcms-column-layout--gap-small` - Small gap
- `.lcms-column-layout--gap-medium` - Medium gap
- `.lcms-column-layout--gap-large` - Large gap

**Layout Modifiers:**
- `.lcms-column-layout--reverse-mobile` - Reverse column order on mobile

**Example:**
```html
<div class="lcms-column-layout lcms-column-layout--align-center lcms-column-layout--gap-large">
    <div class="lcms-column-layout__column">
        <!-- Left column -->
    </div>
    <div class="lcms-column-layout__column">
        <!-- Right column -->
    </div>
</div>
```

### Content Grid
Content-specific grid for media/text combinations.

**Base Class:**
- `.lcms-content-grid` - Content grid wrapper

**Gap Modifiers:**
- `.lcms-content-grid--gap-small` - Small gap
- `.lcms-content-grid--gap-medium` - Medium gap
- `.lcms-content-grid--gap-large` - Large gap

**Example:**
```html
<div class="lcms-content-grid lcms-content-grid--gap-medium">
    <div class="lcms-image">...</div>
    <div class="lcms-content">...</div>
</div>
```

---

## Data & Metrics

### Metric
Display component for numerical data and KPIs.

**Base Class:**
- `.lcms-metric` - Metric wrapper

**Elements:**
- `.lcms-metric__label` - Metric label/description
- `.lcms-metric__value` - Main numeric value
- `.lcms-metric__unit` - Unit of measurement
- `.lcms-metric__change` - Change indicator
- `.lcms-metric__icon` - Optional icon

**Size Modifiers:**
- `.lcms-metric--small` - Small metric display
- `.lcms-metric--large` - Large metric display

**Style Modifiers:**
- `.lcms-metric--dark` - Dark background variant
- `.lcms-metric--transparent` - Transparent background
- `.lcms-metric--gradient` - Gradient background
- `.lcms-metric--interactive` - Hover effects

**Example:**
```html
<div class="lcms-metric lcms-metric--large lcms-metric--gradient">
    <div class="lcms-metric__label">Total Users</div>
    <div class="lcms-metric__value">12,458</div>
    <div class="lcms-metric__change">+15% this month</div>
</div>
```

### Color Swatch
Display component for brand colors.

**Base Class:**
- `.lcms-color-swatch` - Swatch wrapper

**Elements:**
- `.lcms-color-swatch__visual` - Color display area
- `.lcms-color-swatch__name` - Color name
- `.lcms-color-swatch__hex` - Hex code
- `.lcms-color-swatch__rgb` - RGB value
- `.lcms-color-swatch__usage` - Usage notes

**Modifiers:**
- `.lcms-color-swatch--interactive` - Clickable/copyable swatch
- `.lcms-color-swatch--featured` - Featured color emphasis

**Example:**
```html
<div class="lcms-color-swatch lcms-color-swatch--interactive">
    <div class="lcms-color-swatch__visual" style="background-color: #FF5733;"></div>
    <div class="lcms-color-swatch__name">Brand Primary</div>
    <div class="lcms-color-swatch__hex">#FF5733</div>
    <div class="lcms-color-swatch__usage">Primary actions, links</div>
</div>
```

---

## Lists & Progress

### List
Enhanced list component with icons and styling.

**Base Class:**
- `.lcms-list` - List wrapper

**Elements:**
- `.lcms-list__item` - List item
- `.lcms-list__icon` - Item icon
- `.lcms-list__content` - Item content

**Type Modifiers:**
- `.lcms-list--check` - All items show checkmarks (✓)
- `.lcms-list--cross` - All items show crosses (✗)
- `.lcms-list--todo` - Todo list with per-item state control (○/✓)
- `.lcms-list--arrow` - Arrow markers (▸)
- `.lcms-list--bullet` - Bullet markers (•)
- `.lcms-list--numbered` - Numbered list
- `.lcms-list--icon` - Icon-based list (custom icons)

**Item State Modifiers (for todo lists):**
- `.lcms-list__item--checked` - Mark individual item as checked (✓)
- `.lcms-list__item--unchecked` - Explicit unchecked state (○)

**Spacing Modifiers:**
- `.lcms-list--compact` - Reduced spacing
- `.lcms-list--spacious` - Increased spacing

**Examples:**

**Check List (all items checked):**
```html
<ul class="lcms-list lcms-list--check">
    <li class="lcms-list__item">Completed feature one</li>
    <li class="lcms-list__item">Completed feature two</li>
</ul>
```

**Todo List (per-item control):**
```html
<ul class="lcms-list lcms-list--todo">
    <li class="lcms-list__item lcms-list__item--checked">Completed task</li>
    <li class="lcms-list__item">Pending task (shows circle)</li>
    <li class="lcms-list__item lcms-list__item--checked">Another completed task</li>
    <li class="lcms-list__item">Another pending task</li>
</ul>
```

**Icon List (custom icons):**
```html
<ul class="lcms-list lcms-list--icon lcms-list--spacious">
    <li class="lcms-list__item">
        <span class="lcms-list__icon">✓</span>
        <span class="lcms-list__content">Feature one</span>
    </li>
    <li class="lcms-list__item">
        <span class="lcms-list__icon">✓</span>
        <span class="lcms-list__content">Feature two</span>
    </li>
</ul>
```

### Progress
Progress bar component for tracking completion.

**Base Class:**
- `.lcms-progress` - Progress wrapper

**Elements:**
- `.lcms-progress__bar` - Progress bar container
- `.lcms-progress__fill` - Filled portion
- `.lcms-progress__label` - Progress label
- `.lcms-progress__percentage` - Percentage value

**Size Modifiers:**
- `.lcms-progress--small` - Small progress bar
- `.lcms-progress--medium` - Medium progress bar (default)
- `.lcms-progress--large` - Large progress bar

**Style Modifiers:**
- `.lcms-progress--rounded` - Rounded corners
- `.lcms-progress--square` - Square corners
- `.lcms-progress--shadow` - Shadow effect

**Example:**
```html
<div class="lcms-progress lcms-progress--large lcms-progress--rounded">
    <div class="lcms-progress__label">Project Progress</div>
    <div class="lcms-progress__bar">
        <div class="lcms-progress__fill" style="width: 75%;"></div>
    </div>
    <div class="lcms-progress__percentage">75%</div>
</div>
```

---

## Badges & Labels

### Badge
Small label component for status, tags, and indicators.

**Base Class:**
- `.lcms-badge` - Base badge style

**Color Modifiers:**
- `.lcms-badge--primary` - Primary brand color
- `.lcms-badge--secondary` - Secondary color
- `.lcms-badge--accent` - Accent color
- `.lcms-badge--success` - Success/green
- `.lcms-badge--warning` - Warning/yellow
- `.lcms-badge--danger` - Danger/red
- `.lcms-badge--info` - Info/blue
- `.lcms-badge--light` - Light background
- `.lcms-badge--dark` - Dark background

**Style Modifiers:**
- `.lcms-badge--outline` - Outline style
- `.lcms-badge--subtle` - Subtle/muted style

**Size Modifiers:**
- `.lcms-badge--small` - Small badge
- `.lcms-badge--medium` - Medium badge (default)
- `.lcms-badge--large` - Large badge

**Shape Modifiers:**
- `.lcms-badge--pill` - Pill shape (fully rounded)
- `.lcms-badge--square` - Square corners
- `.lcms-badge--rounded` - Rounded corners

**Feature Modifiers:**
- `.lcms-badge--with-dot` - Badge with status dot
- `.lcms-badge--clickable` - Interactive/clickable badge
- `.lcms-badge--dismissible` - Dismissible badge

**Example:**
```html
<span class="lcms-badge lcms-badge--success lcms-badge--pill">
    Active
</span>

<span class="lcms-badge lcms-badge--warning lcms-badge--outline lcms-badge--with-dot">
    Pending
</span>
```

---

## Specialized Sections

### Hero
Full-width hero section component.

**Base Class:**
- `.lcms-hero` - Hero section wrapper

**Elements:**
- `.lcms-hero__content` - Content container
- `.lcms-hero__title` - Hero title
- `.lcms-hero__subtitle` - Hero subtitle
- `.lcms-hero__description` - Hero description
- `.lcms-hero__actions` - Action buttons container

**Color Modifiers:**
- `.lcms-hero--primary` - Primary brand color
- `.lcms-hero--secondary` - Secondary color
- `.lcms-hero--accent` - Accent color
- `.lcms-hero--dark` - Dark background
- `.lcms-hero--light` - Light background

**Size Modifiers:**
- `.lcms-hero--small` - Small hero (reduced padding)
- `.lcms-hero--large` - Large hero (increased padding)

**Alignment Modifiers:**
- `.lcms-hero--left` - Left-aligned content
- `.lcms-hero--right` - Right-aligned content

**Example:**
```html
<section class="lcms-hero lcms-hero--primary lcms-hero--large">
    <div class="lcms-hero__content">
        <h1 class="lcms-hero__title">Welcome to Our Platform</h1>
        <p class="lcms-hero__subtitle">The best solution for your business</p>
        <p class="lcms-hero__description">
            Discover powerful features and seamless integration.
        </p>
        <div class="lcms-hero__actions">
            <a href="#" class="lcms-button lcms-button--cta">Get Started</a>
            <a href="#" class="lcms-button lcms-button--outline">Learn More</a>
        </div>
    </div>
</section>
```

### CTA Section
Call-to-action section component.

**Base Class:**
- `.lcms-cta-section` - CTA section wrapper

**Elements:**
- `.lcms-cta-section__content` - Content container
- `.lcms-cta-section__heading` - CTA heading
- `.lcms-cta-section__text` - CTA text
- `.lcms-cta-section__actions` - Action buttons

**Color Modifiers:**
- `.lcms-cta-section--primary` - Primary brand color
- `.lcms-cta-section--secondary` - Secondary color
- `.lcms-cta-section--accent` - Accent color
- `.lcms-cta-section--dark` - Dark background
- `.lcms-cta-section--light` - Light background

**Size Modifiers:**
- `.lcms-cta-section--small` - Small CTA (reduced padding)
- `.lcms-cta-section--large` - Large CTA (increased padding)

**Alignment Modifiers:**
- `.lcms-cta-section--left` - Left-aligned content
- `.lcms-cta-section--right` - Right-aligned content

**Example:**
```html
<section class="lcms-cta-section lcms-cta-section--accent lcms-cta-section--large">
    <div class="lcms-cta-section__content">
        <h2 class="lcms-cta-section__heading">Ready to Get Started?</h2>
        <p class="lcms-cta-section__text">
            Join thousands of satisfied customers today.
        </p>
        <div class="lcms-cta-section__actions">
            <a href="#" class="lcms-button lcms-button--primary lcms-button--large">
                Start Free Trial
            </a>
        </div>
    </div>
</section>
```

---

## Content Renderers

These are specialized components used within the Pro-Sites system for dynamic content assembly.

### Stack
Vertical stacking of multiple content items.

**Base Class:**
- `.lcms-stack` - Stack wrapper

**Elements:**
- `.lcms-stack__item` - Individual stacked item

**Alignment Modifiers:**
- `.lcms-stack--align-left` - Left-aligned items
- `.lcms-stack--align-center` - Center-aligned items
- `.lcms-stack--align-right` - Right-aligned items

**Example:**
```html
<div class="lcms-stack lcms-stack--align-center" style="gap: 20px;">
    <div class="lcms-stack__item">
        <img src="logo.png" alt="Logo">
    </div>
    <div class="lcms-stack__item">
        <h3>Stacked Content</h3>
    </div>
    <div class="lcms-stack__item">
        <p>Description text</p>
    </div>
</div>
```

### Row
Horizontal layout of content items.

**Base Class:**
- `.lcms-row` - Row wrapper

**Elements:**
- `.lcms-row__item` - Individual row item

**Alignment Modifiers (vertical):**
- `.lcms-row--align-top` - Align items to top
- `.lcms-row--align-center` - Vertically center items
- `.lcms-row--align-bottom` - Align items to bottom

**Justification Modifiers (horizontal):**
- `.lcms-row--justify-start` - Justify to start
- `.lcms-row--justify-center` - Center justify
- `.lcms-row--justify-end` - Justify to end
- `.lcms-row--justify-space-between` - Space between items

**Example:**
```html
<div class="lcms-row lcms-row--align-center lcms-row--justify-space-between">
    <div class="lcms-row__item">
        <img src="icon1.png" alt="Icon 1">
    </div>
    <div class="lcms-row__item">
        <img src="icon2.png" alt="Icon 2">
    </div>
    <div class="lcms-row__item">
        <img src="icon3.png" alt="Icon 3">
    </div>
</div>
```

### Grid Layout
Content-specific grid for complex layouts.

**Base Class:**
- `.lcms-grid-layout` - Grid layout wrapper

**Elements:**
- `.lcms-grid-layout__item` - Grid item

**Example:**
```html
<div class="lcms-grid-layout" style="grid-template-columns: repeat(3, 1fr); gap: 30px;">
    <div class="lcms-grid-layout__item">Item 1</div>
    <div class="lcms-grid-layout__item">Item 2</div>
    <div class="lcms-grid-layout__item">Item 3</div>
</div>
```

### Heading
Standalone heading component with alignment.

**Base Class:**
- `.lcms-heading` - Heading wrapper

**Alignment Modifiers:**
- `.lcms-heading--align-left` - Left-aligned
- `.lcms-heading--align-center` - Center-aligned
- `.lcms-heading--align-right` - Right-aligned

**Example:**
```html
<h2 class="lcms-heading lcms-heading--align-center">
    Section Title
</h2>
```

### Grid Section
Grid-based section with item types.

**Base Class:**
- `.lcms-grid-section` - Grid section wrapper

**Elements:**
- `.lcms-grid-section__wrapper` - Grid container
- `.lcms-grid-section__item` - Grid item with type modifier
  - `.lcms-grid-section__item--text` - Text item
  - `.lcms-grid-section__item--image` - Image item
  - `.lcms-grid-section__item--video` - Video item
  - `.lcms-grid-section__item--html` - HTML item

**Example:**
```html
<div class="lcms-grid-section">
    <div class="lcms-grid-section__wrapper" style="grid-template-columns: 1fr 1fr; gap: 40px;">
        <div class="lcms-grid-section__item lcms-grid-section__item--text">
            <p>Text content</p>
        </div>
        <div class="lcms-grid-section__item lcms-grid-section__item--image">
            <img src="photo.jpg" alt="Photo">
        </div>
    </div>
</div>
```

---

## Quick Reference Table

| Component | Base Class | Common Modifiers |
|-----------|-----------|------------------|
| Container | `.lcms-container` | `--thin`, `--wide`, `--full` |
| Dark Mode | `.lcms-pro-sites--dark` | Use `dark_mode => true` parameter |
| Section Heading | `.lcms-section-heading` | `--align-center`, `--align-right` |
| Button | `.lcms-button` | `--primary`, `--secondary`, `--outline`, `--large` |
| Button Group | `.lcms-button-group` | `--align-center`, `--stacked` |
| Card | `.lcms-card` | `--elevated`, `--bordered`, `--interactive` |
| Grid | `.lcms-grid` | `--2col`, `--3col`, `--4col`, `--gap-large` |
| Column Layout | `.lcms-column-layout` | `--align-center`, `--gap-large` |
| Metric | `.lcms-metric` | `--large`, `--gradient`, `--interactive` |
| Progress | `.lcms-progress` | `--large`, `--rounded`, `--shadow` |
| Badge | `.lcms-badge` | `--success`, `--warning`, `--pill`, `--outline` |
| List | `.lcms-list` | `--icon`, `--numbered`, `--spacious` |
| Hero | `.lcms-hero` | `--primary`, `--large`, `--left` |
| CTA Section | `.lcms-cta-section` | `--accent`, `--large` |
| Stack | `.lcms-stack` | `--align-center` |
| Row | `.lcms-row` | `--align-center`, `--justify-space-between` |

---

## Usage Notes

### BEM Naming Convention

All classes follow the BEM (Block Element Modifier) methodology:

- **Block:** `.lcms-component-name`
- **Element:** `.lcms-component-name__element-name`
- **Modifier:** `.lcms-component-name--modifier-name`

### Combining Classes

Multiple modifiers can be combined on a single element:

```html
<div class="lcms-card lcms-card--elevated lcms-card--interactive lcms-card--spacious">
    <!-- Card content -->
</div>
```

### CSS Variables

Many components use CSS variables for theming. Common variables include:

- `--font-heading` - Heading font family
- `--font-body` - Body font family
- `--color-brand-primary` - Primary brand color
- `--color-brand-secondary` - Secondary brand color
- `--color-brand-accent` - Accent color
- `--doc-max-width` - Document max-width
- `--section-padding` - Section padding

### Responsive Design

Most components are mobile-first and responsive by default. Grid and column layouts automatically adapt to smaller screens.

---

## Version History

- **v2.0.6** - Added container_classes support, comprehensive documentation
- **v2.0.5** - Brand-guide and pro-sites content renderers BEM migration
- **v2.0.4** - Brand-guide grid migration
- **v2.0.3** - Container utility BEM migration
- **v2.0.0** - Initial BEM design system release

---

**For implementation examples and migration guides, see:**
- [BEM Migration Guide](bem-migration.md) - Detailed migration examples
- `templates/pages/proj/slug-project-overview.php` - Live implementation examples
