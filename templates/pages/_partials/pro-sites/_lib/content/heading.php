<?php
/**
 * Heading Content Renderer - BEM Version
 *
 * Renders a heading element with configurable size and alignment.
 * Useful for standalone headings in grid items or columns.
 *
 * @filepath templates/pages/_partials/pro-sites/_lib/content/heading.php
 * @since 1.2.3
 * @since 2.0.5 Migrated to BEM naming (.lcms-heading)
 *
 * Expected $content structure:
 * [
 *     'text'  => 'Heading Text',           // Required: heading text
 *     'size'  => 'h2',                     // Optional: h1|h2|h3|h4|h5|h6 (default: h2)
 *     'align' => 'left',                   // Optional: left|center|right (default: left)
 *     'class' => 'custom-class',           // Optional: additional CSS class
 * ]
 */

$text = $content['text'] ?? '';
$size = $content['size'] ?? 'h2';
$align = $content['align'] ?? 'left';
$custom_class = $content['class'] ?? '';

// Skip if no text
if (empty($text)) {
    return;
}

// Validate heading size
$valid_sizes = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
if (!in_array($size, $valid_sizes)) {
    $size = 'h2';
}

// Build classes with BEM
$classes = ['lcms-heading'];
if ($align) {
    $classes[] = 'lcms-heading--align-' . esc_attr($align);
}
if ($custom_class) {
    $classes[] = esc_attr($custom_class);
}
?>

<<?php echo esc_attr($size); ?> class="<?php echo esc_attr(implode(' ', $classes)); ?>">
    <?php echo esc_html($text); ?>
</<?php echo esc_attr($size); ?>>
