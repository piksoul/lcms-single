<?php
/**
 * Global CSS Variable Defaults
 *
 * Lean, sensible defaults for quick project setup without client customization.
 * These values are overridden by client-specific config.php files.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Assets/Global
 * @filepath   templates/assets/global/config.php
 */

return [
    /**
     * CSS Variables - Global Defaults
     *
     * Neutral, professional defaults that work for most projects.
     * Override these in client config.php files for brand-specific values.
     */
    'css_variables' => [
        // Neutral default colors
        'color-brand-primary'     => '#333333',
        'color-brand-secondary'   => '#666666',
        'color-brand-accent'      => '#0066cc',
        'color-brand-accent-hover'=> '#0052a3',

        // Text colors
        'color-text-primary'      => '#161617',
        'color-text-secondary'    => '#666666',
        'color-text-tertiary'     => '#999999',
        'color-text-light'        => 'rgba(255, 255, 255, 0.95)',

        // Background colors
        'color-background-light'  => '#f5f5f5',
        'color-background-medium' => '#e0e0e0',
        'color-background-lighter'=> '#e9ecef',
        'color-white'             => '#ffffff',

        // Border colors
        'color-border'            => '#e0e0e0',
        'color-border-light'      => '#e0e0e0',
        'color-border-neutral'    => '#d3d3d3',

        // Status/semantic colors
        'color-success'           => '#4CAF50',
        'color-warning-bg'        => '#fff3cd',
        'color-warning-text'      => '#856404',
        'color-error-bg'          => '#f8d7da',
        'color-error-text'        => '#721c24',

        // Default typography (system fonts for performance)
        'font-heading'            => 'system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif',
        'font-body'               => 'system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif',

        // Default layout
        'doc-max-width'           => '1200px',
        'doc-max-width-wide'      => '1400px',
        'spacing-section'         => '80px',
        'spacing-section-mobile'  => '30px',
        'spacing-heading-bottom'  => '0',
        'spacing-horizontal'      => '20px',

        // Default effects
        'shadow-light'            => '0 4px 20px rgba(0, 0, 0, 0.1)',
        'shadow-medium'           => '0 5px 20px rgba(0, 0, 0, 0.15)',
        'transition-standard'     => 'all 0.3s ease',
        'transition-fast'         => 'all 0.2s ease',

        // Grid defaults
        'grid-gap'                => '40px',
        'grid-gap-medium'         => '30px',
        'grid-gap-mobile'         => '20px',

        // Border defaults
        'border-radius'           => '8px',
        'border-radius-large'     => '12px',

        // Card defaults
        'card-background'         => '#ffffff',
        'card-padding'            => '40px',
        'card-border'             => '2px solid #e0e0e0',
    ],

    /**
     * Global Footer Ad Panel
     *
     * Controls the global footer advertising panel that appears on all pages.
     * Set 'enabled' => false to disable globally, or override in client config.
     */
    'global_footer' => [
        'enabled' => true,  // Set to false to disable globally
        'content' => [
            'heading'       => 'Powered by Brand Hub',
            'description'   => 'Professional brand management made simple',
            'button_text'   => 'Learn More',
            'button_url'    => 'https://brandhub.example.com',
            'button_target' => '_blank',
            'logo_url'      => '',  // Optional: Add logo URL here
            'logo_alt'      => 'Brand Hub',
            'bg_color'      => '',  // Optional: Override gradient with solid color
            'text_color'    => '',  // Optional: Override text color
        ],
    ],

    /**
     * Metadata
     */
    'meta' => [
        'config_version'   => '1.0.0',
        'last_updated'     => '2025-11-18',
        'description'      => 'Global default CSS variables for rapid project setup',
    ],
];
