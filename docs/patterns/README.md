# WordPress Plugin Code Patterns

This directory documents the standardized code patterns used across LeanCMS Plugin and other WordPress plugins in our ecosystem.

## Overview

We've developed thirteen core pattern categories that cover most WordPress plugin functionality:

1. **Custom Post Types (CPT)**
2. **Content Management**
3. **Commerce Functions**
4. **Notifications**
5. **Portal/Dashboard**
6. **Utilities**
7. **Admin** (Dashboard widgets, columns, views)
8. **Options** (Settings pages)
9. **Meta** (Assets, cache, debug, etc.)
10. **Installer** (Activation, setup, upgrades)
11. **Data Object** (Structured metadata patterns)
12. **Admin Notices** (User feedback system)
13. **Commerce** (Enhanced WooCommerce integration)

## Pattern Files

The actual pattern templates are stored in `.claude/prompts/` for use by Claude Code. This directory provides human-readable documentation and examples.

## Available Patterns

### 1. Custom Post Type (CPT)
**Pattern File:** `.claude/prompts/pattern-cpt.md`

**Purpose:** Create custom post types with proper registration, meta boxes, admin columns, and taxonomies.

**Common Use Cases:**
- Products
- Licenses
- Orders
- Bookings
- Properties
- Events

**Key Features:**
- WordPress standard labels
- Custom admin columns
- Meta box support
- Taxonomy registration
- Archive and single templates

**Slash Command:** `/use-pattern cpt {Name}`

---

### 2. Content Management
**Pattern File:** `.claude/prompts/pattern-content.md`

**Purpose:** Manage dynamic content areas, shortcodes, widgets, and content filters.

**Common Use Cases:**
- Display lists via shortcodes
- Sidebar widgets
- Content injection (before/after)
- Dynamic content areas
- Template overrides

**Key Features:**
- Shortcode handlers
- WordPress widgets (WP_Widget)
- Content filters
- Template system with theme overrides
- AJAX content loading

**Slash Command:** `/use-pattern content {Type}`

---

### 3. Commerce Functions
**Pattern File:** `.claude/prompts/pattern-commerce.md`

**Purpose:** Handle commerce functionality including pricing, payments, and subscriptions.

**Common Use Cases:**
- Pricing calculations
- Payment gateway integration
- Subscription management
- Transaction logging
- Recurring billing

**Key Features:**
- Pricing with tax/discounts
- Payment gateway base class
- Subscription lifecycle management
- Transaction logging
- Webhook handling

**Slash Command:** `/use-pattern commerce {Feature}`

**⚠️ Security:** Never store credit card data. Always use PCI-compliant payment processors.

---

### 4. Notifications
**Pattern File:** `.claude/prompts/pattern-notifications.md`

**Purpose:** Handle all notification types: emails, admin notices, and in-app alerts.

**Common Use Cases:**
- Transactional emails
- Admin notifications
- User alerts
- System messages
- Activity notifications

**Key Features:**
- Email handler with templates
- Admin notice system
- In-app user notifications
- Email logging
- Template system

**Slash Command:** `/use-pattern notifications {Type}`

---

### 5. Portal/Dashboard
**Pattern File:** `.claude/prompts/pattern-portal.md`

**Purpose:** Create user portals, dashboards, account pages, and member areas.

**Common Use Cases:**
- User dashboards
- Account management
- Member portals
- Profile pages
- Custom user areas

**Key Features:**
- Portal page system
- Dashboard widgets
- User profile extensions
- Access control
- Custom templates

**Slash Command:** `/use-pattern portal {Page}`

---

### 6. Utilities
**Pattern File:** `.claude/prompts/pattern-utilities.md`

**Purpose:** Common utility functions, helpers, logging, and data processing.

**Common Use Cases:**
- Data validation
- Input sanitization
- Logging and debugging
- Data formatting
- Helper functions

**Key Features:**
- Validation system (returns WP_Error)
- Sanitization helpers
- Logging system
- Data formatters
- Common helpers

**Slash Command:** `/use-pattern utilities {Type}`

---

### 7. Admin
**Pattern File:** `.claude/prompts/pattern-admin.md`

**Purpose:** Create admin interface customizations including dashboard widgets, admin columns, custom admin views, and meta boxes.

**Common Use Cases:**
- Dashboard widgets
- Custom admin columns
- Admin pages and views
- Meta boxes
- Admin notices
- Bulk actions

**Key Features:**
- Dashboard widget system
- Custom admin column handlers
- Admin page templates
- Meta box management
- WordPress admin UI components
- Admin asset management

**Slash Command:** `/use-pattern admin {Type}`

---

### 8. Options
**Pattern File:** `.claude/prompts/pattern-options.md`

**Purpose:** Create settings pages using WordPress Settings API for plugin configuration and user preferences.

