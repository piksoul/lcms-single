<?php
/**
 * LeanOS CMS Test Page
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/test/slug-leanos-cms.php
 */

defined('ABSPATH') || exit;
// Keep the site header/footer so it looks native
get_header();

/** Basic inline styling just for the MVP demo (keep it tiny) **/
?>
<main id="primary" class="site-main">
  <section style="
    max-width:960px;margin:40px auto;padding:24px;
    border:1px solid #e5e7eb;border-radius:12px;background:#ffffff;
    box-shadow:0 1px 2px rgba(0,0,0,.04);
  ">
    <h1 style="margin:0 0 8px;font-size:28px;line-height:1.2;">
      Hello, World Yo Yo Yo!— Page ID <?php echo (int) get_the_ID(); ?>
    </h1>
    <p style="margin:16px 0;font-size:16px;color:#666;">
      Welcome to <strong>LeanCMS</strong> — this page demonstrates
      the dynamic template rendering system working correctly.
    </p>
    <hr style="margin:24px 0;border:none;border-top:1px solid #e5e7eb;">
    <p style="margin:0;font-size:14px;color:#999;">
      Page rendered at: <strong><?php echo esc_html( date('Y-m-d H:i:s') ); ?></strong>
    </p>
  </section>
</main>
<?php get_footer(); ?>
