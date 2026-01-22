$section_config = [
    'settings' => [
        // Visibility control - hide/show section
        'visibility' => true,  // boolean, default: true
        
        // Dark mode styling - applies .dark-mode class
        'dark_mode' => false,  // boolean, default: false
        
        // Custom spacing - CSS values for top/bottom padding
        'spacing_top' => '3rem',     // string|null, default: null (e.g., '2rem', '40px', '3em')
        'spacing_bottom' => '3rem',  // string|null, default: null
        
        // Custom HTML ID - uses auto-generated 'lcms-{uniqid}' if not provided
        'custom_id' => 'my-section',  // string, default: '' (auto-generated)
        
        // Additional CSS classes - appended to base section classes
        'custom_classes' => 'my-custom-class another-class',  // string, default: ''
        
        // Inline CSS styles - additional inline styles
        'custom_css' => 'background-color: #f5f5f5; border: 1px solid #ddd;',  // string, default: ''
        
        // Data attributes - array of key-value pairs for data-* attributes
        'data_attrs' => [
            'track-id' => '12345',      // renders as: data-track-id="12345"
            'category' => 'features',    // renders as: data-category="features"
        ],  // array, default: []
    ],
    
    'pre_html' => '<div class="custom-wrapper">',  // Optional: HTML before header
    
    'header' => [
        'heading' => [...]  // See heading component config
    ],
    
    'content' => [
        // Available types: text, image, video, html, card, grid, row, stack, heading, buttons
        'type' => 'text',  // Required: content type
        // ...type-specific properties
    ],
    
    'footer' => [
        'buttons' => [...]  // See buttons component config
    ],
    
    'post_html' => '</div>',  // Optional: HTML after footer
];