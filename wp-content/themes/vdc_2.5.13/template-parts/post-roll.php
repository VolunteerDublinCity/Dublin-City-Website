<?php
/*
* All shortcodes are generated here
*/
?>

<div class="grid">

<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
	<div class="module">
		<a href="<?php the_permalink(); ?>" <?php post_class(); ?>>

			<h2 class="mb0"><?php the_title(); ?></h2>
			<p>Published <span class="i"><?php the_date("F jS, Y"); ?></span></p>

			<?php if (has_post_thumbnail()) : ?>
				<div class="featured-image">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>

			<div class="entry-content index-excerpt">
				<?php
					echo wbstarter_excerpt('26');
				?>
			</div>
		</a> 
	</div>
<?php endwhile; else: ?>
	<h1>Sorry...</h1>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</div>