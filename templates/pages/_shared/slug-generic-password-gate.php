<?php
/**
 * Generic Password Gate Template
 *
 * This shared template provides a default password protection page
 * for any LeanCMS page that doesn't have a custom -noaccess variant.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/_shared/slug-generic-password-gate.php
 */

defined('ABSPATH') || exit;
get_header();
?>

<style>
    .password-gate-container {
        max-width: 600px;
        margin: 100px auto;
        padding: 60px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .password-gate-icon {
        font-size: 48px;
        margin-bottom: 20px;
    }

    .password-gate-title {
        font-size: 32px;
        font-weight: 700;
        color: #333;
        margin-bottom: 15px;
    }

    .password-gate-description {
        font-size: 16px;
        color: #666;
        margin-bottom: 40px;
        line-height: 1.6;
    }

    .password-gate-container .post-password-form {
        text-align: left;
    }

    .password-gate-container .post-password-form label {
        display: block;
        font-weight: 600;
        margin-bottom: 10px;
        color: #333;
    }

    .password-gate-container .post-password-form input[type="password"] {
        width: 100%;
        padding: 12px 16px;
        font-size: 16px;
        border: 2px solid #ddd;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    .password-gate-container .post-password-form input[type="submit"] {
        width: 100%;
        padding: 14px 16px;
        font-size: 16px;
        font-weight: 700;
        color: white;
        background: #0073aa;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .password-gate-container .post-password-form input[type="submit"]:hover {
        background: #005177;
        transform: translateY(-2px);
    }
</style>

<main class="site-main">
    <div class="password-gate-container">
        <div class="password-gate-icon">🔒</div>
        <h1 class="password-gate-title">Protected Content</h1>
        <p class="password-gate-description">
            This page is password protected. Please enter the password to view the content.
        </p>
        <?php echo get_the_password_form(); ?>
    </div>
</main>

<?php get_footer(); ?>
