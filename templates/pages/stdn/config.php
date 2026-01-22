<?php
/**
 * St Denis School Client Configuration
 *
 * Machine-readable configuration for programmatic template generation,
 * validation, and AI-assisted development.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages/STDN
 * @filepath   templates/pages/stdn/config.php
 */

return array(

    /**
     * CSS Variable Overrides
     *
     * Override global defaults with St Denis School brand-specific values.
     * Only include variables that differ from global defaults.
     * Values from this section override templates/assets/global/config.php.
     */
    'css_variables' => array(
        // St Denis School brand colors (using defaults)
        'color-brand-primary'     => '#2C3E50',
        'color-brand-secondary'   => '#1A252F',
        'color-brand-accent'      => '#3498DB',
        'color-brand-accent-hover'=> '#5DADE2',
        'color-text-primary'      => '#161617',
        'color-text-light'        => 'rgba(255, 255, 255, 0.95)',
        'color-background-light'  => '#F8F9FA',
        'color-border-light'      => '#DEE2E6',
        'color-border-neutral'    => '#d3d3d3',

        // St Denis School typography (Google Fonts)
        'font-heading'            => "'Montserrat', Arial, Helvetica, sans-serif",
        'font-body'               => "'Open Sans', Arial, Helvetica, sans-serif",

        // Layout adjustments
        'doc-max-width'           => '992px',
        'doc-max-width-wide'      => '1200px',
        'spacing-section'         => '80px 60px',
        'spacing-section-mobile'  => '60px 30px',

        // Effects
        'shadow-light'            => '0 4px 20px rgba(0, 0, 0, 0.1)',
        'shadow-medium'           => '0 5px 20px rgba(0, 0, 0, 0.1)',
        'transition-standard'     => 'all 0.3s ease',
        'transition-fast'         => 'all 0.2s ease',
    ),

    /**
     * Client Metadata
     */
    'client' => array(
        'code'         => 'stdn',
        'name'         => 'St Denis School',
        'full_name'    => 'St Denis School',
        'industry'     => 'Education',
        'website'      => '',
        'founded'      => '',
        'tagline'      => '',
        'description'  => 'St Denis School educational institution.',
    ),

    /**
     * Brand Colors
     *
     * All color values in HEX format with semantic naming.
     * Used for automatic template styling and brand consistency.
     */
    'brand' => array(
        'colors' => array(
            // Primary Brand Colors
            'primary' => array(
                'dark'    => '#2C3E50',  // Professional dark blue
                'medium'  => '#34495E',  // Medium blue
                'main'    => '#2C3E50',  // Primary brand color
            ),

            // Accent Colors
            'accent' => array(
                'blue'        => '#3498DB',  // Primary CTA blue
                'blue_hover'  => '#5DADE2',  // CTA hover state
            ),

            // Background Colors
            'background' => array(
                'light'       => '#F8F9FA',  // Card backgrounds
                'white'       => '#FFFFFF',  // Pure white
                'border'      => '#DEE2E6',  // Card borders
            ),

            // Text Colors
            'text' => array(
                'body'        => '#161617',  // Body text
                'heading'     => '#2C3E50',  // Headings
                'light'       => '#6C757D',  // Light text
            ),

            // Gradients (CSS format)
            'gradients' => array(
                'hero'        => 'linear-gradient(135deg, #2C3E50 0%, #34495E 100%)',
                'primary'     => 'linear-gradient(135deg, #2C3E50 0%, #34495E 100%)',
            ),
        ),

        /**
         * Typography
         *
         * Font families, weights, and sizing scale.
         */
        'typography' => array(
            'fonts' => array(
                'heading'     => "'Montserrat', Arial, Helvetica, sans-serif",
                'body'        => "'Open Sans', Arial, Helvetica, sans-serif",
            ),

            'weights' => array(
                'heading'     => 700,  // Bold
                'body'        => 400,  // Regular
                'label'       => 700,  // Bold
            ),

            // Font sizes (desktop)
            'sizes' => array(
                'hero_h1'     => '56px',
                'section_h2'  => '42px',
                'card_h3'     => '20px',
                'subtitle'    => '24px',
                'body'        => '18px',
                'small'       => '15px',
                'label'       => '14px',
            ),

            // Font sizes (mobile)
            'sizes_mobile' => array(
                'hero_h1'     => '36px',
                'section_h2'  => '32px',
                'card_h3'     => '18px',
                'subtitle'    => '18px',
                'body'        => '16px',
            ),

            // Typography settings
            'settings' => array(
                'line_height_body'    => '1.65',
                'line_height_heading' => '1.1',
                'letter_spacing_h1'   => '2px',
                'letter_spacing_label' => '1px',
                'letter_spacing_subtitle' => '3px',
            ),
        ),

        /**
         * Layout & Spacing
         */
        'layout' => array(
            'max_width' => array(
                'content'     => '1200px',
                'narrow'      => '900px',
                'form'        => '700px',
            ),

            'spacing' => array(
                'section_desktop'     => '80px 60px',
                'section_mobile'      => '60px 30px',
                'card_padding_large'  => '50px',
                'card_padding_medium' => '40px',
                'card_padding_small'  => '30px',
                'grid_gap_large'      => '40px',
                'grid_gap_medium'     => '30px',
            ),

            'borders' => array(
                'card'        => '2px solid #DEE2E6',
                'cta'         => '3px solid #3498DB',
                'radius'      => '10px',
                'radius_small' => '8px',
                'radius_badge' => '20px',
            ),

            'breakpoints' => array(
                'mobile'      => '768px',
                'tablet'      => '1024px',
                'desktop'     => '1200px',
            ),
        ),
    ),

    /**
     * Template Defaults
     *
     * Default structure and styling for common template components.
     * Used by template generators to ensure consistency.
     */
    'templates' => array(

        /**
         * Hero Section Defaults
         */
        'hero' => array(
            'background'       => 'linear-gradient(135deg, #2C3E50 0%, #34495E 100%)',
            'text_color'       => '#FFFFFF',
            'padding_desktop'  => '100px 60px',
            'padding_mobile'   => '80px 30px',
            'text_align'       => 'center',
            'include_badge'    => true,
            'badge_style'      => array(
                'background'   => 'rgba(255, 255, 255, 0.2)',
                'padding'      => '8px 20px',
                'border_radius' => '20px',
                'font_size'    => '14px',
                'text_transform' => 'uppercase',
                'letter_spacing' => '1px',
            ),
            'include_logo'     => false,
            'logo_max_width'   => '200px',
        ),

        /**
         * Card/Container Defaults
         */
        'card' => array(
            'background'       => '#F8F9FA',
            'border'           => '2px solid #DEE2E6',
            'border_radius'    => '10px',
            'padding'          => '30px',
            'hover_enabled'    => true,
            'hover_transform'  => 'translateY(-5px)',
            'hover_shadow'     => '0 5px 20px rgba(0, 0, 0, 0.1)',
            'transition'       => 'all 0.3s ease',
        ),

        /**
         * CTA/Button Defaults
         */
        'cta' => array(
            'background'       => '#3498DB',
            'color'            => '#FFFFFF',
            'hover_bg'         => '#5DADE2',
            'padding'          => '16px 18px',
            'border_radius'    => '8px',
            'font_size'        => '16px',
            'font_weight'      => '700',
            'text_transform'   => 'uppercase',
            'letter_spacing'   => '1px',
            'hover_transform'  => 'translateY(-2px)',
            'hover_shadow'     => '0 6px 20px rgba(52, 152, 219, 0.3)',
        ),

        /**
         * Form Defaults (Password Gates, Contact Forms)
         */
        'form' => array(
            'container_bg'     => '#FFFFFF',
            'container_padding' => '50px',
            'container_border' => '3px solid #3498DB',
            'container_radius' => '10px',
            'container_shadow' => '0 4px 20px rgba(0, 0, 0, 0.1)',
            'input_border'     => '2px solid #DEE2E6',
            'input_focus_border' => '#3498DB',
            'input_padding'    => '14px 18px',
            'input_radius'     => '8px',
        ),

        /**
         * Section Defaults
         */
        'section' => array(
            'padding_desktop'  => '80px 60px',
            'padding_mobile'   => '60px 30px',
            'max_width'        => '1200px',
            'margin'           => '0 auto',
        ),

        /**
         * Grid Defaults
         */
        'grid' => array(
            'columns_desktop'  => 3,
            'columns_tablet'   => 2,
            'columns_mobile'   => 1,
            'gap'              => '30px',
        ),
    ),

    /**
     * Assets & Resources
     */
    'assets' => array(
        'base_path'        => '/wp-content/plugins/lcms-brandhub-client/templates/assets/stdn/',
        'logo_vertical'    => null,
        'logo_horizontal'  => null,
        'favicon'          => null,
        'og_image'         => null,  // Social sharing image
    ),

    /**
     * Google Fonts Configuration
     */
    'fonts' => array(
        'google_fonts_url' => 'https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400&display=swap',
        'preconnect'       => array(
            'https://fonts.googleapis.com',
            'https://fonts.gstatic.com',
        ),
    ),

    /**
     * Password Protection Defaults
     */
    'password_protection' => array(
        'enabled'          => true,
        'create_noaccess'  => true,  // Auto-create -noaccess variants
        'show_teaser'      => true,  // Show content teaser on locked pages
        'teaser_sections'  => 4,     // Number of teaser items to show
    ),

    /**
     * AI Generation Instructions
     *
     * Guidance for AI assistants (like Claude) when generating new templates.
     * Ensures brand consistency in automated template creation.
     */
    'ai_instructions' => array(
        'style_guide' => array(
            'tone'         => 'Professional, educational, welcoming',
            'voice'        => 'Clear, accessible, community-focused',
            'avoid'        => array('jargon', 'overly formal language'),
            'emphasize'    => array('education', 'community', 'growth', 'learning'),
        ),

        'template_structure' => array(
            'hero'         => 'Use professional blue gradient hero with clear messaging',
            'sections'     => 'Use consistent section labels (uppercase, 14px, letter-spacing 2px)',
            'headings'     => 'H2 section titles should be 42px, Montserrat 700, dark blue (#2C3E50)',
            'cards'        => 'Use light background (#F8F9FA) with 2px borders, 10px radius',
            'ctas'         => 'Primary CTAs bright blue (#3498DB), clear and action-oriented',
            'spacing'      => 'Generous whitespace, 80px section padding on desktop',
        ),

        'content_patterns' => array(
            'hero_headline'    => 'Clear, welcoming, education-focused',
            'hero_subtitle'    => 'Simple value proposition, Montserrat 700',
            'section_intros'   => 'Brief, informative, set context',
            'card_structure'   => 'Icon → Heading → Description format',
        ),

        'responsive_rules' => array(
            'mobile_first'     => false,  // Desktop-first approach
            'breakpoint'       => '768px',
            'mobile_adjusts'   => 'Reduce font sizes, stack grids, reduce padding',
        ),

        'accessibility' => array(
            'semantic_html'    => true,
            'alt_text'         => 'Required on all images',
            'contrast_ratio'   => 'WCAG AA minimum',
            'focus_states'     => 'Visible on all interactive elements',
        ),
    ),

    /**
     * Validation Rules
     *
     * Used to validate templates against brand standards.
     */
    'validation' => array(
        'required_elements' => array(
            'docblock'         => true,  // PHP docblock with @filepath
            'security_check'   => true,  // defined('ABSPATH') || exit;
            'get_header'       => true,  // get_header() call
            'get_footer'       => true,  // get_footer() call
        ),

        'color_usage' => array(
            'primary_navy'     => '#2C3E50',  // Headings must use this
            'primary_cta'      => '#3498DB',  // CTAs must use this
            'no_arbitrary'     => true,       // Don't use colors not in palette
        ),

        'typography_rules' => array(
            'heading_font'     => 'Montserrat',
            'body_font'        => 'Open Sans',
            'min_font_size'    => '14px',
            'max_line_length'  => '900px',  // Readability
        ),
    ),

    /**
     * Version & Maintenance
     */
    'meta' => array(
        'config_version'   => '1.0.0',
        'last_updated'     => '2025-11-14',
        'maintained_by'    => 'LeanCMS Brand Hub Team',
        'review_cycle'     => 'Quarterly',  // How often to review config
    ),

);
