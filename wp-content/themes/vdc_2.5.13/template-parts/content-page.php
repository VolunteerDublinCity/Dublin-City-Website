<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WBStarter
 */
$title = get_field('hide_title'); 
$event_blog_block = get_field('events_blog');
$has_underline = get_field('title_underline');
$title_icon = get_field('title_icon');
?>

	<?php if ($title == 'show'): ?>
		
		<div class="container vdc-page-title">
			<?php echo the_title( '<h1 class="vdc-page-title text-center "><span class="icon icon-'.$title_icon.'"></span>', '</h1>' ); ?>
			<?php if ( $has_underline == true ): ?>
				<hr>
			<?php endif ?>
		</div>

	<?php endif; ?>
	<!-- Get Rows -->
	<?php get_template_part( 'template-parts/rows/content', 'rows' ); ?>
	
	<?php if ( $event_blog_block == "show" ): ?>
		<?php get_template_part( 'template-parts/rows/content', 'events-blog-org' ); ?>
	<?php endif ?>

	<div class="container">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'wbstarter' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</div>