---
description: Check version consistency across all plugin files
---

Check that version numbers are consistent across all plugin files.

Please check the following files and report any discrepancies:

1. **leancms-plugin.php**
   - Plugin header "Version:" (around line 6)
   - LEANCMS_VERSION constant (around line 26)

2. **readme.txt**
   - Stable tag (around line 9)
   - Latest changelog version

3. **docs/start-here.md**
   - Project Version in Overview section

4. **update-info.json** (if it exists)
   - Version field

Show me:
- Current version from each location
- Whether all versions match
- If there are discrepancies, list them clearly
- The "Tested up to" WordPress version

Format the output as a clear table or list.
