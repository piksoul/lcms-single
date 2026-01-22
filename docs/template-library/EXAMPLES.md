# Template Library Usage Examples

Practical examples showing how to use the template library for different content types.

## Example 1: Project Idea Page (Type 1 - Recipe)

### Scenario
Create a project documentation page using the structured project-idea recipe.

### Input Data
```json
{
  "project_info": {
    "PROJECT_NAME": "Break Move Guy",
    "PROJECT_TAGLINE": "AI-Driven Character Sprite System",
    "PROJECT_STATUS": "Planning Phase",
    "COMPLETION_PCT": 65,
    "NEXT_MILESTONE": "Complete character design system"
  },
  "tasks": {
    "COMPLETED_TASK_LIST": [
      "Research sprite animation techniques",
      "Define core feature set",
      "Create initial mockups",
      "Establish project scope",
      "Identify key dependencies"
    ],
    "INPROGRESS_TASK_LIST": [
      "Design character rig system",
      "Prototype AI movement generation",
      "Develop sprite export pipeline"
    ],
    "UPCOMING_TASK_LIST": [
      "Build animation preview tool",
      "Implement style transfer",
      "Create documentation"
    ]
  },
  "metrics": [
    {
      "LABEL": "Animations",
      "VALUE": "50+",
      "DESCRIPTION": "Unique move combinations",
      "SECONDARY_DESCRIPTION": "Target: 200+ by launch"
    },
    {
      "LABEL": "Sprites",
      "VALUE": "2,400",
      "DESCRIPTION": "Generated frames",
      "SECONDARY_DESCRIPTION": "8 directions × 300 frames"
    },
    {
      "LABEL": "Styles",
      "VALUE": "5",
      "DESCRIPTION": "Visual themes available"
    },
    {
      "LABEL": "Speed",
      "VALUE": "< 2min",
      "DESCRIPTION": "Generation time per character"
    }
  ],
  "timeline": {
    "IMMEDIATE_TASK_LIST": [
      "Finalize character design system",
      "Complete prototype v1",
      "Begin alpha testing"
    ],
    "SHORTTERM_TASK_LIST": [
      "Expand animation library",
      "Optimize generation speed",
      "Add style customization"
    ],
    "LONGTERM_TASK_LIST": [
      "Public beta launch",
      "Marketplace integration",
      "Advanced AI features"
    ]
  },
  "cta": {
    "CTA_TEXT": "Break Move Guy represents the convergence of creative technology and practical application. Join us in revolutionizing sprite animation.",
    "PRIMARY_ACTION": "View Repository",
    "PRIMARY_URL": "https://github.com/piksoul/proj-breakmove",
    "SECONDARY_ACTION": "Contact Us",
    "SECONDARY_URL": "#contact"
  }
}
```

### AI Prompt
```
Using the project-idea recipe, generate a PHP template for this project data.
Follow the recipe sequence exactly, filling all placeholders with the provided data.
```

### Expected Output
PHP template file (`slug-project-idea.php`) with proper `partial()` calls in sequence.

---

## Example 2: About Page Refresh (Type 2 - Component Selection)

### Scenario
Client provides existing About page content that needs modern layout.

### Input Content
```markdown
# About Reframe WA

Reframe WA is a leadership and executive coaching consultancy founded by
Dr. Nancy Pavisich in 2025. We focus on individual transformation and
professional development.

## Our Approach
- Evidence-based coaching methodology
- Personalized development plans
- Executive presence training
- Leadership skill building

## Meet Dr. Nancy Pavisich
With over 20 years of experience in organizational leadership and a
PhD in Psychology, Dr. Pavisich brings deep expertise to executive coaching.

## Services
- One-on-one executive coaching
- Leadership development programs
- Team effectiveness training
- Organizational consulting

## Get Started
Ready to reframe your leadership approach? Contact us for a consultation.
Contact: info@reframewa.com
```

### AI Prompt
```
Analyze this About page content and create a modern template using components
from the library. Select appropriate components and arrange in a logical flow.

Requirements:
- Professional, clean layout
- Emphasize credibility
- Clear service offering
- Strong call-to-action
```

### AI Analysis & Component Selection
```
Content structure detected:
1. Hero intro → hero-with-badge (no badge, just title/subtitle)
2. Approach list → icon-list or check-list
3. Founder bio → text-section with optional image
4. Services grid → 4-column cards or list
5. CTA → cta-with-buttons

Selected components:
- hero-with-badge (title only variant)
- column with lcms-list--check
- column with text + optional image placeholder
- column with grid-4col or list
- cta-with-buttons
```

### Expected Output
PHP template with AI-selected component arrangement based on content structure.

---

## Example 3: Landing Page from Brief (Type 3 - Creative Composition)

### Scenario
Create a landing page for a new product launch with creative freedom.

### Creative Brief
```
Product: EcoPack Solutions
Category: Sustainable packaging for e-commerce
Target: Small to medium e-commerce businesses
Goal: Generate leads for consultation

Key Messages:
- Reduce environmental impact
- Cost-effective solutions
- Easy transition from traditional packaging
- Certified sustainable materials

Desired Tone: Professional, eco-conscious, solution-oriented
```

