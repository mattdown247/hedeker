<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
			<link href="<?php echo get_template_directory_uri(); ?>/apple-icon-touch.png" rel="apple-touch-icon" />
			<!--[if IE]>
				<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<![endif]-->
			<meta name="msapplication-TileColor" content="#f01d4f">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
	    	<meta name="theme-color" content="#121212">
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>
		<script type="text/javascript">
		var MTIProjectId='c63c9de2-9bd6-4cb9-8b7c-41fd9f081bf0';
		 (function() {
		        var mtiTracking = document.createElement('script');
		        mtiTracking.type='text/javascript';
		        mtiTracking.async='true';
		         mtiTracking.src='mtiFontTrackingCode.js';
		        (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild( mtiTracking );
		   })();
		</script>
		
	</head>
	
	<!-- Slide Menu -->
	<div id="slide-menu">
		
		<div id="slide-menu-close"><a href="#" class="nav-toggle">Close</a></div>
		
		<div id="slide-menu-liner">
			
			
			<div id="slide-menu-items">
				
				<!-- Menu items in here -->
				
				<div class="row">
					<div class="large-9 large-offset-3 columns">
						
						<?php
							
						// all main menu items	
						if(get_field('menu_items', 'option')){
							
							while(has_sub_field('menu_items', 'option')){
								
								$title = get_sub_field('title');
								$link = get_permalink(get_sub_field('link'));
								render_main_menu_item($title, $link);
								
							}
							
						}
							
						?>
						
					</div>
				</div>
				
				
				
			</div><!-- close items -->
			
			
		</div>
	</div>
	
		
	<body <?php body_class(); ?>>
		
									
	<!-- start top header -->
	<header class="header" role="banner">
		<div id="header-items-wrap">
			<div id="header-left">
				<a href="#" class="nav-toggle">Menu</a>
			</div>
			<div id="header-middle">
				<div id="header-middle-scroll-items">
					<!-- page scroll section titles in here -->
				</div>
			</div>
			<div id="header-right">Right</div>
		</div>
	</header>
	<!-- end .header -->
					
			
					
	<div id="content">