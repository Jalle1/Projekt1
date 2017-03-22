<?php get_header(); ?>

<?php if (have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php if ( get_field( 'section' ) ) : ?>

            <?php get_template_part( 'templates/full-width' ); ?>

        <?php endif; ?>

    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>