<?php
/**
 * Main template file (fallback).
 *
 * This template is used when no LeanCMS page template is assigned.
 * It provides a minimal layout for standard WordPress content.
 *
 * @package LeanCMS_Starter
 */

get_header();
?>

<main class="lcms-container py-16">
    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="mb-8">
                    <?php if ( is_singular() ) : ?>
                        <h1 class="text-4xl font-bold mb-4"><?php the_title(); ?></h1>
                    <?php else : ?>
                        <h2 class="text-2xl font-bold mb-2">
                            <a href="<?php the_permalink(); ?>" class="hover:underline">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                    <?php endif; ?>

                    <?php if ( is_single() ) : ?>
                        <p class="text-sm opacity-60">
                            <?php echo get_the_date(); ?> &bull; <?php the_author(); ?>
                        </p>
                    <?php endif; ?>
                </header>

                <div class="prose max-w-none">
                    <?php
                    if ( is_singular() ) {
                        the_content();
                    } else {
                        the_excerpt();
                    }
                    ?>
                </div>

            </article>

            <?php if ( is_singular() && comments_open() ) : ?>
                <div class="mt-16">
                    <?php comments_template(); ?>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>

    <?php else : ?>

        <div class="text-center py-16">
            <h1 class="text-2xl font-bold mb-4">Nothing Found</h1>
            <p class="opacity-60">No content matched your request.</p>
        </div>

    <?php endif; ?>
</main>

<?php
get_footer();
