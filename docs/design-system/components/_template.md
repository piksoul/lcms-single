# Component Name

> Brief one-line description of what this component does.

## Purpose

Detailed description of what this component does and when to use it.

## Anatomy

Visual breakdown of component structure:

```html
<div class="lcms-{component}">
    <div class="lcms-{component}__element">Element description</div>
    <div class="lcms-{component}__element">Element description</div>
</div>
```

**Parts:**
- `.lcms-{component}` - Container/block description
- `.lcms-{component}__element` - Element description
- `.lcms-{component}__element` - Element description

## Variants (Modifiers)

### .lcms-{component}--modifier-name
Description of what this modifier does and when to use it.

```html
<div class="lcms-{component} lcms-{component}--modifier-name">
    ...
</div>
```

### .lcms-{component}--another-modifier
Description of another modifier.

## States

- **Default:** Normal state description
- **Hover:** Hover state description (if applicable)
- **Active:** Active/focused state description (if applicable)
- **Disabled:** Disabled state description (if applicable)

## Accessibility

- **Semantic HTML:** Recommended HTML5 semantic elements to use
- **ARIA:** Required ARIA attributes (if any)
- **Keyboard:** Keyboard navigation patterns (if interactive)
- **Screen Readers:** Screen reader considerations

## Theming

How partials can customize this component:

```css
/* In partials/brand-guide.css or partials/pro-sites.css */
.brand-guide .lcms-{component} {
    /* Theming overrides */
    border-color: var(--color-brand-primary);
}

/* Or use CSS variables */
.pro-sites {
    --{component}-background: var(--color-brand-primary);
}
```

## Usage Guidelines

✓ **Do:**
- Good practice example 1
- Good practice example 2
- Good practice example 3

✗ **Don't:**
- Anti-pattern or bad practice 1
- Anti-pattern or bad practice 2
- Anti-pattern or bad practice 3

## Examples

### Basic Usage
```html
<!-- Simple, common use case -->
<div class="lcms-{component}">
    <div class="lcms-{component}__element">Content</div>
</div>
```

### With Variant
```html
<!-- Example with modifier -->
<div class="lcms-{component} lcms-{component}--variant">
    <div class="lcms-{component}__element">Content</div>
</div>
```

### In Context
```html
<!-- Real-world usage example within a partial -->
<section class="brand-guide">
    <div class="content-container">
        <div class="lcms-{component}">
            <div class="lcms-{component}__element">Real example</div>
        </div>
    </div>
</section>
```

## Related Components

- Link to related component 1
- Link to related component 2

## Technical Details

**File Location:**
- CSS: `templates/assets/global/components/lcms-{component}.css`
- Spec: `docs/components/{component}.md`

**Used In:**
- Partial name 1
- Partial name 2

**Dependencies:**
- Depends on: (list any other components this requires)

## Change Log

- **v1.0.0** (2025-MM-DD): Initial BEM migration
