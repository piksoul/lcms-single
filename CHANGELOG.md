# Changelog

All notable changes to the Brand Hub - Client CMS will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.1.31] - 2026-01-13

### Documentation - Visual Builder Testing Complete

- **Updated README.md with Development Roadmap**
  - Added Visual Layout Builder feature section
  - Added priority todo list for next development phase
  - Documented recently completed features (v2.1.30)

- **Documentation Audit**
  - Updated START-HERE.md with current version and status
  - Verified main documentation files are current

## [2.1.30] - 2026-01-13

### Enhanced - Partial Registry Optimization

- **Excluded `_lib` Folders from Partial Registry**
  - Internal component folders prefixed with underscore (`_lib`) now skipped during discovery
  - Prevents naming collisions (e.g., `pro-sites/grid` vs `pro-sites/_lib/content/grid`)
  - Keeps registry clean with only user-facing partials
  - `_lib` components still work internally via direct `include`

## [2.1.29] - 2026-01-13

### Refactored - Simplified Partial Naming Convention

- **Removed `-section` Suffix Auto-Stripping from Partial Registry**
  - Filename now equals API name (no hidden transformations)
  - Simpler mental model: `hero.php` → call as `hero`

- **Renamed 10 Partial Files**
  - `hero-section.php` → `hero.php`
  - `cta-section.php` → `cta.php`
  - `color-palette-section.php` → `color-palette.php`
  - `typography-section.php` → `typography.php`
  - `logo-section.php` → `logo.php`
  - `guidelines-section.php` → `guidelines.php`
  - `spacing-section.php` → `spacing.php`
  - `column-section.php` → `column.php`
  - `2-column-section.php` → `2-column.php`
  - `grid-section.php` → `grid.php`

- **Updated `@filepath` References** in all renamed files

## [2.1.28] - 2026-01-10

### Added - Visual Layout Builder Phase 3 Complete

- **Mode Toggle Tabs** - Code/Visual mode switching in layout editor
- **Visual Block List** - Renders partial blocks with folder, config key, wrapper info
- **Drag-Drop Reorder** - jQuery UI Sortable for visual block ordering
- **Add/Remove Blocks** - Add new partials, delete existing ones
- **Config Key Editing** - Set config reference for each block
- **Wrapper Class Editing** - Optional wrapper div with custom class
- **Structure Persistence** - Visual mode saves to `structure` array in layout meta

## [2.1.3] - 2025-11-19

### Refactored - Pro-Sites Demo Template with BEM Methodology

- **Regenerated `slug-pro-sites-demo.php` Template with Full BEM Integration**
  - **Hero Section**: Replaced custom inline-styled hero with proper `lcms-hero` BEM component
    - Added `lcms-hero__badge`, `lcms-hero__title`, `lcms-hero__subtitle` elements
    - Integrated `lcms-button-group` with alignment modifiers for call-to-action buttons

  - **Button Components**: Applied proper BEM button classes throughout
    - `lcms-button` with modifiers: `--primary`, `--secondary`, `--outline`
    - `lcms-button-group` with `--align-center` modifier

  - **Card Components**: Enhanced content type showcase with BEM card structure
    - `lcms-card` with `lcms-card__content` and `lcms-card__header` elements
    - `lcms-badge` component for content type icons with color variables

  - **Grid Layouts**: Applied BEM grid classes for structured layouts
    - `lcms-content-grid` with column modifiers (`--4col`)
    - Responsive grid behavior via BEM system

  - **List Components**: Added semantic list classes
    - `lcms-list` for properly styled feature lists

  - **Footer Section**: Used `lcms-cta-section` component for footer styling

- **Code Quality Improvements**
  - Removed heavy inline styles in favor of BEM classes
  - Better separation of concerns between structure and styling
  - Improved maintainability and consistency with LeanCMS design system
  - All pro-sites partial functionality preserved (grid, column, 2-column)
  - Content remains identical to previous version
  - Updated template version to 1.2.5

- **Design System Alignment**
  - Template now fully leverages LeanCMS BEM design system
  - CSS variables for showcase colors maintained
  - Consistent with BEM methodology across all components
  - Better integration with `lcms-design-system.css`

## [2.1.2] - 2025-11-19

### Enhanced - Pro-Sites Test Templates

- **Updated All 6 Pro-Sites Test Templates with BEM Components and Template Library Patterns**
  - **2-Column Template** (`slug-pro-sites-test-2-column.php`)
    - Test 1: Added BEM badge component with `lcms-list--check` integration
    - Test 2: Added BEM `progress-bar-large` components showing project milestones (100%, 65%, 20%)
    - Test 7: Added BEM `metric-card` components with success/warning/default variants

  - **Grid Template** (`slug-pro-sites-test-grid.php`)
    - Test 16: 4-column grid of BEM metric cards with different states
    - Test 17: Badge grid showcasing all badge variants (success, warning, error, info) in dark mode

  - **HTML Template** (`slug-pro-sites-test-html.php`)
    - Test 5: BEM numbered timeline (vertical) using `lcms-timeline-vertical` + `lcms-step-number`
    - Test 8: FAQ list pattern with `lcms-faq-list` in dark mode
    - Test 9: Numbered timeline (horizontal) using `lcms-timeline-horizontal`

  - **Image Template** (`slug-pro-sites-test-image.php`)
    - Test 10: Image wrapped in `lcms-card` component with media, body, and actions sections
    - Test 11: Image with badge overlay pattern

  - **Text Template** (`slug-pro-sites-test-text.php`)
    - Test 11: BEM list variants (`lcms-list--check`, `lcms-list--bullet`, `lcms-list--number`)
    - Test 12: Text with inline badges and card integration

  - **Video Template** (`slug-pro-sites-test-video.php`)
    - Test 11: Video wrapped in `lcms-card` with badges and action buttons
    - Test 12: Video with `lcms-progress-bar-large` showing course progress

- **Showcased Components**
  - BEM Badges: `lcms-badge` with modifiers (success, warning, error, info)
  - Progress Bars: `lcms-progress-bar-large` with success/warning variants
  - Metric Cards: `lcms-metric-card` for data visualization
  - Lists: `lcms-list` with check, bullet, and number variants
  - Cards: `lcms-card` structure with media, body, and actions
  - Timelines: `lcms-timeline-vertical` and `lcms-timeline-horizontal` with `lcms-step-number`
  - FAQ Pattern: `lcms-faq-list` structure

### Fixed - Global Panels Orchestrator

- **Corrected Footer-Ad Partial Path in Global Panels Orchestrator**
  - Updated partial path from `'footer-ad'` with folder `'global-panels'` to full namespaced path `'global-panels/footer-ad/footer-ad'`
  - Fixed "Partial not found in registry" error when global footer panel is enabled
  - File structure: `_partials/global-panels/footer-ad/footer-ad.php`
  - Registry discovers as: `'global-panels/footer-ad/footer-ad'`
  - Orchestrator now uses correct namespaced path to match registry discovery

- **Re-enabled Global Footer Panel**
  - Set `'enabled' => true` in global config after fixing partial path
  - Panel now renders correctly on all LeanCMS pages

## [2.1.1] - 2025-11-18

### Added - Template Library System

- **Template Library System for AI-Driven Page Generation**
  - Complete component library with recipes, patterns, and composition rules
  - Supports three content workflows: structured (Type 1), supplied (Type 2), creative (Type 3)
  - 9 core components across widgets, sections, and patterns
  - 3 production-ready recipes: project-idea, landing-page, resources-page
  - Composition rules for AI-guided creative assembly
  - Quality metrics: 90-95% from production testing

- **Template Library Builder Skill** (`.claude/skills/template-library-builder/`)
  - AI skill for complete page generation using template library
  - Trigger patterns: "Create a landing page", "Build a page for..."
  - Executes Type 1/2/3 workflows automatically
  - Validates BEM compliance and composition rules
  - Integration with Pro-Sites partial system

### Added - BEM Components

- **Step Number Component** (`.lcms-step-number`)
  - Large numbered indicators for sequential processes and timelines
  - Base class: 48px, bold, primary color
  - Color modifiers: `--primary`, `--accent`, `--success`, `--muted`
  - Size modifiers: `--small` (32px), `--medium` (48px), `--large` (64px), `--xlarge` (80px)
  - Style modifiers: `--circle` (outlined), `--filled` (solid background)
  - Location: `templates/assets/global/lcms-design-system.css` (lines 2572-2673)

- **Image Modifiers** (`.lcms-image`)
  - `--responsive`: Full-width responsive image styling
  - `--rounded`: Rounded corners with overflow hidden

- **Figure Component** (`.lcms-figure`)
  - Semantic wrapper for images with captions
  - `.lcms-figure__caption`: Caption element styling
  - Proper accessibility with `<figure>` and `<figcaption>` elements

### Added - Template Library Patterns

- **Numbered Timeline Pattern** (horizontal & vertical variants)
  - Sequential process steps for "How It Works" sections
  - Horizontal: Grid-based layout (2-4 columns) with centered steps
  - Vertical: Stacked layout with connector lines between steps
  - Supports 2-6 steps (3-5 optimal)
  - Uses `.lcms-step-number` component
  - Documentation: `docs/template-library/components/patterns/numbered-timeline/`

- **FAQ List Pattern** (simple structure)
  - Static Q&A list optimized for SEO and accessibility
  - 5-8 FAQs optimal, 12 maximum
  - SEO benefits: all content indexed, FAQPage schema eligible
  - No accordion (Phase 2 enhancement option)
  - Documentation: `docs/template-library/components/patterns/faq-list/`

- **Feature Showcase Pattern** (image-text alternating)
  - Alternating image-text layouts for product/service features
  - 50/50 or asymmetric splits
  - Image left/right variants for visual rhythm
  - Uses 2-column partial with BEM components
  - Documentation: `docs/template-library/components/patterns/feature-showcase/`

### Documentation

- **Reorganized Documentation Structure**
  - Created `docs/design-system/` for BEM CSS documentation
  - Created `docs/guides/` for development guides and configuration
  - Created `docs/partials/` README for PHP partial system
  - Consolidated component docs from duplicate directories
  - Updated all cross-references to new structure

- **Template Library Documentation**
  - `docs/template-library/README.md`: Complete system overview
  - `docs/template-library/components/`: Component catalog (widgets, sections, patterns)
  - `docs/template-library/recipes/`: Pre-built page templates
  - `docs/template-library/composition/`: AI composition rules
  - `docs/template-library/partials/2-column-section.md`: 2-column partial guide

- **Updated Main README**
  - Added Template Library quick start section
  - Added three-system integration explanation (Design System + Partial System + Template Library)
  - Updated documentation structure diagram
  - Added "Building with AI" workflow guide

### Updated

- **Pro-Sites Builder Skill** (v2.0.0 → v2.1.0)
  - Fixed BEM guide path: `docs/bem-guide.md` → `docs/design-system/bem-guide.md`
  - Added template library integration references
  - Added Related Skills section explaining Template Library Builder
  - Clarified complementary role (section-level vs. page-level)

- **Pull Request Template**
  - Replaced outdated v1.4.6 specific content with generic template
  - Removed "~60% complete" BEM migration references (now 100%)

### Testing Results

- **Packaging Campaign Landing Page** (slug-packaging-campaign.php)
  - Quality Score: 94/100
  - Generated using Template Library Builder skill
  - 11 sections with perfect composition rule compliance
  - Perfect dark/light alternation
  - 100% BEM compliance
  - All required patterns used correctly

- **Image-Rich Landing Pages** (slug-landing-page-03.php, slug-landing-page-04.php)
  - Quality Scores: 93-95/100
  - Proper image integration with BEM classes
  - Successful pattern discovery (feature-showcase)

### Files Changed

**New Files:**
- `.claude/skills/template-library-builder/SKILL.md`
- `docs/template-library/` (complete directory structure)
- `docs/design-system/` (reorganized BEM docs)
- `docs/guides/` (reorganized development guides)
- `docs/partials/README.md`
- Multiple pattern JSON and README files

**Modified Files:**
- `.claude/skills/pro-sites-builder/SKILL.md` (v2.1.0)
- `templates/assets/global/lcms-design-system.css` (+146 lines)
- `docs/README.md` (complete rewrite)
- `.github/pull_request_template.md` (generic template)

**Total Lines Added:** ~3,200 (documentation + CSS + patterns)

---

## [2.1.0] - 2025-11-17

### Added
- **Dark Theme Typography Support**
  - Added `.lcms-pro-sites--dark .lcms-content h1-h6` color overrides
  - Added `.lcms-pro-sites--dark .lcms-content p` color overrides
  - Ensures proper text contrast on dark backgrounds
  - Uses `var(--color-text-light, rgba(255, 255, 255, 0.95))` for consistency

- **Card Component Padding**
  - Added default padding to `.lcms-card` component
  - Uses `var(--spacing-horizontal, 20px)` for consistent spacing
  - Maintains proper content spacing within cards

- **CSS Variables - Spacing System**
  - Added `--spacing-heading-bottom: 0` for heading margin control
  - Added `--spacing-horizontal: 20px` for horizontal spacing consistency
  - Updated `--spacing-section` to `80px` (simplified from `80px 60px`)
  - Updated `--spacing-section-mobile` to `30px` (simplified from `60px 30px`)

### Documentation
- **Utility Classes Clarification**
  - Confirmed utility classes should remain flat (non-BEM) per design system guidelines
  - Utilities are single-purpose, atomic classes for rapid composition
  - BEM reserved for semantic, multi-property component patterns
  - Follows industry standards (Tailwind, Bootstrap approach)

---

## [2.0.9] - 2025-11-17

### Added
- **Todo List Component** (`.lcms-list--todo`)
  - New list variant with per-item state control for task lists
  - Default unchecked state shows circle (○) in gray
  - Checked state modifier (`.lcms-list__item--checked`) shows checkmark (✓) in green
  - Enables individual task tracking instead of all-or-nothing checkmarks
  - Documented in BEM Classes Guide with examples

- **Flex Container Layout**
  - Added `display: flex` and `flex-direction: column` to `.lcms-container`
  - Added `gap: var(--container-gap, 30px)` for automatic spacing
  - Enables gap-based layouts instead of margin utilities
  - Customizable via `--container-gap` CSS variable

### Fixed
- **List Icon Display**
  - Fixed `.lcms-list--check` to display ✓ (was showing control character)
  - Fixed `.lcms-list--cross` to display ✗ (was showing control character)
  - Icons now render correctly in all browsers

- **Mobile Responsive**
  - Added responsive behavior for `.lcms-row` component
  - Flips to column direction (`flex-direction: column`) below 768px
  - Items now stack vertically on mobile devices with full width

- **Progress Bar Structure**
  - Migrated all progress bars to proper BEM structure (`.lcms-progress`)
  - Changed legacy `progress-bar-container` → `.lcms-progress`
  - Changed legacy `progress-bar-fill` → `.lcms-progress__bar`
  - Added `.lcms-progress__label` for percentage display
  - Applied `.lcms-progress--large` modifier where appropriate

### Changed
- **BEM Component Migration** (proj/slug-project-overview.php)
  - Replaced `metric-grid`, `metric-card` → `.lcms-metric .lcms-metric--transparent`
  - Replaced `feature-card`, `roadmap-card` → `.lcms-card` / `.lcms-card--compact`
  - Replaced `icon-list` → `.lcms-list .lcms-list--arrow .lcms-list--spacious`
  - Replaced `phase-box` → `.lcms-list .lcms-list--todo`
  - Replaced all custom funding classes → `.lcms-card` with inline styles
  - 100% BEM compliance achieved - zero custom CSS classes

- **Gap-Based Spacing Architecture**
  - Removed ALL margin utility classes (`.mb-*`, `.mt-*`) from templates
  - Replaced with `flex-direction: column` + `gap` at container level
  - Standardized on gap values: 16px (related items), 24px (major sections)
  - Cleaner, more predictable layout system
  - Spacing controlled at container level, not element level

- **Status Badge Updates**
  - Migrated `status-badge status-in-progress` → `.lcms-badge .lcms-badge--warning`
  - Migrated `status-badge status-not-started` → `.lcms-badge .lcms-badge--secondary`
  - Migrated `status-badge status-not-funded` → `.lcms-badge .lcms-badge--danger`

### Documentation
- **BEM Classes Guide**
  - Added comprehensive list type documentation (check, cross, todo, arrow, bullet, numbered, icon)
  - Added item state modifiers for todo lists with examples
  - Documented check list, todo list, and icon list usage patterns
  - Clear examples showing per-item state control vs. all-or-nothing patterns

### Technical Details
- **Spacing System**
  - Container-level gap replaces element-level margins
  - `.lcms-content` retains typography rhythm (margin-top: 2em, margin-bottom: 0.75em) for long-form content
  - Base elements maintain `margin: 0` (h1-h6, p, ul, ol)
  - Exceptional spacing uses inline styles instead of utility classes

- **Component Improvements**
  - All BEM components now properly structured with elements (`.lcms-*__element`)
  - All list variants use `.lcms-list__item` for proper styling
  - Progress bars use BEM structure with `__bar` and `__label` elements
  - Metrics use proper `__label`, `__value`, `__description` structure

### Breaking Changes
None - all changes are backward compatible. Margin utilities still exist in CSS but are deprecated in favor of gap-based layouts.

---

## [2.0.8] - 2025-11-17

### Added
- **Comprehensive Dark Mode CSS**
  - Added complete dark mode styling for `.lcms-pro-sites--dark` modifier
  - Base section background and text color inversion
  - All headings (h1-h6) use light text color
  - Section heading component elements styled for dark mode
  - Body text, paragraphs, and list items use light text
  - Links styled with brand accent colors and hover states
  - Fully functional dark mode for all components

### Changed
- **Design System CSS Enhancement**
  - Updated dark mode implementation with 6 new style groups
  - Uses existing CSS variables from client config (color-brand-primary, color-text-light, color-brand-accent)
  - Supports all three dark mode class variants: `.dark-mode`, `.lcms-section--dark`, `.lcms-pro-sites--dark`
  - Background: `var(--color-brand-primary, #1a1a1a)`
  - Text: `var(--color-text-light, rgba(255, 255, 255, 0.95))`
  - Links: `var(--color-brand-accent)` with hover variant
  - 68 new CSS selectors for comprehensive coverage

### Technical Details
- **CSS Selectors Added**: 68 selectors across 6 style groups
- **Style Groups**:
  1. Base section (background + text)
  2. Headings (h1-h6)
  3. Section heading component
  4. Body text and content
  5. Links (default + hover)
  6. Buttons (secondary + outline - enhanced)
- **CSS Variables Used**: All from existing client config system
- **Backward Compatible**: Supports all three dark mode class variants

### Dark Mode Coverage
When `.lcms-pro-sites--dark` is applied, the following automatically adjust:
- ✅ **Section background** - Dark brand primary color
- ✅ **All headings** - Light text color
- ✅ **Section headings** - Title, description, label all light
- ✅ **Body text** - Paragraphs, content, lists all light
- ✅ **Links** - Brand accent color with hover state
- ✅ **Buttons** - Secondary and outline variants (pre-existing)
- ✅ **Cards** - Subtle background variants (pre-existing)

### CSS Variables Integration
Uses client config variables for consistency:
```css
background: var(--color-brand-primary, #1a1a1a);
color: var(--color-text-light, rgba(255, 255, 255, 0.95));
/* Links */
color: var(--color-brand-accent, #ff6b35);
/* Hover */
color: var(--color-brand-accent-hover, #ff8c5a);
```

### Benefits
- Complete dark mode functionality for all text elements
- Consistent with client-specific brand colors
- No hardcoded colors (uses CSS variables)
- Works across all three dark mode class variants
- Backward compatible with legacy implementations
- Proper color contrast for accessibility

### Files Modified
- **lcms-design-system.css** - Added 68 new selectors (6 style groups)
- **leancms.php** - Version updated to 2.0.8
- **CHANGELOG.md** - v2.0.8 release notes

#release

## [2.0.7] - 2025-11-17

### Added
- **BEM Classes Reference Guide** (BEM-CLASSES-GUIDE.md)
  - Comprehensive 800+ line reference documentation for all BEM components
  - Organized into 12 sections: Layout, Section Utilities, Typography, Buttons, Content, Cards, Grids, Metrics, Lists, Badges, Specialized Sections, Content Renderers
  - Complete documentation for 20+ components with all modifiers
  - Detailed HTML examples for each component
  - Quick reference table for common components
  - CSS variables reference
  - Real-world usage examples and patterns
  - Mobile-first responsive design notes

- **Container-Level Inline CSS Support** (`container_css`)
  - Added `container_css` parameter to wrapper-open.php for inline styles on `.lcms-container`
  - Enables separation of section-level and container-level inline styles
  - Supports negative margins and spacing adjustments at container level
  - Perfect for floating card layouts with custom positioning
  - Four-level styling system: `custom_classes`, `custom_css`, `container_classes`, `container_css`

### Changed - BEM Compliance
- **Dark Mode - BEM Migration** (BREAKING for manual class usage)
  - Migrated from non-BEM `.dark-mode` utility to BEM modifier `.lcms-pro-sites--dark`
  - Updated wrapper-open.php to apply `.lcms-pro-sites--dark` when `dark_mode => true`
  - Updated design system CSS to support `.lcms-pro-sites--dark` modifier
  - **Breaking**: Manual usage of `'custom_classes' => 'dark-mode'` should migrate to `'dark_mode' => true`
  - Backward compatible: `.dark-mode` and `.lcms-section--dark` still supported in CSS
  - Recommended approach: Use `'dark_mode' => true` parameter (BEM-compliant)

