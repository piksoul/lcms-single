# Button

> Interactive buttons with multiple style variants for actions and calls-to-action.

## Purpose

The Button component provides consistent, accessible interactive elements for user actions. It includes multiple visual styles, sizes, and behaviors to accommodate different use cases across all partials.

## Anatomy

```html
<!-- Single button -->
<a href="#" class="lcms-button lcms-button--primary">Click Me</a>

<!-- Button group -->
<div class="lcms-button-group">
    <a href="#" class="lcms-button lcms-button--primary">Primary Action</a>
    <a href="#" class="lcms-button lcms-button--secondary">Secondary Action</a>
</div>
```

**Parts:**
- `.lcms-button` - Base button element (required)
- `.lcms-button-group` - Container for multiple buttons (optional)

## Variants (Modifiers)

### Style Variants

#### .lcms-button--primary
Solid filled button for primary actions.

```html
<a href="#" class="lcms-button lcms-button--primary">Primary Action</a>
```

#### .lcms-button--secondary
Subtle button for secondary actions.

```html
<a href="#" class="lcms-button lcms-button--secondary">Secondary Action</a>
```

#### .lcms-button--outline
Outline/ghost button for tertiary actions.

```html
<a href="#" class="lcms-button lcms-button--outline">Outline Action</a>
```

#### .lcms-button--cta
Large, prominent call-to-action button with rounded corners.

```html
<a href="#" class="lcms-button lcms-button--cta">Get Started Now</a>
```

### Size Variants

#### .lcms-button--small
Compact button for tight spaces.

```html
<a href="#" class="lcms-button lcms-button--primary lcms-button--small">Small</a>
```

#### .lcms-button--large
Larger button for emphasis.

```html
<a href="#" class="lcms-button lcms-button--primary lcms-button--large">Large</a>
```

### Width Variants

#### .lcms-button--full-width
Button expands to fill container width.

```html
<a href="#" class="lcms-button lcms-button--primary lcms-button--full-width">Full Width</a>
```

### State Variants

#### .lcms-button--disabled
Visually disabled button (also honors `:disabled` pseudo-class).

```html
<button class="lcms-button lcms-button--primary lcms-button--disabled">Disabled</button>
<button class="lcms-button lcms-button--primary" disabled>Also Disabled</button>
```

## Button Group Variants

### Alignment

```html
<!-- Left aligned (default) -->
<div class="lcms-button-group lcms-button-group--align-left">
    <a href="#" class="lcms-button lcms-button--primary">Action 1</a>
    <a href="#" class="lcms-button lcms-button--secondary">Action 2</a>
</div>

<!-- Center aligned -->
<div class="lcms-button-group lcms-button-group--align-center">
    <a href="#" class="lcms-button lcms-button--primary">Action 1</a>
    <a href="#" class="lcms-button lcms-button--secondary">Action 2</a>
</div>

<!-- Right aligned -->
<div class="lcms-button-group lcms-button-group--align-right">
    <a href="#" class="lcms-button lcms-button--primary">Action 1</a>
    <a href="#" class="lcms-button lcms-button--secondary">Action 2</a>
</div>
```

### Layout

#### .lcms-button-group--stacked
Vertically stacked buttons (mobile-friendly).

```html
<div class="lcms-button-group lcms-button-group--stacked">
    <a href="#" class="lcms-button lcms-button--primary">First Action</a>
    <a href="#" class="lcms-button lcms-button--secondary">Second Action</a>
</div>
```

## States

- **Default:** Normal clickable state
- **Hover:** Elevation effect with color shift
- **Active:** Pressed state (browser default)
- **Focus:** Keyboard focus (browser default outline)
- **Disabled:** Non-interactive, reduced opacity

## Accessibility

- **Semantic HTML:** Use `<button>` for actions, `<a>` for navigation
- **ARIA:** Add `aria-disabled="true"` when using `.lcms-button--disabled` on links
- **Keyboard:** Fully keyboard accessible (Tab, Enter/Space to activate)
- **Focus:** Visible focus indicator (browser default)
- **Labels:** Button text must be descriptive ("Learn More" not "Click Here")

**Examples:**
```html
<!-- Good: Button for form submission -->
<button type="submit" class="lcms-button lcms-button--primary">Submit Form</button>

<!-- Good: Link for navigation -->
<a href="/contact" class="lcms-button lcms-button--primary">Contact Us</a>

<!-- Good: Disabled link with ARIA -->
<a href="#" class="lcms-button lcms-button--primary lcms-button--disabled" aria-disabled="true">
    Coming Soon
</a>

<!-- Bad: Generic label -->
<a href="#" class="lcms-button lcms-button--primary">Click Here</a>

<!-- Bad: Link with button behavior -->
<a href="#" class="lcms-button lcms-button--primary" onclick="doSomething()">Don't Do This</a>
```

## Theming

