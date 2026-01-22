---
name: project-phases-templates
description: Creates Project with Phases template files (Overview, Idea, Evaluation, Execution, Handover) for a client. Generates from skill templates with variable replacement or clones from existing implementations.
license: Complete terms in LICENSE.txt
---

# LeanCMS Brand Hub - Project with Phases Templates

## Overview

This skill creates a complete set of project phase template files for a client in the LeanCMS Brand Hub system. It generates five template files that work seamlessly with the "Project with Phases" preset in Bulk Create Pages.

**Callout phrase:** `create project with phases templates for {CLIENT_CODE}`

**Keywords**: project phases, templates, client templates, WordPress, pro-sites partials, project management, phase tracking

## What This Skill Does

1. Creates 5 project phase template files in `/templates/pages/[CLIENT-CODE]/`
2. Replaces template variables with client-specific information
3. Integrates with client brand configuration (if exists)
4. Works seamlessly with Bulk Create Pages "Project with Phases" preset
5. Uses pro-sites partials for consistent, maintainable layouts

## Template Files Created

- `slug-project-overview.php` - Main project overview/dashboard page
- `slug-project-idea.php` - Idea phase page
- `slug-project-evaluation.php` - Evaluation phase page
- `slug-project-execution.php` - Execution phase page
- `slug-project-handover.php` - Handover phase page

## Usage

When the user requests: **"create project with phases templates for {CLIENT_CODE}"**

### Step 1: Validate Prerequisites

**Check if:**
- Client code is provided and valid (lowercase, alphanumeric, hyphens)
- Target directory exists: `/templates/pages/[CLIENT-CODE]/`
- Client config exists: `/templates/pages/[CLIENT-CODE]/config.php` (optional but recommended)

**If client directory doesn't exist:**
```
The client folder for '{CLIENT_CODE}' doesn't exist yet.

Would you like me to:
1. Create the client setup first (recommended)
2. Create just the templates folder
3. Cancel and let you set up the client manually
```

**If templates already exist:**
```
Warning: Some project phase templates already exist for {CLIENT_CODE}:
- slug-project-overview.php ✓
- slug-project-idea.php ✓

Do you want to:
1. Overwrite existing templates
2. Skip existing and create missing only
3. Cancel operation
```

### Step 2: Gather Client Information

**REQUIRED:**
- Client code (e.g., "stdn", "refr")
- Client name (e.g., "St Denis School")

**OPTIONAL (prompt if not in config.php):**
- Project title (defaults to client name)
- Brand primary color (for progress indicators)
- Brand secondary color (for accents)

**Example prompt:**
```
I'll create Project with Phases templates for {CLIENT_NAME}.

REQUIRED INFORMATION:
✓ Client Code: {CLIENT_CODE}
✓ Client Name: {CLIENT_NAME}

OPTIONAL CUSTOMIZATION:
- Project Title: [default: {CLIENT_NAME}]
- Primary Brand Color: [will use config.php if available]
- Custom phase names: [leave blank for default: Idea, Evaluation, Execution, Handover]

Ready to proceed? (yes/no)
```

### Step 3: Load Client Configuration

If `/templates/pages/[CLIENT-CODE]/config.php` exists, extract:
- Brand colors (primary, secondary, accent)
- Typography preferences
- Client metadata (name, industry, website)

This ensures generated templates match the client's brand.

### Step 4: Generate Templates

For each template file:

1. **Read the generic template** from `.claude/skills/project-phases-templates/templates/`
2. **Replace variables:**
   - `{{CLIENT_CODE}}` → client code (e.g., "stdn")
   - `{{CLIENT_NAME}}` → client name (e.g., "St Denis School")
   - `{{PROJECT_TITLE}}` → project title (defaults to client name)
   - `{{BRAND_PRIMARY}}` → primary brand color from config or default
   - `{{BRAND_SECONDARY}}` → secondary brand color from config or default
   - `{{CURRENT_DATE}}` → today's date
   - `{{PHASE_NAME}}` → specific phase name
