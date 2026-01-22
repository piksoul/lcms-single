<?php
/**
 * LeanCMS Brand Hub - Sustainable Packaging Campaign Landing Page
 *
 * Campaign landing page promoting sustainable packaging initiatives
 * and environmental responsibility
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   brhu/slug-packaging-campaign.php
 * @since      1.2.6
 */

defined('ABSPATH') || exit;
get_header();
partial('loader', [], 'top-section');
?>



<?php
// ============================================
// HERO SECTION WITH BADGE
// ============================================
partial('page-header', [
    'pre_html' => '<div style="text-align: center;">
        <span class="lcms-badge lcms-badge--success">Sustainability Initiative</span>
    </div>',
    'title' => 'Sustainable Packaging for a Better Tomorrow',
    'subtitle' => 'Join us in reducing environmental impact through innovative packaging solutions',
], 'top-section');

// ============================================
// CAMPAIGN OVERVIEW
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Our Commitment to Sustainability',
            'subtitle' => 'Making a positive impact on our planet',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-container lcms-container--thin">
                <p class="lead" style="text-align: center; margin-bottom: 32px;">
                    We believe that every package has a purpose beyond protecting products.
                    It\'s our opportunity to protect the planet. Our sustainable packaging initiative
                    represents a commitment to innovation, responsibility, and a greener future.
                </p>
                <ul class="lcms-list lcms-list--check lcms-list--spacious">
                    <li class="lcms-list__item">100% recyclable and biodegradable materials</li>
                    <li class="lcms-list__item">Reduced carbon footprint through optimized design</li>
                    <li class="lcms-list__item">Zero waste manufacturing processes</li>
                    <li class="lcms-list__item">Sustainable sourcing from certified suppliers</li>
                    <li class="lcms-list__item">Innovative materials that decompose naturally</li>
                </ul>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// ENVIRONMENTAL IMPACT METRICS
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Our Impact',
            'subtitle' => 'Real results for a sustainable future',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-4col">
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Carbon Reduction</div>
                    <div class="lcms-metric__value">65%</div>
                    <div class="lcms-metric__description">Less CO2 emissions compared to traditional packaging</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Waste Reduction</div>
                    <div class="lcms-metric__value">80%</div>
                    <div class="lcms-metric__description">Reduction in landfill waste through recyclable materials</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Renewable Materials</div>
                    <div class="lcms-metric__value">95%</div>
                    <div class="lcms-metric__description">Of our packaging from renewable resources</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Trees Saved</div>
                    <div class="lcms-metric__value">50K+</div>
                    <div class="lcms-metric__description">Trees saved annually through sustainable practices</div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// SUSTAINABLE SOLUTIONS
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Innovative Packaging Solutions',
            'subtitle' => 'Advanced materials that protect products and the planet',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-3col">
                <div class="lcms-card">
                    <h4>🌱 Plant-Based Materials</h4>
                    <p>Packaging made from renewable plant fibers, corn starch, and other biodegradable materials that naturally decompose.</p>
                </div>
                <div class="lcms-card">
                    <h4>♻️ Recycled Content</h4>
                    <p>Post-consumer recycled materials transformed into high-quality packaging with minimal environmental impact.</p>
                </div>
                <div class="lcms-card">
                    <h4>🌊 Ocean-Safe Design</h4>
                    <p>Materials designed to break down safely if they reach waterways, protecting marine ecosystems.</p>
                </div>
                <div class="lcms-card">
                    <h4>🎨 Minimal Ink Process</h4>
                    <p>Water-based, non-toxic inks and reduced printing processes that minimize chemical usage.</p>
                </div>
                <div class="lcms-card">
                    <h4>📦 Smart Sizing</h4>
                    <p>Optimized package dimensions reduce material waste and maximize shipping efficiency.</p>
                </div>
                <div class="lcms-card">
                    <h4>🔄 Circular Economy</h4>
                    <p>Designed for reuse and recycling, keeping materials in circulation and out of landfills.</p>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// BENEFITS FOR PARTNERS
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Benefits for Your Brand',
            'subtitle' => 'Sustainability meets business success',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-2col">
                <div class="lcms-card">
                    <h4>🎯 Enhanced Brand Image</h4>
                    <p>Demonstrate environmental responsibility and attract conscious consumers who value sustainability.</p>
                </div>
                <div class="lcms-card">
                    <h4>💰 Cost Efficiency</h4>
                    <p>Optimized designs and materials reduce shipping costs and material expenses over time.</p>
                </div>
                <div class="lcms-card">
                    <h4>📈 Market Differentiation</h4>
                    <p>Stand out in competitive markets with sustainable packaging that tells your story.</p>
                </div>
                <div class="lcms-card">
                    <h4>✅ Regulatory Compliance</h4>
                    <p>Stay ahead of environmental regulations and meet evolving sustainability standards.</p>
                </div>
                <div class="lcms-card">
                    <h4>🌍 Global Reach</h4>
                    <p>Meet international sustainability requirements for expanding into new markets.</p>
                </div>
                <div class="lcms-card">
                    <h4>💚 Customer Loyalty</h4>
                    <p>Build deeper connections with customers who share your environmental values.</p>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// SUSTAINABILITY JOURNEY
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'How It Works',
            'subtitle' => 'Your journey to sustainable packaging',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-container lcms-container--medium">
                <div class="grid-4col">
                    <div class="lcms-stack gap-8" style="text-align: center;">
                        <div style="font-size: 48px; font-weight: bold; color: var(--primary-color);">1</div>
                        <h4>Consultation</h4>
                        <p>We analyze your current packaging and identify sustainability opportunities.</p>
                    </div>
                    <div class="lcms-stack gap-8" style="text-align: center;">
                        <div style="font-size: 48px; font-weight: bold; color: var(--primary-color);">2</div>
                        <h4>Design</h4>
                        <p>Our team creates custom sustainable solutions tailored to your products.</p>
                    </div>
                    <div class="lcms-stack gap-8" style="text-align: center;">
                        <div style="font-size: 48px; font-weight: bold; color: var(--primary-color);">3</div>
                        <h4>Testing</h4>
                        <p>Rigorous quality and sustainability testing ensures optimal performance.</p>
                    </div>
                    <div class="lcms-stack gap-8" style="text-align: center;">
                        <div style="font-size: 48px; font-weight: bold; color: var(--primary-color);">4</div>
                        <h4>Implementation</h4>
                        <p>Seamless transition to sustainable packaging with full support.</p>
                    </div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// ENVIRONMENTAL CERTIFICATIONS
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Certifications & Standards',
            'subtitle' => 'Verified commitment to environmental excellence',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-container lcms-container--thin">
                <div class="grid-3col">
                    <div class="lcms-card" style="text-align: center;">
                        <h4>🌲 FSC Certified</h4>
                        <p>Forest Stewardship Council certified materials from responsibly managed forests</p>
                    </div>
                    <div class="lcms-card" style="text-align: center;">
                        <h4>✓ Compostable</h4>
                        <p>Meets EN 13432 standards for industrial composting</p>
                    </div>
                    <div class="lcms-card" style="text-align: center;">
                        <h4>🌿 Carbon Neutral</h4>
                        <p>Certified carbon-neutral production and distribution processes</p>
                    </div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// CASE STUDIES / SUCCESS STORIES
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Success Stories',
            'subtitle' => 'Real brands making a difference',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-2col">
                <div class="lcms-card">
                    <h4>Premium Cosmetics Brand</h4>
                    <p><strong>Challenge:</strong> Luxury perception with eco-friendly materials</p>
                    <p><strong>Solution:</strong> Plant-based packaging with elegant minimalist design</p>
                    <p><strong>Results:</strong> 45% increase in brand perception, 60% waste reduction</p>
                </div>
                <div class="lcms-card">
                    <h4>E-Commerce Retailer</h4>
                    <p><strong>Challenge:</strong> High shipping costs and packaging waste</p>
                    <p><strong>Solution:</strong> Right-sized recyclable packaging with minimal materials</p>
                    <p><strong>Results:</strong> 30% shipping cost reduction, 75% less packaging waste</p>
                </div>
                <div class="lcms-card">
                    <h4>Organic Food Company</h4>
                    <p><strong>Challenge:</strong> Maintaining freshness with sustainable materials</p>
                    <p><strong>Solution:</strong> Biodegradable barrier materials with optimal protection</p>
                    <p><strong>Results:</strong> Same shelf life, 100% compostable packaging</p>
                </div>
                <div class="lcms-card">
                    <h4>Electronics Manufacturer</h4>
                    <p><strong>Challenge:</strong> Protective packaging for fragile products</p>
                    <p><strong>Solution:</strong> Molded fiber protection from recycled materials</p>
                    <p><strong>Results:</strong> Zero product damage, 85% recyclable content</p>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// CALL TO ACTION