**Common Use Cases:**
- Plugin settings pages
- User preferences
- API configuration
- Feature toggles
- Display options
- Integration settings

**Key Features:**
- WordPress Settings API implementation
- Tabbed settings interface
- Field validation and sanitization
- Multiple field types (text, checkbox, select, etc.)
- Settings export/import
- Organized sections and groups

**Slash Command:** `/use-pattern options {Type}`

---

### 9. Meta
**Pattern File:** `.claude/prompts/pattern-meta.md`

**Purpose:** Create meta/utility classes for assets management, caching, debugging, rendering, and other supporting functionality.

**Common Use Cases:**
- Assets enqueuing (scripts/styles)
- Cache management
- Debug logging
- Template rendering
- Summary/reports generation
- Performance monitoring

**Key Features:**
- Assets manager (frontend/admin)
- Cache manager with WordPress transients
- Debug logger with file output
- Template renderer with theme overrides
- Summary generator for reports
- Base manager class for entities

**Slash Command:** `/use-pattern meta {Type}`

---

### 10. Installer
**Pattern File:** `.claude/prompts/pattern-installer.md`

**Purpose:** Handle plugin installation, activation, deactivation, and uninstallation with proper setup of database structures, default options, version migrations, and cleanup.

**Common Use Cases:**
- Plugin activation/deactivation
- Database table creation
- Default options setup
- Version upgrades
- Data migrations
- Plugin uninstallation cleanup

**Key Features:**
- Activation/deactivation hooks
- Database table creation with dbDelta()
- Default options initialization
- Version tracking and migrations
- Capability management
- Cron event scheduling
- Clean uninstall process

**Slash Command:** `/use-pattern installer`

---

### 11. Data Object
**Pattern File:** `.claude/prompts/pattern-data-object.md`

**Purpose:** Design principles and patterns for structuring complex, version-controlled metadata for Custom Post Types with proper validation, timestamps, and migration strategies.

**Common Use Cases:**
- Complex CPT metadata structures
- Version-controlled data schemas
- Nested entity relationships
- Data validation patterns
- Schema migrations
- Timestamp tracking

**Key Features:**
- Version-controlled root structure
- Nested entity collections
- Timestamp tracking patterns
- Validation strategies (input, structure, integrity)
- Migration patterns between versions
- Get/set/update methods with dot notation
- JSON schema validation (advanced)

**Slash Command:** `/use-pattern data-object`

---

### 12. Admin Notices
**Pattern File:** `.claude/prompts/pattern-admin-notices.md`

**Purpose:** Create WordPress-native admin notice system for user feedback, validation errors, success messages, and warnings with support for transient-based notices that survive redirects.

**Common Use Cases:**
- Success/error/warning/info messages
- Post-redirect notifications
- Validation error display
- Settings save confirmation
- Bulk action results
- Dismissible notices
- Custom post update messages

**Key Features:**
- WordPress-native notice system
- Transient-based notices (survives redirects)
- Dismissible notices
- WP_Error integration
- Settings error integration
- Custom post update messages
- Persistent notices with user dismissal tracking

**Slash Command:** `/use-pattern admin-notices`

---

### 13. Commerce (Enhanced)
**Pattern File:** `.claude/prompts/pattern-commerce.md`

**Purpose:** Comprehensive commerce functionality including pricing calculations, payment processing, subscriptions, and WooCommerce integration for cart handling, checkout customization, and order processing.

**Common Use Cases:**
- WooCommerce cart integration
- Custom checkout flows
- Order processing automation
- License/subscription renewals
- Dynamic pricing
- Pro-rata calculations
- Custom product creation

**Key Features:**
- Commerce Manager (orchestrator)
- Cart Handler (add to cart via URL, custom pricing)
- Checkout Handler (field pre-fill, validation)
- Order Processor (post-purchase processing)
- Commerce Helpers (utilities)
- Expiry date extensions
- Renewal history tracking
- Pro-rata calculations

**Slash Command:** `/use-pattern commerce {Component}`

---

## Using Patterns

### With Claude Code

The easiest way to use patterns is via the `/use-pattern` slash command:

```
/use-pattern cpt Product
/use-pattern notifications email
/use-pattern utilities logger
```

### Manual Implementation

1. **Choose Pattern:** Select the appropriate pattern from above
2. **Read Pattern File:** Review `.claude/prompts/pattern-{type}.md`
3. **Copy Template:** Copy the relevant code template
4. **Replace Placeholders:** Replace all `{placeholders}` with actual values
5. **Follow Checklist:** Complete the security and testing checklists
6. **Integrate:** Add to main plugin file as instructed

## Pattern Structure

Each pattern includes:

