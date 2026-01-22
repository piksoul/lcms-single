# Extending the BEM Framework

Guide for creating new components when existing library components don't meet the need.

## When to Extend

Only extend the BEM framework when:

1. **Component doesn't exist** in the library
2. **Guided patterns don't fit** the use case
3. **External design system integration** needed (Material Design, etc.)
4. **Truly novel UI pattern** required

## Decision Flow

```
Need a component
    ↓
Does it exist in library?
    YES → Use it (Tier 1)
    NO → Continue
        ↓
Does a guided pattern exist?
    YES → Build from pattern (Tier 2)
    NO → Continue
        ↓
Can I extend BEM framework?
    YES → Create following guidelines (Tier 3)
    NO → Ask user for guidance
```

## BEM Naming Convention

### Structure
```
.lcms-{block}                    # Block
.lcms-{block}__{element}         # Element
.lcms-{block}--{modifier}        # Modifier
```

### Examples

**Accordion Component:**
```css
.lcms-accordion                  /* Block */
.lcms-accordion__item            /* Element */
.lcms-accordion__header          /* Element */
.lcms-accordion__content         /* Element */
.lcms-accordion--expanded        /* Modifier */
```

**Chip/Tag Component:**
```css
.lcms-chip                       /* Block */
.lcms-chip__label                /* Element */
.lcms-chip__icon                 /* Element */
.lcms-chip--removable            /* Modifier */
.lcms-chip--selected             /* Modifier */
```

**Stepper Component:**
```css
.lcms-stepper                    /* Block */
.lcms-stepper__step              /* Element */
.lcms-stepper__label             /* Element */
.lcms-stepper__indicator         /* Element */
.lcms-stepper__step--active      /* Modifier */
.lcms-stepper__step--complete    /* Modifier */
```

## HTML Structure

### Template
```html
<div class="lcms-{block}">
  <div class="lcms-{block}__{element}">
    Content
  </div>
  <div class="lcms-{block}__{element} lcms-{block}__{element}--{modifier}">
    Modified content
  </div>
</div>
```

### Real Example: Tabs
```html
<div class="lcms-tabs">
  <div class="lcms-tabs__nav">
    <button class="lcms-tabs__tab lcms-tabs__tab--active">Tab 1</button>
    <button class="lcms-tabs__tab">Tab 2</button>
    <button class="lcms-tabs__tab">Tab 3</button>
  </div>
  <div class="lcms-tabs__content">
    <div class="lcms-tabs__panel lcms-tabs__panel--active">
      Panel 1 content
    </div>
    <div class="lcms-tabs__panel">
      Panel 2 content
    </div>
  </div>
</div>
```

## Material Design Integration

When using Material Design components, **wrap them in BEM containers**:

### Pattern
```html
<div class="lcms-{component}-material">
  <div class="mdc-{component}">
    <!-- Material Design component -->
  </div>
</div>
```

### Example: Material Card
```html
<div class="lcms-card-material">
  <div class="mdc-card">
    <div class="mdc-card__primary-action">
      <div class="mdc-card__media mdc-card__media--square">
        <div class="mdc-card__media-content">Title</div>
      </div>
    </div>
  </div>
</div>
```

### Example: Material Button in BEM Context
```html
<div class="lcms-action-group">
  <button class="mdc-button mdc-button--raised">
    <span class="mdc-button__ripple"></span>
    <span class="mdc-button__label">Click Me</span>
  </button>
</div>
```

## Component Documentation Template

When creating a new component, document it using this structure:

```json
{
  "meta": {
    "id": "component-id",
    "name": "Component Name",
    "category": "widget|section|pattern",
    "tier": 3,
    "status": "extended",
    "created": "2025-11-18"
  },

  "bem": {
    "block": "lcms-component",
    "modifiers": ["--modifier1", "--modifier2"],
    "elements": ["__element1", "__element2"]
  },

  "html_structure": "...",

  "placeholders": {},

  "ai_instructions": "When and how to use this component",

  "promotion_candidate": true
}
```

## Best Practices

### DO ✅
- Use `lcms-` prefix for all custom components
- Follow BEM naming strictly
- Document the component immediately
- Flag for library promotion
- Provide usage examples
- Keep HTML semantic
- Use existing utility classes (grid-Ncol, flex, etc.)

### DON'T ❌
- Create custom prefixes (stick with `lcms-`)
- Mix BEM with other methodologies
- Use ID selectors for styling
- Create deeply nested elements (max 2-3 levels)
- Duplicate existing components
- Skip documentation
- Use inline styles (extract to CSS)

## Validation Checklist

Before finalizing an extended component:

- [ ] BEM naming convention followed (`lcms-{block}__element--modifier`)
- [ ] Component documented with pattern.json
- [ ] HTML structure is semantic and accessible
- [ ] Placeholders clearly defined
- [ ] Usage examples provided
- [ ] Related components noted
- [ ] Flagged for library promotion
- [ ] No conflicts with existing components

## Promotion to Library

Extended components that prove useful should be promoted to the component library:

1. **Test the component** in real usage
2. **Refine documentation** based on usage
3. **Create README.md** with examples
4. **Add to appropriate category** (widgets/sections/patterns)
5. **Update composition rules** if needed
6. **Move from tier 3 to tier 1**

## Examples of Common Extensions

### Expandable Card
```html
<div class="lcms-card-expandable">
  <div class="lcms-card-expandable__header">
    <h3 class="lcms-card-expandable__title">{{TITLE}}</h3>
    <button class="lcms-card-expandable__toggle">Toggle</button>
  </div>
  <div class="lcms-card-expandable__content">
    {{CONTENT}}
  </div>
</div>
```

### Icon List
```html
<ul class="lcms-list lcms-list--icon">
  <li class="lcms-list__item">
    <span class="lcms-list__icon">✓</span>
    <span class="lcms-list__text">{{TEXT}}</span>
  </li>
</ul>
```

### Alert Box
```html
<div class="lcms-alert lcms-alert--{{TYPE}}">
  <div class="lcms-alert__icon">{{ICON}}</div>
  <div class="lcms-alert__content">
    <div class="lcms-alert__title">{{TITLE}}</div>
    <div class="lcms-alert__message">{{MESSAGE}}</div>
  </div>
</div>
```

## Questions?

When uncertain about extending:
1. Check component library again
2. Review guided patterns
3. Look for similar existing components
4. Ask: "Could this be a variant of an existing component?"
5. If still needed, extend with confidence following these guidelines