// ============================================
partial('column', [
    'settings' => [
        'custom_classes' => 'gradient-light align-center lcms-container--thin',
    ],
    'header' => [
        'heading' => [
            'title' => 'Ready to Make a Difference?',
            'subtitle' => 'Transform your packaging into a force for good',
            'align' => 'center'
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>Join hundreds of brands who have already made the switch to sustainable packaging. Together, we can reduce environmental impact while enhancing your brand value and customer loyalty. Start your sustainability journey today.</p>',
        'format' => 'lead',
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'Get Started',
                'url' => '#contact',
                'style' => 'primary',
            ],
            [
                'text' => 'Download Guide',
                'url' => '#download',
                'style' => 'outline',
            ],
        ],
    ],
], 'pro-sites');

// ============================================
// FAQ SECTION
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Frequently Asked Questions',
            'subtitle' => 'Everything you need to know',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-container lcms-container--thin">
                <div class="lcms-stack gap-16">
                    <div class="lcms-stack gap-8">
                        <h4>Is sustainable packaging more expensive?</h4>
                        <p>While initial costs may be slightly higher, sustainable packaging often leads to cost savings through reduced material usage, shipping efficiency, and customer loyalty.</p>
                    </div>
                    <div class="lcms-stack gap-8">
                        <h4>How long does biodegradable packaging take to decompose?</h4>
                        <p>Our biodegradable materials decompose in 90-180 days in industrial composting facilities, compared to hundreds of years for traditional plastics.</p>
                    </div>
                    <div class="lcms-stack gap-8">
                        <h4>Can sustainable packaging protect products as well as traditional packaging?</h4>
                        <p>Absolutely. Our sustainable materials meet or exceed the protective qualities of traditional packaging while being environmentally responsible.</p>
                    </div>
                    <div class="lcms-stack gap-8">
                        <h4>What is the minimum order quantity?</h4>
                        <p>We work with businesses of all sizes. Contact us to discuss options tailored to your specific volume needs.</p>
                    </div>
                    <div class="lcms-stack gap-8">
                        <h4>How do I get started with the transition?</h4>
                        <p>Simply contact us for a free consultation. We\'ll analyze your current packaging and create a customized sustainable solution.</p>
                    </div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// FOOTER INFO
// ============================================
partial('column', [
    'settings' => [
        'custom_css' => 'padding: 30px 0;'
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="text-center text-muted" style="display: flex; flex-direction: column; gap: 16px;">
                <p><strong>Campaign Launch:</strong> November 2025</p>
                <p><strong>Commitment:</strong> Carbon Neutral by 2030</p>
            </div>
        ',
    ],
], 'pro-sites');
?>

<?php get_footer(); ?>
