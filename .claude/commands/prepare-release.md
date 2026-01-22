---
description: Prepare a new plugin release with version updates
---

Help me prepare a new release for the LeanCMS Plugin.

Please perform the following tasks:

1. **Check Current Version**
   - Read the current version from leancms-plugin.php (header and constant)
   - Read the current version from readme.txt (stable tag)
   - Verify all versions match

2. **Ask for New Version**
   - Ask me what the new version number should be
   - Validate it follows semantic versioning (Major.Minor.Patch)

3. **Update Version Numbers**
   - Update plugin header in leancms-plugin.php (line ~6)
   - Update LEANCMS_VERSION constant in leancms-plugin.php (line ~26)
   - Update stable tag in readme.txt (line ~9)

4. **Update Changelog**
   - Ask me for changelog entries
   - Add new version section to readme.txt changelog
   - Update README.md changelog if needed

5. **Update Directives**
   - Update docs/start-here.md with new version
   - Update "Last Updated" date

6. **Verify Updates**
   - Show me a summary of all changes
   - Confirm all version numbers are consistent

7. **Commit Changes**
   - Create a commit with message: "Prepare release vX.X.X"
   - Ask if I want to push changes

DO NOT create Git tags or GitHub releases - I'll handle that separately.
