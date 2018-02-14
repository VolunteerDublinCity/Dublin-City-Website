<?php get_template_part( 'template-parts/include', 'header' ); ?>
	<?php if( get_field('vol_or_org') ): ?>
		<h1>got vol_or_org</h1>
		<h2><?php the_field('vol_or_org'); ?></h2>
	<?php endif; ?>
	<div class="view-container">
    <calendar class="loading"></calendar>
    <opps-list class="loading"></opps-list>
  </div>
<?php get_footer(); ?>