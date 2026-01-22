# Brand Hub - Client CMS - Project Directives

## Overview

This document contains the core directives, decisions, and guidelines for the Brand Hub - Client CMS project. Update this file as the project evolves to maintain a single source of truth for project direction.

**Last Updated:** 2026-01-13
**Project Version:** 2.1.31
**Status:** Active Development - Visual Layout Builder Phase 3 Complete

---

## Project Information

### Purpose
Agentic CMS for Brand Hub client development and content management. WordPress plugin with AI-assisted workflows and automatic update capabilities.

### Repository
- **GitHub URL:** https://github.com/piksoul/lcms-brandhub-client
- **Main Branch:** master
- **Update Branch:** master

### Key Contacts
- **Author:** Piksoul
- **Maintainer:** Piksoul
- **Support:** https://piksoul.com/support

---

## Technical Directives

### WordPress Requirements
- **Minimum WordPress Version:** 6.8
- **Tested Up To:** 6.8.3
- **Minimum PHP Version:** 8.0
- **Text Domain:** brandhub-client-cms

### Update Mechanism
- **Library:** Plugin Update Checker v5.6
- **Update Source:** GitHub (https://github.com/piksoul/lcms-brandhub-client)
- **Branch:** master
- **Update Method:** GitHub Releases (recommended), Git Tags, or Branch monitoring

### File Structure
```
lcms-brandhub-client/
├── .claude/                        # Claude Code configuration
│   ├── commands/                   # Slash commands
│   ├── prompts/                    # Code patterns
│   ├── settings.json               # Project settings
│   └── README.md                   # Claude Code docs
├── docs/
│   ├── CONFIG-EXAMPLE.md           # Configuration guide
│   ├── CURRENT-CONTEXT.md          # Publishing workflow context
│   ├── START-HERE.md               # This file
│   ├── examples/                   # Sample theme and layout files
│   │   └── theme-files/
│   │       └── page-templates/
│   │           └── leancms-full-page.php
│   └── patterns/
│       └── README.md               # Pattern documentation
├── plugin-update-checker/          # Update checker library
├── includes/
│   ├── class-installer.php         # Lifecycle management
│   ├── settings/                   # Settings API controllers
│   ├── utilities/                  # Reusable helpers
│   └── content/                    # Content controllers (page rendering, modules, etc.)
├── templates/                      # Page and module templates
├── CHANGELOG.md                    # Version history
├── README.md                       # GitHub documentation
└── leancms.php                     # Main plugin file
```

---

## Development Guidelines

### Coding Standards
- Follow WordPress Coding Standards
- Use proper sanitization and escaping for all user inputs
- Maintain backward compatibility when possible
- Document all functions and hooks

### Version Control
- **Main Branch:** master (production-ready code)
- **Feature Branches:** feature/descriptive-name
- **Bug Fix Branches:** fix/descriptive-name

### Commit Message Format
```
Type: Brief description

- Detailed change 1
- Detailed change 2

🤖 Generated with [Claude Code](https://claude.com/claude-code)

Co-Authored-By: Claude <noreply@anthropic.com>
```

**Types:** Feature, Fix, Update, Refactor, Docs, Style, Test

---

## Release Process

### Creating a New Release

1. **Update Version Numbers**
   - Plugin header in `leancms.php`
   - `LEANCMS_VERSION` constant in `leancms.php`
   - `CHANGELOG.md`
   - Any docs referencing the version (e.g., this file)

2. **Update Documentation**
   - Summarize changes in `CHANGELOG.md`
   - Refresh `README.md` if functionality or positioning changed
   - Update project directives in this file as needed

3. **Create GitHub Release**
   - Tag format: v1.0.x or 1.0.x
   - Include release notes
   - Attach ZIP file (optional, PUC can auto-generate)

4. **Alternative: Git Tag**
   ```bash
   git tag v1.0.x
   git push origin master
   git push origin v1.0.x
   ```

### Version Numbering
- **Major.Minor.Patch** (Semantic Versioning)
- **Major:** Breaking changes or major new features
- **Minor:** New features, backward compatible
- **Patch:** Bug fixes and minor improvements

---

## Feature Directives

### Current Features (v2.1.31)

**Visual Layout Builder (Phase 3 Complete)**
- ✅ Visual Mode with drag-drop partial reordering
- ✅ Code Mode with full PHP layout control
- ✅ Partial Registry with auto-discovery and folder organization
- ✅ Config key and wrapper class editing per block
- ✅ Simplified naming convention (filename = API name)
- ✅ `_lib` folder exclusion for internal components

**Pro-Sites Partial System**
- ✅ Grid, column, and 2-column layout partials
- ✅ Nested content types (text, image, video, html, buttons, stack, card, row)
- ✅ BEM-compliant component styling

**Core Infrastructure**
- ✅ Plugin Update Checker integration
- ✅ GitHub update monitoring with private repo support
- ✅ DB Page Renderer for database-stored layouts
- ✅ Settings API-powered admin page
- ✅ Claude Code integration with slash commands

### Priority Todo

1. **UI Enhancements**
   - [ ] Edit partial/folder inline
   - [ ] Duplicate block button
   - [ ] Collapse/expand blocks

2. **Partial Registry Caching**
   - [ ] Cache discovered partials in transient
   - [ ] Auto-invalidate on version bump

3. **Partial/Folder Dropdowns**
   - [ ] Autocomplete from registry

4. **Per-Partial Config Override**
   - [ ] Inline config merging with config key

### Features Under Consideration
- **JSON Storage for Page Data** - Replace PHP serialize with JSON to handle unicode/emoji safely
- **Config Transformer** - Convert between array formats (short/long syntax, JSON, YAML)
- **Code Preview in Visual Mode** - Show generated PHP code read-only
- **Visual Config Builder** - GUI for editing nested content structures

### Deferred Features
- Visual editing of nested content types (requires architectural decisions)

---

## Configuration Directives

### Update Checker Configuration
```php
// Current configuration in leancms.php
$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/piksoul/lcms-brandhub-client/',
    __FILE__,
    'brandhub-client-cms'
);
$myUpdateChecker->setBranch('master');
```

### Private Repository
If switching to private repository:
1. Uncomment the authentication line in `leancms.php`
2. Generate GitHub token with `repo` scope
3. Add token: `$myUpdateChecker->setAuthentication('token-here');`

### Custom Update Server
If switching to a custom update server:
1. Create a JSON manifest following the Plugin Update Checker specifications
2. Host the JSON file on a publicly accessible web server
3. Update the URL passed to `buildUpdateChecker()` to point at your manifest

---

## Testing Directives

### Manual Testing Checklist
- [ ] Plugin activates without errors
- [ ] Plugin deactivates without errors
- [ ] Admin menu appears correctly
- [ ] Update checker connects successfully
- [ ] Updates are detected properly
- [ ] One-click update works

### Debug Mode
Enable WordPress debug mode for development:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

### Testing Updates
1. Install Debug Bar plugin
2. Navigate to Debug → PUC (`leancms`)
3. Click "Check Now" button
4. Verify update detection

---

## Security Directives

### Best Practices
- All user inputs must be sanitized
- All outputs must be escaped
- Use nonces for form submissions
- Verify user capabilities before actions
- Never commit sensitive data (.env, tokens, etc.)

### Permissions
- Admin menu requires `manage_options` capability
- Settings pages require proper capability checks
- AJAX handlers must verify nonces and capabilities

---

## Documentation Directives

### Maintain These Files
- **START-HERE.md** (this file) - Project directives and decisions
- **README.md** - Public-facing documentation
- **CHANGELOG.md** - Release history
- **Code comments** - Inline documentation

### When to Update This File
- New features planned or implemented
- Configuration changes
- Process changes
- Major decisions made
- Version number updates
- Contact information changes

---

## Decision Log

### 2025-11-04 - Brand Hub Client CMS Initialization (v1.0.0)
- **Decision:** Initialize repository for Brand Hub - Client CMS project
- **Changes:**
  - Rebranded from "LeanCMS" to "Brand Hub - Client CMS"
  - Updated repository URL to https://github.com/piksoul/lcms-brandhub-client
  - Updated text domain to `brandhub-client-cms`
  - Reset version to 1.0.0 for new project
  - Updated all documentation to reflect Brand Hub focus
- **Rationale:** Dedicated CMS instance for Brand Hub client development
- **Impact:** Clean, focused agentic CMS for Brand Hub client content management

### LeanCMS Foundation (Pre-Fork History)
- **Base:** Forked from LeanCMS Plugin boilerplate (v1.0.12)
- **Features Inherited:**
  - Plugin Update Checker integration
  - Claude Code integration with slash commands
  - 13 code patterns library
  - Custom page rendering system
  - Settings API integration
  - Comprehensive documentation structure

---

## Notes and Reminders

### Important Links
- Plugin Update Checker Docs: https://github.com/YahnisElsts/plugin-update-checker
- WordPress Plugin Handbook: https://developer.wordpress.org/plugins/
- WordPress Coding Standards: https://developer.wordpress.org/coding-standards/

### Quick Commands
```bash
# Check for updates manually
# In WordPress: Plugins → Check for updates

# Force version check via WP-CLI (if installed)
wp plugin update leancms --version=x.x.x

# View plugin status
wp plugin status leancms
```

---

## Future Considerations

### Potential Enhancements
- Custom settings page with options
- Admin notices for important updates
- Analytics/usage tracking (optional)
- Additional admin functionality
- Integration with other services

### Migration Path
If migrating to WordPress.org repository in the future:
1. Remove Plugin Update Checker code
2. Submit to WordPress.org plugin repository
3. WordPress will handle updates automatically
4. Update documentation accordingly

---

**End of Document**

> Remember to update this file whenever important decisions are made or project direction changes.
