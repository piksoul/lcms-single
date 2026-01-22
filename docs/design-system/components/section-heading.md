# Section Heading

> Consistent heading structure with optional label, title, and subtitle for introducing content sections.

## Purpose

The Section Heading component provides a standardized way to introduce sections across all partials. It ensures visual consistency and hierarchy while remaining flexible enough for different content types and alignments.

## Anatomy

```html
<div class="lcms-section-heading">
    <span class="lcms-section-heading__label">Section Label</span>
    <h2 class="lcms-section-heading__title">Section Title</h2>
    <p class="lcms-section-heading__subtitle">Optional descriptive subtitle text</p>
</div>
```

**Parts:**
- `.lcms-section-heading` - Container for the heading group
- `.lcms-section-heading__label` - Small uppercase label/category (optional)
- `.lcms-section-heading__title` - Main heading (required)
- `.lcms-section-heading__subtitle` - Supporting description (optional)

## Variants (Modifiers)

### .lcms-section-heading--align-left
Left-aligned heading (default behavior).

```html
<div class="lcms-section-heading lcms-section-heading--align-left">
    <h2 class="lcms-section-heading__title">Left Aligned Title</h2>
</div>
```

### .lcms-section-heading--align-center
Center-aligned heading for featured or hero sections.

```html
<div class="lcms-section-heading lcms-section-heading--align-center">
    <span class="lcms-section-heading__label">Featured</span>
    <h2 class="lcms-section-heading__title">Centered Title</h2>
    <p class="lcms-section-heading__subtitle">Centered subtitle</p>
</div>
```

### .lcms-section-heading--align-right
Right-aligned heading.

```html
<div class="lcms-section-heading lcms-section-heading--align-right">
    <h2 class="lcms-section-heading__title">Right Aligned Title</h2>
</div>
```

### .lcms-section-heading--dark
For use on dark backgrounds.

```html
<section class="dark-background">
    <div class="lcms-section-heading lcms-section-heading--dark">
        <h2 class="lcms-section-heading__title">Title on Dark</h2>
    </div>
</section>
```

### Status States

Status modifiers for progress indicators:

```html
<!-- Completed status -->
<div class="lcms-section-heading lcms-section-heading--completed">
    <h3 class="lcms-section-heading__title">Completed Phase</h3>
</div>

<!-- In Progress status -->
<div class="lcms-section-heading lcms-section-heading--in-progress">
    <h3 class="lcms-section-heading__title">Current Phase</h3>
</div>

<!-- Upcoming status -->
<div class="lcms-section-heading lcms-section-heading--upcoming">
    <h3 class="lcms-section-heading__title">Future Phase</h3>
</div>
```

## States

- **Default:** Standard text color and spacing
- **Dark Mode:** Light text when using `--dark` modifier
- **Status:** Color-coded titles for progress tracking

## Accessibility

