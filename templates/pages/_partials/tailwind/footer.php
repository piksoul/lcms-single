<?php
/**
 * Tailwind Footer Partial
 *
 * A site footer built with Tailwind CSS + DaisyUI.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Partials/Tailwind
 * @filepath   templates/pages/_partials/tailwind/footer.php
 *
 * Config structure:
 * [
 *     'brand'     => 'HelloCMS',
 *     'tagline'   => 'Simple, powerful CMS',
 *     'links'     => [
 *         ['text' => 'About', 'url' => '/about'],
 *         ['text' => 'Contact', 'url' => '/contact'],
 *     ],
 *     'copyright' => '2024 HelloCMS',  // Optional, defaults to current year + brand
 * ]
 */

$config = $config ?? $footer_config ?? [];

$brand     = $config['brand'] ?? 'HelloCMS';
$tagline   = $config['tagline'] ?? '';
$links     = $config['links'] ?? [];
$copyright = $config['copyright'] ?? date('Y') . ' ' . $brand;
?>

<footer class="footer footer-center p-10 bg-neutral text-neutral-content">
    <aside>
        <p class="font-bold text-2xl"><?php echo esc_html($brand); ?></p>
        <?php if ($tagline): ?>
            <p class="opacity-70"><?php echo esc_html($tagline); ?></p>
        <?php endif; ?>
    </aside>

    <?php if (!empty($links)): ?>
        <nav>
            <div class="flex flex-wrap justify-center gap-6">
                <?php foreach ($links as $link): ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="link link-hover">
                        <?php echo esc_html($link['text']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>
    <?php endif; ?>

    <aside>
        <p class="opacity-50 text-sm">&copy; <?php echo esc_html($copyright); ?>. All rights reserved.</p>
    </aside>
</footer>
