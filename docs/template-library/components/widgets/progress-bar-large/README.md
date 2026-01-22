# Progress Bar Large

Large progress bar with centered percentage label overlay.

## Usage

Display numerical progress or completion status (0-100%).

**Use for:**
- Project completion tracking
- Goal progress indicators
- Phase completion status
- Loading/processing states

**Don't use for:**
- Binary states (complete/incomplete) - use badge instead
- Small inline indicators - use regular progress bar

## BEM Structure

```html
<div class="lcms-progress lcms-progress--large">
  <div class="lcms-progress__bar" style="width: 65%;">
    <span class="lcms-progress__label">65%</span>
  </div>
</div>
```

## Placeholders

- **PERCENTAGE** (required): Integer 0-100

## Examples

### Project at 65% completion
```html
<div class="lcms-progress lcms-progress--large">
  <div class="lcms-progress__bar" style="width: 65%;">
    <span class="lcms-progress__label">65%</span>
  </div>
</div>
```

### Just started (10%)
```html
<div class="lcms-progress lcms-progress--large">
  <div class="lcms-progress__bar" style="width: 10%;">
    <span class="lcms-progress__label">10%</span>
  </div>
</div>
```

## Styling Notes

- Height controlled by `--large` modifier
- Label always visible and centered
- Colors inherit from CSS variables
- Responsive width (100% of container)

## Related Components

- `badge` - For status labels
- `metric-card` - Often used together in dashboards
- `project-summary-card` - Contains this component
