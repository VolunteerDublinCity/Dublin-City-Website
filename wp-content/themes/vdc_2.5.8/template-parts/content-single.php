<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WBStarter
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php echo the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="vdc-single-post-date">
			<?php the_date('F j, Y'); ?>
		</div>
		
		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="featured-image">
				<?php the_post_thumbnail(); ?>
			</figure>
		<?php endif; ?>

	</header><!-- .entry-header -->
	<div class="content">
		<?php the_content(); ?>
	</div>
</article>