# FAQ List Pattern (Simple)

## Overview

Simple, static FAQ section with question-answer pairs in a clean vertical stack format. Optimized for SEO, accessibility, and readability.

**Tier:** 2 (Guided Pattern)
**Added:** 2025-11-18
**Discovered in:** slug-packaging-campaign.php

## When to Use

✅ **Use this pattern for:**
- Frequently Asked Questions sections
- Common concerns addressing
- Product/service questions
- Pricing inquiries
- Support documentation
- How-to information

❌ **Don't use for:**
- Very long FAQ lists (12+ items - use categories or accordion)
- Complex answers with images/diagrams (use dedicated content sections)
- Interactive filtering needs (build custom solution)

## Why Static Over Accordion?

This pattern intentionally uses a **simple static list** instead of an accordion:

**SEO Benefits:**
- ✅ All content visible to search engines
- ✅ Better for FAQPage schema markup
- ✅ Questions include long-tail keywords
- ✅ Improved crawlability

**User Benefits:**
- ✅ Scannable at a glance
- ✅ Print-friendly
- ✅ Works without JavaScript
- ✅ Better accessibility (no hidden content)

**Note:** Can be enhanced to accordion in Phase 2 enhancement workflow if needed.

## Implementation

```php
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Frequently Asked Questions',
            'subtitle' => 'Everything you need to know',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-container lcms-container--thin">
                <div class="lcms-stack gap-16">
                    <div class="lcms-stack gap-8">
                        <h4>Is sustainable packaging more expensive?</h4>
                        <p>While initial costs may be slightly higher, sustainable packaging often leads to cost savings through reduced material usage, shipping efficiency, and customer loyalty.</p>
                    </div>
                    <div class="lcms-stack gap-8">
                        <h4>How long does biodegradable packaging take to decompose?</h4>
                        <p>Our biodegradable materials decompose in 90-180 days in industrial composting facilities, compared to hundreds of years for traditional plastics.</p>
                    </div>
                    <div class="lcms-stack gap-8">
                        <h4>Can sustainable packaging protect products as well as traditional packaging?</h4>
                        <p>Absolutely. Our sustainable materials meet or exceed the protective qualities of traditional packaging while being environmentally responsible.</p>
                    </div>
                    <div class="lcms-stack gap-8">
                        <h4>What is the minimum order quantity?</h4>
                        <p>We work with businesses of all sizes. Contact us to discuss options tailored to your specific volume needs.</p>
                    </div>
                    <div class="lcms-stack gap-8">
                        <h4>How do I get started with the transition?</h4>
                        <p>Simply contact us for a free consultation. We\'ll analyze your current packaging and create a customized sustainable solution.</p>
                    </div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');
```

## Structure Breakdown

### Container
```html
<div class="lcms-container lcms-container--thin">
```
Constrains width for optimal readability (~800px max)

### Outer Stack
```html
<div class="lcms-stack gap-16">
```
Vertical spacing between Q&A pairs (16px)

### Individual FAQ Item
```html
<div class="lcms-stack gap-8">
    <h4>Question text?</h4>
    <p>Answer text.</p>
</div>
```
Tight spacing between question and answer (8px)

## BEM Components

**Required:**
- `.lcms-stack` - Vertical stacking layout
- `.gap-16` - 16px spacing between FAQs
- `.gap-8` - 8px spacing between Q and A
- `.lcms-container--thin` - Readable width constraint

**Optional:**
- `.text-center` - Center alignment for header
- Strong tag instead of h4 for simpler styling

## Content Guidelines

### Question Format

**Good examples:**
- "Is sustainable packaging more expensive?"
- "How long does biodegradable packaging take to decompose?"
- "Can sustainable packaging protect products as well?"
- "What is the minimum order quantity?"
- "How do I get started?"

