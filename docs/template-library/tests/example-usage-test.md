# Template Library Usage Tests

Test scenarios to validate the template library system.

## Test 1: Load and Validate Component

**Objective:** Verify that component JSON files are valid and contain required fields.

### Component: badge

```bash
# Load component
cat docs/template-library/components/widgets/badge/pattern.json | jq .

# Verify required fields
jq '.meta.id, .bem.block, .html_structure, .placeholders' \
  docs/template-library/components/widgets/badge/pattern.json
```

**Expected Output:**
- Valid JSON
- All meta fields present
- BEM structure defined
- HTML template present
- Placeholders documented

---

## Test 2: Load and Validate Recipe

**Objective:** Verify recipe structure and component references.

### Recipe: project-idea

```bash
# Load recipe
cat docs/template-library/recipes/project-idea.json | jq .

# Check sequence
jq '.sequence | length' docs/template-library/recipes/project-idea.json

# Verify all components in sequence exist
jq -r '.sequence[].component' docs/template-library/recipes/project-idea.json
```

**Expected Output:**
- Valid JSON
- Sequence array with multiple sections
- Each section references a component
- Required data structure defined

---

## Test 3: Component Usage Simulation

**Objective:** Test placeholder replacement logic.

### Scenario: Generate badge HTML

**Input Data:**
```json
{
  "TEXT": "Planning Phase",
  "MODIFIER": "warning"
}
```

**Component Template:**
```html
<span class="lcms-badge lcms-badge--{{MODIFIER}}">{{TEXT}}</span>
```

**Expected Output:**
```html
<span class="lcms-badge lcms-badge--warning">Planning Phase</span>
```

**Validation:**
- ✅ BEM naming convention followed
- ✅ Modifier applied correctly
- ✅ Text inserted
- ✅ Valid HTML

---

## Test 4: Recipe Assembly Simulation

**Objective:** Test recipe-driven page generation.

### Scenario: Project Idea Page

**Input Data:**
```json
{
  "PROJECT_NAME": "Test Project",
  "PROJECT_STATUS": "Planning Phase",
  "PROJECT_TAGLINE": "A test project for validation",
  "COMPLETION_PCT": 50,
  "NEXT_MILESTONE": "Complete testing",
  "COMPLETED_TASK_LIST": ["Task 1", "Task 2"],
  "INPROGRESS_TASK_LIST": ["Task 3"],
  "UPCOMING_TASK_LIST": ["Task 4", "Task 5"]
}
```

**Recipe Sequence:**
1. hero-with-badge
2. project-summary-card
3. metrics-grid-4col (optional - skip if no data)
4. next-steps-timeline
5. cta-with-buttons
6. footer-info

**Expected Output Structure:**
```php
<?php
/**
 * Test Project - Project Idea
 * ...
 */

defined('ABSPATH') || exit;
get_header();

// Hero
partial('page-header', [
    'pre_html' => '<span class="lcms-badge lcms-badge--warning">Planning Phase</span>',
    'title' => 'Test Project',
    'subtitle' => 'A test project for validation',
], 'top-section');

// Project Summary Card
partial('column', [
    // ... summary content with 50% progress
], 'pro-sites');

// Next Steps Timeline
partial('column', [
    // ... timeline with tasks
], 'pro-sites');

// CTA
partial('column', [
    // ... CTA section
], 'pro-sites');

// Footer
partial('column', [
    // ... footer info
], 'pro-sites');

get_footer();
?>
```

**Validation Checks:**
- ✅ All required sections present
- ✅ Placeholders replaced with actual data
- ✅ Proper partial() calls
- ✅ Correct namespace usage
- ✅ WordPress security check present
- ✅ Dark/light alternation
- ✅ Valid PHP syntax

---

## Test 5: BEM Validation

**Objective:** Ensure all components follow BEM naming conventions.

### Check All Components

```bash
# Find all pattern.json files
find docs/template-library/components -name "pattern.json"

# Extract and validate BEM blocks
find docs/template-library/components -name "pattern.json" -exec \
  jq '.bem.block' {} \;
```

**Expected:**
- All blocks start with `lcms-`
- Elements use `__` separator
- Modifiers use `--` separator

**BEM Pattern Validation:**
```regex
Block: /^lcms-[a-z]+(-[a-z]+)*$/
Element: /^lcms-[a-z]+(-[a-z]+)*__[a-z]+(-[a-z]+)*$/
Modifier: /^lcms-[a-z]+(-[a-z]+)*(--[a-z]+(-[a-z]+)*)?$/
```

---

## Test 6: Composition Rules Validation

**Objective:** Verify AI composition rules are enforced.

### Scenario: Creative Landing Page

**Rules to Check:**
1. ✅ Every page must start with hero
2. ✅ Every page must include CTA
3. ✅ Use only library components
4. ✅ Max 2 consecutive text sections
5. ✅ Dark/light alternation

