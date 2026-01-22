<?php
/**
 * Tailwind Demo Page Template
 *
 * Example page demonstrating Tailwind + DaisyUI partials.
 * To use: Create a page with slug "tailwind-demo" and select "LeanCMS Full Page" template.
 *
 * @filepath templates/pages/slug-tailwind-demo.php
 */

get_header();
?>

<!-- Tailwind CSS + DaisyUI -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/tailwind/tailwind.css">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Set DaisyUI theme -->
<div data-theme="lcms">

<?php
// ============================================
// HERO SECTION
// ============================================
$hero = [
    'badge'    => 'Tailwind + DaisyUI',
    'title'    => 'Modern Styling Made Simple',
    'subtitle' => 'This page demonstrates the new Tailwind CSS partial system with DaisyUI components.',
    'buttons'  => [
        ['text' => 'Get Started', 'url' => '/contact', 'style' => 'primary'],
        ['text' => 'Learn More', 'url' => '/about', 'style' => 'outline'],
    ],
    'dark'       => false,
    'min_height' => '70vh',
];

partial('hero', $hero, 'tailwind');

// ============================================
// FEATURES GRID
// ============================================
$features = [
    'id'       => 'features',
    'label'    => 'Why Tailwind?',
    'title'    => 'Utility-First Benefits',
    'subtitle' => 'Build modern interfaces faster with pre-built components and utility classes.',
    'columns'  => 3,
    'cards'    => [
        [
            'icon'    => '⚡',
            'title'   => 'Rapid Development',
            'content' => 'Build UIs faster with utility classes. No context switching between HTML and CSS.',
        ],
        [
            'icon'    => '🎨',
            'title'   => 'DaisyUI Components',
            'content' => 'Pre-built, themeable components like buttons, cards, and modals out of the box.',
        ],
        [
            'icon'    => '📱',
            'title'   => 'Responsive by Default',
            'content' => 'Mobile-first breakpoints make responsive design straightforward and consistent.',
        ],
        [
            'icon'    => '🎯',
            'title'   => 'Tiny Bundle Size',
            'content' => 'JIT compiler only includes classes you use. Typically 15-30KB gzipped.',
        ],
        [
            'icon'    => '🌙',
            'title'   => 'Dark Mode Ready',
            'content' => 'Theme switching built-in. Light, dark, or custom themes with CSS variables.',
        ],
        [
            'icon'    => '🔧',
            'title'   => 'Easy Customization',
            'content' => 'Extend or override anything via tailwind.config.js. Full control when needed.',
        ],
    ],
];

partial('card-grid', $features, 'tailwind');

// ============================================
// CONTENT SECTION
// ============================================
$about = [
    'id'       => 'about',
    'label'    => 'How It Works',
    'title'    => 'Two Partial Systems, One Plugin',
    'content'  => '
        <p>LeanCMS now supports two parallel styling systems:</p>
        <ul>
            <li><strong>Pro-Sites (BEM)</strong> - The original custom CSS system with CSS variables</li>
            <li><strong>Tailwind</strong> - Modern utility-first CSS with DaisyUI components</li>
        </ul>
        <p>Templates can choose which system to use. Both work with the same partial() function - just specify the folder:</p>
        <pre><code>partial(\'hero\', $config, \'pro-sites\');  // BEM CSS
partial(\'hero\', $config, \'tailwind\');   // Tailwind + DaisyUI</code></pre>
        <p>Migrate gradually or use both systems on different pages. Full flexibility.</p>
    ',
    'centered' => true,
    'narrow'   => true,
];

partial('section', $about, 'tailwind');
?>

</div><!-- end data-theme -->

<?php get_footer(); ?>
