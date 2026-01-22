<?php
/**
 * Contact Page Template
 *
 * Contact information and form placeholder.
 * Built with Tailwind + DaisyUI partials.
 *
 * @filepath templates/pages/slug-contact.php
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
    'title'      => 'Contact Us',
    'subtitle'   => 'We\'d love to hear from you. Get in touch with our team.',
    'min_height' => '40vh',
];

partial('hero', $hero, 'tailwind');
?>

<!-- Contact Info + Form Section -->
<section class="lcms-section bg-base-100">
    <div class="lcms-container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div>
                <h2 class="text-3xl font-bold mb-4">Get in Touch</h2>
                <p class="text-lg opacity-80 mb-8">Have a question or want to learn more about HelloCMS? We're here to help. Fill out the form and we'll get back to you as soon as possible.</p>

                <h3 class="text-xl font-semibold mb-6">Contact Information</h3>

                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <span class="text-3xl">📧</span>
                        <div>
                            <div class="font-semibold">Email</div>
                            <a href="mailto:hello@example.com" class="link link-primary">hello@example.com</a>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="text-3xl">📍</span>
                        <div>
                            <div class="font-semibold">Location</div>
                            <span class="opacity-80">Perth, Western Australia</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="text-3xl">🕐</span>
                        <div>
                            <div class="font-semibold">Business Hours</div>
                            <span class="opacity-80">Monday - Friday, 9am - 5pm AWST</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="card bg-base-200">
                <div class="card-body">
                    <h3 class="card-title text-xl mb-4">Send us a Message</h3>
                    <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// ============================================
// FAQ SECTION
// ============================================
$faq_grid = [
    'id'       => 'faq',
    'label'    => 'FAQ',
    'title'    => 'Frequently Asked Questions',
    'columns'  => 3,
    'dark'     => true,
    'cards'    => [
        [
            'title'   => 'How quickly will I get a response?',
            'content' => 'We typically respond to all inquiries within 24-48 business hours.',
        ],
        [
            'title'   => 'Do you offer support?',
            'content' => 'Yes! We provide email support for all users and can arrange calls for complex questions.',
        ],
        [
            'title'   => 'Can I request a demo?',
            'content' => 'Absolutely! Just mention it in your message and we\'ll set up a time to walk you through everything.',
        ],
    ],
];

partial('card-grid', $faq_grid, 'tailwind');
?>

</div><!-- end data-theme -->

<?php get_footer(); ?>
