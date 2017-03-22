<?php get_header(); ?>

    <section>
        <div class="container">
            <div class="row">

                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <div id="primary" class="col-xs-12">

                            <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail("full");
                            }
                            ?>

                            <h1><?php the_title(); ?></h1>
                            <p><?php the_content(); ?></p>

                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>

            </div>
        </div>
    </section>

<?php get_footer(); ?>