### Changed
- **Wrapper Template Enhancement**
  - Added container-level inline CSS support
  - Updated documentation with BEM dark mode modifier reference
  - Added @since 2.0.7 notes for container_css and BEM dark mode

- **Project Overview Template Update**
  - Separated `container_css` from `custom_css` for proper parameter usage
  - Demonstrates container-level CSS for negative margins
  - Section-level CSS for padding adjustments

### Documentation
- **BEM-MIGRATION-REFERENCE.md Updates**
  - Added parameters comparison table (4 parameters documented)
  - Updated dark mode examples to use BEM-compliant approach
  - Real-world example showing parameter separation
  - Four-parameter styling system fully documented

- **BEM-CLASSES-GUIDE.md Dark Mode Section**
  - Documents proper BEM modifier: `.lcms-pro-sites--dark`
  - Marks legacy classes as deprecated
  - Recommends `dark_mode => true` parameter
  - Advanced examples with container-level styling
  - Updated quick reference table

- **Pro-Sites README.md Updates**
  - Updated settings array to include `container_classes` and `container_css`
  - Changed dark_mode documentation from ".dark-mode class" to ".lcms-pro-sites--dark modifier"
  - Added version notes for new parameters

### Technical Details
- **Files Created**: 1 file (BEM-CLASSES-GUIDE.md - 880 lines)
- **Files Updated**: 4 files (wrapper, CSS, migration reference, pro-sites README)
- **BEM Compliance**: 100% - All utilities now use proper BEM naming
- **CSS Selectors**: 6 dark mode selector groups updated with BEM modifier
- **Backward Compatible**: Legacy dark mode classes still supported

### Migration Guide

**Dark Mode Migration:**
```php
# Before (deprecated, non-BEM)
'custom_classes' => 'dark-mode'

# After (BEM-compliant, recommended)
'dark_mode' => true
```

**Container CSS Separation:**
```php
# Before (mixed concerns)
'custom_css' => 'margin-top: -50px; padding-top: 0;'

# After (separated concerns)
'container_css' => 'margin-top: -50px;',  // Container-level
'custom_css' => 'padding-top: 0;',         // Section-level
```

### Key Benefits
- Complete BEM reference for manual HTML implementation
- Container-level inline CSS support for advanced layouts
- Four-level styling flexibility (2 levels × 2 types: classes + CSS)
- BEM-compliant dark mode implementation
- Better separation of concerns (section vs container)
- Enhanced floating card capabilities
- Comprehensive documentation for all components

### Use Cases
- **Manual Implementation**: BEM Classes Guide provides copy-paste examples
- **Floating Cards**: Container-level negative margins with CSS
- **Dark Sections**: BEM-compliant `dark_mode => true` parameter
- **Complex Layouts**: Combine all four styling parameters
- **Advanced Positioning**: Container CSS for fine-tuned adjustments

#release

## [2.0.6] - 2025-11-17

### Added
- **Container-Level Styling Support - Floating Card Sections**
  - Added `container_classes` parameter to wrapper-open.php for inner container styling
  - Enables flexible card styling at two levels:
    - `custom_classes` → Apply to `<section>` element (full-width cards)
    - `container_classes` → Apply to `.lcms-container` div (floating cards)
  - Supports floating card layouts with max-width constraints
  - Enables overlapping sections with negative margins
  - Allows dark backgrounds with light elevated cards
  - Perfect for complex visual hierarchy layouts

- **BEM Migration Reference Documentation**
  - Created comprehensive BEM-MIGRATION-REFERENCE.md guide
  - Documents section-level vs. container-level styling approaches
  - Provides migration examples for all legacy classes
  - Includes quick reference table for legacy → BEM mappings
  - Detailed examples for badges, progress bars, metrics, cards, grids, lists
  - Line-by-line migration checklist for templates

### Changed
- **Wrapper Template Enhancement**
  - Updated wrapper-open.php to support `container_classes` parameter
  - Builds dynamic class array for `.lcms-container` div
  - Maintains backward compatibility with `custom_classes`
  - Added @since 2.0.6 documentation

- **Project Overview Template Update**
  - Migrated slug-project-overview.php from `custom_classes` to `container_classes`
  - Now demonstrates floating card approach with max-width constraint
  - Uses negative margin for overlapping section effect

### Technical Details
- **Files Updated**: 3 files (1 wrapper template, 1 documentation, 1 example)
- **Template System**: Two-level styling architecture (section + container)
- **BEM Compliance**: 100% - All new features use proper BEM naming
- **Backward Compatible**: Existing `custom_classes` usage unaffected

### Use Cases
- **Floating Cards**: Cards with max-width that don't span full section width
- **Overlapping Sections**: Negative margins for visual depth and hierarchy
- **Elevated Cards**: Light cards on dark section backgrounds
- **Complex Layouts**: Combine section and container styling for advanced designs

### Documentation
- Added "Section-Level vs. Container-Level Styling" section to BEM reference
- Documented three approaches: section-only, container-only, and combined
- Provided HTML output examples for each approach
- Explained when to use each styling level

#release

## [2.0.5] - 2025-11-17

### Changed - BREAKING CHANGES
- **Brand-Guide Card Components - Complete BEM Migration**
  - Migrated all brand-guide display cards to proper BEM naming with `lcms-` prefix
  - Card migrations:
    - `.type-specimen` → `.lcms-type-specimen` (with `__label`, `__display`, `__info` elements)
    - `.logo-card` → `.lcms-logo-card` (with `__image`, `__title`, `__description` elements)
    - `.guideline-card` → `.lcms-guideline-card` (with `--do`/`--dont` modifiers, `__icon`, `__title`, `__list` elements)
    - `.spacing-card` → `.lcms-spacing-card` (with `__visual`, `__box`, `__label`, `__value` elements)
  - Converted chained classes to BEM modifiers: `.guideline-card.do` → `.lcms-guideline-card--do`
  - **Breaking**: All brand-guide templates now use BEM card components

- **Pro-Sites Content Renderers - Complete BEM Migration**
  - Migrated all content renderer templates to proper BEM naming with `lcms-` prefix
  - Content renderer migrations:
    - `stack.php`: `.content-stack` → `.lcms-stack` (with `--align-{value}` modifiers, `__item` elements)
    - `row.php`: `.content-row` → `.lcms-row` (with `--align-{value}` and `--justify-{value}` modifiers, `__item` elements)
    - `grid.php`: `.content-grid` → `.lcms-grid-layout` (with `__item` elements)
    - `heading.php`: `.content-heading` → `.lcms-heading` (with `--align-{value}` modifiers)
    - `buttons.php`: Removed legacy `.section-content` wrapper
  - Grid section template migration:
    - `grid-section.php`: Migrated to `.lcms-grid-section` BEM structure
    - `.grid-wrapper` → `.lcms-grid-section__wrapper`
    - `.grid-item` → `.lcms-grid-section__item` (with `--{type}` modifiers)
  - **Breaking**: All pro-sites content renderers now use BEM classes exclusively

### Removed
- **Descendant Selectors (BEM Violations)**
  - Removed `.lcms-brand-guide .type-specimen`, `.lcms-brand-guide .logo-card`, etc.
  - Removed `.lcms-brand-guide .guideline-card`, `.lcms-brand-guide .spacing-card`
  - Removed legacy wrapper divs: `.section-content`, `.grid-item-content`
  - All components are now self-contained with BEM naming

### Technical Details
- **Files Updated**: 11 files (2 CSS, 9 PHP templates)
  - Brand-guide CSS: Migrated 4 card components to BEM
  - Brand-guide templates: typography-section.php, logo-section.php, guidelines-section.php, spacing-section.php
  - Pro-sites content renderers: stack.php, row.php, grid.php, heading.php, buttons.php
  - Pro-sites section template: grid-section.php
- **BEM Compliance**: 100% - All brand-guide and pro-sites components now use proper BEM naming
- **Component Pattern**: Consistent `lcms-` namespace, BEM elements (`__`), BEM modifiers (`--`)
- **Utility Classes**: Converted chained utility classes to BEM modifiers (e.g., `align-center` → `--align-center`)

### Migration Notes
- **FINAL BEM MIGRATION**: All legacy non-BEM classes removed from brand-guide and pro-sites systems
- Zero descendant selectors remain - full BEM compliance achieved
- All templates use consistent BEM naming convention throughout
- Typography display classes (`.heading-xl`, `.body-lg`) remain standalone for contextual application in brand-guide

#release

## [2.0.4] - 2025-11-17

### Changed
- **Content Component Enhancement**
  - Added flexbox layout system to `.lcms-content` component
  - New properties: `display: flex`, `flex-direction: column`, `gap: var(--column-gap, 40px)`
  - Provides consistent vertical spacing for content stacks
  - Improves layout flexibility for text/media combinations

### Changed - BREAKING CHANGES
- **Brand-Guide Grid Migration - Final BEM Cleanup**
  - Migrated all remaining legacy grid classes to BEM naming
  - Grid migrations:
    - `.logo-grid` → `.lcms-grid lcms-grid--3col` (logo-section.php)
    - `.spacing-grid` → `.lcms-grid lcms-grid--4col` (spacing-section.php)
    - `.guidelines-grid` → `.lcms-grid lcms-grid--2col` (guidelines-section.php)
  - **Breaking**: Brand-guide templates now use BEM grid component exclusively

### Technical Details
- **Files Updated**: 4 files (1 CSS, 3 PHP templates)
  - Design system CSS: Enhanced `.lcms-content` with flexbox layout
  - Brand-guide templates: logo-section.php, spacing-section.php, guidelines-section.php
- **BEM Migration**: 100% complete - Zero legacy utility classes remain
- **Component Count**: 20 components (stable)

### Migration Notes
- **FINAL CLEANUP**: All legacy grid classes migrated to BEM
- Complete BEM compliance across entire codebase
- Consistent use of `.lcms-grid` with modifiers throughout
- Content component now supports flexible stacking layouts

#release

## [2.0.3] - 2025-11-16

### Changed - BREAKING CHANGES
- **Container Utility - Complete BEM Migration**
  - Migrated `.content-container` → `.lcms-container` (proper BEM naming with `lcms-` prefix)
  - Converted chained class modifiers to BEM modifiers:
    - `.content-container.width-thin` → `.lcms-container--thin`
    - `.content-container.width-wide` → `.lcms-container--wide`
    - `.content-container.width-full` → `.lcms-container--full`
  - **Breaking**: All templates now use `.lcms-container` instead of `.content-container`

### Removed
- **Descendant Selectors (BEM Violations)**
  - Removed `.lcms-pro-sites .content-container` from pro-sites.css
  - Removed `.lcms-brand-guide .content-container` from brand-guide.css
  - No more descendant selectors - full BEM compliance

### Technical Details
- **Files Updated**: 11 files (3 CSS, 8 PHP templates)
  - Design system CSS: Container utility renamed with BEM modifiers
  - pro-sites.css: Removed descendant selector
  - brand-guide.css: Removed descendant selector
  - Pro-sites: wrapper-open.php, wrapper-close.php
  - Brand-guide: 5 templates (typography, logo, spacing, guidelines, color-palette)
  - Top-section: page-header.php
- **BEM Compliance**: 100% - No legacy utility classes remain
- **Container Pattern**: Universal BEM utility class with modifiers

### Migration Notes
- **FINAL STEP**: Container migration completes BEM architecture
- Zero legacy non-BEM classes in codebase
- All utilities, components, and templates use proper BEM naming
- Consistent `lcms-` namespace throughout

#release

## [2.0.2] - 2025-11-16

### Changed
- **Brand-Guide Partials - BEM Section Heading Migration**
  - Migrated section headings from legacy classes to BEM in 4 templates
  - Templates updated:
    - `typography-section.php`: `.section-label/title/description` → `.lcms-section-heading`
    - `logo-section.php`: `.section-label/title/description` → `.lcms-section-heading`
    - `spacing-section.php`: `.section-label/title/description` → `.lcms-section-heading`
    - `guidelines-section.php`: `.section-label/title/description` → `.lcms-section-heading`
  - Brand-specific display elements preserved (`.type-specimen`, `.logo-grid`, `.spacing-grid`, `.guideline-card`)

### Technical Details
- **Templates Migrated**: 10 → 14 (+4 brand-guide partials)
- **BEM Migration Progress**:
  - Core partials: ✅ 3 (hero, cta, color-palette)
  - Pro-sites partials: ✅ 7 (header, footer, 2-column, 4 content renderers)
  - Brand-guide partials: ✅ 4 (typography, logo, spacing, guidelines)
  - **Total: 14 templates migrated to BEM**
- **Component Count**: 20 components (stable)
- Consistent BEM naming across all partial systems

### Migration Notes
- All brand-guide templates now use `.lcms-section-heading` for headers
- Display elements remain brand-specific for theming flexibility
- Complete consistency with v2.0.0 BEM architecture

#release

## [2.0.1] - 2025-11-16

### Fixed
- **Design System CSS Enqueue**
  - Added missing `leancms_enqueue_design_system()` function
  - Design system now properly loads on LeanCMS template pages
  - Fixed broken layouts where BEM components were unstyled

### Changed - BREAKING CHANGES
- **Pro-Sites Partial System - Complete BEM Migration**
  - Migrated all 7 pro-sites partials from legacy classes to BEM naming
  - **Breaking**: Pro-sites partials now use BEM classes exclusively
  - Partials migrated:
    - `header.php`: Removed `.section-header` wrapper, pure `.lcms-section-heading`
    - `footer.php`: Removed `.section-footer` wrapper, pure `.lcms-button-group`
    - `2-column-section.php`: `.columns-wrapper` → `.lcms-column-layout`
    - `text.php`: `.text-content` → `.lcms-content` (with `--lead`, `--small` modifiers)
    - `image.php`: `.image-content` → `.lcms-image` (with `__img`, `__caption` elements)
    - `video.php`: `.video-content` → `.lcms-video` (with `__element`, `__iframe` elements)
    - `html.php`: `.html-content` → `.lcms-content--html`

### Added
- **New BEM Components**
  - `.lcms-grid` component with `--2col`, `--3col`, `--4col` modifiers
  - `.lcms-image` component with `__img` and `__caption` elements (semantic `<figure>`)
  - `.lcms-video` component with `__element` and `__iframe` elements (16:9 aspect ratio)
  - `.lcms-content` modifiers: `--lead`, `--small`, `--html`

### Removed
- **Legacy Non-BEM Classes** (120 lines removed)
  - Removed `.section-header`, `.section-content`, `.section-footer`
  - Removed `.columns-wrapper`, `.column`, `.column-content`, `.reverse-mobile`
  - Removed `.text-content`, `.text-format-*`
  - Removed `.image-content`, `.content-image`, `.image-caption`
  - Removed `.video-content`, `.content-video`, `.content-video-embed`
  - Removed `.html-content`
  - All legacy classes replaced with proper BEM equivalents

### Technical Details
- **Component Count**: 18 → 20 components (+Image, +Video)
- **Design System**: 3,200 lines (net -32 lines after removing legacy)
- **Pro-Sites Migration**: 100% BEM compliant
- **Code Quality**: Removed backward compatibility code, clean BEM architecture

### Migration Notes
- Pro-sites system now fully consistent with BEM v2.0.0 goals
- No more legacy non-BEM classes in design system
- All templates use proper BEM naming convention
- Existing implementations using pro-sites legacy classes will need updates

#release

## [2.0.0] - 2025-11-16

### Changed - BREAKING CHANGES
- **PHP Template Migration to BEM Naming Convention**
  - Migrated core partial templates from legacy classes to BEM components
  - **Breaking**: Templates now use BEM classes from design system
  - Templates affected:
    - `hero-section.php`: `.hero` → `.lcms-hero` (with full BEM elements)
    - `cta-section.php`: `.cta-section` → `.lcms-cta-section` (with BEM elements)
    - `color-palette-section.php`: Legacy classes → BEM components (`.lcms-section-heading`, `.lcms-grid`, `.lcms-color-swatch`)

### Added
- **BEM Modifier Support in PHP Templates**
  - Hero section: Added `$modifiers` parameter for `.lcms-hero` variants
  - CTA section: Added `$cta_section_modifiers` and `$cta_button_modifiers` parameters
  - Full modifier support for size, background, alignment variants

### Technical Details
- **Template Changes**
  - Hero section: Converted 5 legacy classes to BEM (`.lcms-hero__logo`, `__badge`, `__title`, `__subtitle`)
  - CTA section: Converted 3 legacy classes to BEM (`.lcms-cta-section__title`, `__description`, `__button`)
  - Color palette: Converted to use 3 BEM components from design system
  - All templates maintain backward compatibility with existing config arrays
  - Added proper BEM class building with modifier support

### Migration Impact
- **BEM Migration Status: COMPLETE**
  - CSS components: ✅ 100% (17 components, 3,167 lines)
  - Foundation Package: ✅ Complete (theme system, content area, accessibility)
  - PHP templates: ✅ Started (3 core templates migrated)
  - Next phase: Migrate remaining 23 PHP templates

### Notes
- **Major version bump** due to breaking changes in template class names
- Existing client implementations using legacy classes will need updates
- Templates now fully leverage BEM design system components
- Improved consistency between CSS components and PHP template output
- Foundation Package (v1.5.1) provides full theming support for migrated templates

#release

## [1.5.1] - 2025-11-16

### Added
- **Foundation Package - Theme, Content, Accessibility (+569 lines)**
  - **Theme System (Dark Mode Support)**
    - CSS Variables for light/dark themes
    - Toggle via `.theme-dark` class on `:root` or `<body>`
    - Theme-aware colors, backgrounds, borders, shadows
    - Automatic component adaptation to theme
  - **Content Area Component (`.lcms-content`)**
    - Comprehensive styling for AI-generated/WYSIWYG HTML
    - Typography rhythm for all heading levels (h1-h6)
    - Styled paragraphs, lists, blockquotes, code, tables
    - Image and embedded content styling
    - Responsive typography scaling
  - **Enhanced Spacing System**
    - Token-based spacing scale (xs, sm, md, lg, xl, 2xl, 3xl, 4xl)
    - Utility classes for margin, padding, gap
    - Consistent 4px base unit system
  - **Focus & Accessibility States**
    - Modern `:focus-visible` support
    - Skip-to-content link styling
    - Screen reader utilities (`.sr-only`, `.sr-only-focusable`)
    - Reduced motion support (`prefers-reduced-motion`)
    - High contrast mode support (`prefers-contrast`)
    - Keyboard navigation indicators

### Changed
- **Design System Expanded**
  - Updated from 2,596 to 3,167 lines (+569 lines)
  - Added comprehensive foundation systems
  - Enhanced for AI extensibility and template migration

### Technical Details
- **Foundation Package**
  - Theme system: 569 lines added
  - Dark mode support via CSS variables
  - Content area component for AI/WYSIWYG HTML
  - Enhanced spacing utilities (100+ utility classes)
  - Comprehensive accessibility support

### Notes
- Foundation Package adds comprehensive theming & accessibility
- Design system now supports dark mode out of the box
- AI can generate styled content using `.lcms-content` wrapper
- Prepared for PHP template migration (v2.0.0)
- Ready for production use with theme toggle capability

#release

## [1.5.0] - 2025-11-16

### Added
- **BEM Design System - Phase 5 Complete (100% Migration!) 🎉**
  - NEW: 2 section wrapper BEM components (508 lines total)
    - `lcms-hero.css` (211 lines) - Hero sections with logo, badge, title, subtitle
    - `lcms-cta-section.css` (297 lines) - Call-to-action sections with buttons
  - Updated `lcms-design-system.css` from 2,088 to 2,596 lines
  - All components follow BEM naming convention with comprehensive modifiers
  - Size variants (small, medium, large) for both components
  - Background variants (primary, secondary, accent, dark, light)
  - Alignment variants (left, center, right)
  - Button style variants for CTA sections
  - Responsive breakpoints for mobile optimization

### Changed
- **Partial CSS Cleanup - Major Optimization**
  - Removed 1,597 lines of duplicate structural CSS from partial files (78% reduction)
  - `top-section.css`: 77 → 36 lines (53% reduction)
  - `bottom-section.css`: 75 → 36 lines (52% reduction)
  - `brand-guide.css`: 458 → 294 lines (36% reduction)
  - `pro-sites.css`: 1,441 → 88 lines (94% reduction)
  - Partial files now contain only brand-specific theming overrides
  - All structural styles consolidated in design system

- **Migration Progress Documentation**
  - Updated `docs/research/BEM-migration-strategy.md` with Phase 5 completion
  - Migration status updated to 100% complete (all 5 phases done)
  - Component count: 17 BEM components total
  - Updated testing checklist for Phase 5 components

### Technical Details
- **Component Library - COMPLETE**
  - Phase 1-5: 17 components complete (2,672 lines across all phases)
  - Design System: Single unified file (2,596 lines)
  - All tier components implemented (Foundation, Core, Content, Specialized, Wrappers)