Partials can customize via CSS variables or direct overrides:

```css
/* In partials/brand-guide.css */
.brand-guide .lcms-button--primary {
    background: var(--color-brand-primary);
    border-radius: 4px; /* Square corners for brand */
}

/* Or override CSS variables */
.pro-sites {
    --button-padding: 14px 32px;
    --button-font-size: 15px;
    --button-gap: 20px;
}
```

## Usage Guidelines

✓ **Do:**
- Use primary buttons for the most important action
- Limit to one primary button per screen section
- Use descriptive, action-oriented labels ("Download Guide" not "Click Here")
- Use button groups to organize related actions
- Use appropriate semantic HTML (`<button>` vs `<a>`)
- Provide adequate spacing between buttons (handled by button-group)

✗ **Don't:**
- Use multiple primary buttons in close proximity
- Make buttons too small (< 44x44px touch target)
- Use buttons for navigation (use links styled as buttons)
- Stack too many buttons (max 3-4 in a group)
- Use vague labels ("Submit", "OK", "Yes")
- Mix button sizes in the same group

## Examples

### Basic Single Button
```html
<a href="/download" class="lcms-button lcms-button--primary">
    Download PDF
</a>
```

### Button Group (Horizontal)
```html
<div class="lcms-button-group lcms-button-group--align-center">
    <a href="/demo" class="lcms-button lcms-button--primary">Request Demo</a>
    <a href="/pricing" class="lcms-button lcms-button--outline">View Pricing</a>
</div>
```

### CTA Button (Hero Section)
```html
<section class="lcms-hero">
    <div class="content-container">
        <h1>Transform Your Business</h1>
        <p>Enterprise solutions that scale</p>

        <div class="lcms-button-group lcms-button-group--align-center">
            <a href="/signup" class="lcms-button lcms-button--cta">Get Started Free</a>
            <a href="/learn-more" class="lcms-button lcms-button--outline">Learn More</a>
        </div>
    </div>
</section>
```

### Form Buttons
```html
<form>
    <!-- Form fields here -->

    <div class="lcms-button-group">
        <button type="submit" class="lcms-button lcms-button--primary">
            Save Changes
        </button>
        <button type="button" class="lcms-button lcms-button--secondary">
            Cancel
        </button>
    </div>
</form>
```

### Dark Background Context
```html
<section class="lcms-cta-section">
    <div class="content-container">
        <h2>Ready to Get Started?</h2>

        <div class="lcms-button-group lcms-button-group--align-center">
            <a href="/signup" class="lcms-button lcms-button--primary">Sign Up Now</a>
            <a href="/contact" class="lcms-button lcms-button--outline">Contact Sales</a>
        </div>
    </div>
</section>
```

### Mobile-Optimized Stacked
```html
<div class="lcms-button-group lcms-button-group--stacked">
    <a href="/option-1" class="lcms-button lcms-button--primary">Primary Option</a>
    <a href="/option-2" class="lcms-button lcms-button--secondary">Alternative Option</a>
    <a href="/option-3" class="lcms-button lcms-button--outline">More Info</a>
</div>
```

### Download Buttons
```html
<div class="lcms-button-group lcms-button-group--align-center">
    <a href="/guide.pdf" download class="lcms-button lcms-button--primary">
        📥 Download Brand Guide (PDF)
    </a>
    <a href="/assets.zip" download class="lcms-button lcms-button--secondary">
        📦 Download Assets (ZIP)
    </a>
</div>
```

## Related Components

- [Section Heading](section-heading.md) - Often paired with button groups
- [Hero](hero.md) - Frequently contains CTA buttons
- [CTA Section](cta-section.md) - Designed for button-focused sections
- [Card](card.md) - May contain action buttons in footer

## Technical Details

**File Location:**
- CSS: `templates/assets/global/components/lcms-button.css`
- Spec: `docs/components/button.md`

**Used In:**
- All partials (universal component)
- Hero sections
- CTA sections
- Forms
- Cards

**Dependencies:**
- None (standalone component)

**CSS Variables:**
```css
--button-padding: 12px 28px
--button-padding-small: 8px 20px
--button-padding-large: 16px 40px
--button-padding-mobile: 10px 20px
--button-font-size: 16px
--button-font-size-small: 14px
--button-font-size-large: 18px
--button-font-size-mobile: 14px
--button-gap: 16px
--font-heading: (inherited)
--font-weight-semibold: 600
--border-radius: 8px
--transition-standard: all 0.3s ease
--color-brand-accent: #0066cc
--color-brand-accent-hover: #0052a3
--color-background-light: #f5f5f5
--color-background-medium: #e0e0e0
--color-text-primary: #161617
--color-text-light: #ffffff
```

## Change Log

- **v1.0.0** (2025-11-16): Initial BEM migration - consolidated `.button`, `.button-*`, `.cta-button`, and `.section-buttons` patterns
