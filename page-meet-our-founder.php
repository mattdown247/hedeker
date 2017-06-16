<?php
// Meet Our Founder
?>

<?php get_header(); ?>


<?php
$this_page_id = $post->ID;	
$this_page_data = get_post($this_page_id);
$this_page_title = 	$this_page_data->post_title;		
?>

<!-- Page Header -->
<section class="pos-rel bg-white page-header">
	
	<?php render_page_top_title_block($this_page_title,'page'); ?>
	
</section>


<!-- Nav Trigger -->
<div id="nav-trigger"></div>


<!-- Section 1 -->

<section class="scroll-point pos-rel bg-cream meet-our-founder-section-1" scroll-title="Dean R. Hedeker" id="scroll-anchor-1" section="1">

	<?php 
		
		$title = get_field('section_1_title');
		$content = get_field('section_1_content');
		
		render_side_titled_text_block($title,$content,'dark'); 
		
	?>
	
	<!-- Video -->
	
	<div id="section-1-video">
		
		<div id="video-outer">
			<div id="video-liner">
				<div class="label">Video in here</div>
			</div>
		</div>
		
	</div>
	
</section>




<!-- Section 2 -->

<section class="scroll-point pos-rel bg-cream meet-our-founder-section-2" scroll-title="A Brief History" id="scroll-anchor-2" section="2">
	

	<?php 
		
		$title = get_field('section_2_title');
		$content = get_field('section_2_content');
		
		render_side_titled_text_block($title,$content,'dark'); 
		
	?>

</section>




<!-- Section 3 (Honesty) -->

