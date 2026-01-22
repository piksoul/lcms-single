# Badge

Small colored badge for status indicators, labels, and tags.

## Usage

Display status, categories, or tags with semantic color coding.

**Use for:**
- Status indicators (Planning, In Progress, Complete)
- Category labels
- Feature tags
- Alert types

**Don't use for:**
- Long text (use card or text-section instead)
- Progress indication (use progress-bar instead)

## BEM Structure

```html
<span class="lcms-badge lcms-badge--warning">Planning Phase</span>
```

## Modifiers

| Modifier | Use For | Example |
|----------|---------|---------|
| `--primary` | Default, neutral | "New", "Featured" |
| `--success` | Complete, positive | "Complete", "Approved" |
| `--warning` | In progress, caution | "Planning Phase", "Review Needed" |
| `--info` | Informational | "Beta", "Updated" |
| `--danger` | Error, blocked | "Blocked", "Failed" |

## Placeholders

- **TEXT** (required): Badge label (2-4 words max)
- **MODIFIER** (optional): Color variant (default: primary)

## Examples

### Status badge
```html
<span class="lcms-badge lcms-badge--warning">In Progress</span>
```

### Multiple tags
```html
<span class="lcms-badge lcms-badge--primary">React</span>
<span class="lcms-badge lcms-badge--primary">TypeScript</span>
<span class="lcms-badge lcms-badge--primary">Node.js</span>
```

### Success indicator
```html
<span class="lcms-badge lcms-badge--success">Completed</span>
```

## Styling Notes

- Uppercase text with letter-spacing
- Rounded corners (border-radius: 20px)
- Inline-block display
- Responsive padding

## Related Components

- `hero-with-badge` - Hero section with status badge
- `progress-bar-large` - For percentage-based progress
