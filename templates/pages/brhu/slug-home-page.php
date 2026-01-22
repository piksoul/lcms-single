<?php
/**
 * Brand Hub Home Page
 *
 * Template for the main home/landing page.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/brhu/slug-home-page.php
 */

defined('ABSPATH') || exit;
get_header();
?>

<style>
    .home-page {
        font-family: 'Noto Sans', 'DejaVu Sans', Arial, sans-serif;
        color: #264653;
        line-height: 1.6;
    }

    .home-hero {
        background: linear-gradient(135deg, #264653 0%, #2a9d8f 100%);
        color: white;
        padding: 100px 60px;
        text-align: center;
    }

    .home-hero h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .home-hero p {
        font-size: 1.25rem;
        opacity: 0.9;
    }

    .home-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 40px;
    }

    .home-content h2 {
        font-size: 2rem;
        margin-bottom: 1rem;
        color: #264653;
    }

    .home-content p {
        margin-bottom: 1.5rem;
    }
</style>

<div class="home-page">
    <section class="home-hero">
        <h1>Welcome to Brand Hub</h1>
        <p>Your central destination for brand resources and guidelines.</p>
    </section>

    <section class="home-content">
        <h2>About This Page</h2>
        <p>This is a placeholder home page template. Replace this content with your actual home page content.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </section>
</div>

<?php get_footer(); ?>
