<?php
// Our Strategies
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

<section class="scroll-point pos-rel bg-cream our-strategies-section-1" scroll-title="Equities" id="scroll-anchor-1" section="1">

	<?php 
		
		$title = get_field('section_1_title');
		$content = get_field('section_1_content');
		
		render_side_titled_text_block($title,$content,'dark'); 
		
	?>
	
	
	<?php
	// get the images out 
	
		$section_1_left_image = get_field('section_1_left_image');
		$section_1_left_image_interchange_markup = render_interchange_markup($section_1_left_image);
		$section_1_right_image = get_field('section_1_right_image');	
		$section_1_right_image_interchange_markup = render_interchange_markup($section_1_right_image);
		
		
	
		
	?>
	
	
	<!-- Section 1 Images -->
	
	<div id="section-1-images">
		
		<div class="row" data-equalizer>
			<div class="large-8 columns img-col-left" data-equalizer-watch>
				<div id="section-1-left-image" class="bg-img" <?php echo $section_1_left_image_interchange_markup; ?>>
					
				</div>
			</div>
			<div class="large-4 columns img-col-right" data-equalizer-watch>
				<div id="section-1-right-image" class="bg-img" <?php echo $section_1_right_image_interchange_markup; ?>>
					
				</div>
			</div>			
		</div><!-- close row -->
		
	</div>
	
	
	
</section>




<!-- Section 2 -->

<section class="scroll-point pos-rel bg-cream our-strategies-section-2" scroll-title="Core Bonds" id="scroll-anchor-2" section="2">
	
	<?php 
		
		$title = get_field('section_2_title');
		$content = get_field('section_2_content');
		$lower_content = get_field('section_2_lower_content');
		
		render_side_titled_text_block_with_lower_content($title,$content,'dark',$lower_content); 
		
	?>	
	
	
	<!-- Section 2 Large Viewport Image -->
	
	<?php
	// section_2_large_image
		
	$section_2_large_image = get_field('section_2_large_image');
	$section_2_large_image_interchange_markup = render_interchange_markup($section_2_large_image);
		
	?>
	
	<div id="section-2-viewport-image">
		<div id="viewport-image-outer" class="bg-img" <?php echo $section_2_large_image_interchange_markup; ?>>
			<div id="viewport-image-liner">
				
				
			</div>
		</div>
	</div>
	
	
</section>



<!-- Section 3 -->

<section class="scroll-point pos-rel bg-transparent our-strategies-section-3" scroll-title="Covertible Bonds" id="scroll-anchor-3" section="3">
	
	<?php
		
		$title = get_field('section_3_title');
		$content = get_field('section_3_content');
		$lower_content = get_field('section_3_lower_content');	
		
		render_side_titled_text_block_with_lower_content($title,$content,'dark',$lower_content); 
		
	?>
	
	<!-- Chart -->
	
	<?php
			
		$chart_title = get_field('section_3_title');
		$chart_left_text = get_field('section_3_chart_left_text');
		
		render_chart($chart_title, $chart_left_text);
		
	?>

</section>



<!-- Section 4 -->

<section class="scroll-point pos-rel bg-transparent our-strategies-section-4" scroll-title="Uncorrelated Strategies" id="scroll-anchor-4" section="4">
	
	<!-- Large CTA'd Image -->
	
	<?php
	// section_4_cta_image	
	
	$section_4_cta_image = get_field('section_4_cta_image');
	$section_4_cta_image_interchange_markup = render_interchange_markup($section_4_cta_image);		
	?>
	
	<div id="large-cta-image">
		
		<div id="large-cta-image-outer" class="bg-img" <?php echo $section_4_cta_image_interchange_markup; ?>>
			<div id="large-cta-image-inner">
				
				
				<div class="row" id="cta-row">
					<div id="cta-col" class="large-4 columns">
						<div id="cta-main-content">
							
							<div id="title"><h2 class="cta-title-offset"><?php the_field('section_4_cta_title'); ?></h2></div>
							<div id="content"><?php the_field('section_4_cta_content'); ?></div>
							
						</div>
					</div>
				</div>
				
			
			</div>
		</div>
		
	</div>
	
	
</section>



<!-- Section 5 -->

<section class="pos-rel bg-light-grey who-we-are-section-4" id="scroll-anchor-5" section="5">
	
	<?php render_signup_form(); ?>
	
</section>



<?php get_footer(); ?>