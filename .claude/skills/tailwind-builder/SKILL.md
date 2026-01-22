# Tailwind Layout Builder

**Version:** 1.0.0
**Type:** Project Skill
**Scope:** LeanCMS Tailwind + DaisyUI Partial System

## Description

An AI-assisted layout builder for creating Tailwind + DaisyUI partial configurations. Analyzes content descriptions, suggests optimal partials, and generates complete PHP configuration arrays with DaisyUI components and utility classes.

## Trigger Patterns

This skill activates when the user mentions creating a **Tailwind layout**:

- "I need to create a tailwind layout for [description]"
- "Build a tailwind layout with [content description]"
- "Generate tailwind config for [use case]"
- "Help me with a tailwind layout"
- "Create a DaisyUI section for..."

## Core Workflow

### 1. Analyze Description
Parse the user's content description to understand:
- Content type and structure (hero, cards, steps, etc.)
- Number of sections/items needed
- Visual requirements (dark mode, centered, etc.)
- Component needs (stats, testimonials, card grids)

### 2. Suggest Partials
Based on analysis, recommend:
- Best partial type (hero, section, card-grid, steps, stats, testimonials)
- Configuration options
- DaisyUI component classes
- Dark mode and layout considerations

### 3. Generate Configuration
Produce clean PHP array configuration:
- Properly formatted and indented
- Include inline comments for complex sections
- Validate against schema
- Use DaisyUI components appropriately
- Suggest improvements and best practices

### 4. Iterate & Refine
Allow user to:
- Adjust settings
- Add/remove sections
- Request schema lookups
- Generate complete page templates

## Documentation References

**Primary References:**
- `templates/pages/_partials/tailwind/` - All Tailwind partials
- `templates/pages/slug-tailwind-demo.php` - Complete demo page
- `templates/assets/tailwind/tailwind.css` - Compiled CSS

## Tailwind Partial System Reference

### Available Partials

**Location:** `templates/pages/_partials/tailwind/`

| Partial | Use Case | Key Config |
|---------|----------|------------|
| `hero` | Landing page hero sections | `title`, `subtitle`, `buttons`, `badge`, `image`, `dark`, `min_height` |
| `section` | Generic content sections | `title`, `subtitle`, `content`, `dark`, `centered`, `narrow` |
| `card-grid` | Feature grids, team members | `cards[]`, `columns`, `title`, `dark` |
| `steps` | Process/timeline displays | `steps[]`, `vertical`, `title`, `dark` |
| `stats` | Metrics/statistics | `stats[]`, `title`, `dark` |
| `testimonials` | Customer testimonials | `testimonials[]`, `title`, `dark` |
| `footer` | Page footer | `links`, `social`, `brand` |

### Config Structures

**Hero Partial:**
```php
partial('hero', [
    'badge'      => 'Welcome',              // Optional badge text
    'title'      => 'Hero Title',           // Required
    'subtitle'   => 'Hero subtitle text',   // Optional
    'buttons'    => [                       // Optional
        ['text' => 'Primary', 'url' => '#', 'style' => 'primary'],
        ['text' => 'Secondary', 'url' => '#', 'style' => 'outline'],
    ],
    'image'      => 'https://...',          // Optional hero image
    'dark'       => false,                  // Dark mode variant
    'centered'   => true,                   // Center content (default true)
    'min_height' => '80vh',                 // Minimum height
], 'tailwind');
```

**Section Partial:**
```php
partial('section', [
    'id'       => 'about',                // Optional section ID
    'label'    => 'About Us',             // Optional label/badge
    'title'    => 'Section Title',        // Optional
    'subtitle' => 'Subtitle text',        // Optional
    'content'  => '<p>HTML content</p>',  // Main content (HTML allowed)
    'dark'     => false,                  // Dark mode variant
    'centered' => true,                   // Center text
    'narrow'   => false,                  // Narrow content width
], 'tailwind');
```

**Card Grid Partial:**
```php
partial('card-grid', [
    'id'       => 'features',             // Optional section ID
    'label'    => 'Features',             // Optional label
    'title'    => 'Grid Title',           // Optional
    'subtitle' => 'Subtitle',             // Optional
    'columns'  => 3,                      // 2, 3, or 4 columns
    'dark'     => false,                  // Dark mode variant
    'cards'    => [
        [
            'icon'    => '🚀',            // Emoji or icon HTML
            'title'   => 'Card Title',
            'content' => 'Card description text',
            'link'    => ['url' => '#', 'text' => 'Learn more'],  // Optional
        ],
    ],
], 'tailwind');
```

**Steps Partial:**
```php
partial('steps', [
    'id'       => 'process',              // Optional section ID
    'label'    => 'How It Works',         // Optional label
    'title'    => 'Simple Process',       // Optional
    'subtitle' => 'Get started in 3 steps', // Optional
    'dark'     => false,                  // Dark mode variant
    'vertical' => false,                  // Vertical layout
    'steps'    => [
        [
            'title'   => 'Step 1',
            'content' => 'Description of step 1',
            'status'  => 'primary',       // primary, secondary, accent, info, success, warning, error
        ],
    ],
], 'tailwind');
```

**Stats Partial:**
```php
partial('stats', [
    'id'    => 'stats',                   // Optional section ID
    'label' => 'By the Numbers',          // Optional label
    'title' => 'Our Impact',              // Optional
    'dark'  => false,                     // Dark mode variant
    'stats' => [
        [
            'value' => '10K+',
            'label' => 'Happy Customers',
            'desc'  => 'Since 2020',      // Optional description
        ],
    ],
], 'tailwind');
```

