# Design System Documentation

Complete documentation for the LeanCMS BEM design system including component references, migration guides, and implementation research.

## Overview

The LeanCMS design system is built on BEM (Block Element Modifier) methodology, providing a comprehensive set of CSS components for building brand-consistent page templates.

**Current Status:** v2.0.0 - 100% BEM migration complete

## Contents

### BEM Guides

- **[BEM Guide](bem-guide.md)** - Complete BEM class naming reference and component catalog
- **[BEM Migration](bem-migration.md)** - Migration guide from legacy classes to BEM

### Component Reference

Location: `components/`

CSS component documentation showing how to use BEM classes:

- [Button Component](components/button.md) - Button styles, variants, and groups
- [Section Heading Component](components/section-heading.md) - Page and section heading styles
- [Component Template](components/_template.md) - Template for creating new component docs

### Research & Implementation

Location: `research/`

Technical documentation and migration strategy:

- [BEM Implementation](research/BEM-implementation.md) - Implementation details
- [BEM Migration Strategy](research/BEM-migration-strategy.md) - Migration planning and phases

## Design System vs Template Library

**Design System** (this directory) focuses on:
- CSS class reference (how classes work)
- BEM component structure
- Migration from legacy classes
- Styling patterns and conventions

**Template Library** (`/docs/template-library/`) focuses on:
- AI-driven page generation
- Component patterns for page building
- PHP partial integration
- Recipe-based templates

Both work together: Design system provides the CSS foundation, template library provides the implementation patterns.

## Key CSS Components

The design system includes 20+ BEM components:

**Foundation:**
- Section Heading, Button, Button Group
- Grid Layout, Column Layout
- Content Area, Theme System

**Content:**
- Card (11 variants)
- Content Stack/Row/Grid
- List, Progress, Badge

**Media:**
- Image (with figure support)
- Video (YouTube, Vimeo, HTML5)

**Specialized:**
- Metric, Color Swatch
- Hero, CTA Section

## File Location

**CSS File:** `templates/assets/global/lcms-design-system.css`

**Size:** 3,800+ lines of production-ready CSS

**Version:** 2.0.0 (100% BEM migration complete)

## Quick Start

1. **Browse components** in `components/` directory
2. **Check BEM guide** for class naming conventions
3. **Review migration guide** if working with legacy code
4. **Use template library** for page building patterns

## Related Documentation

- **Template Library:** `/docs/template-library/` - AI-driven component system
- **Partials Guide:** `/docs/partials/` - PHP partial system
- **Building Pages:** `/docs/guides/` - Development guides

---

**Version:** 2.0.0
**Last Updated:** 2025-11-18
**CSS Lines:** 3,800+
**Components:** 20+
