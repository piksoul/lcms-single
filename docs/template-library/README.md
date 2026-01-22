# Template & Pattern Library

A comprehensive system for building brand-consistent page templates using reusable BEM components, pre-assembled recipes, and AI-guided composition.

## Overview

This library supports three types of content creation workflows:

1. **Type 1: Structured Content** - Use recipes (pre-defined page templates)
2. **Type 2: Supplied Content** - AI selects and arranges components
3. **Type 3: Creative Content** - AI composes pages with creative freedom

## Architecture

```
docs/template-library/
├── components/          # Reusable BEM building blocks
│   ├── layout/         # Layout containers (grid, column)
│   ├── widgets/        # Small UI elements (badge, progress-bar, metric-card)
│   ├── sections/       # Page sections (hero, cta, footer)
│   └── patterns/       # Complex patterns (metrics-grid, timeline)
│
├── recipes/            # Pre-assembled page templates
│   ├── project-idea.json
│   └── landing-page.json
│
└── composition/        # AI composition guidelines
    ├── rules.json
    └── extending-bem.md
```

## Three-Tier System

### Tier 1: Use Pre-built Components (Highest Quality)
**When:** Component exists in library
**Process:** Use exactly as documented, fill placeholders
**Quality:** Highest - BEM-compliant, brand-consistent
**Example:** progress-bar-large, badge, metric-card

### Tier 2: Guided Construction (Medium Quality)
**When:** No exact match, but guided pattern exists
**Process:** Build using documented patterns and rules
**Quality:** Medium - AI follows guidelines
**Example:** Custom badge layout, unique metric display

### Tier 3: Extend Framework (Supervised Quality)
**When:** Truly novel component needed
**Process:** Create new component following BEM conventions
**Quality:** Variable - Requires review
**Example:** New accordion, custom tabs, Material Design integration

## Content Type Workflows

### Type 1: Well-Structured Content

**Use Case:** Project documentation, standardized pages

**Process:**
1. Load recipe (e.g., `recipes/project-idea.json`)
2. Provide structured data
3. AI fills placeholders
4. PHP template generated

**Example:**
```json
// Input
{
  "PROJECT_NAME": "Break Move Guy",
  "PROJECT_STATUS": "Planning Phase",
  "COMPLETION_PCT": 65,
  "METRICS": [...]
}

// Recipe defines exact sequence
// Output: PHP template with proper partial() calls
```

### Type 2: Supplied Content with Directions

**Use Case:** Marketing collateral refresh, content enhancement

**Process:**
1. Analyze supplied content
2. AI selects matching components
3. Arrange in logical flow
4. Generate PHP template

**Example:**
```
Input: "Here's our About page content, make it modern"

AI analyzes:
- Intro paragraph → text-hero
- Team info → team-grid
- Values list → icon-list
- Contact CTA → cta-section

Output: PHP template with selected components
```

### Type 3: Creative Content from Scratch

**Use Case:** Landing pages, campaign pages, creative briefs

**Process:**
1. Interpret creative brief
2. Select components from library
3. Compose within composition rules
4. Generate PHP template

**Example:**
```
Input: "Create landing page for sustainable packaging campaign"

AI composes:
- hero-with-badge (hook)
- benefit-cards (features)
- testimonial-slider (social proof)
- cta-with-buttons (conversion)

Output: PHP template following composition rules
```

## Component Categories

### Widgets (`components/widgets/`)
Small, reusable UI elements

- **badge** - Status labels and tags
- **progress-bar-large** - Progress indicators
- **metric-card** - Single metric display
- **button-group** - Action buttons
- **list-variants** - Various list styles

### Sections (`components/sections/`)
Full-width page sections

- **hero-with-badge** - Page opening with title and badge
- **cta-with-buttons** - Call-to-action section
- **footer-info** - Page footer information

### Patterns (`components/patterns/`)
Complex composite patterns

- **metrics-grid-4col** - 4-column metrics display
- **next-steps-timeline** - 3-phase roadmap
- **project-summary-card** - Project status overview
- **feature-showcase** - Image-text alternating layouts
- **numbered-timeline** - Sequential process steps (horizontal & vertical) ⭐ NEW
- **faq-list** - Simple FAQ sections (SEO-optimized) ⭐ NEW

## Implementation: PHP Partials

The component library integrates with existing PHP partials in `templates/pages/_partials/pro-sites/` for actual implementation.

### Available Layout Partials

#### `column.php` (Single Column)
**Use:** Single-column sections with flexible content
**Namespace:** `pro-sites`
```php
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => ['heading' => [...]],
    'content' => ['type' => 'html', 'html' => '...'],
], 'pro-sites');
```

