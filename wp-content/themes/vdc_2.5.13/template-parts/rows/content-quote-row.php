<?php if ( get_row_layout() == 'quote_row' ) : ?>

<div class="wb-light-grey-bg vdc-quote-row">
	<div class="container">
		<div class="vdc-quote-text">
			<?php the_sub_field('quote'); ?>
		</div>
		<?php 
			$link_txt = get_sub_field('link_text');
			$link = get_sub_field('link');

			if(!empty($link_txt) && !empty($link)) :
		?>
			<a class="vdc-quote-link" href="<?php echo $link; ?>"><?php echo $link_txt; ?></a>
		<?php endif; ?>
	</div>
</div>

<?php endif; ?>