<?php
/**
 * LeanCMS Template Generator
 *
 * Utility for generating brand-compliant templates from client config files.
 * Demonstrates programmatic consumption of client configuration.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Utilities
 * @filepath   includes/utilities/class-template-generator.php
 */

// Exit if accessed directly.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'LeanCMS_Template_Generator' ) ) {

    /**
     * Template Generator using client config files.
     *
     * Usage:
     *   $generator = new LeanCMS_Template_Generator('refr');
     *   $html = $generator->generate_hero('Welcome to Brand Hub', 'Your subtitle here');
     *   $template = $generator->generate_full_template('landing-page', $sections);
     */
    class LeanCMS_Template_Generator {

        /**
         * Client configuration array.
         *
         * @var array
         */
        private $config;

        /**
         * Client code.
         *
         * @var string
         */
        private $client_code;

        /**
         * Constructor.
         *
         * @param string $client_code Client code (e.g., 'refr').
         *
         * @throws Exception If config file not found.
         */
        public function __construct( string $client_code ) {
            $this->client_code = $client_code;
            $this->load_config();
        }

        /**
         * Load client configuration file.
         *
         * @throws Exception If config file not found or invalid.
         */
        private function load_config(): void {
            $config_path = LEANCMS_PLUGIN_DIR . "templates/pages/{$this->client_code}/config.php";

            if ( ! file_exists( $config_path ) ) {
                throw new Exception( "Config file not found: {$config_path}" );
            }

            $config = include $config_path;

            if ( ! is_array( $config ) ) {
                throw new Exception( "Invalid config file: must return an array" );
            }

            $this->config = $config;
        }

        /**
         * Get configuration value using dot notation.
         *
         * @param string $key     Dot-notation key (e.g., 'brand.colors.primary.navy_dark').
         * @param mixed  $default Default value if key not found.
         *
         * @return mixed
         */
        public function get( string $key, $default = null ) {
            $keys  = explode( '.', $key );
            $value = $this->config;

            foreach ( $keys as $segment ) {
                if ( ! is_array( $value ) || ! isset( $value[ $segment ] ) ) {
                    return $default;
                }
                $value = $value[ $segment ];
            }

            return $value;
        }

        /**
         * Get full config array.
         *
         * @return array
         */
        public function get_config(): array {
            return $this->config;
        }

        /**
         * Generate hero section HTML using config defaults.
         *
         * @param string      $title    Hero title.
         * @param string|null $subtitle Optional subtitle.
         * @param string|null $badge    Optional badge text.
         *
         * @return string Hero HTML.
         */
        public function generate_hero( string $title, ?string $subtitle = null, ?string $badge = null ): string {
            $hero_config = $this->get( 'templates.hero', array() );
            $colors      = $this->get( 'brand.colors' );
            $typography  = $this->get( 'brand.typography' );

            $background     = $hero_config['background'] ?? 'linear-gradient(135deg, #36454f 0%, #708090 100%)';
            $padding_desk   = $hero_config['padding_desktop'] ?? '100px 60px';
            $padding_mobile = $hero_config['padding_mobile'] ?? '80px 30px';

            $heading_font = $typography['fonts']['heading'] ?? 'Arial, sans-serif';
            $h1_size      = $typography['sizes']['hero_h1'] ?? '56px';
            $h1_size_mob  = $typography['sizes_mobile']['hero_h1'] ?? '36px';

            $html = "<style>\n";
            $html .= "    .hero {\n";
            $html .= "        background: {$background};\n";
            $html .= "        color: white;\n";
            $html .= "        padding: {$padding_desk};\n";
            $html .= "        text-align: center;\n";
            $html .= "    }\n\n";

            if ( $badge ) {
                $badge_style = $hero_config['badge_style'] ?? array();
                $badge_bg    = $badge_style['background'] ?? 'rgba(255, 255, 255, 0.2)';
                $badge_pad   = $badge_style['padding'] ?? '8px 20px';

                $html .= "    .hero-badge {\n";
                $html .= "        display: inline-block;\n";
                $html .= "        background: {$badge_bg};\n";
                $html .= "        padding: {$badge_pad};\n";
                $html .= "        border-radius: 20px;\n";
                $html .= "        font-size: 14px;\n";
                $html .= "        margin-bottom: 20px;\n";
                $html .= "        text-transform: uppercase;\n";
                $html .= "        letter-spacing: 1px;\n";
                $html .= "    }\n\n";
            }

            $html .= "    .hero h1 {\n";
            $html .= "        font-size: {$h1_size};\n";
            $html .= "        font-weight: 700;\n";
            $html .= "        font-family: {$heading_font};\n";
            $html .= "        margin-bottom: 25px;\n";
            $html .= "    }\n\n";

            $html .= "    @media (max-width: 768px) {\n";
            $html .= "        .hero { padding: {$padding_mobile}; }\n";
            $html .= "        .hero h1 { font-size: {$h1_size_mob}; }\n";
            $html .= "    }\n";
            $html .= "</style>\n\n";

            $html .= "<section class=\"hero\">\n";

            if ( $badge ) {
                $html .= "    <div class=\"hero-badge\">" . esc_html( $badge ) . "</div>\n";
            }

            $html .= "    <h1>" . esc_html( $title ) . "</h1>\n";

            if ( $subtitle ) {
                $html .= "    <p class=\"hero-subtitle\">" . esc_html( $subtitle ) . "</p>\n";
            }

            $html .= "</section>\n";

            return $html;
        }

        /**
         * Generate card component HTML using config defaults.
         *
         * @param string      $title       Card title.
         * @param string      $description Card description.
         * @param string|null $icon        Optional icon/emoji.
         *
         * @return string Card HTML.
         */
        public function generate_card( string $title, string $description, ?string $icon = null ): string {
            $card_config = $this->get( 'templates.card', array() );

            $bg           = $card_config['background'] ?? '#EDF1F8';
            $border       = $card_config['border'] ?? '2px solid #DAE3F3';
            $border_rad   = $card_config['border_radius'] ?? '10px';
            $padding      = $card_config['padding'] ?? '30px';
            $hover_shadow = $card_config['hover_shadow'] ?? '0 5px 20px rgba(0, 0, 0, 0.1)';

            $html = "<div class=\"card\">\n";

            if ( $icon ) {
                $html .= "    <div class=\"card-icon\">{$icon}</div>\n";
            }

            $html .= "    <h3>" . esc_html( $title ) . "</h3>\n";
            $html .= "    <p>" . esc_html( $description ) . "</p>\n";
            $html .= "</div>\n";

            return $html;
        }

        /**
         * Generate CTA button HTML using config defaults.
         *
         * @param string $text Button text.
         * @param string $url  Button URL.
         *
         * @return string Button HTML.
         */
        public function generate_cta( string $text, string $url ): string {
            $cta_config = $this->get( 'templates.cta', array() );

            $bg         = $cta_config['background'] ?? '#037DED';
            $color      = $cta_config['color'] ?? '#FFFFFF';
            $hover_bg   = $cta_config['hover_bg'] ?? '#2998FF';
            $padding    = $cta_config['padding'] ?? '16px 18px';
            $border_rad = $cta_config['border_radius'] ?? '8px';

            return sprintf(
                '<a href="%s" class="cta-button">%s</a>',
                esc_url( $url ),
                esc_html( $text )
            );
        }

        /**
         * Generate complete template file.
         *
         * @param string $page_name    Page name for template (e.g., 'landing-page').
         * @param string $title        Page title.
         * @param string $description  Template description.
         * @param string $content_html Template content HTML.
         *
         * @return string Complete PHP template file content.
         */
        public function generate_full_template(
            string $page_name,
            string $title,
            string $description,
            string $content_html
        ): string {
            $client_name = $this->get( 'client.name', $this->client_code );
            $filepath    = "templates/pages/{$this->client_code}/slug-{$page_name}.php";

            $fonts_url = $this->get( 'fonts.google_fonts_url', '' );

            $template = "<?php\n";
            $template .= "/**\n";
            $template .= " * {$client_name} - {$title}\n";
            $template .= " *\n";
            $template .= " * {$description}\n";
            $template .= " *\n";
            $template .= " * @package    LeanCMS_Plugin\n";
            $template .= " * @subpackage Templates/Pages\n";
            $template .= " * @filepath   {$filepath}\n";
            $template .= " */\n\n";

            $template .= "defined('ABSPATH') || exit;\n";
            $template .= "get_header();\n";
            $template .= "?>\n\n";

            if ( $fonts_url ) {
                $template .= "<!-- Google Fonts -->\n";
                $template .= "<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">\n";
                $template .= "<link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>\n";
                $template .= "<link href=\"{$fonts_url}\" rel=\"stylesheet\">\n\n";
            }

            $template .= $content_html;

            $template .= "\n<?php get_footer(); ?>\n";

            return $template;
        }

        /**
         * Generate color palette CSS variables.
         *
         * Useful for creating consistent CSS custom properties.
         *
         * @return string CSS :root variables.
         */
        public function generate_css_variables(): string {
            $colors = $this->get( 'brand.colors', array() );

            $css = ":root {\n";

            // Primary colors
            if ( isset( $colors['primary'] ) ) {
                foreach ( $colors['primary'] as $name => $value ) {
                    $css .= "    --color-primary-{$name}: {$value};\n";
                }
            }

            // Accent colors
            if ( isset( $colors['accent'] ) ) {
                foreach ( $colors['accent'] as $name => $value ) {
                    $css .= "    --color-accent-{$name}: {$value};\n";
                }
            }

            // Background colors
            if ( isset( $colors['background'] ) ) {
                foreach ( $colors['background'] as $name => $value ) {
                    $css .= "    --color-bg-{$name}: {$value};\n";
                }
            }

            $css .= "}\n";

            return $css;
        }

        /**
         * Validate template against client brand standards.
         *
         * @param string $template_content Template PHP content.
         *
         * @return array Validation results with 'valid' boolean and 'errors' array.
         */
        public function validate_template( string $template_content ): array {
            $errors        = array();
            $validation    = $this->get( 'validation.required_elements', array() );
            $color_palette = array();

            // Flatten color palette for validation
            $colors = $this->get( 'brand.colors', array() );
            foreach ( $colors as $category ) {
                if ( is_array( $category ) ) {
                    $color_palette = array_merge( $color_palette, array_values( $category ) );
                }
            }

            // Check required elements
            if ( ! empty( $validation['docblock'] ) && ! preg_match( '/@filepath/', $template_content ) ) {
                $errors[] = 'Missing @filepath in docblock';
            }

            if ( ! empty( $validation['security_check'] ) && ! preg_match( "/defined\('ABSPATH'\)/", $template_content ) ) {
                $errors[] = 'Missing security check: defined(\'ABSPATH\') || exit;';
            }

            if ( ! empty( $validation['get_header'] ) && ! preg_match( '/get_header\(\)/', $template_content ) ) {
                $errors[] = 'Missing get_header() call';
            }

            if ( ! empty( $validation['get_footer'] ) && ! preg_match( '/get_footer\(\)/', $template_content ) ) {
                $errors[] = 'Missing get_footer() call';
            }

            return array(
                'valid'  => empty( $errors ),
                'errors' => $errors,
            );
        }
    }
}
