# Feature Showcase Pattern

## Overview

The **Feature Showcase** pattern creates visually engaging alternating image-text layouts for demonstrating product features, service capabilities, or platform functionality. This pattern was discovered during image-rich landing page testing and promoted from Tier 3 (ad-hoc) to Tier 2 (formal pattern).

## Visual Structure

```
┌─────────────────────────────────────────────────────────┐
│  Feature Showcase Block (lcms-feature-block)            │
│  ┌───────────────────────────────────────────────────┐  │
│  │  Grid 2-Column (grid-2col, centered, 60px gap)   │  │
│  │  ┌──────────────────┐  ┌──────────────────────┐  │  │
│  │  │  Image Side      │  │  Content Side        │  │  │
│  │  │  ┌────────────┐  │  │  • Feature Title     │  │  │
│  │  │  │   Figure   │  │  │  • Description       │  │  │
│  │  │  │  w/ Image  │  │  │  • Benefit List ✓    │  │  │
│  │  │  │  & Caption │  │  │    - Point 1         │  │  │
│  │  │  └────────────┘  │  │    - Point 2         │  │  │
│  │  │                  │  │    - Point 3         │  │  │
│  │  └──────────────────┘  └──────────────────────┘  │  │
│  └───────────────────────────────────────────────────┘  │
└─────────────────────────────────────────────────────────┘
```

## When to Use

**Ideal for:**
- Product feature demonstrations (3-5 key features)
- Service capability highlights
- Platform functionality walkthroughs
- Visual storytelling with supporting text
- Before/after showcases

**Not ideal for:**
- Single feature highlights (use simpler image-text section)
- Text-heavy content (use content sections)
- Gallery displays (use grid pattern)

## Variants

### Image Left (Default)
Image appears on the left, content on the right. Best for first feature or when following dark section.

### Image Right (Reversed)
Content appears on the left, image on the right. Use for visual alternation.

## Usage Pattern

### Recommended: Alternating Layout

```
Section 1: [Image LEFT]  [Content RIGHT]  (light background)
Section 2: [Content LEFT] [Image RIGHT]   (dark background)
Section 3: [Image LEFT]  [Content RIGHT]  (light background)
```

This creates visual rhythm and guides the user's eye down the page naturally.

## Example: Real Implementation

From `templates/pages/brhu/slug-landing-page-03.php`:

```php
// Feature 1: Image Left, Light Background
partial('column', [
    'settings' => [
        'dark_mode' => false,
        'custom_classes' => 'lcms-feature-block'
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-2col lcms-grid--align-center" style="gap: 60px;">
                <figure class="lcms-figure">
                    <img src="https://static.brand-hub.com.au/client/placeholder1.jpg"
                         alt="Centralized dashboard interface"
                         class="lcms-image lcms-image--responsive lcms-image--rounded"
                         loading="lazy" width="600" height="400" />
                    <figcaption class="lcms-figure__caption">
                        Centralized brand management dashboard
                    </figcaption>
                </figure>
                <div class="lcms-stack gap-16">
                    <h3>Centralized Brand Control</h3>
                    <p class="lcms-text--large">
                        Manage all your brand assets, guidelines, and templates
                        from a single, intuitive dashboard.
                    </p>
                    <ul class="lcms-list lcms-list--check">
                        <li class="lcms-list__item">Single source of truth for brand assets</li>
                        <li class="lcms-list__item">Real-time updates across all sites</li>
                        <li class="lcms-list__item">Role-based access control</li>
                    </ul>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// Feature 2: Image Right, Dark Background
partial('column', [
    'settings' => [
        'dark_mode' => true,
        'custom_classes' => 'lcms-feature-block'
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-2col lcms-grid--align-center" style="gap: 60px;">
                <div class="lcms-stack gap-16">
                    <h3>Automated Synchronization</h3>
                    <p class="lcms-text--large">
                        Changes propagate automatically to all connected sites
                        and applications.
                    </p>
                    <ul class="lcms-list lcms-list--check">
                        <li class="lcms-list__item">Push updates to all sites instantly</li>
                        <li class="lcms-list__item">Version control and rollback</li>
                        <li class="lcms-list__item">Audit trail for all changes</li>
                    </ul>
                </div>
                <figure class="lcms-figure">
                    <img src="https://static.brand-hub.com.au/client/placeholder2.jpg"
                         alt="Automated synchronization workflow"
                         class="lcms-image lcms-image--responsive lcms-image--rounded"
                         loading="lazy" width="600" height="400" />
                    <figcaption class="lcms-figure__caption">
                        Automated sync across your network
                    </figcaption>
                </figure>
            </div>
        ',
    ],
], 'pro-sites');
```

