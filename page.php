<?php get_header(); ?>
<!-- Navigation sidebar -->
<?php get_sidebar(); ?>


<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'entry','content' );
			}


		} else {

			// If no content, include the "No posts found" template.
			//get_template_part( 'entry', 'none' );

		}
		?>

<?php get_footer(); ?>
