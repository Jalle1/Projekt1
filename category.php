<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-9">

		<h1>Kategorisida för: <?php single_cat_title(); ?></h1>

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