<section class="scroll-point pos-rel bg-white meet-our-founder-section-3" scroll-title="Honesty" id="scroll-anchor-3" section="3">
	





	
	<?php
		
	// small_side_title
	// small_profile_icon
	// small_profile_title
	// centre_page_title
	// intro_sentence
	// intro_image
	// intro_read_more_text

	
	// expanded_left_column_text
	// expanded_right_column_image
	// expanded_right_column_text
	// questions_title
	// questions_title
		// question
	// questions_end_text
	// bottom_quote
	// bottom_quote_author
		
	?>
	
	
	<div id="honesty-intro">
	
		<div class="row honesty-top-title-row">
			
			<div class="large-3 columns left-col" id="initial-honesty-side-title">
				<h2 class="honesty-small-side-title"><?php the_field('small_side_title');?></h2>
			</div>
			
			<div class="large-8 columns end right-col">
				<div class="main-title-container">
					<h2 class="honesty-centre-title"><?php the_field('centre_page_title');?></h2>
				</div>
			</div>
			
		</div><!-- close honesty-top-title-row -->
		
		
		
		
		<div class="row honesty-top-content-row">
			
			<div class="large-3 columns left-col">&nbsp;</div>
			<div class="large-4 columns centre-col">
				
				<div class="honesty-main-intro-container">
					<?php the_field('intro_sentence');?>
				</div>
				
			</div>
			<div class="large-4 columns end right-col">
				
				<div class="row">
					<div class="large-6 columns">&nbsp;</div>
					<div class="large-6 columns">
						
						
						<?php
							$intro_image_id = get_field('intro_image');
							$intro_image_url = wp_get_attachment_image_src($intro_image_id, 'full')[0];
						?>
						
							<div class="honesty-small-top-image bg-img" style="background-image:url(<?php echo $intro_image_url; ?>);">
							
						</div>
					</div>
				</div>
				
			</div>
			
			
		</div><!-- close honesty-top-content-row -->
		
		
		
		<div class="row honesty-read-more-row" data-equalizer>
			
			<div class="large-3 columns left-col" data-equalizer-watch>
				
				<?php 
				
				// small profile image
				$small_profile_icon_id = get_field('small_profile_icon');
				$small_profile_icon_url = wp_get_attachment_image_src($small_profile_icon_id, 'full')[0];	
					
				?>
				
				<div class="honesty-small-profile-outer" id="initial-small-profile-outer">
					<div class="honesty-small-profile-image bg-imgg" style="background-image:url(<?php echo $small_profile_icon_url; ?>);">
						
					</div>
					<div class="honesty-small-profile-title">
						<h2 class="honesty-small-profile-title"><?php the_field('small_profile_title'); ?></h2>
					</div>
				</div>
				
			</div>	
			<div class="large-8 columns end right-col" data-equalizer-watch>
				
				<div id="honesty-read-more-link-conatiner">
					
					<div id="honesty-link-wrap">
						
						<div id="read-more-text">
							<a href="#" class="meet-our-founder-read-more"><?php the_field('intro_read_more_text'); ?></a>
						</div>
						<div id="read-more-arrow"></div>
						
					</div>
					
				</div>
				
			</div>		
			
		</div><!-- close honesty-read-more-row -->
		
	</div> <!-- close honesty-intro -->
	
	
	
	
	
	
	
	
	<div id="honesty-opened">
		
		<!-- honesty opened semi transparent bg -->
		<div id="honesty-opened-bg"></div>
		
		<div id="honesty-opened-contents">
			
			<div class="row honesty-opened-main-layout-row" data-equalizer>
				<div class="large-2 columns honesty-contents-col left" data-equalizer-watch>
					
					<!-- left column 'honesty' header -->
					<h2 class="honesty-small-side-title"><?php the_field('small_side_title');?></h2>
					
					<div id="bottom-profile-pic">Profile Pic</div>
					
				</div>
				<div class="large-1 columns white-honesty-centre" data-equalizer-watch>&nbsp;</div>
				<div class="large-8 columns end honesty-contents-col white-honesty-right" data-equalizer-watch>
					
					<!-- Centre Column 'Lets Face It..' header -->
					<div class="main-title-container">
						<h2 class="honesty-centre-title"><?php the_field('centre_page_title');?></h2>
					</div>
					
					<!-- start main 2 column layout for rest of content -->
					<div id="honesty-main-text-content">
						
						<div id="honesty-block-1">
							<div class="row">
								<div class="large-6 columns">
									<?php the_field('expanded_left_column_text'); ?>
								</div>
								<div class="large-6 columns">
									
									<?php
										$intro_image_id = get_field('intro_image');
										$intro_image_url = wp_get_attachment_image_src($intro_image_id, 'full')[0];
									?>
									<div class="row">
										<div class="large-6 columns">&nbsp;</div>
										<div class="large-6 columns">
											<div class="honesty-small-top-image bg-img" style="background-image:url(<?php echo $intro_image_url; ?>);"></div>
										</div>
									</div>
									
									<div id="honesty-right-column-text">
										<?php the_field('expanded_right_column_text'); ?>
									</div>
									
								</div>
							</div><!-- close row -->
						</div><!-- close #honesty-block-1 -->
						
						
						
						<div id="honesty-block-2">
							<div class="row">
								<div class="large-6 columns">
									<?php the_field('questions_title'); ?>
								</div>
								<div class="large-6 columns">
								
								</div>
							</div><!-- close row -->
						</div><!-- close #honesty-block-2 -->
						
						
					</div><!-- close #honesty-main-text-content -->
					
					
				</div>
			</div>
			
			<div class="row closer-row">
				<div class="large-2 columns">&nbsp;</div>
				<div class="large-1 columns white-honesty-centre">&nbsp;</div>
				<div class="large-8 columns end white-honesty-right">
					<!-- temp close -->
					<a href="#" class="meet-our-founder-close">Temp Close</a>
				</div>		
			</div>
			
		</div><!-- close honesty opened contents -->
		
	</div><!-- close honesty opened -->



	
	
	
	<div id="honesty-overlay">
		
		<div id="honesty-inner">
			
			
			<div class="row main-layout-row" data-equalizer>
				
				<!-- layout left col -->
				<div class="large-2 columns col-left" data-equalizer-watch>
					
					<!-- Honesty Small Left Header -->
					<h2 class="honesty-small-side-title"><?php the_field('small_side_title');?></h2>
					
				</div>
				
				<!-- layout middle col -->
				<div class="large-1 columns col-centre" data-equalizer-watch>&nbsp;</div>
				
				<!-- layout right col -->
				<div class="large-8 columns end col-right" data-equalizer-watch>
					
					<!-- Lets Face It Small Right Header -->
						<div class="main-title-container">
							<h2 class="honesty-centre-title"><?php the_field('centre_page_title');?></h2>
						</div>
						
						
						

						
						<div class="row main-honesty-contents first">
							<div class="large-6 columns left">
								
								<?php the_field('expanded_left_column_text'); ?>
								
							</div>
							<div class="large-6 columns right">
								

								<?php
									$intro_image_id = get_field('intro_image');
									$intro_image_url = wp_get_attachment_image_src($intro_image_id, 'full')[0];
								?>
								<div class="row">
									<div class="large-6 columns">&nbsp;</div>
									<div class="large-6 columns">
										<div class="honesty-small-top-image bg-img" style="background-image:url(<?php echo $intro_image_url; ?>);"></div>
									</div>
								</div>
								

								<?php the_field('expanded_right_column_text'); ?>
								
							</div>
						</div>
						
						
						<div class="row main-honesty-contents second">
							<div class="large-6 columns left">
								
								<?php the_field('questions_title'); ?>
								
							</div>
							<div class="large-6 columns right">
								
								
							</div>
						</div>	
						
						
						
						<div class="row main-honesty-contents third">
							<div class="large-6 columns left">
								
								
							</div>
							<div class="large-6 columns right">
								
								
							</div>	
						</div>	
						
						
						<!-- temp close -->
						<a href="#" class="meet-our-founder-close">Temp Close</a>
						
					
				</div><!-- close layout right col -->
				
			</div><!-- close main-layout-row -->

		</div><!-- close honesty inner -->
		
	</div><!-- close honesty outer -->	



	<!-- Honesty Viewport Image -->
	
	<div id="honesty-viewport-image">
		
		<?php
			
		$honesty_viewport_image = get_field('honesty_viewport_image');
		$honesty_viewport_image_interchange_markup = render_interchange_markup($honesty_viewport_image);	
			
		?>
		
		<div id="viewport-image-outer" class="bg-img" <?php echo $honesty_viewport_image_interchange_markup; ?>>
			
			
		</div>
		
	</div>
	
