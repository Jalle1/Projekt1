<?php get_header(); ?>

        <section>
            <div class="container">
                <div class="row">
                    <div id="primary" class="col-xs-12 col-md-9">
                        <?php if ( have_posts() ) : ?>

                            <?php while ( have_posts() ) : the_post(); ?>

                                <article>

                                    <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail("full");
                                    }
                                    ?>

                                    <h2 class="title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>

                                    <ul class="meta">
                                        <li>
                                            <i class="fa fa-calendar"></i> <?php the_time( get_option("date_format") ); ?>
                                        </li>
                                        <li>
                                            <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
                                        </li>
                                    </ul>

                                    <?php the_content(); ?>

                                     <ul class="meta">
                                        <li>
                                            <i class="fa fa-tag"></i><?php the_category(); ?>
                                        </li>
                                    </ul>

                                </article>

                            <?php endwhile; ?>

                        <?php endif; ?>

                    </div>
                    <aside id="secondary" class="col-xs-12 col-md-3">
                        <div id="sidebar">
                            <?php get_sidebar(); ?>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

 <?php get_footer(); ?>