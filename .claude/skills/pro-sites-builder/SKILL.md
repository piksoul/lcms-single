# Pro-Sites Layout Builder

**Version:** 2.1.0
**Type:** Project Skill
**Scope:** LeanCMS Pro-Sites Partial System (Section-Level Configuration)

## Description

An AI-assisted layout builder for creating pro-sites partial configurations. Analyzes content descriptions, suggests optimal layouts, and generates complete PHP configuration arrays with BEM-compliant classes and proper schema validation.

## Trigger Patterns

This skill activates when the user mentions creating a **pro-sites layout**:

- "I need to create a pro-sites layout for [description]"
- "Build a pro-sites layout with [content description]"
- "Generate pro-sites config for [use case]"
- "Help me with a pro-sites layout"

## Core Workflow

### 1. Analyze Description
Parse the user's content description to understand:
- Content structure and hierarchy
- Number of sections/items needed
- Layout requirements (columns, grids, stacks)
- Content types involved (text, images, cards, etc.)

### 2. Suggest Layouts
Based on analysis, recommend:
- Best partial type (column, 2-column, grid)
- Content type combinations
- Nesting strategies for complex layouts
- Responsive considerations
- Appropriate BEM components and utility classes

### 3. Generate Configuration
Produce clean PHP array configuration:
- Properly formatted and indented
- Include inline comments for complex sections
- Validate against schema
- Use BEM-compliant classes from design system
- Suggest improvements and best practices

### 4. Iterate & Refine
Allow user to:
- Adjust settings
- Add/remove sections
- Request schema lookups
- Generate complete page templates

## Documentation References

**Primary References:**
- `docs/partials/quick-reference.md` - Copy-paste examples and parameter tables
- `docs/partials/pro-sites.md` - Comprehensive partial system documentation
- `docs/design-system/bem-guide.md` - BEM component reference

**Template Library Integration:**
- `docs/template-library/partials/2-column-section.md` - Detailed 2-column partial guide
- `docs/template-library/components/patterns/` - Pre-built pattern examples

**Quick Access:**
- All examples include complete parameter documentation
- Custom classes (custom_classes, custom_id, custom_css) supported on all items
- Utility classes replace inline styles where possible

## Pro-Sites System Reference

### Available Partials

**Location:** `templates/pages/_partials/pro-sites/`

| Partial | Use Case | Key Config |
|---------|----------|------------|
| `column` | Single-column sections with any content type | `settings`, `header`, `content`, `footer` |
| `2-column` | Side-by-side layouts with width control | `columns[]`, `gap`, `reverse` |
| `grid` | Multi-item responsive grids | `items[]`, `columns`, `min-width`, `gap` |

### Available Content Types

**Location:** `templates/pages/_partials/pro-sites/_lib/content/`

| Type | Purpose | Required Properties | Custom Support |
|------|---------|---------------------|----------------|
| `text` | Text content with formatting | `text`, `format` | N/A |
| `html` | Raw HTML content | `html` | N/A |
| `image` | Images with captions | `src`, `alt` | N/A |
| `video` | Video embeds | `type`, `src` | N/A |
| `heading` | Standalone headings | `text`, `size` | N/A |
| `buttons` | Button groups | `buttons[]` | N/A |
| `stack` | Vertical content composition | `items[]`, `gap` | ✅ `custom_classes`, `custom_id`, `custom_css` on items |
| `row` | Horizontal content composition | `items[]`, `gap` | ✅ `custom_classes`, `custom_id`, `custom_css` on items |
| `grid` | Nested grid layouts | `items[]`, `columns` | ✅ `custom_classes`, `custom_id`, `custom_css` on items |

## Instructions

When the user requests a pro-sites layout:

### Step 1: Understand the Request
Ask clarifying questions ONLY if the description is too vague:
- What's the primary purpose of this section?
- What content needs to be displayed?
- Any specific styling or layout requirements?

If the description is clear, proceed directly to analysis.

### Step 2: Analyze & Recommend
Think through:
1. What partial(s) best fit this use case?
2. What content types are needed?
3. Should content be nested (stack/row/grid within columns)?
4. What's the optimal responsive behavior?
5. What BEM components apply (cards, badges, progress bars, etc.)?

Present your recommendation with reasoning:
```
Based on your description, I recommend:
- Partial: column section with stack content
- Stack items: Use custom_classes to apply .lcms-card
- Components: .lcms-badge for status, .lcms-progress for completion

This layout provides [explain benefits]
```

