<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WBStarter
 */
?>
<a href="<?php echo esc_url( get_permalink() ); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h2><?php the_title(); ?></h2>

	<?php if (has_post_thumbnail()) : ?>
		<figure class="featured-image">
			<?php the_post_thumbnail(); ?>
		</figure>
	<?php endif; ?>

	<div class="entry-content index-excerpt">
		<?php
			echo wbstarter_excerpt('20');
		?>
	</div>

</a>