</section>



<!-- Section 4 (Footnote) -->


<section class="scroll-point pos-rel bg-white meet-our-founder-section-4" scroll-title="Footnote" id="scroll-anchor-4" section="4">
	
	<div class="row footnote-row">
		
		
		<!-- LEFT COLUMN -->
		<div class="large-3 columns col-left">
			
			<?php
			
				$footnote_icon_id = get_field('footnote_icon');
				$footnote_icon_url = wp_get_attachment_image_src($footnote_icon_id, 'full')[0];	
				
			?>
		
			<!-- small left icon -->
			<div id="footnote-left-icon" class="" style="background-image:url(<?php echo $footnote_icon_url; ?>);"></div>
		
		</div>
		
		
		<!-- MIDDLE COLUMN -->
		<div class="large-5 columns col-centre">
		
			<!-- Column Header -->
			<div id="footnote-middle-column-header-outer" class="footnote-column-header">
				<h2 class="footnote-header"><?php the_field('footnote_middle_column_header'); ?></h2>
			</div>
			
			<!-- Top Text -->
			<div id="footnote-middle-column-top-text" class="footnote-text-block">
				<?php the_field('footnote_middle_column_top_text'); ?>
			</div>
			
			<!-- Links -->
			<div id="footnote-middle-column-links">
				
				<?php
					
					render_footnote_links('footnote_middle_column_links');
				
				?>
				
			</div>
			
			<!-- Bottom Text -->
			<div id="footnote-middle-column-bottom-text" class="footnote-text-block">
				<?php the_field('footnote_middle_column_bottom_text'); ?>
			</div>
		
		</div>	
		
		
		<!-- RIGHT COLUMN -->
		<div class="large-4 columns col-right">
		
			<!-- Column Header -->
			<div id="footnote-right-column-header-outer" class="footnote-column-header">
				<h2 class="footnote-header"><?php the_field('footnote_right_column_header'); ?></h2>
			</div>
			
			<!-- Links -->
			<div id="footnote-right-column-links">
				
				<?php
					
					render_footnote_links('footnote_right_column_links');
				
				?>
				
			</div>
		
		</div>	
		
		
	</div>	
	
</section>





<section class="pos-rel bg-light-grey meet-our-founder-section-5"  id="scroll-anchor-5" section="5">
	
	<?php render_signup_form(); ?>
	
</section>



<?php get_footer(); ?>