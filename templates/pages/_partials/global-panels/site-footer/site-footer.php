<?php
/**
 * Global Site Footer Partial
 *
 * Persistent site footer that appears on all LeanCMS pages.
 * Built with Tailwind CSS + DaisyUI.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Partials
 * @filepath   templates/pages/_partials/global-panels/site-footer/site-footer.php
 *
 * Configuration (via global config or filter):
 * @param string $brand         Brand/site name
 * @param string $tagline       Brand tagline
 * @param array  $links         Navigation links [['text' => '', 'url' => ''], ...]
 * @param string $copyright     Copyright text (defaults to year + brand)
 * @param bool   $show_branding Show "Powered by" branding
 * @param string $branding_text Branding text
 * @param string $branding_url  Branding link URL
 */

// Default configuration
$defaults = array(
    'brand'         => get_bloginfo('name'),
    'tagline'       => get_bloginfo('description'),
    'links'         => array(),
    'copyright'     => '',
    'show_branding' => false,
    'branding_text' => 'Powered by LeanCMS',
    'branding_url'  => 'https://piksoul.com',
);

// Merge provided config with defaults
$config = is_array($config) ? array_merge($defaults, $config) : $defaults;

// Build copyright if not provided
if (empty($config['copyright'])) {
    $config['copyright'] = date('Y') . ' ' . $config['brand'];
}
?>

<footer class="footer footer-center p-10 bg-neutral text-neutral-content">
    <aside>
        <p class="font-bold text-2xl"><?php echo esc_html($config['brand']); ?></p>
        <?php if (!empty($config['tagline'])): ?>
            <p class="opacity-70"><?php echo esc_html($config['tagline']); ?></p>
        <?php endif; ?>
    </aside>

    <?php if (!empty($config['links'])): ?>
        <nav>
            <div class="flex flex-wrap justify-center gap-6">
                <?php foreach ($config['links'] as $link): ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="link link-hover">
                        <?php echo esc_html($link['text']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>
    <?php endif; ?>

    <aside>
        <p class="opacity-50 text-sm">&copy; <?php echo esc_html($config['copyright']); ?>. All rights reserved.</p>
        <?php if ($config['show_branding'] && !empty($config['branding_text'])): ?>
            <p class="opacity-40 text-xs mt-2">
                <?php if (!empty($config['branding_url'])): ?>
                    <a href="<?php echo esc_url($config['branding_url']); ?>" target="_blank" rel="noopener" class="hover:opacity-70">
                        <?php echo esc_html($config['branding_text']); ?>
                    </a>
                <?php else: ?>
                    <?php echo esc_html($config['branding_text']); ?>
                <?php endif; ?>
            </p>
        <?php endif; ?>
    </aside>
</footer>
