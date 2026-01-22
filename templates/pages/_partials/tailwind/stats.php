<?php
/**
 * Tailwind Stats Partial
 *
 * A stats/metrics section built with Tailwind CSS + DaisyUI.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Partials/Tailwind
 * @filepath   templates/pages/_partials/tailwind/stats.php
 *
 * Config structure:
 * [
 *     'id'       => 'stats',                // Optional section ID
 *     'label'    => 'By the Numbers',       // Optional label
 *     'title'    => 'Our Impact',           // Optional
 *     'dark'     => false,                  // Dark mode variant
 *     'stats'    => [
 *         [
 *             'value' => '10K+',
 *             'label' => 'Happy Customers',
 *             'desc'  => 'Since 2020',      // Optional description
 *         ],
 *     ],
 * ]
 */

$config = $config ?? $stats_config ?? [];

$id    = $config['id'] ?? '';
$label = $config['label'] ?? '';
$title = $config['title'] ?? '';
$dark  = $config['dark'] ?? false;
$stats = $config['stats'] ?? [];

$section_classes = 'lcms-section';
$section_classes .= $dark ? ' bg-neutral text-neutral-content' : ' bg-base-100';
?>

<section <?php echo $id ? 'id="' . esc_attr($id) . '"' : ''; ?> class="<?php echo esc_attr($section_classes); ?>">
    <div class="lcms-container">

        <?php if ($label || $title): ?>
            <div class="text-center mb-12">
                <?php if ($label): ?>
                    <span class="badge badge-primary badge-outline mb-4"><?php echo esc_html($label); ?></span>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2 class="text-3xl md:text-4xl font-bold"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="stats stats-vertical lg:stats-horizontal shadow w-full">
            <?php foreach ($stats as $stat): ?>
                <div class="stat place-items-center">
                    <div class="stat-value text-primary"><?php echo esc_html($stat['value'] ?? '0'); ?></div>
                    <div class="stat-title"><?php echo esc_html($stat['label'] ?? ''); ?></div>
                    <?php if (!empty($stat['desc'])): ?>
                        <div class="stat-desc"><?php echo esc_html($stat['desc']); ?></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
