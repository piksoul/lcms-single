# Template Library Page Builder

**Version:** 1.0.0
**Type:** Project Skill
**Scope:** LeanCMS Template Library System (AI-Driven Page Generation)

## Description

An AI-assisted page builder that uses the LeanCMS Template Library system to generate complete, brand-consistent page templates. Supports three content workflows: recipe-based (structured), component-selection (supplied content), and creative composition (from scratch).

## Trigger Patterns

This skill activates when the user requests **complete page generation**:

- "Create a landing page for [topic/product]"
- "Build a [page-type] page about [subject]"
- "Generate a page for [use case]"
- "I need a landing page with [features]"
- "Create a resources page for [content]"
- "Build a project documentation page"

## Core Workflow

### 1. Identify Content Type

Ask the user (or infer from context) which content workflow to use:

**Type 1: Structured Content (Recipe-Based)**
- User has structured data (e.g., project documentation)
- Use pre-defined recipes from `docs/template-library/recipes/`
- Fixed component sequence
- Highest consistency

**Type 2: Supplied Content (Component Selection)**
- User provides existing content or materials
- AI selects and arranges components from library
- Logical flow based on content structure
- Medium flexibility

**Type 3: Creative Content (Composition)**
- User provides creative brief or topic
- AI composes page from component catalog
- Follows composition rules and guidelines
- Maximum creativity

### 2. Execute Workflow

#### For Type 1 (Recipe-Based):
1. Load appropriate recipe JSON from `docs/template-library/recipes/`
   - `project-idea.json` - Project documentation pages
   - `landing-page.json` - Product/service landing pages
   - `resources-page.json` - Content hubs and documentation
2. Request required data from user (or extract from context)
3. Generate sections in recipe sequence
4. Fill all placeholders with provided data
5. Output complete PHP template file

#### For Type 2 (Component Selection):
1. Analyze supplied content structure
2. Browse component library: `docs/template-library/components/`
   - Widgets: badge, progress-bar, metric-card, list-variants
   - Sections: hero, CTA, footer
   - Patterns: metrics-grid, timeline, feature-showcase
3. Select matching components for content
4. Arrange in logical flow (hero → content → CTA)
5. Generate PHP template with selected components

#### For Type 3 (Creative Composition):
1. Interpret creative brief/topic
2. Select components from catalog
3. **Apply composition rules** from `docs/template-library/composition/rules.json`:
   - Every page starts with hero
   - Every page includes at least one CTA
   - No more than 2 consecutive text sections
   - Alternate dark/light backgrounds
   - Follow visual rhythm guidelines
4. Generate PHP template with composed layout
5. Validate against composition constraints

### 3. Generate PHP Template

Produce production-ready PHP template using **Pro-Sites partials**:

**Implementation Details:**
- Use `partial()` function with proper namespaces
- Reference `docs/template-library/partials/2-column-section.md` for layouts
- Use content types from `docs/partials/pro-sites.md`:
  - `image` - Images with captions, lazy loading
  - `video` - YouTube, Vimeo, HTML5 embeds
  - `html` - Custom BEM compositions
  - `text`, `buttons`, `card`, `grid`, `heading`, `row`, `stack`
- Apply BEM classes from `docs/design-system/bem-guide.md`
- Include WordPress security (ABSPATH check, escaping)

**Template Structure:**
```php
<?php
/**
 * Page Title
 *
 * Generated using Template Library (Type X workflow)
 * Recipe/Pattern: [name]
 */

defined('ABSPATH') || exit;

// Section 1: Hero
partial('page-header', [...], 'top-section');

// Section 2: Content
partial('column', [...], 'pro-sites');

// Section 3: CTA
partial('column', [...], 'pro-sites');
```

### 4. Validate & Refine

**Check against standards:**
- ✅ BEM class naming (prefix: `lcms-`)
- ✅ WordPress security (ABSPATH, escaping)
- ✅ Required placeholders filled
- ✅ Composition rules followed (if Type 3)
- ✅ Proper partial namespace usage

**Offer improvements:**
- Suggest missing CTAs
- Recommend visual rhythm adjustments
- Propose dark/light alternation
- Identify opportunities for existing patterns

### 5. Iterate

Allow user to:
- Adjust sections (add/remove/reorder)
- Change component choices
- Switch between light/dark modes
- Request alternative patterns
- Generate variations

## Documentation References

**Primary References (in order of importance):**

1. **Template Library System:**
   - `docs/template-library/README.md` - System overview and workflows
   - `docs/template-library/recipes/` - Pre-built page recipes
   - `docs/template-library/components/` - Component catalog
   - `docs/template-library/composition/rules.json` - Composition constraints

2. **Partial Implementation:**
   - `docs/template-library/partials/2-column-section.md` - 2-column layout guide
   - `docs/partials/pro-sites.md` - Complete partial system reference
   - `docs/partials/quick-reference.md` - Copy-paste examples

3. **Design System:**
   - `docs/design-system/bem-guide.md` - BEM class reference
   - `docs/design-system/components/` - CSS component docs

## Component Catalog Quick Reference

