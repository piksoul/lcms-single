# Single-Site Refactor Plan

This document outlines the comprehensive plan to refactor `lcms-single` from a multi-client CMS to a streamlined single-client installation.

**Current Status**: Option C (Minimal Changes) implemented - hardcoded single client, multi-client code remains
**Future Goal**: Option A (Clean Slate) - remove all multi-client code for cleaner, simpler codebase

---

## Phase 1: Configuration Simplification

### 1.1 Consolidate Configuration Files
- [ ] Merge global config (`/templates/assets/global/config.php`) with chosen client config
- [ ] Create single unified `/templates/config.php`
- [ ] Remove client-specific config inheritance logic from helpers

### 1.2 Simplify Helpers Class
- **File**: `includes/utilities/class-helpers.php`
- [ ] Remove `$client_code` parameter from `load_client_resources()`
- [ ] Remove client code detection/resolution logic
- [ ] Simplify config loading to single file

---

## Phase 2: Template System Simplification

### 2.1 Flatten Template Structure
- **Current**: `/templates/pages/{client}/slug-{slug}.php`
- **Target**: `/templates/pages/slug-{slug}.php` (flat only)
- [ ] Move chosen client's templates to flat structure
- [ ] Remove all client folders from `/templates/pages/`

### 2.2 Remove Template Subfolder Resolver
- **File**: `includes/content/class-template-subfolder-resolver.php`
- [ ] Remove entire class (203 lines)
- [ ] Update `leancms.php` to remove require and boot()
- [ ] Update `class-page-renderer.php` to use direct slug matching only

### 2.3 Update Page Renderer
- **File**: `includes/content/class-page-renderer.php`
- [ ] Remove client folder candidate path generation
- [ ] Simplify to direct slug-based template resolution
- [ ] Remove calls to `LeanCMS_Template_Subfolder_Resolver`

---

## Phase 3: Remove Multi-Client Admin Features

### 3.1 Remove Client Code Meta Box
- **File**: `includes/content/class-client-code-meta-box.php`
- [ ] Remove entire class (262 lines)
- [ ] Update `leancms.php` to remove require and boot()

### 3.2 Simplify Bulk Pages Admin
- **File**: `includes/admin/class-bulk-pages.php`
- [ ] Remove `client_code` field from JSON schema
- [ ] Update documentation/examples

- **File**: `includes/admin/views/bulk-pages-form.php`
- [ ] Remove client_code from example JSON
- [ ] Update field descriptions

### 3.3 Simplify Page Data Meta Box
- **File**: `includes/content/class-page-data-meta-box.php`
- [ ] Remove client code references from template import functionality
- [ ] Simplify template path display

---

## Phase 4: Partial System Simplification

### 4.1 Consolidate Partials
- **Current**: Global `_partials/` + per-client `{client}/_partials/`
- **Target**: Single `/templates/pages/_partials/` folder
- [ ] Audit client-specific partials for any needed
- [ ] Merge required client partials into main partials folder
- [ ] Remove client-specific partial folders

### 4.2 Update Partial Registry
- **File**: `includes/content/class-partial-registry.php`
- [ ] Remove multi-folder scanning logic
- [ ] Hardcode single partials path
- [ ] Remove client-aware partial resolution

---

## Phase 5: Database & Meta Cleanup

### 5.1 Remove Client Code Meta
- **Meta key**: `_leancms_client_code`
- [ ] Create migration script to remove meta from all posts
- [ ] Remove meta key constant if defined
- [ ] Update any queries that reference this meta

### 5.2 Clean Up Options
- [ ] Review `leancms_settings` for multi-client references
- [ ] Remove any client-related options

---

## Phase 6: Global Function Cleanup

### 6.1 Update Global Helper Functions
- **File**: `leancms.php`
- [ ] Simplify `load_client_resources()` signature (remove client_code param)
- [ ] Update function documentation

### 6.2 Template Helper Updates
- [ ] Update any template files using old function signatures
- [ ] Remove client_code parameters from partial calls

---

## Files Summary

### Files to Remove Entirely
| File | Lines | Purpose |
|------|-------|---------|
| `class-template-subfolder-resolver.php` | 203 | Multi-client template resolution |
| `class-client-code-meta-box.php` | 262 | Client assignment UI |
| `/templates/pages/{client}/` folders | varies | Client-specific templates |

### Files to Simplify
| File | Current Lines | Est. Reduction |
|------|---------------|----------------|
| `class-helpers.php` | ~200 | 30-50 lines |
| `class-page-renderer.php` | 286 | 50-80 lines |
| `class-partial-registry.php` | 408 | 80-120 lines |
| `class-bulk-pages.php` | 150 | 20-30 lines |
| `class-page-data-meta-box.php` | 2,341 | 50-100 lines |
| `leancms.php` | 238 | 20-30 lines |

### Estimated Total Reduction
- **Classes removed**: 2
- **Lines removed**: ~800-1,000
- **Complexity reduction**: ~40%

---

## Testing Checklist

After refactoring, verify:
- [ ] Page templates render correctly (file-based)
- [ ] Page templates render correctly (DB-based)
- [ ] Partials load and render properly
- [ ] CSS variables apply correctly
- [ ] Google Fonts load correctly
- [ ] Admin meta boxes function properly
- [ ] Bulk page creation works
- [ ] Password-protected pages work
- [ ] Global panels orchestrator works
- [ ] Plugin updates still work from new repo

---

## Notes

- Keep backward compatibility in mind for any existing content
- Consider a feature flag approach if gradual migration needed
- Document any breaking changes for template authors
- Test thoroughly on staging before production deployment