3. **Write to** `/templates/pages/[CLIENT-CODE]/slug-project-{phase}.php`

### Step 5: Validation

After creating all templates, verify:
- [ ] All 5 files created successfully
- [ ] File paths match expected pattern: `slug-project-*.php`
- [ ] PHP syntax is valid (no parse errors)
- [ ] WordPress security headers present (`defined('ABSPATH') || exit;`)
- [ ] Pro-sites partial references are correct

### Step 6: Report Results

Provide a clear summary with next steps:

```
✓ Successfully created 5 Project with Phases templates for {CLIENT_NAME}

FILES CREATED:
✓ /templates/pages/{CLIENT_CODE}/slug-project-overview.php
✓ /templates/pages/{CLIENT_CODE}/slug-project-idea.php
✓ /templates/pages/{CLIENT_CODE}/slug-project-evaluation.php
✓ /templates/pages/{CLIENT_CODE}/slug-project-execution.php
✓ /templates/pages/{CLIENT_CODE}/slug-project-handover.php

NEXT STEPS:
1. Create pages using Bulk Create Pages:
   - Go to Settings > Bulk Pages
   - Select "Project with Phases" preset
   - Enter Client Code: {CLIENT_CODE}
   - Enter Client Name: {CLIENT_NAME}
   - Click "Apply Preset with Variables"
   - Review JSON and click "Create Pages"

2. Customize templates as needed:
   - Edit phase-specific content
   - Add progress indicators
   - Include project-specific sections

3. View your pages:
   - Overview: /{PARENT_SLUG}/
   - Idea: /{PARENT_SLUG}/idea/
   - Evaluation: /{PARENT_SLUG}/evaluation/
   - Execution: /{PARENT_SLUG}/execution/
   - Handover: /{PARENT_SLUG}/handover/

Note: The slug names in templates MUST match the page slugs created by Bulk Create Pages.
```

## Template Variables Reference

All templates support these variables:

| Variable | Description | Example |
|----------|-------------|---------|
| `{{CLIENT_CODE}}` | Client identifier code | `stdn` |
| `{{CLIENT_NAME}}` | Full client name | `St Denis School` |
| `{{PROJECT_TITLE}}` | Project title | `St Denis School` |
| `{{BRAND_PRIMARY}}` | Primary brand color | `#2C3E50` |
| `{{BRAND_SECONDARY}}` | Secondary brand color | `#3498DB` |
| `{{CURRENT_DATE}}` | Current date | `November 14, 2024` |
| `{{PHASE_NAME}}` | Phase-specific name | `Idea`, `Evaluation`, etc. |

## Template Structure

Each template follows this structure:

```php
<?php
/**
 * {{CLIENT_NAME}} - {{PHASE_NAME}}
 *
 * Project phase tracking and documentation page
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/{{CLIENT_CODE}}/slug-project-{phase}.php
 * @since      1.3.7
 */

defined('ABSPATH') || exit;
get_header();

// Load configurations
$global_config = include(LEANCMS_PLUGIN_DIR . 'templates/assets/global/config.php');
$css_vars = $global_config['css_variables'] ?? [];

// Load client config if exists
$client_config_path = LEANCMS_PLUGIN_DIR . 'templates/pages/{{CLIENT_CODE}}/config.php';
if (file_exists($client_config_path)) {
    $client_config = include($client_config_path);
    $css_vars = array_merge($css_vars, $client_config['css_variables'] ?? []);
}
?>

<!-- Base CSS -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/base.css">

<!-- CSS Variables -->
<style id="brand-css-variables">
:root {
<?php foreach ($css_vars as $key => $value): ?>
    --<?php echo esc_attr($key); ?>: <?php echo esc_attr($value); ?>;
<?php endforeach; ?>
}
</style>

<?php
// Page content using pro-sites partials
?>

<?php get_footer(); ?>
```