**Bad examples:**
- "Pricing" (too vague, not a question)
- "Everything you need to know about our pricing structure and how we calculate costs" (too long)
- "Q: Is this expensive?" (don't add Q: prefix)

**Best practices:**
- Start with Who/What/When/Where/Why/How or Is/Can/Do
- Keep questions under 15 words
- Use natural language users would actually ask
- Include keywords organically

### Answer Format

**Good examples:**
- "While initial costs may be slightly higher, sustainable packaging often leads to cost savings through reduced material usage and shipping efficiency." (clear, benefits-focused)
- "Our biodegradable materials decompose in 90-180 days in industrial composting facilities." (specific, factual)

**Bad examples:**
- "Yes." (too short, not helpful)
- "This is a complex question with many factors to consider including material costs, production volumes, shipping logistics, and market conditions..." (too long, overwhelming)

**Best practices:**
- 1-2 sentences optimal, 3 maximum
- Be specific with numbers/timeframes when possible
- Focus on benefits, not just features
- End with call-to-action when appropriate

## Usage Guidelines

### Quantity
- **Optimal:** 5-8 FAQs
- **Minimum:** 3 FAQs
- **Maximum:** 12 FAQs (beyond this, consider categories or accordion)

### Order
1. **Most common question first** - What most users want to know
2. **Follow logical flow** - Group related questions
3. **End with conversion** - Last question should include CTA opportunity

**Example order:**
1. Price/cost questions
2. Quality/performance questions
3. Process/how-it-works questions
4. Getting started/next steps

### Heading Level

**Use h4 for questions:**
```html
<h4>Question text?</h4>
```

**Why h4:**
- Page title is h1
- Section heading is h2 ("Frequently Asked Questions")
- Subsection would be h3 (if used)
- FAQ questions are h4 (maintains hierarchy)

**Alternative (simpler):**
```html
<strong>Question text?</strong>
```
Use if you want simpler styling without semantic heading hierarchy.

## Real-World Example

**From Packaging Campaign (lines 357-396):**

5-question FAQ section:
1. Cost comparison
2. Decomposition timeframe
3. Product protection
4. Minimum order
5. Getting started

**Quality:** Worked perfectly with 94% overall page score

**SEO benefit:** All content indexed, improved for "sustainable packaging questions" keywords

## Style Variations

### Centered Layout
```php
'content' => [
    'type' => 'html',
    'html' => '
        <div class="lcms-container lcms-container--thin text-center">
            <div class="lcms-stack gap-16">
                <!-- FAQ items -->
            </div>
        </div>
    ',
]
```

### Dark Mode
```php
'settings' => ['dark_mode' => true],
```
Works perfectly in dark sections - automatic color adjustments

### With Links in Answers
```html
<p>Contact us for a <a href="#consultation">free consultation</a>. We'll analyze your needs.</p>
```

### Two-Column on Desktop
```html
<div class="grid-2col">
    <div class="lcms-stack gap-16">
        <!-- FAQs 1-3 -->
    </div>
    <div class="lcms-stack gap-16">
        <!-- FAQs 4-6 -->
    </div>
</div>
```
Only use for very short Q&A pairs (under 50 words each)

## Enhancement Options (Phase 2)

### Add Accordion Functionality
```javascript
// Can be added as enhancement
document.querySelectorAll('.faq-question').forEach(q => {
    q.addEventListener('click', () => {
        q.nextElementSibling.classList.toggle('expanded');
    });
});
```

### Add FAQPage Schema
```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "Is sustainable packaging more expensive?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "While initial costs may be slightly higher..."
    }
  }]
}
</script>
```

### Add Category Grouping
```html
<div class="lcms-stack gap-32">
    <div>
        <h3>Pricing Questions</h3>
        <div class="lcms-stack gap-16">
            <!-- Price-related FAQs -->
        </div>
    </div>
    <div>
        <h3>Product Questions</h3>
        <div class="lcms-stack gap-16">
            <!-- Product-related FAQs -->
        </div>
    </div>
</div>
```

## Best Practices

✅ **Do:**
- Write questions as users would ask them
- Keep answers concise and helpful
- Include specific numbers/timeframes when possible
- Order questions logically (most common first)
- Use readable width (lcms-container--thin)
- Include CTA opportunity in last question

❌ **Don't:**
- Add "Q:" or "A:" prefixes (structure makes it clear)
- Make questions too generic ("Pricing", "Support")
- Write essay-length answers (save for dedicated content)
- Use more than 12 FAQs without categorization
- Hide content in accordions (hurts SEO)

## Accessibility

- ✅ Semantic heading hierarchy (h4 maintains structure)
- ✅ Clear question-answer association
- ✅ No hidden content (all visible)
- ✅ Works without JavaScript
- ✅ Proper reading order
- ✅ Sufficient spacing for readability

## SEO Benefits

**Why this pattern is SEO-friendly:**

1. **All content indexed** - No hidden content in collapsed accordions
2. **Rich snippet eligible** - Easy to add FAQPage schema
3. **Long-tail keywords** - Questions naturally include search terms
4. **Featured snippet potential** - Google may pull Q&A into results
5. **User engagement** - Clear answers reduce bounce rate

**Schema markup example:**
```json
{
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Is sustainable packaging more expensive?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "While initial costs may be slightly higher, sustainable packaging often leads to cost savings through reduced material usage, shipping efficiency, and customer loyalty."
      }
    }
  ]
}
```

## Related Patterns

- **numbered-timeline** - For sequential how-to steps (different use case)
- **feature-showcase** - For detailed feature explanations (different format)
- **success stories** - For social proof (different content type)

## Version History

- **1.0** (2025-11-18) - Initial pattern documented from packaging campaign
