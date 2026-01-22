# Brand Hub - Client CMS

An agentic CMS for Brand Hub client development and content management. Built on WordPress with AI-assisted workflows, automatic updates, and custom page rendering capabilities.

## What is This?

**Brand Hub - Client CMS** is a purpose-built WordPress plugin that combines:

- **Agentic Development Workflow** - AI-assisted development with Claude Code integration
- **Brand Hub Focus** - Dedicated CMS for Brand Hub client content management
- **Plugin Update Checker** - Automatic updates from GitHub
- **Custom Page Rendering** - Flexible template system for custom page layouts
- **Code Pattern Library** - 13 reusable patterns for consistent WordPress development
- **Best Practices** - WordPress coding standards, security, and modern PHP

## Key Features

### Visual Layout Builder (New in v2.1)
- **Visual Mode** - Drag-drop partial ordering without writing code
- **Code Mode** - Full PHP layout control for advanced users
- **Partial Registry** - Auto-discovered partials with folder organization
- **Pro-Sites System** - Grid, column, and 2-column layouts with nested content types
- **Config-Driven** - Page data stored in structured PHP arrays

### Agentic CMS Workflow
- **Claude Code Integration** - Built-in slash commands for common development tasks
- **Code Patterns** - Reusable templates for CPT, Commerce, Meta, Options, Notifications, and more
- **Guided Workflows** - From feature planning to release preparation
- **Project Directives** - Comprehensive documentation in `docs/START-HERE.md`

### Plugin Update System
- **Automatic Updates** - One-click updates from GitHub releases
- **Private Repository Support** - Token-based authentication for private repos
- **Multiple Update Methods** - GitHub Releases, Git Tags, or custom update servers
- **WordPress.org Compatible** - Easy migration path to official repository

### Custom Page Rendering
- **WP-Native Integration** - Uses standard WordPress pages (keeps SEO, search, menus)
- **File-Based Templates** - Slug-based and ID-based template resolution
- **Content Controller** - `includes/content/class-page-renderer.php` centralizes template registration and fallback logic
- **Module System** - Reusable components for modular page building
- **Theme Override Support** - Follows WordPress template hierarchy

### Lifecycle & Settings Management
- **Installer Class** - `includes/class-installer.php` owns activation, deactivation, and uninstall routines with option seeding
- **Helpers Utility Layer** - `includes/utilities/class-helpers.php` provides reusable accessors for plugin settings and version data
- **Settings API Wrapper** - `includes/settings/class-settings-page.php` registers the LeanCMS admin page, sanitizes input, and renders UI via the WordPress Settings API
- **Uninstall Script** - `uninstall.php` ensures data cleanup aligns with WordPress best practices

### Development Tools
- **13 Code Patterns** - Scaffolding for common WordPress features
- **Slash Commands** - `/prepare-release`, `/test-plugin`, `/review-code`, and more
- **Version Management** - Automated version checking and updating
- **Security First** - Built-in sanitization and escaping patterns

## Quick Start

### Installation

1. Clone this repository to your WordPress plugins directory:
   ```bash
   cd wp-content/plugins/
   git clone https://github.com/piksoul/lcms-brandhub-client.git
   ```

2. Activate the plugin through WordPress Admin → Plugins

3. Access the admin page at **LeanCMS** in the WordPress admin menu

### Purpose

This plugin is configured specifically for Brand Hub client development:

1. **AI-Assisted Workflows** - Claude Code integration for rapid development
2. **Content Management** - Custom page rendering for Brand Hub content
3. **Automatic Updates** - GitHub-based update system
4. **Pattern Library** - Consistent development patterns and best practices

## Agentic Development with Claude Code

### Available Slash Commands

Use these commands in Claude Code to streamline development:

- `/prepare-release` - Update versions, changelogs, and prepare for release
- `/check-versions` - Verify version consistency across all files
- `/test-plugin` - Run validation and testing checks
- `/review-code` - Comprehensive code review for standards and security
- `/new-feature` - Guided workflow for implementing new features
- `/use-pattern` - Generate code from patterns (CPT, Commerce, etc.)
- `/update-directives` - Update project documentation

### Code Pattern Library

Located in `.claude/prompts/`, these patterns provide boilerplate code for:

- **pattern-cpt** - Custom Post Types
- **pattern-commerce** - E-commerce functionality
- **pattern-content** - Content management
- **pattern-meta** - Custom meta boxes
- **pattern-options** - Settings and options pages
- **pattern-admin** - Admin functionality
- **pattern-notifications** - User notifications
- **pattern-portal** - User portals
- **pattern-utilities** - Helper functions
- **pattern-installer** - Installation/activation logic
- **pattern-data-object** - Data object patterns
- **pattern-admin-notices** - Admin notices

## Custom Page Rendering System

### How It Works

1. **Create a Page** in WordPress Admin
2. **Select Template** - Choose "LeanCMS Full Page" from the Template dropdown
3. **Create Template File** in `templates/pages/`:
   - Slug-based: `slug-{post-name}.php` (preferred)
   - ID-based: `id-{ID}.php` (fallback)