#### `2-column-section.php` (Two Column Layout)
**Use:** Two-column layouts with asymmetric widths, image-text combos
**Namespace:** `pro-sites`
**Documentation:** `docs/template-library/partials/2-column-section.md`

```php
partial('2-column-section', [
    'content' => [
        'columns' => [
            ['type' => 'image', 'content' => [...], 'width' => '50%'],
            ['type' => 'text', 'content' => [...], 'width' => '50%'],
        ],
        'gap' => '60px',
    ],
], 'pro-sites');
```

**Supports 10 content types:** text, image, video, html, buttons, card, grid, heading, row, stack

**Width formats:**
- Percentages: `'60%'`, `'40%'` (asymmetric splits)
- Fractional: `'2fr'`, `'1fr'` (proportional)
- Pixels: `'300px'` (fixed sidebar)

#### `grid-section.php` (Multi-Column Grid)
**Use:** 3+ column grids, card layouts, equal-width items
**Namespace:** `pro-sites`

#### `page-header` (Hero Section)
**Use:** Page opening sections with title, subtitle, badge
**Namespace:** `top-section`

### Content Type Renderers

Location: `templates/pages/_partials/pro-sites/_lib/content/`

These renderers work with the layout partials above:

| Renderer | BEM Component | Use Case |
|----------|---------------|----------|
| `image.php` | `.lcms-image` | Images with captions, lazy loading |
| `video.php` | `.lcms-video` | YouTube, Vimeo, HTML5 video embeds |
| `text.php` | Plain text | Simple paragraphs |
| `html.php` | Custom | Complex BEM compositions, patterns |
| `buttons.php` | `.lcms-button-group` | CTA button groups |
| `card.php` | `.lcms-card` | Single card component |
| `grid.php` | Grid layout | Multi-item grids |
| `heading.php` | `.lcms-section-heading` | Standalone headings |
| `row.php` | `.lcms-content-row` | Horizontal content |
| `stack.php` | `.lcms-content-stack` | Vertical content stacks |

### Image Content Type

```php
'type' => 'image',
'content' => [
    'src'     => 'https://example.com/image.jpg',
    'alt'     => 'Descriptive alt text',
    'caption' => 'Optional caption',
    'lazy'    => true,  // Lazy loading (default: true)
]
```

**Output:** `<figure class="lcms-image">` with proper accessibility

### Video Content Type

```php
'type' => 'video',
'content' => [
    'type'     => 'youtube',  // youtube|vimeo|html5
    'src'      => 'VIDEO_ID',
    'autoplay' => false,
    'controls' => true,
]
```

**Output:** `.lcms-video` with responsive embed

### HTML Content Type (For Patterns)

```php
'type' => 'html',
'content' => [
    'html' => '<div class="lcms-feature-block">...</div>',
]
```

**Use cases:**
- Feature showcase patterns
- Custom BEM compositions
- Complex layouts not covered by simple types

### Integration Example: Feature Showcase Pattern

Using `2-column-section.php` + `html` content type:

```php
partial('2-column-section', [
    'settings' => ['dark_mode' => false],
    'content' => [
        'columns' => [
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                    'alt' => 'Dashboard interface',
                    'caption' => 'Centralized management',
                ],
                'width' => '50%',
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-stack gap-16">
                            <h3>Feature Title</h3>
                            <p class="lcms-text--large">Description</p>
                            <ul class="lcms-list lcms-list--check">
                                <li class="lcms-list__item">Benefit 1</li>
                                <li class="lcms-list__item">Benefit 2</li>
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

This implements the **feature-showcase pattern** using existing infrastructure.

## Using Recipes

Recipes are pre-defined page templates with fixed component sequences.

### Loading a Recipe
```json
{
  "recipe": "project-idea",
  "data": {
    "PROJECT_NAME": "Your Project",
    "PROJECT_STATUS": "Planning Phase",
    ...
  }
}
```

### Recipe Structure
```json
{
  "meta": { "id": "project-idea-page", ... },
  "sequence": [
    { "order": 1, "component": "hero-with-badge", ... },
    { "order": 2, "component": "project-summary-card", ... },
    ...
  ],
  "required_data": { ... },
  "validation_rules": { ... }
}
```

## Using Components Directly

### Component Definition
Each component has a `pattern.json`:

```json
{
  "meta": { "id": "badge", ... },
  "bem": { "block": "lcms-badge", ... },
  "html_structure": "<span class=\"lcms-badge lcms-badge--{{MODIFIER}}\">{{TEXT}}</span>",
  "placeholders": { ... },
  "ai_instructions": "..."
}
```

### PHP Output
```php
partial('page-header', [
    'pre_html' => '<span class="lcms-badge lcms-badge--warning">Planning Phase</span>',
    'title' => 'Project Name',
], 'top-section');
```

## Composition Rules

When AI needs creative freedom (Type 3 content):

### Universal Rules
- ✅ Every page starts with hero/header
- ✅ Every page includes at least one CTA
- ✅ Use only library components (or extend properly)
- ❌ No custom non-BEM HTML
- ❌ No more than 2 consecutive text sections

### Visual Rhythm
- Alternate content density: heavy → light → medium → light
- Alternate dark/light sections
- Add visual breaks after text-heavy sections

### Component Selection
```
Quantitative data → metric-card, metrics-grid
Sequential steps → timeline, stepper
Lists/features → list pattern with modifiers
CTA/conversion → cta-with-buttons
General text → column partial with text
```

## BEM Framework Extension

When you need a component that doesn't exist:

### Naming Convention
```
.lcms-{block}                    # Block
.lcms-{block}__{element}         # Element
.lcms-{block}--{modifier}        # Modifier
```

### Example
```html
<div class="lcms-accordion">
  <div class="lcms-accordion__item">
    <button class="lcms-accordion__header">Question?</button>
    <div class="lcms-accordion__content">Answer</div>
  </div>
