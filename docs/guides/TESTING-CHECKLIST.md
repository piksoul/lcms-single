# BEM Migration Testing Checklist
## Phase 1-5 Testing (100% Complete!) 🎉

**Date:** 2025-11-16
**Version:** Design System v1.4.9
**Status:** Ready for Testing

---

## What Was Done

### 1. Created lcms-design-system.css
Combined all Phase 1-5 components into a single file:

**Phase 1: Foundation**
- **Base CSS** (resets, foundation, containers)
- **Utility Classes** (flex, grid, spacing, text)

**Phase 2: Core Components**
- **Section Heading Component** (BEM)
- **Button Component** (BEM)
- **Grid Component** (BEM)
- **Column Layout Component** (BEM)

**Phase 3: Content Components**
- **Card Component** (BEM, 11 variants)
- **Content Stack Component** (BEM)
- **Content Row Component** (BEM)
- **Content Grid Component** (BEM)

**Phase 4: Specialized Components**
- **Color Swatch Component** (BEM)
- **Metric Component** (BEM)
- **List Component** (BEM, check/arrow/icon variants)
- **Progress Component** (BEM, striped/animated variants)
- **Badge Component** (BEM, outline/subtle/pill variants)

**Phase 5: Section Wrappers**
- **Hero Component** (BEM, size/background/alignment variants)
- **CTA Section Component** (BEM, size/background/button variants)

**Total:** 2,596 lines of CSS | **17 Components** | **100% Complete**

### 2. Updated CSS Loading Pattern
Changed from:
```html
<!-- Old -->
<link rel="stylesheet" href=".../base.css">
<style>:root { --css-vars... }</style>
<link rel="stylesheet" href=".../document-system.css">
```

To:
```html
<!-- New -->
<link rel="stylesheet" href=".../lcms-design-system.css">
<style>:root { --css-vars... }</style>
<link rel="stylesheet" href=".../document-system.css">
```

