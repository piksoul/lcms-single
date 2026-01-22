<?php
/**
 * Generic Password Protection Form - Fallback Template
 *
 * This template is automatically used when a page is password protected
 * but no custom -noaccess template variant exists.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates
 * @filepath   templates/password-form.php
 */

defined('ABSPATH') || exit;
get_header();

// Get current page ID
$page_id = get_queried_object_id();
?>

<style>
    .leancms-password-protection {
        max-width: 600px;
        margin: 80px auto;
        padding: 60px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        text-align: center;
    }

    .leancms-password-protection h2 {
        font-size: 32px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .leancms-password-protection p {
        font-size: 18px;
        color: #64748b;
        margin-bottom: 40px;
        line-height: 1.6;
    }

    .leancms-password-protection .post-password-form {
        text-align: left;
    }

    .leancms-password-protection .post-password-form label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .leancms-password-protection .post-password-form input[type="password"] {
        width: 100%;
        padding: 14px 18px;
        font-size: 16px;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        margin-bottom: 20px;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }

    .leancms-password-protection .post-password-form input[type="password"]:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .leancms-password-protection .post-password-form input[type="submit"] {
        width: 100%;
        padding: 14px 18px;
        font-size: 16px;
        font-weight: 600;
        color: #ffffff;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .leancms-password-protection .post-password-form input[type="submit"]:hover {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
    }

    @media (max-width: 768px) {
        .leancms-password-protection {
            margin: 40px 20px;
            padding: 40px 30px;
        }

        .leancms-password-protection h2 {
            font-size: 26px;
        }

        .leancms-password-protection p {
            font-size: 16px;
        }
    }
</style>

<main id="primary" class="site-main">
    <div class="leancms-password-protection">
        <div class="leancms-password-form">
            <h2><?php
                /**
                 * Filter the password form title.
                 *
                 * @param string $title   Default title text.
                 * @param int    $page_id Current page ID.
                 */
                echo esc_html( apply_filters( 'leancms_password_form_title', __( 'Protected Content', 'brandhub-client-cms' ), $page_id ) );
            ?></h2>
            <p><?php
                /**
                 * Filter the password form message.
                 *
                 * @param string $message Default message text.
                 * @param int    $page_id Current page ID.
                 */
                echo esc_html( apply_filters( 'leancms_password_form_message', __( 'This content is password protected. Please enter the password to view.', 'brandhub-client-cms' ), $page_id ) );
            ?></p>
            <?php echo get_the_password_form( $page_id ); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