### Step 3: Generate Configuration
Create complete PHP configuration following these rules:

**Code Quality:**
- Use proper array syntax and indentation
- Include inline comments for complex sections
- Escape strings properly
- Add helpful notes about optional parameters

**Schema Compliance:**
- Validate all required properties are present
- Use correct property types
- Follow established patterns from existing templates
- Reference schema files in `schemas/` directory

**BEM & Styling Best Practices:**
- **ALWAYS use BEM component classes** from design system (see docs/bem-guide.md)
- **Use custom_classes parameter** instead of wrapping divs for cleaner markup
- **Prioritize utility classes over inline styles**
- Only use inline styles for dynamic values (widths, progress bars, etc.)

**BEM Components (use via custom_classes):**
- `.lcms-card` - Card containers
- `.lcms-card--bordered` / `.lcms-card--compact` - Card modifiers
- `.lcms-badge` - Status badges
- `.lcms-badge--warning` / `.lcms-badge--secondary` / `.lcms-badge--danger` - Badge variants
- `.lcms-progress` / `.lcms-progress--large` - Progress bars
- `.lcms-metric` / `.lcms-metric--transparent` - Metric displays
- `.lcms-list` / `.lcms-list--check` / `.lcms-list--todo` / `.lcms-list--arrow` - List types

**Utility Classes:**
- Flexbox: `.flex`, `.flex-column`, `.justify-space-between`, `.align-flex-start`, `.align-center`
- Grid: `.grid-2col`, `.grid-3col`, `.grid-4col`
- Gap: `.gap-8`, `.gap-16`, `.gap-24`, `.gap-32`
- Spacing: `.mb-8`, `.mb-12`, `.mb-16`, `.mb-24`, `.mt-24`, `.mt-32`
- Text: `.text-center`, `.text-lead`, `.text-muted`

**Layout Recommendations:**
- Suggest appropriate gap sizes (16px, 20px, 24px, 30px)
- Recommend mobile-friendly width ratios
- Include accessibility considerations (alt text, semantic HTML)
- Note performance optimizations (lazy loading)

### Step 4: Present Output
Format the generated code clearly:
```php
// [Brief description of what this section does]
partial('column', [
    'settings' => [
        'dark_mode' => false,
        // ... with inline comments
    ],
    'header' => [
        'heading' => [
            'title' => 'Section Title',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'stack',
        'items' => [
            [
                'type' => 'html',
                'custom_classes' => 'lcms-card',    // BEM component
                'content' => ['html' => '...'],
            ],
        ],
        'gap' => '20px',
    ],
], 'pro-sites');
```

Then ask:
- "Would you like to adjust any settings?"
- "Need to add another section?"
- "Want me to explain any part of this config?"

### Step 5: Schema Lookups
If user asks for schema details:
- Reference the appropriate JSON file in `schemas/`
- Show property definitions and types
- Provide usage examples
- Link to related content types

## Schema Files

Load and reference these schema files for validation:

- `schemas/partials.json` - Column, 2-column, grid partial specs
- `schemas/content-types.json` - All content renderer specs
- `schemas/examples.json` - Common patterns and templates

## Common Patterns

### Pattern: Hero Section
```php
'content' => [
    'type' => 'stack',
    'items' => [
        ['type' => 'heading', 'content' => ['text' => 'Welcome', 'size' => 'h1']],
        ['type' => 'text', 'content' => ['text' => '<p>Description</p>', 'format' => 'lead']],
        ['type' => 'buttons', 'content' => ['buttons' => [...]]]
    ],
    'gap' => '30px',
    'align' => 'center'
]
```

### Pattern: Card Grid with BEM
```php
'content' => [
    'type' => 'grid',
    'items' => [
        [
            'type' => 'html',
            'custom_classes' => 'lcms-card',
            'content' => ['html' => '<h3>Feature</h3><p>Description</p>'],
        ],
        // More cards...
    ],
    'columns' => 3,
    'gap' => '30px'
]
```

