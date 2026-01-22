---
name: client-setup
description: Creates complete folder structure and configuration files for a new LeanCMS Brand Hub client. Sets up config.php with brand colors, typography, and template defaults, plus blank theme.css and optional README.
license: Complete terms in LICENSE.txt
---

# LeanCMS Brand Hub - Client Setup

## Overview

This skill automates the complete setup process for a new client in the LeanCMS Brand Hub system. It creates the proper folder structure, generates a comprehensive config.php file with brand variables, and sets up all necessary asset files.

**Keywords**: client setup, brand hub, configuration, WordPress, template system, brand identity, client onboarding

## What This Skill Does

1. Creates client folder structure in `/templates/pages/[CLIENT-CODE]/`
2. Generates a comprehensive `config.php` with brand configuration
3. Creates blank `assets/[client-code]-theme.css` file
4. Optionally creates a README.md with client information
5. Prompts for essential brand information (colors, fonts, client details)
6. Sets up proper CSS variable system for template inheritance

## Usage

When the user requests to create a new client (e.g., "create client for Acme Corp" or "setup new client ACME"), follow these steps:

### Step 1: Gather Client Information

**REQUIRED Information:**
- Client name (e.g., "Acme Corporation")
- Client code (4-letter lowercase code, e.g., "acme")

**Ask for the following if not provided:**
- Primary brand color (HEX format)
- Secondary/accent colors
- Font preferences (Google Fonts)
- Industry/business type
- Website URL
- Tagline or mission statement

**Example prompt:**
```
I'll set up a new client for you. I need some information:

REQUIRED:
- Client code (4 letters, lowercase): ____
- Client full name: ____

BRAND IDENTITY (provide what you have):
- Primary brand color (HEX): ____
- Secondary/accent colors: ____
- Heading font (Google Fonts): ____
- Body font (Google Fonts): ____

OPTIONAL:
- Industry: ____
- Website: ____
- Tagline: ____
- Any other brand colors or preferences?
```

### Step 2: Create Folder Structure

Create the following structure:
```
/templates/pages/[CLIENT-CODE]/
├── config.php
├── README.md
└── assets/
    └── [client-code]-theme.css
```

### Step 3: Generate config.php

Use the comprehensive config.php template below, populated with client data:

**Template Structure:**
- CSS Variables: Override global defaults with client brand values
- Client Metadata: Name, code, industry, website, tagline
- Brand Colors: Primary, accent, background, text colors + gradients
- Typography: Fonts, weights, sizes (desktop + mobile)
- Layout & Spacing: Max-widths, padding, borders, breakpoints
- Template Defaults: Hero, card, CTA, form, section, grid styling
- Google Fonts: Font URLs and preconnect
- Password Protection: Settings for gated content
- AI Instructions: Style guide for template generation
- Validation Rules: Brand compliance requirements

**Reference:** See `/templates/pages/refr/config.php` for a complete example.

### Step 4: Create Theme CSS File

Create a blank CSS file at `assets/[client-code]-theme.css` with this header:
```css
/**
 * [Client Name] - Custom Theme Styles
 *
 * Client-specific CSS overrides and customizations.
 * The config.php handles most styling via CSS variables.
 * Use this file for unique CSS that can't be handled by variables.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages/[CLIENT-CODE]
 */

/* Add custom CSS here */
```

### Step 5: Create README.md

Create a README.md with client overview:
```markdown
# [Client Full Name]

**Client Code:** [CODE]
**Industry:** [Industry]
**Website:** [URL]

## Brand Overview

[Brief description]

## Brand Colors

- Primary: [HEX] - [Usage]
- Accent: [HEX] - [Usage]
- Background: [HEX] - [Usage]

## Typography

- Headings: [Font Name]
- Body: [Font Name]

## Files

- `config.php` - Brand configuration and template defaults
- `assets/[code]-theme.css` - Custom CSS overrides
- `slug-*.php` - Page templates (to be created)

## Notes

[Any special considerations or brand guidelines]
```

## Configuration Template

Here's the base structure for config.php (populate with client data):

