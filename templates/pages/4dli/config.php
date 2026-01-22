<?php
/**
 * 4D Library Client Configuration
 *
 * Streamlined configuration containing only actively-used sections.
 * Colors are defined once and programmatically generated for CSS variables
 * and brand guide display.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages/4dli
 * @filepath   templates/pages/4dli/config.php
 */

/**
 * Helper: Convert hex color to RGB string
 *
 * @param string $hex Hex color code (with or without #)
 * @return string RGB values as "r, g, b"
 */
if ( ! function_exists( 'hex_to_rgb' ) ) {
    function hex_to_rgb( $hex ) {
        $hex = ltrim( $hex, '#' );
        $r = hexdec( substr( $hex, 0, 2 ) );
        $g = hexdec( substr( $hex, 2, 2 ) );
        $b = hexdec( substr( $hex, 4, 2 ) );
        return "$r, $g, $b";
    }
}

$pro_sites_colors = array(
// 4D Library base tokens
    'background-primary'       => '#101010',
    'background-secondary'     => '#222222',
    'background-light'         => '#e1e1e1',
    'background-lighter'       => '#f9f9f9',
    'font-color-primary'       => '#101010',
    'font-color-secondary'     => '#333333',
    'font-color-rev'           => '#ffffff',
    'font-color-link'          => '#9bb026',
    'font-color-hover'         => '#abc966',
    'font-color-rev-hover'     => '#abc966',
    'button-background'        => '#9bb026',
    'button-background-hover'  => '#abc966',
    'button-color'             => '#ffffff',
    'button-color-hover'       => '#ffffff',
);

/**
 * Color Definitions - Single Source of Truth
 *
 * Define colors once with metadata for both CSS variables and brand guide.
 * Keys match CSS variable names for system compatibility.
 */
$colors = array(
    'background-primary' => array(
        'hex'   => $pro_sites_colors['background-primary'],
        'name'  => 'Primary',
        'usage' => 'Primary backgrounds, hero sections',
    ),
    'background-secondary' => array(
        'hex'   => $pro_sites_colors['background-secondary'],
        'name'  => 'Secondary',
        'usage' => 'Headings, emphasis elements',
    ),
    'accent-primary' => array(
        'hex'   => $pro_sites_colors['font-color-link'],
        'name'  => 'Accent',
        'usage' => 'Links, buttons, CTAs',
    ),
    'accent-secondary' => array(
        'hex'   => $pro_sites_colors['font-color-hover'],
        'name'  => 'Hover',
        'usage' => 'Hover states, interactions',
    ),
    'surface-light' => array(
        'hex'   => $pro_sites_colors['background-light'],
        'name'  => 'Light',
        'usage' => 'Panels, cards, backgrounds',
    ),
    'text-primary' => array(
        'hex'   => $pro_sites_colors['font-color-primary'],
        'name'  => 'Text',
        'usage' => 'Body text, primary content',
    ),
);