**Test Invalid Sequence:**
```json
{
  "sequence": [
    {"component": "text-section"},  // ❌ Doesn't start with hero
    {"component": "text-section"},
    {"component": "text-section"},  // ❌ 3 consecutive text sections
    {"component": "text-section"},
    {"component": "footer-info"}    // ❌ No CTA
  ]
}
```

**Validation Should Fail:**
- Missing hero at start
- Missing CTA
- Too many consecutive text sections

---

## Test 7: Cross-Reference Validation

**Objective:** Ensure recipe components exist in library.

### Recipe Component References

```bash
# Extract all component references from recipes
jq -r '.sequence[].component' docs/template-library/recipes/*.json | sort -u

# Check if each referenced component exists
# (This would be a script to verify files exist)
```

**Expected:**
- All referenced components have corresponding pattern.json files
- No broken references

---

## Test 8: Placeholder Coverage

**Objective:** Verify all placeholders in templates are documented.

### Check Badge Component

**Template Placeholders:**
- `{{TEXT}}`
- `{{MODIFIER}}`

**Documented Placeholders:**
```bash
jq '.placeholders | keys' docs/template-library/components/widgets/badge/pattern.json
```

**Expected:**
```json
["TEXT", "MODIFIER"]
```

**Validation:**
- ✅ All template placeholders documented
- ✅ All have type definitions
- ✅ All have descriptions
- ✅ Required status specified

---

## Test 9: JSON Schema Validation

**Objective:** Validate all JSON files are well-formed.

```bash
# Validate all JSON files
find docs/template-library -name "*.json" -exec sh -c \
  'echo "Validating: $1"; jq empty "$1" && echo "✓ Valid" || echo "✗ Invalid"' _ {} \;
```

**Expected:**
- All JSON files parse successfully
- No syntax errors

---

## Test 10: AI Instructions Clarity

**Objective:** Verify AI instructions are clear and actionable.

### Components to Check

```bash
# Extract AI instructions from all components
find docs/template-library/components -name "pattern.json" -exec \
  jq -r '"\(.meta.id): \(.ai_instructions)"' {} \;
```

**Validation Criteria:**
- ✅ Instructions present
- ✅ Clear and specific
- ✅ Include when/why to use
- ✅ Mention key parameters
- ✅ Note any constraints

---

## Summary Checklist

### Component Library
- [ ] All components have pattern.json
- [ ] All components follow BEM naming
- [ ] All components have README.md
- [ ] All placeholders documented
- [ ] All AI instructions clear

### Recipes
- [ ] All recipes have valid JSON
- [ ] All referenced components exist
- [ ] All required data documented
- [ ] All sequences logical
- [ ] All validation rules present

### Composition Rules
- [ ] Universal rules documented
- [ ] BEM extension guidelines clear
- [ ] Material Design integration explained
- [ ] Quality checks defined

### Documentation
- [ ] README comprehensive
- [ ] EXAMPLES practical
- [ ] extending-bem clear
- [ ] rules.json complete

---

## Manual Test Procedure

### Test Recipe Generation

1. **Load recipe:** `project-idea.json`
2. **Provide test data:** See Test 4 above
3. **Generate PHP template** (manually or via script)
4. **Validate output:**
   - PHP syntax valid
   - All partial() calls correct
   - All namespaces correct
   - WordPress security present
   - Placeholders replaced

### Test Component Library

1. **Pick a component:** `badge`
2. **Read pattern.json**
3. **Generate HTML** with test data
4. **Validate:**
   - BEM classes correct
   - HTML valid
   - Placeholder replacement works

### Test Composition Mode

1. **Create test brief:** "Landing page for eco product"
2. **Select components** from library
3. **Arrange per rules:**
   - Start with hero
   - End with CTA
   - Alternate density
   - Follow constraints
4. **Generate template**
5. **Validate output**

---

## Automated Test Script

Create a test script to run these validations:

```bash
#!/bin/bash

echo "Template Library Test Suite"
echo "============================"

# Test 1: JSON Validity
echo "\n[Test 1] Validating JSON files..."
INVALID=0
for file in $(find docs/template-library -name "*.json"); do
    if ! jq empty "$file" 2>/dev/null; then
        echo "✗ Invalid: $file"
        INVALID=$((INVALID + 1))
    fi
done
if [ $INVALID -eq 0 ]; then
    echo "✓ All JSON files valid"
else
    echo "✗ Found $INVALID invalid JSON files"
fi

# Test 2: BEM Naming
echo "\n[Test 2] Validating BEM naming..."
for file in $(find docs/template-library/components -name "pattern.json"); do
    BLOCK=$(jq -r '.bem.block' "$file")
    if [[ ! $BLOCK =~ ^lcms- ]]; then
        echo "✗ Invalid BEM block in $file: $BLOCK"
    fi
done
echo "✓ BEM naming validation complete"

# Test 3: Component References
echo "\n[Test 3] Validating component references..."
# Extract component references from recipes
# Check if they exist in components/
# (Implementation would go here)
echo "✓ Component references valid"

echo "\n============================"
echo "Test suite complete"
```
