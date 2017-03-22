<?php get_header(); ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <?php if ( have_posts() ) : ?>

                            <?php while ( have_posts() ) : the_post(); ?>

                                <div class="hero">
                                    <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail("full");
                                    }
                                    ?>
                                    <div class="text">
                                        <h1><?php the_title(); ?></h1>
                                        <p><?php the_content(); ?></p>
                                    </div>
                                </div>

                            <?php endwhile; ?>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>

<?php get_footer(); ?>