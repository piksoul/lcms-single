# LeanCMS Page Templates - Organization Guide

This directory contains all custom page templates for the Brand Hub CMS. Templates are organized by client for scalability and maintainability.

## Directory Structure

```
templates/pages/
├── refr/                          # Reframe WA client templates
│   ├── slug-brand-guide.php
│   ├── slug-web-review.php
│   ├── _archive/                  # Archived/old versions
│   └── README.md                  # Client-specific guidelines
├── brhu/                          # BrandHub client templates
│   └── ...
├── test/                          # Test/demo templates
│   └── ...
├── _shared/                       # Shared templates across clients
│   └── slug-generic-landing.php
├── _partials/                     # Reusable template components
│   ├── hero-section.php
│   └── cta-block.php
├── slug-legacy-template.php       # Legacy flat structure (backwards compatible)
└── README.md                      # This file
```

## How It Works

### Template Resolution Flow

When WordPress needs a template for a page:

1. **Client Subfolder** (checked first)
   - Pattern: `{client-code}/slug-{page-name}.php`
   - Example: `refr/slug-brand-guide.php` for page slug `refr-brand-guide`

2. **Flat Structure** (fallback for backwards compatibility)
   - Pattern: `slug-{client-code}-{page-name}.php`
   - Example: `slug-refr-brand-guide.php`

3. **ID-based** (if slug match fails)
   - Pattern: `{client-code}/id-{page-id}.php` or `id-{page-id}.php`
   - Example: `refr/id-123.php` or `id-123.php`

### Client Code Extraction

Client codes are **4-letter prefixes** extracted from page slugs:

```
Page Slug              → Client Code → Template Path
refr-brand-guide       → refr        → refr/slug-brand-guide.php
brhu-project-overview  → brhu        → brhu/slug-project-overview.php
test-hello-world       → test        → test/slug-hello-world.php
```

**Registered Client Codes:**
- `refr` - Reframe WA
- `brhu` - BrandHub
- `test` - Test/Demo pages

To add a new client code, update `includes/content/class-template-subfolder-resolver.php`:

```php
private static $client_codes = array(
    'refr',
    'brhu',
    'test',
    'newc',  // Add new client code here
);
```

## Naming Conventions

### Within Client Subfolders

**Remove redundant client prefix** - it's implied by the folder:

```
✅ GOOD (in refr/ folder):
   slug-brand-guide.php
   slug-web-review.php
   slug-index.php

❌ AVOID:
   slug-refr-brand-guide.php  (redundant 'refr-' prefix)
```

### Special Suffixes

- **Password Protection:** `-noaccess.php`
  ```
  slug-brand-guide.php         (protected content)
  slug-brand-guide-noaccess.php (password gate)
  ```

- **Versioning:** `-{number}` or `-{date}` (YYMMDD format)
  ```
  slug-web-review.php
  slug-web-review-2.php
  slug-web-review-251107.php
  ```

### Shared Templates

Templates in `_shared/` should have descriptive names:

```
_shared/slug-generic-landing.php
_shared/slug-password-gate-default.php
```

## Password Protection

When a page is password-protected in WordPress:

1. System checks for `-noaccess` template variant
2. Shows custom password gate if found
3. Falls back to generic WordPress password form if not found

**Implementation:**

```php
// Main template (protected content)
// refr/slug-brand-guide.php
<?php
get_header();
// ... full brand guide content ...
get_footer();

// Password gate (shown when locked)
// refr/slug-brand-guide-noaccess.php
<?php
get_header();
// ... teaser content, brand styling ...
echo get_the_password_form();
get_footer();
```

## Creating New Templates

### For Existing Client

1. Create file in client subfolder:
   ```bash
   touch templates/pages/refr/slug-new-page.php
   ```

2. Add template header:
   ```php
   <?php
   /**
    * Page Title - Description
    *
    * @package    LeanCMS_Plugin
    * @subpackage Templates/Pages
    * @filepath   templates/pages/refr/slug-new-page.php
    */
   ```

3. Create WordPress page with matching slug:
   - Slug: `refr-new-page`
   - Template: "LeanCMS Full Page"

### For New Client

1. Create client folder:
   ```bash
   mkdir templates/pages/newc
   mkdir templates/pages/newc/_archive
   ```

2. Register client code in `includes/content/class-template-subfolder-resolver.php`

3. Create client README with brand guidelines

4. Add templates following naming conventions

## Migration Strategy

**Current Phase:** Gradual Migration