</div>
```

See `composition/extending-bem.md` for full guidelines.

## Material Design Integration

Material Design components can be used, wrapped in BEM:

```html
<div class="lcms-card-material">
  <div class="mdc-card">
    <!-- Material component -->
  </div>
</div>
```

Allowed prefixes: `lcms-`, `mdc-`, `grid-`, `flex`

## AI Instructions Summary

### For Recipes (Type 1)
```
1. Load recipe JSON
2. Validate required data present
3. Generate each section in sequence
4. Fill all placeholders
5. Output PHP with proper partial() calls
```

### For Component Selection (Type 2)
```
1. Analyze supplied content structure
2. Select matching components from library
3. Arrange in logical flow
4. Follow composition rules
5. Generate PHP template
```

### For Creative Composition (Type 3)
```
1. Interpret creative brief
2. Select components from catalog
3. Compose within rules (hero + CTA required)
4. Validate against composition rules
5. Generate PHP template
```

## File Structure Examples

### Component
```
components/widgets/badge/
├── pattern.json      # Machine-readable definition
└── README.md        # Human-readable documentation
```

### Recipe
```
recipes/
└── project-idea.json  # Pre-defined page template
```

## Validation

All generated templates are validated for:

- ✅ BEM class naming conventions
- ✅ Required placeholders filled
- ✅ WordPress security (ABSPATH check, escaping)
- ✅ Proper partial namespace usage
- ✅ Component library compliance

## Getting Started

### 1. Explore Components
Browse `components/` to see available building blocks:
- Start with `widgets/` for small elements
- Check `sections/` for page sections
- Review `patterns/` for complex layouts

### 2. Check Recipes
Look at `recipes/` for pre-built page templates:
- `project-idea.json` - Project documentation pages

### 3. Review Guidelines
Read `composition/` for AI guidance:
- `rules.json` - Composition constraints
- `extending-bem.md` - Creating new components

## Examples

### Example 1: Using a Recipe
```
Workflow: Type 1 (Structured)
Input: Project data JSON
Recipe: project-idea.json
Output: Complete PHP template
```

### Example 2: Refreshing Content
```
Workflow: Type 2 (Supplied)
Input: Existing About page content
Process: AI selects components
Output: Modernized PHP template
```

### Example 3: Creative Landing Page
```
Workflow: Type 3 (Creative)
Input: "Landing page for eco packaging"
Process: AI composes with rules
Output: Custom PHP template
```

## Best Practices

### Component Preference
1. **Try pre-built first** - Check if component exists
2. **Use guided patterns second** - Follow documented patterns
3. **Extend only when necessary** - Create new components as last resort

### Quality Assurance
- Use recipes for maximum consistency (Type 1)
- Allow AI selection for flexibility (Type 2)
- Enable composition for creativity (Type 3)
- Always validate against BEM standards

### Documentation
- Component used frequently? Promote to library
- New pattern emerging? Document as guided pattern
- Novel UI needed? Extend BEM framework properly

## Related Documentation

- **WordPress Patterns:** `docs/patterns/README.md`
- **Project Directives:** `docs/start-here.md`
- **Component Library:** Browse `components/`

---

**Version:** 1.0
**Last Updated:** 2025-11-18
**Maintained By:** Piksoul
