<?php get_header(); ?>

<div class="container">
    <div class="row author-info">
        <div class="col-xs-8">

            <?php
                $author_id = get_the_author_meta('ID');
                $author_slug = 'user_' . $author_id;
                $image = get_field('image',$author_slug);
            ?>  
            <h1>Författararkiv: <?php echo get_the_author("display_name"); ?></h1>
           

        </div>
        <div class="col-xs-4">
            <img src="<?php echo $image['sizes']['thumbnail']; ?>" ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-9">

        <?php if ( have_posts() ) : ?>

            <?php $i = 0; while ( have_posts() ) : the_post(); $i++; ?>

                <?php get_template_part('partials/content'); ?>

            <?php endwhile; ?>

            <?php the_posts_pagination(); ?>

        <?php else : ?>

            <?php get_template_part('partials/content','none'); ?>

        <?php endif; ?>

        </div>

        <div class="col-xs-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>