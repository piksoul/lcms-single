<?php
/**
 * Tailwind Steps Partial
 *
 * A process/steps section built with Tailwind CSS + DaisyUI.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Partials/Tailwind
 * @filepath   templates/pages/_partials/tailwind/steps.php
 *
 * Config structure:
 * [
 *     'id'       => 'process',              // Optional section ID
 *     'label'    => 'How It Works',         // Optional label
 *     'title'    => 'Simple Process',       // Optional
 *     'subtitle' => 'Get started in 3 steps', // Optional
 *     'dark'     => false,                  // Dark mode variant
 *     'vertical' => false,                  // Vertical layout
 *     'steps'    => [
 *         [
 *             'title'   => 'Step 1',
 *             'content' => 'Description of step 1',
 *             'status'  => 'primary',       // primary, secondary, accent, info, success, warning, error
 *         ],
 *     ],
 * ]
 */

$config = $config ?? $steps_config ?? [];

$id       = $config['id'] ?? '';
$label    = $config['label'] ?? '';
$title    = $config['title'] ?? '';
$subtitle = $config['subtitle'] ?? '';
$dark     = $config['dark'] ?? false;
$vertical = $config['vertical'] ?? false;
$steps    = $config['steps'] ?? [];

$section_classes = 'lcms-section';
$section_classes .= $dark ? ' bg-neutral text-neutral-content' : ' bg-base-100';

$steps_classes = 'steps w-full';
$steps_classes .= $vertical ? ' steps-vertical' : ' steps-horizontal';
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

        <div class="overflow-x-auto py-4">
            <ul class="<?php echo esc_attr($steps_classes); ?>">
                <?php foreach ($steps as $index => $step):
                    $status = $step['status'] ?? 'primary';
                    $step_class = 'step';
                    if ($status) {
                        $step_class .= ' step-' . $status;
                    }
                ?>
                    <li class="<?php echo esc_attr($step_class); ?>" data-content="<?php echo $index + 1; ?>">
                        <div class="<?php echo $vertical ? 'text-left py-4' : 'text-center'; ?>">
                            <?php if (!empty($step['title'])): ?>
                                <div class="font-bold"><?php echo esc_html($step['title']); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($step['content'])): ?>
                                <div class="text-sm opacity-70"><?php echo esc_html($step['content']); ?></div>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</section>