- **Purpose:** What the pattern is for
- **WordPress Standards:** Standards and best practices
- **File Structure:** Where to create files
- **Code Template:** Boilerplate code with placeholders
- **Required Functions:** Minimum functions needed
- **Security Checklist:** Security requirements
- **Common Variations:** Alternative implementations
- **Testing Checklist:** What to test
- **Integration Points:** How to integrate with plugin
- **Placeholders:** List of all placeholders to replace

## Placeholder Convention

All patterns use a consistent placeholder format:

| Format | Example | Description |
|--------|---------|-------------|
| `{Name}` | `{Product}` | PascalCase class names |
| `{name}` | `{product}` | lowercase function/variable names |
| `{NAME}` | `{PRODUCT}` | UPPERCASE constants |
| `{name-slug}` | `{product-slug}` | Hyphenated slugs for URLs |
| `{name_slug}` | `{product_slug}` | Underscored slugs for database |

## Security Requirements

All patterns enforce these security practices:

✅ **Always Required:**
- Input sanitization
- Output escaping
- Nonce verification (forms)
- Capability checks
- Data validation

❌ **Never Do:**
- Trust user input
- Skip sanitization
- Hardcode credentials
- Store sensitive data in plain text
- Use `$_GET`/`$_POST` directly without sanitization

## WordPress Coding Standards

All patterns follow:

- [WordPress PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
- [WordPress JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/)
- [WordPress Accessibility Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/accessibility/)

## Pattern Combinations

Patterns can be combined for complex features:

**Example: E-commerce Product**
1. Use **CPT pattern** to create Product post type
2. Use **Admin pattern** for custom admin columns and meta boxes
3. Use **Options pattern** for shop settings page
4. Use **Commerce pattern** for pricing and payments
5. Use **Content pattern** for product display shortcodes
6. Use **Notifications pattern** for order emails
7. Use **Meta pattern** for assets, caching, and logging
8. Use **Utilities pattern** for validation and formatting

## Best Practices

### When Creating New Functionality:

1. **Check if pattern exists** for your use case
2. **Use the pattern** rather than writing from scratch
3. **Follow the checklist** from the pattern
4. **Test thoroughly** using the testing checklist
5. **Document changes** in project directives

### When Modifying Patterns:

1. **Update the pattern file** in `.claude/prompts/`
2. **Document the change** with date and reason
3. **Update this README** if major change
4. **Update directives** if impacts multiple plugins

### Code Review:

1. Verify pattern was followed correctly
2. Check all placeholders were replaced
3. Confirm security checklist completed
4. Test core functionality
5. Review for WordPress standards compliance

## Pattern Maintenance

### Adding New Patterns:

1. Create pattern file in `.claude/prompts/pattern-{name}.md`
2. Follow existing pattern structure
3. Include all standard sections
4. Add slash command in `.claude/commands/`
5. Update this README
6. Document in project directives

### Updating Existing Patterns:

1. Edit pattern file in `.claude/prompts/`
2. Add changelog comment at top of file
3. Update version/date
4. Test with example implementation
5. Update related documentation

## Quick Reference

| Need To... | Use Pattern | Slash Command |
|------------|-------------|---------------|
| Create custom data type | CPT | `/use-pattern cpt {Name}` |
| Add shortcode/widget | Content | `/use-pattern content shortcode` |
| Handle payments | Commerce | `/use-pattern commerce payment` |
| Send emails | Notifications | `/use-pattern notifications email` |
| Create user dashboard | Portal | `/use-pattern portal dashboard` |
| Add validation | Utilities | `/use-pattern utilities validator` |
| Add dashboard widget | Admin | `/use-pattern admin widget` |
| Customize admin columns | Admin | `/use-pattern admin columns` |
| Create settings page | Options | `/use-pattern options settings` |
| Enqueue assets | Meta | `/use-pattern meta assets` |
| Add caching | Meta | `/use-pattern meta cache` |
| Debug logging | Meta | `/use-pattern meta logger` |
| Plugin activation/setup | Installer | `/use-pattern installer` |
| Complex CPT metadata | Data Object | `/use-pattern data-object` |
| Admin feedback messages | Admin Notices | `/use-pattern admin-notices` |
| WooCommerce integration | Commerce | `/use-pattern commerce cart` |
| Checkout customization | Commerce | `/use-pattern commerce checkout` |
| Order processing | Commerce | `/use-pattern commerce order` |

## Support

For questions about patterns:
1. Check the pattern file in `.claude/prompts/`
2. Review this documentation
3. Check project directives: `docs/start-here.md`
4. Use `/use-pattern` slash command for guided implementation

## Related Documentation

- **Project Directives:** `docs/start-here.md`
- **Claude Commands:** `.claude/README.md`
- **WordPress Codex:** https://codex.wordpress.org/
- **WordPress Developer Handbook:** https://developer.wordpress.org/

---

**Last Updated:** 2025-10-26
**Maintained By:** Piksoul
**Pattern Version:** 2.0 (Added Installer, Data Object, Admin Notices; Enhanced Commerce)
