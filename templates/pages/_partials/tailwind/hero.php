<?php
/**
 * Tailwind Hero Partial
 *
 * A hero section built with Tailwind CSS + DaisyUI.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Partials/Tailwind
 * @filepath   templates/pages/_partials/tailwind/hero.php
 *
 * Config structure:
 * [
 *     'badge'       => 'Welcome',              // Optional badge text
 *     'title'       => 'Hero Title',           // Required
 *     'subtitle'    => 'Hero subtitle text',   // Optional
 *     'buttons'     => [                       // Optional
 *         ['text' => 'Primary', 'url' => '#', 'style' => 'primary'],
 *         ['text' => 'Secondary', 'url' => '#', 'style' => 'outline'],
 *     ],
 *     'image'       => 'https://...',          // Optional hero image
 *     'dark'        => false,                  // Dark mode variant
 *     'centered'    => true,                   // Center content (default true)
 *     'min_height'  => '80vh',                 // Minimum height
 * ]
 */

// Ensure config exists
$config = $config ?? $hero_config ?? [];

// Extract settings with defaults
$badge      = $config['badge'] ?? '';
$title      = $config['title'] ?? 'Welcome';
$subtitle   = $config['subtitle'] ?? '';
$buttons    = $config['buttons'] ?? [];
$image      = $config['image'] ?? '';
$dark       = $config['dark'] ?? false;
$centered   = $config['centered'] ?? true;
$min_height = $config['min_height'] ?? '60vh';

// Build classes
$section_classes = 'hero';
$section_classes .= $dark ? ' bg-neutral text-neutral-content' : ' bg-base-200';

$content_classes = 'hero-content';
$content_classes .= $centered ? ' text-center' : '';
$content_classes .= $image ? ' flex-col lg:flex-row-reverse' : '';

// Button style mapping
$button_styles = [
    'primary'   => 'btn-primary',
    'secondary' => 'btn-secondary',
    'accent'    => 'btn-accent',
    'outline'   => 'btn-outline',
    'ghost'     => 'btn-ghost',
];
?>

<section class="<?php echo esc_attr($section_classes); ?>" style="min-height: <?php echo esc_attr($min_height); ?>;">
    <div class="<?php echo esc_attr($content_classes); ?>">

        <?php if ($image): ?>
            <img src="<?php echo esc_url($image); ?>" alt="" class="max-w-sm rounded-lg shadow-2xl" />
        <?php endif; ?>

        <div class="<?php echo $image ? 'max-w-lg' : 'max-w-2xl'; ?>">

            <?php if ($badge): ?>
                <span class="badge badge-primary badge-lg mb-4"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                <?php echo esc_html($title); ?>
            </h1>

            <?php if ($subtitle): ?>
                <p class="py-6 text-lg md:text-xl opacity-80">
                    <?php echo esc_html($subtitle); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($buttons)): ?>
                <div class="flex flex-wrap gap-4 <?php echo $centered ? 'justify-center' : ''; ?>">
                    <?php foreach ($buttons as $button):
                        $btn_style = $button_styles[$button['style'] ?? 'primary'] ?? 'btn-primary';
                    ?>
                        <a href="<?php echo esc_url($button['url'] ?? '#'); ?>"
                           class="btn <?php echo esc_attr($btn_style); ?>">
                            <?php echo esc_html($button['text'] ?? 'Button'); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
