# Brand Hub (BRHU) - Template Documentation

Client-specific templates for Brand Hub internal project documentation.

## Client Information

**Client Code:** `brhu`
**Client Name:** Brand Hub System
**Type:** Internal Project Documentation
**Theme:** Sunset Boulevard (warm, professional)

## Brand Guidelines

### Color Palette (Sunset Boulevard Theme)

**Primary Colors:**
- Coral: `#e76f51` (primary accent)
- Sand: `#f4a261` (secondary accent)
- Gold: `#e9c46a` (tertiary accent)
- Charcoal: `#264653` (text, dark elements)
- Off-white: `#f9f9f9` (background)

**Usage:**
- Hero gradients: Coral to Sand (`#e76f51` to `#f4a261`)
- CTA backgrounds: Coral to Sand gradient
- Accent elements: Gold (`#e9c46a`)
- Body text: Charcoal (`#264653`)
- Card borders: Coral left border
- Background: Off-white (`#f9f9f9`)

### Typography

**Font Families:**
```css
font-family: Georgia, 'Times New Roman', serif;  /* Headings, elegant */
font-family: Arial, Helvetica, sans-serif;       /* Body text, clean */
```

**Font Sizes:**
- Hero H1: `58px` (desktop), `38px` (mobile)
- Section Titles: `42px` (desktop), `32px` (mobile)
- Body Text: `18px`
- Small Text: `14px`
- Tier Prices: `36px`

### Design Patterns

**Hero Section:**
- Coral-to-Sand gradient background
- White text with subtle text shadow
- Progress bar with gold accent
- Badge style with semi-transparent bg

**Cards:**
- White background with warm gradient (`#ffffff` to `#fef9f5`)
- Coral left border (5px)
- Soft shadow: `0 4px 15px rgba(0, 0, 0, 0.08)`
- Rounded corners: `15px`

**CTAs:**
- Coral-to-Sand gradient
- White text
- Rounded pill shape (`50px`)
- Hover: lift effect with enhanced shadow

**Code Blocks:**
- Charcoal background (`#264653`)
- Gold text (`#e9c46a`)
- Sand accents (`#f4a261` for comments)
- Monospace font (Courier New)

## Active Templates

### Project Documentation

1. **slug-project-summary-251106.php**
   - Full project overview and roadmap
   - Sunset Boulevard themed
   - Progress tracking and timeline
   - Implementation status (v1.0.4)
   - Client assignment technical planning

2. **slug-project-overview-251106-noaccess.php**
   - Password-protected access gate
   - Sunset Boulevard themed
   - Branded password form

## Naming Conventions

**Template Files:**
- Format: `slug-{page-name}-{date}.php`
- Date format: `YYMMDD` (e.g., 251106 for Nov 6, 2025)
- No `brhu-` prefix needed (implied by folder)

**Version Dating:**
- Use date suffix for iterations
- Move old versions to `_archive/`

**Examples:**
```
✅ slug-project-summary-251106.php
✅ slug-project-summary-251107.php (newer version)
❌ slug-brhu-project-summary.php (redundant prefix)
```

## Theme Notes

**Sunset Boulevard Aesthetic:**
- Warm, professional, approachable
- Inspired by golden hour lighting
- Soft gradients and shadows
- Elegant serif headings
- Clean sans-serif body

**Color Psychology:**
- Coral: Energy, warmth, creativity
- Sand: Stability, approachability
- Gold: Success, optimism
- Charcoal: Professionalism, authority

## Technical Implementation

### Current Status (v1.0.4)
- ✅ Client subfolder structure
- ✅ Slug-based client detection (`brhu-page-name`)
- ✅ Smart template resolution
- ✅ Updated project documentation with implementation details
- ✅ Client assignment planning documented

### Client Assignment
Currently using **slug-based** approach:
- Page slug: `brhu-project-summary`
- Extracted code: `brhu`
- Template path: `brhu/slug-project-summary-{date}.php`

### Future Considerations
- Post meta field option documented
- Custom taxonomy option documented
- Hybrid approach under evaluation
- Decision: Stay with slug-based for Phase 1

## Development Notes

**Responsive Breakpoints:**
- Mobile: < 768px
- Tablet: 768px - 1024px
- Desktop: 1024px+

**Browser Support:**
- Modern browsers (Chrome, Firefox, Safari, Edge)
- CSS Grid and Flexbox required
- Backdrop-filter for frosted glass effects

**Accessibility:**
- Semantic HTML (section, article, header)
- Sufficient color contrast
- Focus states on interactive elements
- Alternative text where needed

## Archive Policy

When creating new versions:
1. Move old version to `_archive/` subfolder
2. Keep date suffix for reference
3. Update this README with version notes

---

**Last Updated:** 2025-11-07
**Maintained By:** LeanCMS Brand Hub Team
**Theme:** Sunset Boulevard