- **CSS Optimization**
  - Removed duplicate utilities (flex, grid, spacing, text)
  - Removed duplicate component styles (buttons, cards, layouts)
  - Improved load performance with consolidated CSS
  - Cleaner separation between structure (design system) and theming (partials)
- **BEM Migration Strategy**
  - Component library migration: 100% complete
  - Partial theming cleanup: ✅ COMPLETE
  - PHP template migration: Deferred to template migration phase
  - Current design system loading strategy works well

### Notes
- Phase 5 completes ALL component library work
- Partial cleanup removes ~1.6k lines of duplicate CSS
- Migration progress: 100% complete (all 5 phases done)
- BEM component library is production-ready
- Next steps: Foundation Package (v1.5.1), then PHP template migration (v2.0.0)

#release

## [1.4.8] - 2025-11-16

### Added
- **BEM Design System - Phase 4 Complete (~70% Migration)**
  - NEW: 5 specialized BEM components (1,139 lines total)
    - `lcms-color-swatch.css` (137 lines) - Brand color displays with hex/RGB values
    - `lcms-metric.css` (211 lines) - Numeric metrics, scores, KPIs with size/color variants
    - `lcms-list.css` (244 lines) - Flexible lists with check/cross/arrow/icon markers
    - `lcms-progress.css` (254 lines) - Progress bars with striped/animated variants
    - `lcms-badge.css` (293 lines) - Status badges with outline/subtle/pill variants
  - Updated `lcms-design-system.css` from 1,025 to 2,088 lines
  - All components follow BEM naming convention with comprehensive modifiers
  - Responsive breakpoints included for all components
  - CSS variable integration maintained throughout

### Changed
- **Migration Progress Documentation**
  - Updated `docs/research/BEM-migration-strategy.md` with Phase 4 status
  - Added migration status table showing progress through phases
  - Updated component specifications for all Phase 4 components

### Technical Details
- **Component Architecture**
  - Phase 1-4: 15 components complete (2,164 lines across all phases)
  - Design System: Single unified file (2,088 lines)
  - Remaining: Phase 5 (Hero, CTA, partial theming cleanup)
- **Migration Strategy**
  - PHP template migration deferred to comprehensive migration phase
  - Focus on CSS component library completion first
  - Templates continue using design system with legacy class names

### Notes
- Phase 4 completes specialized components tier
- Migration progress: 70% complete (4 of 5 phases done)
- Next: Phase 5 for section wrappers and final cleanup

#release

## [1.4.7] - 2025-11-16

### Added
- **Documentation**
  - NEW: Comprehensive pull request template (`.github/pull_request_template.md`)
  - Standardizes PR documentation for BEM migration and future releases
  - Includes migration progress visualization, testing checklist, and next steps

### Notes
- Minor documentation enhancement release
- Improves development workflow and PR consistency

#release

## [1.4.6] - 2025-11-16

### Added
- **BEM Design System - Phase 1-3 Complete (~60% Migration)**
  - NEW: `lcms-design-system.css` - Unified design system (1,143 lines)
  - Combines Base CSS, Utilities, and all Phase 1-3 BEM components in single file
  - 10 BEM components now available: Section Heading, Button, Card (11 variants), Grid, Column, Content Stack/Row/Grid
  - Component library uses proper BEM naming convention (`.lcms-section-heading`, `.lcms-button`, `.lcms-card`, etc.)
  - Full documentation for Section Heading and Button components
  - Comprehensive testing checklist (`docs/TESTING-CHECKLIST.md`)

### Changed
- **CSS Loading Pattern (23 files updated)**
  - Updated all page templates to use `lcms-design-system.css` instead of `base.css`
  - New CSS load order: Design System → CSS Variables → Legacy Components (document-system.css)
  - Maintains backward compatibility with Phase 4-5 styles
  - Updated templates across all clients: test, 4dli, bibo, bicwa, brmo, jiku, proj, refr

### Technical Details
- **BEM Components Created**:
  - Section Heading: label, title, subtitle with alignment and color modifiers
  - Button: primary, secondary, outline, CTA variants with size and state modifiers
  - Button Group: with alignment and layout modifiers
  - Card: 11 semantic variants (bordered, elevated, feature, progress, metric, summary, info, etc.)
  - Grid Layout: 2col, 3col, 4col with responsive breakpoints
  - Column Layout: flexible columns with gap and alignment options
  - Content Stack: vertical stacking with alignment
  - Content Row: horizontal layout with alignment
  - Content Grid: semantic grid for content items

- **Files Created**:
  - `templates/assets/global/lcms-design-system.css` - Unified design system
  - `docs/TESTING-CHECKLIST.md` - Comprehensive testing guide

- **Migration Progress**:
  - Phase 1 (Foundation): ✅ 100% Complete
  - Phase 2 (Core Components): ✅ 100% Complete (4 components)
  - Phase 3 (Content Components): ✅ 100% Complete (4 components)
  - Phase 4 (Specialized): ⏳ 0% (Hero, CTA, Color Swatch, Metric, List, Progress, Badge)
  - Phase 5 (Wrappers & Cleanup): ⏳ 0%
  - **Overall: ~60% Complete**

### Notes
- Individual component files still exist for reference but are now combined in design system
- `document-system.css` still loaded for Phase 4-5 components (Hero, CTA, Brand Guide specifics, etc.)
- No HTML markup changes required - all updates are CSS-only
- Backward compatible with existing pages and partials

#release

## [1.4.5] - 2025-11-16

### Changed
- Version bump to lock in current state before migration tasks

#release

## [1.4.4] - 2025-11-15

### Added
- **Brand Guide Enhancements**
  - NEW: Dedicated `brand-guide.css` stylesheet for brand guide pages
  - Consolidated brand guide styling into single source of truth
  - Improved partial styling consistency across color palette, typography, logos, spacing, and guidelines sections

### Changed
- **4dli Client Configuration**
  - Updated brand guide stylesheet reference to use new dedicated CSS file
  - Enhanced brand guide partial paths for better organization

### Fixed
- **Documentation**
  - FIXED: Outdated version reference in `docs/START-HERE.md` (was 1.4.1, now 1.4.4)

#release

## [1.4.3] - 2025-11-15

### Changed
- Maintenance release with version bump

#release

## [1.4.2] - 2025-11-14

### Added
- **Programmatic Color Management System**
  - NEW: Single source of truth for brand colors with automatic generation
  - NEW: `hex_to_rgb()` helper function with redeclaration protection
  - Colors defined once in `$colors` array with hex, name, and usage metadata
  - Automatic RGB conversion from hex values
  - Programmatic generation of both CSS variables and brand guide color swatches
  - System colors (compatibility layer) with actual hex values
  - Template colors (what templates reference) with CSS variable references

- **Config-Driven Brand Guide**
  - NEW: `brand_guide` section in client config.php
  - Brand guide templates now pull all data from config (colors, typography, logos, guidelines)
  - Eliminated hardcoded brand data from templates
  - Single source of truth for brand identity content
  - Reduced slug-brand-guide.php from 130+ lines to 93 lines

- **Debug Logging**
  - NEW: Debug logging for Google Fonts loading (when WP_DEBUG enabled)
  - NEW: Debug logging for brand guide data loading
  - Helps diagnose resource loading and rendering issues

### Fixed
- **CSS Variable Encoding**
  - FIXED: CSS variables being HTML-encoded breaking font-family declarations
  - Changed from `esc_attr()` to `wp_strip_all_tags()` for CSS variable values
  - Preserves single quotes in font names like 'Montserrat', 'Segoe UI'
  - Prevents XSS while maintaining valid CSS syntax

- **Function Redeclaration Error**
  - FIXED: hex_to_rgb() causing fatal error when config included multiple times
  - Wrapped function definition in `function_exists()` check
  - Allows config.php to be safely included multiple times per request

- **Brand Guide Data Structure**
  - FIXED: Color palette and logo grids rendering empty
  - Updated data structure to match partial expectations (colors.colors, logos.logos)
  - Changed from 'swatches' and 'variations' to match partial registry naming

### Changed
- **4dli Client Configuration**
  - Refactored to use programmatic color generation
  - Reduced duplication across css_variables and brand_guide sections
  - Colors now automatically flow from single definition to all contexts
  - Simplified color updates (change once, applies to CSS vars + brand guide)

- **Template Optimization**
  - Brand guide template reduced by 153 lines of hardcoded data
  - Now uses config references instead of inline arrays
  - Improved maintainability and consistency

### Technical Details
- **Files Modified**:
  - `templates/pages/4dli/config.php` - Added programmatic color generation, brand_guide section
  - `templates/pages/4dli/slug-brand-guide.php` - Converted to config-driven, added debug logging
  - `templates/pages/_partials/top-section/loader.php` - Fixed CSS encoding, added debug logging
  - `leancms.php` - Bumped version to 1.4.2

- **Architecture Improvements**:
  - Colors: Single source → Multiple outputs (CSS vars, brand guide, future uses)
  - Brand guide: Config as data source, templates as presentation layer
  - Security: wp_strip_all_tags() prevents injection while preserving CSS syntax
  - Reliability: Function existence checks prevent redeclaration errors

### Benefits
- **Single Source of Truth** - Update colors once, changes apply everywhere
- **Automatic Calculations** - RGB values computed automatically from hex
- **System Compatibility** - Base colors with semantic naming (background-primary)
- **Template Flexibility** - CSS var() references maintain separation of concerns
- **Better Debugging** - Error logs help diagnose loading and rendering issues
- **Improved Security** - Proper escaping for CSS context prevents XSS
- **Reduced Maintenance** - Less duplication means fewer places to update

#release

## [1.4.0] - 2025-11-14

### Added
- **Config-Driven Resource Loading System**
  - NEW: `load_client_resources()` global helper function for automatic resource loading
  - NEW: `LeanCMS_Helpers::load_client_resources()` method for programmatic resource management
  - Separates configuration concerns from template layout code
  - Templates now use single function call instead of manual resource management
  - Resources metadata section in client config.php files

- **Enhanced Loader Partial**
  - NEW: `client_code` parameter support for cleaner resource loading
  - NEW: Google Fonts preconnect optimization
  - NEW: Configurable stylesheet loading via config
  - NEW: Skip flags for selective resource loading (`skip_css_vars`, `skip_stylesheets`, `skip_fonts`)
  - Maintains backward compatibility with legacy `client_config_path` usage

- **Resource Loading Flags**
  - NEW: Optional flags parameter to selectively skip resource loading
  - `skip_css_vars` - Skip CSS variable output
  - `skip_stylesheets` - Skip stylesheet loading
  - `skip_fonts` - Skip Google Fonts loading
  - Provides flexibility for edge cases and custom resource handling

### Changed
- **Template Simplification**
  - Updated 4dli/slug-project-overview.php template (18 lines → 1 line for resource loading)
  - Templates now purely focused on layout/typesetting
  - Resource configuration moved to config.php
  - Cleaner, more maintainable template code

- **Loader Partial Enhancements**
  - Enhanced `templates/pages/_partials/top-section/loader.php` with multiple loading strategies
  - Intelligent config resolution (direct config, client_code, legacy path, fallback)
  - Configurable stylesheets array replaces hardcoded values
  - Google Fonts loading from config with preconnect support

- **4dli Client Configuration**
  - Added `resources` metadata section to config.php
  - Configured with `auto_load: true`, `stylesheets: ['base.css']`, `google_fonts: true`
  - Demonstrates new configuration pattern for all clients

### Technical Details
- **Files Modified**:
  - `includes/utilities/class-helpers.php` - Added `load_client_resources()` method with flags support
  - `leancms.php` - Added global `load_client_resources()` wrapper function, bumped version to 1.4.0
  - `templates/pages/_partials/top-section/loader.php` - Enhanced with client_code, flags, Google Fonts support
  - `templates/pages/4dli/config.php` - Added resources metadata section
  - `templates/pages/4dli/slug-project-overview.php` - Simplified to use new resource loading pattern

- **Architecture**:
  - Config.php declares resources as pure data (no side effects)
  - Helper function handles resource loading logic
  - Loader partial outputs actual HTML/CSS
  - Clean separation: Configuration → Logic → Output
  - Supports both automated and manual resource loading patterns

### Benefits
- **Cleaner Templates** - Focus on layout, not configuration
- **Centralized Configuration** - All resource settings in config.php
- **Better Maintainability** - One place to update resource loading
- **Flexible** - Skip flags allow edge case handling
- **DRY Principle** - Reusable resource loading across all clients
- **Performance** - Google Fonts preconnect optimization
- **Future-Proof** - Easy to extend with new resource types

#release

## [1.3.9] - 2024-11-14

### Added
- **Enhanced Bulk Page Creation**
  - NEW: `{{PARENT_SLUG}}` variable for template replacement in Bulk Create Pages
  - Automatically generates permalink-friendly slugs from Client Name field
  - Parent pages now use client name as slug instead of client-code prefix
  - Child pages simplified to use phase names only (inherit parent namespace)
  - PHP: Added `sanitize_title()` processing in `replace_template_variables()` method
  - JavaScript: Added permalink slug generation with special character handling

- **Project with Phases Preset**
  - NEW: "Project with Phases" preset template in Bulk Create Pages
  - Creates 5-page project structure: Overview, Idea, Evaluation, Execution, Handover
  - Uses `{{PARENT_SLUG}}` for consistent URL structure
  - All phase pages are children of overview page
  - Integrated with WordPress page hierarchy system

- **Project Phases Templates Skill**
  - NEW: `.claude/skills/project-phases-templates/` complete skill implementation
  - Callout phrase: `"create project with phases templates for {CLIENT_CODE}"`
  - 5 generic template files stored in skill folder for portability
  - Comprehensive SKILL.md with usage instructions and workflows
  - Support for variable replacement: CLIENT_CODE, CLIENT_NAME, PROJECT_TITLE, BRAND_PRIMARY, BRAND_SECONDARY, CURRENT_DATE
  - Templates integrate with client config.php for brand consistency
  - Uses pro-sites partials for consistent layouts

- **Project Phase Template Files**
  - `slug-project-overview.php` - Project dashboard with 4 phase cards and progress tracking
  - `slug-project-idea.php` - Phase 1: Idea tracking with objectives and deliverables
  - `slug-project-evaluation.php` - Phase 2: Evaluation & planning with risk assessment
  - `slug-project-execution.php` - Phase 3: Development & delivery with sprint structure
  - `slug-project-handover.php` - Phase 4: Transfer & closure with handover checklist
  - All templates include progress indicators, task checklists, and phase-specific content
  - Responsive design with mobile support
  - Dark mode sections for visual variety

### Changed
- **Bulk Create Pages Presets**
  - Updated all existing presets to use `{{PARENT_SLUG}}` variable
  - Standard Client Project: Parent uses `{{PARENT_SLUG}}` instead of `{{CLIENT_CODE}}-home`
  - Brand Guide Full: Parent uses `{{PARENT_SLUG}}` instead of `{{CLIENT_CODE}}-brand-guide`
  - Pro-Sites Layout: Landing uses `{{PARENT_SLUG}}`, other pages use `{{PARENT_SLUG}}-{suffix}`
  - Website Redesign Project: Overview uses `{{PARENT_SLUG}}` instead of `{{CLIENT_CODE}}-project-overview`

### Technical Details
- **Files Modified**:
  - `includes/admin/class-bulk-pages.php` - Added parent-slug generation, new preset, updated all presets
  - `assets/admin/bulk-pages.js` - Added client name to slug conversion with sanitization
  - `leancms.php` - Bumped version to 1.3.9

- **Files Added**:
  - `.claude/skills/project-phases-templates/SKILL.md` - Complete skill documentation (380+ lines)
  - `.claude/skills/project-phases-templates/templates/slug-project-overview.php` - Overview template
  - `.claude/skills/project-phases-templates/templates/slug-project-idea.php` - Idea phase template
  - `.claude/skills/project-phases-templates/templates/slug-project-evaluation.php` - Evaluation phase template
  - `.claude/skills/project-phases-templates/templates/slug-project-execution.php` - Execution phase template
  - `.claude/skills/project-phases-templates/templates/slug-project-handover.php` - Handover phase template
  - `templates/pages/stdn/slug-project-*.php` - Test implementation for St Denis School client (5 files)

- **Architecture**:
  - Skill templates stored in `.claude/skills/` for portability and version control
  - Generic templates with placeholder variables for reusability
  - Clean separation between skill source templates and client implementations
  - Consistent with client-setup skill pattern

### Benefits
- **Cleaner URLs** - Parent pages use human-readable names instead of code prefixes
- **Better SEO** - Permalink slugs match client names naturally
- **Easier Management** - More intuitive page structure in WordPress admin
- **Rapid Project Setup** - Create complete project tracking systems in minutes
- **Consistent Workflow** - Standardized phase structure across all projects
- **Self-Contained Skill** - Templates portable and independently versionable

#release

## [1.3.8] - 2025-11-14

### Added
- **Bulk Page Creation Feature**
  - NEW: Admin interface for creating multiple WordPress pages from JSON templates
  - NEW: Admin submenu under Settings → Lean CMS → Bulk Pages
  - NEW: Three preset templates with variable replacement:
    - Standard Client Project (Home, Brand Guide, Resources)
    - Brand Guide with Sub-pages (Brand Guide, Colors, Typography, Logos, Voice & Tone)
    - Pro-Sites Landing Pages (Landing, About, Services, Contact)
  - NEW: Variable replacement system ({{CLIENT_CODE}}, {{CLIENT_NAME}})
  - NEW: Parent-child page relationship support (order-dependent processing)
  - NEW: Real-time JSON validation with detailed error messages
  - NEW: Comprehensive success/error/warning feedback with page IDs and edit links

- **Dynamic Template Support**
  - NEW: Database-stored template layouts with file fallback system
  - NEW: `_leancms_dynamic_template` meta field for page-specific layouts
  - NEW: Template resolution priority: DB template → File template → Fallback notice
  - NEW: Temporary file caching system with automatic cleanup
  - NEW: Full pro-sites partial system support in dynamic templates