### Pattern: Progress Tracker with Badges
```php
'content' => [
    'type' => 'stack',
    'items' => [
        [
            'type' => 'html',
            'custom_classes' => 'lcms-card',
            'content' => [
                'html' => '
                    <div class="flex justify-space-between align-flex-start mb-12">
                        <h3>Phase 1</h3>
                        <span class="lcms-badge lcms-badge--warning">In Progress</span>
                    </div>
                    <div class="lcms-progress lcms-progress--large">
                        <div class="lcms-progress__bar" style="width: 75%;">
                            <span class="lcms-progress__label">75%</span>
                        </div>
                    </div>
                ',
            ],
        ],
    ],
    'gap' => '30px'
]
```

### Pattern: Text + Visual (2-Column)
```php
'content' => [
    'columns' => [
        ['type' => 'text', 'content' => ['text' => '...'], 'width' => '60%'],
        ['type' => 'image', 'content' => ['src' => '/path.jpg', 'alt' => '...'], 'width' => '40%']
    ],
    'gap' => '40px',
    'reverse' => true  // Image first on mobile
]
```

### Pattern: Dark Mode Section
```php
partial('column', [
    'settings' => [
        'dark_mode' => true,  // Applies .lcms-pro-sites--dark
    ],
    'header' => [
        'heading' => [
            'title' => 'Dark Section',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>Content automatically uses light text colors</p>',
    ],
], 'pro-sites');
```

## Example Interactions

### Example 1: Simple Card Grid
```
User: I need to create a pro-sites layout for a service showcase with 3 cards

Skill: Perfect! I'll create a column section with grid content and BEM card classes.

[Generates config with custom_classes for cards]
```

### Example 2: Progress Dashboard
```
User: Build a layout with multiple phase cards showing progress bars and status badges

Skill: Great! I'll use a stack layout with BEM components:
- .lcms-card for card containers
- .lcms-badge variants for status
- .lcms-progress for completion bars
- Flexbox utilities for badge positioning

[Shows complete configuration with all BEM classes]
```

### Example 3: Dark Mode with Custom Classes
```
User: Create a dark CTA section with centered content

Skill: I'll use:
- settings.dark_mode = true for automatic dark theme
- header.heading.align = 'center' for centered text
- BEM button classes for CTAs

[Generates dark mode section with proper configuration]
```

## Related Skills

**Template Library Builder** - For complete page generation
- Use when: User needs a full landing page, resources page, or project page
- Complementary: Template Library Builder creates pages, Pro-Sites Builder configures sections
- Trigger patterns: "Create a landing page", "Build a page for..."

**This skill (Pro-Sites Builder)** is best for:
- Section-level configuration (tactical)
- Specific partial parameter help
- Custom layout requirements
- Developer-focused workflow

**Template Library Builder** is best for:
- Complete page generation (strategic)
- Recipe-based workflows
- AI-driven composition
- Content-focused workflow

## Key Principles

1. **Be Efficient**: If the description is clear, don't ask unnecessary questions - just generate
2. **Explain Choices**: Always explain why you're suggesting BEM classes and layout approach
3. **Follow BEM**: Use proper BEM naming from design system (docs/design-system/bem-guide.md)
4. **Use Custom Classes**: Prefer custom_classes parameter over wrapping divs
5. **Validate Schema**: Check configurations against schema files before presenting
6. **Stay Focused**: This skill is for pro-sites partial configuration only (for full pages, use Template Library Builder)

## Notes

- All generated configs use the `partial()` helper function
- Partial path is always `'pro-sites'` as third parameter
- Check `templates/pages/proj/slug-project-overview.php` for real-world BEM examples
- Mobile responsiveness is handled by the partial system
- WordPress strips inline styles in some contexts - prefer utility classes
- Dark mode automatically applies to all typography and components

## Version History

**2.1.0** (2025-11-18)
- Updated documentation references for reorganized docs structure
- Fixed BEM guide path: docs/bem-guide.md → docs/design-system/bem-guide.md
- Added template library integration references
- Added Related Skills section explaining Template Library Builder
- Clarified complementary role with Template Library Builder
- Updated key principles to reference Template Library Builder for full pages

**2.0.0** (2025-11-17)
- Updated for BEM design system (v2.1.0)
- Added custom_classes support for stack/row/grid items
- Removed deprecated custom classes
- Added BEM component reference
- Added utility class patterns
- Updated documentation references to docs/ folder
- Added dark mode pattern examples

**1.0.0** (2025-11-12)
- Initial release
- Support for all 3 partials (column, 2-column, grid)
- Support for all content types
- Describe & generate workflow
- Schema validation
- Common pattern library
