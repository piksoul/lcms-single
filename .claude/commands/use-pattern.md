---
description: Use a code pattern to generate boilerplate code
---

Help me implement functionality using one of the predefined code patterns.

## Available Patterns

- **cpt** - Custom Post Type
- **content** - Content Management (shortcodes, widgets, filters)
- **commerce** - Commerce Functions (pricing, payments, subscriptions)
- **notifications** - Notifications (email, admin notices, user notifications)
- **portal** - Portal/Dashboard (user portals, dashboards, profile pages)
- **utilities** - Utilities (helpers, logging, validation, sanitization)

## Instructions

1. **Ask me which pattern to use** if I haven't specified
   - Show the list above if I'm unsure

2. **Ask for pattern details:**
   - For CPT: Ask for post type name (singular and plural), slug, icon
   - For Content: Ask what type (shortcode, widget, filter)
   - For Commerce: Ask what functionality (pricing, payment, subscription)
   - For Notifications: Ask what type (email, admin notice, user notification)
   - For Portal: Ask what pages to create (dashboard, profile, account)
   - For Utilities: Ask what utilities needed (logger, validator, sanitizer, formatter)

3. **Load the appropriate pattern** from `.claude/prompts/pattern-{type}.md`

4. **Generate the code:**
   - Follow the pattern structure
   - Replace all placeholders with actual values
   - Use WordPress coding standards
   - Include proper documentation
   - Follow the security checklist from the pattern

5. **Create files:**
   - Create the file(s) in the appropriate location per the pattern's file structure
   - Use proper naming conventions

6. **Provide integration instructions:**
   - Show what to add to the main plugin file
   - Show any activation hooks needed
   - Show flush rewrite rules if needed
   - Provide testing checklist

7. **Ask if I want to:**
   - Create additional related files (templates, admin pages, etc.)
   - Add this to project directives
   - Create corresponding tests

## Example Usage

**User:** `/use-pattern cpt Product`

**Expected Flow:**
1. Confirm pattern: CPT
2. Ask for details: plural name, icon, features
3. Load pattern-cpt.md
4. Generate class-product.php
5. Show integration code
6. Provide testing checklist

## Important Notes

- Always follow the pattern's security checklist
- Use the placeholder replacement from the pattern
- Include all required functions listed in the pattern
- Follow WordPress coding standards
- Provide clear integration instructions
- Ask before creating files
