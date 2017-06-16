<?php
// Homepage	
?>

<?php get_header(); ?>

	
<!-- Homepage Video -->
<section class="pos-rel" id="">
	
	<div id="homepage-video-outer">
		<div id="homepage-video"></div>
		<div id="homepage-logo-outer">
			<div id="homepage-logo-inner">Hedeker</div>
		</div>
	</div>
	
</section>


<div id="nav-trigger"></div>


<!-- Large Brown Block (Slider) -->

<section class="pos-rel bg-white">
	
	<div id="homepage-carousel-wrap">
	
			<!-- Carousel Top -->
			<div id="homepage-carousel-top">
				<div class="row columns">
					<div id="homepage-carousel-logo">

					</div>
				</div>
			</div>
			
			
			<!-- Carousel Bottom -->
			<div id="homepage-carousel-bottom">
				
				
				<div class="row columns">
				
					<div id="homepage-carousel" class="fade-in-and-up">
						
						<?php
							
						// Fetch all homepage slides	
							
						?>
						
						
						<div class="slide">
							<div class="text">Our mission is to deploy our clients Capital into assets generating the best risk adjusted returns.</div>
							<div class="link">
								<a href="">Find out how</a>
							</div>
						</div>
					
						
					</div><!-- close #carousel -->	
					
					<div id="homepage-carousel-navigation">Carousel navigation</div>
					
				</div>
				

			</div><!-- close #homepage-carousel-bottom -->
	
	</div>	
	
</section>



		
<!-- CTA Left, Image Right -->

<section class="pos-rel bg-white pad-top pad-bottom">
	
	<?php
	
	// Get section data out	

	$section_2_image = get_field('section_2_image');
	$section_2_interchange_markup = render_interchange_markup($section_2_image);
		
	$section_2_title = get_field('section_2_title');
	$section_2_sub_title = get_field('section_2_sub_title');
	$section_2_link = get_field('section_2_link');
	$section_2_link_url = get_permalink($section_2_link);
	$section_2_link_text = get_field('section_2_link_text');
		
		
	?>
	
	<div class="cta-left-image-right">
	
		<div class="row eq-reflow" data-equalizer>
			
			<div class="large-4 columns col-left" data-equalizer-watch>
				
				
				<div class="homepage-cta-items-text-wrap breakout image-right fade-in-and-up">
					
					<div class="title"><?php echo $section_2_title; ?></div>
					<div class="sub-title"><?php echo $section_2_sub_title; ?></div>
					<div class="link">
						<a href="<?php echo $section_2_link_url; ?>" class="bordered-read-more-link"><?php echo $section_2_link_text; ?></a>
					</div>
					
				</div>
				
				
			</div>
			
			<div class="large-8 columns" data-equalizer-watch>
				
				<div class="breakout-image right bg-img fade-in-and-up" <?php echo $section_2_interchange_markup; ?>></div>
				
			</div>
			
		</div>
		
	</div>
	
</section>





<!-- Full width image with centred white CTA -->


<?php

	// Get section data out	

	$section_3_image = get_field('section_3_image');
	$section_3_interchange_markup = render_interchange_markup($section_3_image);
		
	$section_3_title = get_field('section_3_title');
	$section_3_sub_title = get_field('section_3_sub_title');
	$section_3_link = get_field('section_3_link');
	$section_3_link_url = get_permalink($section_3_link);
	$section_3_link_text = get_field('section_3_link_text');	
	
?>


<section class="pos-rel bg-white">
	<div class="viewport-width-image-with-cta">
		<div class="viewport-width-image-liner fade-in-and-up" <?php echo $section_3_interchange_markup; ?>>
		
			<div class="cta-outer fade-in-and-up">
				
				<div class="homepage-cta-items-text-wrap centered ">
					<div class="title"><?php echo $section_3_title; ?></div>
					<div class="sub-title"><?php echo $section_3_sub_title; ?></div>
					<div class="link">
						<a href="<?php echo $section_3_link_url; ?>" class="bordered-read-more-link"><?php echo $section_3_link_text; ?></a>
					</div>
				</div>
				
			</div><!-- close .cta-outer -->
		
		</div><!-- close viewport-width-image-liner -->
	</div><!-- close viewport-width-image-with-cta -->
</section>




<!-- CTA Right, Image Left -->


<?php

	// Get section data out	

	$section_4_image = get_field('section_4_image');
	$section_4_interchange_markup = render_interchange_markup($section_4_image);
		
	$section_4_title = get_field('section_4_title');
	$section_4_sub_title = get_field('section_4_sub_title');
	$section_4_link = get_field('section_4_link');
	$section_4_link_url = get_permalink($section_4_link);
	$section_4_link_text = get_field('section_4_link_text');	
	
?>


<section class="pos-rel bg-white pad-top pad-bottom">
	
	<div class="cta-right-image-left">
	
		<div class="row eq-reflow" data-equalizer>
			
			
			<div class="large-8 columns" data-equalizer-watch>
				<div class="breakout-image left bg-img fade-in-and-up" <?php echo $section_4_interchange_markup; ?>></div>
			</div>
			
			<div class="large-4 columns col-right" data-equalizer-watch>
				
				<div class="homepage-cta-items-text-wrap breakout image-left fade-in-and-up">
					<div class="title"><?php echo $section_4_title; ?></div>
					<div class="sub-title"><?php echo $section_4_sub_title; ?></div>
					<div class="link">
						<a href="<?php echo $section_4_link_url; ?>" class="bordered-read-more-link"><?php echo $section_4_link_text; ?></a>
					</div>
				</div>
				
			</div>

			
		</div>
		
	</div>
	
</section>



<!-- Latest (3 items) -->


<section class="pos-rel bg-cream fade-in-section">
	
	<div id="homepage-latest">
	
		<div class="row columns fade-in-and-up" id="homepage-latest-title-row"><h2>Latest</h2></div>
		
		
		<div class="row">
			
			<?php
				
				if( have_rows('latest_items') ){
				
					while( have_rows('latest_items') ): the_row();
					
						$image = get_sub_field('image');
						$title = get_sub_field('title');
						$link = get_sub_field('link');
						$description = get_sub_field('description');
						
						echo '<div class="large-4 columns home-3-col">';
							render_homepage_latest_item($image,$title,$link,$description);
						echo '</div>';
					
					endwhile;
					
				}
				
			?>
				
		</div><!-- close row -->
	
	
	</div>
	
</section>



<!-- Bottom Signup -->



<section class="pos-rel bg-white">
	
	<?php render_signup_form(); ?>
	
</section>



<?php get_footer(); ?>