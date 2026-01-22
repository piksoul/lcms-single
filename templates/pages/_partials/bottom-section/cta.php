<?php
/**
 * CTA Section Component - BEM Version
 *
 * Displays a call-to-action section with title, description, and button.
 * Uses .lcms-cta-section BEM component from lcms-design-system.css.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Partials
 * @filepath   templates/pages/_partials/bottom-section/cta.php
 * @since      2.0.0 - Migrated to BEM naming convention
 *
 * Usage - Array Config (Recommended):
 * $cta_config = [
 *     'title' => 'Questions About Brand Usage?',
 *     'description' => 'Need guidance on applying these guidelines?',
 *     'button_text' => 'Get in Touch',
 *     'button_url' => '#contact',
 *     'button_target' => '_self',      // optional
 *     'button_modifiers' => '',        // optional: --outline, --ghost, --squared, --sharp
 *     'section_modifiers' => '',       // optional: --small, --large, --dark, --light, etc.
 *     'bg_style' => '',                // optional (for custom backgrounds)
 * ];
 *
 * Usage - Individual Variables (Legacy):
 * $cta_title = 'Ready to Get Started?';
 * $cta_description = 'Contact us today';
 * // ... etc
 */

// Support both array config and individual variables (backward compatible)
if (isset($cta_config) && is_array($cta_config)) {
    // Use array config
    $cta_title = $cta_config['title'] ?? 'Ready to Get Started?';
    $cta_description = $cta_config['description'] ?? '';
    $cta_button_text = $cta_config['button_text'] ?? 'Get in Touch';
    $cta_button_url = $cta_config['button_url'] ?? '#contact';
    $cta_button_target = $cta_config['button_target'] ?? '_self';
    $cta_button_modifiers = $cta_config['button_modifiers'] ?? '';
    $cta_section_modifiers = $cta_config['section_modifiers'] ?? '';
    $cta_bg_style = $cta_config['bg_style'] ?? '';
} else {
    // Fall back to individual variables (legacy support)
    $cta_title = $cta_title ?? 'Ready to Get Started?';
    $cta_description = $cta_description ?? '';
    $cta_button_text = $cta_button_text ?? 'Get in Touch';
    $cta_button_url = $cta_button_url ?? '#contact';
    $cta_button_target = $cta_button_target ?? '_self';
    $cta_button_modifiers = $cta_button_modifiers ?? '';
    $cta_section_modifiers = $cta_section_modifiers ?? '';
    $cta_bg_style = $cta_bg_style ?? '';
}

// Build BEM classes
$section_class = 'lcms-cta-section' . ($cta_section_modifiers ? ' ' . $cta_section_modifiers : '');
$button_class = 'lcms-cta-section__button' . ($cta_button_modifiers ? ' ' . $cta_button_modifiers : '');
?>

<section class="<?php echo esc_attr($section_class); ?>"<?php if ($cta_bg_style): ?> style="<?php echo esc_attr($cta_bg_style); ?>"<?php endif; ?>>
    <h2 class="lcms-cta-section__title"><?php echo esc_html($cta_title); ?></h2>

    <?php if ($cta_description): ?>
        <p class="lcms-cta-section__description"><?php echo esc_html($cta_description); ?></p>
    <?php endif; ?>

    <a href="<?php echo esc_url($cta_button_url); ?>"
       class="<?php echo esc_attr($button_class); ?>"
       target="<?php echo esc_attr($cta_button_target); ?>">
        <?php echo esc_html($cta_button_text); ?>
    </a>
</section>