```php
<?php
/**
 * [Client Name] Configuration
 *
 * Machine-readable configuration for programmatic template generation,
 * validation, and AI-assisted development.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages/[CLIENT-CODE]
 * @filepath   templates/pages/[client-code]/config.php
 */

return array(

    /**
     * CSS Variable Overrides
     */
    'css_variables' => array(
        // Brand colors
        'color-brand-primary'     => '[PRIMARY-COLOR]',
        'color-brand-secondary'   => '[SECONDARY-COLOR]',
        'color-brand-accent'      => '[ACCENT-COLOR]',
        'color-brand-accent-hover'=> '[ACCENT-HOVER]',
        'color-text-primary'      => '#161617',
        'color-text-light'        => 'rgba(255, 255, 255, 0.95)',
        'color-background-light'  => '[BG-COLOR]',
        'color-border-light'      => '[BORDER-COLOR]',

        // Typography
        'font-heading'            => "'[HEADING-FONT]', Arial, Helvetica, sans-serif",
        'font-body'               => "'[BODY-FONT]', Arial, Helvetica, sans-serif",

        // Layout
        'doc-max-width'           => '992px',
        'doc-max-width-wide'      => '1200px',
        'spacing-section'         => '80px',
        'spacing-section-mobile'  => '30px',
        'spacing-heading-bottom'  => '0',
        'spacing-horizontal'      => '20px',
    ),

    /**
     * Client Metadata
     */
    'client' => array(
        'code'         => '[CLIENT-CODE]',
        'name'         => '[Client Name]',
        'full_name'    => '[Full Client Name]',
        'industry'     => '[Industry]',
        'website'      => '[Website URL]',
        'founded'      => '[Year]',
        'tagline'      => '[Tagline]',
        'description'  => '[Brief description]',
    ),

    /**
     * Brand Colors
     */
    'brand' => array(
        'colors' => array(
            'primary' => array(
                'main'     => '[PRIMARY-COLOR]',
            ),
            'accent' => array(
                'main'     => '[ACCENT-COLOR]',
                'hover'    => '[ACCENT-HOVER]',
            ),
            'background' => array(
                'light'    => '[BG-LIGHT]',
                'white'    => '#FFFFFF',
            ),
            'text' => array(
                'body'     => '#161617',
                'heading'  => '[HEADING-COLOR]',
            ),
            'gradients' => array(
                'hero'     => 'linear-gradient(135deg, [COLOR1] 0%, [COLOR2] 100%)',
            ),
        ),

        'typography' => array(
            'fonts' => array(
                'heading'  => "'[HEADING-FONT]', Arial, Helvetica, sans-serif",
                'body'     => "'[BODY-FONT]', Arial, Helvetica, sans-serif",
            ),
            'weights' => array(
                'heading'  => 700,
                'body'     => 400,
            ),
            'sizes' => array(
                'hero_h1'    => '56px',
                'section_h2' => '42px',
                'body'       => '18px',
            ),
            'sizes_mobile' => array(
                'hero_h1'    => '36px',
                'section_h2' => '32px',
                'body'       => '16px',
            ),
        ),

        'layout' => array(
            'max_width' => array(
                'content'  => '1200px',
                'narrow'   => '900px',
            ),
            'spacing' => array(
                'section_desktop'  => '80px 60px',
                'section_mobile'   => '60px 30px',
            ),
        ),
    ),

    /**
     * Template Defaults
     */
    'templates' => array(
        'hero' => array(
            'background'      => '[HERO-BG or gradient]',
            'text_color'      => '#FFFFFF',
            'padding_desktop' => '100px 60px',
            'padding_mobile'  => '80px 30px',
        ),
        'card' => array(
            'background'      => '[CARD-BG]',
            'border'          => '2px solid [BORDER-COLOR]',
            'border_radius'   => '10px',
            'padding'         => '30px',
        ),
        'cta' => array(
            'background'      => '[ACCENT-COLOR]',
            'color'           => '#FFFFFF',
            'hover_bg'        => '[ACCENT-HOVER]',
            'padding'         => '16px 18px',
            'border_radius'   => '8px',
        ),
    ),

    /**
     * Google Fonts Configuration
     */
    'fonts' => array(
        'google_fonts_url' => '[GOOGLE-FONTS-URL]',
        'preconnect'       => array(
            'https://fonts.googleapis.com',
            'https://fonts.gstatic.com',
        ),
    ),

    /**
     * Password Protection
     */
    'password_protection' => array(
        'enabled'         => true,
        'create_noaccess' => true,
        'show_teaser'     => true,
    ),

    /**
     * Version & Maintenance
     */
    'meta' => array(
        'config_version'  => '1.0.0',
        'last_updated'    => '[DATE]',
        'maintained_by'   => 'LeanCMS Brand Hub Team',
    ),

);
```

## Default Values (if client doesn't provide)

Use these sensible defaults:

**Colors:**
- Primary: #2C3E50 (Professional dark blue)
- Accent: #3498DB (Bright blue)
- Accent Hover: #5DADE2 (Lighter blue)
- Background Light: #F8F9FA (Light gray)
- Border: #DEE2E6 (Medium gray)

**Fonts:**
- Heading: 'Montserrat' (Professional, modern)
- Body: 'Open Sans' (Readable, versatile)
- Google Fonts URL: `https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400&display=swap`

**Layout:**
- Standard spacing and breakpoints (use refr as reference)

## Suggested Follow-up Tasks

After creating the client setup, suggest:

1. **Create first page template**: "Would you like me to create your first page template? (e.g., homepage, about, services)"

2. **Upload brand assets**: "Upload any logos, icons, or images to `/templates/assets/[client-code]/`"

3. **Review config.php**: "Review the generated config.php and let me know if you need any adjustments to colors, fonts, or spacing"

4. **Add more brand colors**: "Do you have any additional brand colors for specific use cases? (e.g., success, warning, error states)"

5. **Create password-protected content**: "Do you need any password-protected pages or sections?"

## Validation Checklist

After setup, verify:
- [ ] Client folder exists at `/templates/pages/[client-code]/`
- [ ] config.php is valid PHP and returns an array
- [ ] All HEX colors are valid format (#RRGGBB)
- [ ] Google Fonts URL is accessible
- [ ] assets folder and theme.css exist
- [ ] Client code is exactly 4 lowercase letters
- [ ] No conflicts with existing client codes

## Common Issues

**Duplicate client code:** Check `/templates/pages/` for existing codes
**Invalid colors:** Ensure HEX format with # prefix
**Font not loading:** Verify Google Fonts URL is correct
**CSS not applying:** Check that config.php is returning the array correctly

## References

- Example client: `/templates/pages/refr/config.php`
- Global config: `/templates/assets/global/config.php`
- Template system: `/includes/content/class-template-subfolder-resolver.php`

## Notes

- Client codes MUST be exactly 4 lowercase letters
- Use the CSS variable system for most styling (avoid custom CSS when possible)
- config.php values cascade from global defaults
- The system auto-generates password-protected page variants
