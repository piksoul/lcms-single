---
description: Run plugin validation and testing checks
---

Run validation and testing checks on the LeanCMS Plugin.

Please perform the following checks:

1. **File Structure Validation**
   - Verify all required files exist
   - Check that plugin-update-checker directory is present
   - Verify docs/start-here.md exists

2. **PHP Syntax Check**
   - Run PHP syntax check on leancms-plugin.php
   - Report any syntax errors

3. **WordPress Standards Check**
   - Check plugin headers are properly formatted
   - Verify text domain matches plugin slug
   - Check for proper escaping in output functions

4. **Version Consistency**
   - Run the version consistency check (same as /check-versions)

5. **Update Checker Configuration**
   - Verify Plugin Update Checker is properly configured
   - Check GitHub URL is correct
   - Verify branch is set to 'master'

6. **Security Check**
   - Check for any hardcoded credentials or tokens
   - Verify proper capability checks in admin functions
   - Check for proper nonce verification (if applicable)

7. **Documentation Check**
   - Verify README.md is up to date
   - Check readme.txt follows WordPress.org format
   - Verify changelog is current

Provide a summary report with:
- ✅ Passed checks
- ⚠️ Warnings
- ❌ Failed checks
- 📝 Recommendations
