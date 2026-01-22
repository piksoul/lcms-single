<?php
/**
 * Tailwind Testimonials Partial
 *
 * A testimonials section built with Tailwind CSS + DaisyUI.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Partials/Tailwind
 * @filepath   templates/pages/_partials/tailwind/testimonials.php
 *
 * Config structure:
 * [
 *     'id'           => 'testimonials',     // Optional section ID
 *     'label'        => 'Testimonials',     // Optional label
 *     'title'        => 'What People Say',  // Optional
 *     'subtitle'     => 'Subtitle text',    // Optional
 *     'dark'         => false,              // Dark mode variant
 *     'testimonials' => [
 *         [
 *             'quote'  => 'This is amazing!',
 *             'name'   => 'Jane Doe',
 *             'role'   => 'CEO, Company',   // Optional
 *             'avatar' => 'https://...',    // Optional avatar URL
 *             'rating' => 5,                // Optional 1-5 rating
 *         ],
 *     ],
 * ]
 */

$config = $config ?? $testimonials_config ?? [];

$id           = $config['id'] ?? '';
$label        = $config['label'] ?? '';
$title        = $config['title'] ?? '';
$subtitle     = $config['subtitle'] ?? '';
$dark         = $config['dark'] ?? false;
$testimonials = $config['testimonials'] ?? [];

$section_classes = 'lcms-section';
$section_classes .= $dark ? ' bg-neutral text-neutral-content' : ' bg-base-200';

// Determine grid columns based on count
$count = count($testimonials);
$grid_class = $count === 1 ? 'max-w-2xl mx-auto' : ($count === 2 ? 'md:grid-cols-2' : 'md:grid-cols-2 lg:grid-cols-3');
?>

<section <?php echo $id ? 'id="' . esc_attr($id) . '"' : ''; ?> class="<?php echo esc_attr($section_classes); ?>">
    <div class="lcms-container">

        <?php if ($label || $title || $subtitle): ?>
            <div class="text-center mb-12">
                <?php if ($label): ?>
                    <span class="badge badge-primary badge-outline mb-4"><?php echo esc_html($label); ?></span>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if ($subtitle): ?>
                    <p class="text-lg opacity-70 max-w-2xl mx-auto"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 <?php echo esc_attr($grid_class); ?> gap-6">
            <?php foreach ($testimonials as $testimonial): ?>
                <div class="card <?php echo $dark ? 'bg-base-100/10' : 'bg-base-100'; ?> shadow-lg">
                    <div class="card-body">

                        <?php if (!empty($testimonial['rating'])): ?>
                            <div class="rating rating-sm mb-2">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <input type="radio" class="mask mask-star-2 bg-warning" disabled <?php echo $i === (int)$testimonial['rating'] ? 'checked' : ''; ?> />
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>

                        <blockquote class="text-lg italic opacity-90 mb-4">
                            "<?php echo esc_html($testimonial['quote'] ?? ''); ?>"
                        </blockquote>

                        <div class="flex items-center gap-4 mt-auto">
                            <?php if (!empty($testimonial['avatar'])): ?>
                                <div class="avatar">
                                    <div class="w-12 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                        <img src="<?php echo esc_url($testimonial['avatar']); ?>" alt="<?php echo esc_attr($testimonial['name'] ?? ''); ?>" />
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="avatar placeholder">
                                    <div class="bg-primary text-primary-content rounded-full w-12">
                                        <span class="text-lg"><?php echo esc_html(substr($testimonial['name'] ?? 'A', 0, 1)); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div>
                                <div class="font-bold"><?php echo esc_html($testimonial['name'] ?? 'Anonymous'); ?></div>
                                <?php if (!empty($testimonial['role'])): ?>
                                    <div class="text-sm opacity-70"><?php echo esc_html($testimonial['role']); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
