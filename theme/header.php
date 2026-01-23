<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- DaisyUI Theme Wrapper -->
<div data-theme="lcms">

<!-- Site Header -->
<header class="navbar bg-base-200 px-6 shadow-sm">
    <div class="navbar-start">
        <!-- Mobile menu dropdown -->
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52',
                'items_wrap'     => '<ul tabindex="0" class="%2$s">%3$s</ul>',
                'fallback_cb'    => 'lcms_starter_nav_fallback',
                'depth'          => 2,
            ) );
            ?>
        </div>
        <!-- Site title / brand -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-ghost text-lg font-bold">
            <?php bloginfo( 'name' ); ?>
        </a>
    </div>

    <!-- Desktop navigation -->
    <div class="navbar-end hidden lg:flex">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'menu menu-horizontal px-1 gap-1',
            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            'fallback_cb'    => 'lcms_starter_nav_fallback',
            'depth'          => 2,
        ) );
        ?>
    </div>
</header>
