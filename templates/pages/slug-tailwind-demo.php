<?php
/**
 * Tailwind Demo Page Template
 *
 * Comprehensive demo of Tailwind + DaisyUI partials and components.
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
    'badge'      => 'Tailwind + DaisyUI',
    'title'      => 'Modern Styling Made Simple',
    'subtitle'   => 'Build beautiful, responsive interfaces with utility-first CSS and pre-built components.',
    'buttons'    => [
        ['text' => 'Get Started', 'url' => '#features', 'style' => 'primary'],
        ['text' => 'View Components', 'url' => '/demo-ui-components', 'style' => 'outline'],
    ],
    'dark'       => false,
    'min_height' => '70vh',
];

partial('hero', $hero, 'tailwind');

// ============================================
// STATS SECTION
// ============================================
$stats = [
    'id'    => 'stats',
    'label' => 'By the Numbers',
    'title' => 'Trusted by Developers',
    'stats' => [
        [
            'value' => '50+',
            'label' => 'Components',
            'desc'  => 'Ready to use',
        ],
        [
            'value' => '10+',
            'label' => 'Theme Colors',
            'desc'  => 'Fully customizable',
        ],
        [
            'value' => '< 30KB',
            'label' => 'Bundle Size',
            'desc'  => 'Gzipped CSS',
        ],
        [
            'value' => '100%',
            'label' => 'Responsive',
            'desc'  => 'Mobile-first',
        ],
    ],
];

partial('stats', $stats, 'tailwind');

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
// STEPS / PROCESS SECTION
// ============================================
$process = [
    'id'       => 'process',
    'label'    => 'Getting Started',
    'title'    => 'Simple Setup Process',
    'subtitle' => 'Get up and running in minutes with our streamlined workflow.',
    'steps'    => [
        [
            'title'   => 'Install',
            'content' => 'npm install tailwindcss daisyui',
            'status'  => 'primary',
        ],
        [
            'title'   => 'Configure',
            'content' => 'Add DaisyUI to your config',
            'status'  => 'primary',
        ],
        [
            'title'   => 'Build',
            'content' => 'Run npm run build',
            'status'  => 'primary',
        ],
        [
            'title'   => 'Create',
            'content' => 'Start building components',
            'status'  => '',
        ],
    ],
];

partial('steps', $process, 'tailwind');

// ============================================
// TESTIMONIALS SECTION
// ============================================
$testimonials = [
    'id'           => 'testimonials',
    'label'        => 'Testimonials',
    'title'        => 'What Developers Say',
    'subtitle'     => 'Join thousands of developers building with Tailwind + DaisyUI.',
    'testimonials' => [
        [
            'quote'  => 'Tailwind completely changed how I build interfaces. The utility-first approach just clicks once you try it.',
            'name'   => 'Sarah Chen',
            'role'   => 'Frontend Developer',
            'avatar' => 'https://picsum.photos/seed/sarah/100',
            'rating' => 5,
        ],
        [
            'quote'  => 'DaisyUI gives you beautiful components without the bloat. It\'s the perfect complement to Tailwind.',
            'name'   => 'Marcus Johnson',
            'role'   => 'Full Stack Engineer',
            'avatar' => 'https://picsum.photos/seed/marcus/100',
            'rating' => 5,
        ],
        [
            'quote'  => 'I shipped my last project in half the time. The pre-built components handle 90% of what I need.',
            'name'   => 'Emily Rodriguez',
            'role'   => 'Product Designer',
            'avatar' => 'https://picsum.photos/seed/emily/100',
            'rating' => 5,
        ],
    ],
];

partial('testimonials', $testimonials, 'tailwind');

// ============================================
// HOW IT WORKS SECTION
// ============================================
$about = [
    'id'       => 'about',
    'label'    => 'Architecture',
    'title'    => 'Two Partial Systems, One Plugin',
    'content'  => '
        <p>LeanCMS supports two parallel styling systems:</p>
        <ul>
            <li><strong>Pro-Sites (BEM)</strong> - The original custom CSS system with CSS variables</li>
            <li><strong>Tailwind</strong> - Modern utility-first CSS with DaisyUI components</li>
        </ul>
        <p>Templates can choose which system to use. Both work with the same <code>partial()</code> function:</p>
        <pre><code>partial(\'hero\', $config, \'pro-sites\');  // BEM CSS
partial(\'hero\', $config, \'tailwind\');   // Tailwind + DaisyUI</code></pre>
        <p>Migrate gradually or use both systems on different pages. Full flexibility.</p>
    ',
    'centered' => true,
    'narrow'   => true,
];

partial('section', $about, 'tailwind');
?>

<!-- CTA Section with custom markup -->
<section class="lcms-section bg-primary text-primary-content">
    <div class="lcms-container text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Build?</h2>
        <p class="text-lg opacity-90 mb-8 max-w-2xl mx-auto">
            Explore our component demos and start creating beautiful interfaces today.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="/demo-ui-components" class="btn btn-secondary">UI Components</a>
            <a href="/demo-forms" class="btn btn-outline btn-secondary">Form Elements</a>
            <a href="/demo-data-display" class="btn btn-outline btn-secondary">Data Display</a>
        </div>
    </div>
</section>

</div><!-- end data-theme -->

<?php get_footer(); ?>
