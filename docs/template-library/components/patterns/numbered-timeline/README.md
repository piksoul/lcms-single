# Numbered Timeline Pattern

## Overview

Sequential numbered steps for processes, how-it-works sections, and implementation timelines. Two variants available: horizontal (grid-based) and vertical (with connector lines).

**Tier:** 2 (Guided Pattern)
**Added:** 2025-11-18
**Discovered in:** slug-packaging-campaign.php

## When to Use

✅ **Use this pattern for:**
- How It Works sections
- Process flows (4-step implementation)
- Getting Started guides
- Sequential feature rollouts
- Onboarding workflows
- Implementation timelines

❌ **Don't use for:**
- Non-sequential information (use card grid instead)
- More than 6 steps (too overwhelming)
- Complex branching workflows (use flowchart)

## Variants

### Horizontal (Grid-Based)

**Best for:** Desktop-first layouts, equal-weight steps, visual parity

**Layout:** 2-4 column grid with centered content

**Example from Packaging Campaign:**
```
[  1  ]    [  2  ]    [  3  ]    [  4  ]
Consult    Design     Testing    Implement
```

### Vertical (With Connectors)

**Best for:** Mobile-first, detailed steps, storytelling flow

**Layout:** Stacked with connector lines between steps

**Example:**
```
●—— 1. Consultation
│   Detailed description...
│
●—— 2. Design
│   Detailed description...
│
●—— 3. Testing
    Detailed description...
```

## Implementation

### Horizontal Variant

```php
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'How It Works',
            'subtitle' => 'Your journey to sustainable packaging',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-container lcms-container--medium">
                <div class="grid-4col">
                    <div class="lcms-stack gap-8 text-center">
                        <div class="lcms-step-number">1</div>
                        <h4>Consultation</h4>
                        <p>We analyze your current packaging and identify sustainability opportunities.</p>
                    </div>
                    <div class="lcms-stack gap-8 text-center">
                        <div class="lcms-step-number">2</div>
                        <h4>Design</h4>
                        <p>Our team creates custom sustainable solutions tailored to your products.</p>
                    </div>
                    <div class="lcms-stack gap-8 text-center">
                        <div class="lcms-step-number">3</div>
                        <h4>Testing</h4>
                        <p>Rigorous quality and sustainability testing ensures optimal performance.</p>
                    </div>
                    <div class="lcms-stack gap-8 text-center">
                        <div class="lcms-step-number">4</div>
                        <h4>Implementation</h4>
                        <p>Seamless transition to sustainable packaging with full support.</p>
                    </div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');
```

### Vertical Variant (With Connectors)

```php
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Implementation Process',
            'subtitle' => 'Step-by-step journey',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-container lcms-container--thin">
                <div class="lcms-timeline-vertical">
                    <div class="lcms-timeline-step">
                        <div class="lcms-timeline-step__marker">
                            <div class="lcms-step-number lcms-step-number--circle">1</div>
                        </div>
                        <div class="lcms-timeline-step__content">
                            <h4>Initial Consultation</h4>
                            <p>Schedule a call with our team to discuss your requirements, timeline, and goals. We\'ll assess your current situation and identify opportunities.</p>
                            <ul class="lcms-list lcms-list--check">
                                <li class="lcms-list__item">Requirements gathering</li>
                                <li class="lcms-list__item">Opportunity analysis</li>
                                <li class="lcms-list__item">Timeline planning</li>
                            </ul>
                        </div>
                    </div>
                    <div class="lcms-timeline-step">
                        <div class="lcms-timeline-step__marker">
                            <div class="lcms-step-number lcms-step-number--circle">2</div>
                        </div>
                        <div class="lcms-timeline-step__content">
                            <h4>Custom Design Phase</h4>
                            <p>Our expert team creates tailored solutions that meet your specific needs while maintaining sustainability standards.</p>
                        </div>
                    </div>
                    <div class="lcms-timeline-step">
                        <div class="lcms-timeline-step__marker">
                            <div class="lcms-step-number lcms-step-number--circle">3</div>
                        </div>
                        <div class="lcms-timeline-step__content">
                            <h4>Quality Testing</h4>
                            <p>Comprehensive testing ensures your solution meets performance and sustainability requirements.</p>
                        </div>
                    </div>
                    <div class="lcms-timeline-step lcms-timeline-step--last">
                        <div class="lcms-timeline-step__marker">
                            <div class="lcms-step-number lcms-step-number--circle">4</div>
                        </div>
                        <div class="lcms-timeline-step__content">
                            <h4>Full Implementation</h4>
                            <p>Seamless rollout with ongoing support to ensure successful adoption.</p>
                        </div>
                    </div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');
```

## BEM Components

### Required Components

**Step Number:**
- `.lcms-step-number` - Base numbered indicator (48px, bold)
- `.lcms-step-number--circle` - Outlined circle variant
- `.lcms-step-number--filled` - Solid filled variant
- `.lcms-step-number--small` - Smaller size (32px)
- `.lcms-step-number--large` - Larger size (64px)

