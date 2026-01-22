<?php
/**
 * Template Name: LeanCMS Full Page
 * Description: Delegates page rendering to the leancms plugin.
 */
defined('ABSPATH') || exit;

get_header();
?>
<main id="primary" class="site-main wrap">
  <div class="entry-content">
    <?php
    // This file is only a visual fallback if the plugin is inactive.
    if ( ! function_exists('leancms_render_full_page_from_plugin') ) {
      echo '<p style="padding:1rem;border:1px solid #ddd;background:#fffbe6">
              <strong>Note:</strong> The <code>leancms</code> plugin is not active,
              so this theme template can’t load its page layout.
            </p>';
      the_content(); // fallback
    } else {
      // When the plugin is active, it will fully take over the template via hooks.
      // Nothing to do here.
    }
    ?>
  </div>
</main>
<?php get_footer();
