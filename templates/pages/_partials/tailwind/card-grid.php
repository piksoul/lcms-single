<?php
/**
 * Tailwind Card Grid Partial
 *
 * A responsive grid of cards built with Tailwind CSS + DaisyUI.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Partials/Tailwind
 * @filepath   templates/pages/_partials/tailwind/card-grid.php
 *
 * Config structure:
 * [
 *     'id'       => 'features',           // Optional section ID
 *     'label'    => 'Features',           // Optional label
 *     'title'    => 'Grid Title',         // Optional
 *     'subtitle' => 'Subtitle',           // Optional
 *     'columns'  => 3,                    // 2, 3, or 4 columns
 *     'dark'     => false,                // Dark mode variant
 *     'cards'    => [
 *         [
 *             'icon'    => '🚀',          // Emoji or icon HTML
 *             'title'   => 'Card Title',
 *             'content' => 'Card description text',
 *             'link'    => ['url' => '#', 'text' => 'Learn more'],  // Optional
 *         ],
 *     ],
 * ]
 */

$config = $config ?? $grid_config ?? [];

$id       = $config['id'] ?? '';
$label    = $config['label'] ?? '';
$title    = $config['title'] ?? '';
$subtitle = $config['subtitle'] ?? '';
$columns  = $config['columns'] ?? 3;
$dark     = $config['dark'] ?? false;
$cards    = $config['cards'] ?? [];

$section_classes = 'lcms-section';
$section_classes .= $dark ? ' bg-neutral text-neutral-content' : ' bg-base-200';

// Grid column classes
$grid_cols = [
    2 => 'md:grid-cols-2',
    3 => 'md:grid-cols-2 lg:grid-cols-3',
    4 => 'md:grid-cols-2 lg:grid-cols-4',
];
$col_class = $grid_cols[$columns] ?? $grid_cols[3];
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

        <div class="grid grid-cols-1 <?php echo esc_attr($col_class); ?> gap-6">
            <?php foreach ($cards as $card): ?>
                <div class="card <?php echo $dark ? 'bg-base-100/10' : 'bg-base-100'; ?> shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body text-center">

                        <?php if (!empty($card['icon'])): ?>
                            <div class="text-5xl mb-4"><?php echo $card['icon']; ?></div>
                        <?php endif; ?>

                        <?php if (!empty($card['title'])): ?>
                            <h3 class="card-title justify-center text-xl"><?php echo esc_html($card['title']); ?></h3>
                        <?php endif; ?>

                        <?php if (!empty($card['content'])): ?>
                            <p class="opacity-80"><?php echo esc_html($card['content']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($card['link'])): ?>
                            <div class="card-actions justify-center mt-4">
                                <a href="<?php echo esc_url($card['link']['url']); ?>" class="btn btn-primary btn-sm">
                                    <?php echo esc_html($card['link']['text'] ?? 'Learn more'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