return array(

    /**
     * Resources
     *
     * Configuration for automatic resource loading (CSS, fonts, etc.).
     * When auto_load is enabled, templates only need to call:
     * load_client_resources('4dli');
     *
     * Used by: class-helpers.php, loader.php
     */
    'resources' => array(
        'auto_load'    => true,                                      // Enable automatic resource loading
        'stylesheets'  => array('base.css'),                         // Which global stylesheets to load (brand-guide.css auto-loads)
        'google_fonts' => true,                                      // Enable Google Fonts loading
    ),

    /**
     * CSS Variable Overrides
     *
     * Programmatically generated from $colors array above.
     * Includes both system colors (actual hex) and template colors (CSS var references).
     * Override global defaults with 4D Library brand-specific values.
     *
     * Used by: loader.php (outputs to :root), 20+ template files
     */
    'css_variables' => array(
        // System colors (compatibility with other systems) - actual hex values
        'background-primary'       => $colors['background-primary']['hex'],
        'background-secondary'     => $colors['background-secondary']['hex'],
        'accent-primary'           => $colors['accent-primary']['hex'],
        'accent-secondary'         => $colors['accent-secondary']['hex'],
        'surface-light'            => $colors['surface-light']['hex'],
        'text-primary'             => $colors['text-primary']['hex'],

        // optional base border tokens
        'border-light'             => $colors['surface-light']['hex'],
        'border-neutral'           => $colors['accent-primary']['hex'],

        // Template colors (what templates reference) - CSS variable references
        'color-brand-primary'      => 'var(--background-primary)',
        'color-brand-secondary'    => 'var(--background-secondary)',
        'color-brand-accent'       => 'var(--accent-primary)',
        'color-brand-accent-hover' => 'var(--accent-secondary)',
        'color-background-light'   => 'var(--surface-light)',
        'color-text-primary'       => 'var(--text-primary)',
        'color-text-light'         => 'rgba(255, 255, 255, 0.95)',
        'color-border-light'       => '#D6E0EE',
        'color-border-neutral'     => '#D3D3D3',

        // 4D Library typography (Google Fonts)
        'font-heading'             => "'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif",
        'font-body'                => "'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif",

        // Layout adjustments
        'doc-max-width'            => '992px',
        'doc-max-width-wide'       => '1200px',
        'spacing-section'          => '80px 60px',
        'spacing-section-mobile'   => '60px 30px',

        // Effects
        'shadow-light'             => '0 4px 20px rgba(0, 0, 0, 0.08)',
        'shadow-medium'            => '0 5px 24px rgba(0, 0, 0, 0.12)',
        'transition-standard'      => 'all 0.3s ease',
        'transition-fast'          => 'all 0.2s ease',
    ),

    /**
     * Google Fonts Configuration
     *
     * Used by: loader.php (for preconnect and font loading)
     */
    'fonts' => array(
        'google_fonts_url' => 'https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap',
        'preconnect'       => array(
            'https://fonts.googleapis.com',
            'https://fonts.gstatic.com',
        ),
    ),

    /**
     * Brand Guide Content
     *
     * Content for the brand guide page - colors, typography, logos.
     * Colors are programmatically generated from $colors array defined above.
     *
     * Used by: slug-brand-guide.php
     */
    'brand_guide' => array(

        /**
         * Hero Section
         */
        'hero' => array(
            'logo'     => 'https://static.brand-hub.com.au/client/4dli/4D-Logo.svg',
            'logo_alt' => '4D Library',
            'badge'    => 'Brand Guidelines',
            'title'    => '4D Library',
            'subtitle' => 'Advanced Tools for Archicad',
        ),

        /**
         * Color Palette
         *
         * Programmatically generated from $colors array above.
         * Hex and RGB values are computed automatically.
         */
        'colors' => array(
            'label'       => 'Visual Identity',
            'title'       => 'Color Palette',
            'description' => 'Our color palette combines deep navy blues with vibrant accents, reflecting professionalism, trust, and technical precision for the Australian architecture community.',
            'colors'      => array_map(function($key) use ($colors) {
                return array(
                    'hex'   => $colors[$key]['hex'],
                    'rgb'   => hex_to_rgb($colors[$key]['hex']),
                    'name'  => $colors[$key]['name'],
                    'usage' => $colors[$key]['usage'],
                );
            }, array_keys($colors)),
        ),

        /**
         * Typography System
         */
        'typography' => array(
            'label'       => 'Typography',
            'title'       => 'Type System',
            'description' => 'Our typography combines the bold Montserrat for headings with the clean, readable Roboto for body text. This creates a professional, modern aesthetic that commands attention while remaining approachable.',
            'specimens'   => array(
                array(
                    'label'        => 'Heading XL',
                    'class'        => 'heading-xl',
                    'text'         => 'ADVANCED TOOLS FOR ARCHICAD',
                    'font'         => 'Montserrat',
                    'size'         => '52px',
                    'weight'       => '700 (Bold)',
                    'transform'    => 'None',
                    'line_height'  => '1.15',
                ),
                array(
                    'label'        => 'Heading Large',
                    'class'        => 'heading-lg',
                    'text'         => 'Beyond the Box',
                    'font'         => 'Montserrat',
                    'size'         => '38px',
                    'weight'       => '700 (Bold)',
                    'transform'    => 'None',
                    'line_height'  => '1.15',
                ),
                array(
                    'label'        => 'Heading Medium',
                    'class'        => 'heading-md',
                    'text'         => 'Documentation Excellence',
                    'font'         => 'Montserrat',
                    'size'         => '20px',
                    'weight'       => '600 (Semi-Bold)',
                    'transform'    => 'None',
                    'line_height'  => '1.3',
                ),
                array(
                    'label'        => 'Body Large',
                    'class'        => 'body-lg',
                    'text'         => 'A comprehensive Archicad library and toolset built specifically for Australian architects and designers, with over 300 parametric parts and documentation-focused workflows.',
                    'font'         => 'Roboto',
                    'size'         => '17px',
                    'weight'       => '400 (Regular)',
                    'transform'    => '',
                    'line_height'  => '1.7',
                ),
                array(
                    'label'        => 'Body Medium',
                    'class'        => 'body-md',
                    'text'         => 'Third-party library for Archicad in use for 15+ years. Streamline documentation, improve accuracy, and maintain consistency with smart parametric objects designed for Australian standards.',
                    'font'         => 'Roboto',
                    'size'         => '15px',
                    'weight'       => '400 (Regular)',
                    'transform'    => '',
                    'line_height'  => '1.7',
                ),
            ),
        ),

        /**
         * Logo Guidelines
         */
        'logos' => array(
            'label'       => 'Logo Guidelines',
            'title'       => 'Logo Usage',
            'description' => 'The 4D Library logo features clean, technical typography. Use logo variations appropriately based on context and background.',
            'logos'       => array(
                array(
                    'image'       => 'https://static.brand-hub.com.au/client/4dli/4D-Logo.svg',
                    'title'       => 'Primary Logo',
                    'description' => 'Main logo for formal usage. Use on light backgrounds with proper clear space.',
                ),
                array(
                    'image'       => 'https://static.brand-hub.com.au/client/4dli/4D-Symbol.svg',
                    'title'       => 'Symbol Mark',
                    'description' => 'Simplified mark for compact applications, social media profiles, and app icons.',
                ),
            ),
        ),

        /**
         * Brand Guidelines (Do's and Don'ts)
         */
        'guidelines' => array(
            'label'       => 'Best Practices',
            'title'       => 'Brand Guidelines',
            'description' => 'Follow these guidelines to maintain brand integrity and ensure consistent application across all touchpoints.',
            'do'          => array(
                'Use Montserrat Bold for all headings',
                'Use Roboto Regular for body text',
                'Maintain proper clear space around logo',
                'Use navy blues for primary elements',
                'Use bright blue for CTAs and links',
                'Keep messaging focused on technical precision',
                'Use approved logo variations only',
                'Follow Australian documentation standards',
            ),
            'dont'        => array(
                'Alter logo colors or proportions',
                'Use fonts other than Montserrat and Roboto',
                'Stretch or distort the logo',
                'Use unapproved color combinations',
                'Place logo on busy backgrounds',
                'Use marketing fluff or vague claims',
                'Mix old and new brand elements',
                'Ignore Australian BIM standards',
            ),
        ),
    ),

);
