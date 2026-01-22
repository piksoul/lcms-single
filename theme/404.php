<?php
/**
 * 404 Page Template
 *
 * @package LeanCMS_Starter
 */

get_header();
?>

<main class="lcms-container py-16 text-center min-h-[60vh] flex flex-col justify-center">
    <h1 class="text-6xl font-bold mb-4">404</h1>
    <p class="text-xl opacity-70 mb-8">Page not found</p>
    <p class="mb-8">The page you're looking for doesn't exist or has been moved.</p>
    <a href="<?php echo home_url(); ?>" class="btn btn-primary">
        Return Home
    </a>
</main>

<?php
get_footer();