## Component Breakdown

### Required BEM Classes

**Image Side:**
- `.lcms-figure` - Semantic wrapper for image + caption
- `.lcms-image--responsive` - Full-width responsive image
- `.lcms-image--rounded` - Rounded corners with overflow hidden
- `.lcms-figure__caption` - Caption text (optional)

**Content Side:**
- `.lcms-stack` - Vertical content flow
- `.gap-16` - 16px spacing between stack items
- `.lcms-text--large` - Emphasized description text
- `.lcms-list` - Base list component
- `.lcms-list--check` - Checkmark bullet modifier
- `.lcms-list__item` - Individual list item

**Layout:**
- `.lcms-feature-block` - Semantic wrapper (optional, for targeting)
- `.grid-2col` - Two-column grid layout
- `.lcms-grid--align-center` - Vertically center grid items

## Best Practices

### Images
1. **Size**: Use consistent dimensions (recommend 600x400px or 1200x800px for retina)
2. **Format**: WebP with JPG fallback for best performance
3. **Alt Text**: Always provide descriptive alt text for accessibility
4. **Lazy Loading**: Use `loading="lazy"` for images below the fold
5. **Dimensions**: Specify width/height attributes to prevent CLS

### Content
1. **Title Length**: Keep feature titles short (3-7 words)
2. **Description**: 1-2 sentences maximum for scanability
3. **Benefit Count**: 2-4 bullet points per feature
4. **Benefit Length**: One line per bullet point ideal

### Visual Rhythm
1. **Alternation**: Switch image position for each feature
2. **Background**: Alternate light/dark backgrounds
3. **Count**: 3-4 features optimal (too many causes fatigue)
4. **Spacing**: Maintain consistent 60px gap between columns

## Accessibility

- ✅ Semantic HTML5 `<figure>` and `<figcaption>` elements
- ✅ Descriptive alt text for all images
- ✅ Proper heading hierarchy (h3 for feature titles)
- ✅ Sufficient color contrast in dark mode
- ✅ Lazy loading for performance
- ✅ Width/height attributes for CLS prevention

## Testing Results

**From slug-landing-page-03.php:**
- Quality Score: 93/100
- BEM Compliance: 100%
- Pattern discovered through AI ad-hoc composition
- Successfully created new classes that were then promoted to design system

## Migration Path

This pattern was **Tier 3 (Ad-hoc)** → **Tier 2 (Formal Pattern)**

**Discovery:** AI successfully created this pattern composition during image-rich landing page testing without explicit pattern documentation.

**Promotion Reason:** Pattern proved effective, demonstrated reusability, and solved common use case (feature showcases).

**Next Step:** Consider creating Tier 1 partial (`feature-showcase.php`) for highest quality and easiest usage.

## Related Patterns

- **2-Column Section**: More flexible column partial for varied content types
- **Metrics Grid**: For numerical/statistical feature highlights
- **Next Steps Timeline**: For sequential/phased feature rollouts

## Version History

- **2025-11-18**: Pattern discovered in slug-landing-page-03.php
- **2025-11-18**: Promoted to formal Tier 2 pattern
- **2025-11-18**: Required CSS classes added to lcms-design-system.css