**Files Updated:** 23 page templates
- test/slug-pro-sites-demo.php
- 4dli/* (5 files)
- bibo/* (1 file)
- bicwa/* (2 files)
- brmo/* (5 files)
- jiku/* (1 file)
- proj/* (5 files)
- refr/slug-brand-guide.php

---

## Testing Strategy

### Phase 1: Visual Regression Testing
Test 2-3 pages from different categories to ensure:
1. No visual breaking changes
2. Components render correctly
3. Responsive behavior intact
4. CSS variables still work

### Phase 2: Component Validation
Verify each BEM component works:
1. Section headings display correctly
2. Buttons have proper styles and hover states
3. Cards render with all variants
4. Grid layouts are responsive
5. Column layouts work as expected

### Phase 3: Integration Testing
Check that:
1. Partial CSS still loads correctly
2. Client-specific overrides still work
3. No CSS conflicts or duplicates
4. Performance is acceptable

---

## Test Pages

### Recommended Test Pages

**1. Pro-Sites Demo (Most Comprehensive)**
- File: `test/slug-pro-sites-demo.php`
- Tests: All content types, sections, buttons, cards
- Why: Uses most Phase 1-3 components
- Priority: **HIGH**

**2. Brand Guide**
- File: `refr/slug-brand-guide.php`
- Tests: Section headings, grids, brand-specific styles
- Why: Tests theming and component reusability
- Priority: **HIGH**

**3. Project Overview (Any Client)**
- Files: `proj/slug-project-overview.php`, `brmo/slug-project-overview.php`
- Tests: Phase templates, cards, layouts
- Why: Real-world usage patterns
- Priority: **MEDIUM**

---

## What to Check

### ✅ Visual Checklist

**Section Headings:**
- [ ] Label displays with correct color
- [ ] Title is uppercase and properly sized
- [ ] Subtitle has correct max-width
- [ ] Alignment modifiers work (left, center, right)
- [ ] Dark mode variant works

**Buttons:**
- [ ] Primary button has brand accent color
- [ ] Secondary button has background color
- [ ] Outline button has transparent background
- [ ] CTA button is rounded
- [ ] Hover states work (translateY, box-shadow)
- [ ] Button groups align correctly
- [ ] Mobile stacking works

**Cards:**
- [ ] Basic card structure renders
- [ ] Card variants work (bordered, elevated, feature, progress, metric, etc.)
- [ ] Card hover effects work
- [ ] Card media/header/body/footer sections display correctly
- [ ] Horizontal cards work
- [ ] Cards are responsive on mobile

**Layouts:**
- [ ] Grid layouts (2col, 3col, 4col) work
- [ ] Column layouts work
- [ ] Content stack/row/grid work
- [ ] Responsive breakpoints work correctly
- [ ] Gap sizes are correct

**General:**
- [ ] Content containers have correct max-width
- [ ] CSS variables are applied correctly
- [ ] Typography looks correct
- [ ] Spacing is consistent
- [ ] No console errors
- [ ] No broken styles

**Hero Sections:**
- [ ] Hero logo displays correctly
- [ ] Hero badge renders with correct background
- [ ] Hero title is uppercase and properly sized
- [ ] Hero subtitle has correct max-width and spacing
- [ ] Size variants work (small, large)
- [ ] Background variants work (primary, secondary, accent, dark, light)
- [ ] Alignment modifiers work (left, center, right)
- [ ] Responsive breakpoints work on mobile
- [ ] Light variant adjusts colors correctly

**CTA Sections:**
- [ ] CTA title displays correctly
- [ ] CTA description has correct max-width
- [ ] CTA button renders with proper styles
- [ ] Button hover effects work (translateY, box-shadow)
- [ ] Size variants work (small, large)
- [ ] Background variants work (primary, secondary, accent, dark, light)
- [ ] Alignment modifiers work (left, center, right)
- [ ] Button variants work (outline, ghost, squared, sharp)
- [ ] Multiple buttons layout correctly
- [ ] Mobile responsive behavior works
- [ ] Light variant adjusts colors correctly

**Specialized Components:**
- [ ] Color swatches display hex/RGB values correctly
- [ ] Metric cards show values with proper sizing
- [ ] Lists render with correct markers (check, arrow, icon)
- [ ] Progress bars show fill percentage correctly
- [ ] Progress bar animations work (striped, animated)
- [ ] Badges display with correct variants (outline, subtle, pill)
- [ ] All specialized components are responsive

---

## How to Test

### Quick Test (5 minutes)
1. Load `test/slug-pro-sites-demo.php`
2. Scroll through the page
3. Check for visual issues
4. Test on mobile (resize browser)
5. Check browser console for errors

### Thorough Test (20 minutes)
1. Test all 3 recommended pages
2. Check each component type
3. Test responsive behavior on multiple breakpoints
4. Verify hover states work
5. Check dark mode sections
6. Verify button interactions
7. Test on different browsers (Chrome, Firefox, Safari)

### Debug Mode Test
Add `?show-dev=true` to URL to enable any debug features.

---

## Issues Found

### Template for Reporting Issues

```markdown
**Page:** [filename]
**Component:** [component name]
**Issue:** [description]
**Expected:** [what should happen]
**Actual:** [what actually happens]
**Browser:** [browser name/version]
**Screenshot:** [if applicable]
**Priority:** [High/Medium/Low]
```

### Issue Examples

**High Priority:**
- Component not rendering at all
- Layout completely broken
- CSS variables not applied
- Critical hover states not working

**Medium Priority:**
- Minor spacing issues
- Incorrect colors
- Missing responsive behavior
- Hover effect timing wrong

**Low Priority:**
- Minor visual inconsistencies
- Non-critical alignment issues
- Documentation improvements needed

---

## Success Criteria

**Phase 1-5 Testing Passes If:**
1. ✅ All tested pages load without errors
2. ✅ No major visual regressions
3. ✅ All 17 BEM components render correctly
4. ✅ Hero and CTA sections display properly
5. ✅ All specialized components work (swatches, metrics, lists, progress, badges)
6. ✅ Responsive behavior works on mobile
7. ✅ CSS variables are applied correctly
8. ✅ All modifiers work (size, background, alignment, etc.)
9. ✅ Performance is acceptable (no significant slowdown)
10. ✅ No console errors related to CSS

**If Testing Fails:**
- Document all issues found
- Prioritize critical issues
- Fix high-priority issues before proceeding
- Re-test after fixes

---

## Next Steps After Testing

**If Testing Passes:**
1. ✅ Commit changes with clear message
2. ✅ Push to branch
3. ✅ Create PR or merge to main
4. ✅ Update BEM-migration-strategy.md progress
5. ✅ BEM Component Library Migration: COMPLETE! 🎉
6. ⏭️ Optional: Begin PHP template migration phase
7. ⏭️ Optional: Begin partial theming cleanup

**If Issues Found:**
1. ⚠️ Document all issues
2. ⚠️ Fix critical issues
3. ⚠️ Re-test
4. ⚠️ Iterate until pass criteria met
5. ⚠️ Then proceed to commit/push

---

## File Inventory

**Created:**
- `templates/assets/global/lcms-design-system.css` (2,596 lines)
- `templates/assets/global/components/lcms-hero.css` (211 lines)
- `templates/assets/global/components/lcms-cta-section.css` (297 lines)
- `templates/assets/global/components/lcms-color-swatch.css` (137 lines)
- `templates/assets/global/components/lcms-metric.css` (211 lines)
- `templates/assets/global/components/lcms-list.css` (244 lines)
- `templates/assets/global/components/lcms-progress.css` (254 lines)
- `templates/assets/global/components/lcms-badge.css` (293 lines)
- Plus 10 more component files from Phases 1-3
- `docs/TESTING-CHECKLIST.md` (this file)

**Modified:**
- 23 page template files (CSS loading pattern updated)
- `CHANGELOG.md` (updated for v1.4.9)
- `leancms.php` (version bumped to 1.4.9)

**Unchanged:**
- Individual component files (exist as separate files and combined in design system)
- `document-system.css` (legacy styles, can be deprecated after template migration)
- All PHP partial templates (no HTML changes yet - deferred to template migration phase)

---

## Contact

If you encounter any issues during testing, document them in this file or create a GitHub issue.

**BEM Migration Docs:**
- Strategy: `docs/research/BEM-migration-strategy.md`
- Analysis: `docs/research/BEM-implementation.md`
- Testing: `docs/TESTING-CHECKLIST.md` (this file)
