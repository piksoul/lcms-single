<?php
/**
 * Page Header Component
 *
 * Displays a simple branded page header with title and optional subtitle.
 * Used for demo and test pages to provide consistent page identification.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Partials
 * @filepath   templates/pages/_partials/top-section/page-header.php
 * @since      1.2.4
 *
 * Usage:
 * partial('page-header', [
 *     'pre_html' => 'HTML string to render before header',  // Optional
 *     'title'    => 'Page Title',
 *     'subtitle' => 'Optional description',
 *     'post_html' => 'HTML string to render after header',  // Optional
 * ], 'top-section');
 */

// Extract config from wrapper if present (supports both new and legacy patterns)
if (isset($page_header_config) && is_array($page_header_config)) {
    extract($page_header_config);
}

// Set defaults
$title = $title ?? 'Page Title';
$subtitle = $subtitle ?? '';
$pre_html = $pre_html ?? '';
$post_html = $post_html ?? '';
?>

<!-- Page Header -->
<section class="lcms-top-section lcms-page-header lcms-pro-sites--dark" style="text-align: center;">
    <div class="lcms-container">
        <?php if (!empty($pre_html)): ?>
            <?php echo $pre_html; ?>
        <?php endif; ?>
        <h1 style="font-family: var(--font-heading); font-size: 36px; margin: 0;"><?php echo esc_html($title); ?></h1>
        <?php if (!empty($subtitle)): ?>
            <p style="margin: 10px 0 0; opacity: 0.9;"><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>
        <?php if (!empty($post_html)): ?>
            <?php echo $post_html; ?>
        <?php endif; ?>
    </div>
</section>