- ✅ **New templates:** Use client subfolders
- ⚠️ **Existing templates:** Can remain in flat structure (backwards compatible)
- 📝 **When updating:** Move to subfolder, remove redundant prefix

**Migration Process:**

```bash
# Move template to client folder
mv slug-refr-web-review.php refr/slug-web-review.php

# Update @filepath comment in template header
# Change: templates/pages/slug-refr-web-review.php
# To:     templates/pages/refr/slug-web-review.php

# Stage and commit
git add templates/pages/refr/slug-web-review.php
git rm templates/pages/slug-refr-web-review.php
git commit -m "Migrate web-review template to refr subfolder"
```

## Versioning & Archiving

### Creating Template Versions

When making significant changes to a template:

```bash
# Move current version to archive
mv refr/slug-brand-guide.php refr/_archive/slug-brand-guide-251107.php

# Create new version
# ... edit refr/slug-brand-guide.php ...
```

### Archive Organization

```
refr/_archive/
├── slug-brand-guide-251107.php    (Nov 7, 2025 version)
├── slug-brand-guide-251020.php    (Oct 20, 2025 version)
└── README.md                       (archive changelog)
```

**Archive README Example:**

```markdown
# REFR Template Archive

## slug-brand-guide.php

- **251107** - Redesign with new color palette
- **251020** - Original version with blue theme
```

## Special Folders

### `_shared/`

**Purpose:** Templates used across multiple clients or generic use cases.

**When to use:**
- Default password gates
- Generic landing pages
- Shared page components

**Naming:** Include descriptive context in filename.

### `_partials/`

**Purpose:** Reusable PHP template components (not full pages).

**Usage:**
```php
// In a template file
include LEANCMS_PLUGIN_DIR . 'templates/pages/_partials/hero-section.php';
```

**Examples:**
- `hero-section.php` - Standard hero component
- `cta-block.php` - Call-to-action section
- `testimonial-card.php` - Testimonial display

## Backwards Compatibility

### Legacy Flat Structure

Old templates in the root `templates/pages/` directory **still work**:

```
templates/pages/slug-refr-brand-guide.php  ← Still resolves correctly
```

The system checks:
1. Client subfolder first: `refr/slug-brand-guide.php`
2. Flat structure fallback: `slug-refr-brand-guide.php`

This allows gradual migration without breaking existing pages.

## Best Practices

### Organization

- ✅ Group templates by client
- ✅ Use meaningful template names
- ✅ Document brand guidelines in client README
- ✅ Archive old versions instead of deleting

### Code Quality

- ✅ Include proper docblocks with `@filepath`
- ✅ Use `defined('ABSPATH') || exit;` security check
- ✅ Follow WordPress coding standards
- ✅ Keep CSS scoped to template (no global conflicts)

### Maintenance

- ✅ Update client READMEs when brand changes
- ✅ Document major template updates
- ✅ Test template resolution after moving files
- ✅ Clean up unused templates to `_archive/`

## Troubleshooting

### Template Not Loading

**Check these in order:**

1. **Page template setting** in WordPress:
   - Page → Edit → Template dropdown → "LeanCMS Full Page"

2. **File exists** in expected location:
   ```bash
   ls templates/pages/refr/slug-brand-guide.php
   ```

3. **Client code registered**:
   - Check `class-template-subfolder-resolver.php`
   - Verify code in `$client_codes` array

4. **Slug matches**:
   - Page slug: `refr-brand-guide`
   - Template file: `refr/slug-brand-guide.php`
   - Client code: `refr`

### Wrong Template Loading

WordPress template hierarchy caches aggressively:

```bash
# Clear cache
wp cache flush

# Or disable caching temporarily in wp-config.php
define('WP_CACHE', false);
```

### File Not Found After Move

Ensure git tracked the move:

```bash
git add templates/pages/refr/slug-new-file.php
git rm templates/pages/slug-refr-new-file.php
git status  # Verify both operations tracked
```

## Related Documentation

- **Filter Reference:** `includes/content/class-template-subfolder-resolver.php`
- **Page Renderer:** `includes/content/class-page-renderer.php`
- **WordPress Template Hierarchy:** https://developer.wordpress.org/themes/basics/template-hierarchy/

## Contributing

When adding new templates:

1. Follow naming conventions
2. Add docblock with `@filepath`
3. Update client README if needed
4. Test template resolution
5. Document in PR description

---

**Last Updated:** 2025-11-07
**Maintained By:** LeanCMS Brand Hub Team
