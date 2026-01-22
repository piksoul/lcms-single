---
description: Review code for WordPress standards and security
---

Perform a comprehensive code review of the LeanCMS Plugin.

Please review the following aspects:

1. **WordPress Coding Standards**
   - Check indentation and formatting
   - Verify naming conventions (functions, variables, constants)
   - Check for proper use of WordPress functions
   - Verify hooks and filters are properly used

2. **Security Review**
   - Check all user inputs are sanitized
   - Verify all outputs are escaped
   - Check nonce verification for forms
   - Verify capability checks before privileged operations
   - Look for SQL injection vulnerabilities (if any direct DB queries)
   - Check for XSS vulnerabilities

3. **Performance**
   - Check for inefficient database queries
   - Look for unnecessary function calls in loops
   - Verify proper use of caching where applicable

4. **Code Organization**
   - Check if code is well-organized and modular
   - Verify functions have single responsibilities
   - Check for code duplication

5. **Documentation**
   - Verify PHPDoc blocks for functions
   - Check inline comments for complex logic
   - Verify file headers are complete

6. **Best Practices**
   - Check for proper error handling
   - Verify translation functions are used correctly
   - Check for deprecated WordPress functions
   - Verify proper use of constants vs variables

Provide findings in these categories:
- 🔴 Critical Issues (must fix)
- 🟡 Warnings (should fix)
- 🟢 Suggestions (nice to have)
- ✅ Good Practices (doing well)