- **Intelligent Slug Generation**
  - NEW: Smart slug generation based on page hierarchy
  - Top-level pages: Auto-prefix with `{client-code}-{page-title}` for unique namespacing
  - Child pages: Use just `{page-title}` (inherits parent's URL path)
  - Explicit slugs: Always respected regardless of hierarchy

### Technical Details
- **Files Added**:
  - `includes/admin/class-bulk-pages.php` - Main bulk creation class (473 lines)
  - `includes/admin/views/bulk-pages-form.php` - Admin form interface
  - `assets/admin/bulk-pages.js` - Client-side JSON validation and preset handling
  - `assets/admin/bulk-pages.css` - Admin interface styles

- **Files Modified**:
  - `leancms.php` - Bootstrap bulk pages class, bump version to 1.3.8
  - `includes/content/class-page-renderer.php` - Add dynamic template support

- **Architecture**:
  - Follows singleton boot pattern consistent with existing classes
  - Uses WordPress Settings API for form handling
  - Integrates with existing client code metadata system
  - Compatible with pro-sites partial system

### Benefits
- **Rapid Site Scaffolding** - Create entire page structures in seconds
- **Consistent Naming** - Automatic client-code prefixing prevents conflicts
- **Flexible Templating** - Choose presets or define custom JSON structures
- **Clean URLs** - Hierarchical pages use WordPress's natural URL structure
- **Version Control** - File-based templates remain the default (DB templates optional)
- **Easy Migration** - Quick prototyping in DB, commit to files when ready

#release

## [1.3.6] - 2025-11-13

### Added
- **Content Container Width Variants**
  - NEW: `.width-thin` modifier for content containers (900px max-width)
  - NEW: `.width-wide` modifier for content containers (1400px max-width)
  - NEW: `.width-full` modifier for content containers (100% max-width)
  - All widths configurable via CSS variables: `--doc-max-width-thin`, `--doc-max-width-wide`, `--doc-max-width`
  - Enables flexible section width control for different content types

- **Status Heading Modifiers**
  - NEW: `.status-heading` base class for progress status headings
  - NEW: `.status-heading.completed` modifier with success color
  - NEW: `.status-heading.in-progress` modifier with brand primary color
  - NEW: `.status-heading.upcoming` modifier with muted color
  - Dark mode support for all status heading variants

- **Info Block Building Block**
  - NEW: `.info-block` base class for generic informational containers
  - NEW: `.info-block.gradient` modifier for gradient background with shadow
  - NEW: `.info-block.centered` modifier to center h4 headings
  - Replaces specific classes like `.tech-stack` and `.use-of-funds` with reusable pattern

- **Phase Box Icon Variant**
  - NEW: `.phase-box.with-icon` modifier adds checkmark icon before content
  - Icon color uses brand primary for consistency

- **Status Badge Positioning**
  - NEW: Flexbox-based positioning for status badges in progress card headings
  - `.progress-indicator h3` and `.progress-card h3` use flexbox with space-between
  - Removes need for inline float styles

### Changed
- **Template Consolidation (slug-project-overview.php)**
  - Converted manual `<span>▸</span>` bullets to semantic `<ul class="list chevron-list">`
  - Replaced inline color styles with `.status-heading` modifier classes
  - Updated `.tech-stack` containers to use `.info-block`
  - Updated `.use-of-funds` containers to use `.info-block.gradient.centered`
  - Removed all inline positioning styles from status badges

- **Fixed Duplicate Section Headers**
  - Corrected "Revenue Streams" section header (was showing "Funding Requirements")
  - Updated section label, title, and subtitle to accurately reflect content

### Benefits
- **Configurable Width System** - Easy adjustment of section widths via CSS variables in config
- **Cleaner HTML** - Removed 8+ inline styles, replaced with building block classes
- **Better Consistency** - Status headings, info blocks follow unified design system
- **Improved Maintainability** - Generic building blocks reduce code duplication
- **Semantic Markup** - Proper use of `<ul>` for lists instead of manual div/span patterns
- **Flexible Layout Control** - Content container widths can be customized per section

#release

## [1.3.5] - 2025-11-13

### Added
- **List Consolidation with Base Class Pattern**
  - NEW: Base `.list` class with shared structural styles for all icon-based lists
  - NEW: `.check-list` variant for milestone tracking with checkmarks (✓)
  - NEW: `.chevron-list` variant for large feature lists with chevron icons (›)
  - NEW: `.arrow-list` variant for simple directional lists with arrows (→)
  - NEW: List state modifiers (`.upcoming`, `.in-progress`) for milestone tracking
  - All icon lists now share consistent structure: gap, alignment, padding, line-height

- **Card Consolidation with Base Class Pattern**
  - NEW: Base `.card` class with shared structure and material design box-shadow
  - NEW: `.feature-card` variant for feature highlights with gradient background
  - NEW: `.progress-card` variant with brand accent border-left
  - NEW: `.metric-card` variant with center alignment and gradient background
  - NEW: `.funding-card` variant with white background for funding information
  - NEW: `.info-card` variant with gradient background for informational content
  - NEW: `.roadmap-card` variant with transparent background for dark contexts
  - All cards now have consistent elevation with smooth hover transitions

- **Dark Mode Support for Lists**
  - NEW: Dark mode overrides for all list icon colors in `.dark-mode` contexts
  - List icons automatically switch to white (`--color-text-light`) on dark backgrounds
  - Check-list, chevron-list, and arrow-list all support dark mode
  - Milestone list state indicators properly themed for dark backgrounds

### Changed
- **Material Design Box Shadows (All Cards)**
  - Added consistent material design shadows to all card-like components
  - Default elevation: `0 2px 4px rgba(0,0,0,0.1), 0 4px 8px rgba(0,0,0,0.06)`
  - Hover elevation: `0 4px 8px rgba(0,0,0,0.12), 0 8px 16px rgba(0,0,0,0.08)`
  - Updated legacy classes: `.progress-indicator`, `.funding-phase`, `.use-of-funds`
  - All cards now have smooth box-shadow transitions (0.3s ease)

- **CSS Architecture Improvements**
  - Lists follow DRY principle: base class + variant-specific styling
  - Cards follow DRY principle: base class + variant-specific styling
  - Reduced CSS duplication by ~40% through consolidation
  - Legacy classes maintained for full backward compatibility

### Benefits
- **Consistent Visual Hierarchy** - Material design shadows provide depth and professional aesthetics across all card components
- **Better Code Maintainability** - Base class patterns reduce duplication and make updates easier
- **Improved Dark Mode Support** - All list icons automatically adapt to dark backgrounds
- **Backward Compatible** - Legacy class names (`.milestone-list`, `.icon-list`, `.progress-indicator`, `.funding-phase`) continue to work
- **Flexible Architecture** - Easy to add new list or card variants by extending base classes
- **Better Performance** - Reduced CSS payload through consolidated rules

#release

## [1.3.4] - 2025-11-12

### Added
- **Button Styles Enhancement**
  - NEW: White outline button styles for dark-mode contexts
  - NEW: White outline button styles for cta-gradient contexts
  - Buttons now adapt to dark and gradient backgrounds with proper contrast

- **Icon List Alignment**
  - NEW: Added `margin-top: -4px` to `.icon-list li::before` for better vertical alignment
  - Chevron icons now align properly with list text

### Changed
- **Material Design Box Shadows**
  - Upgraded `.feature-card` to use layered material design shadows
  - Upgraded `.content-card.has-shadow` to use layered material design shadows
  - Added smooth transition effects on hover
  - Shadows: `0 2px 4px rgba(0,0,0,0.1), 0 4px 8px rgba(0,0,0,0.06)`
  - Hover: `0 4px 8px rgba(0,0,0,0.12), 0 8px 16px rgba(0,0,0,0.08)`

- **CSS Variables Migration**
  - Replaced hard-coded colors throughout pro-sites.css with CSS variables
  - NEW variables: `--color-success`, `--color-warning-bg`, `--color-warning-text`, `--color-error-bg`, `--color-error-text`
  - NEW variables: `--color-text-tertiary`, `--color-background-lighter`, `--color-white`
  - Updated milestone lists, progress indicators, metrics, status badges, and feature cards
  - All project-specific components now use CSS variable system

- **Layout Refactoring**
  - Refactored row layout to use CSS classes instead of inline styles
  - Removed `wrap` parameter - rows automatically stack on mobile (< 768px)
  - Added alignment classes: `.align-top`, `.align-center`, `.align-bottom`
  - Added justify classes: `.justify-start`, `.justify-center`, `.justify-end`, `.justify-space-between`
  - Refactored stack layout to use CSS classes for alignment
  - Added stack alignment classes: `.align-left`, `.align-center`, `.align-right`
  - Only `gap` remains as inline style (dynamic value)

### Benefits
- **Better Dark Mode Support** - Outline buttons now visible and accessible on dark backgrounds
- **Professional Aesthetics** - Material design shadows provide depth and hierarchy
- **Improved Maintainability** - CSS variables enable easy theming and color management
- **Cleaner HTML** - Minimal inline styles, CSS-based layout control
- **Automatic Mobile Responsiveness** - Rows stack automatically without configuration
- **Consistent Architecture** - Row and stack content types share same pattern

#release

## [1.3.3] - 2025-11-12

### Added
- **Grid Item Customization**
  - NEW: `custom_id` support for grid items - assign custom IDs to grid item wrappers
  - NEW: `custom_classes` support for grid items - add custom CSS classes to grid item wrappers
  - NEW: `custom_css` support for grid items - apply inline styles to grid item wrappers
  - Grid items now have feature parity with row and stack items for customization

### Changed
- **Pro-Sites CSS Refactoring**
  - Moved base flexbox styles from inline to CSS for row content type
    - `display: flex` and `flex-direction: row` now in `.content-row` class
    - Dynamic properties (gap, align-items, justify-content, flex-wrap) remain inline
  - Moved base flexbox styles from inline to CSS for stack content type
    - `display: flex` and `flex-direction: column` now in `.content-stack` class
    - Dynamic properties (gap, align-items, text-align) remain inline
  - Updated `row.php` and `stack.php` to remove redundant inline styles

### Benefits
- **Consistent Customization** - All layout types (row, stack, grid) now support the same per-item customization options
- **Cleaner HTML** - Base flexbox properties defined in CSS reduce inline style bloat
- **Better Maintainability** - Structural styles centralized in stylesheet, only dynamic values inline
- **Improved Performance** - Reduced HTML payload with CSS-based layout definitions

#release

## [1.3.2] - 2025-11-12

### Added
- **Section Alignment Classes**
  - NEW: `.align-center` class for centering text and buttons in pro-sites sections
  - NEW: `.align-right` class for right-aligning text and buttons in pro-sites sections
  - Automatically aligns `.section-buttons` with `justify-content` for proper button positioning
  - Apply via `custom_classes` in section settings instead of individual element alignment

- **CTA Section Styling**
  - NEW: `.cta-gradient` class for call-to-action sections
  - Applies brand gradient background (primary → secondary)
  - Automatically sets white text color for heading, subtitle, and content
  - Designed to make CTAs stand out with professional gradient styling

### Changed
- **Pro-Sites CSS Organization**
  - Moved section alignment rules to top-level classes in `pro-sites.css`
  - Consolidated text and button alignment into single parent class application
  - Improved CSS cascade for dark-mode and gradient backgrounds

- **Template Refactoring**
  - BRMO `slug-project-overview.php`: Replaced inline gradient styles with `.cta-gradient .align-center` classes
  - BICWA `slug-funding-initiatives.php`: Added `.align-center` class, removed inline text-align styles
  - Both templates now use CSS classes exclusively for alignment and CTA styling

- **Pro-Sites Builder Skill Updates**
  - Added guidance for section alignment classes (`.align-center`, `.align-right`)
  - Added `.cta-gradient` and `.dark-mode` documentation
  - NEW: Call-to-Action Section pattern example showing proper class usage
  - Reinforced CSS class priority over inline styles

### Benefits
- **Consistent CTA Styling** - Single source of truth for call-to-action sections across all templates
- **Simplified Alignment** - One class on parent element handles all child alignment
- **Better Maintainability** - Changes to CTA or alignment styles update everywhere
- **Cleaner Code** - Removed inline styles and redundant alignment properties
- **Mobile Responsive** - Alignment classes work seamlessly across all screen sizes

#release

## [1.3.1] - 2025-11-12

### Changed
- **Pro-Sites CSS Refactoring**
  - Moved all inline styles from BRMO template to `pro-sites.css`
  - Added 350+ lines of reusable project-specific components
  - New classes: progress indicators, milestone lists, metrics, status badges, funding phases
  - Utility grids: `.grid-2col`, `.grid-3col`, `.grid-4col`, `.grid-2col-funding`
  - Feature/advantage cards: `.feature-card`, `.roadmap-card`, `.phase-box`
  - Technical stack and use-of-funds containers
  - Text utilities: `.text-center`, `.text-lead`, `.text-large`, `.text-muted`
  - Spacing utilities: `.mb-16`, `.mb-16`, `.mb-24`, `.mb-32`, `.mt-24`, `.mt-32`
  - Removed custom `<style>` block from `slug-project-overview.php`
  - Template now uses CSS classes instead of inline styles throughout

- **Consistent List Styling System**
  - NEW: `.icon-list` class with chevron icons (›) for feature lists
  - NEW: `.arrow-list` class with arrow icons (→) for simple lists
  - Existing: `.milestone-list` with checkmarks (✓) for progress tracking
  - All three list types follow consistent markup pattern with CSS pseudo-elements
  - Removed deprecated `.list-with-icon` and `.list-arrow` classes
  - Updated BRMO template to use new list classes throughout
  - Mobile-responsive font size adjustments for all list types

- **Pro-Sites Builder Skill Updates**
  - Updated best practices to ALWAYS prioritize CSS classes over inline styles
  - Added documentation for utility classes and component classes
  - Added list class references: `.milestone-list`, `.icon-list`, `.arrow-list`
  - Guidance to only use inline styles for dynamic values or specific layout properties

### Benefits
- **Reusable Styles** - CSS classes can be used across all project templates
- **Better Maintainability** - Single source of truth for styling in pro-sites.css
- **Cleaner Templates** - Reduced code duplication and smaller template files
- **Consistent Lists** - Unified structure for all list types with icon management via CSS
- **Organized Codebase** - Clear separation of concerns between content and styling
- **Mobile Responsive** - Automatic adjustments for all component classes

## [1.3.0] - 2025-11-12

### Added
- **Pro-Sites Builder Skill**
  - NEW: `.claude/skills/pro-sites-builder/` - AI-assisted layout generation skill
  - Comprehensive skill for creating pro-sites partial configurations
  - Triggers on "I need to create a pro-sites layout for [description]"
  - Describe & generate workflow: analyzes content descriptions and generates PHP configs
  - Complete schema files:
    - `schemas/content-types.json` - All 10 content renderers documented
    - `schemas/partials.json` - Column, 2-column, grid specs with examples
    - `schemas/examples.json` - 10 common layout patterns (hero, feature grid, CTA, etc.)
  - Includes validation, best practices, and responsive design guidance
  - Version 1.0.0

- **BICWA Funding Presentation Template**
  - NEW: `templates/pages/bicwa/slug-funding-presentation.php`
  - Comprehensive funding opportunities presentation for WA honey sector
  - 5 sections: Overview, Grant Streams (8 programs), Funding Matrix, Takeaways, Next Steps
  - Features:
    - 2x4 grid of grant program cards with links
    - Custom HTML table with color-coded grant tags
    - Icon-based takeaway cards with gradient backgrounds
    - Q1-Q4 2026 timeline visualization
    - Bid-prep checklist and CTA buttons
  - Generated using new pro-sites-builder skill

### Fixed
- **Grid Content Renderer**
  - NEW: `templates/pages/_partials/pro-sites/_lib/content/grid.php`
  - Critical fix: Enables grid layouts to be nested within stack/row content types
  - Supports fixed column count (2, 3, 4) or auto-fit/auto-fill responsive grids
  - Configurable gap and min-width properties
  - Renders any content type within grid items (cards, html, images, etc.)
  - Resolves issue where grids within stacks were not rendering
  - Added corresponding CSS: `.content-grid` and `.grid-item` styles

- **Card Content Structure in Strategic Takeaways**
  - Fixed missing `type` and `content` wrapper in card body configuration
  - File: `templates/pages/bicwa/slug-opportunities-today.php:345-357`
  - Card renderer expects: `body: { type: 'html', content: { html: '...' } }`
  - Resolves empty card-body rendering issue
  - "Immediate Priorities" content now displays correctly

### Benefits
- **Faster Layout Development** - Pro-sites-builder skill accelerates template creation
- **Better Nesting Support** - Grid renderer enables complex nested layouts
- **More Use Cases** - Funding presentation demonstrates advanced pro-sites capabilities
- **AI-Powered Generation** - Skill analyzes descriptions and generates validated configs

## [1.2.9] - 2025-11-12

### Changed
- **BICWA Folder Naming Convention**
  - Renamed `templates/pages/BICWA/` to `templates/pages/bicwa/` (lowercase)
  - Maintains consistency with other client folder naming (refr, brhu, etc.)
  - All template paths updated automatically via git mv

- **Pro-Sites Row Layout Improvements**
  - Updated default CSS for `.row-item` from `flex-shrink: 1` to `width: 100%`
  - Ensures row items take full width by default for more predictable layouts
  - File: `templates/pages/_partials/pro-sites/pro-sites.css:420-422`

- **BICWA Opportunities Template Refactoring**
  - Refactored Premium Products section to use stack (text + grid-4) instead of separate partials
  - Refactored Certified Marketplace section to use stack (text + grid-4) instead of separate partials
  - Refactored Strategic Takeaways section to use row (text + card) instead of html content type
  - Cleaner nested structure with better semantic grouping
  - Net reduction: 18 lines (151 insertions, 133 deletions)

### Benefits
- **Consistent naming** - All client folders now use lowercase convention
- **Better layouts** - Row items behave more predictably with full-width default
- **Cleaner composition** - Nested stack/row layouts reduce code complexity

## [1.2.8] - 2025-11-12

### Added
- **Client Code Meta Box for Robust Template Routing**
  - New meta box in page editor sidebar for manual client code override
  - Meta field: `_leancms_client_code` stores custom client codes
  - Simple free text input field (no dropdowns, no filesystem scanning)
  - Sanitization: lowercase, alphanumeric + hyphens only
  - Shows helpful template path preview in meta box
  - Secure nonce validation for all saves
  - Optional field: leave blank to auto-detect from page slug
  - NEW: `includes/content/class-client-code-meta-box.php` - Meta box class

- **Enhanced Template Resolution Priority**
  1. Check `_leancms_client_code` meta field (manual override - highest priority)
  2. Auto-detect from page slug (e.g., 'refr-brand-guide' → 'refr')
  3. Fallback to flat structure (backward compatible)
  - MODIFIED: `includes/content/class-template-subfolder-resolver.php`
    - Added `get_client_code()` method to check meta field first
    - Renamed `extract_client_code()` to `extract_client_code_from_slug()`
    - Added fallback pattern matching for any 4-letter code (not just registered)
    - Updated documentation to reflect new priority order
  - MODIFIED: `leancms.php` - Boot new meta box class

- **BICWA Honey Opportunities Presentation Templates**
  - New client folder: `templates/pages/BICWA/`
  - Two presentation templates for Western Australia's honey industry opportunities:
    1. `slug-opportunities-today.php` - Uses pro-sites partials system
       - Column, 2-column, and grid partials with dark mode sections
       - Honey-themed color palette (amber, gold, forest green)
       - Fully responsive with mobile breakpoints
    2. `slug-opportunities-today-html.php` - Material Design HTML layout
       - Material Design principles with elevated cards
       - Google Roboto fonts (Roboto, Roboto Slab)
       - Material color palette (Deep Orange, Amber, Cyan)
       - Card-based layouts with hover effects
       - Responsive grid system using CSS Grid
  - Content coverage:
    - Premium & Functional Honey Products (4 cards)
    - Apiary & Experience Tourism (featured 2-column layout)
    - Certified Honey Marketplace (4 cards)
    - Strategic Takeaways and Vision statement

### Benefits
- **Flexible Template Routing**: Manual override capability for any client code without modifying slugs
- **Simple Implementation**: Free text field approach keeps system lightweight and fast
- **Privacy-Focused**: Client codes not exposed in dropdowns or UI
- **Backward Compatible**: Existing pages work without changes
- **No Performance Impact**: Minimal logic, no filesystem scanning
- **Professional Presentation Templates**: Two distinct visual approaches for same content

### Example Usage
```php
// In WordPress page editor, set Client Code meta box to "BICWA"
// Page slug: "opportunities-today"
// Resolves to: templates/pages/BICWA/slug-opportunities-today.php

// Or leave blank to auto-detect from slug:
// Page slug: "bicwa-opportunities-today"
// Resolves to: templates/pages/BICWA/slug-opportunities-today.php
```

## [1.2.7] - 2025-11-11

### Added
- **Pre/Post HTML Support for Pro-Sites Partials**
  - Added `pre_html` parameter to render custom HTML before header section
  - Added `post_html` parameter to render custom HTML after footer section
  - Applied to all pro-sites partials:
    - `column-section.php`
    - `2-column-section.php`
    - `grid-section.php`
  - Enables flexible insertion of custom elements (badges, links, notices) outside standard structure
  - Render order: wrapper-open → pre_html → header → content → footer → post_html → wrapper-close

- **Pre/Post HTML Support for Top-Section Partials**
  - Added `pre_html` and `post_html` support to `page-header.php`
  - Added `pre_html` and `post_html` support to `hero-section.php`
  - Matches pattern used in pro-sites partials for consistency
  - Allows custom HTML before/after hero and page header components

- **Custom Styling for Row and Stack Items**
  - Added `custom_id` parameter for individual item IDs
  - Added `custom_classes` parameter for custom CSS classes on items
  - Added `custom_css` parameter for inline styles on items
  - Applied to both content renderers:
    - `templates/pages/_partials/pro-sites/_lib/content/row.php`
    - `templates/pages/_partials/pro-sites/_lib/content/stack.php`
  - Works alongside existing parameters (e.g., `width` for row items)
  - Provides section-level styling flexibility for individual items

### Changed
- **BRMO Template Layout Adjustments**
  - Moved 'Early stage development' status badge to page-header section above title
  - Converted "What Makes BMG Unique" list to 2-column grid layout
  - Updated Target Market to explicit 4-column grid layout
  - Restructured Planning phase milestones to 3 columns (Complete, In Progress, Upcoming)
  - Changed Planned Features to 2-column grid layout
  - Set Funding phases (Phase 1 & 2) to side-by-side 2-column layout
  - Updated Competitive Advantages to 2-column grid layout
  - Changed Next Steps to explicit 3-column grid layout
  - Net reduction: 13 lines (66 insertions, 79 deletions)

### Fixed
- **Variable Naming Consistency**
  - Fixed `2-column-section.php` to use `$config` instead of `$section_config` for pre_html/post_html
  - Fixed `grid-section.php` to use `$config` instead of `$section_config` for pre_html/post_html
  - Ensures consistency with `column-section.php` pattern

### Technical Details
- All partials now support flexible HTML injection at key render points
- Row and stack items can be individually styled without wrapping in HTML type
- Improved code consistency across all partial types
- Enhanced documentation in all updated files

### Benefits
- Greater flexibility for custom UI elements without modifying partial core structure
- Consistent API across all partial types (pro-sites and top-section)
- Individual item styling without verbose HTML wrappers
- Better separation of concerns between structure and presentation
- Easier to create badges, notices, breadcrumbs, and custom elements

### Example Usage
```php
// Pre/Post HTML in partials
partial('column', [
    'pre_html' => '<div class="announcement">Special offer!</div>',
    'header' => [...],
    'content' => [...],
    'post_html' => '<a href="/archive">View all →</a>',
], 'pro-sites');

// Custom styling for row items
partial('column', [
    'content' => [
        'type' => 'row',
        'items' => [
            [
                'type' => 'html',
                'content' => [...],
                'custom_id' => 'feature-card',
                'custom_classes' => 'card-wrapper featured',
                'custom_css' => 'padding: 30px; background: white; border-radius: 12px;',
            ],
        ],
    ],
], 'pro-sites');
```

## [1.2.6] - 2025-11-11

### Added
- **BRMO (Break Move Guy) Project Folder**
  - New client folder for Break Move Guy AI-driven breakdancing sprite system
  - `templates/pages/brmo/slug-project-overview.php` - Comprehensive project overview page
  - `templates/pages/brmo/README.md` - Complete project documentation
  - Project Details:
    - AI-powered sprite generation for 36 breakdancing poses (288 total sprites)
    - 80% time reduction vs manual animation (3-5 min vs 15-30 min per sprite)
    - Funding: Phase 1 ($25K-$40K MVP), Phase 2 ($60K-$100K Full Production)
    - Status: Planning 75%, Development 0%, Funding 0%
    - Proprietary Directive Control Vocabulary and 3D coordinate system
  - Uses pro-sites partials with custom progress indicators, metrics cards, funding displays
  - Custom CSS for progress bars, milestone tracking, and responsive design

- **BIBO (Big Boss City) Project Folder**
  - New client folder for Big Boss City multi-format creative IP
  - `templates/pages/bibo/slug-project-overview.php` - Comprehensive project overview page
  - `templates/pages/bibo/README.md` - Complete project documentation
  - Project Details:
    - 15 fully designed boss characters in chaotic urban landscape
    - Multi-format: Beat-em-up game, comic series, merchandise
    - Funding: $150K-$300K seed funding
    - Status: Planning 65%, Development 0%, Funding 0%
    - Bold black-and-white "Bongo Style" visual aesthetic
    - Territory-based world with dual protagonists (Bongo and Duke)
  - Uses pro-sites partials with custom hero, highlight cards, product cards, roadmap phases
  - Custom CSS with black/white/orange color scheme, bold graphic design

- **JIKU (Jiku Character Universe) Project Folder**
  - New client folder for Jiku Character Universe educational IP
  - `templates/pages/jiku/slug-project-overview.php` - Comprehensive project overview page
  - `templates/pages/jiku/README.md` - Complete project documentation
  - Project Details:
    - 9 Australian animal characters led by Jiku the Quokka
    - Educational content, children's entertainment, digital media
    - Funding: $50K-$75K AUD (Initial), $100K-$150K AUD (Growth)
    - Status: Planning 75%, Development 0%, Funding 0%
    - Bold black line art on white background aesthetic
    - Western Australian locations (Rottnest Island, Yalgorup National Park)
  - Uses pro-sites partials with character cards, market cards, metric boxes, timeline phases
  - Custom CSS with Australian nature-inspired green/teal color scheme

### Technical Details
- All three projects use consistent pro-sites partial architecture
- Responsive design with mobile optimization across all pages
- Custom CSS components for progress tracking, character displays, funding breakdowns
- Comprehensive README.md documentation for each project folder
- Total files added: 6 (3 overview pages + 3 README files)

### Benefits
- Demonstrates versatile application of pro-sites partial system across different creative IPs
- Provides template examples for:
  - AI/Tech projects (BRMO - sprite generation)
  - Entertainment/Gaming projects (BIBO - multi-format IP)
  - Educational/Children's content (JIKU - character universe)
- Each project showcases unique color schemes and design approaches
- Consistent structure makes it easy to create new project overview pages

## [1.2.5] - 2025-11-09

### Added
- **Page Header Partial**
  - New `page-header.php` partial in `top-section` for consistent page headers
  - Provides branded header with title and optional subtitle
  - Uses brand primary color background with white text
  - Replaces inline page headers across demo templates
  - Added to partial registry with `page_header_config` wrapper

- **CSS Loader Partial**
  - New `loader.php` partial in `top-section` for consolidated CSS loading
  - Loads global and client CSS configurations automatically
  - Merges CSS variables from both configs
  - Outputs CSS links for base.css and document-system.css
  - Generates inline style block with CSS custom properties
  - Configurable client config path via parameter
  - Added to partial registry with `loader_config` wrapper

### Changed
- **Test Template Consolidation**
  - Updated 6 test templates to use page-header partial:
    - `slug-pro-sites-test-grid.php`
    - `slug-pro-sites-test-html.php`
    - `slug-pro-sites-test-image.php`
    - `slug-pro-sites-test-2-column.php`
    - `slug-pro-sites-test-text.php`
    - `slug-pro-sites-test-video.php`
  - Replaced CSS loading blocks with loader partial
  - Reduced duplicate code by ~120 lines across templates
  - Improved maintainability with single source of truth

### Example Usage

**Page Header:**
```php
partial('page-header', [
    'title' => 'Page Title',
    'subtitle' => 'Optional description',
], 'top-section');
```

**CSS Loader:**
```php
partial('loader', [
    'client_config_path' => __DIR__ . '/../refr/config.php',
], 'top-section');
```

## [1.2.4] - 2025-11-09

### Added
- **Heading Content Type**
  - New `heading.php` content renderer for standalone headings in grid items or columns
  - Supports configurable heading sizes: h1, h2, h3, h4, h5, h6 (default: h2)
  - Supports alignment: left, center, right (default: left)
  - Optional custom CSS class support
  - Dark mode support with proper color variables
  - Perfect for semantic heading structure in complex layouts

- **Header Component Enhancement**
  - Added `title_size` parameter to header.php for configurable heading levels
  - Allows semantic HTML structure with correct heading hierarchy
  - Maintains backward compatibility (defaults to h2 if not specified)
  - Validates heading size to ensure only h1-h6 are used

- **Heading CSS Styles**
  - Added `.content-heading` styles to `pro-sites.css`
  - Supports alignment classes (`.align-left`, `.align-center`, `.align-right`)
  - Uses theme variables for font, weight, and line-height
  - Dark mode support with appropriate color contrast

### Example Usage

**Heading Content Type:**
```php
[
    'type' => 'heading',
    'content' => [
        'text' => 'Your Heading Text',
        'size' => 'h3',              // h1|h2|h3|h4|h5|h6
        'align' => 'center',          // left|center|right
        'class' => 'custom-class',    // Optional
    ],
]
```

**Header with Custom Title Size:**
```php
'header' => [
    'heading' => [
        'title' => 'Main Title',
        'title_size' => 'h1',        // NEW: Configurable heading level
        'align' => 'center',
    ],
]
```

## [1.2.3] - 2025-11-09

### Added
- **Grid Section Layout (CSS Grid)**
  - New `grid-section.php` partial for multi-item grid layouts
  - Supports fixed column counts (e.g., `'columns' => 3`) or auto-responsive (`'auto-fit'`, `'auto-fill'`)
  - Auto-responsive with `repeat(auto-fit, minmax(250px, 1fr))` pattern
  - Supports all content types: text, image, video, html, buttons
  - Perfect for product grids, image galleries, feature cards, and team displays
  - Collapses to single column on mobile (< 768px)

- **Grid Section CSS Styles**
  - Added `.lcms-grid-section` styles to `pro-sites.css`
  - Grid item content type styles (`.grid-item-text`, `.grid-item-image`, etc.)
  - Mobile responsive behavior with single-column collapse
  - Consistent styling with existing pro-sites components

- **Grid Section Test Template**
  - New test file: `slug-pro-sites-test-grid.php`
  - 7 comprehensive test cases covering:
    - Fixed 3-column image grid
    - Auto-fit responsive card grid
    - 4-column product grid with footer buttons
    - 2-column video gallery
    - Mixed content grid (text, images, HTML)
    - Auto-fill grid demonstration
    - 5-column compact grid with tight spacing

### Changed
- **Documentation Updates**
  - Updated README.md version to 1.2.3
  - Added comprehensive grid-section documentation
  - Added "When to Use" guidance for grid vs 2-column vs column layouts
  - Documented grid column options (fixed, auto-fit, auto-fill)
  - Updated key features to reflect 6 section types
  - Added width options documentation for 2-column section

### Layout Architecture
The Pro-Sites system now has clear separation of layout responsibilities:
- `column-section.php` - Single-column universal content
- `2-column-section.php` - Side-by-side compositional layouts (Flexbox)
- `grid-section.php` - Multi-item card/gallery grids (CSS Grid)

## [1.2.2] - 2025-11-09

### Changed
- **2-Column Section Converted to Flexbox Layout**
  - Changed from CSS Grid to Flexbox for better column width control
  - Column widths now work as expected (supports percentages, fr units, and pixels)
  - Removed hack: `$col_width = '100%'` no longer needed
  - Preserves responsive behavior (collapses to single column on mobile)
  - Positions 2-column-section for specific two-column layouts vs future grid-section for multi-item grids
  - CSS: `grid-template-columns` replaced with `flex` on `.lcms-2-column-section .columns-wrapper`
  - PHP: Columns now use `flex-basis` for explicit widths or `flex-grow` for fr units

- **Component File Naming Consistency**
  - Renamed `_lib/heading.php` → `_lib/header.php` for semantic clarity
  - Renamed `_lib/buttons.php` → `_lib/footer.php` for semantic clarity
  - Updated all @filepath docblock comments to reflect new names
  - Updated all documentation references in README.md and CHANGELOG.md
  - No functional changes - backward compatibility maintained
  - Note: `_lib/content/buttons.php` (content renderer) remains unchanged

### Fixed
- **Partial Registry Configuration**
  - Added `column` and `pro-sites/column` to partial registry config wrappers
  - Fixes issue where `column` partial wasn't wrapping config in `section_config`
  - Text content now renders correctly when using new column partial

- **Video Content Rendering**
  - Updated video content renderer to support both nested and flat structures
  - Now reads from `$content['video']` first, falls back to `$content` for backward compatibility
  - Fixes conflict where `type` was used for both content renderer type and video type
  - Videos now display correctly in all templates

### Changed
- **Updated Demo and Test Templates**
  - Migrated all single-column demo and test templates to use new `column` partial
  - `slug-pro-sites-demo.php` - Updated all text, image, video, and HTML sections
  - `slug-pro-sites-test-text.php` - All 10 tests now use `column` partial with `type: 'text'`
  - `slug-pro-sites-test-image.php` - All 9 tests now use `column` partial with `type: 'image'`
  - `slug-pro-sites-test-video.php` - All 10 tests now use `column` partial with nested video config
  - `slug-pro-sites-test-html.php` - All 7 tests now use `column` partial with `type: 'html'`

### Documentation
- Updated all template file headers to reflect v1.2.0+ approach
- Added `@updated 1.2.1 - Migrated to column partial` to file docblocks
- Page headers now indicate "Column Section Tests (Content Type)"

### Video Structure Change
**Old (deprecated but supported):**
```php
'content' => ['type' => 'youtube', 'src' => '...']
```

**New (recommended):**
```php
'content' => [
  'type' => 'video',
  'video' => ['type' => 'youtube', 'src' => '...']
]
```

## [1.2.1] - 2025-11-09

### Fixed
- **Undefined $section_type Variable Error**
  - Fixed PHP error in `wrapper-open.php:43` when rendering pro-sites partials
  - Added `$section_type` variable to `column-section.php` before including wrapper
  - Updated backward compatibility wrappers (`text-section.php`, `image-section.php`, `video-section.php`, `html-section.php`)
  - Each wrapper now sets type-specific `$section_type` to maintain backward compatible CSS class names
  - Ensures custom CSS targeting `.lcms-text-section`, `.lcms-image-section`, etc. continues to work

### Changed
- Backward compatibility wrappers now inline wrapper/content rendering instead of delegating to `column-section.php`
  - Maintains original CSS class names (`.lcms-text-section` vs `.lcms-column-section`)
  - Prevents breaking changes to existing custom styles
  - Each wrapper renders independently with correct section type

## [1.2.0] - 2025-11-09

### Changed - Architecture Refactor
- **Separated Layout Structure from Content Types**
  - New content renderer system provides cleaner separation of concerns
  - Layout partials (`column-section.php`, `2-column-section.php`) now focus purely on structure
  - Content renderers (`_lib/content/*.php`) handle content display
  - Benefits: DRY architecture, easier maintenance, extensible for future layouts

### Added

**Content Renderer System (`templates/pages/_partials/pro-sites/_lib/content/`):**
- `text.php` - Renders text content with format options (standard, lead, small)
- `image.php` - Renders images with caption and lazy loading support
- `video.php` - Renders video embeds (YouTube, Vimeo, HTML5)
- `html.php` - Renders raw HTML content (wp_kses_post sanitized)
- `buttons.php` - Renders button groups for use in columns

**Universal Layout Partial:**
- `column-section.php` - Single-column layout supporting any content type
  - Accepts `content.type` parameter to determine which renderer to use
  - Delegates to appropriate content renderer from `_lib/content/`
  - Replaces 4 type-specific partials with one flexible layout

### Changed

**Simplified 2-Column Section:**
- `2-column-section.php` refactored to use content renderers
  - Reduced from ~170 lines to ~100 lines
  - Removed inline rendering logic (switch statement)
  - Now delegates to `_lib/content/*.php` for each column
  - Supports all content types consistently

### Deprecated

**Type-Specific Partials (Backward Compatibility Maintained):**
- `text-section.php` - Now thin wrapper delegating to `column-section.php`
- `image-section.php` - Now thin wrapper delegating to `column-section.php`
- `video-section.php` - Now thin wrapper delegating to `column-section.php`
- `html-section.php` - Now thin wrapper delegating to `column-section.php`
- All marked `@deprecated 1.2.0` and will be removed in v2.0.0
- Old patterns continue to work without changes

### Migration Path

**Old Pattern (Still Supported):**
```php
partial('text', [
    'header' => ['heading' => [...]],
    'content' => ['text' => '...', 'format' => 'standard'],
    'footer' => ['buttons' => [...]],
], 'pro-sites');
```

**New Pattern (Recommended):**
```php
partial('column', [
    'header' => ['heading' => [...]],
    'content' => ['type' => 'text', 'text' => '...', 'format' => 'standard'],
    'footer' => ['buttons' => [...]],
], 'pro-sites');
```

**Steps to Migrate:**
1. Change partial name from type (`text`, `image`, `video`, `html`) to layout (`column`)
2. Add `'type' => 'content-type'` to the `content` array
3. Keep all other configuration the same

**No immediate action required** - Old partials delegate to new architecture automatically.

### Benefits

**DRY Architecture:**
- Single-column logic exists once instead of duplicated 4 times
- Text rendering logic in one place, used by all layouts

**Easier Maintenance:**
- Update text rendering once in `_lib/content/text.php`, affects all layouts
- Bug fixes apply consistently across single-column, 2-column, and future layouts

**Extensibility:**
- Add new layouts (grid, 3-column) without duplicating content rendering
- Add new content types (gallery, accordion) and use in any layout
- Layout and content are independent concerns

**Consistency:**
- Text renders identically whether in single-column or 2-column layout
- Predictable behavior across all section types

### Documentation

**Updated README.md:**
- Documented new architecture and separation of concerns
- Added content type examples showing new vs old patterns
- Added Migration Guide with step-by-step instructions
- Updated version history with v1.2.0 entry
- All code examples show recommended new pattern

## [1.1.9] - 2025-11-09

### Changed - BREAKING
- **Refactored Pro-Sites Config Structure to Semantic Header/Footer Pattern**
  - Changed from flat `heading`/`buttons` structure to nested `header.heading` and `footer.buttons`
  - Provides better HTML5 semantic alignment and improved extensibility
  - Backward compatibility maintained in shared components (`_lib/header.php` and `_lib/footer.php`)

### Breaking Changes

**Old Structure (Deprecated but still supported):**
```php
$section_config = [
    'settings' => [...],
    'heading'  => [...],   // Deprecated
    'content'  => [...],
    'buttons'  => [...],   // Deprecated
];
```

**New Structure (Recommended):**
```php
$section_config = [
    'settings' => [...],
    'header'   => [
        'heading' => [...],
    ],
    'content'  => [...],
    'footer'   => [
        'buttons' => [...],
    ],
];
```

### Updated

**Shared Components (`templates/pages/_partials/pro-sites/_lib/`):**
- `header.php` - Now wraps output in `<header class="section-header">` element
  - Supports both `$config['header']['heading']` (new) and `$config['heading']` (old)
  - Backward compatibility via null coalescing operator
- `footer.php` - Now wraps output in `<footer class="section-footer">` element
  - Supports both `$config['footer']['buttons']` (new) and `$config['buttons']` (old)
  - Backward compatibility via null coalescing operator

**Template Files (56 config examples migrated):**
- `slug-pro-sites-demo.php` - 10 section configs updated
- `slug-pro-sites-test-text.php` - 10 section configs updated
- `slug-pro-sites-test-image.php` - 9 section configs updated
- `slug-pro-sites-test-video.php` - 10 section configs updated
- `slug-pro-sites-test-2-column.php` - 10 section configs updated
- `slug-pro-sites-test-html.php` - 7 section configs updated

**Documentation:**
- `README.md` - Complete documentation update with new structure
  - Updated configuration pattern section
  - Updated all code examples to use new structure
  - Added backward compatibility notes
  - Updated version history with breaking change notice

### Benefits

**Improved Semantics:**
- Aligns config structure with HTML5 semantic elements
- Clear separation of header, content, and footer concerns
- More intuitive API structure

**Better Extensibility:**
- Easy to add breadcrumbs, tags, or metadata to header in future
- Footer can support copyright, social links, or additional CTAs
- Nested structure allows for logical grouping of related components

**Maintainability:**
- Clearer structure makes code easier to understand
- Better organization for complex section configurations
- Future-proof architecture for component additions

### Migration Guide

**No immediate action required** - old structure continues to work via backward compatibility.

**To migrate to new structure:**

1. **Wrap `heading` in `header` object:**
```php
// Before
'heading' => [
    'title' => 'My Title',
],

// After
'header' => [
    'heading' => [
        'title' => 'My Title',
    ],
],
```

2. **Wrap `buttons` in `footer` object:**
```php
// Before
'buttons' => [
    ['text' => 'Click Me', 'url' => '#'],
],

// After
'footer' => [
    'buttons' => [
        ['text' => 'Click Me', 'url' => '#'],
    ],
],
```

### Technical Details

**Files Modified:**
- `templates/pages/_partials/pro-sites/_lib/header.php`
- `templates/pages/_partials/pro-sites/_lib/footer.php`
- `templates/pages/_partials/pro-sites/README.md`
- `templates/pages/test/slug-pro-sites-demo.php`
- `templates/pages/test/slug-pro-sites-test-text.php`
- `templates/pages/test/slug-pro-sites-test-image.php`
- `templates/pages/test/slug-pro-sites-test-video.php`
- `templates/pages/test/slug-pro-sites-test-2-column.php`
- `templates/pages/test/slug-pro-sites-test-html.php`

**Commit:** `06b1108` - BREAKING: Refactor pro-sites config to semantic header/footer structure

### Developer Notes
- Old structure will be deprecated in a future major version (2.0.0)
- All new pro-sites implementations should use the new `header`/`footer` structure
- Update existing implementations when convenient (no rush due to backward compatibility)
- Semantic HTML wrappers improve accessibility and SEO

## [1.1.8] - 2025-11-09

### Changed
- **Updated Demo Image URLs to Brand Hub CDN Placeholders**
  - Replaced local logo SVG references with external Brand Hub placeholder images
  - All demo templates now use professional CDN-hosted placeholder images
  - Improved visual variety with 4 different placeholder images
  - Better performance with external CDN hosting

### Enhanced
- **Demo Template Images** (3 templates updated, 15 total image references)
  - `slug-pro-sites-demo.php` (2 image references updated)
    - Image section example → `placeholder1.jpg`
    - 2-column section example → `placeholder2.jpg`
  - `slug-pro-sites-test-image.php` (9 image references updated)
    - All test variations → `placeholder1.jpg`
    - Consistent placeholder across all image tests
  - `slug-pro-sites-test-2-column.php` (4 image references updated)
    - Test 1 (50/50 split) → `placeholder1.jpg`
    - Test 2 (40/60 split) → `placeholder2.jpg`
    - Test 5 (Dark mode) → `placeholder3.jpg`
    - Test 6 (Mobile reverse) → `placeholder4.jpg`

### Image Distribution Strategy
- **placeholder1.jpg** - General examples and most common use cases
- **placeholder2.jpg** - Varied layouts (asymmetric columns, different contexts)
- **placeholder3.jpg** - Dark mode examples for contrast testing
- **placeholder4.jpg** - Mobile-responsive examples and reverse order tests

### Technical Details

**CDN URLs:**
```
https://static.brand-hub.com.au/client/placeholder1.jpg
https://static.brand-hub.com.au/client/placeholder2.jpg
https://static.brand-hub.com.au/client/placeholder3.jpg
https://static.brand-hub.com.au/client/placeholder4.jpg
```

**Files Modified:**
- `templates/pages/test/slug-pro-sites-demo.php` (2 replacements)
- `templates/pages/test/slug-pro-sites-test-image.php` (9 replacements)
- `templates/pages/test/slug-pro-sites-test-2-column.php` (4 replacements)

**Before:**
```php
'src' => LEANCMS_PLUGIN_URL . 'templates/assets/refr/ReframeWALogo-Vert_REV.svg',
```

**After:**
```php
'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
```

### Benefits

**Performance:**
- External CDN hosting reduces plugin asset load
- Distributed content delivery for faster loading
- Browser caching optimized for CDN resources
- Reduced plugin package size (no local placeholder images needed)

**Visual Quality:**
- Real photo placeholders instead of logo graphics
- More realistic representation of production use cases
- Professional appearance for client demonstrations
- Multiple placeholder options for visual variety

**Maintenance:**
- Centralized placeholder management via CDN
- Easy to update placeholders globally
- Consistent image sources across all demos
- No need to package placeholder images with plugin

**User Experience:**
- Better visual examples for template demonstrations
- More realistic previews of image sections
- Improved understanding of layout capabilities
- Professional presentation for client showcases

### Developer Notes
- All demo templates now use external Brand Hub CDN images
- Placeholder images are production-ready and professionally hosted
- Visual variety achieved through 4 different placeholder images
- Local logo SVG still available for other use cases at `templates/assets/refr/`

## [1.1.7] - 2025-11-09

### Fixed
- **Pro-Sites CSS Auto-Loading** (`includes/content/class-partial-registry.php`)
  - Fixed `pro-sites.css` not loading on pro-sites partials
  - Enhanced `maybe_enqueue_partial_css()` method to support folder-level CSS files
  - Now checks for both individual partial CSS (e.g., `text-section.css`) and folder-level CSS (e.g., `pro-sites/pro-sites.css`)
  - Loads folder CSS once per folder to prevent duplicate loads
  - Maintains backward compatibility with existing partial CSS files
  - Resolves issue where shared CSS file wasn't detected by auto-loading system

### Added
- **Isolated Test Templates for Pro-Sites Partials**
  - 5 comprehensive test templates for isolated partial testing
  - Each template demonstrates 7-10 variations of a single partial type
  - Total of 46 individual test examples across all templates

- **Text Section Test Template** (`templates/pages/test/slug-pro-sites-test-text.php`)
  - 10 test variations covering all text section capabilities
  - Format variants: standard, lead, small
  - Alignment options: left, center, right
  - Dark mode with button variations
  - Custom spacing and IDs
  - Rich HTML content examples
  - Inline custom CSS demonstrations
  - Data attributes for tracking
  - Heading-only and content-only examples

- **Image Section Test Template** (`templates/pages/test/slug-pro-sites-test-image.php`)
  - 9 test variations for image display options
  - With and without captions
  - Dark mode styling
  - Fixed width vs full width images
  - Lazy loading toggle demonstrations
  - Custom spacing examples
  - Gallery pattern (multiple images)
  - Custom styled containers

- **Video Section Test Template** (`templates/pages/test/slug-pro-sites-test-video.php`)
  - 10 test variations for video embeds
  - YouTube embed examples
  - Vimeo embed examples
  - Autoplay on/off demonstrations
  - Dark mode with buttons
  - Custom height variations
  - Different heading alignments
  - Custom spacing
  - Tracking attributes
  - Note for HTML5 video testing

- **HTML Section Test Template** (`templates/pages/test/slug-pro-sites-test-html.php`)
  - 7 test variations for custom HTML content
  - Custom card layouts (3-column grid)
  - Statistics grid (4-column)
  - Dark mode HTML content
  - Pricing table layout
  - Timeline layout
  - Form embed placeholder
  - Custom gradient backgrounds

- **2-Column Section Test Template** (`templates/pages/test/slug-pro-sites-test-2-column.php`)
  - 10 test variations for two-column layouts
  - Image + Text (50/50 split)
  - Asymmetric widths (40/60)
  - Video + Text combination
  - Text + Buttons layout
  - Dark mode support
  - Reverse column order on mobile
  - HTML + Text combination
  - Custom gap spacing (80px)
  - Section-level buttons
  - Custom spacing and background styling

### Enhanced
- **Partial Registry CSS Loading System**
  - Improved CSS detection algorithm with three-tier fallback:
    1. Individual partial CSS file (highest priority)
    2. Folder-level CSS file (new capability)
    3. Global document-system.css (fallback)
  - Folder CSS marked as loaded using folder-specific key to prevent duplicates
  - Better support for shared CSS files across multiple partials

### Technical Details

**CSS Auto-Loading Enhancement:**
```php
// Old behavior: Only checked for individual partial CSS
$css_path = str_replace('.php', '.css', $php_path);
if (file_exists($css_path)) { /* load */ }

// New behavior: Checks individual, then folder-level
1. Check text-section.css (individual)
2. If not found, check pro-sites/pro-sites.css (folder)
3. If not found, use document-system.css (global)
```

**File Structure:**
```
templates/pages/test/
├── slug-pro-sites-test-text.php       (+380 lines)
├── slug-pro-sites-test-image.php      (+280 lines)
├── slug-pro-sites-test-video.php      (+290 lines)
├── slug-pro-sites-test-html.php       (+200 lines)
└── slug-pro-sites-test-2-column.php   (+370 lines)
```

**Total:** 5 test templates created, 1,520 lines of test code added

### Benefits

**For Developers:**
- **Quick Testing**: Test each partial type in isolation without interference
- **Comprehensive Examples**: 46 total test cases covering all features
- **Copy-Paste Ready**: Use test examples as starting templates
- **Visual Reference**: See all variations side-by-side
- **Debugging**: Isolate issues to specific partial types

**For CSS System:**
- **Shared CSS Support**: Single CSS file can serve multiple partials in a folder
- **Reduced Duplication**: No need to create identical CSS for each partial
- **Better Organization**: Folder-level CSS keeps related styles together
- **Performance**: CSS loads once per folder instead of per partial

**For Quality Assurance:**
- **Regression Testing**: Verify all partial variations work correctly
- **Browser Testing**: Test responsive behavior across devices
- **Dark Mode Testing**: Verify all partials work in dark theme
- **Accessibility Testing**: Check all examples for accessibility compliance

### Usage

**Create WordPress pages with these slugs to test:**
1. `pro-sites-test-text` - Text section variations
2. `pro-sites-test-image` - Image section variations
3. `pro-sites-test-video` - Video section variations
4. `pro-sites-test-html` - HTML section variations
5. `pro-sites-test-2-column` - 2-column section variations

Each test page demonstrates:
- Basic usage patterns
- Format/style variations
- Dark mode compatibility
- Custom spacing options
- Button integration
- Mobile responsiveness
- Data attributes
- Edge cases

### Developer Notes

**CSS Auto-Loading:**
- Folder CSS files should be named `{folder-name}.css` (e.g., `pro-sites.css` in `pro-sites/` folder)
- Individual partial CSS still takes priority over folder CSS
- CSS loads only once per folder regardless of how many partials from that folder render
- Backward compatible - existing partial CSS files continue working

**Test Templates:**
- Use as visual reference when building pages
- Copy configuration examples directly into production templates
- Modify test configurations to experiment with variations
- View page source to inspect generated HTML and CSS

### Bug Fixes

**Issue:** Pro-sites.css wasn't loading on demo page or when using pro-sites partials

**Root Cause:** The `maybe_enqueue_partial_css()` method only checked for individual CSS files next to each partial PHP file (e.g., `text-section.css`), but pro-sites used a single shared `pro-sites.css` file at the folder level.

**Solution:** Enhanced the method to also check for folder-level CSS files using a three-tier detection system:
1. Look for individual partial CSS (e.g., `text-section.css`)
2. If not found, look for folder CSS (e.g., `pro-sites/pro-sites.css`)
3. If not found, fall back to global `document-system.css`

**Impact:** Pro-sites partials now correctly load their stylesheet on all pages, ensuring proper styling and responsive behavior.

## [1.1.6] - 2025-11-09

### Added
- **Pro-Sites Partial System (v1.2.0)**
  - Flexible, reusable content section framework with 5 section types
  - Standardized configuration pattern across all partials
  - Shared component library for DRY architecture
  - Auto-loading CSS with responsive design
  - Full integration with 6-layer CSS architecture

- **Shared Component Library** (`_partials/pro-sites/_lib/`)
  - `wrapper-open.php` - Section wrapper with comprehensive settings support
  - `wrapper-close.php` - Clean closing tags
  - `header.php` - Label/Title/Subtitle component with alignment options
  - `footer.php` - Multi-button group component with style variants

- **Five Content Section Types**
  - **Text Section** (`text-section.php`)
    - HTML text content with format variants (standard, lead, small)
    - Supports heading and buttons components
    - Configurable text formatting via CSS variables

  - **Image Section** (`image-section.php`)
    - Image display with caption support
    - Alt text for accessibility
    - Lazy loading enabled by default
    - Responsive image sizing

  - **Video Section** (`video-section.php`)
    - YouTube embed support
    - Vimeo embed support
    - HTML5 video support
    - Configurable autoplay and controls
    - Responsive 16:9 aspect ratio wrapper

  - **HTML Section** (`html-section.php`)
    - Raw HTML passthrough for custom layouts
    - Third-party embed support (forms, maps, widgets)
    - wp_kses_post() security filtering

  - **2-Column Section** (`2-column-section.php`)
    - Flexible two-column layouts with mixed content types
    - Each column supports: text, image, video, html, or buttons
    - Configurable column widths (percentage-based)
    - Configurable gap spacing between columns
    - Mobile-responsive (stacks on < 768px)
    - Reverse column order option for mobile

- **Comprehensive Settings System**
  - **Visibility Control**: Show/hide sections via PHP conditional
  - **Dark Mode**: Built-in `.dark-mode` class styling
  - **Custom Spacing**: Override top/bottom padding per section
  - **Custom ID**: Override auto-generated IDs (default: `lcms-{uniqid}`)
  - **Custom Classes**: Add space-separated classes to `<section>`
  - **Inline CSS**: Add custom styles via `custom_css` setting
  - **Data Attributes**: Add custom data attributes for tracking/analytics

- **Heading Component Features**
  - Optional label above title (small, uppercase, accent color)
  - Main title (h2, brand font, configurable size)
  - Optional subtitle below title (larger body text)
  - Alignment options: left, center, right
  - Skip rendering if all values empty

- **Button Component Features**
  - Unlimited buttons per section
  - Three style variants: primary, secondary, outline
  - Target options: _self, _blank (with rel="noopener noreferrer")
  - Responsive button groups
  - Full-width buttons on mobile
  - CSS variable-driven styling

- **Pro-Sites Stylesheet** (`pro-sites.css`)
  - Section framework with content container
  - Dark mode support with CSS variables
  - Heading component styles (label, title, subtitle, alignment)
  - Content format variants (standard, lead, small)
  - Image wrapper with caption styling
  - Video wrapper with responsive aspect ratio
  - Button styles for all variants (primary, secondary, outline)
  - 2-column grid system with responsive breakpoints
  - Mobile-first responsive design (768px, 480px breakpoints)
  - Auto-loads when any pro-sites partial renders

- **Demo Template** (`templates/pages/test/slug-pro-sites-demo.php`)
  - 10 comprehensive examples demonstrating all section types
  - Text sections with different formats and alignments
  - Image section with caption
  - Video section with YouTube embed
  - HTML section with custom content
  - Multiple 2-column layouts with mixed content
  - Dark mode section examples
  - Custom spacing and styling demonstrations
  - Visibility control examples
  - Complete CSS architecture integration

- **Comprehensive Documentation** (`_partials/pro-sites/README.md`)
  - 6,000+ word documentation
  - Complete configuration pattern reference
  - All 5 section types documented with examples
  - Advanced usage examples (dark mode, visibility, custom spacing)
  - CSS architecture integration guide
  - Best practices and troubleshooting
  - Responsive design documentation
  - Version history

### Changed
- **Partial Registry** (`includes/content/class-partial-registry.php`)
  - Added `section_config` wrapper for all pro-sites partials
  - Supports both short names (`text`, `image`, `video`, `html`, `2-column`)
  - Supports namespaced names (`pro-sites/text`, `pro-sites/image`, etc.)
  - Auto-discovery integration for pro-sites folder

### Technical Details

**File Structure:**
```
_partials/pro-sites/
├── text-section.php          (+60 lines)
├── image-section.php          (+58 lines)
├── video-section.php          (+88 lines)
├── html-section.php           (+42 lines)
├── 2-column-section.php       (+186 lines)
├── _lib/
│   ├── wrapper-open.php       (+70 lines)
│   ├── wrapper-close.php      (+12 lines)
│   ├── header.php             (+50 lines)
│   └── footer.php             (+49 lines)
├── pro-sites.css              (+390 lines)
└── README.md                  (+620 lines)

test/
└── slug-pro-sites-demo.php    (+375 lines)
```

**Total:** 13 files created, 2,120 lines added

**Configuration Pattern:**
```php
$section_config = [
    'settings' => [
        'visibility'      => true,
        'dark_mode'       => false,
        'spacing_top'     => null,
        'spacing_bottom'  => null,
        'custom_id'       => '',
        'custom_classes'  => '',
        'custom_css'      => '',
        'data_attrs'      => [],
    ],
    'heading' => [
        'label'    => '',
        'title'    => '',
        'subtitle' => '',
        'align'    => 'left',
    ],
    'content' => [...],  // Type-specific
    'buttons' => [...],  // Optional
];
```

**Usage Pattern:**
```php
partial('text', $section_config, 'pro-sites');
partial('image', $section_config, 'pro-sites');
partial('video', $section_config, 'pro-sites');
partial('html', $section_config, 'pro-sites');
partial('2-column', $section_config, 'pro-sites');
```

**CSS Variables Integration:**
- Uses all variables from 6-layer CSS architecture
- Spacing: `--spacing-section-top/bottom`, `--spacing-horizontal`
- Typography: `--font-heading`, `--font-size-*`, `--line-height-*`
- Colors: `--color-brand-*`, `--color-text-*`, `--color-background-*`
- Effects: `--border-radius`, `--transition-standard`, `--button-padding`

### Benefits

**For Developers:**
- **Rapid Development**: Build pages faster with reusable sections
- **Consistent Pattern**: Same config structure across all section types
- **DRY Architecture**: Shared components eliminate duplication
- **Type Safety**: Predictable array structures
- **Extensible**: Easy to add new section types following same pattern
- **Auto-Discovery**: New sections work immediately when added to folder
- **Clean Syntax**: `partial('text', $config, 'pro-sites')` - simple and clear

**For Content Creators:**
- **Flexible Layouts**: Mix and match section types as needed
- **Dark Mode**: Easy to create visual variety with `.dark-mode` toggle
- **Responsive**: All sections mobile-optimized automatically
- **Buttons**: Call-to-action buttons integrated into all sections
- **2-Column**: Combine different content types in flexible layouts

**For Brand Consistency:**
- **CSS Variables**: All styling driven by brand config
- **Shared Components**: Consistent heading and button styling
- **Theme Integration**: Uses 6-layer CSS architecture
- **Override Options**: Customize at variable or CSS level

**For Performance:**
- **Lazy Loading**: Images lazy-load by default
- **Conditional Rendering**: Visibility control prevents unnecessary HTML output
- **Auto-Loading CSS**: Stylesheet loads only when needed
- **Responsive Images**: Proper sizing attributes for browser optimization

### Use Cases

**Landing Pages:**
- Hero section (text with buttons)
- Features (2-column image + text)
- Testimonials (video section)
- Call-to-action (dark mode text with buttons)

**Brand Guides:**
- Introduction (text with lead format)
- Visual examples (image sections)
- Video tutorials (video sections)
- Guidelines (2-column with mixed content)

**Case Studies:**
- Overview (text section)
- Results (2-column with stats)
- Gallery (multiple image sections)
- Client testimonial (video section)

**Marketing Pages:**
- Product features (alternating 2-column sections)
- Pricing (HTML section with custom layout)
- Social proof (image + text 2-column)
- Contact (2-column with form embed)

### Developer Experience

**Quick Start:**
```php
// 1. Simple text section
$text = [
    'heading' => ['title' => 'About Us'],
    'content' => ['text' => '<p>We are...</p>'],
];
partial('text', $text, 'pro-sites');

// 2. 2-column image + text
$two_col = [
    'content' => [
        'columns' => [
            ['type' => 'image', 'content' => ['src' => '/img.jpg']],
            ['type' => 'text', 'content' => ['text' => '<h3>Title</h3>']],
        ],
    ],
];
partial('2-column', $two_col, 'pro-sites');

// 3. Dark mode with buttons
$cta = [
    'settings' => ['dark_mode' => true],
    'heading' => ['title' => 'Get Started', 'align' => 'center'],
    'content' => ['text' => '<p>Ready to begin?</p>', 'format' => 'lead'],
    'buttons' => [
        ['text' => 'Sign Up', 'url' => '/signup', 'style' => 'primary'],
    ],
];
partial('text', $cta, 'pro-sites');
```

**Demo Page:**
- Create WordPress page with slug: `pro-sites-demo`
- View 10 live examples with source code
- Copy-paste configurations for quick implementation

### Migration Notes

- Pro-sites partials are standalone - no migration needed
- Compatible with existing partial systems (brand-guide, top-section, etc.)
- Uses same partial registry auto-discovery system
- Follows established CSS architecture patterns
- Can be used alongside existing partials

### Future Enhancements (Not in MVP)

Planned for future versions:
- Advanced heading options (h1/h2/h3 level selection)
- Icon button support
- Button group alignment options
- 3-column and 4-column sections
- Grid layout section type
- Accordion/tabs section type
- Semantic ID generation from title (vs random uniqid)

### Documentation

**Location:** `templates/pages/_partials/pro-sites/README.md`

**Contents:**
- Complete configuration reference
- All 5 section types documented
- Advanced examples and use cases
- CSS architecture integration
- Best practices guide
- Troubleshooting section
- Responsive design details

**Demo:** `templates/pages/test/slug-pro-sites-demo.php`

## [1.1.5] - 2025-11-09

### Added
- **6-Layer CSS Architecture for Rapid Setup and High Flexibility**
  - **Layer 0:** WordPress Theme CSS (external, not in scope)
  - **Layer 1:** `base.css` - Structural foundation (resets, grids, utilities)
  - **Layer 2:** `global/config.php` - Lean default CSS variables
  - **Layer 3:** `global/document-system.css` - Brand-agnostic component styles
  - **Layer 4:** Partial CSS - Auto-loaded component variations
  - **Layer 5:** Client `config.php` - CSS variable overrides
  - **Layer 6:** Client `theme.css` - CSS rule overrides

- **Global Base Stylesheet** (`templates/assets/global/base.css`)
  - CSS resets and box-sizing normalization
  - Grid systems using CSS variables (`.grid-2`, `.grid-3`, `.grid-4`)
  - Utility classes (`.card`, `.content-container`, `.item-list`, `.item`)
  - Responsive breakpoints for mobile/tablet/desktop
  - Zero colors, fonts, or brand-specific values (pure structure)
  - All components use CSS variables for styling values

- **Global Configuration System** (`templates/assets/global/config.php`)
  - PHP array returning CSS variable defaults
  - Neutral, professional defaults for rapid project setup
  - System fonts for performance (no external font loading)
  - Covers: colors, typography, layout, effects, grids, borders
  - Meta information (version, last updated, description)
  - New clients work immediately without configuration

- **Global Component Stylesheet** (`templates/assets/global/document-system.css`)
  - Copied from `refr/document-system.css` and cleaned
  - All component styles now brand-agnostic using CSS variables
  - Removed CSS custom properties (moved to config.php)
  - Removed base reset styles (moved to base.css)
  - Removed duplicate structural rules (moved to base.css)
  - Uses `var(--property-name)` throughout instead of hardcoded values
  - Available for all clients to use or override

- **CSS Variable Generation System**
  - PHP merges global and client config arrays
  - Generates inline `<style>` tag with CSS custom properties
  - Client values override global defaults via `array_merge()`
  - Single source of truth for brand values
  - Eliminates CSS duplication across files

### Changed
- **Client Configuration Enhanced** (`templates/pages/refr/config.php`)
  - Added `css_variables` array as first section
  - All Reframe WA brand values moved from CSS to config
  - Colors, typography, layout, effects defined in PHP
  - Overrides global defaults (only include what differs)
  - Documentation explains override pattern

- **Client Theme CSS Cleaned** (`templates/assets/refr/refr-theme.css`)
  - Removed all duplicate CSS variables (55 lines → 27 lines)
  - Now contains only actual CSS rule overrides
  - Example: `.hero` gradient with specific midpoint color `#0A0C4F`
  - Starts blank for new clients
  - Clear documentation on when to add rules here

- **Brand Guide Template Updated** (`templates/pages/refr/slug-brand-guide.php`)
  - Added config loading and merging logic
  - Loads both global and client config.php files
  - Merges CSS variables (client overrides global)
  - New CSS loading order with numbered comments (1-5)
  - Generates inline `<style>` tag with merged CSS variables
  - Proper cascade: base → variables → components → partials → theme

### Enhanced
- **CSS Loading Order Standardized**
  ```html
  <!-- 1. Base Structural CSS -->
  <link rel="stylesheet" href="base.css">

  <!-- 2. CSS Variables (Generated from config.php) -->
  <style id="brand-css-variables">:root { ... }</style>

  <!-- 3. Component Styles (Uses variables above) -->
  <link rel="stylesheet" href="document-system.css">

  <!-- 4. Partial CSS auto-loads here via registry when partials render -->

  <!-- 5. Client Theme CSS Rule Overrides -->
  <link rel="stylesheet" href="refr-theme.css">
  ```

- **Partials Documentation Enhanced** (`_partials/README.md`)
  - Updated "CSS Cascade Relationship" diagram to show 6 layers
  - Added "For New Clients" quick setup guide
  - Added "For Style-Pack Variations" guidance
  - Example showing minimal config.php for new client
  - Updated migration path section with v1.1.5 architecture

### Technical Details
- **Created Files:**
  - `templates/assets/global/base.css` (+148 lines)
  - `templates/assets/global/config.php` (+75 lines)
  - `templates/assets/global/document-system.css` (copied from refr/, cleaned)

- **Modified Files:**
  - `templates/pages/refr/config.php` (added css_variables section)
  - `templates/assets/refr/refr-theme.css` (removed duplicates, -28 lines)
  - `templates/pages/refr/slug-brand-guide.php` (new CSS loading pattern)
  - `templates/pages/_partials/README.md` (updated architecture docs)

- **Config Merging Pattern:**
  ```php
  $global_config = include(LEANCMS_PLUGIN_DIR . 'templates/assets/global/config.php');
  $client_config = include(__DIR__ . '/config.php');
  $css_vars = array_merge(
      $global_config['css_variables'] ?? [],
      $client_config['css_variables'] ?? []
  );
  ```

- **CSS Variable Generation:**
  ```php
  <style id="brand-css-variables">
  :root {
  <?php foreach ($css_vars as $key => $value): ?>
      --<?php echo esc_attr($key); ?>: <?php echo esc_attr($value); ?>;
  <?php endforeach; ?>
  }
  </style>
  ```

### Benefits
- **Rapid Project Setup**: New clients work immediately with sensible defaults
- **Single Source of Truth**: config.php drives all brand values (no CSS duplication)
- **High Flexibility**: Override at variable level (config.php) or rule level (theme.css)
- **Progressive Enhancement**: Each layer optional, graceful degradation
- **Easy Multi-Brand**: Swap config.php for instant brand switching
- **Maintainability**: Change color once in config, updates everywhere
- **Separation of Concerns**: Structure (base) vs Design (variables) vs Components (styles) vs Overrides (theme)
- **Performance**: System fonts by default, no external font loading
- **Scalability**: Foundation supports unlimited clients and brands

### Developer Experience
- **New Client Setup (3 steps):**
  1. Copy `refr/` folder structure
  2. `config.php` starts with empty `css_variables` array (uses global defaults)
  3. `refr-theme.css` starts blank (no overrides needed)
  4. Templates work immediately with professional appearance

- **Customization Path:**
  1. Start: Global defaults (neutral, professional)
  2. Add brand colors to `config.php` css_variables section
  3. Add custom fonts if needed
  4. Add CSS rule overrides to `theme.css` only if variables insufficient

- **Quick Brand Switch:**
  ```php
  // Before: 3 files to update (document-system.css, refr-theme.css, config.php)
  // After: 1 file to update (config.php)
  'color-brand-primary' => '#NEW_COLOR',  // Updates everywhere
  ```

### Migration Notes
- Existing `refr/` templates continue working unchanged
- CSS variables now generated from config.php instead of defined in CSS files
- Client theme CSS files can be cleaned to remove duplicate variables
- New templates should follow 6-layer loading pattern
- Global defaults enable faster new client onboarding

### Use Cases
- **Rapid Prototyping**: Start new client with global defaults, customize later
- **Multi-Brand Management**: One system supports unlimited brands via config.php
- **White-Label Products**: Global base provides consistent foundation
- **Client Variations**: Easy to create seasonal or campaign-specific variations
- **Development Workflow**: Test with defaults, apply brand later

## [1.1.4] - 2025-11-08

### Added
- **CSS Auto-Loading for Partials (Progressive Enhancement)**
  - Partials can have optional `.css` files next to `.php` files
  - Registry automatically detects and loads CSS when partial renders
  - Falls back gracefully to `document-system.css` if no partial CSS exists
  - Enables style-pack variations: `modern/hero.css`, `classic/hero.css`
  - CSS cascade: base styles → partial overrides
  - Zero breaking changes - all current partials work without CSS files
  - Outputs `<link>` tags inline for proper loading order

### Changed
- **Partial Registry Class** (`class-partial-registry.php`)
  - Added `maybe_enqueue_partial_css()` private method for CSS auto-loading
  - Added `$enqueued_styles` static array to track loaded CSS files
  - Updated `render()` method to call CSS auto-loading before partial inclusion

### Enhanced
- **Partials Documentation** (`_partials/README.md`)
  - Added "CSS Architecture: Progressive Enhancement Pattern" section
  - Comprehensive CSS auto-loading documentation with examples
  - Style-pack CSS variations guide
  - CSS cascade relationship diagrams
  - Migration path and best practices for partial CSS
  - Updated "Styling Partials" section with third option for partial-specific CSS

### Technical Details
- **CSS Auto-Loading Mechanism**
  - Checks for `.css` file alongside `.php` file during render
  - Converts PHP path to CSS path via string replacement
  - Verifies CSS file exists with `file_exists()`
  - Outputs inline `<link>` tag if CSS found (works after wp_head)
  - Tracks loaded CSS in `$enqueued_styles` to prevent duplicates
  - Generates unique handle: `leancms-partial-{folder}-{name}-css`
  - Includes version query string for cache busting

### Benefits
- **CSS Progressive Enhancement**: Optional CSS files enable variations without breaking existing code
- **Zero Configuration**: CSS auto-loads when file exists, no manual registration
- **Graceful Degradation**: Missing CSS files fall back to base document-system.css
- **Perfect for Style-Packs**: Each style-pack folder can have its own CSS overrides
- **Maintains Design System**: Base CSS custom properties used by all variations

### Style-Pack CSS Example
```css
/* document-system.css - Base styles */
.hero {
    background: linear-gradient(135deg, var(--color-brand-primary) 0%, var(--color-brand-secondary) 100%);
    padding: 100px 60px;
}

/* modern/hero-section.css - Modern variation */
.hero {
    background: radial-gradient(ellipse at top, var(--color-brand-primary) 0%, transparent 100%);
    padding: 120px 80px;
}

/* classic/hero-section.css - Classic variation */
.hero {
    background: var(--color-brand-primary);
    padding: 80px 40px;
    border-bottom: 5px solid var(--color-brand-accent);
}
```

### Developer Experience
- **Optional Enhancement**: Add CSS only when needed for variations
- **No Breaking Changes**: Existing partials work without any CSS files
- **Clear Intent**: CSS file next to PHP file makes dependencies obvious
- **Easy Debugging**: Check browser inspector for loaded partial CSS links

## [1.1.3] - 2025-11-08

### Added
- **Subfolder Organization System for Partials**
  - New folder structure for logical grouping of partials
  - `_partials/top-section/` - Page headers, hero sections
  - `_partials/brand-guide/` - Brand identity components (color, typography, logo, guidelines, spacing)
  - `_partials/bottom-section/` - CTAs, footers
  - Recursive directory scanning using `RecursiveIteratorIterator`
  - Supports unlimited nesting depth for future organization needs

- **Third Parameter Support for `partial()` Function**
  - New optional `$folder` parameter: `partial('hero', $settings, 'top-section')`
  - Enables style-pack architecture for easy layout switching
  - Default folder path when parameter omitted (backward compatible)
  - Variable-driven layout switching: `partial('hero', $settings, $style)`
  - Clean separation of concerns: name, config, location

- **Dual Registration System**
  - Partials registered with both short names and namespaced names
  - Short name: `hero` (backward compatible)
  - Namespaced name: `top-section/hero` (organized, explicit)
  - Client partials override global with same namespaced path
  - Priority: client-specific > global for both naming conventions

- **Name Resolution Logic**
  - Intelligent resolution based on parameters provided
  - If name contains `/`: use as-is (explicit namespaced)
  - If folder provided: prepend to create namespaced name
  - Otherwise: use short name for backward compatibility
  - Supports flexible usage patterns for different scenarios

### Changed
- **Partial Registry Class** (`class-partial-registry.php`)
  - Updated `discover_in_folder()` method with recursive scanning
  - Dual registration of partials (short + namespaced names)
  - Added `resolve_name()` private method for name resolution
  - Updated `render()` method to accept third `$folder` parameter
  - Added namespaced config wrappers to `$config_wrappers` array
  - Enhanced PHPDoc with new parameter documentation

- **Global `partial()` Helper Function** (`leancms.php`)
  - Added third `$folder` parameter with default empty string
  - Comprehensive PHPDoc with 3 usage pattern examples
  - Updated function signature: `function partial( string $name, array $config = [], string $folder = '' )`

- **Helpers Class** (`class-helpers.php`)
  - Updated `partial()` static method with third parameter
  - Enhanced PHPDoc with folder organization examples
  - Added namespaced and folder parameter usage patterns

- **Brand Guide Template** (`slug-brand-guide.php`)
  - All 7 sections now use third parameter syntax
  - `partial('hero', $hero_settings, 'top-section')`
  - `partial('color-palette', $color_settings, 'brand-guide')`
  - Demonstrates clean folder-based organization pattern

- **Partials Moved to Subfolders**
  - `hero-section.php` → `top-section/hero-section.php`
  - `color-palette-section.php` → `brand-guide/color-palette-section.php`
  - `typography-section.php` → `brand-guide/typography-section.php`
  - `logo-section.php` → `brand-guide/logo-section.php`
  - `guidelines-section.php` → `brand-guide/guidelines-section.php`
  - `spacing-section.php` → `brand-guide/spacing-section.php`
  - `cta-section.php` → `bottom-section/cta-section.php`

### Enhanced
- **Partials Documentation** (`_partials/README.md`)
  - Added "Folder Organization" section with complete folder structure
  - Updated "Rendering Patterns" with 5 comprehensive patterns
  - Pattern 1: Third parameter (recommended for organized layouts)
  - Pattern 2: Namespaced syntax (explicit, style-pack friendly)
  - Pattern 3: Short name (backward compatible)
  - Pattern 4: Legacy include (still supported)
  - Pattern 5: Style-pack switching examples
  - Added style-pack architecture guidance
  - Documented folder naming conventions

### Technical Details
- **Recursive Directory Scanning**
  - Uses `RecursiveIteratorIterator` and `RecursiveDirectoryIterator`
  - Scans all subfolders automatically in `_partials/` and `{client}/_partials/`
  - Builds relative paths from base folder for namespacing
  - Removes `-section` suffix for cleaner partial names
  - Supports `RecursiveDirectoryIterator::SKIP_DOTS` flag

- **Name Resolution Priority**
  1. Explicit namespaced names (contains `/`): `'top-section/hero'`
  2. Folder parameter builds namespaced: `'hero', $settings, 'top-section'`
  3. Short name fallback: `'hero'`
  4. All patterns resolve to same partial if properly organized

- **Config Wrapper Enhancements**
  - Added namespaced wrappers: `'top-section/hero' => 'hero_config'`
  - Maintains backward compatible short name wrappers: `'hero' => 'hero_config'`
  - Auto-wrapping works with all naming patterns
  - Both `partial('hero', $settings)` and `partial('hero', $settings, 'top-section')` wrap identically

### Benefits
- **Style-Pack Architecture**: Switch entire layout sets with single variable
- **Logical Organization**: Related partials grouped in semantic folders
- **Scalability**: Add new folder categories as project grows
- **Flexibility**: Three usage patterns (third param, namespaced, short name)
- **Explicit > Implicit**: Folder organization visible in code
- **No Name Collisions**: Namespacing prevents conflicts between style-packs
- **Clean Migration**: Only 1 template file updated (slug-brand-guide.php)
- **Future-Proof**: Foundation for multiple style-pack sets

### Style-Pack Use Cases
```php
// Switch between modern and classic layouts
$style = 'modern'; // or 'classic'
partial('hero', $hero_settings, $style);
partial('color-palette', $color_settings, $style);

// Loop through multiple sections with same style
$sections = ['hero', 'about', 'services'];
foreach ($sections as $section) {
    partial($section, $settings[$section], 'modern');
}

// Different layouts for different clients
$client_style = 'refr'; // or 'brhu'
partial('brand-guide/color-palette', $color_settings);
```

### Developer Experience
- **Organized File Structure**: Find partials quickly by category
- **Clear Intent**: Folder parameter shows exactly which layout being used
- **IDE Support**: Autocomplete works with folder structure
- **Less String Concatenation**: Third parameter cleaner than `'folder/name'`
- **Separation of Concerns**: Name, config, location all separate parameters
- **Easy Refactoring**: Move partials between folders without breaking templates

### Backward Compatibility
- All existing `partial('name', $settings)` calls continue working
- Short name registration maintained alongside namespaced
- Legacy include paths still supported
- No breaking changes to existing templates
- Gradual migration path to folder organization

### Migration Path
Templates can use any pattern:
- **Modern (Recommended)**: `partial('hero', $settings, 'top-section')`
- **Explicit Namespaced**: `partial('top-section/hero', $settings)`
- **Backward Compatible**: `partial('hero', $settings)`
- **Legacy**: `include LEANCMS_PLUGIN_DIR . 'templates/pages/_partials/top-section/hero-section.php';`

## [1.1.2] - 2025-11-08

### Added
- **Partial Registry System with Auto-Discovery**
  - New `LeanCMS_Partial_Registry` class that auto-discovers all partials on plugin boot
  - Scans `_partials/` and `{client}/_partials/` folders for `.php` files
  - Automatically registers partials with clean names (strips `-section` suffix)
  - Client-specific partials override global partials with same name
  - Zero-configuration - new partials work immediately after creation

- **Global `partial()` Helper Function**
  - Clean, shorthand syntax: `partial('hero', $settings)`
  - Obfuscates template paths (no `LEANCMS_PLUGIN_DIR` needed)
  - Auto-wraps config arrays in expected keys (e.g., `hero_config`)
  - Available globally in all templates
  - Delegates to `LeanCMS_Helpers::partial()` → `LeanCMS_Partial_Registry::render()`

- **Auto-Wrapping Config System**
  - Config arrays automatically wrapped based on partial name mapping
  - Mapping: `hero` → `hero_config`, `color-palette` → `color_config`, etc.
  - Pass settings directly without wrapper: `partial('hero', $settings)`
  - Registry handles wrapping internally for cleaner template code

- **Hero Section Partial Enhancement**
  - Added logo image support (`logo`, `logo_alt` parameters)
  - Removed inline styles, now uses `.hero` classes from `document-system.css`
  - Supports array config pattern with auto-wrapping
  - All parameters optional except title (has sensible defaults)

### Changed
- **Brand Guide Template Fully Converted to Partial System**
  - All 7 sections now use `partial()` function: hero, color-palette, typography, logo, guidelines, spacing, cta
  - Variable naming convention: `*_settings` instead of `*_config` for clarity
  - Reduced from ~300 lines of mixed HTML/PHP to clean config arrays
  - 50% reduction in boilerplate per section
  - Identical visual output, significantly cleaner code

- **Hero Section Partial** (`hero-section.php`)
  - Updated from legacy individual variables to array config pattern
  - Changed class from `.hero-section` to `.hero` for consistency
  - Added logo display capability with proper escaping
  - Backward compatible with legacy patterns

### Enhanced
- **Comprehensive Partials Documentation** (`_partials/README.md`)
  - Added "Rendering Patterns" section with 3 patterns (recommended, legacy, individual)
  - Pattern 1 (Recommended): `partial()` function with auto-wrapping
  - Added "System Architecture" section explaining registry internals
  - Updated all usage examples to show `partial()` pattern
  - Documented auto-discovery process and config wrapping
  - Updated "Future Enhancements" - marked auto-resolution ✅ implemented
  - Updated "Resolution Priority" with auto-discovery explanation

### Technical Details
- Created `includes/content/class-partial-registry.php` (+220 lines)
  - Auto-discovery on plugin boot
  - Config wrapper mapping system
  - Client partial override priority
  - Caches discoveries in memory
- Updated `includes/utilities/class-helpers.php` (+26 lines)
  - Added `partial()` static method wrapper
  - Comprehensive PHPDoc with examples
- Updated `leancms.php` (+30 lines)
  - Bootstrap partial registry on plugin init
  - Global `partial()` helper function
- Updated `templates/pages/_partials/hero-section.php`
  - Logo support, array config, removed inline styles
- Updated `templates/pages/refr/slug-brand-guide.php`
  - All sections converted to `partial()` calls
- Updated `templates/pages/_partials/README.md`
  - Complete documentation overhaul

### Benefits
- **Path Obfuscation**: Template paths completely hidden from template code
- **Auto-Discovery**: New partials work immediately without registration
- **Clean Syntax**: `partial('name', $settings)` vs verbose include paths
- **Auto-Wrapping**: Config arrays automatically wrapped in expected keys
- **Client Override**: Client partials automatically override global ones
- **Backward Compatible**: All legacy include patterns still work
- **Zero Breaking Changes**: Existing templates continue functioning
- **Scalable**: System grows automatically as components are added

### Developer Experience
- Drop new partial files into `_partials/` folder - they work immediately
- No manual registration required
- Clean, consistent syntax across all partials
- IDE-friendly with comprehensive PHPDoc
- Easy to replicate brand guides by copying config structure

### Migration Path
Templates can migrate gradually:
- **Legacy**: `include LEANCMS_PLUGIN_DIR . 'templates/pages/_partials/cta-section.php';`
- **New**: `partial('cta', $settings);`
- Both patterns work simultaneously

### Developer Notes
- Recommended: Use `partial()` function for all new code
- Config keys auto-wrap - no need for explicit wrapper arrays
- New partials discovered automatically on page load
- Client partials in `{client}/_partials/` override global partials
- Registry mapping can be extended via `LeanCMS_Partial_Registry::register_wrapper()`

## [1.1.1] - 2025-11-08

### Added
- **Array-Based Configuration Pattern for Partials**
  - All partials now support clean, JSON-like array configuration format
  - `$cta_config`, `$color_config`, `$typography_config`, etc. array-based parameters
  - Improved readability and maintainability for template configuration
  - Backward compatible with individual variable passing (legacy support)

- **Brand Guide Component Partial Library**
  - `color-palette-section.php` - Color swatches with HEX/RGB values and usage descriptions
  - `typography-section.php` - Type specimens with font family, size, weight, and line-height specs
  - `logo-section.php` - Logo variations grid with optional background colors
  - `guidelines-section.php` - Do's and don'ts in two-column layout with custom bullet styling
  - `spacing-section.php` - Visual spacing system demonstration with variable heights
  - All partials follow consistent array config pattern with comprehensive documentation

### Changed
- **Brand Guide Template Refactored to Fixed Layout System**
  - Converted `slug-brand-guide.php` from ~300 lines of inline HTML to clean config arrays with includes
  - Each section now uses dedicated partial with structured configuration
  - Reduced template complexity while maintaining identical visual output
  - Easier to maintain, update, and replicate for new brand guides

- **Enhanced CTA Partial with Array Config Support**
  - Updated `cta-section.php` to accept `$cta_config` array parameter
  - Maintains full backward compatibility with individual variables
  - Cleaner, more structured configuration approach

### Enhanced
- **Comprehensive Partials Documentation**
  - Added "Configuration Pattern" section to `_partials/README.md`
  - Documented array config vs individual variable approaches
  - Usage examples and configuration details for all 5 new brand guide partials
  - Clear benefits explanation: readability, maintainability, consistency

### Technical Details
- Created 5 new partial files: `color-palette-section.php`, `typography-section.php`, `logo-section.php`, `guidelines-section.php`, `spacing-section.php`
- Updated `templates/pages/_partials/cta-section.php` with array detection and fallback logic
- Refactored `templates/pages/refr/slug-brand-guide.php` to use partial-based layout
- Updated `templates/pages/_partials/README.md` with comprehensive array config documentation
- All changes maintain backward compatibility
- 8 files changed: 3 modified, 5 created
- +773 insertions, -269 deletions

### Benefits
- **Fixed Layout System**: Brand guides now use consistent, reusable component structure
- **Improved Maintainability**: Configuration separated from presentation logic
- **Better Readability**: JSON-like arrays easier to read and modify than scattered individual variables
- **Faster Development**: Copy-paste config arrays for new sections instead of recreating markup
- **Consistency**: All brand guide sections follow same configuration pattern
- **Scalability**: Easy to create new brand guides by copying config structure

### Developer Notes
- Recommended pattern: Use array config for all new partial implementations
- Legacy individual variables still supported for backward compatibility
- To create new brand guide: Copy config arrays from `slug-brand-guide.php` and modify values
- All partials include comprehensive PHPDoc with usage examples

## [1.1.0] - 2025-11-08

### Added
- **Comprehensive Reusable Component System**
  - New grid systems (`.grid-2`, `.grid-3`, `.grid-4`) with responsive breakpoints
  - Generic card components (`.card`, `.card-hover-lift`) with customizable variants
  - Dark gradient sections (`.section-dark`) for scoring and assessment displays
  - Score display components (`.score-card`, `.final-score-container`)
  - Item list patterns (`.item-list`, `.item`) for improvement sections
  - Text link styles (`.text-link`) with hover effects
  - Section dividers (`.section-divider`) for visual separation
  - Summary card components (`.summary-card`) for comparison sections

- **Brand Guide Component Library**
  - Color palette components (`.color-grid`, `.color-card`, `.color-swatch`)
  - Typography showcase components (`.type-specimen`, `.heading-xl/lg/md`, `.body-lg/md`)
  - Logo display components (`.logo-grid`, `.logo-card`)
  - Guidelines components (`.guidelines-grid`, `.guideline-card` with `.do`/`.dont` variants)
  - Spacing visualization components (`.spacing-grid`, `.spacing-card`)
  - CTA section components (`.cta-section`) with gradient backgrounds

- **Two-Tier Reusable Partials System**
  - Global partials folder (`templates/pages/_partials/`) for cross-client components
  - Client-specific partials folders (`templates/pages/{client}/_partials/`) for branded components
  - Generic CTA partial (`_partials/cta-section.php`) with parameterized customization
  - Reframe WA branded CTA partial (`refr/_partials/cta-branded.php`) with tagline
  - Comprehensive partials documentation (`_partials/README.md`)
  - Variable-based component customization system
  - Proper escaping and security best practices

### Changed
- **Refactored Web Review Page (`slug-web-review.php`)**
  - Migrated all inline styles to reusable component classes
  - Replaced page-specific grids with generic `.grid-2/3/4` classes
  - Converted card components to use `.card` with modifiers
  - Updated scoring sections to use `.section-dark` pattern
  - Changed improvement lists to use `.item-list` / `.item` pattern
  - Consolidated dividers to use `.section-divider` class
  - Reduced from 400+ lines of inline CSS to ~200 lines page-specific only
  - Retained only unique TaskList structure and alternating backgrounds inline

- **Updated Brand Guide Page (`slug-brand-guide.php`)**
  - Replaced inline CTA section with global `cta-section.php` partial
  - Demonstrates real-world partial usage with parameter passing
  - Maintains identical visual appearance with reduced duplication

### Enhanced
- **CSS Architecture Improvements**
  - All component styles now in `document-system.css` for maximum reusability
  - Fully responsive grid systems with tablet (2-col) and mobile (1-col) breakpoints
  - Consistent hover effects and transitions across all components
  - CSS variable-based theming for easy brand adaptation
  - Clear separation: structure (document-system) vs brand (refr-theme) vs page-specific

- **Developer Experience**
  - Rapid page development with library of reusable components
  - Partial system enables consistent component behavior across pages
  - Easy customization via PHP variables instead of CSS duplication
  - Single source of truth for component styles
  - Clear documentation for usage patterns and best practices

### Technical Details
- Updated `templates/assets/refr/document-system.css` (+708 lines)
- Refactored `templates/pages/refr/slug-web-review.php` (+257, -85 lines)
- Created `templates/pages/_partials/cta-section.php` (new global partial)
- Created `templates/pages/_partials/README.md` (comprehensive documentation)
- Created `templates/pages/refr/_partials/cta-branded.php` (client-specific demo)
- Updated `templates/pages/refr/slug-brand-guide.php` (converted to use partial)
- All responsive breakpoints consolidated and consistent
- Zero breaking changes to existing functionality
- All components fully escaped and security-hardened

### Benefits
- Maximum code reusability across pages and clients
- Reduced CSS duplication by ~400 lines
- Faster page template development
- Consistent component behavior and styling
- Easy to maintain and update (single source of truth)
- Scalable architecture for future templates
- Clear two-tier system: global vs client-specific components

### Developer Notes
- New components use existing classes from `document-system.css`
- Page-specific styles only for truly unique layouts (like TaskList)
- Partials accept parameters via PHP variables before include
- Client-specific partials can extend global partials with branding
- All styling follows CSS variable theming for brand portability

## [1.0.9] - 2025-11-07

### Added
- **CSS Variables Architecture for Brand Portability**
  - Implemented two-tier CSS system separating structure from brand identity
  - New `document-system.css` - Brand-agnostic document structure using CSS custom properties
  - New `refr-theme.css` - Reframe WA brand-specific values (colors, fonts)
  - All brand values (colors, typography, spacing) exposed as CSS variables
  - Easy to create new brand themes by swapping theme file

### Changed
- **Refactored `/refr/` Template Stylesheets**
  - Consolidated common styles from individual templates into reusable system
  - Removed `refr-document-styles.css` in favor of modular architecture
  - Updated all 4 `/refr/` templates to reference new CSS architecture:
    * `slug-brand-guide-noaccess.php`
    * `slug-brand-guide.php`
    * `slug-web-review-noaccess.php`
    * `slug-web-review.php`
  - Reduced CSS code duplication by ~344 lines
  - Page-specific styles remain in individual templates for flexibility

### Enhanced
- **Improved Maintainability & Extensibility**
  - Consistent 992px document reading width across all pages
  - Easy to add new section types using CSS variables
  - Update structure without touching brand values
  - Single source of truth for brand styling
  - Better browser caching with external stylesheets

### Technical Details
- CSS variables include: colors, fonts, spacing, shadows, transitions
- Structure and brand identity fully separated for maximum flexibility
- All templates automatically inherit brand values from theme file
- New brands can be added by creating new theme file (e.g., `newbrand-theme.css`)

### Developer Notes
- To apply system to new brand: Create theme file overriding CSS variables
- To extend with new sections: Add structural styles to `document-system.css`
- Brand theme can be swapped by changing stylesheet reference in templates

## [1.0.8] - 2025-11-07

### Changed
- **Improved Helper Method Naming**
  - Renamed `is_dev_mode_enabled()` to `check_url_param()` for better semantic clarity
  - Pairs naturally with `check_url_params()` (singular vs plural)
  - More intuitive API: `check_url_param('show-teaser')` reads clearer than `is_dev_mode_enabled('show-teaser')`
  - Updated all template instances (8 total across 2 files)
  - Updated documentation and PHPDoc comments

### Enhanced
- Developer experience improved with more intuitive method naming
- Function purpose is now self-evident from the name
- Consistent naming pattern across the helper API

### Technical Details
- Updated `includes/utilities/class-helpers.php` method signature and documentation
- Updated `templates/pages/refr/slug-web-review.php` (6 instances)
- Updated `templates/pages/refr/slug-web-review-noaccess.php` (2 instances)
- Zero breaking changes - all updates in same release
- Method remains fully backward compatible in functionality

## [1.0.7] - 2025-11-07

### Added
- **Generic URL Parameter Helper System** (`LeanCMS_Helpers`)
  - New `check_url_params()` method for flexible URL parameter validation
  - Supports multiple validation modes:
    - `'boolean'`: Checks for true/1/yes/on values
    - `'exists'`: Parameter must be present (any value)
    - `'equals'`: Exact value matching
    - `'in_array'`: Value must be in allowed list
    - `'regex'`: Regex pattern matching
  - Supports AND/OR logical operators for combining multiple parameters
  - Fully documented with comprehensive usage examples

- **Convenience Wrapper Methods**
  - `check_url_param()`: Checks a single URL parameter with boolean validation (clear, semantic naming)
  - `is_preview_mode()`: Checks for preview parameter
  - `get_display_mode()`: Validates and returns display mode from URL params

### Changed
- **Refactored Template URL Parameter Logic**
  - Removed local `is_dev_mode_enabled()` function from `slug-web-review.php`
  - Removed local `is_teaser_mode_enabled()` function from `slug-web-review-noaccess.php`
  - All instances now use centralized `LeanCMS_Helpers::check_url_param()`
  - Provides reusable, centralized solution for URL parameter validation across all templates
  - Clearer API: `check_url_param('show-teaser')` vs confusing `is_dev_mode_enabled('show-teaser')`

### Enhanced
- URL parameter validation now available centrally for all templates
- Configurable validation rules via array-based configuration
- Supports complex multi-parameter scenarios with custom logic
- Maintains backward compatibility with existing templates

### Technical Details
- Updated `includes/utilities/class-helpers.php` (+115 lines)
- Refactored `templates/pages/refr/slug-web-review.php` (-13 lines)
- Zero breaking changes to existing functionality
- All validation includes strict type checking for security

### Developer Notes
- Templates can now configure display options via array-based parameter checks
- Multiple URL parameters can control visibility with AND/OR logic
- Extensible for future validation modes (e.g., numeric ranges, date validation)

## [1.0.6] - 2025-11-07

### Added
- **Web Review Page Enhancements** (`refr/slug-web-review.php`)
  - Added comprehensive TaskList section with implementation roadmap
  - Organized recommendations into "Quick Wins (0-3 months)" and "Further Work (3-12 months)"
  - Grouped actionable items by category: Messaging & Positioning, Social Proof, Funnel/Conversion, Website UX, Offer Development, AI/Augmentation Readiness, Authority Building, and Brand & Marketing
  - Client-focused messaging emphasizing outcomes and benefits

- **URL Parameter Display Control System**
  - Implemented `is_dev_mode_enabled()` function for conditional rendering
  - Added support for `?show-dev=true` and `?show-dev=1` URL parameters
  - Conditional rendering prevents markup output when sections are hidden (not just CSS)
  - Dev-only sections: `.scoring-section` (Performance Metrics) and `.final-score-section` (Overall Assessment) across all 3 case studies
  - Cleaner client-facing view by default with detailed metrics available on demand

### Changed
- **Brand Guidelines Integration**
  - Updated color scheme to match official brand guidelines:
    * Hero gradient: #08093E to #0A0C4F (deep blue)
    * Primary brand color: #12195B throughout all UI elements
    * Text color: #161617 for improved readability
  - Added Reframe WA logo to hero section
  - Implemented brand typography:
    * Raleway (700 weight) for headings with uppercase styling
    * Inter (400 weight) for body text
  - Applied consistent brand styling across all sections, cards, and UI components
  - Matches visual identity from `slug-brand-guide.php`

### Enhanced
- All section headers now use brand fonts and colors
- Overview cards, strength cards, and improvement items updated with brand styling
- Summary comparison section aligned with brand guidelines
- TaskList section styled with brand colors and typography
- Improved visual consistency across entire web review page

### Technical Details
- PHP conditional rendering for performance optimization
- Zero markup sent to browser when dev sections are hidden
- Google Fonts integration (Raleway, Inter)
- Responsive design maintained across all brand updates
- Updated 200+ lines of CSS with brand colors

## [1.0.5] - 2025-11-07

### Added
- **Brand Hub Templates** (`brhu/`)
  - Migrated Brand Hub project documentation to `brhu/` subfolder
  - Added brhu README.md with Sunset Boulevard theme documentation
  - Updated project summary with v1.0.4 implementation status
  - Documented client assignment technical approaches (slug-based, post-meta, taxonomy)

- **Test Templates Organization** (`test/`)
  - Migrated test templates to `test/` subfolder
  - Added test README.md with usage guidelines
  - Organized example and demo templates

### Changed
- **Complete Template Migration to Subfolders**
  - Moved all remaining refr templates (`slug-web-review-2/3/4.php`)
  - Moved all test templates (`slug-hello-world.php`, `slug-hello-world-2.php`, `slug-leanos-cms.php`)
  - Updated @filepath comments in all migrated templates
  - Removed redundant client prefixes from all subfolder templates
  - **Result:** Zero templates remaining in flat structure (100% migrated)

- **Project Documentation Updates**
  - Updated progress: 35% (Phase 1 Core Foundation Complete)
  - Added comprehensive v1.0.4 feature summary
  - Added detailed client assignment mechanism analysis
  - Documented decision: staying with slug-based approach for Phase 1

### Enhanced
- Complete subfolder organization for all three clients (refr, brhu, test)
- Consistent README.md documentation across all client folders
- Clear technical planning for future URL assignment options
- All templates now follow consistent naming conventions

### Technical Details
- All client templates now in respective subfolders
- Backwards-compatible slug-based resolution still active
- Updated 9 template @filepath comments
- Created 2 new README.md files (brhu, test)

## [1.0.4] - 2025-11-07

### Added
- **Client Subfolder Organization System**
  - Scalable template organization with client-specific subfolders
  - New structure: `templates/pages/refr/`, `brhu/`, `test/`, `_shared/`, `_partials/`
  - Moved Reframe WA templates to `refr/` subfolder with cleaned naming
  - Removed redundant client prefixes in subfolder files (e.g., `slug-brand-guide.php` instead of `slug-refr-brand-guide.php`)
  - Archive subfolders (`_archive/`) for version management per client
  - Shared templates folder (`_shared/`) for cross-client reusable components
  - Partials folder (`_partials/`) for reusable template components

- **Smart Template Resolution System**
  - Filter-based template resolver (`class-template-subfolder-resolver.php`)
  - Automatic client code extraction from page slugs (e.g., `refr-brand-guide` → `refr`)
  - Priority resolution: client subfolder first, flat structure fallback
  - Fully backwards compatible with existing flat-structure templates
  - Extensible via `leancms_candidate_pages` filter hook

- **Machine-Readable Configuration System**
  - Comprehensive `config.php` for each client folder
  - Programmatically consumable brand specifications:
    - Color palette with semantic naming (primary, accent, background, text)
    - Typography (fonts, sizes, weights, line-heights, letter-spacing)
    - Layout specifications (max-widths, spacing, borders, breakpoints)
    - Template component defaults (hero, cards, CTAs, forms, grids)
  - AI generation instructions for consistent template creation:
    - Style guide (tone, voice, content patterns)
    - Template structure patterns
    - Accessibility requirements
    - Responsive design rules
  - Brand validation rules for compliance enforcement
  - Asset paths and Google Fonts configuration
  - Versioned config with metadata tracking

- **Template Generator Utility**
  - `LeanCMS_Template_Generator` class for programmatic template creation
  - Dot-notation config access (e.g., `get('brand.colors.primary.navy_dark')`)
  - Component generators (hero sections, cards, CTAs, buttons)
  - Full template generation from config defaults
  - CSS variables generator from brand palette
  - Template validation against brand standards
  - Ready for AI-assisted and CLI-based template generation

- **Comprehensive Documentation**
  - Main templates README (`templates/pages/README.md`) with:
    - Directory structure explanation
    - Template resolution flow
    - Naming conventions and best practices
    - Password protection patterns
    - Versioning and archiving strategies
    - Migration guide for gradual adoption
    - Troubleshooting section
  - Client-specific README for Reframe WA (`templates/pages/refr/README.md`) with:
    - Complete brand guidelines (colors, typography, layout)
    - Template naming conventions
    - Password protection setup
    - Active templates inventory
    - Archive policy
    - Development notes and accessibility requirements
  - Hybrid documentation approach: config.php for machines, README.md for humans

- **Example Templates**
  - Generic password gate template (`_shared/slug-generic-password-gate.php`)
  - Reusable hero section partial (`_partials/hero-section.php`)
  - Demonstrated config-based component generation

- **Reframe WA Templates**
  - Password-protected web review case studies template (`slug-web-review-noaccess.php`)
  - Teaser content for three consulting website analyses
  - Features section showcasing case study contents
  - Branded password form with minimalist design
  - Responsive layout matching main web-review template

### Changed
- Migrated Reframe WA templates from flat structure to `refr/` subfolder
- Updated @filepath comments in all moved templates
- Reorganized template loading priority (subfolder → flat → ID-based)
- Enhanced bootstrap to include subfolder resolver
- Updated Reframe WA README to reference machine-readable config

### Enhanced
- Template system now scalable to 100+ clients and 1000+ templates
- Brand consistency enforceable programmatically via config.php
- Automated template generation capabilities for AI and CLI tools
- Client-specific conventions and documentation support
- Bulk operations per client (archiving, migration, validation)
- Matches asset organization pattern (`templates/assets/refr/`)

### Technical Details
- Added `includes/content/class-template-subfolder-resolver.php`
- Added `includes/utilities/class-template-generator.php`
- Added `templates/pages/refr/config.php`
- Filter hook: `leancms_candidate_pages` for custom resolution logic
- Backwards compatible: existing flat templates continue working
- Tested template resolution logic with automated tests
- Validated PHP syntax for all new files
- Zero breaking changes to existing functionality

### Developer Notes
- New clients: Add 4-letter code to `$client_codes` array in resolver
- Template naming: Use `slug-{page-name}.php` format within client folders
- Config updates: Maintain config.php and README.md in sync
- Migration: Gradual adoption supported, no forced migration required

## [1.0.3] - 2025-11-06

### Added
- Branded password protection template with Sunset Boulevard theme
  - Custom branded password form for Brand Hub project overview
  - Professional themed design matching project aesthetics
  - Enhanced user experience for password-protected content

### Fixed
- Password protection template selection logic
  - Prevent regular template from loading when password is required
  - Improved password protection detection and error handling
  - Added comprehensive debug logging for troubleshooting

### Enhanced
- Password form system with better template routing
- More reliable password-protected page rendering
- Improved error handling and debugging capabilities

## [1.0.2] - 2025-11-05

### Added
- Reframe WA brand hub templates with modern minimalist theme
  - Index page (slug-refr-index.php) with brand resource hub layout
  - Brand guide template (slug-refr-brand-guide.php) with comprehensive brand guidelines
  - Web review templates (slug-refr-web-review.php and variations)
- Reframe WA brand assets
  - Logo files in multiple formats (vertical, horizontal, symbol, reversed)
  - SVG and PNG logo assets in templates/assets/refr/
- Logo integration in hero sections
  - Vertical reversed logo (ReframeWALogo-Vert_REV.svg) added to template headers
  - Consistent logo styling across index and brand guide pages

### Enhanced
- Brand guide template populated with actual Reframe WA brand data
  - Color palette (navy blues, bright blue accents)
  - Typography system (Raleway for headings, Inter for body)
  - Logo usage guidelines
  - Spacing and layout standards
  - Brand do's and don'ts

## [1.0.1] - 2025-11-04

### Added
- Claude Code skills integration with comprehensive document processing capabilities
- theme-factory skill for professional template generation with 10 pre-built themes
- brand-guidelines skill for Anthropic brand styling
- Document skills suite: docx, pdf, pptx, xlsx processing and creation
- Multi-theme showcase template demonstrating theme-factory integration (slug-test-hello-world-2.php)
- Hello World example template with Modern Minimalist theme (slug-hello-world.php)
- Website review templates converted to WordPress PHP format

### Enhanced
- Template system with theme-factory skill demonstrations
- Content rendering functionality with professional theming support
- Example templates showing skill integration patterns

## [1.0.0] - 2025-11-04

### Added
- Initial release of Brand Hub - Client CMS
- Configured for Brand Hub client development
- Rebranded from LeanCMS to Brand Hub - Client CMS
- Updated repository URL to https://github.com/piksoul/lcms-brandhub-client
- Updated text domain to `brandhub-client-cms`

### Changed
- Plugin name updated to "Brand Hub - Client CMS"
- All documentation updated for Brand Hub focus
- Version reset to 1.0.0 for new project

### Inherited Features (from LeanCMS v1.0.12)
- Plugin Update Checker integration for automatic updates
- Claude Code integration with slash commands
- 13 code patterns library (CPT, Commerce, Content, etc.)
- Custom page rendering system
- Settings API integration
- Activation/deactivation hooks
- Translation ready
- Comprehensive documentation structure

---

## Pre-Fork History (LeanCMS v1.0.12)

This plugin was forked from LeanCMS v1.0.12 and reconfigured for Brand Hub client development.

### [1.0.12] - 2025-11-01 (LeanCMS)

### Changed
- Moved the `examples/` directory into `docs/examples/` to streamline the repository layout for upcoming work.

## [1.0.11] - 2025-10-31

### Changed
- Verified plugin bootstrap wiring after the installer, helpers, and settings refactor to ensure activation, settings, and template hooks still load correctly.
- Bumped project metadata and directives in preparation for the v1.0.11 release package.

## [1.0.10] - 2025-10-30

### Changed
- Pointed the Plugin Update Checker at the canonical `piksoul/tmpl-leanos-cms` repository so release metadata resolves correctly.
- Refreshed documentation links and directives to reflect the new repository location for update configuration guidance.

## [1.0.9] - 2025-10-29

### Changed
- Split the page template registration and rendering logic into `includes/content/class-page-renderer.php` to centralize content controllers.
- Updated project documentation to call out the new content controller structure and keep release notes current.

## [1.0.8] - 2025-10-28

### Changed
- Renamed the plugin to LeanCMS across metadata, update wiring, and template messaging for consistent branding.
- Updated project documentation and examples to reflect the LeanCMS repository slug and structure.

## [1.0.7] - 2025-10-27

### Added
- Expanded Claude Code pattern library documentation, including new prompts and pattern reference guides.
- Dedicated configuration guide relocated to `docs/CONFIG-EXAMPLE.md` for easier setup.

### Changed
- Reworked README to position the project as an agentic WordPress plugin boilerplate and linked to the new documentation set.
- Updated project directives in `docs/START-HERE.md` to reflect the current repository layout and workflows.

### Removed
- Legacy `readme.txt` and custom update JSON example now replaced by the structured documentation.

## [1.0.6] - 2025-10-26

### Changed
- Refreshed the demo page heading copy used for template testing.

## [1.0.3] - 2025-10-27

### Changed
- Updated plugin author to Piksoul
- Updated WordPress requirement to 6.8 or higher
- Updated PHP requirement to 8.0 or higher
- Updated compatibility to WordPress 6.8.3
- Final test of update mechanism with new plugin details

## [1.0.2] - 2025-10-25

### Changed
- Second update test to verify repeatable update process
- Confirmed Plugin Update Checker workflow is stable
- Updated project directives documentation

### Notes
- No functional changes - testing only

## [1.0.1] - 2025-10-25

### Added
- Support for private GitHub repositories with token authentication
- config-example.php with setup instructions
- Authentication guide in documentation

### Fixed
- 404 errors when accessing private repositories

### Security
- Improved security by using wp-config.php for token storage

## [1.0.0] - 2025-10-25

### Added
- Initial release
- Plugin Update Checker integration
- Basic plugin structure
- Admin menu and settings page
- Support for GitHub and custom update servers
