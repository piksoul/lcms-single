<?php
/**
 * Reframe WA Client Configuration
 *
 * Machine-readable configuration for programmatic template generation,
 * validation, and AI-assisted development.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages/REFR
 * @filepath   templates/pages/refr/config.php
 */

return array(

    /**
     * CSS Variable Overrides
     *
     * Override global defaults with Reframe WA brand-specific values.
     * Only include variables that differ from global defaults.
     * Values from this section override templates/assets/global/config.php.
     */
    'css_variables' => array(
        // Reframe WA brand colors
        'color-brand-primary'     => '#08093E',
        'color-brand-secondary'   => '#12195B',
        'color-brand-accent'      => '#037DED',
        'color-brand-accent-hover'=> '#2998FF',
        'color-text-primary'      => '#161617',
        'color-text-light'        => 'rgba(255, 255, 255, 0.95)',
        'color-background-light'  => '#EDF1F8',
        'color-border-light'      => '#DAE3F3',
        'color-border-neutral'    => '#d3d3d3',

        // Reframe WA typography (Google Fonts)
        'font-heading'            => "'Raleway', Arial, Helvetica, sans-serif",
        'font-body'               => "'Inter', Arial, Helvetica, sans-serif",

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
        'code'         => 'refr',
        'name'         => 'Reframe WA',
        'full_name'    => 'Reframe WA - Leadership & Executive Coaching',
        'industry'     => 'Leadership & Executive Coaching',
        'website'      => 'https://reframewa.com',
        'founded'      => '2025',
        'tagline'      => 'Leadership isn\'t a title. It\'s how you show up.',
        'description'  => 'Leadership and executive coaching consultancy founded by Dr Nancy Pavisich, focusing on individual transformation and professional development.',
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
                'navy_dark'   => '#08093E',  // Dark navy (hero gradients)
                'navy_medium' => '#0A0C4F',  // Medium navy (hero gradients)
                'navy_blue'   => '#12195B',  // Navy blue (headings)
            ),

            // Accent Colors
            'accent' => array(
                'blue'        => '#037DED',  // Primary CTA blue
                'blue_hover'  => '#2998FF',  // CTA hover state
            ),

            // Background Colors
            'background' => array(
                'light'       => '#EDF1F8',  // Card backgrounds
                'white'       => '#FFFFFF',  // Pure white
                'border'      => '#DAE3F3',  // Card borders
            ),

            // Text Colors
            'text' => array(
                'body'        => '#161617',  // Body text
                'heading'     => '#12195B',  // Headings
                'light'       => '#708090',  // Light text (not primary brand, used for contrast)
            ),

            // Gradients (CSS format)
            'gradients' => array(
                'hero'        => 'linear-gradient(135deg, #08093E 0%, #0A0C4F 100%)',
                'navy'        => 'linear-gradient(135deg, #08093E 0%, #0A0C4F 100%)',
            ),
        ),

        /**
         * Typography
         *
         * Font families, weights, and sizing scale.
         */
        'typography' => array(
            'fonts' => array(
                'heading'     => "'Raleway', Arial, Helvetica, sans-serif",
                'body'        => "'Inter', Arial, Helvetica, sans-serif",
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
                'card'        => '2px solid #DAE3F3',
                'cta'         => '3px solid #037DED',
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
            'background'       => 'linear-gradient(135deg, #08093E 0%, #0A0C4F 100%)',
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
            'include_logo'     => false,  // Set true if hero needs logo
            'logo_max_width'   => '200px',
        ),

        /**
         * Card/Container Defaults
         */
        'card' => array(
            'background'       => '#EDF1F8',
            'border'           => '2px solid #DAE3F3',
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
            'background'       => '#037DED',
            'color'            => '#FFFFFF',
            'hover_bg'         => '#2998FF',
            'padding'          => '16px 18px',
            'border_radius'    => '8px',
            'font_size'        => '16px',
            'font_weight'      => '700',
            'text_transform'   => 'uppercase',
            'letter_spacing'   => '1px',
            'hover_transform'  => 'translateY(-2px)',
            'hover_shadow'     => '0 6px 20px rgba(3, 125, 237, 0.3)',
        ),

        /**
         * Form Defaults (Password Gates, Contact Forms)
         */
        'form' => array(
            'container_bg'     => '#FFFFFF',
            'container_padding' => '50px',
            'container_border' => '3px solid #037DED',
            'container_radius' => '10px',
            'container_shadow' => '0 4px 20px rgba(0, 0, 0, 0.1)',
            'input_border'     => '2px solid #DAE3F3',
            'input_focus_border' => '#037DED',
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
     * Brand Guide Content
     *
     * Configuration for brand guide page sections (color palette, etc.)
     */
    'brand_guide' => array(
        'color_palette' => array(
            'label' => 'Visual Identity',
            'title' => 'Color Palette',
            'description' => 'Our color palette combines deep navy blues with vibrant accents, reflecting professionalism, trust, and transformation. Use these colors consistently across all brand materials.',
            'colors' => array(
                array(
                    'hex' => '#08093E',
                    'rgb' => '8, 9, 62',
                    'name' => 'Primary Navy',
                    'usage' => 'Primary backgrounds, headers',
                ),
                array(
                    'hex' => '#12195B',
                    'rgb' => '18, 25, 91',
                    'name' => 'Secondary Navy',
                    'usage' => 'Headings, emphasis',
                ),
                array(
                    'hex' => '#037DED',
                    'rgb' => '3, 125, 237',
                    'name' => 'Bright Blue',
                    'usage' => 'Links, buttons, CTAs',
                ),
                array(
                    'hex' => '#DAE3F3',
                    'rgb' => '218, 227, 243',
                    'name' => 'Light Blue',
                    'usage' => 'Backgrounds, borders',
                ),
                array(
                    'hex' => '#161617',
                    'rgb' => '22, 22, 23',
                    'name' => 'Text Primary',
                    'usage' => 'Body text, primary content',
                ),
                array(
                    'hex' => '#2998FF',
                    'rgb' => '41, 152, 255',
                    'name' => 'Hover Blue',
                    'usage' => 'Hover states, interactions',
                ),
            ),
        ),

        'typography' => array(
            'label' => 'Typography',
            'title' => 'Type System',
            'description' => 'Our typography combines the bold, uppercase Raleway for headings with the clean, readable Inter for body text. This creates a professional, modern aesthetic that commands attention while remaining approachable.',
            'specimens' => array(
                array(
                    'label' => 'Heading XL',
                    'class' => 'heading-xl',
                    'text' => 'REFRAME WA CONSULTING',
                    'font' => 'Raleway',
                    'size' => '56px',
                    'weight' => '700 (Bold)',
                    'transform' => 'Uppercase',
                    'line_height' => '1.1',
                ),
                array(
                    'label' => 'Heading Large',
                    'class' => 'heading-lg',
                    'text' => 'REVIEW RENEW REGENERATE',
                    'font' => 'Raleway',
                    'size' => '42px',
                    'weight' => '700 (Bold)',
                    'transform' => 'Uppercase',
                    'line_height' => '1.1',
                ),
                array(
                    'label' => 'Heading Medium',
                    'class' => 'heading-md',
                    'text' => 'LEADERSHIP TRANSFORMATION',
                    'font' => 'Raleway',
                    'size' => '32px',
                    'weight' => '700 (Bold)',
                    'transform' => 'Uppercase',
                    'line_height' => '1.1',
                ),
                array(
                    'label' => 'Body Large',
                    'class' => 'body-lg',
                    'text' => 'Leadership coaching that helps professionals understand how others perceive them and develop authentic executive presence through our proven Review, Renew, and Regenerate process.',
                    'font' => 'Inter',
                    'size' => '18px',
                    'weight' => '400 (Regular)',
                    'transform' => '',
                    'line_height' => '1.65',
                ),
                array(
                    'label' => 'Body Medium',
                    'class' => 'body-md',
                    'text' => 'Our transformative approach combines 25+ years of experience with proven frameworks to help leaders develop self-awareness, authentic presence, and executive impact. We guide professionals through meaningful change that lasts.',
                    'font' => 'Inter',
                    'size' => '15px',
                    'weight' => '400 (Regular)',
                    'transform' => '',
                    'line_height' => '1.65',
                ),
            ),
        ),

        'logo_usage' => array(
            'label' => 'Logo Guidelines',
            'title' => 'Logo Usage',
            'description' => 'The Reframe WA logo features a distinctive \'R\' symbol within a frame, representing transformation and structure. Use logo variations appropriately based on context and background.',
            'logos' => array(
                array(
                    'image' => 'https://static.brand-hub.com.au/client/refr/ReframeWALogo-Vert.svg',
                    'title' => 'Primary Vertical',
                    'description' => 'Main logo in formal vertical arrangement. Use on light backgrounds with symbol above text and "REVIEW RENEW REGENERATE" tagline.',
                ),
                array(
                    'image' => 'https://static.brand-hub.com.au/client/refr/ReframeWALogo-Horiz.svg',
                    'title' => 'Horizontal Layout',
                    'description' => 'Horizontal arrangement with symbol on left. Ideal for headers, letterheads, and landscape formats where vertical space is limited.',
                ),
                array(
                    'image' => 'https://static.brand-hub.com.au/client/refr/ReframeWALogo-Horiz-REV.svg',
                    'title' => 'Reversed/White',
                    'description' => 'White logo on navy blue (#08093E) or dark backgrounds. Maintains brand visibility and contrast on dark surfaces.',
                    'bg_color' => '#08093E',
                    'text_color' => 'white',
                ),
                array(
                    'image' => 'https://static.brand-hub.com.au/client/refr/ReframeWALogo-Symbol.svg',
                    'title' => 'Symbol Mark',
                    'description' => 'Standalone \'R\' frame symbol for compact applications, social media profiles, app icons, and brand patterns.',
                ),
            ),
        ),

        'guidelines' => array(
            'label' => 'Best Practices',
            'title' => 'Brand Guidelines',
            'description' => 'Follow these guidelines to maintain brand integrity and ensure consistent application across all touchpoints.',
            'do' => array(
                'Use Raleway Bold Uppercase for all headings',
                'Use Inter Regular for body text',
                'Maintain proper clear space around logo',
                'Use navy blues (#08093E, #12195B) for primary elements',
                'Use bright blue (#037DED) for CTAs and links',
                'Apply gradients from brand palette',
                'Use approved logo variations only',
                'Follow "REVIEW RENEW REGENERATE" messaging',
            ),
            'dont' => array(
                'Alter logo colors or proportions',
                'Use fonts other than Raleway and Inter',
                'Use lowercase for headings',
                'Stretch or distort the \'R\' symbol',
                'Use unapproved color combinations',
                'Place logo on busy backgrounds',
                'Remove tagline from primary logo',
                'Mix old and new brand elements',
            ),
        ),
    ),

    /**
     * Assets & Resources
     */
    'assets' => array(
        'base_path'        => 'https://static.brand-hub.com.au/client/refr/',
        'logo_vertical'    => 'ReframeWALogo-Vert_REV.svg',
        'logo_horizontal'  => null,  // Add if available
        'favicon'          => null,
        'og_image'         => null,  // Social sharing image
    ),

    /**
     * Google Fonts Configuration
     */
    'fonts' => array(
        'google_fonts_url' => 'https://fonts.googleapis.com/css2?family=Raleway:wght@700&family=Inter:wght@400&display=swap',
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
            'tone'         => 'Professional, authoritative, transformational',
            'voice'        => 'Second person ("you"), action-oriented',
            'avoid'        => array('jargon', 'overly corporate language'),
            'emphasize'    => array('transformation', 'leadership identity', 'professional growth'),
        ),

        'template_structure' => array(
            'hero'         => 'Always include navy gradient hero with clear value proposition',
            'sections'     => 'Use consistent section labels (uppercase, 14px, letter-spacing 2px)',
            'headings'     => 'H2 section titles should be 42px, Raleway 700, navy blue (#12195B)',
            'cards'        => 'Use light background (#EDF1F8) with 2px borders, 10px radius',
            'ctas'         => 'Primary CTAs always blue (#037DED), prominent, action-oriented',
            'spacing'      => 'Generous whitespace, 80px section padding on desktop',
        ),

        'content_patterns' => array(
            'hero_headline'    => 'Bold, uppercase, transformation-focused',
            'hero_subtitle'    => 'Clear value proposition, Raleway 700, letter-spacing 3px',
            'section_intros'   => 'Brief, benefit-oriented, set context',
            'card_structure'   => 'Icon → Heading → Description format',
            'testimonials'     => 'Focus on transformation and results',
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
            'primary_navy'     => '#12195B',  // Headings must use this
            'primary_cta'      => '#037DED',  // CTAs must use this
            'no_arbitrary'     => true,       // Don't use colors not in palette
        ),

        'typography_rules' => array(
            'heading_font'     => 'Raleway',
            'body_font'        => 'Inter',
            'min_font_size'    => '14px',
            'max_line_length'  => '900px',  // Readability
        ),
    ),

    /**
     * Version & Maintenance
     */
    'meta' => array(
        'config_version'   => '1.0.0',
        'last_updated'     => '2025-11-07',
        'maintained_by'    => 'LeanCMS Brand Hub Team',
        'review_cycle'     => 'Quarterly',  // How often to review config
    ),

);
