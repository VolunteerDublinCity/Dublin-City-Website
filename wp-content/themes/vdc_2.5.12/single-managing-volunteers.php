<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WBStarter
 */

get_template_part( 'template-parts/include', 'header' ); ?>

	<div class="container vdc-news-single">
		<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

		<?php endwhile; // End of the loop. ?>

		<input class="vdc-back-btn" type="button" value="Back" onclick="window.history.back()" /> 

	</div>


<?php get_footer(); ?>