4. **View Page** - Your custom template renders automatically

### Template Resolution

The plugin looks for templates in this order:
1. `templates/pages/slug-{post-name}.php`
2. `templates/pages/id-{ID}.php`
3. Fallback message (if no template found)

### Password Protection Support

The plugin includes built-in support for WordPress password-protected pages with two options:

#### Option 1: Generic Password Form (Default)

When you password protect a page in WordPress, the plugin automatically displays a clean, modern password form. No additional configuration needed!

1. **Edit Page** in WordPress Admin
2. **Set Visibility** → Password Protected
3. **Enter Password**
4. **View Page** - Generic form appears automatically

The default form includes:
- Clean, modern styling matching the plugin aesthetic
- Mobile-responsive design
- Customizable via WordPress filters

#### Option 2: Custom Branded Form (Optional)

For custom branding, teaser content, or marketing copy, create a `-noaccess` template variant:

**Template Naming:**
- Slug-based: `slug-{post-name}-noaccess.php`
- ID-based: `id-{ID}-noaccess.php`

**Example:** For a page with slug `brand-guide`:
1. Create `templates/pages/slug-brand-guide-noaccess.php`
2. Add custom branding, teaser content, and password form
3. The plugin automatically uses your custom template

**Custom Template Benefits:**
- Match password form to page branding
- Show teaser content about what's inside
- Add marketing copy to encourage access
- Full control over design and messaging

**Fallback Behavior:** If no `-noaccess` template exists, the plugin displays the generic form automatically. This ensures pages are always protected even without custom templates.

#### Customizing the Generic Form

You can customize the default password form using WordPress filters:

```php
// Custom title
add_filter('leancms_password_form_title', function($title, $page_id) {
    return 'Partner Access Required';
}, 10, 2);

// Custom message
add_filter('leancms_password_form_message', function($message, $page_id) {
    return 'This content is available to authorized partners only.';
}, 10, 2);
```

### Example Template

```php
<?php
/**
 * Page Template: About Us
 * Slug: about-us
 */
?>
<div class="leanos-page">
    <h1><?php echo esc_html(get_the_title()); ?></h1>
    <div class="content">
        <!-- Your custom HTML/PHP here -->
    </div>
</div>
```

## Plugin Update System

### Configuration

The plugin checks for updates from GitHub. Configuration is in `leancms.php`:

```php
$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/piksoul/lcms-brandhub-client/',
    __FILE__,
    'brandhub-client-cms'
);
$myUpdateChecker->setBranch('master');
```

### Update Methods

#### 1. GitHub Releases (Recommended)
1. Update version in plugin file and `CHANGELOG.md`
2. Commit changes
3. Create GitHub Release with version tag (e.g., `v1.0.4`)
4. WordPress will notify users of the update

#### 2. Git Tags
```bash
git tag v1.0.4
git push origin master
git push origin v1.0.4
```

#### 3. Custom Update Server
1. Copy `update-info.json.example` to your server
2. Update JSON with plugin information
3. Change update checker URL to your JSON endpoint

### Private Repository Support

For private GitHub repositories:

1. **Generate GitHub Token** at https://github.com/settings/tokens
   - Select `repo` scope
   - Copy the token (starts with `ghp_`)

2. **Add to wp-config.php**:
   ```php
   define('LEANCMS_GITHUB_TOKEN', 'ghp_your-token-here');
   ```

The plugin automatically uses this token for authentication.

See `docs/CONFIG-EXAMPLE.md` for detailed setup instructions.

## File Structure

```
lcms-brandhub-client/
├── .claude/                      # Claude Code configuration
│   ├── commands/                 # Slash commands
│   ├── prompts/                  # Code patterns
│   ├── settings.json             # Project settings
│   └── README.md                 # Claude Code documentation
├── docs/
│   ├── START-HERE.md             # Project directives
│   ├── CURRENT-CONTEXT.md        # Publishing workflow context
│   ├── CONFIG-EXAMPLE.md         # Configuration guide
│   ├── examples/                 # Sample theme and layout files
│   │   └── theme-files/
│   │       └── page-templates/
│   │           └── leancms-full-page.php
│   └── patterns/README.md        # Pattern documentation
├── templates/
│   ├── pages/                    # Page templates (slug-*, id-*)
│   └── modules/                  # Reusable components
├── plugin-update-checker/        # Update checker library
├── leancms.php                   # Main plugin file
├── CHANGELOG.md                  # Version history
└── README.md                     # This file
```

## Requirements

- **WordPress:** 6.8 or higher
- **PHP:** 8.0 or higher
- **Plugin Update Checker:** v5.6 (included)

## Development Guidelines

### Coding Standards
- Follow WordPress Coding Standards
- Use proper sanitization and escaping
- Document all functions and hooks
- Maintain backward compatibility

