<!-- Site Footer -->
<footer class="footer footer-center p-10 bg-neutral text-neutral-content">
    <aside>
        <p class="font-bold text-xl"><?php bloginfo( 'name' ); ?></p>
        <p class="opacity-70"><?php bloginfo( 'description' ); ?></p>
    </aside>
    <?php if ( has_nav_menu( 'footer' ) ) : ?>
        <nav>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => 'flex flex-wrap justify-center gap-6',
                'items_wrap'     => '<div class="%2$s">%3$s</div>',
                'depth'          => 1,
            ) );
            ?>
        </nav>
    <?php endif; ?>
    <aside>
        <p class="opacity-50 text-sm">&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
    </aside>
</footer>

</div><!-- end data-theme -->

<?php wp_footer(); ?>
</body>
</html>
