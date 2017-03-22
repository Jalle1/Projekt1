<?php get_header(); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Sökresultatet för: <?php the_search_query(); ?></h1>

                    <?php get_search_form(); ?>

                    <?php if ( have_posts() ) : ?>

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail("full");
                            }
                            ?>

                            <h1><?php the_title();?></h1>
                            <p><?php the_content(); ?></p>

                        <?php endwhile; ?>

                        <?php else : ?>

                        <h1>Inga resultat hittades</h1>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>