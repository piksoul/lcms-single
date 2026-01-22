# Brand Hub - Client CMS Documentation

Complete documentation for the LeanCMS Brand Hub Client plugin.

**Version:** 2.1.0
**Last Updated:** 2025-11-18

---

## 📚 Table of Contents

### Getting Started
- [**START HERE**](START-HERE.md) - New developer onboarding guide
- [**Current Context**](guides/CURRENT-CONTEXT.md) - Project status and recent changes
- [**Project Structure**](guides/project-structure.md) - Architecture overview and file organization

### Building Pages
- [**Template Library**](template-library/README.md) - AI-driven component system and patterns ⭐ **NEW**
- [**Pro-Sites Partials**](partials/pro-sites.md) - Comprehensive guide to the partial system
- [**Quick Reference**](partials/quick-reference.md) - Copy-paste examples and parameter cheat sheet
- [**Section Examples**](guides/config/SECTION-EXAMPLE.md) - Real-world section examples
- [**Config Examples**](guides/config/CONFIG-EXAMPLE.md) - Configuration patterns

### Design System
- [**BEM Guide**](design-system/bem-guide.md) - BEM class naming and component reference
- [**BEM Migration**](design-system/bem-migration.md) - Migration guide from legacy classes
- [**Components**](design-system/components/) - Individual CSS component documentation
  - [Section Heading](design-system/components/section-heading.md)
  - [Button](design-system/components/button.md)
  - [Component Template](design-system/components/_template.md)

### Development
- [**Testing Checklist**](guides/TESTING-CHECKLIST.md) - QA checklist for releases
- [**WordPress Patterns**](patterns/README.md) - Reusable WordPress plugin code patterns

### Research & Architecture
- [**BEM Implementation**](design-system/research/BEM-implementation.md) - BEM architecture decisions
- [**BEM Migration Strategy**](design-system/research/BEM-migration-strategy.md) - Migration planning

---

## 🚀 Quick Start

### New to this project?

**Start here:**

1. Read [**START HERE**](START-HERE.md) for environment setup
2. Review [**Project Structure**](guides/project-structure.md) to understand the codebase
3. Check [**Current Context**](guides/CURRENT-CONTEXT.md) for project status
4. Browse [**Quick Reference**](partials/quick-reference.md) for common patterns

### Building a page?

**Use this workflow:**

1. **Check Template Library** - Browse [template-library](template-library/README.md) for pre-built patterns and recipes
2. **Copy Examples** - Use [Quick Reference](partials/quick-reference.md) for proven code patterns
3. **Customize Partials** - Reference [Pro-Sites Partials](partials/pro-sites.md) for all configuration options
4. **Apply BEM Classes** - Use [BEM Guide](design-system/bem-guide.md) for styling
5. **Test Changes** - Follow [Testing Checklist](guides/TESTING-CHECKLIST.md)

### Building with AI?

**Use the Template Library system:**

1. **Choose Content Type:**
   - Type 1 (Structured): Use [recipes](template-library/recipes/) for project docs
   - Type 2 (Supplied): AI selects [components](template-library/components/) for your content
   - Type 3 (Creative): AI composes pages following [composition rules](template-library/composition/)

2. **Browse Components:**
   - [Widgets](template-library/components/widgets/) - Small UI elements
   - [Sections](template-library/components/sections/) - Page sections
   - [Patterns](template-library/components/patterns/) - Complex layouts

3. **Reference Implementation:**
   - [Partials Guide](template-library/partials/) - PHP partial system integration
   - [Content Renderers](partials/pro-sites.md) - Available content types

---

## 📖 Documentation Structure

```
docs/
├── README.md                    # This file - documentation index
├── START-HERE.md                # New developer onboarding
│
├── guides/                      # Development guides
│   ├── CURRENT-CONTEXT.md       # Project status
│   ├── project-structure.md     # Architecture overview
│   ├── TESTING-CHECKLIST.md     # QA procedures
│   └── config/                  # Configuration examples
│       ├── CONFIG-EXAMPLE.md    # GitHub setup
│       └── SECTION-EXAMPLE.md   # Section config reference
│
├── template-library/            # AI-driven component system ⭐ NEW
│   ├── components/              # Reusable BEM patterns
│   │   ├── widgets/             # Small UI elements
│   │   ├── sections/            # Page sections
│   │   └── patterns/            # Complex layouts
│   ├── recipes/                 # Pre-built page templates
│   ├── composition/             # AI composition rules
│   └── partials/                # PHP partial integration docs
│
├── partials/                    # PHP partial system
│   ├── pro-sites.md             # Complete partial guide
│   ├── quick-reference.md       # Copy-paste examples
│   └── loader-reference.md      # Asset loading guide
│
├── design-system/               # BEM CSS components
│   ├── bem-guide.md             # BEM class reference
│   ├── bem-migration.md         # Migration guide
│   ├── components/              # CSS component docs
│   └── research/                # Implementation research
│
├── patterns/                    # WordPress plugin code patterns
├── examples/                    # Example theme files
└── source/                      # Source materials
```

---

## 🎯 Key Concepts

### Three Systems Working Together

1. **Design System** (`design-system/`)
   - CSS class library (BEM methodology)
   - Component styling reference
   - 20+ production-ready components

2. **Partial System** (`partials/`)
   - PHP template engine
   - Layout mechanisms (column, 2-column, grid)
   - Content type renderers (image, video, html, etc.)

3. **Template Library** (`template-library/`) ⭐ **NEW**
   - AI-driven page generation
   - Component patterns and recipes
   - Composition rules and guidelines

**Together:** Design System provides CSS → Partial System implements layouts → Template Library guides AI to build pages

---

## 📋 Documentation Standards

### When to Update Documentation

- **Add new components** → Create pattern in `template-library/components/`
- **Add CSS component** → Create doc in `design-system/components/`
- **Add new partials** → Update `partials/pro-sites.md`
- **Change BEM classes** → Update `design-system/bem-guide.md`
- **Add features** → Update relevant guide + quick reference

### Documentation Structure

- **Comprehensive Guides** - Full parameter lists, examples, use cases
- **Quick References** - Copy-paste examples, parameter tables
- **Component Docs** - Individual component specifications
- **Research Docs** - Architecture decisions and planning

---

## 🔗 External Resources

- [Plugin Repository](https://github.com/piksoul/lcms-brandhub-client)
- [WordPress Codex](https://codex.wordpress.org/)
- [BEM Methodology](https://getbem.com/)
- [PHP Documentation](https://www.php.net/docs.php)

---

## 📝 Contributing

When updating documentation:

1. Keep examples working and tested
2. Update version numbers and dates
3. Cross-reference related documents
4. Use clear, concise language
5. Include copy-paste ready examples

---

**Questions?** Check [START-HERE.md](START-HERE.md) or review the relevant guide above.
