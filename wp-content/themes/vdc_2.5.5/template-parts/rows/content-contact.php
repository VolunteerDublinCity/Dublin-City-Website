<?php if ( get_row_layout() == 'contact' ): ?>
<div class="wb-white-bg">
	<div class="container">
		<div class="row">
			
			<div class="col-md-8">
				<div class="vdc-contact-details">
					<div class="vdc-contact-details-left">
						<?php 
						$tel = get_field('phone_number', 'option'); 
						$tel_link = str_replace(' ', '', $tel);?>
						<a href="tel:<?php echo $tel_link ?>">
							<strong>Tel: </strong>
							<?php echo $tel ?>
						</a>

						<?php $mail = get_field('email_address', 'option'); ?>
						<a href="mailto:<?php echo $mail ?>">
							<strong>Email: </strong>
							<?php echo $mail ?>
						</a>
					</div>
					
					<?php vdc_social_link_plain(); ?>

				</div>
				<?php the_sub_field('form_field'); ?>
			</div>

			<div class="col-md-4">
				<?php $location = get_field('hq_office_location', 'option'); ?>

				<div class="vdc-written-address">
					<p class="text-center">
					<?php 
						// echo $location['address']; 
						$address = $location['address'];

						$address = explode( ',', $address);
						echo $address[0].', <br />';
						echo $address[1].', ';
						echo $address[2].', ';
						echo $address[3];
					?>
					</p>
				</div>

				<div class="acf-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php endif; ?>