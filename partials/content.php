<?php global $i; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-feed'); ?>>

	<?php
		if ( $i == 1 ) {
			if ( has_post_thumbnail() ) {
				the_post_thumbnail("full");
			}
		}
	?>

	<div class="inner <?php echo ( $i == 1 ? "first" : "last" ); ?>">

	<h2>
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h2>

	<p>
		Skrivet av: <?php the_author_posts_link(); ?> den <?php the_time( get_option("date_format") ); ?>
	</p>

	<?php the_excerpt(); ?>

	<?php the_category(); ?>

	</div>

	<?php
		if ( $i == 2 ) {
			if ( has_post_thumbnail() ) {
				the_post_thumbnail("full");
			}
			$i = 0;
		}
	?>

</article>