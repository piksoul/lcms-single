# Reframe WA (REFR) - Template Documentation

Client-specific templates for Reframe WA brand hub pages.

## 🤖 Machine-Readable Configuration

This folder includes **`config.php`** - a machine-readable configuration file that contains:
- Brand colors, typography, and layout specifications
- Template component defaults (hero, cards, CTAs, forms)
- AI generation instructions for consistent template creation
- Validation rules for brand compliance

**Usage:**
- **For AI/Tools:** Use `config.php` to programmatically generate templates
- **For Humans:** Read this README for context, examples, and best practices

Both files are kept in sync to ensure consistency between automated and manual template creation.

## Client Information

**Client Code:** `refr`
**Client Name:** Reframe WA
**Industry:** Leadership & Executive Coaching
**Website:** https://reframewa.com

## Brand Guidelines

### Color Palette

**Primary Colors:**
- Navy Blue: `#08093E` (dark), `#0A0C4F` (medium), `#12195B` (headings)
- Accent Blue: `#037DED` (primary CTA), `#2998FF` (hover state)
- Light Background: `#EDF1F8` (cards), `#DAE3F3` (borders)
- Text: `#161617` (body text)

**Usage:**
- Hero backgrounds: Navy gradient (`#08093E` to `#0A0C4F`)
- Primary CTAs: `#037DED`
- Card backgrounds: `#EDF1F8`
- Headings: `#12195B`

### Typography

**Font Families:**
```css
font-family: 'Raleway', Arial, Helvetica, sans-serif; /* Headings, bold text */
font-family: 'Inter', Arial, Helvetica, sans-serif;   /* Body text */
```

**Font Weights:**
- Raleway: 700 (bold) for headings, labels, CTAs
- Inter: 400 (regular) for body text

**Font Sizes:**
- Hero H1: `56px` (desktop), `36px` (mobile)
- Section Titles: `42px` (desktop), `32px` (mobile)
- Body Text: `18px`
- Small Text/Labels: `14px`

### Layout System

**Spacing:**
- Section padding: `80px 60px` (desktop), `60px 30px` (mobile)
- Card padding: `30px` - `50px` depending on importance
- Grid gaps: `30px` - `40px`

**Borders:**
- Card borders: `2px solid #DAE3F3`
- CTA borders: `3px solid #037DED`
- Border radius: `8px` - `10px` (consistent across components)

### Design Patterns

**Hero Section:**
- Navy gradient background
- Logo placement (if applicable)
- Badge/label (uppercase, `14px`, semi-transparent bg)
- Large bold headline (`56px`, Raleway 700, uppercase)
- Subtitle (`24px`, Raleway 700, letter-spacing)

**Cards/Containers:**
- Light background (`#EDF1F8`)
- 2px border (`#DAE3F3`)
- 10px border radius
- Hover effects: subtle lift (`translateY(-5px)`) + shadow

**CTAs:**
- Primary: `#037DED` background, white text
- Hover: `#2998FF`, lift 2px, add shadow
- Uppercase, 700 weight, letter-spacing 1px

## Active Templates

### Core Pages

1. **slug-brand-guide.php**
   - Full brand guidelines page
   - Sections: Logo, Colors, Typography, Layout
   - Password protected (uses -noaccess variant)

2. **slug-brand-guide-noaccess.php**
   - Password gate for brand guidelines
   - Shows teaser content with password form

3. **slug-web-review.php**
   - Website analysis case studies
   - Three consulting sites analyzed
   - Scoring metrics and recommendations

4. **slug-web-review-noaccess.php**
   - Password gate for web review
   - Preview of case studies with scores

5. **slug-index.php**
   - Brand hub landing/index page
   - Overview of available resources

## Naming Conventions

**Template Files:**
- Format: `slug-{page-name}[-variant].php`
- No `refr-` prefix needed (implied by folder)
- Use `-noaccess` suffix for password-protected variants
- Use `-{number}` or `-{date}` for iterations/versions

**Examples:**
```
✅ slug-brand-guide.php
✅ slug-web-review-2.php
✅ slug-new-page-251107.php
❌ slug-refr-brand-guide.php (redundant prefix)
```

## Password Protection

When a page needs password protection:

1. Create the main template: `slug-page-name.php`
2. Create the no-access variant: `slug-page-name-noaccess.php`
3. Set the page password in WordPress admin
4. The system automatically uses `-noaccess` template when locked

**No-Access Template Requirements:**
- Teaser content (what's inside)
- Branded styling matching main page
- WordPress password form: `<?php echo get_the_password_form(); ?>`

## Archive Policy

When creating new versions of templates:

1. Move old version to `_archive/` subfolder
2. Rename with date: `slug-page-name-YYMMDD.php`
3. Keep reference in archive README

**Example:**
```bash
# Creating v2 of brand-guide
mv slug-brand-guide.php _archive/slug-brand-guide-251106.php
# Create new slug-brand-guide.php
```

## Assets Location

**Static assets** for Reframe WA templates are hosted on a CDN:

**CDN Base URL:** `https://static.brand-hub.com.au/client/refr/`

**Local CSS files:**
```
templates/pages/refr/assets/
├── document-system.css
└── refr-theme.css
```

**Image assets (CDN-hosted):**
- ReframeWALogo-Vert_REV.svg
- ReframeWALogo-Vert.svg
- ReframeWALogo-Horiz.svg
- ReframeWALogo-Horiz-REV.svg
- ReframeWALogo-Symbol.svg

**Usage in templates:**
```php
<img src="https://static.brand-hub.com.au/client/refr/ReframeWALogo-Vert_REV.svg" alt="Reframe WA Logo">
```

## Development Notes

**Responsive Breakpoints:**
- Desktop: 1024px+
- Tablet: 768px - 1024px
- Mobile: < 768px

**Browser Support:**
- Modern browsers (Chrome, Firefox, Safari, Edge)
- CSS Grid and Flexbox required
- Google Fonts CDN dependency

**Accessibility:**
- Semantic HTML (header, section, main)
- Alt text on all images
- Sufficient color contrast ratios
- Focus states on interactive elements

## Contact

For questions about Reframe WA brand guidelines or template updates, contact the project team or refer to the main Brand Hub documentation.

---

**Last Updated:** 2025-11-07
**Maintained By:** LeanCMS Brand Hub Team
