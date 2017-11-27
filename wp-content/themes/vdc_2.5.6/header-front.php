<!DOCTYPE html>
<html <?php language_attributes(); ?> ng-app>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-19209293-2', 'auto');
  ga('send', 'pageview');
// WEBBIZ
ga('create', 'UA-82657092-1', 'auto', {'name': 'newTracker'});
ga('newTracker.send', 'pageview');
</script>


		<? // show the ADMIN info
			$current_user = wp_get_current_user();

			$whitelist = array(
				'127.0.0.1',
				'localhost'
			);

			$is_local = false;
			if(in_array($_SERVER['SERVER_NAME'], $whitelist)){ $is_local = true; }

			$WP_admin_loggedin = false;
			if (user_can( $current_user, 'administrator' )) { $WP_admin_loggedin = true; }

			if($WP_admin_loggedin){ ?>
				<link rel="stylesheet" type="text/css" href="<? echo get_stylesheet_directory_uri(). '/dev.css' ?>">
			<? }
		?>

		<?php wp_head(); ?>
	</head>
	<?php
	// Vars
		$bg_img = get_field('fall_back_background_image', 'options');
	?>
	<body class="home bck_img" style="background-image:url(<?php echo $bg_img['url'] ?>)" data-img="<?php echo $bg_img['url'] ?>" <?php body_class('animated fadeIn'); ?>>

		<? if($WP_admin_loggedin){ ?>
			<div class="dev_message_container">
				<div class="dev_message">
					<p>
						<? if($is_local){ ?>
							👍 local site
						<? } else { ?>
							<span class="blink_me">🔴</span> LIVE SITE
						<? }
						if (user_can( $current_user, 'administrator' )) { ?>, logged in as <b>admin</b>, <?php edit_post_link('edit current page', '<span>', '</span>'); ?> <? }  ?>
						(page id: <? global $post; echo $post->ID; ?> )
					</p>
				</div>
			</div>
		<? } ?>

		<main class="vdc-tint-b-p">

	<!-- angular test
	<div >

		<input type="text" ng-model="name">
		<p>Hello {{name}}</p>

	</div> -->




