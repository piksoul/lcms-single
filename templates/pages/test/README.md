# Test Templates (TEST) - Documentation

Test and example templates for demonstrating LeanCMS features and functionality.

## Client Information

**Client Code:** `test`
**Type:** Test/Demo Templates
**Purpose:** Feature demonstrations, examples, and testing

## Active Templates

### Example Templates

1. **slug-hello-world.php**
   - Simple "Hello World" demonstration
   - Modern minimalist theme
   - Basic template structure example

2. **slug-hello-world-2.php**
   - Theme Factory demonstration
   - Multi-theme showcase
   - Advanced styling examples

3. **slug-leanos-cms.php**
   - LeanOS CMS test page
   - Minimal inline styling
   - Dynamic rendering demonstration

## Naming Conventions

**Template Files:**
- Format: `slug-{page-name}.php`
- No `test-` prefix needed (implied by folder)
- Descriptive names indicating purpose

**Examples:**
```
✅ slug-hello-world.php
✅ slug-feature-demo.php
❌ slug-test-hello-world.php (redundant prefix)
```

## Purpose

These templates serve as:
- **Examples:** Reference implementations for new templates
- **Tests:** Verify template resolution and rendering
- **Demos:** Showcase LeanCMS capabilities
- **Prototypes:** Rapid feature testing

## Design Notes

**No Strict Brand Guidelines:**
- Test templates can use any styling
- Focus on functionality over aesthetics
- Inline styles acceptable for simplicity
- Experimentation encouraged

**Keep It Simple:**
- Minimal dependencies
- Inline CSS for quick testing
- Clear, commented code
- Easy to understand

## Usage

Create WordPress pages with slugs like:
- `test-hello-world` → Uses `test/slug-hello-world.php`
- `test-feature-demo` → Uses `test/slug-feature-demo.php`
- `test-new-idea` → Create `test/slug-new-idea.php`

## Development Guidelines

1. **Document Purpose:** Add clear description in template header
2. **Keep Simple:** Avoid over-engineering test templates
3. **Comment Well:** Explain what you're testing
4. **Clean Up:** Archive or delete when no longer needed

## Archive Policy

Move outdated test templates to `_archive/` when:
- Feature is fully implemented and tested
- Template served its temporary purpose
- Replaced by better example

---

**Last Updated:** 2025-11-07
**Maintained By:** LeanCMS Brand Hub Team
**Status:** Active Development