**Layout:**
- `.grid-4col`, `.grid-3col`, `.grid-2col` - Grid utilities (horizontal)
- `.lcms-stack` - Vertical stacking (both variants)
- `.text-center` - Center alignment (horizontal)

**Vertical Timeline (Additional):**
- `.lcms-timeline-vertical` - Container with connector styling
- `.lcms-timeline-step` - Individual step wrapper
- `.lcms-timeline-step__marker` - Number circle container
- `.lcms-timeline-step__content` - Content area
- `.lcms-timeline-step--last` - Last step modifier (no connector line)

## CSS for Vertical Variant

The vertical variant requires custom CSS for connector lines:

```css
.lcms-timeline-vertical {
    position: relative;
}

.lcms-timeline-step {
    display: grid;
    grid-template-columns: 100px 1fr;
    gap: 32px;
    position: relative;
    padding-bottom: 48px;
}

.lcms-timeline-step:not(.lcms-timeline-step--last)::before {
    content: "";
    position: absolute;
    left: 50px;
    top: 80px;
    bottom: -48px;
    width: 2px;
    background: var(--color-border, #e0e0e0);
}

.lcms-timeline-step__marker {
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

.lcms-timeline-step__content {
    padding-top: 12px;
}

@media (max-width: 768px) {
    .lcms-timeline-step {
        grid-template-columns: 60px 1fr;
        gap: 20px;
    }

    .lcms-timeline-step:not(.lcms-timeline-step--last)::before {
        left: 30px;
    }
}
```

**Note:** This CSS should be added to a page-specific stylesheet or inline for now. May be promoted to design system if widely adopted.

## Usage Guidelines

### Step Count
- **Optimal:** 3-5 steps
- **Minimum:** 2 steps
- **Maximum:** 6 steps (beyond this becomes overwhelming)

### Content Length
- **Title:** Keep under 7 words for scanability
- **Description:** 1-2 sentences maximum
- **Sub-items:** Optional bullet list (3-4 items max)

### Choosing a Variant

**Use Horizontal when:**
- Steps are equal in importance/length
- Desktop experience is primary
- Visual parity desired (all steps same size)
- Space is limited (more compact)

**Use Vertical when:**
- Steps have varying detail levels
- Mobile experience is primary
- Storytelling or progressive disclosure needed
- Sub-steps or additional details required

## Style Variations

### Number Styles

**Simple (default):**
```html
<div class="lcms-step-number">1</div>
```
Clean, minimal - best for modern designs

**Circle (outlined):**
```html
<div class="lcms-step-number lcms-step-number--circle">1</div>
```
More visual weight - good for vertical timelines

**Filled (solid):**
```html
<div class="lcms-step-number lcms-step-number--filled lcms-step-number--accent">1</div>
```
Maximum contrast - use sparingly for emphasis

### Grid Columns

**4-column (desktop):**
```html
<div class="grid-4col">
```
Best for 4 equal steps, stacks to 2-col on tablet, 1-col on mobile

**3-column:**
```html
<div class="grid-3col">
```
Good for 3 or 6 steps (2 rows)

**2-column:**
```html
<div class="grid-2col">
```
Better for mobile, works for 2 or 4 steps

## Real-World Example

**From Packaging Campaign (lines 200-238):**

4-step horizontal timeline for implementation process:
1. Consultation → 2. Design → 3. Testing → 4. Implementation

**Quality:** Worked perfectly in production with 94% quality score

**User feedback:** Clear, scannable, professional presentation

## Best Practices

✅ **Do:**
- Use action-oriented step titles ("Schedule", "Design", "Test", "Launch")
- Keep descriptions concise and benefit-focused
- Maintain consistent content length across steps
- Use `lcms-container--medium` or `--thin` to prevent too-wide layouts
- Center-align horizontal variant for visual balance

❌ **Don't:**
- Mix horizontal and vertical variants on same page
- Use more than 6 steps (split into phases if needed)
- Include heavy imagery in step content (keep it text-focused)
- Forget text-center class on horizontal steps
- Use different number styles within same timeline

## Accessibility

- ✅ Semantic HTML (proper heading hierarchy)
- ✅ Numbered indicators for screen readers
- ✅ Sufficient color contrast for numbers
- ✅ Logical tab order (reads top-to-bottom, left-to-right)
- ✅ Mobile-responsive (stacks appropriately)

## Related Patterns

- **next-steps-timeline** - 3-phase timeline with icons (⚡ Immediate, 🎯 Short-Term, 🚀 Long-Term)
- **feature-showcase** - Image-text alternating (different use case)
- **metrics-grid-4col** - Numerical stats display (not sequential)

## Version History

- **1.0** (2025-11-18) - Initial pattern, horizontal variant documented from packaging campaign
- **1.0** (2025-11-18) - Added vertical variant with connector lines
