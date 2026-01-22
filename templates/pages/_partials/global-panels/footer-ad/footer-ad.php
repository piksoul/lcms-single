<?php
/**
 * Global Footer Ad Panel
 *
 * Self-contained advertising panel for Brand Hub or partner advertisements.
 * Appears globally across all pages unless disabled via configuration.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Partials
 * @filepath   templates/pages/_partials/global-panels/footer-ad/footer-ad.php
 *
 * Configuration:
 * @param string $heading         Main heading text
 * @param string $description     Supporting description text
 * @param string $button_text     CTA button text
 * @param string $button_url      CTA button URL
 * @param string $button_target   Link target (_blank, _self)
 * @param string $logo_url        Optional logo/image URL
 * @param string $logo_alt        Logo alt text
 * @param string $bg_color        Optional background color override
 * @param string $text_color      Optional text color override
 * @param string $section_modifiers Additional CSS classes
 */

// Default configuration
$defaults = array(
	'heading'            => 'Powered by Brand Hub',
	'description'        => 'Professional brand management made simple',
	'button_text'        => 'Learn More',
	'button_url'         => '#',
	'button_target'      => '_blank',
	'logo_url'           => '',
	'logo_alt'           => 'Brand Hub',
	'bg_color'           => '',
	'text_color'         => '',
	'section_modifiers'  => '',
);

// Merge provided config with defaults
$config = is_array( $config ) ? array_merge( $defaults, $config ) : $defaults;

// Early return if no content to display
if ( empty( $config['heading'] ) && empty( $config['description'] ) && empty( $config['logo_url'] ) ) {
	return;
}

// Build inline styles if colors provided
$inline_styles = array();
if ( ! empty( $config['bg_color'] ) ) {
	$inline_styles[] = 'background-color: ' . esc_attr( $config['bg_color'] );
}
if ( ! empty( $config['text_color'] ) ) {
	$inline_styles[] = 'color: ' . esc_attr( $config['text_color'] );
}
$style_attr = ! empty( $inline_styles ) ? ' style="' . implode( '; ', $inline_styles ) . ';"' : '';
?>

<div class="lcms-global-footer-ad <?php echo esc_attr( $config['section_modifiers'] ); ?>"<?php echo $style_attr; ?>>
	<div class="lcms-global-footer-ad__container">

		<?php if ( ! empty( $config['logo_url'] ) ) : ?>
			<div class="lcms-global-footer-ad__logo">
				<img
					src="<?php echo esc_url( $config['logo_url'] ); ?>"
					alt="<?php echo esc_attr( $config['logo_alt'] ); ?>"
					class="lcms-global-footer-ad__logo-img"
				>
			</div>
		<?php endif; ?>

		<div class="lcms-global-footer-ad__content">
			<?php if ( ! empty( $config['heading'] ) ) : ?>
				<h3 class="lcms-global-footer-ad__heading">
					<?php echo esc_html( $config['heading'] ); ?>
				</h3>
			<?php endif; ?>

			<?php if ( ! empty( $config['description'] ) ) : ?>
				<p class="lcms-global-footer-ad__description">
					<?php echo esc_html( $config['description'] ); ?>
				</p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $config['button_text'] ) && ! empty( $config['button_url'] ) ) : ?>
			<div class="lcms-global-footer-ad__cta">
				<a
					href="<?php echo esc_url( $config['button_url'] ); ?>"
					class="lcms-global-footer-ad__button"
					target="<?php echo esc_attr( $config['button_target'] ); ?>"
					<?php if ( $config['button_target'] === '_blank' ) : ?>
						rel="noopener noreferrer"
					<?php endif; ?>
				>
					<?php echo esc_html( $config['button_text'] ); ?>
				</a>
			</div>
		<?php endif; ?>

	</div>
</div>