**Widgets** (`components/widgets/`):
- `badge` - Status labels (primary, success, warning, info, danger)
- `progress-bar-large` - Progress indicators with percentages
- `metric-card` - Single metric display (label, value, description)
- `list-variants` - List modifiers (check, todo, arrow, spacious, 3col)

**Sections** (`components/sections/`):
- `hero-with-badge` - Page header with optional badge, title, subtitle
- `cta-with-buttons` - Conversion-focused CTA section
- `footer-info` - Simple page footer with metadata

**Patterns** (`components/patterns/`):
- `metrics-grid-4col` - 4-column metrics in dark mode
- `next-steps-timeline` - 3-phase roadmap (immediate, short-term, long-term)
- `project-summary-card` - Project status overview
- `feature-showcase` - Image-text alternating layouts (NEW)

## Recipes Available

**project-idea.json** - Project documentation pages
- 8 sections from hero to footer
- Includes: summary, idea statement, metrics, timeline, CTA
- Content type: Type 1 (Well-structured)

**landing-page.json** - Product/service landing pages
- 10 sections with conversion optimization
- Includes: summary, value props, target audience, metrics, benefits, social proof, timeline, CTA
- Content type: Type 1 or 3 (Structured or Creative)

**resources-page.json** - Documentation and resource hubs
- Repeatable category sections
- Supports: downloads, quick links, FAQ
- Content type: Type 2 (Supplied content)

## Partial Integration

**Layout Partials:**
- `column` (namespace: `pro-sites`) - Single column flexible content
- `2-column-section` (namespace: `pro-sites`) - Two-column layouts (10 content types)
- `grid-section` (namespace: `pro-sites`) - Multi-column grids
- `page-header` (namespace: `top-section`) - Hero sections

**Content Types Supported:**
| Type | Renderer | Use Case |
|------|----------|----------|
| `image` | `.lcms-image` | Images with captions, lazy loading |
| `video` | `.lcms-video` | YouTube, Vimeo, HTML5 embeds |
| `html` | Custom | BEM compositions, patterns |
| `text` | Plain text | Simple paragraphs |
| `buttons` | `.lcms-button-group` | CTA buttons |
| `card` | `.lcms-card` | Card components |
| `grid` | Grid layout | Multi-item grids |
| `heading` | `.lcms-section-heading` | Headings |
| `row` | `.lcms-content-row` | Horizontal content |
| `stack` | `.lcms-content-stack` | Vertical stacks |

## Example Interaction

**User:** "Create a landing page for our new Brand Hub product"

**Skill Response:**
```
I'll create a landing page using the Template Library system.

Content Type: Type 3 (Creative Composition)
Recipe: landing-page.json (as reference)

Sections planned:
1. Hero - Badge: "New Product" + Title + Subtitle
2. Summary - Overview paragraph with key value proposition
3. Value Props - 3-column feature cards
4. Feature Showcase - Image-text alternating (3 features)
5. Metrics Grid - 4 key statistics
6. Benefits - 6-card grid with icons
7. CTA - Primary conversion section
8. Footer - Last updated info

Generating PHP template...
```

## Best Practices

**Always:**
- ✅ Start with hero section (required by composition rules)
- ✅ End with CTA (required by composition rules)
- ✅ Use BEM classes from design system
- ✅ Alternate dark/light sections for visual rhythm
- ✅ Include proper WordPress security (ABSPATH, escaping)
- ✅ Use partial system (never raw HTML in page files)

**Consider:**
- Image content type for figures (not manual HTML)
- 2-column partial for image-text layouts
- Feature-showcase pattern for product highlights
- Metrics-grid pattern for statistics
- Timeline pattern for sequential steps

**Avoid:**
- ❌ More than 2 consecutive text sections (breaks visual rhythm)
- ❌ Custom non-BEM HTML (use library components)
- ❌ Skipping hero or CTA sections
- ❌ Inconsistent dark/light alternation
- ❌ Manual HTML when content types available

## Quality Metrics

Based on testing, this system achieves:
- **90-95% quality** for text-only pages
- **93-95% quality** for image-rich pages
- **100% BEM compliance** when following guidelines
- **Proper accessibility** (alt text, captions, semantic HTML)

## Advanced Features

**Pattern Promotion:**
- If AI creates effective ad-hoc compositions, suggest promoting to formal patterns
- Document in `docs/template-library/components/patterns/`

**Recipe Extension:**
- Users can create custom recipes for repeated page types
- Add to `docs/template-library/recipes/`

**Component Creation:**
- When library doesn't meet needs, follow BEM extension guidelines
- Reference: `docs/template-library/composition/extending-bem.md`

## Related Skills

**Pro-Sites Builder** - For section-level configuration help
- Use when: Need help with specific partial configuration
- Complementary: Template Library Builder handles pages, Pro-Sites Builder handles sections

## Support

For questions about the template library system:
1. Check `docs/template-library/README.md` for system overview
2. Browse component catalog in `docs/template-library/components/`
3. Review recipes in `docs/template-library/recipes/`
4. Reference composition rules in `docs/template-library/composition/`

---

**Version History:**
- 1.0.0 (2025-11-18) - Initial release with Type 1/2/3 workflows, recipes, and component catalog
