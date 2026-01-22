# Development Guides

Project guides, testing documentation, and configuration examples for LeanCMS Brand Hub Client plugin development.

## Overview

This directory contains essential guides for developers working on the LeanCMS Brand Hub Client plugin, including project structure, current context, testing procedures, and configuration examples.

## Core Guides

### Project Documentation

- **[Project Structure](project-structure.md)** - Complete architecture overview, file organization, and module breakdown
- **[Current Context](CURRENT-CONTEXT.md)** - Current project status, recent changes, and active development areas
- **[Testing Checklist](TESTING-CHECKLIST.md)** - Comprehensive QA and testing procedures

### Configuration Examples

Location: `config/`

- **[Config Example](config/CONFIG-EXAMPLE.md)** - GitHub token configuration and wp-config.php setup
- **[Section Example](config/SECTION-EXAMPLE.md)** - Section configuration structure and parameter reference

## Quick Reference

| Guide | Purpose | When to Use |
|-------|---------|-------------|
| Project Structure | Understand codebase organization | Starting development, adding new features |
| Current Context | Get up to speed on project status | New developer onboarding, resuming work |
| Testing Checklist | Validate changes before deployment | Before commits, PR reviews, releases |
| Config Example | Set up development environment | Initial setup, GitHub integration |
| Section Example | Build page sections | Creating pages, understanding partials |

## Getting Started

**New developers should read in this order:**

1. **[START-HERE.md](../START-HERE.md)** - Main onboarding guide (in docs root)
2. **[Current Context](CURRENT-CONTEXT.md)** - Current project status
3. **[Project Structure](project-structure.md)** - Architecture overview
4. **[Testing Checklist](TESTING-CHECKLIST.md)** - QA procedures

## Related Documentation

- **Template Library:** `/docs/template-library/` - AI-driven page generation system
- **Partials Guide:** `/docs/partials/` - PHP partial system reference
- **Design System:** `/docs/design-system/` - BEM CSS component library
- **WordPress Patterns:** `/docs/patterns/` - WordPress plugin code patterns

## Configuration Files

### GitHub Integration

See `config/CONFIG-EXAMPLE.md` for setting up:
- GitHub personal access token
- Plugin update checker configuration
- wp-config.php integration

### Section Configuration

See `config/SECTION-EXAMPLE.md` for:
- Section settings structure
- Available parameters
- Content configuration
- Dark mode and spacing options

## Testing & QA

The Testing Checklist covers:

✅ Visual regression testing
✅ Responsive behavior validation
✅ CSS variable functionality
✅ Backward compatibility checks
✅ Component testing procedures
✅ Page template validation

## Support & Questions

For development questions:
1. Check relevant guide in this directory
2. Review main documentation: `/docs/README.md`
3. Check project directives: `/docs/START-HERE.md`
4. Consult WordPress patterns: `/docs/patterns/`

---

**Last Updated:** 2025-11-18
**Maintained By:** Piksoul
