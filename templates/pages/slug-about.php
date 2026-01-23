<?php
/**
 * About Page Template
 *
 * Information about the company/service.
 * Built with Tailwind + DaisyUI partials.
 *
 * @filepath templates/pages/slug-about.php
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

<!-- Demo Navigation -->
<div class="navbar bg-base-200 px-6">
    <div class="flex-1">
        <a href="/home" class="btn btn-ghost text-lg font-bold">HelloCMS</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1 gap-1">
            <li><a href="/home">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/terms-of-service">Terms</a></li>
            <li><a href="/privacy-policy">Privacy</a></li>
        </ul>
    </div>
</div>

<?php
// ============================================
// HERO SECTION
// ============================================
$hero = [
    'title'      => 'About Us',
    'subtitle'   => 'Learn more about our mission and values.',
    'min_height' => '40vh',
];

partial('hero', $hero, 'tailwind');

// ============================================
// OUR STORY
// ============================================
$story_section = [
    'id'       => 'story',
    'label'    => 'Our Story',
    'title'    => 'Building Better Web Experiences',
    'content'  => '
        <p class="text-lg">HelloCMS was born from a simple idea: content management should be straightforward, not complicated. We believe that creating and managing websites should be accessible to everyone, without sacrificing power or flexibility.</p>
        <p class="text-lg">Our team has years of experience building web solutions, and we\'ve seen firsthand the frustrations that come with overly complex systems. That\'s why we created HelloCMS - a streamlined approach that puts simplicity first while maintaining the features professionals need.</p>
    ',
    'centered' => true,
    'narrow'   => true,
];

partial('section', $story_section, 'tailwind');

// ============================================
// VALUES
// ============================================
$values_grid = [
    'id'       => 'values',
    'label'    => 'What We Believe',
    'title'    => 'Our Core Values',
    'columns'  => 4,
    'dark'     => true,
    'cards'    => [
        [
            'icon'    => '✨',
            'title'   => 'Simplicity',
            'content' => 'We remove complexity wherever possible, making tools that are intuitive and easy to use.',
        ],
        [
            'icon'    => '🔧',
            'title'   => 'Quality',
            'content' => 'We build things right the first time, with clean code and thoughtful design.',
        ],
        [
            'icon'    => '🤝',
            'title'   => 'Trust',
            'content' => 'We\'re transparent in everything we do, building lasting relationships with our users.',
        ],
        [
            'icon'    => '🌱',
            'title'   => 'Growth',
            'content' => 'We continuously improve, learning from feedback and evolving with technology.',
        ],
    ],
];

partial('card-grid', $values_grid, 'tailwind');
?>

<!-- CTA Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Want to Learn More?</h2>
        <p class="text-lg opacity-70 mb-8 max-w-2xl mx-auto">
            Get in touch with us to discuss how we can help.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="/contact" class="btn btn-primary">Contact Us</a>
            <a href="/home" class="btn btn-outline">Back to Home</a>
        </div>
    </div>
</section>

</div><!-- end data-theme -->

<?php get_footer(); ?>
