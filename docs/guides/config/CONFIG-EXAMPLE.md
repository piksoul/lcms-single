<?php
/**
 * LeanCMS Plugin - Configuration Example
 *
 * INSTRUCTIONS:
 * 1. Copy this file and save it somewhere OUTSIDE your plugin directory
 * 2. Add your GitHub token to this code
 * 3. Add this code to your wp-config.php file (before "That's all, stop editing!")
 *
 * SECURITY WARNING:
 * - NEVER commit wp-config.php to version control
 * - NEVER commit files containing your actual token
 * - This file is just an example - do not use it directly
 */

// GitHub Personal Access Token for Plugin Update Checker
// Replace 'your-github-token-here' with your actual token
define( 'LEANCMS_GITHUB_TOKEN', 'your-github-token-here' );

/*
 * Example token format: ghp_1234567890abcdefghijklmnopqrstuvwxyz
 *
 * To create a token:
 * 1. Go to https://github.com/settings/tokens
 * 2. Click "Generate new token (classic)"
 * 3. Select the 'repo' scope
 * 4. Copy the generated token
 * 5. Paste it above (replacing 'your-github-token-here')
 * 6. Add this define() to your wp-config.php
 */