### AI Prompt
```
Create a conversion-focused landing page for EcoPack Solutions using
components from the library. Follow composition rules for visual rhythm
and conversion optimization.

Compose with creative freedom while ensuring:
- Strong opening hook
- Clear value proposition
- Benefits over features
- Social proof or trust indicators
- Clear CTA
```

### AI Composition Strategy
```
Component sequence:
1. hero-with-badge
   - Badge: "Certified Sustainable"
   - Title: "Packaging That's Good for Business and the Planet"
   - Subtitle: "Eco-friendly e-commerce packaging without the premium price"

2. metrics-grid-4col (light section)
   - "50% Cost Reduction"
   - "100% Recyclable"
   - "2-Week Transition"
   - "500+ Happy Clients"

3. column with text + grid-3col (dark section)
   - Title: "Why EcoPack?"
   - 3 benefit cards with icons

4. testimonial or trust indicators (light section)
   - Client logos or quotes

5. cta-with-buttons (gradient section)
   - "Get Your Free Sustainability Audit"
   - Primary: "Schedule Consultation"
   - Secondary: "Download Catalog"

Visual rhythm: Hero (heavy) → Metrics (medium) → Benefits (light) →
Trust (light) → CTA (heavy)

Dark/light: Light → Dark → Light → Light → Gradient
```

### Expected Output
Creative, conversion-optimized landing page following composition rules.

---

## Example 4: Extending Framework (New Component)

### Scenario
Need an FAQ accordion component not in the library.

### AI Recognition
```
Check library: No accordion component exists
Check patterns: No guided accordion pattern
Decision: Extend BEM framework
```

### AI Component Creation
```json
{
  "meta": {
    "id": "accordion-faq",
    "name": "FAQ Accordion",
    "category": "widget",
    "tier": 3,
    "status": "extended",
    "promotion_candidate": true
  },

  "bem": {
    "block": "lcms-accordion",
    "elements": ["__item", "__header", "__content"],
    "modifiers": ["--expanded"]
  },

  "html_structure": "<div class=\"lcms-accordion\">\n  <div class=\"lcms-accordion__item\">\n    <button class=\"lcms-accordion__header\">{{QUESTION}}</button>\n    <div class=\"lcms-accordion__content\">{{ANSWER}}</div>\n  </div>\n</div>"
}
```

### Generated HTML
```html
<div class="lcms-accordion">
  <div class="lcms-accordion__item">
    <button class="lcms-accordion__header">
      How long does shipping take?
    </button>
    <div class="lcms-accordion__content">
      Standard shipping takes 3-5 business days. Express options available.
    </div>
  </div>
  <div class="lcms-accordion__item">
    <button class="lcms-accordion__header">
      What's your return policy?
    </button>
    <div class="lcms-accordion__content">
      30-day money-back guarantee on all products.
    </div>
  </div>
</div>
```

### AI Flag for Review
```
⚠️ New component created: lcms-accordion
Suggested action: Test in production, refine, promote to component library
```

---

## Example 5: Material Design Integration

### Scenario
Use Material Design button with BEM wrapper.

### Input
```
Need elevated button with ripple effect for primary CTA
```

### AI Solution
```html
<div class="lcms-cta-material">
  <button class="mdc-button mdc-button--raised">
    <span class="mdc-button__ripple"></span>
    <span class="mdc-button__label">Get Started Free</span>
  </button>
</div>
```

### Notes
```
- BEM wrapper: lcms-cta-material
- Material component: mdc-button
- Ensure Material Design CSS/JS loaded
- Flag for dependency check
```

---

## Workflow Decision Tree

```
Need to create a page
    ↓
What type of content?
    │
    ├─ Type 1: Structured data
    │   → Load recipe
    │   → Fill placeholders
    │   → Generate PHP
    │
    ├─ Type 2: Supplied content
    │   → Analyze structure
    │   → Select components
    │   → Arrange logically
    │   → Generate PHP
    │
    └─ Type 3: Creative brief
        → Interpret brief
        → Compose with rules
        → Validate
        → Generate PHP

Component needed?
    ↓
    ├─ Exists in library? → Use it (Tier 1)
    ├─ Guided pattern? → Build from pattern (Tier 2)
    └─ Novel? → Extend BEM (Tier 3) + Flag for review
```

---

## Quality Checklist

### For All Templates
- [ ] BEM naming conventions followed
- [ ] WordPress security (ABSPATH, escaping)
- [ ] Proper partial namespace usage
- [ ] All placeholders filled
- [ ] Dark/light alternation
- [ ] Visual rhythm maintained
- [ ] Hero section present
- [ ] CTA section present

### For Extended Components
- [ ] `lcms-` prefix used
- [ ] BEM structure correct
- [ ] Component documented
- [ ] Flagged for promotion
- [ ] No conflicts with existing components

---

## Tips for AI Usage

### Maximize Quality
1. Use recipes (Type 1) whenever possible - highest consistency
2. Select from library first - proven patterns
3. Extend only when necessary - requires review

### Effective Prompting
- **Specific:** "Use hero-with-badge component with warning modifier"
- **Not vague:** "Make a nice header"

### Data Structure
- **Good:** Structured JSON with clear keys
- **Bad:** Unstructured text blocks

### Review Points
- New components created? → Flag for library
- Unusual combinations? → Note for future pattern
- Material Design used? → Check dependencies