## Integration with Bulk Create Pages

This skill creates templates that perfectly match the "Project with Phases" preset:

**Bulk Create Pages Preset:**
```
Overview page → uses slug-project-overview.php
Idea page → uses slug-project-idea.php
Evaluation page → uses slug-project-evaluation.php
Execution page → uses slug-project-execution.php
Handover page → uses slug-project-handover.php
```

The slug naming convention MUST match:
- Template: `slug-project-{phase}.php`
- Page slug: `{phase}` (from Bulk Create Pages)
- WordPress routing: Maps slug to template automatically

## Advanced Options

### Option 1: Clone from Existing Client

Allow users to copy templates from another client:

```
Would you like to:
1. Generate from skill templates (generic, clean)
2. Clone from /proj/ folder (working example)
3. Clone from another client (specify client code)
```

### Option 2: Custom Phase Names

Allow users to customize phase names:

```
Default phases: Idea, Evaluation, Execution, Handover

Would you like to customize phase names?
- Phase 1: [Idea]
- Phase 2: [Evaluation]
- Phase 3: [Execution]
- Phase 4: [Handover]
```

### Option 3: Content Generation

For advanced users, offer AI-powered content generation:

```
Would you like AI-assisted content generation?

This will analyze your project description and generate:
- Phase-specific objectives
- Task checklists
- Deliverables lists
- Progress indicators

Project description: ___________
```

## Common Use Cases

### Use Case 1: New Client Setup
```
User: "Create client for St Denis School"
Assistant: [Creates client setup]
User: "Create project with phases templates for stdn"
Assistant: [Creates 5 template files]
User: [Goes to Bulk Create Pages and creates pages]
```

### Use Case 2: Existing Client
```
User: "Create project with phases templates for refr"
Assistant: [Checks config, creates templates with brand colors]
User: [Customizes templates, then creates pages]
```

### Use Case 3: Multiple Projects
```
User: "Create project with phases templates for bibo"
Assistant: [Creates first set of templates]
User: [Can create multiple page sets in Bulk Create Pages with different project names]
```

## Troubleshooting

### Templates not loading
- Verify file names match exactly: `slug-project-{phase}.php`
- Check file permissions (should be readable)
- Clear WordPress cache if using caching plugin

### Styles not applying
- Verify config.php exists and is valid
- Check CSS variables are properly defined
- Inspect browser console for CSS errors

### Pages showing wrong template
- Ensure page slugs match template names
- Check WordPress permalinks are flushed
- Verify LeanCMS template routing is active

## File Naming Convention

**CRITICAL:** Template file names MUST follow this pattern:

```
slug-project-overview.php  → matches page slug "overview" or parent slug
slug-project-idea.php      → matches page slug "idea"
slug-project-evaluation.php → matches page slug "evaluation"
slug-project-execution.php  → matches page slug "execution"
slug-project-handover.php   → matches page slug "handover"
```

The `slug-` prefix is required by LeanCMS template system.

## Best Practices

1. **Always create client setup first** if it doesn't exist
2. **Load client config** to maintain brand consistency
3. **Use pro-sites partials** for layout (don't hardcode HTML)
4. **Include proper PHP headers** for security and documentation
5. **Test one template** before creating all five
6. **Version control** template customizations
7. **Document custom changes** in template comments

## References

- Bulk Create Pages preset: `includes/admin/class-bulk-pages.php:529-564`
- Example templates: `templates/pages/proj/slug-project-*.php`
- Pro-sites partials: `templates/assets/_partials/pro-sites/`
- Template routing: `includes/content/class-template-subfolder-resolver.php`
- Client setup skill: `.claude/skills/client-setup/SKILL.md`

## Notes

- Templates are self-contained - they load their own CSS and config
- Each template can be customized independently
- The overview template often contains project summary/dashboard
- Phase templates track specific phase progress and deliverables
- All templates use WordPress security best practices
