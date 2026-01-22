<?php
/**
 * Brand Hub Project Overview - No Access / Password Form
 * Sunset Boulevard Theme
 *
 * This template displays when the project overview page is password protected.
 * Uses warm sunset colors inspired by golden hour.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/brhu/slug-project-overview-251106-noaccess.php
 */

defined('ABSPATH') || exit;
get_header();
?>

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@700&family=Noto+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Noto Sans', 'DejaVu Sans', Arial, sans-serif;
        color: #264653;
        line-height: 1.6;
        background: #fef7ed;
    }

    /* Hero Section - Sunset Gradient */
    .hero {
        background: linear-gradient(135deg, #e76f51 0%, #f4a261 50%, #e9c46a 100%);
        color: white;
        padding: 100px 60px 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(231, 111, 81, 0.3) 0%, rgba(244, 162, 97, 0.2) 50%, rgba(233, 196, 106, 0.1) 100%);
        opacity: 0.5;
    }

    .hero-content {
        position: relative;
        z-index: 1;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(10px);
        padding: 10px 24px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 24px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        border: 2px solid rgba(255, 255, 255, 0.4);
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .hero h1 {
        font-family: 'Noto Serif', 'DejaVu Serif', Georgia, serif;
        font-size: 56px;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.2;
        letter-spacing: -0.5px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .hero-subtitle {
        font-size: 20px;
        opacity: 0.95;
        font-weight: 400;
        line-height: 1.6;
        text-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
    }

    .lock-icon {
        font-size: 56px;
        margin-bottom: 20px;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.15));
    }

    /* Main Content */
    .content-wrapper {
        max-width: 1200px;
        margin: -40px auto 80px;
        padding: 0 60px;
        position: relative;
        z-index: 2;
    }

    /* Password Form Section */
    .password-section {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(38, 70, 83, 0.12);
        overflow: hidden;
        border: 3px solid #e9c46a;
    }

    .password-header {
        background: linear-gradient(135deg, #fef7ed 0%, #fce8c8 100%);
        padding: 50px 60px;
        text-align: center;
        border-bottom: 2px solid #e9c46a;
    }

    .password-header h2 {
        font-family: 'Noto Serif', 'DejaVu Serif', Georgia, serif;
        font-size: 36px;
        font-weight: 700;
        color: #e76f51;
        margin-bottom: 12px;
    }

    .password-header p {
        font-size: 18px;
        color: #264653;
        line-height: 1.6;
        opacity: 0.9;
    }

    /* Features Grid */
    .features-section {
        padding: 60px;
        background: linear-gradient(180deg, #ffffff 0%, #fef7ed 100%);
    }

    .section-label {
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #e76f51;
        margin-bottom: 20px;
        text-align: center;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        margin-bottom: 50px;
    }

    .feature-item {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 28px;
        background: white;
        border-radius: 16px;
        border: 2px solid #fce8c8;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(38, 70, 83, 0.06);
    }

    .feature-item:hover {
        border-color: #f4a261;
        box-shadow: 0 6px 20px rgba(231, 111, 81, 0.15);
        transform: translateY(-4px);
        background: linear-gradient(135deg, #ffffff 0%, #fef7ed 100%);
    }

    .feature-icon {
        font-size: 36px;
        flex-shrink: 0;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    .feature-content h3 {
        font-family: 'Noto Serif', 'DejaVu Serif', Georgia, serif;
        font-size: 20px;
        font-weight: 700;
        color: #264653;
        margin-bottom: 8px;
    }

    .feature-content p {
        font-size: 15px;
        color: #264653;
        line-height: 1.6;
        opacity: 0.85;
    }

    /* Password Form */
    .password-form-container {
        background: white;
        padding: 45px;
        border-radius: 16px;
        border: 3px solid #e76f51;
        margin: 0 auto;
        max-width: 520px;
        box-shadow: 0 8px 24px rgba(231, 111, 81, 0.12);
    }

    .form-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .form-header h3 {
        font-family: 'Noto Serif', 'DejaVu Serif', Georgia, serif;
        font-size: 26px;
        font-weight: 700;
        color: #e76f51;
        margin-bottom: 10px;
    }

    .form-header p {
        font-size: 15px;
        color: #264653;
        opacity: 0.85;
    }

    .password-form-container .post-password-form {
        text-align: left;
    }

    .password-form-container .post-password-form label {
        display: block;
        font-size: 14px;
        font-weight: 700;
        color: #264653;
        margin-bottom: 12px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .password-form-container .post-password-form input[type="password"] {
        width: 100%;
        padding: 16px 20px;
        font-size: 16px;
        border: 2px solid #e9c46a;
        border-radius: 12px;
        margin-bottom: 24px;
        transition: all 0.3s ease;
        box-sizing: border-box;
        font-family: 'Noto Sans', 'DejaVu Sans', Arial, sans-serif;
        background: #fef7ed;
    }

    .password-form-container .post-password-form input[type="password"]:focus {
        outline: none;
        border-color: #e76f51;
        box-shadow: 0 0 0 4px rgba(231, 111, 81, 0.15);
        background: white;
    }

    .password-form-container .post-password-form input[type="submit"] {
        width: 100%;
        padding: 18px 20px;
        font-size: 17px;
        font-weight: 700;
        color: white;
        background: linear-gradient(135deg, #e76f51 0%, #f4a261 100%);
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        box-shadow: 0 4px 12px rgba(231, 111, 81, 0.3);
    }

    .password-form-container .post-password-form input[type="submit"]:hover {
        background: linear-gradient(135deg, #d85840 0%, #e38f4f 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(231, 111, 81, 0.4);
    }

    .password-form-container .post-password-form input[type="submit"]:active {
        transform: translateY(0);
    }

    /* Info Banner */
    .info-banner {
        background: linear-gradient(135deg, #fef7ed 0%, #fce8c8 100%);
        border: 2px solid #e9c46a;
        border-radius: 16px;
        padding: 28px;
        margin-top: 40px;
        text-align: center;
    }

    .info-banner p {
        font-size: 15px;
        color: #264653;
        margin: 0;
        line-height: 1.6;
    }

    .info-banner strong {
        font-weight: 700;
        color: #e76f51;
    }

    /* Decorative Elements */
    .decorative-circle {
        position: absolute;
        border-radius: 50%;
        opacity: 0.1;
        pointer-events: none;
    }

    .circle-1 {
        width: 300px;
        height: 300px;
        background: #e76f51;
        top: -150px;
        right: -150px;
    }

    .circle-2 {
        width: 200px;
        height: 200px;
        background: #f4a261;
        bottom: -100px;
        left: -100px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero {
            padding: 80px 30px 60px;
        }

        .hero h1 {
            font-size: 40px;
        }

        .hero-subtitle {
            font-size: 18px;
        }

        .lock-icon {
            font-size: 44px;
        }

        .content-wrapper {
            padding: 0 20px;
            margin-top: -30px;
        }

        .password-header {
            padding: 40px 30px;
        }

        .password-header h2 {
            font-size: 28px;
        }

        .features-section {
            padding: 40px 30px;
        }

        .features-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .password-form-container {
            padding: 35px;
        }

        .form-header h3 {
            font-size: 22px;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero">
        <div class="decorative-circle circle-1"></div>
        <div class="decorative-circle circle-2"></div>
        <div class="hero-content">
            <div class="lock-icon">🔒</div>
            <div class="hero-badge">Secure Access Required</div>
            <h1>Project Overview</h1>
            <p class="hero-subtitle">This project overview is available to authorized team members and stakeholders. Please enter your access code to continue.</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="content-wrapper">
        <div class="password-section">
            <!-- Header -->
            <div class="password-header">
                <h2>What's Inside</h2>
                <p>Comprehensive project documentation and resources for your team</p>
            </div>

            <!-- Features -->
            <div class="features-section">
                <div class="section-label">Included in This Overview</div>

                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">📋</div>
                        <div class="feature-content">
                            <h3>Project Scope</h3>
                            <p>Detailed breakdown of project objectives, deliverables, and timelines for all stakeholders.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">👥</div>
                        <div class="feature-content">
                            <h3>Team Structure</h3>
                            <p>Organization chart, roles, responsibilities, and contact information for project team members.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">📊</div>
                        <div class="feature-content">
                            <h3>Progress Tracking</h3>
                            <p>Real-time updates on milestones, KPIs, and project status with visual dashboards.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">📁</div>
                        <div class="feature-content">
                            <h3>Resources & Assets</h3>
                            <p>Centralized access to documents, templates, brand assets, and project materials.</p>
                        </div>
                    </div>
                </div>

                <!-- Password Form -->
                <div class="password-form-container">
                    <div class="form-header">
                        <h3>Enter Access Code</h3>
                        <p>Request access from your project manager if needed</p>
                    </div>
                    <?php echo get_the_password_form(); ?>
                </div>

                <!-- Info Banner -->
                <div class="info-banner">
                    <p><strong>Need help?</strong> Contact your project manager or Brand Hub support for access assistance.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
