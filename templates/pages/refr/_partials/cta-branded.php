<?php
/**
 * Reframe WA Branded CTA Section Component
 *
 * This is a client-specific partial for Reframe WA that includes
 * the brand tagline. Demonstrates client-level partial customization.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Partials/Refr
 * @filepath   templates/pages/refr/_partials/cta-branded.php
 *
 * Expected variables:
 * - $cta_title              - Main heading text (required)
 * - $cta_description        - Description text (optional)
 * - $cta_button_text        - Button text (required)
 * - $cta_button_url         - Button URL (required)
 * - $cta_button_target      - Link target, default '_self' (optional)
 * - $show_tagline           - Show Reframe WA tagline (default true)
 */

// Set defaults
$cta_title = $cta_title ?? 'Ready to Get Started?';
$cta_description = $cta_description ?? '';
$cta_button_text = $cta_button_text ?? 'Get in Touch';
$cta_button_url = $cta_button_url ?? '#contact';
$cta_button_target = $cta_button_target ?? '_self';
$show_tagline = $show_tagline ?? true;
?>

<section class="cta-section">
    <?php if ($show_tagline): ?>
        <div style="font-size: 14px; letter-spacing: 3px; margin-bottom: 20px; opacity: 0.9; text-transform: uppercase; font-family: var(--font-heading); font-weight: 700;">
            Review · Renew · Regenerate
        </div>
    <?php endif; ?>

    <h2><?php echo esc_html($cta_title); ?></h2>

    <?php if ($cta_description): ?>
        <p><?php echo esc_html($cta_description); ?></p>
    <?php endif; ?>

    <a href="<?php echo esc_url($cta_button_url); ?>"
       class="cta-button"
       target="<?php echo esc_attr($cta_button_target); ?>">
        <?php echo esc_html($cta_button_text); ?>
    </a>
</section>
