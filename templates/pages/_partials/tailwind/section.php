<?php
/**
 * Tailwind Section Partial
 *
 * A flexible content section built with Tailwind CSS + DaisyUI.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Partials/Tailwind
 * @filepath   templates/pages/_partials/tailwind/section.php
 *
 * Config structure:
 * [
 *     'id'          => 'about',                // Optional section ID
 *     'label'       => 'About Us',             // Optional label/badge
 *     'title'       => 'Section Title',        // Optional
 *     'subtitle'    => 'Subtitle text',        // Optional
 *     'content'     => '<p>HTML content</p>',  // Main content (HTML allowed)
 *     'dark'        => false,                  // Dark mode variant
 *     'centered'    => true,                   // Center text
 *     'narrow'      => false,                  // Narrow content width
 * ]
 */

$config = $config ?? $section_config ?? [];

$id       = $config['id'] ?? '';
$label    = $config['label'] ?? '';
$title    = $config['title'] ?? '';
$subtitle = $config['subtitle'] ?? '';
$content  = $config['content'] ?? '';
$dark     = $config['dark'] ?? false;
$centered = $config['centered'] ?? true;
$narrow   = $config['narrow'] ?? false;

$section_classes = 'lcms-section';
$section_classes .= $dark ? ' bg-neutral text-neutral-content' : ' bg-base-100';

$container_classes = 'lcms-container';
$container_classes .= $centered ? ' text-center' : '';

$content_classes = $narrow ? 'max-w-3xl mx-auto' : '';
?>

<section <?php echo $id ? 'id="' . esc_attr($id) . '"' : ''; ?> class="<?php echo esc_attr($section_classes); ?>">
    <div class="<?php echo esc_attr($container_classes); ?>">

        <?php if ($label): ?>
            <span class="badge badge-primary badge-outline mb-4"><?php echo esc_html($label); ?></span>
        <?php endif; ?>

        <?php if ($title): ?>
            <h2 class="text-3xl md:text-4xl font-bold mb-4"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if ($subtitle): ?>
            <p class="text-lg opacity-70 mb-8 <?php echo $narrow ? 'max-w-2xl mx-auto' : ''; ?>">
                <?php echo esc_html($subtitle); ?>
            </p>
        <?php endif; ?>

        <?php if ($content): ?>
            <div class="prose <?php echo $dark ? 'prose-invert' : ''; ?> <?php echo $centered ? 'mx-auto' : ''; ?> <?php echo esc_attr($content_classes); ?>">
                <?php echo wp_kses_post($content); ?>
            </div>
        <?php endif; ?>

    </div>
</section>