**Testimonials Partial:**
```php
partial('testimonials', [
    'id'           => 'testimonials',     // Optional section ID
    'label'        => 'Testimonials',     // Optional label
    'title'        => 'What People Say',  // Optional
    'subtitle'     => 'Subtitle',         // Optional
    'dark'         => false,              // Dark mode variant
    'testimonials' => [
        [
            'quote'  => 'Great product!',
            'name'   => 'John Doe',
            'role'   => 'CEO, Company',
            'avatar' => 'https://...',    // Optional
            'rating' => 5,                // Optional (1-5)
        ],
    ],
], 'tailwind');
```

## Instructions

When the user requests a Tailwind layout:

### Step 1: Understand the Request
Ask clarifying questions ONLY if the description is too vague:
- What's the primary purpose of this section?
- What content needs to be displayed?
- Any specific styling or layout requirements?

If the description is clear, proceed directly to analysis.

### Step 2: Analyze & Recommend
Think through:
1. What partial(s) best fit this use case?
2. What DaisyUI components apply?
3. Should dark mode be used?
4. What button styles are needed?

Present your recommendation with reasoning:
```
Based on your description, I recommend:
- Partial: card-grid with 3 columns
- Use emoji icons for visual interest
- Light background for contrast

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
- Follow established patterns from demo template

**DaisyUI Best Practices:**
- Use semantic button styles: `primary`, `secondary`, `accent`, `outline`, `ghost`
- Apply dark mode with `'dark' => true`
- Use appropriate column counts (2, 3, or 4)
- Include proper id attributes for navigation

### Step 4: Present Output
Format the generated code clearly:
```php
// Hero section with call-to-action
partial('hero', [
    'badge'    => 'Welcome',
    'title'    => 'Your Title Here',
    'subtitle' => 'Compelling subtitle text.',
    'buttons'  => [
        ['text' => 'Get Started', 'url' => '#', 'style' => 'primary'],
        ['text' => 'Learn More', 'url' => '#about', 'style' => 'outline'],
    ],
    'min_height' => '70vh',
], 'tailwind');
```

Then ask:
- "Would you like to adjust any settings?"
- "Need to add another section?"
- "Want me to explain any part of this config?"

## Template Boilerplate

When generating complete pages, use this structure:

```php
<?php
/**
 * Page Name Template
 *
 * Description of the page.
 * Built with Tailwind + DaisyUI partials.
 *
 * @filepath templates/pages/slug-page-name.php
 */

get_header();
?>

<!-- Tailwind CSS + DaisyUI -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/tailwind/tailwind.css">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Set DaisyUI theme -->
<div data-theme="lcms">

<?php
// Partials go here...
?>

</div><!-- end data-theme -->

<?php get_footer(); ?>
```

## Common Patterns

### Pattern: Marketing Landing Page
```php
// Hero
partial('hero', [...], 'tailwind');

// Stats/social proof
partial('stats', [...], 'tailwind');

// Features grid
partial('card-grid', [...], 'tailwind');

// Testimonials
partial('testimonials', [...], 'tailwind');

// CTA (custom section or dark hero)
```

### Pattern: Simple Content Page
```php
// Hero (smaller)
partial('hero', ['min_height' => '40vh', ...], 'tailwind');

// Content section
partial('section', ['content' => '...', 'narrow' => true], 'tailwind');
```

### Pattern: Process/How-It-Works
```php
// Hero
partial('hero', [...], 'tailwind');

// Steps
partial('steps', [...], 'tailwind');

// Features
partial('card-grid', [...], 'tailwind');
```

## Button Styles

Available button styles for all partials:

| Style | Class | Use For |
|-------|-------|---------|
| `primary` | `btn-primary` | Main call-to-action |
| `secondary` | `btn-secondary` | Secondary actions |
| `accent` | `btn-accent` | Highlight actions |
| `outline` | `btn-outline` | Low-emphasis actions |
| `ghost` | `btn-ghost` | Minimal emphasis |

## Differences from Pro-Sites

| Aspect | Pro-Sites (BEM) | Tailwind (DaisyUI) |
|--------|-----------------|-------------------|
| **Config Style** | Nested (settings/header/content/footer) | Flat (direct properties) |
| **CSS** | Custom BEM + CSS variables | Utility classes + DaisyUI |
| **Flexibility** | High (deep nesting) | Moderate (simpler patterns) |
| **Best For** | Complex custom layouts | Marketing pages, landing pages |
| **Partial Selection** | column, 2-column, grid | hero, section, card-grid, steps, stats, testimonials |

## Key Principles

1. **Be Efficient**: If the description is clear, don't ask unnecessary questions - just generate
2. **Explain Choices**: Always explain why you're suggesting specific partials
3. **Use DaisyUI Components**: Leverage pre-built components for consistency
4. **Keep It Simple**: Tailwind partials are simpler than Pro-Sites - embrace that
5. **Validate Schema**: Check configurations against schema files before presenting
6. **Stay Focused**: This skill is for Tailwind partial configuration only

## Notes

- All generated configs use the `partial()` helper function
- Partial path is always `'tailwind'` as third parameter
- Check `templates/pages/slug-tailwind-demo.php` for real-world examples
- Mobile responsiveness is handled by Tailwind's breakpoint system
- Dark mode uses DaisyUI's theme system automatically
- Wrap page content in `<div data-theme="lcms">` for proper theming

## Version History

**1.0.0** (2026-01-22)
- Initial release
- Support for all 7 Tailwind partials
- Describe & generate workflow
- Schema validation
- Common pattern library
- Template boilerplate
