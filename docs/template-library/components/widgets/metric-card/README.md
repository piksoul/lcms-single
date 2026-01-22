# Metric Card

Card for displaying a single key metric with label, value, and description.

## Usage

Display quantitative or qualitative metrics in a clean, scannable format.

**Use for:**
- KPI dashboards
- Project statistics
- Performance indicators
- Goal tracking

**Don't use for:**
- Long-form content (use text-section instead)
- Navigation (use card-link instead)

## BEM Structure

```html
<div class="lcms-metric lcms-metric--transparent">
  <div class="lcms-metric__label">Completion Rate</div>
  <div class="lcms-metric__value">75%</div>
  <div class="lcms-metric__description">Project progress to date</div>
</div>
```

## Placeholders

- **LABEL** (required): Metric name (1-3 words)
- **VALUE** (required): The metric value (number, %, or short text)
- **DESCRIPTION** (required): Brief explanation
- **SECONDARY_DESCRIPTION** (optional): Additional context

## Examples

### Basic metric
```html
<div class="lcms-metric lcms-metric--transparent">
  <div class="lcms-metric__label">Team Size</div>
  <div class="lcms-metric__value">8</div>
  <div class="lcms-metric__description">Active contributors</div>
</div>
```

### With secondary description
```html
<div class="lcms-metric lcms-metric--transparent">
  <div class="lcms-metric__label">Budget</div>
  <div class="lcms-metric__value">$50K</div>
  <div class="lcms-metric__description">Total allocated</div>
  <div class="lcms-metric__description" style="margin-top: 20px; opacity: 0.7;">
    Target: $60K by Q2
  </div>
</div>
```

### In a grid (typical usage)
```html
<div class="grid-4col">
  <div class="lcms-metric lcms-metric--transparent">
    <div class="lcms-metric__label">Completion</div>
    <div class="lcms-metric__value">75%</div>
    <div class="lcms-metric__description">Project progress</div>
  </div>
  <div class="lcms-metric lcms-metric--transparent">
    <div class="lcms-metric__label">Budget</div>
    <div class="lcms-metric__value">$50K</div>
    <div class="lcms-metric__description">Total allocated</div>
  </div>
  <!-- More metrics... -->
</div>
```

## Best Practices

- Use 2-4 metrics per grid for optimal readability
- Keep values concise and scannable
- Ensure metrics are related/comparable
- Use consistent value formats in a group

## Related Components

- `metrics-grid-4col` - 4-column metrics layout
- `progress-bar-large` - For percentage-based progress