### Version Control
- **Main Branch:** `master` (production-ready)
- **Feature Branches:** `feature/descriptive-name`
- **Bug Fixes:** `fix/descriptive-name`

### Release Process

Use the `/prepare-release` slash command or:

1. Update version numbers in:
   - `leancms.php` (header and constant)
   - `CHANGELOG.md`
   - `docs/START-HERE.md`
2. Commit changes
3. Create GitHub Release with version tag
4. Users receive automatic update notification

## Use Cases

This plugin is configured for:

- **Brand Hub Client Development** - Dedicated CMS for Brand Hub content
- **AI-Assisted Workflows** - Claude Code integration for rapid development
- **Custom Content Management** - Flexible page rendering and template system
- **GitHub-Based Updates** - Automatic plugin updates from repository
- **Pattern-Based Development** - Consistent code patterns and best practices

## FAQ

### How do updates work?

This plugin uses the Plugin Update Checker library to check for updates from GitHub or a custom server. When a new version is released, WordPress displays an update notification just like plugins from WordPress.org. Users can install updates with one click.

### Can I use this with a private repository?

Yes! You can use this with private GitHub repositories by adding a GitHub Personal Access Token to your `wp-config.php` file. See the [Private Repository Support](#private-repository-support) section for setup instructions.

### How is this configured for Brand Hub?

This plugin is pre-configured for Brand Hub client development with:

1. Updated branding and naming conventions
2. Repository pointing to `piksoul/lcms-brandhub-client`
3. Text domain set to `brandhub-client-cms`
4. Claude Code integration for AI-assisted workflows
5. Ready-to-use code patterns and slash commands

### What are the code patterns?

Code patterns are reusable templates for common WordPress functionality (CPT, meta boxes, admin pages, etc.). Use the `/use-pattern` slash command in Claude Code to generate boilerplate code following WordPress best practices.

### Do I need to use Claude Code?

No, Claude Code integration is optional. The plugin works perfectly without it. However, Claude Code enhances development with AI-assisted workflows, slash commands, and guided feature implementation.

## Documentation

**Getting Started:**
- **[Documentation Index](docs/README.md)** - Complete documentation overview
- **[START-HERE.md](docs/START-HERE.md)** - New developer onboarding
- **[Project Structure](docs/project-structure.md)** - Architecture overview

**Building Pages:**
- **[Pro-Sites Partials](docs/partials/pro-sites.md)** - Comprehensive partial system guide
- **[Quick Reference](docs/partials/quick-reference.md)** - Copy-paste examples & cheat sheet

**Design System:**
- **[BEM Guide](docs/bem-guide.md)** - BEM component reference
- **[BEM Migration](docs/bem-migration.md)** - Migration from legacy classes

**Additional Resources:**
- **[CONFIG-EXAMPLE.md](docs/CONFIG-EXAMPLE.md)** - Configuration examples
- **[CHANGELOG.md](CHANGELOG.md)** - Version history
- **[.claude/README.md](.claude/README.md)** - Claude Code setup

## Development Roadmap

### Recently Completed (v2.1.30)
- [x] Visual Layout Builder - Phase 3 complete
- [x] Drag-drop partial reordering
- [x] Config key and wrapper class editing
- [x] Simplified partial naming (removed `-section` suffix convention)
- [x] Excluded `_lib` folders from partial registry
- [x] Pro-sites partial system with nested content types

### Priority Todo
1. **UI Enhancements** (Next)
   - Edit partial/folder inline (avoid delete/recreate)
   - Duplicate block button
   - Collapse/expand blocks

2. **Partial Registry Caching**
   - Cache discovered partials in transient
   - Auto-invalidate on version bump

3. **Partial/Folder Dropdowns**
   - Autocomplete from registry
   - Reduce typos, show available options

4. **Per-Partial Config Override**
   - Inline config that merges with config key reference
   - Small tweaks without new Page Data entries

5. **Architectural Decisions**
   - Visual editing of nested content
   - Config structure validation/preview

### Features Under Consideration
- **JSON Storage for Page Data** - Replace PHP serialize with JSON to handle unicode/emoji safely
- **Config Transformer** - Convert between array formats (short/long syntax, JSON, YAML)
- **Code Preview in Visual Mode** - Show generated PHP code read-only
- **Visual Config Builder** - GUI for editing nested content structures

## Support & Contributing

- **Repository:** https://github.com/piksoul/lcms-brandhub-client
- **Issues:** https://github.com/piksoul/lcms-brandhub-client/issues
- **Author:** Piksoul
- **Support:** https://piksoul.com/support

## License

GPL v2 or later - See [LICENSE](https://www.gnu.org/licenses/gpl-2.0.html)

## Credits

- **Plugin Update Checker** by [Yahnis Elsts](https://github.com/YahnisElsts/plugin-update-checker)
- **Claude Code** by [Anthropic](https://www.anthropic.com)

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for detailed version history.

---

**Ready to build?** Start developing Brand Hub content with AI-assisted workflows!
