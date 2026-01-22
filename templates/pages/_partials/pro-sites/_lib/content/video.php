<?php
/**
 * Video Content Renderer
 *
 * Renders video embeds (YouTube, Vimeo, HTML5).
 * Used by layout partials (column, 2-column, grid, etc.)
 *
 * @param array $content Video content configuration
 *
 * @since 1.2.0
 * @since 2.0.0 Migrated to BEM naming (.lcms-video)
 */

// Support both nested and flat structure for backward compatibility
$video_config = $content['video'] ?? $content;

$type = $video_config['type'] ?? 'youtube';
$src = $video_config['src'] ?? '';
$width = $video_config['width'] ?? '100%';
$height = $video_config['height'] ?? '400px';
$autoplay = $video_config['autoplay'] ?? false;
$controls = $video_config['controls'] ?? true;

// Skip if no source
if (empty($src)) {
    return;
}

$autoplay_param = $autoplay ? '1' : '0';
$controls_param = $controls ? '1' : '0';

// Build embed URL based on type
$embed_url = '';
switch ($type) {
    case 'youtube':
        $embed_url = "https://www.youtube.com/embed/{$src}?autoplay={$autoplay_param}&controls={$controls_param}";
        break;
    case 'vimeo':
        $embed_url = "https://player.vimeo.com/video/{$src}?autoplay={$autoplay_param}";
        break;
    case 'html5':
        // For HTML5, $src is the full URL to the video file
        break;
}
?>

<div class="lcms-video lcms-video--<?php echo esc_attr($type); ?>">
    <?php if ($type === 'html5'): ?>
        <video
            src="<?php echo esc_url($src); ?>"
            <?php if ($controls): ?>controls<?php endif; ?>
            <?php if ($autoplay): ?>autoplay<?php endif; ?>
            style="width: <?php echo esc_attr($width); ?>; height: <?php echo esc_attr($height); ?>;"
            class="lcms-video__element"
        ></video>
    <?php else: ?>
        <iframe
            src="<?php echo esc_url($embed_url); ?>"
            width="<?php echo esc_attr($width); ?>"
            height="<?php echo esc_attr($height); ?>"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
            class="lcms-video__iframe"
        ></iframe>
    <?php endif; ?>
</div><!-- .lcms-video -->
