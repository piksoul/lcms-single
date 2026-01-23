<?php
/**
 * Home Page Template
 *
 * Main landing page with hero, features, about section, and CTA.
 * Built with Tailwind + DaisyUI partials.
 *
 * @filepath templates/pages/slug-home.php
 */

get_header();

// ============================================
// HERO SECTION
// ============================================
$hero = [
    'badge'      => 'Welcome to HelloCMS',
    'title'      => 'Simple, Powerful Content Management',
    'subtitle'   => 'Build beautiful websites with ease. A streamlined CMS designed for simplicity and performance.',
    'buttons'    => [
        ['text' => 'Learn More', 'url' => '/about', 'style' => 'primary'],
        ['text' => 'Get in Touch', 'url' => '/contact', 'style' => 'outline'],
    ],
    'min_height' => '70vh',
];

partial('hero', $hero, 'tailwind');

// ============================================
// FEATURES SECTION
// ============================================
$features_grid = [
    'id'       => 'features',
    'label'    => 'Why Choose Us',
    'title'    => 'Everything You Need',
    'subtitle' => 'Powerful features wrapped in simplicity',
    'columns'  => 3,
    'cards'    => [
        [
            'icon'    => '🚀',
            'title'   => 'Fast & Lightweight',
            'content' => 'Optimized for speed with minimal overhead. Your pages load instantly.',
        ],
        [
            'icon'    => '🎨',
            'title'   => 'Flexible Design',
            'content' => 'Customize every aspect with CSS variables and modular components.',
        ],
        [
            'icon'    => '📱',
            'title'   => 'Mobile Ready',
            'content' => 'Responsive layouts that look great on any device, from phone to desktop.',
        ],
    ],
];

partial('card-grid', $features_grid, 'tailwind');
?>

<!-- About Section (Two-column layout) -->
<section id="about" class="lcms-section bg-neutral text-neutral-content">
    <div class="lcms-container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Built for Modern Websites</h2>
                <p class="text-lg opacity-90 mb-6">HelloCMS combines the power of WordPress with a streamlined, developer-friendly approach. No bloat, no complexity - just the tools you need to build beautiful websites.</p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <span class="text-primary">✓</span>
                        <span><strong>Template-based pages</strong> - Full control over your layouts</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-primary">✓</span>
                        <span><strong>Partial system</strong> - Reusable, composable components</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-primary">✓</span>
                        <span><strong>CSS variables</strong> - Easy theming and customization</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-primary">✓</span>
                        <span><strong>Tailwind + DaisyUI</strong> - Modern, utility-first styling</span>
                    </li>
                </ul>
            </div>
            <div class="flex justify-center">
                <div class="bg-base-100/10 rounded-2xl p-10 text-center">
                    <div class="text-6xl mb-4">💡</div>
                    <p class="text-xl">Simple by design.<br>Powerful when you need it.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="cta" class="lcms-section bg-primary text-primary-content">
    <div class="lcms-container text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Get Started?</h2>
        <p class="text-lg opacity-90 mb-8 max-w-2xl mx-auto">
            Join us and experience a better way to manage content.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="/contact" class="btn btn-secondary">Contact Us</a>
            <a href="/about" class="btn btn-outline btn-secondary">Learn More</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