- **Semantic HTML:** Use appropriate heading levels (h2, h3, h4) based on document outline
- **ARIA:** No special ARIA needed if using proper heading hierarchy
- **Keyboard:** No interactive elements, fully accessible by default
- **Screen Readers:** Heading hierarchy must be logical (don't skip levels)

**Example:**
```html
<!-- Good: Proper hierarchy -->
<h1>Page Title</h1>
<div class="lcms-section-heading">
    <h2 class="lcms-section-heading__title">Section Title</h2>
</div>

<!-- Bad: Skipped h2 -->
<h1>Page Title</h1>
<div class="lcms-section-heading">
    <h3 class="lcms-section-heading__title">Section Title</h3>
</div>
```

## Theming

Partials can customize via CSS variables or direct overrides:

```css
/* In partials/brand-guide.css */
.brand-guide .lcms-section-heading__title {
    color: var(--color-brand-secondary);
    letter-spacing: 3px;
}

.brand-guide .lcms-section-heading__label {
    color: var(--color-brand-accent);
}

/* Or override CSS variables */
.pro-sites {
    --font-size-h2: 36px;
    --spacing-heading-bottom: 50px;
}
```

## Usage Guidelines

✓ **Do:**
- Use appropriate heading level (h2, h3, h4) for document structure
- Include label for categorization when helpful
- Keep titles concise (under 60 characters)
- Use subtitle to provide context without cluttering the title
- Use center alignment for hero/featured sections
- Use status modifiers for progress tracking

✗ **Don't:**
- Skip heading levels (h1 → h3)
- Put long paragraphs in the subtitle
- Nest headings inside each other
- Use multiple alignment modifiers simultaneously
- Use status modifiers on brand-guide sections (they're for pro-sites progress)

## Examples

### Basic Usage
```html
<div class="lcms-section-heading">
    <h2 class="lcms-section-heading__title">Our Services</h2>
</div>
```

### With Label and Subtitle
```html
<div class="lcms-section-heading lcms-section-heading--align-center">
    <span class="lcms-section-heading__label">Visual Identity</span>
    <h2 class="lcms-section-heading__title">Color Palette</h2>
    <p class="lcms-section-heading__subtitle">
        Our carefully selected colors represent our brand values and ensure consistency across all touchpoints.
    </p>
</div>
```

### In Brand Guide Context
```html
<section class="brand-guide">
    <div class="content-container">
        <div class="lcms-section-heading lcms-section-heading--align-center">
            <span class="lcms-section-heading__label">Brand Guidelines</span>
            <h2 class="lcms-section-heading__title">Typography System</h2>
            <p class="lcms-section-heading__subtitle">
                Consistent typography creates visual hierarchy and reinforces brand identity.
            </p>
        </div>

        <!-- Section content here -->
    </div>
</section>
```

### In Pro Sites Context (with status)
```html
<section class="pro-sites">
    <div class="content-container">
        <div class="lcms-section-heading lcms-section-heading--in-progress">
            <span class="lcms-section-heading__label">Phase 2</span>
            <h3 class="lcms-section-heading__title">Development</h3>
            <p class="lcms-section-heading__subtitle">
                Current phase: Building core features
            </p>
        </div>

        <!-- Progress content here -->
    </div>
</section>
```

### On Dark Background
```html
<section class="cta-section">
    <div class="content-container">
        <div class="lcms-section-heading lcms-section-heading--align-center lcms-section-heading--dark">
            <h2 class="lcms-section-heading__title">Ready to Get Started?</h2>
            <p class="lcms-section-heading__subtitle">
                Let's bring your vision to life
            </p>
        </div>

        <!-- CTA buttons -->
    </div>
</section>
```

## Related Components

- [Button Component](button.md) - Often follows section headings
- [Card Component](card.md) - May contain section headings
- [Hero Component](hero.md) - Uses similar heading structure

## Technical Details

**File Location:**
- CSS: `templates/assets/global/components/lcms-section-heading.css`
- Spec: `docs/components/section-heading.md`

**Used In:**
- brand-guide partial
- pro-sites partial
- All custom page templates

**Dependencies:**
- None (standalone component)

**CSS Variables:**
```css
--spacing-heading-bottom: 40px
--spacing-heading-bottom-mobile: 30px
--spacing-label-margin: 12px
--spacing-title-margin: 16px
--font-size-small: 14px
--font-size-h2: 42px
--font-size-h2-mobile: 32px
--font-size-h2-small: 28px
--font-size-large: 18px
--font-weight-semibold: 600
--font-weight-bold: 700
--letter-spacing-wide: 0.05em
--line-height-heading: 1.2
--line-height-body: 1.65
--color-brand-accent: #0066cc
--color-brand-primary: (client-specific)
--color-text-primary: #161617
--color-text-secondary: #666666
--color-text-tertiary: #999999
--color-text-light: rgba(255, 255, 255, 0.95)
--color-success: #4CAF50
```

## Change Log

- **v1.0.0** (2025-11-16): Initial BEM migration - consolidated `.section-heading`, `.heading-*`, and `.section-*` patterns into unified component
