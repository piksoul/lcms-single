# Claude Code Configuration

This directory contains Claude Code configuration for the LeanCMS Plugin project.

## Structure

```
.claude/
├── commands/           # Slash commands for common tasks
├── prompts/           # Custom prompts (optional)
├── settings.json      # Project settings and preferences
└── README.md          # This file
```

## Available Slash Commands

### `/prepare-release`
Prepare a new plugin release by updating version numbers across all files, updating changelogs, and preparing for Git tag creation.

**Use when:** You're ready to release a new version of the plugin.

### `/check-versions`
Check version consistency across all plugin files (main plugin file, readme.txt, directives, etc.).

**Use when:** You want to verify all version numbers match before a release or after making changes.

### `/update-directives`
Update the project directives document (docs/start-here.md) with new decisions, features, or configuration changes.

**Use when:** You've made important project decisions or want to update project documentation.

### `/test-plugin`
Run comprehensive validation and testing checks including file structure, PHP syntax, WordPress standards, and security.

**Use when:** Before committing major changes or preparing for a release.

### `/new-feature`
Plan and implement a new plugin feature following WordPress best practices with guided workflow from planning to implementation.

**Use when:** You want to add new functionality to the plugin.

### `/review-code`
Perform a comprehensive code review covering WordPress coding standards, security, performance, and best practices.

**Use when:** You want a thorough review of the plugin code quality and security.

## Settings

The `settings.json` file contains project-specific configuration:

- **Project metadata**: Name, type, description
- **Important paths**: Main plugin file, documentation locations
- **Coding standards**: PHP and WordPress version requirements
- **Version control**: Branch names, commit message templates
- **Workflows**: Checklists for common tasks
- **Preferences**: Project preferences and requirements

## Customization

### Adding New Commands

Create a new `.md` file in `.claude/commands/`:

```markdown
---
description: Brief description of what this command does
---

Detailed instructions for Claude to follow when this command is executed.

Include:
1. Step-by-step tasks
2. What to check or validate
3. What to ask the user
4. What to output or create
```

### Modifying Settings

Edit `settings.json` to update project configuration, paths, or preferences.

### Custom Prompts

Add reusable prompts to `.claude/prompts/` for specific coding patterns or templates.

## Best Practices

1. **Use slash commands** for repetitive tasks to ensure consistency
2. **Update directives** regularly to maintain project documentation
3. **Check versions** before every release
4. **Run tests** before committing major changes
5. **Review code** periodically to maintain quality

## Workflow Examples

### Releasing a New Version
```
/check-versions
/prepare-release
# Make any final adjustments
/test-plugin
# Create Git tag and GitHub release manually
```

### Adding a Feature
```
/new-feature
# Follow the guided workflow
/test-plugin
/update-directives
# Commit and push
```

### Routine Maintenance
```
/check-versions
/review-code
/test-plugin
# Fix any issues found
```

## Tips

- Slash commands are context-aware and understand the project structure
- Commands will ask for clarification when needed
- You can interrupt or modify command execution at any time
- Commands follow the coding standards and preferences in settings.json

## Support

For issues with Claude Code or these commands, refer to:
- Claude Code Documentation: https://docs.claude.com/claude-code
- Project Directives: docs/start-here.md
