<?php
/**
 * Single Column Section (Universal Layout)
 *
 * Universal single-column layout that can display any content type.
 * Content type is determined by $section_config['content']['type'].
 *
 * Replaces the old type-specific partials:
 * - text-section.php
 * - image-section.php
 * - video-section.php
 * - html-section.php
 *
 * @param array $section_config Section configuration array
 *
 * Config Structure:
 * ```php
 * $section_config = [
 *     'settings' => [...],
 *     'pre_html' => 'HTML string to render before header',  // Optional
 *     'header'   => ['heading' => [...]],
 *     'content'  => [
 *         'type' => 'text|image|video|html',  // Required
 *         ...type-specific properties
 *     ],
 *     'footer'   => ['buttons' => [...]],
 *     'post_html' => 'HTML string to render after footer',  // Optional
 * ];
 * ```
 *
 * @since 1.2.0
 */

$config = $section_config ?? [];

// Set section type for wrapper
$section_type = 'column';

// Wrapper open (handles settings, section tag opening)
include __DIR__ . '/_lib/wrapper-open.php';

// Pre-HTML (custom HTML before header)
if (!empty($config['pre_html'])) {
    echo $config['pre_html'];
}

// Header (heading component)
include __DIR__ . '/_lib/header.php';

// Render content based on type
$content = $config['content'] ?? [];
$content_type = $content['type'] ?? 'text'; // Default to text for backward compatibility

$content_renderer = __DIR__ . '/_lib/content/' . $content_type . '.php';

if (file_exists($content_renderer)) {
    include $content_renderer;
} else {
    // Log error for unknown content type
    error_log("Pro-Sites column-section: Unknown content type '{$content_type}' in " . __FILE__);
}

// Footer (buttons component)
include __DIR__ . '/_lib/footer.php';

// Post-HTML (custom HTML after footer)
if (!empty($config['post_html'])) {
    echo $config['post_html'];
}

// Wrapper close (section tag closing)
include __DIR__ . '/_lib/wrapper-close.php';
